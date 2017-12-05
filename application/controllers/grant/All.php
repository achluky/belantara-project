<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('application');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_grant');
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index(){
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Todo' => base_url() . ''
            ),
            'error_msg' => '',
            'grant' => $this->model_grant->grant(),
            'title' => 'Todo <small> Grant Manager</small>',
            'session' => $this->sess['username'],
            'no' => 1,
            'name' => $this->sess['name'],
            'last_login' => $this->sess['last_login']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('grant/all.tpl');
    }
}
