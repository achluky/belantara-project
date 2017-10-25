<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen {
		
    public function __construct() { }
    
	public function run($controller, $change) { 
		switch($change){
			default: $this->listdata($controller);
		}
	}
	public function listdata($controller){ 
		$controller->load->model('model_json_autocomplite');
		
		$q = null;
		if(isset($_POST['data']))
			if(isset($_POST['data']['q']))
				$q = $_POST['data']['q'];

		$results = array();
		if($q!=null){
			$results = $controller->model_json_autocomplite->search_dosen($q);
		}
		echo json_encode(array('q' => $q, 'results' => $results));
	}
}
