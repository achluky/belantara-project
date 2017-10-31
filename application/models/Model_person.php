<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_person extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listperson()
    {
    	$sql = "select * from person join ref_category_employee ON person.idcategory=ref_category_employee.id JOIN ref_sub_category_employee ON ref_sub_category_employee.id=person.idsubcategory ORDER BY create_date DESC";
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
}
