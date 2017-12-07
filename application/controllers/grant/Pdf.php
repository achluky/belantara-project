<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pdf extends CI_Controller {
    
    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('todo');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_profil');
        $this->load->model('model_grant');
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index($id_grant)
    {
        $this->load->library('pdfgenerator');
        $this->load->helper('page');
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Todo' => base_url() . 'grant/todo',
                'view' => base_url() . ''
            ),
            'error_msg' => '',
            'title' => 'View <small> Grant</small>',
            'grant' => $this->model_grant->getGrantFull($id_grant, $this->sess['id']),
            'name' => $this->sess['name'],
            'last_login' => $this->sess['last_login'],
        );
        $html = $this->load->view('grant/pdf', $data, true);
        $this->pdfgenerator->generate($html,'contoh');
    }
}