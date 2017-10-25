<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Postgraduate_student {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_data_university_postgraduate_student");
        $dept = $this->controller->input->get("dept");
        $strata = $this->controller->input->get("strata");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'departemen' => $this->controller->input->get('dept'),
                    'strata' => $this->controller->input->get('strata')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/postgraduate_student.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_data_university_postgraduate_student");
        $departemen = $this->controller->input->get('dept');
		$strata = $this->controller->input->get('strata');
        $list = $this->controller->model_wcu_data_university_postgraduate_student->get_datatables_listStudent($departemen,$strata);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $student) {
            $no++;
            $row = array();
            $row[] = $student->NIM;
            $row[] = $student->Nama;
            $row[] = $student->JenisKelamin;
            $row[] = $student->Mayor;
            $row[] = $student->Strata;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_data_university_postgraduate_student->count_allStudent($departemen,$strata),
            "recordsFiltered" => $this->controller->model_wcu_data_university_postgraduate_student->count_filteredStudent($departemen,$strata),
            "data" => $data
        );
        echo json_encode($output);
    }
}


 