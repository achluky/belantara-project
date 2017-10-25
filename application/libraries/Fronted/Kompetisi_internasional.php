<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Kompetisi_internasional {
    
    
    private $table = 'hisKegiatanMahasiswa';
    private $column = array('ID','NIM', 'NamaMahasiswa', 'JudulKegiatan', 'Penyelenggara','Tempat', 'TanggalKegiatan', 'Tingkat', 'Prestasi');
    private $order = array('ID' => 'asc');
    

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_employee_reputation_kompetisi_internasional");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'dept' => $this->controller->input->get('dept')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/kompetisi_internasional.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_employee_reputation_kompetisi_internasional");
        $dept = $this->controller->input->get('dept');

        if($dept==null)return "";
        $tempId = explode("-", $dept);
        if(!isset($tempId[1]))return "";
        $dept = $tempId[1];

        $list = $this->controller->model_wcu_employee_reputation_kompetisi_internasional->get_datatables($this->table, $this->column, $this->order, $dept);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $student) {
            $no++;
            $row = array();
            $row[] = $student->NIM;
            $row[] = $student->NamaMahasiswa;
            $row[] = $student->JudulKegiatan;
            $row[] = $student->Penyelenggara;
            $row[] = $student->Tempat;
            $row[] = convert_date($student->TanggalKegiatan);
            $row[] = $student->Tingkat;
            $row[] = $student->Prestasi;
            $row[] = '<a href="javascript:void()" onclick="view(this)" class="view '.$student->ID.'" target="_black_">
                            <i class="fa fa-file fa-fw"></i> View
                      </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_employee_reputation_kompetisi_internasional->count_all($this->table, $dept),
            "recordsFiltered" => $this->controller->model_wcu_employee_reputation_kompetisi_internasional->count_filtered($this->table, $this->column, $this->order, $dept),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function once($id){
        $this->controller->load->model("model_wcu_employee_reputation_kompetisi_internasional");
        $row   = $this->controller->model_wcu_employee_reputation_kompetisi_internasional->get_once_with_relation($this->table, $id);
        $arr = array(
                'NIM' => $row['NIM'],
                'NamaMahasiswa' => $row['NamaMahasiswa'],
                'JudulKegiatan' => $row['JudulKegiatan'],
                'JenisKegiatanMahasiswa' => $row['JenisKegiatanMahasiswa'],
                'Penyelenggara' => $row['Penyelenggara'],
                'Tempat' => $row['Tempat'],
                'TanggalKegiatan' => convert_date($row['TanggalKegiatan']),
                'Tingkat' => $row['Tingkat'],
                'Prestasi' => $row['Prestasi'],
                'Sertifikat' => $row['Sertifikat'],
                'MayorID' => $row['MayorID'],
                'StrataID' => getStrata($row['StrataID'])
            );
        echo json_encode($arr);
    }
}


 