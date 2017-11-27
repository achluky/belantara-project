<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('pengaturan');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_profil');
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index(){
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Profil' => base_url() . ''
            ),
            'error_msg' => '',
            'profil' => $this->model_profil->get($this->sess['id']),
            'title' => 'Profil <small> Grant</small>',
            'session' => $this->sess['username'],
            'name' => $this->sess['name'],
            'last_login' => $this->sess['last_login']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('grant/profil.tpl');
    }

    public function save(){
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Profil' => base_url() . ''
            ),
            'title' => 'Profil <small> Grant</small>',
            'session' => $this->sess['username'],
            'name' => $this->sess['name'],
            'last_login' => $this->sess['last_login']
        );

        if(isset($_POST['agree']) and $_POST['agree'] == 'on'){
            if ($_POST['id_biodata'] == NULL) {
                array_pop($_POST);
                $_POST['id_user'] = $this->sess['id'];
                unset($_POST['id_biodata']);
                if($this->model_profil->insert($_POST)){
                    $data['profil'] = $this->model_profil->get($this->sess['id']);
                    $data['error_msg']  = "Data Berhasil Disimpan"; 
                } else {
                    $data['profil'] = $this->model_profil->get($this->sess['id']);
                    $data['error_msg']  = "Data Gagal Disimpan"; 
                }
            } else {    
                array_pop($_POST);
                $id_biodata = $_POST['id_biodata'];
                unset($_POST['id_biodata']);
                if($this->model_profil->update($_POST, $id_biodata)){
                    $data['profil'] = $this->model_profil->get($this->sess['id']);
                    $data['error_msg']  = "Data Berhasil Diupdate"; 
                } else {
                    $data['profil'] = $this->model_profil->get($this->sess['id']);
                    $data['error_msg']  = "Data Gagal Diupdate"; 
                }
            }
        } else {
            $data['error_msg']  = "Lengkapi Data dengan Lengkap"; 
        }

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('grant/profil.tpl');
    }

    public function lanjut($method=NULL){
        $data = array(
            'url' => $this->url,
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Profil Lanjut' => base_url() . ''
            ),
            'error_msg' => '',
            'email' => $this->model_profil->get_email($this->sess['id']),
            'title' => 'Profil Lanjut <small> Grant</small>',
            'session' => $this->sess['username'],
            'name' => $this->sess['name'],
            'last_login' => $this->sess['last_login']
        );
        if ($method == 'save') {
            $id = $_POST['id'];
            unset($_POST['id']);
            if($this->model_profil->update_email($_POST, $id)){
                $data['email'] = $this->model_profil->get_email($this->sess['id']);
                $data['error_msg']  = "Data Berhasil Diupdate"; 
            } else {
                $data['email'] = $this->model_profil->get_email($this->sess['id']);
                $data['error_msg']  = "Data Gagal Diupdate"; 
            }
        }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('grant/profil_lanjut.tpl');
    }
}
