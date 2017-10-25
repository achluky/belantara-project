<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Publikasi_jurnal_internasional {
    
    private $table = 'mstArtikel';
    private $column = array('ID','JudulPaper','NamaJurnal','NamaPenulis','PenulisKe','Tingkat', 'Url');
    private $order = array('ID' => 'asc');

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_employee_reputation_publikasi_jurnal_internasional");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'year' => $this->controller->input->get('y')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/publikasi_jurnal_internasional.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_employee_reputation_publikasi_jurnal_internasional");
        $year = $this->controller->input->get('year');
        $list = $this->controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->get_datatables($this->table, $this->column, $this->order, $year);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $paper) {
            $no++;
            $row = array();
            $row[] = $paper->JudulPaper;
            $row[] = $paper->NamaJurnal;
            $row[] = $paper->NamaPenulis;
            // $row[] = $paper->PenulisKe;
            // $row[] = $paper->Tingkat;
            $row[] = "<a href='".$paper->Url."' target='_black_'>Link Journal</a>";
            $row[] = '<a href="javascript:void()" onclick="view(this)" class="view '.$paper->ID.'" target="_black_">
                            <i class="fa fa-file fa-fw"></i> View
                      </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->count_all($this->table, $year),
            "recordsFiltered" => $this->controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->count_filtered($this->table, $this->column, $this->order, $year),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function once($id){
        $this->controller->load->model("model_wcu_employee_reputation_publikasi_jurnal_internasional");
        $row   = $this->controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->get_once_with_relation($this->table, $id);
        $arr = array(
                'JudulPaper' => $row['JudulPaper'],
                'NamaJurnal' => $row['NamaJurnal'],
                'NamaPenulis' => $row['NamaPenulis'],
                'PenulisKe' => $row['PenulisKe'],
                'Tingkat' => $row['Tingkat'],
                'TahunTerbit' => convert_date($row['TahunTerbit']),
                'KotaTerbit' => $row['KotaTerbit'],
                'ISSN' => getLingkup($row['ISSN']),
                'ISBN' => $row['ISBN'],
                'Volume' => $row['Volume'],
                'Halaman' => $row['Halaman'],
                'Nomor' => $row['Nomor'],
                'Url' => "<a href='".$row['Url']."' >Link</a>"
            );
        echo json_encode($arr);
    }
}


 