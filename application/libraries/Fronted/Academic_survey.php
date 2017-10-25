
<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Academic_survey {
    
    private $table = 'trxKontakSurvey';
    private $column = array('ID','NamaDepan','NamaBelakang','Gelar','Negara','Universitas','Pekerjaan','Departemen', 'Institusi');
    private $order = array('ID' => 'asc');


    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_academic_reputation_academic_survey");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'label' => array(
                            'tabel_id' => $this->controller->lang->line('label.tabel.id'),
                            'tabel_nama_depan' => $this->controller->lang->line('label.nama_depan'),
                            'tabel_nama_belakang' => $this->controller->lang->line('label.nama_belakang'),
                            'tabel_gelar' => $this->controller->lang->line('label.gelar'),
                            'tabel_negara' => $this->controller->lang->line('label.negara'),
                            'tabel_universitas' => $this->controller->lang->line('label.universitas'),
                            'tabel_pekerjaan' => $this->controller->lang->line('label.pekerjaan'),
                            'tabel_departemen' => $this->controller->lang->line('label.departemen'),
                            'tabel_institusi' => $this->controller->lang->line('label.institusi'),
                            'tabel_delete' => $this->controller->lang->line('label.tabel.delete'),
                            'table_action' => $this->controller->lang->line('label.tabel.action')
                        )
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/academic_survey.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_academic_reputation_academic_survey");
        $list = $this->controller->model_wcu_academic_reputation_academic_survey->get_datatables($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->ID;
            $row[] = $item->NamaDepan;
            $row[] = $item->NamaBelakang;
            $row[] = $item->Gelar;
            $row[] = $item->Negara;
            $row[] = $item->Universitas;
            $row[] = $item->Pekerjaan;
            $row[] = $item->Departemen;
            $row[] = $item->Institusi;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_academic_reputation_academic_survey->count_all($this->table),
            "recordsFiltered" => $this->controller->model_wcu_academic_reputation_academic_survey->count_filtered($this->table, $this->column, $this->order),
            "data" => $data
        );
        echo json_encode($output);
    }
}


 