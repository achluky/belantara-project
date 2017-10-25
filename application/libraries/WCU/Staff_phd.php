<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_phd {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_data_university_phd');
        $controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('data_university');
        $controller->navigation->setBreadcrumbWurDataUniversity('staff_phd',$change);
		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());

		switch($change){
			case "view": $this->view($controller);
				break;
			case "export": $this->export($controller);
				break;
			case 'export_option' : $this->export_option($controller,$change);
				break;
			case 'sematkan' : $this->sematkan($controller,$change);
				break;
			default: $this->category($controller);
		}
	}
	
	public function view($controller){
		$nip 	= $controller->input->get("nip");
		$data 	= $controller->model_wcu_data_university_phd->get_once($nip);
		$row 	= $data->row();
		$arr = array(
				'nip' => $nip, 
				'Nama'=> $row->Nama,
				'Departemen'=>$row->Homebase,
				'Kepakaran'=>$row->Kepakaran,
				'Status'=>$row->Status,
				);
		echo json_encode($arr);
	}
	public function export($controller){ 
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_data_university_phd->get_exsport($controller->input->get('exp'));
        $controller->excel_generate->setFileName("Phd_"+$controller->input->get('exp'));
        $controller->excel_generate->setSheetName("Phd_"+$controller->input->get('exp'));
        $controller->excel_generate->generate($data);
	}
	

	public function export_option($controller){
	$sess = $controller->session->userdata('logged_in') ;	
		if ($controller->input->get('zsafas') != "" and $controller->input->get('dsfsdf') != "") {
			$controller->load->library('excel_generate');
	        $data = $controller->model_wcu_data_university_phd->get_exsport_option($controller->input->get('zsafas'),$controller->input->get('dsfsdf'), $controller->input->get('dfgg'));
	        $controller->excel_generate->setFileName(date("Y-m-d")."_".$controller->input->get('zsafas')."_".$controller->input->get('dsfsdf'));
	        $controller->excel_generate->setSheetName(date("Y-m-d")."_".$controller->input->get('zsafas')."_".$controller->input->get('dsfsdf'));
	        $controller->excel_generate->generate($data);		
		} else {
			$data = array(
	                    'url'=> current_url(),
	                    'alert' => $controller->input->get('n'),
	                    'status_pegawai'=>getStatus_pegawai(),
	                    'status_kepegawaian'=>getStatus_kepegawaian(),
	                    'list_Homebase' => $controller->model_wcu_data_university_phd->get_departemen(),
	                    'title'=> 'Dosen  Phd',
	                    'title_sub'=> "Export",
                    	'departemen'=> $controller->lang->line('label.departemen'),
	                    'kepegawaian'=> $controller->lang->line('label.title_dosen_kepakaran_status'),
	                    'pegawai'=> $controller->lang->line('label.title_dosen_kepakaran_statusKepegawaian'),
	                    'last_login' => $sess['last_login'],
						'session' => $sess['username']
	                );
	        $controller->smartyci->assign('data',$data);
	        $controller->smartyci->display('admin/Wcu-data-university/wcu-data-university-staff-phd-export.tpl'); 
    	}
	}
	
	public function sematkan($controller, $change){
	$sess = $controller->session->userdata('logged_in') ;	
		if ($controller->input->get('xen')==1 and $controller->input->get('xen')!=null) {
			$structur = $controller->input->post('structur');
			$status_pegawai = $controller->input->post('status_pegawai');
			$status_kepegawaian = $controller->input->post('status_kepegawaian');
			$iframe = '<iframe width="100%" height="100%" src="'.base_url().'view/staff_phd/?str='.$structur.'&pegawai='.$status_pegawai.'&kepegawaian='.$status_kepegawaian.'" frameborder="0" allowfullscreen></iframe>';

			$data = array(
	                    'url'=> current_url(),
	                    'alert' => $controller->input->get('n'),
	                    'status_pegawai'=>getStatus_pegawai(),
	                    'status_kepegawaian'=>getStatus_kepegawaian(),
	                    'list_Homebase' => $controller->model_wcu_data_university_phd->get_departemen(),
	                    'title'=> 'Dosen  Phd',
	                    'iframe'=>$iframe,
	                    'last_login' => $sess['last_login'],
						'session' => $sess['username']
	                );

	        $controller->smartyci->assign('structur',$structur);
	        $controller->smartyci->assign('status_pegawai',$status_pegawai);
	        $controller->smartyci->assign('status_kepegawaian',$status_kepegawaian);

		} else {
			$data = array(
	                    'url'=> current_url(),
	                    'alert' => $controller->input->get('n'),
	                    'status_pegawai'=>getStatus_pegawai(),
	                    'status_kepegawaian'=>getStatus_kepegawaian(),
	                    'list_Homebase' => $controller->model_wcu_data_university_phd->get_departemen(),
	                    'title'=> 'Dosen  Phd',
	                    'iframe'=>null,
	                    'last_login' => $sess['last_login'],
						'session' => $sess['username']
	                );

	        $controller->smartyci->assign('structur','');
	        $controller->smartyci->assign('status_pegawai','');
	        $controller->smartyci->assign('status_kepegawaian','');
    	}

        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-data-university/wcu-data-university-staff-phd-sematkan.tpl'); 

	}
	 public function category($controller){

    	if ($controller->input->get('asx') != '') {

    		$list = $controller->model_wcu_data_university_phd->get_list_dosen($controller->input->get("asx"));
    		$data = array();
	        $no = $controller->input->post('start');
	        foreach ($list -> result() as $dat) {
	        	$no++;
	            $row = array();
	            $row[] = $dat->NIP;
	            $row[] = $dat->GelarDepan.' '.$dat->Nama.' '.$dat->GelarBelakang;
	            $row[] = $dat->name;
				$row[] = '<a href="javascript:void()" class="btn btn-xs '.$dat->NIP.'" onclick="viewDosen(this)">
            				<i class="fa fa-file fa-fw"></i> Detail
            		  </a>';
				$data[] = $row;
	        }

	        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsTotal" => $no,
	            "recordsFiltered" => $no,
	            "data" => $data,
	        );
	        echo json_encode($output);
    	} else {

			$sess = $controller->session->userdata('logged_in') ;	
			$controller->navigation->setBreadcrumbWurDataUniversity('staff_phd', $controller->lang->line('navigation.navbar.wcu.data_university.wur2'));
			$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	    	$data = array(
	                    'url'=> current_url(),
	                    'alert' => $controller->input->get('n'),
	                    'title'=> 'Dosen Phd',
	                    'list_Homebase' => $controller->model_wcu_data_university_phd->get_departemen(),
	                    'title_sub'=>$controller->lang->line('label.title_phd_kepakaran'),
		                'select'=>"Departemen",
		                'nip'=>$controller->lang->line('label.title_dosen_kepakaran_nip'),
		                'nama'=>$controller->lang->line('label.title_dosen_kepakaran_nama'),
		                'status'=>"Status",
		                'sematkan'=>$controller->lang->line('label.title_dosen_kepakaran_sematkan'),
		                'export'=>$controller->lang->line('label.title_dosen_kepakaran_exsport'),
		                'export_lanjut'=>$controller->lang->line('label.title_dosen_kepakaran_exsport_lanjut'),
	                    'last_login' => $sess['last_login'],
						'session' => $sess['username']
	        );
	        $controller->smartyci->assign('data',$data);
	        $controller->smartyci->display('admin/Wcu-data-university/wcu-data-university-staff-phd-category.tpl'); 	

    	}
    }
}