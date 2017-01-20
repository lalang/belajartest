<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public $db_tabel = 'adm_menu';
	
	public function loadAllMenu($prev)
    { 	
		return $this->db->where('id_parent_adm_menu', null)
					->where('priv_adm_menu', $prev)
					->where('active_adm_menu', 'Y')
					->from($this->db_tabel)	
					->get()->result();
	}	
	
	public function loadAllMenuSub($id_parent_adm_menu, $prev)
    { 
		return $this->db->where('id_parent_adm_menu', $id_parent_adm_menu)
					->where('priv_adm_menu', $prev)
					->where('active_adm_menu', 'Y')
					->from($this->db_tabel)	
					->get()->result();
	}
	
	public function cek_menu($prev)
    {
        //return $this->db->count_all($this->db_tabel);
		$this->db->select('*')
				->from($this->db_tabel)	
				->where('priv_adm_menu', $prev)
				->where('active_adm_menu', 'Y');
		return $this->db->count_all_results();
    }
}
/* 	
Author: Lalang Gumirang 
Website: lalangdesign.com
*/