<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public $db_tabel = 'user';
	public $db_tabel2 = 'user_group';
	
    public function user_login($user)
    {
       return $this->db->where('user.username', $user)
			->join($this->db_tabel2, 'user_group.id_user_group = user.id_user_group', 'left')
            ->limit(1)
            ->get($this->db_tabel)
            ->row();
    }
	
	public function edit($user)
    {
        $data_profile = array(            
            'nm_user'=>$this->input->post('nm_user'),
			'email_user'=>$this->input->post('email_user'),
			'hp_user'=>$this->input->post('hp_user'),
        );

        // update db
        $this->db->where('username', $user);
        $this->db->update($this->db_tabel, $data_profile);
    }
	
	public function edit_password($user)
    {
        $data_profile = array(            
            'pass_user '=>md5($this->input->post('password')),
        );

        // update db
        $this->db->where('username', $user);
        $this->db->update($this->db_tabel, $data_profile);

    }
	
	public function editImage($photo)
    {
        $data_update = array(     
			'photo_user' => $photo,	      
        );
		$id_user = $this->input->post('id_user');

        // update db
        $this->db->where('id_user', $id_user);
        $this->db->update($this->db_tabel, $data_update);
    }
	
	public function emptyImage($user)
    {
        $data_update = array(     
			'photo_user' => "",	      
        );

        // update db
        $this->db->where('username', $user);
        $this->db->update($this->db_tabel, $data_update);
    }

}

/* 	
Author: Lalang Gumirang 
Website: lalangdesign.com
*/