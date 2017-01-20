<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

    public $db_tabel = 'user';

	public function all_users()
    {

		$ambil = $this->db->select('*')
                        ->from($this->db_tabel)
                        ->join('user_group', 'user_group.id_user_group = user.id_user_group')
						->order_by('user.id_user', 'DESC')
                        ->get()
                        ->result();	
        return $ambil;          

    }
	
	public function cari($id_user)
    {
        return $this->db->where('id_user', $id_user)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row();
    }
	
	public function input()
    {	

		$new_pass=md5($this->input->post('pass_user'));
		$data_user = array(
			'submit_date_user' => date('Y-m-d'),
			'id_user_group' => $this->input->post('id_user_group'),
            'username' => $this->input->post('username'),
            'pass_user' => $new_pass,
			'nm_user' => $this->input->post('nm_user'),					
            'email_user' => $this->input->post('email_user'),
			'hp_user' => $this->input->post('hp_user'),
			'active_user' => $this->input->post('active_user')
        );
        $this->db->insert($this->db_tabel, $data_user);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	public function edit($id_user)
    {
		if($this->input->post('pass_user'))
		{
			$new_pass=md5($this->input->post('pass_user'));
			
			echo $this->input->post('pass_user');
			echo"<p>pass: $new_pass";
			
			$data_update = array(
				'pass_user' => $new_pass,
			);
			
			 // update db
			$this->db->where('id_user', $id_user);
			$this->db->update($this->db_tabel, $data_update);
		}
		
        $data_update = array( 
			'id_user_group'=>$this->input->post('id_user_group'),
            'username'=>$this->input->post('username'),
			'nm_user'=>$this->input->post('nm_user'),
			'email_user'=>$this->input->post('email_user'),
			'hp_user'=>$this->input->post('hp_user'),
			'active_user'=>$this->input->post('active_user'),
        );

        // update db
        $this->db->where('id_user', $id_user);
        $this->db->update($this->db_tabel, $data_update);
    }
	
	public function delete($id_user)
    {
        
		$this->db->where('id_user', $id_user)->delete($this->db_tabel);
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