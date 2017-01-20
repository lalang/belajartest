<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Web_Controller extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
		//$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('encrypt');
//		$this->load->model('Sponsor_vip_model', 'sponsor_vip');

		
		//Main Menu
		/*$this->data["active_faq"]="";
		$this->data["active_gallery"]="";
		$this->data["active_stokis"]="";
		$this->data["active_download"]="";
		$this->data["active_testimonial"]="";
		$this->data["active_kontak"]="";
		*/
		$this->atribut();
    }

	function atribut()
    {	
		
	}
}

class Adminarea extends MY_Controller {

    public function __construct() {
        parent::__construct();
		//$this->load->model('General_model', 'general');


		if ($this->session->userdata('login_admin') == FALSE)
        {
			redirect('admincp');
        }
		
		$this->atribut_adm();
    }
	
	function atribut_adm()
    {	
		
	}
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */