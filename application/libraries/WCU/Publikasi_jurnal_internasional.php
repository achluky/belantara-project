<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Publikasi_jurnal_internasional {
	
	private $table = 'mstArtikel';
	private $header = array('No.','Judul Paper','Nama Jurnal','Nama Penulis','Penulis Ke-','Tingkat','Tahun Terbit','Kota Terbit','ISSN','ISBN','Volume','Halaman','Nomor', 'Url');
	private $header_column = array('AUTONUMBER','JudulPaper', 'NamaJurnal','NamaPenulis','PenulisKe','Tingkat','TahunTerbit','KotaTerbit','ISSN','ISBN','Volume', 'Halaman', 'Nomor', 'Url');
	
	private $column = array('ID','JudulPaper','NamaJurnal','NamaPenulis','PenulisKe','Tingkat', 'Url');
	private $order = array('ID' => 'asc');
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_employee_reputation_publikasi_jurnal_internasional');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('employee_reputation');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('publikasi_jurnal_internasional');

		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	
		switch($change){
			case "view": $this->view($controller, $id);
				break;
			/*
			case "add": $this->add($controller);
				break;
			case "edit": $this->edit($controller, $id);
				break;
			case "delete": $this->delete($controller, $id);
				break;
			case "save": $this->save($controller);
				break;
			case "update": $this->update($controller);
				break;
			*/
			case 'sematkan': $this->sematkan($controller,$id);
				break;
			case "export": $this->export($controller,$id);
				break;
			case "listdata-json": $this->listdata_json($controller,$id);
				break;
			case 'listdata': $this->listdata($controller,$id);
				break;
			default: $this->years($controller);
		}
	}
	
	public function view($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('publikasi_jurnal_internasional', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->get_once_with_relation($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur17'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/publikasi_jurnal_internasional_view.tpl'); 
    }
	public function add($controller){}
	public function save($controller){}
	public function edit($controller){}
	public function update($controller){}
	public function delete($controller){}
	public function years($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('publikasi_jurnal_internasional');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'years'=>  $controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->getYears($this->table),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur17'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/publikasi_jurnal_internasional_years.tpl'); 
	}
	public function export($controller,$id){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->get_exsport($this->table, $this->header, $this->header_column, $id);
        $controller->excel_generate->setFileName("Publikasi_Jurnal_Internasional");
        $controller->excel_generate->setSheetName("Data");
        $controller->excel_generate->generate($data);
	}
	
	public function listdata($controller,$id){ 
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('publikasi_jurnal_internasional', $id);
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		 $data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_list'=> null,
                    'year'=>$id,
					'label' => array(
							'tabel_id' => $controller->lang->line('label.tabel.id'),
							'tabel_judul_paper' => $controller->lang->line('label.judul_paper'),
							'tabel_nama_jurnal' => $controller->lang->line('label.nama_jurnal'),
							'tabel_nama_penulis' => $controller->lang->line('label.nama_penulis'),
							'tabel_penulis_ke' => $controller->lang->line('label.penulis_ke'),
							'tabel_tingkat' => $controller->lang->line('label.tingkat'),
							'tabel_url' => $controller->lang->line('label.url'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur17'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/publikasi_jurnal_internasional.tpl'); 
	}
	
	public function listdata_json($controller,$id){ 
		$list = $controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->get_datatables($this->table, $this->column, $this->order,$id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->ID;
            $row[] = $item->JudulPaper;
            $row[] = $item->NamaJurnal;
            $row[] = $item->NamaPenulis;
            $row[] = $item->PenulisKe;
            $row[] = $item->Tingkat;
			$row[] = '<td><i class="glyphicon glyphicon-link"></i> &nbsp; <a href="'.$item->Url.'" target="_blank_">'.$item->Url.'</a></td>';
			/*
            //add html for action
            $row[] = '<a href="' . base_url('wcu/employee/publikasi_jurnal_internasional') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    <a href="' . base_url('wcu/employee/publikasi_jurnal_internasional') . '/edit/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> '.$controller->lang->line('label.tabel.edit').'</a>
                    <a href="#delete" class="btn btn-xs btn-danger" onClick="delete_data(\'' . base_url('wcu/employee/publikasi_jurnal_internasional') . '/delete/' . $item->ID. '\')"><i class="fa fa-remove fa-fw"></i> '.$controller->lang->line('label.tabel.delete').'</a>
					';
					*/
            //add html for action
            $row[] = '<a href="' . base_url('wcu/employee/publikasi_jurnal_internasional') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->count_all($this->table, $id),
            "recordsFiltered" => $controller->model_wcu_employee_reputation_publikasi_jurnal_internasional->count_filtered($this->table, $this->column, $this->order, $id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
	public function sematkan($controller, $id){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('publikasi_jurnal_internasional', 'Sematkan');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'year' => $id,
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur17'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/publikasi_jurnal_internasional_sematkan.tpl'); 
	}
}
