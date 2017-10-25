<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lembaga_pengakreditasi {
	
	private $table = 'refLembagaPengakreditasi';
	private $header = array('No.','Nama Lembaga','Bidang Akreditasi','Negara','Website','Tanggal Berdiri');
	private $header_column = array('AUTONUMBER','Nama','BidangAkreditasi','Negara','SitusWeb','TanggalBerdiri');
	
	private $column = array('ID','Nama','BidangAkreditasi','Negara','SitusWeb','TanggalBerdiri');
	private $order = array('ID' => 'asc');
		
    public function __construct() { }
    
	public function run($controller, $change, $id) { 
		$controller->navigation->setMenuActive('reference');
        $controller->navigation->setSubMenuActive('lembaga_pengakreditasi');
		$controller->navigation->setBreadcrumbReference('lembaga_pengakreditasi');

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
		$controller->navigation->setBreadcrumbReference('lembaga_pengakreditasi', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'data_view'=>  $controller->model_referensi->get_once_lembaga_pengakreditasi($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.lembaga_pengakreditasi'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/reference/lembaga_pengakreditasi_view.tpl'); 
	}
	public function add($controller){
		$controller->navigation->setBreadcrumbReference('lembaga_pengakreditasi', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$negara = $controller->model_referensi->get_all_negara();
		
		
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.lembaga_pengakreditasi'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('negara',$negara);
        $controller->smartyci->display('admin/reference/lembaga_pengakreditasi_add.tpl'); 
	
	}
	public function save($controller){
		$data = array(
            'Nama' => $controller->input->post('nama_lembaga'),
            'BidangAkreditasi' => $controller->input->post('bidang_akreditasi'),
            'NegaraID' => $controller->input->post('negara'),
            'SitusWeb' => $controller->input->post('situs_web'),
            'TanggalBerdiri' => $controller->input->post('tanggal_berdiri')
        );
		$id = $controller->model_referensi->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('referensi/lembaga_pengakreditasi/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('referensi/lembaga_pengakreditasi/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
		$controller->navigation->setBreadcrumbReference('lembaga_pengakreditasi', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$negara = $controller->model_referensi->get_all_negara();
		
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_referensi->get_once($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.lembaga_pengakreditasi'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('negara',$negara);
        $controller->smartyci->display('admin/reference/lembaga_pengakreditasi_edit.tpl'); 
	}
	public function update($controller){
		$data = array(
            'ID' => $controller->input->post('id'),
            'Nama' => $controller->input->post('nama_lembaga'),
            'BidangAkreditasi' => $controller->input->post('bidang_akreditasi'),
            'NegaraID' => $controller->input->post('negara'),
            'SitusWeb' => $controller->input->post('situs_web'),
            'TanggalBerdiri' => $controller->input->post('tanggal_berdiri')
        );

		if ($controller->model_referensi->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('referensi/lembaga_pengakreditasi/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('referensi/lembaga_pengakreditasi/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id){

		if($controller->model_referensi->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('referensi/lembaga_pengakreditasi/?n=' . $alert, 'refresh');
	}
	public function export($controller){ 
		$controller->load->library('excel_generate');
        $data = $controller->model_referensi->get_exsport_lembaga_pengakreditasi($this->table, $this->header, $this->header_column);
        $controller->excel_generate->setFileName("Lembaga_Pengakreditasi");
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
							'tabel_nama_lembaga' => $controller->lang->line('label.nama_lembaga'),
							'tabel_bidang_akreditasi' => $controller->lang->line('label.bidang_akreditasi'),
							'tabel_negara' => $controller->lang->line('label.negara'),
							'tabel_situs_web' => $controller->lang->line('label.situs_web'),
							'tabel_tanggal_berdiri' => $controller->lang->line('label.tanggal_berdiri'),
							'tabel_edit' => $controller->lang->line('label.tabel.edit'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.referensi.lembaga_pengakreditasi'),
                    'last_login' => $controller->session->userdata('logged_in')['last_login'],
					'session' => $controller->session->userdata('logged_in')['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/reference/lembaga_pengakreditasi.tpl'); 
	}
	public function listdata_json($controller){ 
		$list = $controller->model_referensi->get_datatables_lembaga_pengakreditasi($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->ID;
            $row[] = $item->Nama;
            $row[] = $item->BidangAkreditasi;
            $row[] = $item->Negara;
            $row[] = '<td><i class="glyphicon glyphicon-link"></i> &nbsp; <a href="'.$item->SitusWeb.'" target="_blank_">'.$item->SitusWeb.'</a></td>';
                         
            $row[] = $item->TanggalBerdiri;

            //add html for action
            $row[] = '<a href="' . base_url('referensi/lembaga_pengakreditasi') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_referensi->count_all_lembaga_pengakreditasi($this->table),
            "recordsFiltered" => $controller->model_referensi->count_filtered_lembaga_pengakreditasi($this->table, $this->column, $this->order),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
}
