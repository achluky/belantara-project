<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_campus extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listcampus()
    {
        $this->db->select('*');
        $this->db->from('campus');
        return $this->db->get();
    }
	
	public function save_campus($data){
        $this->db->insert('campus',$data);
        return TRUE;
    }
	
	public function get_campus_by_id($id){
        $this->db->select('*');
        $this->db->from('campus');
        $this->db->where('campus.id',$id);
        return $this->db->get()->row();   
    }
	
	public function update_campus($id,$data){
        $this->db->where('id',$id);
        $this->db->update('campus',$data);
        return TRUE;
    }
	
	public function delete_campus($id){
        $this->db->where('id',$id);
        $this->db->delete('campus');
        return TRUE;
    }
}
