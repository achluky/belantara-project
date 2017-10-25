<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Undergraduate_student {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_data_university_undergraduate_student");
        $dept = $this->controller->input->get("dept");
        $rst = $this->controller->model_wcu_data_university_undergraduate_student->get_undergraduateList($dept);
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'departemen' => $this->controller->input->get('dept')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/undergraduate_student.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_data_university_undergraduate_student");
        $departemen = $this->controller->input->get('d');
        $list = $this->controller->model_wcu_data_university_undergraduate_student->get_datatables_listStudent($departemen);
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
            "recordsTotal" => $this->controller->model_wcu_data_university_undergraduate_student->count_allStudent($departemen),
            "recordsFiltered" => $this->controller->model_wcu_data_university_undergraduate_student->count_filteredStudent($departemen),
            "data" => $data
        );
        echo json_encode($output);
    }
}


 