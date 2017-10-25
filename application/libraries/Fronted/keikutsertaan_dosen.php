<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Keikutsertaan_dosen {
    
    private $table = 'trxAsosiasiProfesiDosen';
    private $column = array('ID','NIP', 'NamaDosen', 'NamaAsosiasi', 'Posisi', 'NomorAnggota','TerdaftarTanggal','Negara');
    private $order = array('ID' => 'asc');

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_employee_reputation_keikutsertaan_dosen");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'tingkat' => $this->controller->input->get('dept')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/keikutsertaan_dosen.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_employee_reputation_keikutsertaan_dosen");
        $dept = $this->controller->input->get('dept');
        $list = $this->controller->model_wcu_employee_reputation_keikutsertaan_dosen->get_datatables($this->table, $this->column, $this->order, $dept);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $dosen) {
            $no++;
            $row = array();
            $row[] = $dosen->ID;
            $row[] = $dosen->NIP;
            $row[] = $dosen->NamaDosen;
            $row[] = $dosen->NamaAsosiasi;
            $row[] = $dosen->Posisi;
            $row[] = $dosen->NomorAnggota;
            $row[] = $dosen->TerdaftarTanggal;
            $row[] = $dosen->Negara;
            $row[] = '<a href="javascript:void()" onclick="view(this)" class="view '.$dosen->ID.'" target="_black_">
                            <i class="fa fa-file fa-fw"></i> View
                      </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_employee_reputation_keikutsertaan_dosen->count_all($this->table, $dept),
            "recordsFiltered" => $this->controller->model_wcu_employee_reputation_keikutsertaan_dosen->count_filtered($this->table, $this->column, $this->order, $dept),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function once($id){
        $this->controller->load->model("model_wcu_employee_reputation_keikutsertaan_dosen");
        $row   = $this->controller->model_wcu_employee_reputation_keikutsertaan_dosen->get_once_with_relation($this->table, $id);
        $arr = array(
                'ID' => $row['ID'],
                'NIP' => $row['NIP'],
                'NamaDosen' => $row['NamaDosen'],
                'NamaAsosiasi' => $row['NamaAsosiasi'],
                'Posisi' => $row['Posisi'],
                'NomorAnggota' => $row['NomorAnggota'],
                'TerdaftarTanggal' => $row['TerdaftarTanggal'],
                'Negara' => $row['Negara'],
                'NamaDepartemen' => $row['NamaDepartemen'],
                'Fakultas' => $row['Fakultas']
            );
        echo json_encode($arr);
    }
}


 