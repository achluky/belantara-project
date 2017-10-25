<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Inbound {
    
    private $table = 'trxInboundMahasiswa';
    private $column = array('NamaMahasiswa','NegaraAsal','Kegiatan','TanggalMulai','TanggalSelesai');
	private $order = array('NamaMahasiswa' => 'asc');

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_internasionalization_inbound");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'dept' => $this->controller->input->get('dept')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/inbound.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_internasionalization_inbound");
        $dept = $this->controller->input->get('dept');
                
        $list = $this->controller->model_wcu_internasionalization_inbound->get_datatables($this->table, $this->column, $this->order, $dept);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->NamaMahasiswa;
            $row[] = $item->NegaraAsal;
            $row[] = $item->Kegiatan;
            $row[] = $item->TanggalMulai;
            $row[] = $item->TanggalSelesai;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_internasionalization_inbound->count_all($this->table, $dept),
            "recordsFiltered" => $this->controller->model_wcu_internasionalization_inbound->count_filtered($this->table, $this->column, $this->order, $dept),
            "data" => $data
        );
        echo json_encode($output);
    }
}


 