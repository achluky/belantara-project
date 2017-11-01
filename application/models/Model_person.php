<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_person extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listperson()
    {
    	$sql = "select * from person join ref_category_employee ON person.idcategory=ref_category_employee.id ORDER BY create_date DESC";
    	$result = $this->db->query($sql);
    	return $result;
    }
    public function get_listcategory(){
        $sql = "select * from ref_category_employee";
        $result = $this->db->query($sql);
        return $result;
    }
    public function get_listsub_category(){
        $sql = "select * from ref_sub_category_employee";
        $result = $this->db->query($sql);
        return $result;
    }
    public function save_person($data){
        $this->db->insert('person',$data);
        return TRUE;
    }

    public function get_page_by_id($id){
        $this->db->select('*');
        $this->db->from('person');
        $this->db->where('idPerson',$id);
        return $this->db->get()->row();
    }

    public function update($id,$data){
        $this->db->where('idPerson',$id);
        $this->db->update('person',$data);
        return TRUE;
    }

    public function delete($id){
        $hasil['idPerson'] = $id;
        $this->db->delete('person',$hasil);
        return TRUE;
    }
}
