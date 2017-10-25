<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Foreign_guests {
	
    private $table = 'trxKegiatanTamu';
	private $header = array('No.','Nama Tamu','Unit Kerja','Nama Acara','Negara','Tahun');
	private $header_column = array('AUTONUMBER','NamaTamu','UnitKerja','NamaAcara','Negara','Tahun');
	
	private $column = array('ID','NamaTamu','UnitKerja','NamaAcara','Negara','Tahun');
	private $order = array('ID' => 'asc');
	
	public function __construct() { }
    
	
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_academic_reputation_foreign_guests');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('academic_reputation');
		$controller->navigation->setBreadcrumbWurAcademicReputation('foreign_guests');

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
			case 'sematkan': $this->sematkan($controller);
				break;
			case "export": $this->export($controller);
				break;
			case "listdata-json": $this->listdata_json($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('foreign_guests', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_foreign_guests->get_once_with_relation($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur13'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/foreign_guests_view.tpl'); 
	}
	public function add($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('foreign_guests', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$negara = $controller->model_wcu_academic_reputation_foreign_guests->get_all_negara();
		
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur13'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('negara',$negara);
        $controller->smartyci->display('admin/Wcu-academic_reputation/foreign_guests_add.tpl');
	}
	public function save($controller){
		$data = array(
            'NamaTamu' => $controller->input->post('nama_tamu'),
            'UnitKerja' => $controller->input->post('unit_kerja'),
            'NamaAcara' => $controller->input->post('nama_acara'),
            'NegaraID' => ($controller->input->post('negara')==""?NULL:$controller->input->post('negara')),
            'Tahun' => $controller->input->post('tahun'),
            'DateCreated' => date("Y-m-d H:i:s"),
            'DateUpdated' => date("Y-m-d H:i:s"),
        );
		$id = $controller->model_wcu_academic_reputation_foreign_guests->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('wcu/academic/foreign_guests/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/foreign_guests/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('foreign_guests', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$negara = $controller->model_wcu_academic_reputation_foreign_guests->get_all_negara();
		
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_foreign_guests->get_once($this->table, $id),
					'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur13'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('negara',$negara);
        $controller->smartyci->display('admin/Wcu-academic_reputation/foreign_guests_edit.tpl');
	}
	public function update($controller){
		$data = array(
            'ID' => $controller->input->post('id'),
            'NamaTamu' => $controller->input->post('nama_tamu'),
            'UnitKerja' => $controller->input->post('unit_kerja'),
            'NamaAcara' => $controller->input->post('nama_acara'),
            'NegaraID' => ($controller->input->post('negara')==""?NULL:$controller->input->post('negara')),
            'Tahun' => $controller->input->post('tahun'),
            'DateUpdated' => date("Y-m-d H:i:s"),
        );

		if ($controller->model_wcu_academic_reputation_foreign_guests->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('wcu/academic/foreign_guests/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/foreign_guests/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id=null){
		if($controller->model_wcu_academic_reputation_foreign_guests->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('wcu/academic/foreign_guests/?n=' . $alert, 'refresh');
	}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_academic_reputation_foreign_guests->get_exsport($this->table, $this->header, $this->header_column);
        $controller->excel_generate->setFileName("Foreign_Guests");
        $controller->excel_generate->setSheetName("Data");
        $controller->excel_generate->generate($data);
	}
	
	public function listdata($controller){ 
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_list'=> null,
					'label' => array(
							'tabel_id' => $controller->lang->line('label.tabel.id'),
							'tabel_nama_tamu' => $controller->lang->line('label.nama_tamu'),
							'tabel_unit_kerja' => $controller->lang->line('label.unit_kerja'),
							'tabel_nama_acara' => $controller->lang->line('label.nama_acara'),
							'tabel_negara' => $controller->lang->line('label.negara'),
							'tabel_tahun' => $controller->lang->line('label.tahun'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur13'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/foreign_guests.tpl'); 
	}
	
	public function listdata_json($controller){ 
		$list = $controller->model_wcu_academic_reputation_foreign_guests->get_datatables($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->NamaTamu;
            $row[] = $item->UnitKerja;
            $row[] = $item->NamaAcara;
            $row[] = $item->Negara;
            $row[] = $item->Tahun;
			
			/*
            //add html for action
            $row[] = '<a href="' . base_url('wcu/academic/foreign_guests') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    <a href="' . base_url('wcu/academic/foreign_guests') . '/edit/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> '.$controller->lang->line('label.tabel.edit').'</a>
                    <a href="#delete" class="btn btn-xs btn-danger" onClick="delete_data(\'' . base_url('wcu/academic/foreign_guests') . '/delete/' . $item->ID. '\')"><i class="fa fa-remove fa-fw"></i> '.$controller->lang->line('label.tabel.delete').'</a>
					';
			*/
            //add html for action
            $row[] = '<a href="' . base_url('wcu/academic/foreign_guests') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_academic_reputation_foreign_guests->count_all($this->table),
            "recordsFiltered" => $controller->model_wcu_academic_reputation_foreign_guests->count_filtered($this->table, $this->column, $this->order),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
	public function sematkan($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('foreign_guests', 'Sematkan');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur13'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/foreign_guests_sematkan.tpl'); 
	}
}
