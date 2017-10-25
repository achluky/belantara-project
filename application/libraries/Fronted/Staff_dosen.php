<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Staff_dosen {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_data_university_dosen");
        $str = $this->controller->input->get("str"); 
        $pegawai = $this->controller->input->get("pegawai"); 
        $kepegawaian = $this->controller->input->get("kepegawaian"); 
        $rst = $this->controller->model_wcu_data_university_dosen->get_dosenList($str, $pegawai, $kepegawaian);
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'data'=>$rst
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/staff_dosen.tpl');
    }
}


 
    
