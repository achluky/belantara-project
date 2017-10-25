<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keikutsertaan_dosen {
	
	private $table = 'trxAsosiasiProfesiDosen';
	private $header = array('No.','NIP', 'Nama Dosen','Nama Asosiasi','Posisi','Nomor Anggota','Terdaftar Tanggal','Negara');
	private $header_column = array('AUTONUMBER','NIP', 'NamaDosen', 'NamaAsosiasi', 'Posisi', 'NomorAnggota','TerdaftarTanggal','Negara');
	private $column = array('ID','NIP', 'NamaDosen', 'NamaAsosiasi', 'Posisi', 'NomorAnggota','TerdaftarTanggal','Negara');
	private $order = array('ID' => 'asc');
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_employee_reputation_keikutsertaan_dosen');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('employee_reputation');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('keikutsertaan_dosen');

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
			case "export": $this->export($controller, $id);
				break;
			case 'listdepartemen': $this->listdepartemen($controller);
				break;
			case 'listdata': $this->listdata($controller, $id);
				break;
			case "listdata-json": $this->listdata_json($controller, $id);
				break;
			default: $this->listdepartemen($controller);
		}
	}
	
	
	
	public function view($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('keikutsertaan_dosen', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_employee_reputation_keikutsertaan_dosen->get_once_with_relation($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur18'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/keikutsertaan_dosen_view.tpl'); 
	}
	public function add($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('keikutsertaan_dosen', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$asosiasi = $controller->model_wcu_employee_reputation_keikutsertaan_dosen->get_all_asosiasi();
		
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur18'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('asosiasi',$asosiasi);
        $controller->smartyci->display('admin/Wcu-employee_reputation/keikutsertaan_dosen_add.tpl');
	}
	public function save($controller){
		$data = array(
            'NIP' =>  ($controller->input->post('nama_dosen')==""?NULL:$controller->input->post('nama_dosen')),
            'AsosiasiID' =>  ($controller->input->post('nama_asosiasi')==""?NULL:$controller->input->post('nama_asosiasi')),
            'Posisi' => $controller->input->post('posisi'),
            'NomorAnggota' => $controller->input->post('nomor_anggota'),
            'TerdaftarTanggal' => $controller->input->post('terdaftar_tanggal'),
        );
		$id = $controller->model_wcu_employee_reputation_keikutsertaan_dosen->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('wcu/employee/keikutsertaan_dosen/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/employee/keikutsertaan_dosen/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('keikutsertaan_dosen', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$asosiasi = $controller->model_wcu_employee_reputation_keikutsertaan_dosen->get_all_asosiasi();
		
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_employee_reputation_keikutsertaan_dosen->get_once($this->table, $id),
					'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur18'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('asosiasi',$asosiasi);
        $controller->smartyci->display('admin/Wcu-employee_reputation/keikutsertaan_dosen_edit.tpl');
	}
	public function update($controller){
		$data = array(
            'ID' => $controller->input->post('id'),
            'NIP' =>  ($controller->input->post('nama_dosen')==""?NULL:$controller->input->post('nama_dosen')),
            'AsosiasiID' =>  ($controller->input->post('nama_asosiasi')==""?NULL:$controller->input->post('nama_asosiasi')),
            'Posisi' => $controller->input->post('posisi'),
            'NomorAnggota' => $controller->input->post('nomor_anggota'),
            'TerdaftarTanggal' => $controller->input->post('terdaftar_tanggal'),
        );

		if ($controller->model_wcu_employee_reputation_keikutsertaan_dosen->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('wcu/employee/keikutsertaan_dosen/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/employee/keikutsertaan_dosen/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id=null){
		if($controller->model_wcu_employee_reputation_keikutsertaan_dosen->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('wcu/employee/keikutsertaan_dosen/?n=' . $alert, 'refresh');
	}
	public function export($controller, $id){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_employee_reputation_keikutsertaan_dosen->get_exsport($this->table, $this->header, $this->header_column, $id);
        $controller->excel_generate->setFileName("Keikutsertaan_Dosen");
        $controller->excel_generate->setSheetName("Data");
        $controller->excel_generate->generate($data);
	}
	
	public function listdata($controller, $id){ 
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('keikutsertaan_dosen', 'List Dosen');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		 $data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'departement' => $id,
                    'data_list'=> null,
                    'title_departement' => getDepartementStructur($id),
					'label' => array(
							'tabel_id' => $controller->lang->line('label.tabel.id'),
							'tabel_nip' => $controller->lang->line('label.nip'),
							'tabel_nama_dosen' => $controller->lang->line('label.nama_dosen'),
							'tabel_nama_asosiasi' => $controller->lang->line('label.nama_asosiasi'),
							'tabel_posisi' => $controller->lang->line('label.posisi'),
							'tabel_nomor_anggota' => $controller->lang->line('label.nomor_anggota'),
							'tabel_terdaftar_tanggal' => $controller->lang->line('label.terdaftar_tanggal'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'tabel_negara' => $controller->lang->line('label.negara'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur18'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/keikutsertaan_dosen.tpl'); 
	}
	public function listdepartemen($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('keikutsertaan_dosen');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'departement'=>  $controller->model_wcu_employee_reputation_keikutsertaan_dosen->getListDepartement(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur18'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/keikutsertaan_dosen_departemen.tpl'); 
	}
	public function listdata_json($controller,$id){ 
		$list = $controller->model_wcu_employee_reputation_keikutsertaan_dosen->get_datatables($this->table, $this->column, $this->order, $id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->ID;
            $row[] = $item->NIP;
            $row[] = $item->NamaDosen;
            $row[] = $item->NamaAsosiasi;
            $row[] = $item->Posisi;
            $row[] = $item->NomorAnggota;
            $row[] = $item->TerdaftarTanggal;
            $row[] = $item->Negara;
			/*
            //add html for action
            $row[] = '<a href="' . base_url('wcu/employee/keikutsertaan_dosen') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    <a href="' . base_url('wcu/employee/keikutsertaan_dosen') . '/edit/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> '.$controller->lang->line('label.tabel.edit').'</a>
                    <a href="#delete" class="btn btn-xs btn-danger" onClick="delete_data(\'' . base_url('wcu/employee/keikutsertaan_dosen') . '/delete/' . $item->ID. '\')"><i class="fa fa-remove fa-fw"></i> '.$controller->lang->line('label.tabel.delete').'</a>
					';
			*/
            //add html for action
            $row[] = '<a href="' . base_url('wcu/employee/keikutsertaan_dosen') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_employee_reputation_keikutsertaan_dosen->count_all($this->table),
            "recordsFiltered" => $controller->model_wcu_employee_reputation_keikutsertaan_dosen->count_filtered($this->table, $this->column, $this->order, $id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
	public function sematkan($controller, $id){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('keikutsertaan_dosen','Sematkan');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'departement'=>  $id,
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur18'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/keikutsertaan_dosen_sematkan.tpl'); 
	}
}
