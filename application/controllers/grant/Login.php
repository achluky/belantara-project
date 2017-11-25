<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url').'grant', 'refresh');            
        }
    }

    public function index() {
        $data = array(
            'error_msg' => ''
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('grant/login.tpl');
    }
    
    public function forgot_password() {
        $data = array(
            'error_msg' => ''
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('grant/forgot_password.tpl');
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
