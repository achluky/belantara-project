<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Infografis extends CI_Controller {

	public $url;
    public $sess;
	public function __construct() 
    {
        parent::__construct();
        //cek session login
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $this->load->library('navbar');
        $this->load->library('upload');
        $this->navbar->setMenuActive('infografis');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
		$this->load->model('model_infografis');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }
}
