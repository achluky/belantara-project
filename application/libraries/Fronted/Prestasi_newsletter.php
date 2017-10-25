<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Prestasi_newsletter {
    
    private $table = 'trxPrestasiIPB';
    private $column = array('ID','NamaPrestasi','NamaPenyelenggara','Newsletter','NamaMitraPempublikasi','SitusWeb','Tingkat','Tahun');
    private $order = array('ID' => 'asc');

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_academic_reputation_prestasi_newsletter");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/prestasi_newsletter.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_academic_reputation_prestasi_newsletter");
        $list = $this->controller->model_wcu_academic_reputation_prestasi_newsletter->get_datatables($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $konferensi) {
            $no++;
            $row = array();
            $row[] = $konferensi->NamaPrestasi;
            $row[] = $konferensi->NamaPenyelenggara;
            $row[] = $konferensi->Newsletter;
            $row[] = $konferensi->NamaMitraPempublikasi;
            $row[] = $konferensi->SitusWeb;
            $row[] = $konferensi->Tingkat;
            $row[] = $konferensi->Tahun;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_academic_reputation_prestasi_newsletter->count_all($this->table),
            "recordsFiltered" => $this->controller->model_wcu_academic_reputation_prestasi_newsletter->count_filtered($this->table, $this->column, $this->order),
            "data" => $data
        );
        echo json_encode($output);
    }
}


 