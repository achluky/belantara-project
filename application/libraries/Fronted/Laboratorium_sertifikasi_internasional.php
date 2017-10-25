
<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Laboratorium_sertifikasi_internasional {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_internasionalization_laboratorium_sertifikasi_internasional");
        $dept = $this->controller->input->get("dept");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'tingkat' => $this->controller->input->get('tingkat')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/laboratorium_sertifikasi_internasional.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_internasionalization_laboratorium_sertifikasi_internasional");
        $list = $this->controller->model_wcu_internasionalization_laboratorium_sertifikasi_internasional->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $labs) {
            $no++;
            $row = array();
            $row[] = $labs->Nama;
            $row[] = $labs->NilaiAkreditasi;
            $row[] = $labs->Tingkat;
            $row[] = convert_date($labs->TMTAkreditasi);
            $row[] = $labs->Lembaga;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_internasionalization_laboratorium_sertifikasi_internasional->count_all(),
            "recordsFiltered" => $this->controller->model_wcu_internasionalization_laboratorium_sertifikasi_internasional->count_filtered(),
            "data" => $data
        );
        echo json_encode($output);
    }
}


 