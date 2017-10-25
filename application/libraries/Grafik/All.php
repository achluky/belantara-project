<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class All {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function show(){
		$this->controller->load->model('model_frontend_grafik');
		
		$data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'mahasiswa' => $this->controller->model_frontend_grafik->get_jumlah_mahasiswa_berdasarkan_pendidikan(),
                    'dosen' => $this->controller->model_frontend_grafik->get_jumlah_dosen_berdasarkan_status_pegawai(),
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/grafik/all.tpl');
    }
}


 