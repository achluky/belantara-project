<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Strata {
	
	private $table = 'refStrata';
	private $header = array('No.','Kode','Strata');
	private $header_column = array('AUTONUMBER','Kode','Nama');
	
	private $column = array('ID','Kode', 'Nama');
	private $order = array('ID' => 'asc');
		
    public function __construct() { }
    
	public function run($controller, $change, $id) { 
		$controller->navigation->setMenuActive('reference');
        $controller->navigation->setSubMenuActive('strata');
		$controller->navigation->setBreadcrumbReference('strata');

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
	
		$controller->navigation->setBreadcrumbReference('strata', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'data_view'=>  $controller->model_referensi->get_once($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.strata'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/reference/strata_view.tpl'); 
	}
	public function add($controller){
		$controller->navigation->setBreadcrumbReference('strata', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.strata'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/reference/strata_add.tpl'); 
	
	}
	public function save($controller){
		$data = array(
            'Kode' => $controller->input->post('code'),
            'Nama' => $controller->input->post('strata')
        );
		$id = $controller->model_referensi->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('referensi/strata/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('referensi/strata/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
		$controller->navigation->setBreadcrumbReference('strata', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_referensi->get_once($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.strata'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/reference/strata_edit.tpl'); 
	}
	public function update($controller){
		$data = array(
            'ID' => $controller->input->post('id'),
            'Kode' => $controller->input->post('code'),
            'Nama' => $controller->input->post('strata')
        );

		if ($controller->model_referensi->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('referensi/strata/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('referensi/strata/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id){

		if($controller->model_referensi->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('referensi/strata/?n=' . $alert, 'refresh');
	}
	public function export($controller){ 
		$controller->load->library('excel_generate');
        $data = $controller->model_referensi->get_exsport($this->table, $this->header, $this->header_column);
        $controller->excel_generate->setFileName("Strata");
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
							'tabel_kode' => $controller->lang->line('label.tabel.code'),
							'tabel_strata' => $controller->lang->line('label.strata'),
							'tabel_edit' => $controller->lang->line('label.tabel.edit'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.strata'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/reference/strata.tpl'); 
	}
	public function listdata_json($controller){ 
		$list = $controller->model_referensi->get_datatables($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->ID;
            $row[] = $item->Kode;
            $row[] = $item->Nama;

            //add html for action
            $row[] = '<a href="' . base_url('referensi/strata') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_referensi->count_all($this->table),
            "recordsFiltered" => $controller->model_referensi->count_filtered($this->table, $this->column, $this->order),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
}
