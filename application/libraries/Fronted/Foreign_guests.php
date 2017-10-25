
<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foreign_guests {
    
    private $table = 'trxKegiatanTamu';
	private $column = array('ID','NamaTamu','UnitKerja','NamaAcara','Negara','Tahun');
	private $order = array('ID' => 'asc');

    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $this->controller->load->model("model_wcu_academic_reputation_foreign_guests");
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/foreign_guests.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_academic_reputation_foreign_guests");
        $list = $this->controller->model_wcu_academic_reputation_foreign_guests->get_datatables($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $student) {
            $no++;
            $row = array();
            $row[] = $student->NamaTamu;
            $row[] = $student->UnitKerja;
            $row[] = $student->NamaAcara;
            $row[] = $student->Negara;
            $row[] = $student->Tahun;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_academic_reputation_foreign_guests->count_all($this->table),
            "recordsFiltered" => $this->controller->model_wcu_academic_reputation_foreign_guests->count_filtered($this->table, $this->column, $this->order),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function once($id){
        $this->controller->load->model("model_wcu_academic_reputation_foreign_guests");
        $row   = $this->controller->model_wcu_academic_reputation_foreign_guests->getInovasiOne($id);
        $arr = array(
                'Judul' => $row->Judul,
                'DeskripsiIndonesia' => $row->DeskripsiIndonesia,
                'DeskripsiInggris' => $row->DeskripsiInggris,
                'Persfektif' => $row->Persfektif,
                'KeunggulanInovasi' => $row->KeunggulanInovasi,
                'TerdaftarTanggal' => convert_date($row->TerdaftarTanggal),
                'SudahDikomersilkan' => $row->SudahDikomersilkan,
                'tingkat' => getLingkup($row->LingkupID),
                'isAdopsi' => $row->isAdopsi
            );
        echo json_encode($arr);
    }
}


 