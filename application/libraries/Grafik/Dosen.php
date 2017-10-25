<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dosen {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function show(){
		$this->controller->load->model('model_frontend_grafik');
		
		$data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'dosen' => $this->controller->model_frontend_grafik->get_jumlah_dosen_berdasarkan_status_pegawai(),
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/grafik/dosen.tpl');
    }
    public function gelar_doktor(){
		$this->controller->load->model('model_frontend_grafik');
		
		$data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'dosen' => $this->controller->model_frontend_grafik->get_jumlah_dosen_berdasarkan_gelar_phd(),
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/grafik/dosen/gelar_doktor.tpl');
    }
}


 