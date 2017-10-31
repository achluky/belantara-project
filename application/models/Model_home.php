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

    public function get_employee_boards(){
        
    }
}
