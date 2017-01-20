<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends CI_Model {

    public $db_tabel = 'user_group';
	public $db_tabel2 = 'user_menu';
	public $db_tabel3 = 'user';
	
	public function priv_allowed($username,$id_user_menu)
    { 
		return $this->db->select('privilege_user_group')	
				->from($this->db_tabel)	
				->join($this->db_tabel3, 'user.id_user_group = user_group.id_user_group', 'left')
				->where('user.username', $username)
				->like('user_group.privilege_user_group', $id_user_menu)
				->get()->result();
	}	
	
	public function priv_menu()
    {
		return $this->db->select('*')
                        ->from($this->db_tabel2)	
						->where('id_parent_user_menu', '0')		
                        ->order_by('no_urut_user_menu', 'asc')
                        ->get()->result();
    }
	
	public function priv_menu_child($id_user_menu)
    {
		return $this->db->select('*')
                        ->from($this->db_tabel2)	
						->where('id_parent_user_menu', $id_user_menu)		
                        ->order_by('no_urut_user_menu', 'asc')
                        ->get()->result();
    }
	
	public function all_group()
    {

		$ambil = $this->db->get($this->db_tabel);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
               $hasil[] = $data;
           }
            return $hasil;          
        }
    }

	public function input()
    {	

		$data_group = array(
            'nm_user_group' => $this->input->post('nm_user_group')
        );
        $this->db->insert($this->db_tabel, $data_group);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	public function cari($id_user_group)
    {
        return $this->db->where('id_user_group', $id_user_group)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row();
    }
	
	public function edit($id_user_group)
    { 

        $data_update = array(            
            'nm_user_group'=>$this->input->post('nm_user_group')
        );

        // update db
        $this->db->where('id_user_group', $id_user_group);		
		if( $this->db->update($this->db_tabel, $data_update))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	public function delete($id_user_group)
    {
		$this->db->where('id_user_group', $id_user_group)->delete($this->db_tabel);
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