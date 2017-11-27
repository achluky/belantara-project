<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Model_grant extends CI_Model{	
		
	public function __construct() {
		parent::__construct();
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
	
	//
	public function grant($id_biodata){
		return $this->db->query("SELECT * FROM `grant` WHERE id_biodata = ".$id_biodata."");
	}

	public function get_grant($id_grant){
		$query = $this->db->query("SELECT * FROM `grant` WHERE id_grant = ".$id_grant."");
		return $query->row();
	}

	public function insert_grant($data){
        $this->db->insert('grant',$data);
        return $this->db->error();
	}

	public function update_grant($data, $id){
		$this->db->where('id_grant', $id);
		$this->db->update('grant', $data);
        return $this->db->error();
	}


	public function get_poyek($id){
		$query = $this->db->query("SELECT * FROM `grant_proyek` WHERE id_grant = ".$id."");
		return $query->row();
	}

	public function insert_grant_proyek($data){
        $this->db->insert('grant_proyek',$data);
        return $this->db->error();
	}
}
?>