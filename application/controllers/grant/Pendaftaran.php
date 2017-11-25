<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
   	
   	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in')) {
            redirect(base_url().'grant', 'refresh');            
        }
    }

	public function index()
	{
        $data = array(
            'error_msg' => isset($_GET['info']) ? str_replace("-", " ", $_GET['info']) : ''
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('grant/pendaftaran.tpl');
	}

	public function save(){
        $this->load->model('model_pendaftaran');
		$this->load->library('form_validation');

		$name=$this->security->xss_clean($_POST['name']);
		$email=$this->security->xss_clean($_POST['email']);
		$password=$this->security->xss_clean($_POST['password']);
		$agree=$this->security->xss_clean( ( isset($_POST['agree']) )? $_POST['agree']:0 );

		$this->form_validation->set_rules('name','name','required|min_length[4]');
		$this->form_validation->set_rules('email','email','required|valid_email|min_length[4]');
		$this->form_validation->set_rules('password','password','required|min_length[4]');
		$this->form_validation->set_rules('agree','agree','required');

		if ($this->form_validation->run() and $agree) {
			$hast_number = random_hast();
			$dhor=md5($password);
			$pass=$hast_number.$dhor;
			$insert = array(
				'name' => $name,
				'email' => $email,
				'password' => $pass,
				'hast_number' => $hast_number
			);
			$insertdb=$this->model_pendaftaran->insert($insert);
            $alert  = url_title("Silahkan Periksa Email Anda Untuk Mengaktifkan Akun");	
            redirect('pendaftaran/?info=' . $alert, 'refresh'); 
		} else{ 
            $data['error_msg']  = "Seluruh Filed Harus Diisi";
		}
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('grant/pendaftaran.tpl');
	}

}