<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Kerjasama {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_reserach_publication_kerjasama");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'dept' => $this->controller->input->get('dept')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/kerjasama.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_reserach_publication_kerjasama");
        $dept = $this->controller->input->get('dept');
        $list = $this->controller->model_wcu_reserach_publication_kerjasama->get_datatables_listKerjasama($dept);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kerjasama) {
            $no++;
            $row = array();
            $row[] = $kerjasama->NamaKerjasama;
            $row[] = $kerjasama->BidangKerjasama;
            $row[] = '<a href="javascript:void()" onclick="view(this)" class="view '.$kerjasama->ID.'" target="_black_">
                            <i class="fa fa-file fa-fw"></i> View
                      </a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_reserach_publication_kerjasama->get_count_allKerjasama($dept),
            "recordsFiltered" => $this->controller->model_wcu_reserach_publication_kerjasama->get_count_filteredKerjasama($dept),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function once($id){
        $this->controller->load->model("model_wcu_reserach_publication_kerjasama");
        $row   = $this->controller->model_wcu_reserach_publication_kerjasama->getViewOne($id);
        $arr = array(
                'NamaKerjasama' => $row->NamaKerjasama,
                'Stakeholder' => getDepartementStructur($row->Stakeholder),
                'BidangKerjasama' => $row->BidangKerjasama,
                'LingkupID' => getLingkup($row->LingkupID),
                'Tahun' => $row->Tahun,
                'TanggalMulai' => convert_date($row->TanggalMulai),
                'TanggalSelesai' => convert_date($row->TanggalSelesai)
            );
        echo json_encode($arr);
    }
}


 