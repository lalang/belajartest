<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Adminarea
{
	public function __construct()
    {
		parent::__construct();		
        $this->load->helper('form');
        $this->load->helper('app');
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->model('General_model', 'general');
		$this->load->model('Profile_model', 'profile');
		$this->load->model('Group_model', 'group');
		$this->load->model('Users_model', 'users');
		$this->load->model('Menu_model', 'menu');
		$this->load->model('Seleb_model', 'seleb');
		
		//Main Menu
		$this->data['active_agreement'] = '';	
		
		
		//Atribut
		$this->atribut();

		//Cek user yang login siapa
		//$this->user_login_now();
		
	}
	
	############ Start: Fungsi Pendukung ############
	
	public function atribut()
    {	
		//Load User
		$data_user = $this->profile->user_login($this->session->userdata('username'));
		foreach($data_user as $key => $value)
		{
			$this->data['user_login_now'][$key] = $value;
		}
		$prev = $this->data['user_login_now']['nm_user_group'];
		
		//Load Menu Admin
		$this->data['hasilMenu'] = $this->menu->loadAllMenu($prev);

	}
	
	/*public function user_login_now(){
		$data_user = $this->profile->user_login($this->session->userdata('username'));
		foreach($data_user as $key => $value)
		{
			$this->data['user_login_now'][$key] = $value;
		}
	}*/
	
	public function random_code(){
	  $the_char = array(
		 'A','B','C','D','E','F','G','H','I','J',
		 'K','L','M','N','O','P','Q','R','S','T',
		 'U','V','W','X','Y','Z','1','2','3','4','5','6','7','8',
		 '9','0'
	  );
	  $max_elements = count($the_char) - 1;
	  srand((double)microtime()*1000000);
	  $c1 = $the_char[rand(0,$max_elements)];
	  $c2 = $the_char[rand(0,$max_elements)];
	  $c3 = $the_char[rand(0,$max_elements)];
	  $c4 = $the_char[rand(0,$max_elements)];
	  $c5 = $the_char[rand(0,$max_elements)];
	  $c6 = $the_char[rand(0,$max_elements)];
	  $ranc = '$c1$c2$c3$c4$c5$c6';
	  
	  return $ranc;
	}
	
	public function editor(){
		$hasil = $this->general->general();
		foreach($hasil as $data){
			$form_editor = $data->form_editor;
		}	

		if($form_editor=="Tinymcpuk"){
			$this->data['editor']="first_editor";
			$this->data['editor2']="first_editor2";
		}else{
			$this->data['editor']="editor";
			$this->data['editor2']="editor2";
		}
	}
	
	public function editor_second(){
		$hasil = $this->general->general();
		foreach($hasil as $data){
			$form_editor = $data->form_editor;
		}	

		if($form_editor=="Tinymcpuk"){
			$this->data['editor']="second_editor";
			$this->data['editor2']="second_editor2";
		}else{
			$this->data['editor']="editor";
			$this->data['editor2']="editor2";
		}
	}
	
	
	############ End: Fungsi Pendukung ############
	
	public function index()
    {	
	
		//Total Pengunjung Hari Ini
		$this->data['active_menu']='Dashboard';
		$this->data['active_menu_sub']='';
		$this->data['title_page']='Dashboard';
		$this->load->view('admin/private/header',$this->data);
		$this->load->view('admin/private/topbar',$this->data);
		$this->load->view('admin/private/sidebar',$this->data);
		$this->load->view('admin/private/sub_head',$this->data);
		if($this->menu->cek_menu($this->session->userdata('username')))
		{
			$this->load->view('admin/private/modules/dashboard/dashboard',$this->data);
		}else{
			$this->load->view('admin/private/not_allowed',$this->data);	
		}
		$this->load->view('admin/private/footer');	
		
	}

	public function logout()
	{
        $this->login->logout();
		redirect('admincp');
	}
	
	/*s: PROFILE*/
	
	function profile()
    {	
    	$this->data['active_setting']='active';
		$this->data['active_profile']='class="active"';
		if($this->input->post('submit'))
		{
			if($this->input->post('password')){
				$this->profile->edit_password($this->session->userdata('username'));
			}
			
			$this->profile->edit($this->session->userdata('username'));
			$this->session->set_flashdata('pesan', '<div class="w_true animated bounceInDown"><span class="glyphicon glyphicon-ok"></span> Proses update sukses.</div>');
			redirect('admin/profile');
		
		}else{

			$data_user = $this->profile->user_login($this->session->userdata('username'));
			foreach($data_user as $key => $value)
			{
				$this->data['form_value'][$key] = $value;
			}
			if($flag = $this->uri->segment(3, 0)==1){		
				$this->data['pesan'] = 'Proses update sukses.';
			}
				$this->data['active_menu']='Setting';
				$this->data['active_menu_sub']='Profile';
				$this->data['title_page']='Profile';
				$this->data['form_action']='profile';

				$this->load->view('admin/private/header',$this->data);
				$this->load->view('admin/private/topbar',$this->data);
				$this->load->view('admin/private/sidebar',$this->data);
				$this->load->view('admin/private/sub_head',$this->data);
				if($this->menu->cek_menu($this->session->userdata('username')))
				{
					$this->load->view('admin/private/modules/profile/profile',$this->data);
				}else{
					$this->load->view('admin/private/not_allowed',$this->data);	
				}	
				$this->load->view('admin/private/footer');
		}
	}
	
	/*e: PROFILE*/
	
	/* -----s: ACCOUNT -----*/
	
	/* -----s: User -----*/
	
	function atribut_users(){		
		$this->data['active_menu']='Setting';
		$this->data['active_menu_sub']='Users';
		$this->data['title_page']='Account';
		$this->data['btn_data']='admin/users';
		$this->data['btn_form']='admin/addUsers';
		$this->data['btn_user']='admin/user';
		$this->data['btn_group']='admin/group';
		$this->data['nm_btn_data']='Data User';
		$this->data['nm_btn_form']='Tambah User';
		$this->data['nm_btn_user']='Users';
		$this->data['nm_btn_group']='Group';
	}
	
	function users(){
	
		$this->atribut_users();			
		$this->data['hasil'] = $this->users->all_users();
		$this->data['form_action']='setting';

		$this->load->view('admin/private/header',$this->data);
		$this->load->view('admin/private/topbar',$this->data);
		$this->load->view('admin/private/sidebar',$this->data);
		$this->load->view('admin/private/sub_head',$this->data);
		if($this->menu->cek_menu($this->session->userdata('username')))
		{
			$this->load->view('admin/private/modules/users/users',$this->data);
		}else{
			$this->load->view('admin/private/not_allowed',$this->data);	
		}
		$this->load->view('admin/private/footer');
	}
	
	function addUsers(){
		
		$this->atribut_users();
		// submit
		if($this->input->post('submit'))
		{
			$this->users->input();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible animated bounceInDown" id="alertSubmit">
			<span class="glyphicon glyphicon-ok"></span> <strong>Sukses!</strong> Proses tambah user berhasil.</div>');
			redirect('admin/users');
		
		}else{			
			
			$this->data['nm_button_form']='Entri';
			$this->data['nm_button_form2']='Batal';
			$this->data['hasil'] = $this->group->all_group();		
			$this->data['form_action']='addUsers';

			$this->load->view('admin/private/header',$this->data);
			$this->load->view('admin/private/topbar',$this->data);
			$this->load->view('admin/private/sidebar',$this->data);
			$this->load->view('admin/private/sub_head',$this->data);
			if($this->menu->cek_menu($this->session->userdata('username')))
			{
				$this->load->view('admin/private/modules/users/form_users',$this->data);
			}else{
				$this->load->view('admin/private/not_allowed',$this->data);	
			}
			$this->load->view('admin/private/footer');
		}
	
	}
	
	function editUsers($id_user){
		
		$this->atribut_users();

		if($this->input->post('submit'))
		{	
			$this->users->edit($this->input->post('id_user'));			
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible animated bounceInDown" id="alertSubmit">
			<span class="glyphicon glyphicon-ok"></span> <strong>Sukses!</strong> Proses ubah user berhasil.</div>');
			redirect('admin/users');
		
		}else{			
			
			$get_group = $this->users->cari($id_user);
			foreach($get_group as $key => $value)
			{
				$this->data['form_value'][$key] = $value;
			}
			
			$this->data['hasil'] = $this->group->all_group();
			
			$this->data['nm_button_form']='Update';
			$this->data['nm_button_form2']='Batal';
			$this->data['form_action']='editUsers';

			$this->load->view('admin/private/header',$this->data);
			$this->load->view('admin/private/topbar',$this->data);
			$this->load->view('admin/private/sidebar',$this->data);
			$this->load->view('admin/private/sub_head',$this->data);
			if($this->menu->cek_menu($this->session->userdata('username')))
			{
				$this->load->view('admin/private/modules/users/form_users',$this->data);
			}else{
				$this->load->view('admin/private/not_allowed',$this->data);	
			}
			$this->load->view('admin/private/footer');
		}
	
	}
	
	function deleteUsers($id_user){
		$this->users->delete($id_user);
		$this->session->set_flashdata('pesan', '<div class="w_true animated bounceInDown"><span class="glyphicon glyphicon-ok"></span> Proses hapus user berhasil.</div>');
		redirect('admin/users');
	}
	/* -----e: User -----*/
	
	/* -----s: Group -----*/
	
	function atribut_group(){
		$this->data['active_menu']='Setting';
		$this->data['active_menu_sub']='Group';
		$this->data['title_page']='Group';
		$this->data['btn_data']='admin/group';
		$this->data['btn_form']='admin/addGroup';
		$this->data['btn_user']='admin/users';
		$this->data['btn_group']='admin/group';
		$this->data['nm_btn_data']='Data Group';
		$this->data['nm_btn_form']='Tambah Group';
		$this->data['nm_btn_user']='Users';
		$this->data['nm_btn_group']='Group';
	}
	
	function group(){
	
		$this->atribut_group();
			
		$this->data['hasil'] = $this->group->all_group();
		
		$this->data['form_action']='group';
		
		$this->load->view('admin/private/header',$this->data);
		$this->load->view('admin/private/topbar',$this->data);
		$this->load->view('admin/private/sidebar',$this->data);
		$this->load->view('admin/private/sub_head',$this->data);
		if($this->menu->cek_menu($this->session->userdata('username')))
		{
			$this->load->view('admin/private/modules/group/group',$this->data);
		}else{
			$this->load->view('admin/private/not_allowed',$this->data);	
		}
		$this->load->view('admin/private/footer');
	}
	
	function addGroup(){
		
		$this->atribut_group();
		// submit
		if($this->input->post('submit'))
		{
			if($this->group->input()){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible animated bounceInDown" id="alertSubmit">
				<span class="glyphicon glyphicon-ok"></span> <strong>Sukses!</strong> Proses tambah group berhasil.</div>');
				redirect('admin/group');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible animated bounceInDown" id="alertSubmit">
				<span class="glyphicon glyphicon-remove"></span> <strong>Gagal!</strong> Proses tambah group gagal.</div>');
				redirect('admin/group');
			}
		
		
		}else{			
			
			
			
			$this->data['title_form']='Tambah Group';
			$this->data['nm_button_form']='Entri';
			$this->data['nm_button_form2']='Batal';
			$this->data['hasil'] = $this->group->all_group();		
			$this->data['form_action']='admin/addGroup';

			$this->load->view('admin/private/header',$this->data);
			$this->load->view('admin/private/topbar',$this->data);
			$this->load->view('admin/private/sidebar',$this->data);
			$this->load->view('admin/private/sub_head',$this->data);
			if($this->menu->cek_menu($this->session->userdata('username')))
			{
				$this->load->view('admin/private/modules/group/form_group',$this->data);
			}else{
				$this->load->view('admin/private/not_allowed',$this->data);	
			}
			$this->load->view('admin/private/footer');
		}
	
	}
	
	function editGroup(){
		
		$this->atribut_group();
		// submit
		if($this->input->post('submit'))
		{	
			if($this->group->edit($this->input->post('id_user_group'))){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible animated bounceInDown" id="alertSubmit">
				<span class="glyphicon glyphicon-ok"></span> <strong>Sukses!</strong> Proses ubah group berhasil.</div>');
				redirect('admin/group');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible animated bounceInDown" id="alertSubmit">
				<span class="glyphicon glyphicon-remove"></span> <strong>Gagal!</strong> Proses ubah group gagal.</div>');
				redirect('admin/group');
			}	
		
		}else{			
			$id_user_group = $this->uri->segment(3);
			$get_group = $this->group->cari($id_user_group);
			foreach($get_group as $key => $value)
			{
				$this->data['form_value'][$key] = $value;
			}
			
			$this->data['nm_button_form']='Update';
			$this->data['nm_button_form2']='Batal';
			$this->data['title_form']='Ubah Group';
			$this->data['form_action']='admin/editGroup';

			$this->load->view('admin/private/header',$this->data);
			$this->load->view('admin/private/topbar',$this->data);
			$this->load->view('admin/private/sidebar',$this->data);
			$this->load->view('admin/private/sub_head',$this->data);
			if($this->menu->cek_menu($this->session->userdata('username')))
			{
				$this->load->view('admin/private/modules/group/form_group',$this->data);
			}else{
				$this->load->view('admin/private/not_allowed',$this->data);	
			}
			$this->load->view('admin/private/footer');
		}
	
	}
	
	function deleteGroup($id_user_group){
		
		
		if($this->group->delete($id_user_group)){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible animated bounceInDown" id="alertSubmit">
			<span class="glyphicon glyphicon-ok"></span> <strong>Sukses!</strong> Proses hapus group berhasil.</div>');
			redirect('admin/group');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible animated bounceInDown" id="alertSubmit">
			<span class="glyphicon glyphicon-remove"></span> <strong>Gagal!</strong> Proses hapus group berhasil gagal.</div>');
			redirect('admin/group');
		}
	}
	
	/* -----e: Group -----*/
	
	/* -----e: ACCOUNT -----*/
	
	/* -----s: Seleb -----*/
	
	function atribut_seleb(){				
		$this->data['active_menu']='Selebritis';
		$this->data['active_menu_sub']='';
		$this->data['title_page']='Selebritis';
		$this->data['btn_data']='admin/seleb';
		$this->data['btn_form']='admin/addSeleb';
		$this->data['btn_seleb']='admin/seleb';
		$this->data['btn_group']='admin/group';
		$this->data['nm_btn_data']='Data Selebritis';
		$this->data['nm_btn_form']='Tambah Selebritis';
		//$this->data['nm_btn_seleb']='seleb';
		//$this->data['nm_btn_group']='Group';
	}
	
	function seleb(){
	
		$this->atribut_seleb();			
		$this->data['hasil'] = $this->seleb->all_seleb();
		$this->data['form_action']='setting';

		$this->load->view('admin/private/header',$this->data);
		$this->load->view('admin/private/topbar',$this->data);
		$this->load->view('admin/private/sidebar',$this->data);
		$this->load->view('admin/private/sub_head',$this->data);
		if($this->menu->cek_menu($this->session->userdata('username')))
		{
			$this->load->view('admin/private/modules/seleb/seleb',$this->data);
		}else{
			$this->load->view('admin/private/not_allowed',$this->data);	
		}
		$this->load->view('admin/private/footer');
	}
	
	function addSeleb(){
		
		$this->atribut_seleb();
		// submit
		if($this->input->post('submit'))
		{
			$this->seleb->input();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible animated bounceInDown" id="alertSubmit">
			<span class="glyphicon glyphicon-ok"></span> <strong>Sukses!</strong> Proses tambah seleb berhasil.</div>');
			redirect('admin/seleb');
		
		}else{			
			$this->data['title_form']='From Tambah';
			$this->data['nm_button_form']='Entri';
			$this->data['nm_button_form2']='Batal';	
			$this->data['form_action']='addSeleb';
			$this->editor();
			$this->load->view('admin/private/header',$this->data);
			$this->load->view('admin/private/topbar',$this->data);
			$this->load->view('admin/private/sidebar',$this->data);
			$this->load->view('admin/private/sub_head',$this->data);
			if($this->menu->cek_menu($this->session->userdata('username')))
			{
				$this->load->view('admin/private/modules/seleb/form_seleb',$this->data);
			}else{
				$this->load->view('admin/private/not_allowed',$this->data);	
			}
			$this->load->view('admin/private/footer');
		}
	
	}
	
	function editSeleb($id_seleb){
		
		$this->atribut_seleb();

		if($this->input->post('submit'))
		{	
			$this->seleb->edit($this->input->post('id_seleb'));			
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible animated bounceInDown" id="alertSubmit">
			<span class="glyphicon glyphicon-ok"></span> <strong>Sukses!</strong> Proses ubah seleb berhasil.</div>');
			redirect('admin/seleb');
		
		}else{			
			
			$get_group = $this->seleb->cari($id_seleb);
			foreach($get_group as $key => $value)
			{
				$this->data['form_value'][$key] = $value;
			}
			$this->editor();
			$this->data['title_form']='From Ubah';
			$this->data['nm_button_form']='Update';
			$this->data['nm_button_form2']='Batal';
			$this->data['form_action']='editseleb';

			$this->load->view('admin/private/header',$this->data);
			$this->load->view('admin/private/topbar',$this->data);
			$this->load->view('admin/private/sidebar',$this->data);
			$this->load->view('admin/private/sub_head',$this->data);
			if($this->menu->cek_menu($this->session->userdata('username')))
			{
				$this->load->view('admin/private/modules/seleb/form_seleb',$this->data);
			}else{
				$this->load->view('admin/private/not_allowed',$this->data);	
			}
			$this->load->view('admin/private/footer');
		}
	}
	
	function deleteSeleb($id_seleb){
		$this->seleb->delete($id_seleb);
		$this->session->set_flashdata('pesan', '<div class="w_true animated bounceInDown"><span class="glyphicon glyphicon-ok"></span> Proses hapus seleb berhasil.</div>');
		redirect('admin/seleb');
	}
	/* -----e: Seleb -----*/
}