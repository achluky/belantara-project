<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Program_studi_terakreditasi_internasional {

    private $table = 'hisAkreditasiPS'; 
    private $column = array('ID','Mayor','PredikatAkreditasi','NilaiAkreditasi','LembagaPengakreditasi','Tingkat','TMTAkreditasi','TSTAkreditasi');
    private $order = array('ID' => 'asc');

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_academic_reputation_program_studi_terakreditasi_internasional");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'dept' => $this->controller->input->get('dept')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/program_studi_terakreditasi_internasional.tpl');
    }

    public function list_(){
        $this->controller->load->model("model_wcu_academic_reputation_program_studi_terakreditasi_internasional");
        $dept = $this->controller->input->get('dept');
        $list = $this->controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_datatables($this->table, $this->column, $this->order, $dept);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $departemen) {
            $no++;
            $row = array();
            $row[] = $departemen->Mayor;
            $row[] = $departemen->PredikatAkreditasi;
            $row[] = $departemen->NilaiAkreditasi;
            $row[] = $departemen->LembagaPengakreditasi;
            $row[] = $departemen->Tingkat;
            $row[] = $departemen->TMTAkreditasi;
            $row[] = $departemen->TSTAkreditasi;
            $row[] = '<a href="javascript:void()" onclick="view(this)" class="view '.$departemen->ID.'" target="_black_">
                            <i class="fa fa-file fa-fw"></i> View
                      </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $no,
            "recordsFiltered" => $no,
            "data" => $data
        );
        echo json_encode($output);
    }

    public function once($id){
        $this->controller->load->model("model_wcu_academic_reputation_program_studi_terakreditasi_internasional");
        $row   = $this->controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_once_with_relation($this->table,$id);
        $arr = array(
                'Mayor' => $row['Mayor'],
                'Departemen' => $row['Departemen'],
                'Fakultas' => $row['Fakultas'],
                'NilaiAkreditasi' => $row['NilaiAkreditasi'],
                'PredikatAkreditasi' => $row['PredikatAkreditasi'],
                'TMTAkreditasi' => convert_date($row['TMTAkreditasi']),
                'TSTAkreditasi' => convert_date($row['TSTAkreditasi']),
                'LembagaPengakreditasi' => $row['LembagaPengakreditasi'],
                'Tingkat' => $row['Tingkat'],
                'departemenID' => $row['departemenID']
            );
        echo json_encode($arr);
    }
}