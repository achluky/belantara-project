<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('model_home');
        $this->url = current_url();
    }

    public function index() {
        $this->smartyci->display('front-end/index.tpl');
    }

    public function management(){
    	$data = array(
            'url'=> $this->url,

            'employee_management' => $this->model_home->get_employee_management(),
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/management.tpl');
    }
    public function boards(){
    	$data = array(
            'url'=> $this->url,

            'employee_boards' => $this->model_home->get_employee_boards(),
            'boards_category' => $this->model_home->get_boards_category(),
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/boards.tpl');
    }
}
