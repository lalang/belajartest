<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends CI_Model {

    public $db_tabel = 'general';
	
	public function load_data()
    {
		return $this->db->limit(1)
						->get($this->db_tabel)
						->row();
    }
	
	public function general(){
	
		return $this->db->select('*')
                        ->from($this->db_tabel)
                        ->get()
						->result();
	}
	
	public function edit($no)
    {			
        $data_update = array(           
			'domain'=>$this->input->post('domain'),	
			'title_web'=>$this->input->post('title_web'),	
			'description'=>$this->input->post('description'),
			'keywords'=>$this->input->post('keywords'),
			'footer'=>$this->input->post('footer'),
			'form_editor'=>$this->input->post('form_editor'),
        );

        // update db
        $this->db->where('no', $no);
        $this->db->update($this->db_tabel, $data_update);
    }
	
}

/* Autor: Lalang Gumirang */