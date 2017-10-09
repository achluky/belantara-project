<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_reputation extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listreputation()
    {
        $this->db->select('*');
        $this->db->from('reputation');
        return $this->db->get();
    }

    public function get_reputation_by_id($id){
        $this->db->select('*');
        $this->db->from('reputation');
        $this->db->where('reputation.id',$id);
        return $this->db->get()->row();   
    }
    
    public function save_reputation($data){
        $this->db->insert('reputation',$data);
        return TRUE;
    }

    public function update_reputation($id,$data){
        $this->db->where('id',$id);
        $this->db->update('reputation',$data);
        return TRUE;
    }

    public function delete_reputation($id){
        $this->db->where('id',$id);
        $this->db->delete('reputation');
        return TRUE;
    }
}
