<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_department extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listdepartmen()
    {
        $this->db->select('*');
        $this->db->from('m_department');
        return $this->db->get();
    }

    public function get_department_by_id($id){
        $this->db->select('*');
        $this->db->from('m_department');
        $this->db->where('m_department.id',$id);
        return $this->db->get()->row();   
    }

    public function get_department_by_id_faculty($id_faculty){
        $this->db->select('*');
        $this->db->from('m_department');
        $this->db->where('m_department.id_faculty',$id_faculty);
        return $this->db->get();
    }
    
    public function save_department($data){
        $this->db->insert('m_department',$data);
        return TRUE;
    }

    public function update_department($id,$data){
        $this->db->where('id',$id);
        $this->db->update('m_department',$data);
        return TRUE;
    }

    public function delete_department($id){
        $this->db->where('id',$id);
        $this->db->delete('m_department');
        return TRUE;
    }
}
