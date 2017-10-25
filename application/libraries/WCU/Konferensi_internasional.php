<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konferensi_internasional {
	
	private $table = 'trxKonferensi';
	private $header = array('No.','Nama Konferensi','Nama Penyelenggara','Tingkat','Tahun','Tuan Rumah');
	private $header_column = array('AUTONUMBER','NamaKonferensi','NamaPenyelenggara','Tingkat','Tahun','TuanRumah');
	
	private $column = array('ID','NamaKonferensi','NamaPenyelenggara','Tingkat','Tahun','TuanRumah');
	private $order = array('ID' => 'asc');
	
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_academic_reputation_konferensi_internasional');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('academic_reputation');
		$controller->navigation->setBreadcrumbWurAcademicReputation('konferensi_internasional');

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
		$controller->navigation->setBreadcrumbWurAcademicReputation('konferensi_internasional', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_konferensi_internasional->get_once_with_relation($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur12'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/konferensi_internasional_view.tpl'); 
	}
	public function add($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('konferensi_internasional', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$tingkat = $controller->model_wcu_academic_reputation_konferensi_internasional->get_all_tingkat();
		
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur12'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('tingkat',$tingkat);
        $controller->smartyci->display('admin/Wcu-academic_reputation/konferensi_internasional_add.tpl'); 
	}
	public function save($controller){
		$tuan_rumah = ($controller->input->post('tuan_rumah')==""?NULL:$controller->input->post('tuan_rumah'));
		if($tuan_rumah=="on"){
			$tuan_rumah =1;
		}else{
			$tuan_rumah =0;
		}
		$data = array(
            'NamaKonferensi' => $controller->input->post('nama_konferensi'),
            'NamaPenyelenggara' => $controller->input->post('nama_penyelenggara'),
            'isTuanRumah' => $tuan_rumah,
            'LingkupID' => ($controller->input->post('tingkat')==""?NULL:$controller->input->post('tingkat')),
            'Tahun' => $controller->input->post('tahun'),
            'DateCreated' => date("Y-m-d H:i:s"),
            'DateUpdated' => date("Y-m-d H:i:s"),
        );
		$id = $controller->model_wcu_academic_reputation_konferensi_internasional->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('wcu/academic/konferensi_internasional/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/konferensi_internasional/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('konferensi_internasional', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$tingkat = $controller->model_wcu_academic_reputation_konferensi_internasional->get_all_tingkat();
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_konferensi_internasional->get_once($this->table, $id),
					'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur12'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('tingkat',$tingkat);
        $controller->smartyci->display('admin/Wcu-academic_reputation/konferensi_internasional_edit.tpl'); 
	}
	public function update($controller){
		$tuan_rumah = ($controller->input->post('tuan_rumah')==""?NULL:$controller->input->post('tuan_rumah'));
		if($tuan_rumah=="on"){
			$tuan_rumah =1;
		}else{
			$tuan_rumah =0;
		}
		
		$data = array(
            'ID' => $controller->input->post('id'),
            'NamaKonferensi' => $controller->input->post('nama_konferensi'),
            'NamaPenyelenggara' => $controller->input->post('nama_penyelenggara'),
            'isTuanRumah' => $tuan_rumah,
            'LingkupID' => ($controller->input->post('tingkat')==""?NULL:$controller->input->post('tingkat')),
            'Tahun' => $controller->input->post('tahun'),
            'DateUpdated' => date("Y-m-d H:i:s"),
        );

		if ($controller->model_wcu_academic_reputation_konferensi_internasional->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('wcu/academic/konferensi_internasional/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/konferensi_internasional/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id){
		if($controller->model_wcu_academic_reputation_konferensi_internasional->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('wcu/academic/konferensi_internasional/?n=' . $alert, 'refresh');
	}
	public function export($controller){ 
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_academic_reputation_konferensi_internasional->get_exsport($this->table, $this->header, $this->header_column);
        $controller->excel_generate->setFileName("Konferensi_Internasional");
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
							'tabel_nama_konferensi' => $controller->lang->line('label.nama_konferensi'),
							'tabel_nama_penyelenggara' => $controller->lang->line('label.nama_penyelenggara'),
							'tabel_tingkat' => $controller->lang->line('label.tingkat'),
							'tabel_tahun' => $controller->lang->line('label.tahun'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur12'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/konferensi_internasional.tpl'); 
	}
	
	public function listdata_json($controller){ 
		$list = $controller->model_wcu_academic_reputation_konferensi_internasional->get_datatables($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->NamaKonferensi;
            $row[] = $item->NamaPenyelenggara;
            $row[] = $item->Tingkat;
            $row[] = $item->Tahun;
			/*
            //add html for action
            $row[] = '<a href="' . base_url('wcu/academic/konferensi_internasional') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    <a href="' . base_url('wcu/academic/konferensi_internasional') . '/edit/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> '.$controller->lang->line('label.tabel.edit').'</a>
                    <a href="#delete" class="btn btn-xs btn-danger" onClick="delete_data(\'' . base_url('wcu/academic/konferensi_internasional') . '/delete/' . $item->ID. '\')"><i class="fa fa-remove fa-fw"></i> '.$controller->lang->line('label.tabel.delete').'</a>
					';
			*/
            //add html for action
            $row[] = '<a href="' . base_url('wcu/academic/konferensi_internasional') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
              	';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_academic_reputation_konferensi_internasional->count_all($this->table),
            "recordsFiltered" => $controller->model_wcu_academic_reputation_konferensi_internasional->count_filtered($this->table, $this->column, $this->order),
            "data" => $data,
        );
        //output to json date_format()
        echo json_encode($output);
	}
	public function sematkan($controller){

		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('konferensi_internasional', 'Sematkan');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur12'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/konferensi_internasional_sematkan.tpl'); 
	}
}
