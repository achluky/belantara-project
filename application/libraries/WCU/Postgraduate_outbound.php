<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Postgraduate_outbound {
	
	private $table = 'trxOutboundMahasiswa';
	private $header = array('No.','NIM','Nama Mahasiswa','Strata','Mayor','Departemen','Fakultas','Instansi Tujuan','Negara Tujuan','Kegiatan','Tanggal Mulai','Tanggal Selesai');
	private $header_column = array('AUTONUMBER','NIM','NamaMahasiswa','Strata','Mayor','Departemen','Fakultas','InstitusiTujuan','NegaraTujuan','Kegiatan','TanggalMulai','TanggalSelesai');
	
	private $column = array('ID','NIM','NamaMahasiswa','Strata','Mayor','InstitusiTujuan','NegaraTujuan','Kegiatan','TanggalMulai','TanggalSelesai');
	private $order = array('ID' => 'asc');
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
	
		$controller->load->model('model_wcu_internasionalization_postgraduate_outbound');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('internasionalization');
        $controller->navigation->setBreadcrumbWurInternationalization('postgraduate_outbound',$change);
		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	
		switch($change){
			case "view": $this->view($controller, $id);
				break;
			case "sematkan": $this->sematkan($controller,$id);
				break;
			case "export": $this->export($controller);
				break;
			case "listdata-json": $this->listdata_json($controller);
				break;
			case 'liststudent': $this->liststudent($controller);
				break;
			default: $this->listdepartement($controller);
		}
	}
	
	public function view($controller, $id=NULL){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurInternationalization('postgraduate_outbound', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());

		$idmayor = $controller->input->get('mayor');

        $controller->smartyci->assign('idmayor',$idmayor);
        
		if($idmayor==null)return "";
        $tempId = explode("-", $idmayor);
        if(!isset($tempId[1]))return "";
        $idmayor = $tempId[1];

		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_internasionalization_postgraduate_outbound->get_once_with_relation($this->table, $id, $idmayor),
                     'title'=> $controller->lang->line('navigation.navbar.wcu.internationalization.wur8'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/postgraduate_outbound_view.tpl'); 
	}
	public function sematkan($controller, $id){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurInternationalization('postgraduate_outbound', 'Sematkan');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'departemen'=>$id,
                    'title'=> $controller->lang->line('navigation.navbar.wcu.internationalization.wur8'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/postgraduate_outbound_sematkan.tpl'); 

	}
	public function export($controller){ 
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_internasionalization_postgraduate_outbound->get_exsport($this->table, $this->header, $this->header_column);
        $controller->excel_generate->setFileName("Postgraduate_outbound");
        $controller->excel_generate->setSheetName("Data");
        $controller->excel_generate->generate($data);
	}
	public function listdepartement($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurInternationalization('postgraduate_outbound');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_departement'=>  $controller->model_wcu_internasionalization_postgraduate_outbound->getListDepartement(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.internationalization.wur8'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/postgraduate_outbound_departemen.tpl'); 

	}
	public function liststudent($controller){ 
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurInternationalization('postgraduate_outbound', "List Mahasiswa");
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		 $data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_list'=> null,
                    'departemen'=> $controller->input->get('d'),
                    'mayor' => $controller->model_wcu_internasionalization_postgraduate_outbound->getMayor($controller->input->get('d')),
					'label' => array(
							'tabel_id' => $controller->lang->line('label.tabel.id'),
							'tabel_nim' => $controller->lang->line('label.nim'),
							'tabel_nama_mahasiswa' => $controller->lang->line('label.nama_mahasiswa'),
							'tabel_strata' => $controller->lang->line('label.strata'),
							'tabel_mayor' => $controller->lang->line('label.mayor'),
							'tabel_institusi_tujuan' => $controller->lang->line('label.institusi_tujuan'),
							'tabel_negara_tujuan' => $controller->lang->line('label.negara_tujuan'),
							'tabel_kegiatan' => $controller->lang->line('label.kegiatan'),
							'tabel_tanggal_mulai' => $controller->lang->line('label.tanggal_mulai'),
							'tabel_tanggal_selesai' => $controller->lang->line('label.tanggal_selesai'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.internationalization.wur8'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/postgraduate_outbound.tpl'); 
	}
	public function listdata_json($controller){ 
		$id = $controller->input->get('d');
		if($id==null)return "";
        $tempId = explode("-", $id);
        if(!isset($tempId[1]))return "";
        $id = $tempId[1];
        
		$list = $controller->model_wcu_internasionalization_postgraduate_outbound->get_datatables($this->table, $this->column, $this->order, $id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
        	// just mounth > 6 
        	// if ($item->Cmonth>=6) {
            $no++;
            $row = array();
            $row[] = $item->NIM;
            $row[] = $item->NamaMahasiswa;
            $row[] = $item->Strata;
            // $row[] = "<a href='".$item->MayorID."'> <i class=\"fa fa-search fa-fw\"></i>".$item->Mayor."</a>";
            $row[] = $item->InstitusiTujuan;
            $row[] = $item->NegaraTujuan;
            $row[] = $item->Kegiatan;
            $row[] = $item->TanggalMulai;
            $row[] = $item->TanggalSelesai;
			
            // add html for action
            $row[] = '<a href="' . base_url('wcu/internationalization/postgraduate_outbound') . '/view/' . $item->ID . '?mayor='.$controller->input->get('d').'"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                  ';
            $data[] = $row;
        	// }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_internasionalization_postgraduate_outbound->count_all($this->table, $id),
            // "recordsTotal" => $no,
            "recordsFiltered" => $controller->model_wcu_internasionalization_postgraduate_outbound->count_filtered($this->table, $this->column, $this->order, $id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
}
