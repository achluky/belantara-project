<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asosiasi_profesi {
	
	private $table = 'refAsosiasiProfesi';
	private $header = array('No.','Nama Asosiasi','Bidang Profesi','Negara');
	private $header_column = array('AUTONUMBER','Nama','BidangProfesi','Negara');
	
	private $column = array('ID','Nama','Negara','BidangProfesi');
	private $order = array('ID' => 'asc');
		
    public function __construct() { }
    
	public function run($controller, $change, $id) { 
		$controller->navigation->setMenuActive('reference');
        $controller->navigation->setSubMenuActive('asosiasi_profesi');
		$controller->navigation->setBreadcrumbReference('asosiasi_profesi');

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
			case "export": $this->export($controller);
				break;
			case "listdata-json": $this->listdata_json($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller, $id){
		$controller->navigation->setBreadcrumbReference('asosiasi_profesi', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'data_view'=>  $controller->model_referensi->get_once_asosiasi_profesi($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.asosiasi_profesi'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/reference/asosiasi_profesi_view.tpl'); 
	}
	public function add($controller){
		$controller->navigation->setBreadcrumbReference('asosiasi_profesi', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$negara = $controller->model_referensi->get_all_negara();
		
		
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.asosiasi_profesi'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('negara',$negara);
        $controller->smartyci->display('admin/reference/asosiasi_profesi_add.tpl'); 
	
	}
	public function save($controller){
		$data = array(
            'Nama' => $controller->input->post('nama_asosiasi'),
            'BidangProfesi' => $controller->input->post('bidang_profesi'),
            'NegaraID' => $controller->input->post('negara')
        );
		$id = $controller->model_referensi->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('referensi/asosiasi_profesi/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('referensi/asosiasi_profesi/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
		$controller->navigation->setBreadcrumbReference('asosiasi_profesi', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$negara = $controller->model_referensi->get_all_negara();
		
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_referensi->get_once($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.asosiasi_profesi'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('negara',$negara);
        $controller->smartyci->display('admin/reference/asosiasi_profesi_edit.tpl'); 
	}
	public function update($controller){
		$data = array(
            'ID' => $controller->input->post('id'),
            'Nama' => $controller->input->post('nama_asosiasi'),
            'BidangProfesi' => $controller->input->post('bidang_profesi'),
            'NegaraID' => $controller->input->post('negara')
        );

		if ($controller->model_referensi->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('referensi/asosiasi_profesi/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('referensi/asosiasi_profesi/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id){

		if($controller->model_referensi->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('referensi/asosiasi_profesi/?n=' . $alert, 'refresh');
	}
	public function export($controller){ 
		$controller->load->library('excel_generate');
        $data = $controller->model_referensi->get_exsport_asosiasi_profesi($this->table, $this->header, $this->header_column);
        $controller->excel_generate->setFileName("Asosiasi_Profesi");
        $controller->excel_generate->setSheetName("Data");
        $controller->excel_generate->generate($data);
	}
	public function listdata($controller){ 
		 $data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_list'=> null,
					'label' => array(
							'tabel_id' => $controller->lang->line('label.tabel.id'),
							'tabel_nama_asosiasi' => $controller->lang->line('label.nama_asosiasi'),
							'tabel_bidang_profesi' => $controller->lang->line('label.bidang_profesi'),
							'tabel_negara' => $controller->lang->line('label.negara'),
							'tabel_edit' => $controller->lang->line('label.tabel.edit'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.asosiasi_profesi'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/reference/asosiasi_profesi.tpl'); 
	}
	public function listdata_json($controller){ 
		$list = $controller->model_referensi->get_datatables_asosiasi_profesi($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->ID;
            $row[] = $item->Nama;
            $row[] = $item->BidangProfesi;
            $row[] = $item->Negara;
			
            //add html for action
            $row[] = '<a href="' . base_url('referensi/asosiasi_profesi') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_referensi->count_all_asosiasi_profesi($this->table),
            "recordsFiltered" => $controller->model_referensi->count_filtered_asosiasi_profesi($this->table, $this->column, $this->order),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
}
