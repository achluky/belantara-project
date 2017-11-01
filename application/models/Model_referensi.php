<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_referensi extends CI_Model {

	
    public function __construct()
    {
        parent::__construct();
    }

    // ref category employee
    public function get_category(){
        $sql = "select * from ref_category_employee ORDER BY id DESC";
        $result = $this->db->query($sql);
        return $result;
    }

    public function save_category_employee($data){
        $this->db->insert('ref_category_employee',$data);
        return TRUE;
    }

    public function get_category_byid($id){
        $this->db->select('*');
        $this->db->from('ref_category_employee');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }

    public function update_category_employe($id,$data){
        $this->db->where('id',$id);
        $this->db->update('ref_category_employee',$data);
        return TRUE;
    }

    public function delete($id){
        $hasil['id'] = $id;
        $this->db->delete('ref_category_employee',$hasil);
        return TRUE;
    }

}

