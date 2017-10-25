<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Inovasi {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_data_university_inovasi");
        $dept = $this->controller->input->get("dept");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'tingkat' => $this->controller->input->get('tingkat')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/inovasi.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_data_university_inovasi");
        $tingkat = $this->controller->input->get('tingkat');
        $list = $this->controller->model_wcu_data_university_inovasi->get_datatables_listInovasi($tingkat);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $student) {
            $no++;
            $row = array();
            $row[] = $student->Judul;
            $row[] = $student->Tingkat;
            $row[] = '<a href="javascript:void()" onclick="view(this)" class="view '.$student->ID.'" target="_black_">
                            <i class="fa fa-file fa-fw"></i> View
                      </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_data_university_inovasi->get_count_allInovasi($tingkat),
            "recordsFiltered" => $this->controller->model_wcu_data_university_inovasi->get_count_filteredInovasi($tingkat),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function once($id){
        $this->controller->load->model("model_wcu_data_university_inovasi");
        $row   = $this->controller->model_wcu_data_university_inovasi->getInovasiOne($id);
        $arr = array(
                'Judul' => $row->Judul,
                'DeskripsiIndonesia' => $row->DeskripsiIndonesia,
                'DeskripsiInggris' => $row->DeskripsiInggris,
                'Persfektif' => $row->Persfektif,
                'KeunggulanInovasi' => $row->KeunggulanInovasi,
                'TerdaftarTanggal' => convert_date($row->TerdaftarTanggal),
                'SudahDikomersilkan' => ($row->SudahDikomersilkan==1)?"Ya":"Tidak",
                'tingkat' => getLingkup($row->LingkupID),
                'isAdopsi' => ($row->isAdopsi==1)?"Ya":"Tidak"
            );
        echo json_encode($arr);
    }
}


 