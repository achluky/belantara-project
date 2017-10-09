<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }		
    }

    public function index() {}
    
    public function mahasiswa_json($parameter=NULL){
		
      	$this->load->library('JSON/mahasiswa');
		$this->mahasiswa->run($this, $parameter);
    
	}
    
    public function dosen_json($parameter=NULL){
		
      	$this->load->library('JSON/dosen');
		$this->dosen->run($this, $parameter);
    
	}
}
