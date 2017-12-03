<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
* @ahmadluky
*/
class Admin extends CI_Controller {

    public $url;
    
    function __construct() 
    {
        parent::__construct();
		$this->load->library('navbar');
        $this->navbar->setMenuActive('dashboard');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
		$this->load->model('model_admin');
		$this->url = current_url();		
    }
    
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $sess = $this->session->userdata('logged_in');
        $data = array(
            'url'=> $this->url,
            'title'=> 'DASHBOARD',
            'session' => $sess['username'],
            'name' => $sess['name'],
            'group_name' => $sess['group_name'],
            'last_login' => $sess['last_login']
        );
        if ($sess['group_name']=='applican') {
            $this->load->model('model_profil');
            $data['status_biodata'] = $this->model_profil->get($sess['id']);
        }
		$this->smartyci->assign('data',$data);
        $this->smartyci->display('dashboard/dashboard-'.$data['group_name'].'.tpl');
    }

    public function auth()
    {
        if (isset($_POST['user']) and $_POST['user'] != NULL) {
            if(isset($_POST['pwd']) and $_POST['pwd'] != NULL){
                $active_status       = $this->model_admin->status($_POST['user']);
                if ($active_status != NULL) {
                    if ($active_status) {
                        $salt       = $this->model_admin->get_salt($_POST['user']);
                        $result     = $this->model_admin->auth($_POST['user'], $_POST['pwd'], $salt);
                        if($result->num_rows()){
                            $sess_array = array();
                            foreach ($result->result() as $row)
                            {
        					    $sess_array = array(
                                  'id' => $row->id,
                                  'username' => $row->username,
                                  'name' => $row->name,
                                  'group_name' => strtolower($row->group_name),
                                  'last_login' => $row->last_login
                                );
                                $this->session->set_userdata('logged_in', $sess_array);
                            }
        					$this->model_admin->set_last_login($sess_array['username']);
                            redirect($this->config->item('base_url').'admin', 'refresh');
                        } else {
                            $data['error_msg']  = "Not Found username"; 
                        }
                    } else {
                        $data['error_msg']  = "Akun Anda Belum Aktif. Silahkan Cek Email Anda Untuk Aktivasi";
                    }
                } else {
                     $data['error_msg']  = "Akun Anda Belum Terdaftar. Silahkan Daftar Terlebih Dahulu. <a href='".base_url()."grant/pendaftaran'>Daftar</a>";
                }
                
            }else{
                $data['error_msg']  = "Invalid username or password";
            }
        }else{
            $data['error_msg']  = "Invalid username or password";
        }
        $this->smartyci->assign('data',$data);
        if ( isset($_POST['grant']) and $_POST['grant'] == 'grant' )  {
        $this->smartyci->display('grant/login.tpl');
        } else {
        $this->smartyci->display('login.tpl');
        }
    }

    public function logout()
    {
        $sess = $this->session->userdata('logged_in');
        $group_name = $sess['group_name'];
        if($this->session->userdata('logged_in')){
            $this->session->sess_destroy();
            if ($group_name == 'applican' or $group_name == 'bm' or $group_name == 'committee' or $group_name == 'gm') {
                redirect($this->config->item('base_url').'grant/login', 'refresh');
            }
            redirect($this->config->item('base_url').'login', 'refresh');
        }else{
            redirect($this->config->item('base_url').'login', 'refresh');
        }
    }
}
