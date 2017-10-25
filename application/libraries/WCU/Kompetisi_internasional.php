<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kompetisi_internasional {
	
	private $table = 'hisKegiatanMahasiswa';
	private $header = array('No.','NIM', 'Nama Mahasiswa','Judul Kegiatan','Jenis Kegiatan','Penyelenggara','Tempat','Tanggal Kegiatan','Tingkat','Prestasi','Sertifikat');
	private $header_column = array('AUTONUMBER','NIM', 'NamaMahasiswa', 'JudulKegiatan', 'JenisKegiatan', 'Penyelenggara','Tempat', 'TanggalKegiatan', 'Tingkat', 'Prestasi', 'Sertifikat');
	
	private $column = array('ID','NIM', 'NamaMahasiswa', 'JudulKegiatan', 'Penyelenggara','Tempat', 'TanggalKegiatan', 'Tingkat', 'Prestasi');
	private $order = array('ID' => 'asc');
	
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_employee_reputation_kompetisi_internasional');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('employee_reputation');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('kompetisi_internasional');

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
			case 'listdata': $this->listdata($controller,$id);
				break;
			case "export": $this->export($controller,$id);
				break;
			case "listdata-json": $this->listdata_json($controller,$id);
				break;
			default: $this->departemen($controller);
		}
	}
	
	public function view($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('kompetisi_internasional', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_employee_reputation_kompetisi_internasional->get_once_with_relation($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur16'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/kompetisi_internasional_view.tpl'); 
	}
	public function add($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('kompetisi_internasional', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$jenisKegiatanMahasiswa = $controller->model_wcu_employee_reputation_kompetisi_internasional->get_all_jenis_kegiatan_mahasiswa();
		$tingkat = $controller->model_wcu_employee_reputation_kompetisi_internasional->get_all_tingkat();
		$prestasiMahasiswa = $controller->model_wcu_employee_reputation_kompetisi_internasional->get_all_prestasi_mahasiswa();
		
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur16'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('jenisKegiatanMahasiswa',$jenisKegiatanMahasiswa);
        $controller->smartyci->assign('tingkat',$tingkat);
        $controller->smartyci->assign('prestasiMahasiswa',$prestasiMahasiswa);
        $controller->smartyci->display('admin/Wcu-employee_reputation/kompetisi_internasional_add.tpl');
	}
	public function save($controller){
		$data = array(
            'NIM' =>  ($controller->input->post('nama_mahasiswa')==""?NULL:$controller->input->post('nama_mahasiswa')),
            'JenisKegiatanMahasiswaID' =>  ($controller->input->post('jenis_kegiatan_mahasiswa')==""?NULL:$controller->input->post('jenis_kegiatan_mahasiswa')),
            'JudulKegiatan' => $controller->input->post('judul_kegiatan'),
            'TanggalKegiatan' => $controller->input->post('tanggal_kegiatan'),
            'Penyelenggara' => $controller->input->post('nama_penyelenggara'),
            'Tempat' => $controller->input->post('tempat'),
            'LingkupID' => ($controller->input->post('tingkat')==""?NULL:$controller->input->post('tingkat')),
            'PrestasiMahasiswaID' => ($controller->input->post('prestasi_mahasiswa')==""?NULL:$controller->input->post('prestasi_mahasiswa')),
            'Sertifikat' => $controller->input->post('sertifikat'),
        );
		$id = $controller->model_wcu_employee_reputation_kompetisi_internasional->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('wcu/employee/kompetisi_internasional/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/employee/kompetisi_internasional/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurEmployeeReputation('kompetisi_internasional', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$jenisKegiatanMahasiswa = $controller->model_wcu_employee_reputation_kompetisi_internasional->get_all_jenis_kegiatan_mahasiswa();
		$tingkat = $controller->model_wcu_employee_reputation_kompetisi_internasional->get_all_tingkat();
		$prestasiMahasiswa = $controller->model_wcu_employee_reputation_kompetisi_internasional->get_all_prestasi_mahasiswa();
	
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_employee_reputation_kompetisi_internasional->get_once($this->table, $id),
					'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur16'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('jenisKegiatanMahasiswa',$jenisKegiatanMahasiswa);
        $controller->smartyci->assign('tingkat',$tingkat);
        $controller->smartyci->assign('prestasiMahasiswa',$prestasiMahasiswa);
        $controller->smartyci->display('admin/Wcu-employee_reputation/kompetisi_internasional_edit.tpl');
	}
	public function update($controller){
		$data = array(
            'ID' => $controller->input->post('id'),
            'NIM' =>  ($controller->input->post('nama_mahasiswa')==""?NULL:$controller->input->post('nama_mahasiswa')),
            'JenisKegiatanMahasiswaID' =>  ($controller->input->post('jenis_kegiatan_mahasiswa')==""?NULL:$controller->input->post('jenis_kegiatan_mahasiswa')),
            'JudulKegiatan' => $controller->input->post('judul_kegiatan'),
            'TanggalKegiatan' => $controller->input->post('tanggal_kegiatan'),
            'Penyelenggara' => $controller->input->post('nama_penyelenggara'),
            'Tempat' => $controller->input->post('tempat'),
            'LingkupID' => ($controller->input->post('tingkat')==""?NULL:$controller->input->post('tingkat')),
            'PrestasiMahasiswaID' => ($controller->input->post('prestasi_mahasiswa')==""?NULL:$controller->input->post('prestasi_mahasiswa')),
            'Sertifikat' => $controller->input->post('sertifikat'),
        );

		if ($controller->model_wcu_employee_reputation_kompetisi_internasional->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('wcu/employee/kompetisi_internasional/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/employee/kompetisi_internasional/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id=null){
		if($controller->model_wcu_employee_reputation_kompetisi_internasional->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('wcu/employee/kompetisi_internasional/?n=' . $alert, 'refresh');
	}	
	public function export($controller, $id){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_employee_reputation_kompetisi_internasional->get_exsport($this->table, $this->header, $this->header_column, $id);
        $controller->excel_generate->setFileName("Kompetisi_Internasional");
        $controller->excel_generate->setSheetName("Data");
        $controller->excel_generate->generate($data);
	}
	public function departemen($controller){	
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_departement'=>$controller->model_wcu_employee_reputation_kompetisi_internasional->getListDepartement(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur16'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/kompetisi_internasional_departemen.tpl'); 
	}
	public function listdata($controller,$id){ 
		if($id==null)return "";
        $tempId = explode("-", $id);
        if(!isset($tempId[1]))return "";
        $mayor = $tempId[1];
		
		$sess = $controller->session->userdata('logged_in');

		$controller->navigation->setBreadcrumbWurEmployeeReputation('kompetisi_internasional',
		 $controller->model_wcu_employee_reputation_kompetisi_internasional->getMayor($mayor));
		
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		 $data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_list'=> null,
                    'mayorID'=>$tempId[1],
                    'strataID' => $tempId[0],
                    'mayor'=>$controller->model_wcu_employee_reputation_kompetisi_internasional->getMayor($mayor)." (".getStrata($tempId[0]).")",
					'label' => array(
							'tabel_id' => $controller->lang->line('label.tabel.id'),
							'tabel_nim' => $controller->lang->line('label.nim'),
							'tabel_nama_mahasiswa' => $controller->lang->line('label.nama_mahasiswa'),
							'tabel_judul_kegiatan' => $controller->lang->line('label.judul_kegiatan'),
							'tabel_nama_penyelenggara' => $controller->lang->line('label.nama_penyelenggara'),
							'tabel_tempat' => $controller->lang->line('label.tempat'),
							'tabel_tanggal_kegiatan' => $controller->lang->line('label.tanggal_kegiatan'),
							'tabel_tingkat' => $controller->lang->line('label.tingkat'),
							'tabel_prestasi_mahasiswa' => $controller->lang->line('label.prestasi_mahasiswa'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur16'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/kompetisi_internasional.tpl'); 
	}
	
	public function listdata_json($controller, $id){ 
		$list = $controller->model_wcu_employee_reputation_kompetisi_internasional->get_datatables($this->table, $this->column, $this->order, $id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->ID;
            $row[] = $item->NIM;
            $row[] = $item->NamaMahasiswa;
            $row[] = $item->JudulKegiatan;
            $row[] = $item->Penyelenggara;
            $row[] = $item->Tempat;
            $row[] = $item->TanggalKegiatan;
            $row[] = $item->Tingkat;
            $row[] = $item->Prestasi;
			
			/*
            //add html for action
            $row[] = '<a href="' . base_url('wcu/employee/kompetisi_internasional') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    <a href="' . base_url('wcu/employee/kompetisi_internasional') . '/edit/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> '.$controller->lang->line('label.tabel.edit').'</a>
                    <a href="#delete" class="btn btn-xs btn-danger" onClick="delete_data(\'' . base_url('wcu/employee/kompetisi_internasional') . '/delete/' . $item->ID. '\')"><i class="fa fa-remove fa-fw"></i> '.$controller->lang->line('label.tabel.delete').'</a>
					';
			*/
            //add html for action
            $row[] = '<a href="' . base_url('wcu/employee/kompetisi_internasional') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
              	';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_employee_reputation_kompetisi_internasional->count_all($this->table),
            "recordsFiltered" => $controller->model_wcu_employee_reputation_kompetisi_internasional->count_filtered($this->table, $this->column, $this->order, $id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
	public function sematkan($controller, $id){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'strata_mayorID' => $id,
                    'title'=> $controller->lang->line('navigation.navbar.wcu.employee_reputation.wur16'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-employee_reputation/kompetisi_internasional_sematkan.tpl'); 
	}
}
