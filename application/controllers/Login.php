<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url').'admin', 'refresh');            
        }
    }

    public function index() {
        $data = array(
            'error_msg' => ''
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('login.tpl');
    }
    
    public function dashboard(){
        $data = array(
            'title'=> 'Dashboard',
            'session'=>'a'
        );
        
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/dasboard.tpl');
    }

}
