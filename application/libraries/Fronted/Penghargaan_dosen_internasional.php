<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Penghargaan_dosen_internasional {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $dept = $this->controller->input->get("dept");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'dept' => $this->controller->input->get('dept')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/penghargaan_dosen_internasional.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_internasionalization_penghargaan_dosen_internasional");
        $dept = $this->controller->input->get('dept');
        $list = $this->controller->model_wcu_internasionalization_penghargaan_dosen_internasional->get_datatables_listpenghargaan($dept);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $dosen) {
            $no++;
            $row = array();
            $row[] = $dosen->NIPdosen;
            $row[] = getDosenNama($dosen->NIPdosen);
            $row[] = $dosen->Negara;
            $row[] = $dosen->Instansi;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_internasionalization_penghargaan_dosen_internasional->count_allPenghargaan($dept),
            "recordsFiltered" => $this->controller->model_wcu_internasionalization_penghargaan_dosen_internasional->count_filteredPenghargaan($dept),
            "data" => $data
        );
        echo json_encode($output);
    }
}


 