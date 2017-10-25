<?php   
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pusat_unggulan_riset {

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_reserach_publication_pusat_unggulan_riset");
        $dept = $this->controller->input->get("dept");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/pusat_unggulan_riset.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_reserach_publication_pusat_unggulan_riset");
        $list = $this->controller->model_wcu_reserach_publication_pusat_unggulan_riset->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $unggulan) {
            $no++;
            $row = array();
            $row[] = $unggulan->NamaPusat;
            $row[] = $unggulan->Nama;
            $row[] = $unggulan->Kode;
            $row[] = $unggulan->Kontak;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_reserach_publication_pusat_unggulan_riset->count_all(),
            "recordsFiltered" => $this->controller->model_wcu_reserach_publication_pusat_unggulan_riset->count_filtered(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function once($id){
        $this->controller->load->model("model_wcu_reserach_publication_pusat_unggulan_riset");
        $row   = $this->controller->model_wcu_reserach_publication_pusat_unggulan_riset->getOnes($id);
        $arr = array(
                'NomorPermohonan' => $row->NomorPermohonan,
                'TanggalPenerimaan' => convert_date($row->TanggalPenerimaan),
                'NomorPengumuman' => $row->NomorPengumuman,
                'TanggalPengumuman' => convert_date($row->TanggalPengumuman),
                'NomorPaten' => $row->NomorPaten,
                'TanggalPendaftaran' => convert_date($row->TanggalPendaftaran),
                'TanggalKepemilikan' => convert_date($row->TanggalKepemilikan),
                'TanggalKadaluarsa' => convert_date($row->TanggalKadaluarsa),
                'Abstrak' => $row->Abstrak,
                'JumlahKlaim' => $row->JumlahKlaim,
                'Judul' => $row->Judul
        );
        echo json_encode($arr);
    }
}


 