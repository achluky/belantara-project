<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url').'admin', 'refresh');            
        }
    }

    public function index() {
		$this->load->library('Grafik/all');
		$this->all->show();
    }

    public function mahasiswa() {
		$this->load->library('Grafik/mahasiswa');
		$this->mahasiswa->show();
    }

    public function dosen($param=null) {
		$this->load->library('Grafik/dosen');
		if($param=="gelar_doktor")
			$this->dosen->gelar_doktor();
		else
			$this->dosen->show();
    }

    public function underconstruction()
    {
        $this->smartyci->display('underconstruction.tpl');
    }

}
