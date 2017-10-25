<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Undergraduate_student {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_data_university_undergraduate_student');
        $controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('data_university');
        $controller->navigation->setBreadcrumbWurDataUniversity('undergraduate_student', $change);

		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	
		switch($change){
			case "view": $this->view($controller);
				break;
			case "export": $this->export($controller);
				break;
			case "setting": $this->setting($controller);
				break;
			case "departement": $this->departemen($controller, $change);
				break;
			case "studentlist": $this->studentlist($controller);
				break;
			case "sematkan": $this->sematkan($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller){
		$nim 	= $controller->input->get("nim");
		$data 	= $controller->model_wcu_data_university_undergraduate_student->getStudenOne($nim);
		$row 	= $data->row();
		$arr = array(
				'nim' => $nim, 
				'Nama'=> $row->Nama,
				'TempatLahir'=>$row->TempatLahir,
				'TanggalLahir'=>convert_date($row->TanggalLahir),
				'JenisKelaminID'=>getJenisKelaminID($row->JenisKelaminID),
				'StrataID'=>getStrataID($row->StrataID),
				'Fakultas'=>$row->Fakultas,
				'Departemen'=>$row->Departemen,
				'Mayor'=>$row->Mayor,
				'TahunMasuk'=>$row->TahunMasuk,
				'BatasStudi'=>$row->BatasStudi,
				);
		echo json_encode($arr);
	}
	public function export($controller){ 
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_data_university_undergraduate_student->get_exsport_undergraduate_mahasiswa($controller->input->get('d'));
     	$controller->excel_generate->setFileName("UnderGraduateDepartementID".$controller->input->get('d'));
        $controller->excel_generate->generate($data);
	}

	public function listdata($controller){ 
		$sess = $controller->session->userdata('logged_in');
		 $data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Undergraduate Student <small> List Program Studi</small>',
                    'data_departement' => $controller->model_wcu_data_university_undergraduate_student->getListDepartement(),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-data-university/wcu-data-university-undergraduate_student.tpl'); 
	}

	public function departemen($controller){
		$d=explode("-", $controller->input->get('d'));
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Undergraduate Student <small> List Mahasiswa</small>',
                    'label' => array(
		                'tabel_nim' => $controller->lang->line('label.tabel.nim'),
		                'tabel_nama_std' => $controller->lang->line('label.tabel.nama_std'),
		                'tabel_stata' => $controller->lang->line('label.tabel.strata'),
		                'tabel_action'=>$controller->lang->line('label.tabel.action')
		            ),
		            'departemen_title'=> $controller->model_wcu_data_university_undergraduate_student->getMayor($controller->input->get('d')),
		            'departemen'=> $d[1],
		            'strata'=> $d[0],
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-data-university/wcu-data-university-undergraduate_student-list.tpl'); 
	}

	public function studentlist($controller){

		$departemen = str_replace("+", "%20", $controller->input->get('d'));
		// die($departemen);
        $list = $controller->model_wcu_data_university_undergraduate_student->get_datatables_listStudent($departemen);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $student) {
            $no++;
            $row = array();
            $row[] = $student->NIM;
            $row[] = $student->Nama;
            // $row[] = $student->StrataID;
            //add html for action
            $row[] = '<a href="javascript:void()" class="btn btn-xs '.$student->NIM.'" onclick="viewStucent(this)">
            				<i class="fa fa-file fa-fw"></i> Detail
            		  </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_data_university_undergraduate_student->count_allStudent($departemen),
            "recordsFiltered" => $controller->model_wcu_data_university_undergraduate_student->count_filteredStudent($departemen),
            "data" => $data
        );
        //output to json format
        echo json_encode($output);

	}

	public function sematkan($controller){	

		$sess = $controller->session->userdata('logged_in');
    	$controller->smartyci->assign('structur',$controller->input->get('d'));
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Undergraduate Student <small> Sematkan</small>',
                    'iframe'=>null,
                    'departemen'=>$controller->input->get('d'),
                    'label'=> $controller->lang->line('label.tabel.sematkan'),
                    'last_login' => $sess ['last_login'],
					'session' => $sess ['username']
                );
        $controller->smartyci->assign('data',$data);
	    $controller->smartyci->display('admin/Wcu-data-university/wcu-data-university-undergraduate_student-sematkan.tpl'); 
	}
}
