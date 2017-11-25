<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            redirect(base_url().'grant', 'refresh');            
        }
        $this->load->model('model_auth');
    }

    public function index() {

        if (isset($_POST['user']) and $_POST['user'] != NULL) {
            if(isset($_POST['pwd']) and $_POST['pwd'] != NULL){

                $active_status       = $this->model_auth->status($_POST['user']);
                if ($active_status == 'active') {
                    $hast_number       = $this->model_auth->hast_number($_POST['user']);
                    $result     = $this->model_auth->auth($_POST['user'], $_POST['pwd'], $hast_number);
                    if($result->num_rows())
                    {
                        $sess_array = array();
                        foreach ($result->result() as $row)
                        {
                            $sess_array = array(
                              'name' => $row->name,
                              'email' => $row->email,
                              'id_biodata' => $row->id_biodata
                            );
                            $this->session->set_userdata('logged_in', $sess_array);
                        }
                        $this->model_auth->set_last_login($sess_array['email']);
                        redirect(base_url().'grant', 'refresh');
                    }else{
                        $data['error_msg']  = "Not Found username"; 
                    }
                } else {
                    $data['error_msg']  = "Akun Anda Belum Aktif. Silahkan Cek Email Anda Untuk Aktivasi";
                }
            }else{
                $data['error_msg']  = "Invalid username or password";
            }
        }else{
            $data['error_msg']  = "Invalid username or password";
        }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('login.tpl');

    }

}
