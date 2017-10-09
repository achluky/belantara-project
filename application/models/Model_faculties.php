<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_faculties extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listfaculties()
    {
        $this->db->select('*');
        $this->db->from('m_faculties');
        return $this->db->get();
    }

    public function get_faculties_by_id($id){
        $this->db->select('*');
        $this->db->from('m_faculties');
        $this->db->where('m_faculties.id',$id);
        return $this->db->get()->row();   
    }
    
    public function save_faculties($data){
        $this->db->insert('m_faculties',$data);
        return TRUE;
    }

    public function update_faculties($id,$data){
        $this->db->where('id',$id);
        $this->db->update('m_faculties',$data);
        return TRUE;
    }

    public function delete_faculties($id){
        $this->db->where('id',$id);
        $this->db->delete('m_faculties');
        return TRUE;
    }
}
