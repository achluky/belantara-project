<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Model_profil extends CI_Model{	
		
	public function __construct() {
		parent::__construct();
	}
		
	public function insert($data){
        $this->db->insert('applican_biodata',$data);
        return $this->db->error();
	}

	public function get($id){
		$query = $this->db->query("SELECT * FROM applican_biodata WHERE id_user = ".$id."");
		if ($query->num_rows()>0) {
			return $query->row();
        } else {
            return NULL;
        }
	}

	public function update($data, $id){
		$this->db->where('id_biodata', $id);
		$this->db->update('applican_biodata', $data);
        return $this->db->error();
	}

	public function get_email($id){
		$query = $this->db->query("SELECT * FROM sf_guard_user WHERE id = ".$id."");
		return $query->row();
	}
	public function update_email($data, $id){
		$this->db->where('id', $id);
		$this->db->update('sf_guard_user', $data);
        return $this->db->error();
	}
}
?>