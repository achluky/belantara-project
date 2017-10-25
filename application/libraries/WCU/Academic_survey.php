<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Academic_survey {
	
	private $table = 'trxKontakSurvey';
	private $header = array('No.', 'Nama Depan','Nama Belakang','Gelar','Email','Telepon','Negara','Universitas','Pekerjaan','Posisi Pekerjaan', 'Sektor Pekerjaan', 'Departemen', 'Institusi');
	private $header_column = array('AUTONUMBER','NamaDepan','NamaBelakang','Gelar','Email','Telepon','Negara','Universitas','Pekerjaan','PosisiPekerjaan', 'SektorPekerjaan', 'Departemen', 'Institusi');
	
	private $column = array('ID','NamaDepan','NamaBelakang','Gelar','Negara','Universitas','Pekerjaan','Departemen', 'Institusi');
	private $order = array('ID' => 'asc');
	
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_academic_reputation_academic_survey');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('academic_reputation');
		$controller->navigation->setBreadcrumbWurAcademicReputation('academic_survey');

		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	
		switch($change){
			case "view": $this->view($controller, $id);
				break;
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
			case "export": $this->export($controller);
				break;
			case "listdata-json": $this->listdata_json($controller);
				break;
            case "sematkan": $this->sematkan($controller);
                break;
			default: $this->listdata($controller);
		}
	}
	public function view($controller, $id=null){
        $sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('academic_survey', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_academic_survey->get_once_with_relation($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur15'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/academic_survey_view.tpl'); 
	}
	public function add($controller){
        $sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('academic_survey', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$negara = $controller->model_wcu_academic_reputation_academic_survey->get_all_negara();
		$jenisKontakSurvey = $controller->model_wcu_academic_reputation_academic_survey->get_all_jenis_kontak_survey();
		
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur15'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('negara',$negara);
        $controller->smartyci->assign('jenisKontakSurvey',$jenisKontakSurvey);
        $controller->smartyci->display('admin/Wcu-academic_reputation/academic_survey_add.tpl');
	}
	public function save($controller){
		$data = array(
            'NamaDepan' => $controller->input->post('nama_depan'),
            'NamaBelakang' => $controller->input->post('nama_belakang'),
            'Gelar' => $controller->input->post('gelar'),
            'Email' => $controller->input->post('email'),
            'Telepon' => $controller->input->post('telepon'),
            'NegaraID' => ($controller->input->post('negara')==""?NULL:$controller->input->post('negara')),
            'Universitas' => $controller->input->post('universitas'),
            'Pekerjaan' => $controller->input->post('pekerjaan'),
            'PosisiPekerjaan' => $controller->input->post('posisi_pekerjaan'),
            'SektorPekerjaan' => $controller->input->post('sektor_pekerjaan'),
            'Departemen' => $controller->input->post('departemen'),
            'Institusi' => $controller->input->post('institusi'),
            'JenisKontakSurveyID' => ($controller->input->post('jenis_kontak_survey')==""?NULL:$controller->input->post('jenis_kontak_survey')),
            'DateCreated' => date("Y-m-d H:i:s"),
            'DateUpdated' => date("Y-m-d H:i:s"),
        );
		$id = $controller->model_wcu_academic_reputation_academic_survey->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('wcu/academic/academic_survey/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/academic_survey/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
        $sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('academic_survey', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$negara = $controller->model_wcu_academic_reputation_academic_survey->get_all_negara();
		$jenisKontakSurvey = $controller->model_wcu_academic_reputation_academic_survey->get_all_jenis_kontak_survey();
		
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_academic_survey->get_once($this->table, $id),
					'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur15'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('negara',$negara);
        $controller->smartyci->assign('jenisKontakSurvey',$jenisKontakSurvey);
        $controller->smartyci->display('admin/Wcu-academic_reputation/academic_survey_edit.tpl');
	}
	public function update($controller){
		$data = array(
            'ID' => $controller->input->post('id'),
            'NamaDepan' => $controller->input->post('nama_depan'),
            'NamaBelakang' => $controller->input->post('nama_belakang'),
            'Gelar' => $controller->input->post('gelar'),
            'Email' => $controller->input->post('email'),
            'Telepon' => $controller->input->post('telepon'),
            'NegaraID' => ($controller->input->post('negara')==""?NULL:$controller->input->post('negara')),
            'Universitas' => $controller->input->post('universitas'),
            'Pekerjaan' => $controller->input->post('pekerjaan'),
            'PosisiPekerjaan' => $controller->input->post('posisi_pekerjaan'),
            'SektorPekerjaan' => $controller->input->post('sektor_pekerjaan'),
            'Departemen' => $controller->input->post('departemen'),
            'Institusi' => $controller->input->post('institusi'),
            'JenisKontakSurveyID' => ($controller->input->post('jenis_kontak_survey')==""?NULL:$controller->input->post('jenis_kontak_survey')),
            'DateUpdated' => date("Y-m-d H:i:s"),
        );

		if ($controller->model_wcu_academic_reputation_academic_survey->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('wcu/academic/academic_survey/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/academic_survey/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id=null){
		if($controller->model_wcu_academic_reputation_academic_survey->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('wcu/academic/academic_survey/?n=' . $alert, 'refresh');
	}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_academic_reputation_academic_survey->get_exsport($this->table, $this->header, $this->header_column);
        $controller->excel_generate->setFileName("Academic_Survey");
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
							'tabel_nama_depan' => $controller->lang->line('label.nama_depan'),
							'tabel_nama_belakang' => $controller->lang->line('label.nama_belakang'),
							'tabel_gelar' => $controller->lang->line('label.gelar'),
							'tabel_negara' => $controller->lang->line('label.negara'),
							'tabel_universitas' => $controller->lang->line('label.universitas'),
							'tabel_pekerjaan' => $controller->lang->line('label.pekerjaan'),
							'tabel_departemen' => $controller->lang->line('label.departemen'),
							'tabel_institusi' => $controller->lang->line('label.institusi'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur15'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/academic_survey.tpl'); 
	}
	
	public function listdata_json($controller){ 
		$list = $controller->model_wcu_academic_reputation_academic_survey->get_datatables($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->ID;
            $row[] = $item->NamaDepan;
            $row[] = $item->NamaBelakang;
            $row[] = $item->Gelar;
            $row[] = $item->Negara;
            $row[] = $item->Universitas;
            $row[] = $item->Pekerjaan;
            $row[] = $item->Departemen;
            $row[] = $item->Institusi;
			
            //add html for action
		    $row[] = '<a href="' . base_url('wcu/academic/academic_survey') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    <a href="' . base_url('wcu/academic/academic_survey') . '/edit/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> '.$controller->lang->line('label.tabel.edit').'</a>
                    <a href="#delete" class="btn btn-xs btn-danger" onClick="delete_data(\'' . base_url('wcu/academic/academic_survey') . '/delete/' . $item->ID. '\')"><i class="fa fa-remove fa-fw"></i> '.$controller->lang->line('label.tabel.delete').'</a>
					';
		    $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_academic_reputation_academic_survey->count_all($this->table),
            "recordsFiltered" => $controller->model_wcu_academic_reputation_academic_survey->count_filtered($this->table, $this->column, $this->order),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
    public function sematkan($controller){

        $sess = $controller->session->userdata('logged_in');
        $data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Employee (Alumni) contact survey',
                    'label'=> 'Sematkan',
                    'last_login' => $sess['last_login'],
                    'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/academic_survey_sematkan.tpl'); 
    }
}
