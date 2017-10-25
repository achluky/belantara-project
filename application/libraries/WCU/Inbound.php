<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inbound {
	
	private $table = 'trxInboundMahasiswa';
	private $header = array('No.','Nama Mahasiswa','Departemen','Fakultas','Negara Asal','Kegiatan','Tanggal Mulai','Tanggal Selesai');
	private $header_column = array('AUTONUMBER','NamaMahasiswa','Departemen','Fakultas','NegaraAsal','Kegiatan','TanggalMulai','TanggalSelesai');
	
	private $column = array('NamaMahasiswa','NegaraAsal','Kegiatan','TanggalMulai','TanggalSelesai');
	private $order = array('NamaMahasiswa' => 'asc');
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
	
		$controller->load->model('model_wcu_internasionalization_inbound');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('internasionalization');
        $controller->navigation->setBreadcrumbWurInternationalization('inbound');

		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	
		switch($change){
			case "view": $this->view($controller, $id);
				break;
			case "sematkan": $this->sematkan($controller,$id);
				break;
			case "export": $this->export($controller,$id);
				break;
			case "listdata-json": $this->listdata_json($controller, $id);
				break;
			case 'liststudent': $this->liststudent($controller, $id);
				break;
			default: $this->listdepartement($controller);
		}
	}
	
	public function view($controller, $id=NULL){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurInternationalization('undergraduate_outbound', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'departement' => $controller->input->get('d'),
                    'data_view'=>  $controller->model_wcu_internasionalization_inbound->get_once_with_relation($this->table, $id),
                     'title'=> $controller->lang->line('navigation.navbar.wcu.internationalization.wur5wur7'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/inbound_view.tpl'); 
	}
	public function sematkan($controller, $id){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurInternationalization('inbound', 'Sematkan');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'departement' => $id,
                    'title'=> $controller->lang->line('navigation.navbar.wcu.internationalization.wur5wur7'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/inbound_sematkan.tpl'); 
	}
	public function export($controller,$id){ 
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_internasionalization_inbound->get_exsport($this->table, $this->header, $this->header_column,$id);
        $controller->excel_generate->setFileName("Inbound");
        $controller->excel_generate->setSheetName("Data");
        $controller->excel_generate->generate($data);
	}
	public function listdepartement($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurInternationalization('inbound');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_departement'=>  $controller->model_wcu_internasionalization_inbound->get_departemen(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.internationalization.wur5wur7'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/inbound_departemen.tpl'); 
	}
	public function liststudent($controller, $id){ 
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurInternationalization('inbound', "List Mahasiswa");
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'departement'=> $id,
                    'title_departemen' => $controller->model_wcu_internasionalization_inbound->get_departemen_once($id),
                    'data_list'=> null,
					'label' => array(
							'tabel_nama_mahasiswa' => $controller->lang->line('label.nama_mahasiswa'),
							'tabel_negara_asal' => "Negara Asal",
							'tabel_kegiatan' => "Kegiatan",
							'tabel_tanggal_mulai' => "Tanggal Mulai",
							'tabel_tanggal_selesai' => "Tanggal Selesai",
							'tabel_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.internationalization.wur5wur7'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/inbound.tpl'); 
	}
	public function listdata_json($controller, $id){ 	
		
		$list = $controller->model_wcu_internasionalization_inbound->get_datatables($this->table, $this->column, $this->order, $id);
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
			
            //add html for action
            $row[] = '<a href="' . base_url('wcu/internationalization/inbound') . '/view/'. trim($item->ID).'/?d='.$id.'"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> Detail</a>
             		';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_internasionalization_inbound->count_all($this->table, $id),
            "recordsFiltered" => $controller->model_wcu_internasionalization_inbound->count_filtered($this->table, $this->column, $this->order, $id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
}
