<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class konferensi_internasional {
    
    private $table = 'trxKonferensi';
    private $column = array('ID','NamaKonferensi','NamaPenyelenggara','Tingkat','Tahun','TuanRumah');
    private $order = array('ID' => 'asc');
    

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_academic_reputation_konferensi_internasional");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/konferensi_internasional.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_academic_reputation_konferensi_internasional");
        $list = $this->controller->model_wcu_academic_reputation_konferensi_internasional->get_datatables($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $konferensi) {
            $no++;
            $row = array();
            $row[] = $konferensi->NamaKonferensi;
            $row[] = $konferensi->NamaPenyelenggara;
            $row[] = $konferensi->Tingkat;
            $row[] = $konferensi->Tahun;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_academic_reputation_konferensi_internasional->count_all($this->table),
            "recordsFiltered" => $this->controller->model_wcu_academic_reputation_konferensi_internasional->count_filtered($this->table, $this->column, $this->order),
            "data" => $data
        );
        echo json_encode($output);
    }
}


 