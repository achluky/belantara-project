<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Program_studi_terakreditasi_internasional {
	
    private $table = 'hisAkreditasiPS';
	private $header = array('No.','Mayor','Departemen','Fakultas','Predikat Akreditasi','Nilai Akreditasi','Tingkat','Lembaga Pengakreditasi','Tanggal Mulai','Tanggal Berakhir');
	private $header_column = array('AUTONUMBER','Mayor','Departemen','Fakultas','PredikatAkreditasi','NilaiAkreditasi','Tingkat','LembagaPengakreditasi','TMTAkreditasi','TSTAkreditasi');
	
	private $column = array('ID','Mayor','PredikatAkreditasi','NilaiAkreditasi','LembagaPengakreditasi','Tingkat','TMTAkreditasi','TSTAkreditasi');
	private $order = array('ID' => 'asc');
	
    public function __construct() { }
    
	
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_academic_reputation_program_studi_terakreditasi_internasional');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('academic_reputation');
		$controller->navigation->setBreadcrumbWurAcademicReputation('program_studi_terakreditasi_internasional');

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
			case 'sematkan':$this->sematkan($controller,$id);
				break;
			case "export": $this->export($controller,$id);
				break;
			case 'listdata': $this->listdata($controller,$id);
				break;
			case "listdata-json": $this->listdata_json($controller,$id);
				break;
			default: $this->departemen($controller);
		}
	}
	public function departemen($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('program_studi_terakreditasi_internasional');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->getListDepartement(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur14'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/program_studi_terakreditasi_internasional_departemen.tpl'); 
	}
	public function view($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('program_studi_terakreditasi_internasional', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_once_with_relation($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur14'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/program_studi_terakreditasi_internasional_view.tpl'); 
	}
	public function add($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('program_studi_terakreditasi_internasional', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$tingkat = $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_all_tingkat();
		$lembagaPengakreditasi = $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_all_lembaga_pengakreditasi();
		
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur14'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('tingkat',$tingkat);
        $controller->smartyci->assign('lembagaPengakreditasi',$lembagaPengakreditasi);
        $controller->smartyci->display('admin/Wcu-academic_reputation/program_studi_terakreditasi_internasional_add.tpl');
	}
	public function save($controller){
		$data = array(
            'Mayor' => $controller->input->post('mayor'),
            'Departemen' => $controller->input->post('departemen'),
            'Fakultas' => $controller->input->post('fakultas'),
            'NilaiAkreditasi' => $controller->input->post('nilai_akreditasi'),
            'PredikatAkreditasi' => $controller->input->post('predikat_akreditasi'),
            'TMTAkreditasi' => $controller->input->post('tanggal_mulai'),
            'TSTAkreditasi' => $controller->input->post('tanggal_berakhir'),
            'LembagaPengakreditasiID' => ($controller->input->post('lembaga_pengakreditasi')==""?NULL:$controller->input->post('lembaga_pengakreditasi')),
            'LingkupAkreditasiID' => ($controller->input->post('tingkat')==""?NULL:$controller->input->post('tingkat')),
        );
		$id = $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('wcu/academic/program_studi_terakreditasi_internasional/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/program_studi_terakreditasi_internasional/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('program_studi_terakreditasi_internasional', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$tingkat = $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_all_tingkat();
		$lembagaPengakreditasi = $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_all_lembaga_pengakreditasi();
		
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_once($this->table, $id),
					'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur14'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('tingkat',$tingkat);
        $controller->smartyci->assign('lembagaPengakreditasi',$lembagaPengakreditasi);
        $controller->smartyci->display('admin/Wcu-academic_reputation/program_studi_terakreditasi_internasional_edit.tpl');
	}
	public function update($controller){
		$data = array(
            'ID' => $controller->input->post('id'),
            'Mayor' => $controller->input->post('mayor'),
            'Departemen' => $controller->input->post('departemen'),
            'Fakultas' => $controller->input->post('fakultas'),
            'NilaiAkreditasi' => $controller->input->post('nilai_akreditasi'),
            'PredikatAkreditasi' => $controller->input->post('predikat_akreditasi'),
            'TMTAkreditasi' => $controller->input->post('tanggal_mulai'),
            'TSTAkreditasi' => $controller->input->post('tanggal_berakhir'),
            'LembagaPengakreditasiID' => ($controller->input->post('lembaga_pengakreditasi')==""?NULL:$controller->input->post('lembaga_pengakreditasi')),
            'LingkupAkreditasiID' => ($controller->input->post('tingkat')==""?NULL:$controller->input->post('tingkat')),
        );

		if ($controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('wcu/academic/program_studi_terakreditasi_internasional/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/program_studi_terakreditasi_internasional/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id=null){
	
		if($controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('wcu/academic/program_studi_terakreditasi_internasional/?n=' . $alert, 'refresh');
	}
	public function export($controller, $id){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_exsport($this->table, $this->header, $this->header_column, $id);
        $controller->excel_generate->setFileName("Program_Studi_Terakreditasi_Internasional");
        $controller->excel_generate->setSheetName("Data");
        $controller->excel_generate->generate($data);
	}
	
	public function listdata($controller, $id){ 
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('program_studi_terakreditasi_internasional', getDepartementStructur($id));
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_list'=> null,
                    'departementID'=>$id,
					'label' => array(
							'tabel_id' => $controller->lang->line('label.tabel.id'),
							'tabel_mayor' => $controller->lang->line('label.mayor'),
							'tabel_predikat_akreditasi' => $controller->lang->line('label.predikat_akreditasi'),
							'tabel_nilai_akreditasi' => $controller->lang->line('label.nilai_akreditasi'),
							'tabel_lembaga_pengakreditasi' => $controller->lang->line('label.lembaga_pengakreditasi'),
							'tabel_tingkat' => $controller->lang->line('label.tingkat'),
							'tabel_tanggal_mulai' => $controller->lang->line('label.tanggal_mulai'),
							'tabel_tanggal_berakhir' => $controller->lang->line('label.tanggal_berakhir'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur14'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/program_studi_terakreditasi_internasional.tpl'); 
	}
	
	public function listdata_json($controller, $id){ 
		$list = $controller->model_wcu_academic_reputation_program_studi_terakreditasi_internasional->get_datatables($this->table, $this->column, $this->order, $id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->Mayor." (".$item->Strata.")";
            $row[] = $item->PredikatAkreditasi;
            $row[] = $item->NilaiAkreditasi;
            $row[] = $item->LembagaPengakreditasi;
            $row[] = $item->Tingkat;
            $row[] = $item->TMTAkreditasi;
            $row[] = $item->TSTAkreditasi;
			/*
            //add html for action
            $row[] = '<a href="' . base_url('wcu/academic/program_studi_terakreditasi_internasional') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    <a href="' . base_url('wcu/academic/program_studi_terakreditasi_internasional') . '/edit/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> '.$controller->lang->line('label.tabel.edit').'</a>
                    <a href="#delete" class="btn btn-xs btn-danger" onClick="delete_data(\'' . base_url('wcu/academic/program_studi_terakreditasi_internasional') . '/delete/' . $item->ID. '\')"><i class="fa fa-remove fa-fw"></i> '.$controller->lang->line('label.tabel.delete').'</a>
					';
			*/
            //add html for action
            $row[] = '<a href="' . base_url('wcu/academic/program_studi_terakreditasi_internasional') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $no,
            "recordsFiltered" => $no,
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
	public function sematkan($controller,$id){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('program_studi_terakreditasi_internasional', 'Sematkan');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'departemenID'=>$id,
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur14'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/program_studi_terakreditasi_internasional_sematkan.tpl'); 
	}
}
