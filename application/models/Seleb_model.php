<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seleb_model extends CI_Model {

    public $db_tabel = 'seleb';

	public function all_seleb()
    {

		$ambil = $this->db->select('*')
                        ->from($this->db_tabel)
						->order_by('id_seleb', 'DESC')
                        ->get()
                        ->result();	
        return $ambil;          

    }
	
	public function cari($id_seleb)
    {
        return $this->db->where('id_seleb', $id_seleb)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row();
    }
	
	public function input()
    {	

		$new_pass=md5($this->input->post('pass_user'));
		$data_user = array(
			'submit_date_seleb' => date('Y-m-d'),
			'nm_seleb' => $this->input->post('nm_seleb'),
            'biography_seleb' => $this->input->post('biography_seleb'),
			'active_seleb' => $this->input->post('active_seleb')
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
	
	public function edit($id_seleb)
    {
		
        $data_update = array( 
			'nm_seleb' => $this->input->post('nm_seleb'),
            'biography_seleb' => $this->input->post('biography_seleb'),
			'active_seleb' => $this->input->post('active_seleb')
        );

        // update db
        $this->db->where('id_seleb', $id_seleb);
        $this->db->update($this->db_tabel, $data_update);
    }
	
	public function delete($id_seleb)
    {
        
		$this->db->where('id_seleb', $id_seleb)->delete($this->db_tabel);
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