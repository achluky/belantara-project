<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_home extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_employee_management()
    {
    	$sql = "select * from person where idcategory = 7";
    	$result = $this->db->query($sql);
    	return $result;
    }
    
    public function get_employee_adv_committee()
    {
    	$sql = "select * from person where idcategory = 12";
    	$result = $this->db->query($sql);
    	return $result;
    }

    public function get_employee_boards(){
        $sql = "select a.*, b.category_EN, b.category_ID from person a left join ref_category_employee b ON b.id = a.idcategory where a.idcategory <> 7 and a.idcategory <> 12";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_boards_category(){
        $sql = "select * from ref_category_employee where id <> 7 and id <> 12";
        $result = $this->db->query($sql);
        return $result;
    }
    
    public function get_detail_boards($id)
    {
        $sql = "select * from person a left join ref_category_employee b ON b.id = a.idcategory where a.idPerson=$id";
        $result = $this->db->query($sql);
        return $result->row();
    }
}
