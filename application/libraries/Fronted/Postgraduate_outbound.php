<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Postgraduate_outbound {
    
    private $table = 'trxOutboundMahasiswa';
    private $column = array('ID','NIM','NamaMahasiswa','Strata','Mayor','InstitusiTujuan','NegaraTujuan','Kegiatan','TanggalMulai','TanggalSelesai');
    private $order = array('ID' => 'asc');

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_internasionalization_postgraduate_outbound");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'dept' => $this->controller->input->get('dept')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/postgraduate_outbound.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_internasionalization_postgraduate_outbound");
        
        $id = $this->controller->input->get('dept');
        if($id==null)return "";
        $tempId = explode("-", $id);
        if(!isset($tempId[1]))return "";
        $id = $tempId[1];

        $list = $this->controller->model_wcu_internasionalization_postgraduate_outbound->get_datatables($this->table, $this->column, $this->order, $id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $outbound) {
            $no++;
            $row = array();
            $row[] = $outbound->NIM;
            $row[] = $outbound->NamaMahasiswa;
            $row[] = $outbound->Strata;
            $row[] = $outbound->InstitusiTujuan;
            $row[] = $outbound->Kegiatan;
            $row[] = $outbound->NegaraTujuan;
            $row[] = $outbound->TanggalMulai;
            $row[] = $outbound->TanggalSelesai;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_internasionalization_postgraduate_outbound->count_all($this->table, $id),
            "recordsFiltered" => $this->controller->model_wcu_internasionalization_postgraduate_outbound->count_filtered($this->table, $this->column, $this->order, $id),
            "data" => $data
        );
        echo json_encode($output);
    }
}