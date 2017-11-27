<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Model_pendaftaran extends CI_Model{	
		
	public function __construct() {
		parent::__construct();
	}
		
	public function insert($data){
        $this->db->insert('sf_guard_user',$data);
	}

}
?>