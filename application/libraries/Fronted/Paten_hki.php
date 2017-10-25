<?php   
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paten_hki {

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_reserach_publication_paten_hki");
        $dept = $this->controller->input->get("dept");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'year' => $this->controller->input->get('y')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/paten_hki.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_reserach_publication_paten_hki");
        $year = $this->controller->input->get('y');
        $list = $this->controller->model_wcu_reserach_publication_paten_hki->get_datatables_listHki($year);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $paten_hki) {
            $no++;
            $row = array();
            $row[] = $paten_hki->Judul;
            $row[] = $paten_hki->NomorPermohonan;
            $row[] = convert_date($paten_hki->TanggalPendaftaran);
            $row[] = '<a href="javascript:void()" onclick="view(this)" class="view '.$paten_hki->ID.'" target="_black_">
                            <i class="fa fa-file fa-fw"></i> View
                      </a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_reserach_publication_paten_hki->count_allStudent($year),
            "recordsFiltered" => $this->controller->model_wcu_reserach_publication_paten_hki->count_filteredStudent($year),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function once($id){
        $this->controller->load->model("model_wcu_reserach_publication_paten_hki");
        $row   = $this->controller->model_wcu_reserach_publication_paten_hki->getOnes($id);
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


 