<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admincp extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Login_admin_model', 'login', TRUE);
		$this->load->model('General_model', 'general');
		
		$this->atribut();	
	}
	
	public function atribut(){
		
		$data_g = $this->general->load_data();
		foreach($data_g as $key => $value)
		{
			$this->data['data_g'][$key] = $value;
		}
	}
	
	public function index()
    {	
		// load the session library
		$this->load->library('session');
		$this->load->helper(array('captcha','url'));
		//load codeigniter captcha helper

		$this->data['btn_lost_password'] = "admincp/lostpassword";		
		// validasi sukses
		if($this->login->validasi())
		{	
			
			if((strtolower($this->input->post('secutity_code')) == strtolower($this->session->userdata('mycaptcha')))){
			
				// cek di database sukses
				if($this->login->cek_user())
				{		
					redirect('admin');
				}
				// cek database gagal
				else
				{	

					$this->load->helper('captcha');
					$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
					$vals = array(
						'word' => $random_number,	
						'img_path'	 => './captcha/',
						'img_url'	 => base_url().'captcha/',
						'img_width'	 => '200',
						'img_height' => 30,
						'border' => 0, 
						'expiration' => 7200
					);
					
					// create captcha image
					$cap = create_captcha($vals);

					// store image html code in a variable
					$this->data['image'] = $cap['image'];

					// store the captcha word in a session
					$this->session->set_userdata('mycaptcha', $cap['word']);
					
					//$data['image'] = $this-> captcha();					
					$this->session->set_flashdata('pesan', '<div class="w_false animated bounceInDown"><span class="glyphicon glyphicon-remove"></span> Kombinasi Username dan Password Anda salah.</div>');
					redirect('admincp');
					
				}
			
			}else
			{	
				$this->load->helper('captcha');
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$vals = array(
					'word' => $random_number,	
					'img_path'	 => './captcha/',
					'img_url'	 => base_url().'captcha/',
					'img_width'	 => '200',
					'img_height' => 30,
					'border' => 0, 
					'expiration' => 7200
				);

				// create captcha image
				$cap = create_captcha($vals);

				// store image html code in a variable
				$this->data['image'] = $cap['image'];

				// store the captcha word in a session
				$this->session->set_userdata('mycaptcha', $cap['word']);
				//$data['image'] = $this-> captcha();				
				$this->session->set_flashdata('pesan', '<div class="w_false animated bounceInDown"><span class="glyphicon glyphicon-remove"></span> Security Code yang Anda masukan salah.</div>');
				redirect('admincp');
			}
		}
		// validasi gagal
		else
		{	

			// status user login = BENAR, pindah ke halaman admin
			if ($this->session->userdata('login') == TRUE)
			{
					
				//redirect('dashboard');
				$this->data['title_page']="DASHBOARD";
				$this->load->view('admin/private/header',$this->data);
				$this->load->view('admin/private/main_menu');
				$this->load->view('admin/private/modules/dashboard/dashboard',$this->data);
				$this->load->view('admin/private/footer');
			}
			// status login salah, tampilkan form login
			else
			{	
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				$vals = array(
					'word' => $random_number,	
					'img_path'	 => './captcha/',
					'img_url'	 => base_url().'captcha/',
					'img_width'	 => '200',
					'img_height' => 32,
					'border' => 0, 
					'expiration' => 7200
				);

				// create captcha image
				$cap = create_captcha($vals);

				// store image html code in a variable
				$this->data['image'] = $cap['image'];

				// store the captcha word in a session
				$this->session->set_userdata('mycaptcha', $cap['word']);			
				
				$this->load->view('admin/public/header', $this->data);
				$this->load->view('admin/public/form_login', $this->data);
				$this->load->view('admin/public/footer', $this->data);
			}
		}
		
	}
	
	function lostpassword(){	
		$this->data['title_web'] = $this->data['data_g']['title_web'];
		if($this->input->post('username'))
		{ 
			if($this->login->cek_username()){
				
				$this->login->delete_reset_pass();
				$this->login->input_reset_pass();
				$hasil_g = $this->general->general();
				foreach($hasil_g as $data_g)
				{
					$namadomain = $data_g->domain;
					$from_email = $data_g->email_support;
				}
				
				$get_member = $this->login->cari_username();
				foreach($get_member as $key => $value)
				{
					$this->data['form_value'][$key] = $value;
				}
				$email_user = $this->data['form_value']['email_user']; 
				$nm_user = $this->data['form_value']['nm_user']; 
				$username = $this->data['form_value']['username']; 				
				$kode = $this->input->post('code_reset_pass');
				
				$email   = "$email_user";
				$subject = "Informasi Reset Password";
				$headers = "From: $namadomain <$from_email>\n";
				$headers .= "X-Priority: 1\n"; // Urgent message!
				$message  = "\n";
				$message .= "Hallo $nm_user, 

System kami menerima informasi bahwa Anda akan melakukan Reset Password, Silakan anda akses Url dibawah ini:

http://$namadomain/admincp/resetpassword

Dan kemudian masukan Username dan Kode dibawah ini:

Username: $username
Kode Reset: $kode 

Jika Anda telah berhasil login menggunakan Username dan Kode diatas silakan Anda masukan Password Login Anda yang baru dan mudah Anda ingat. Dan apabila Anda tidak ingin melakukan Reset Password abaikan saja pesan ini.

Terima kasih.";
				mail($email, $subject, $message, $headers);	
			
			$data = array(
					'email_user' => $email_user, 
					);
					
            $this->session->set_userdata($data);
			
				redirect('admincp/infolostpassword');
			}else{
				$this->session->set_flashdata('pesan', '<div class="w_false animated bounceInDown"><span class="glyphicon glyphicon-remove"></span> Username yang Anda masukan tidak terdaftar.</div>');
				redirect('admincp/lostpassword');
			}
			
		}else{ 
			$this->data['code_reset_pass'] = $this->angkauniknya();
			$this->data['title_web'] = $this->data['data_g']['title_web'];
			$this->data['btn_cancel'] = "admincp";
			$this->data['form_action'] = "lostpassword";
			$this->load->view('admin/public/header', $this->data);
			$this->load->view('admin/public/lost_password', $this->data);
			$this->load->view('admin/public/footer');
		}
	}
	
	function infolostpassword(){
		$this->data['title_web'] = $this->data['data_g']['title'];
		$this->data['email_user']=$this->session->userdata('email_user');
		$this->load->view('admin/head_public', $this->data);
		$this->load->view('admin/header_public', $this->data);
		$this->load->view('admin/info_lost_password', $this->data);
		$this->load->view('admin/footer_public');
	}
	
	function resetpassword(){
		$this->data['title_web'] = $this->data['data_g']['title'];
		
		if($this->input->post('submit'))
		{
			if($this->login->cek_username_reset()){
				$data = array(
					'username' => $this->input->post('username'),
					'code_reset_pass' => $this->input->post('code_reset_pass')
					);
					
				$this->session->set_userdata($data);
				
				redirect('admincp/formresetpassword');
				
			}else{
				$this->session->set_flashdata('pesan', '<span class="glyphicon glyphicon-remove"></span> Username dan Kode Reset tidak terdaftar.');
				redirect('admincp/resetpassword');
			}
		
		}else{
			$this->data['form_action'] = "admincp/resetpassword";
			$this->load->view('admin/head_public', $this->data);
			$this->load->view('admin/header_public', $this->data);
			$this->load->view('admin/reset_password', $this->data);
			$this->load->view('admin/footer_public');
		}	
	}
	
	function formresetpassword(){ 
		$this->data['title_web'] = $this->data['data_g']['title'];
		if($this->login->confirm_username_reset($this->session->userdata('username'),$this->session->userdata('code_reset_pass'))){
			
			if($this->input->post('submit'))
			{
				if($this->input->post('password')==$this->input->post('password2'))
				{
				
				$this->login->proses_reset_pass();
				$hasil_g = $this->general->general();
				foreach($hasil_g as $data_g)
				{
					$namadomain = $data_g->domain;
					$from_email = $data_g->email_support;
				}
				
				$get_member = $this->login->cari_username();
				foreach($get_member as $key => $value)
				{
					$this->data['form_value'][$key] = $value;
				}
				
				$email_user = $this->data['form_value']['email_user']; 
				$nm_user = $this->data['form_value']['nm_user']; 
				$username = $this->data['form_value']['username']; 				
				$password = $this->input->post('password');
				
				$email   = "$email_user";
				$subject = "Informasi Password Baru Anda";
				$headers = "From: $namadomain <$from_email>\n";
				$headers .= "X-Priority: 1\n"; // Urgent message!
				$message  = "\n";
				$message .= "Hallo $nm_user, 

Sesuai dengan permintaan Anda bahwa password login Anda bermasil di reset.

Username: $username
Password: $password 

Demikian informasi ini disampikan.

Terima kasih.";
			//	mail($email, $subject, $message, $headers);	
				$this->login->delete_reset_pass();
				redirect('admincp/inforesetpassword');
				
				}else{
					$this->session->set_flashdata('pesan', '<span class="glyphicon glyphicon-remove"></span> Kombinasi password yang Anda masukan salah.');
					redirect('admincp/formresetpassword');
				}
				
			}else{
				$this->data['username'] = $this->session->userdata('username');
				$this->data['form_action'] = "admincp/formresetpassword";
				$this->load->view('admin/head_public', $this->data);
				$this->load->view('admin/header_public', $this->data);
				$this->load->view('admin/form_reset_password', $this->data);
				$this->load->view('admin/footer_public');
			}
			
			
		}else{
			redirect('admincp/resetpassword');
		}	
	}
	
	function inforesetpassword(){
		$this->data['title_web'] = $this->data['data_g']['title'];
		$this->data['email_user']=$this->session->userdata('email_user');
		$this->load->view('admin/head_public', $this->data);
		$this->load->view('admin/header_public', $this->data);
		$this->load->view('admin/info_reset_password', $this->data);
		$this->load->view('admin/footer_public');
	}
	
	function angkauniknya(){
	  $the_char = array(
		 "1","2","3","4","5","6","7","8","9"
	  );
	  $max_elements = count($the_char) - 1;
	  srand((double)microtime()*1000000);
	  $c1 = $the_char[rand(0,$max_elements)];
	  $c2 = $the_char[rand(0,$max_elements)];
	  $c3 = $the_char[rand(0,$max_elements)];
	  $c4 = $the_char[rand(0,$max_elements)];
	  $c5 = $the_char[rand(0,$max_elements)];
	  $c6 = $the_char[rand(0,$max_elements)];
	  $c7 = $the_char[rand(0,$max_elements)];
	  $c8 = $the_char[rand(0,$max_elements)];
	  $c9 = $the_char[rand(0,$max_elements)];
	  $c10 = $the_char[rand(0,$max_elements)];
	  $ranc = "$c1$c2$c3$c4$c5";
	  return $ranc;
	}

}

/* 	
Author: Lalang Gumirang 
Website: lalangdesign.com
*/
?>