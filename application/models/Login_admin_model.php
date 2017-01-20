<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin_model extends CI_Model {

    public $db_tabel = 'user';
	public $db_tabel2 = 'reset_pass_user';
	
    public function load_form_rules()
    {
        $form_rules = array(
                            array(
                                'field' => 'username',
                                'label' => 'Username',
                                'rules' => 'required'
                            ),
                            array(
                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'required'
                            ),
							array(
                                'field' => 'secutity_code',
                                'label' => 'Secutity Code',
                                'rules' => 'required'
                            ),
        );
        return $form_rules;
    }

    public function validasi()
    {
        $form = $this->load_form_rules();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    // cek status user, login atau tidak?
    public function cek_user()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $query = $this->db->where('username', $username)
                          ->where('pass_user', $password)
						  ->where('active_user', 'Y')
                          ->limit(1)
                          ->get($this->db_tabel);

        if ($query->num_rows() == 1)
        {
            $data = array('username' => $username, 'login_admin' => TRUE);
            // buat data session jika login benar
            $this->session->set_userdata($data);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function logout()
    {	
        $this->session->unset_userdata(array('username' => '', 'login_admin' => FALSE));
        $this->session->sess_destroy();
    }
	
	public function cek_username()
    {
        $username = $this->input->post('username');

        $query = $this->db->where('username', $username)
                          ->limit(1)
                          ->get($this->db_tabel);

        if ($query->num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	public function cari_username()
    {	
		$username = $this->input->post('username');
        return $this->db->where('username', $username)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row();
    }
	
	public function input_reset_pass()
    {	
		$date_now = gmdate("Y-m-d", time()+60*60*7); 
		$username=strip_tags($this->input->post('username'));
		$username=str_replace(" ", "", $username);
		$username= preg_replace('/\W/', '', $username);
		$data_group = array(
			'username' => $username,
			'submit_date_reset_pass' => $date_now,
			'code_reset_pass'=> $this->input->post('code_reset_pass')
        );
        $this->db->insert($this->db_tabel2, $data_group);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	public function cek_username_reset()
    {
        $username = $this->input->post('username');
		$code_reset_pass = $this->input->post('code_reset_pass');
        $query = $this->db->where('username', $username)
						  ->where('code_reset_pass', $code_reset_pass)	
                          ->limit(1)
                          ->get($this->db_tabel2);

        if ($query->num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	public function confirm_username_reset($username,$code_reset_pass)
    {

        $query = $this->db->where('username', $username)
						  ->where('code_reset_pass', $code_reset_pass)	
                          ->limit(1)
                          ->get($this->db_tabel2);

        if ($query->num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	public function proses_reset_pass(){
	
		$data_update = array(       
			'pass_user' => md5($this->input->post('password'))
        );
	
        // update db
        return $this->db->where('username', $this->input->post('username'))
						->update($this->db_tabel, $data_update);
	}
	
	public function delete_reset_pass()
    {
       
		$this->db->where('username', $this->input->post('username'))->delete($this->db_tabel2);
        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}

/* 	
Author: Lalang Gumirang 
Website: lalangdesign.com
*/