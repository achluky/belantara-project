<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kerjasama {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('research_publication');
        $controller->navigation->setBreadcrumbWurReserachPublication('kerjasama', $change);

		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	
		switch($change){
			case "view": $this->view($controller);
				break;
			case "add": $this->add($controller);
				break;
			case "edit": $this->edit($controller);
				break;
			case "delete": $this->delete($controller);
				break;
			case "save": $this->save($controller);
				break;
			case "update": $this->update($controller);
				break;
			case "export": $this->export($controller);
				break;
			case "sematkan": $this->sematkan($controller);
				break;
			case "departement": $this->departement($controller, $change);
				break;
			case 'export': $this->export($controller, $change);
				break;
			case "viewList": $this->viewList($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Kerjasama <small> Content management</small>',
                    'title_lembaga'=> getStructur($controller->input->get('d')),
                    'lembaga'=> $controller->input->get('d'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-kerjasama/wcu-reserach-publication-kerjasama-list.tpl'); 
	}
	public function viewList($controller){
		$list = $controller->model_wcu_reserach_publication_kerjasama->get_datatables_listKerjasama($controller->input->get("d"));
    		$data = array();
	        $no = $controller->input->post('start');
        	foreach ($list as $dat) {
	        	$no++;
	            $row = array();
	            $row[] = $dat->NamaKerjasama;
	            $row[] = $dat->BidangKerjasama;
				$row[] = '<a href="'.base_url().'wcu/reserach_publication/kerjasama/departement/?id='.$dat->ID.'" class="btn btn-xs">
	            				<i class="fa fa-file fa-fw"></i> View
	            		  </a>';
	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsTotal" => $controller->model_wcu_reserach_publication_kerjasama->get_count_allKerjasama($controller->input->get("d")),
	            "recordsFiltered" => $controller->model_wcu_reserach_publication_kerjasama->get_count_filteredKerjasama($controller->input->get("d")),
	            "data" => $data,
	        );
	        echo json_encode($output);
	}	

	public function departement($controller){
		$sess = $controller->session->userdata('logged_in');
		$kerjasama = $controller->model_wcu_reserach_publication_kerjasama->getViewOne($controller->input->get('id'));
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Kerjasama <small> Content management</small>',
                    'kerjasama'=> array(
                    	'NamaKerjasama'=>$kerjasama->NamaKerjasama,
                    	'Stakeholder'=>getStructur($kerjasama->Stakeholder),
                    	'StakeholderID'=>$kerjasama->Stakeholder,
                    	'BidangKerjasama'=>$kerjasama->BidangKerjasama,
                    	'LingkupID'=>getLingkup($kerjasama->LingkupID),
                    	'Tahun'=>$kerjasama->Tahun,
                    	'TanggalMulai'=>convert_date($kerjasama->TanggalMulai),
                    	'TanggalSelesai'=>convert_date($kerjasama->TanggalSelesai),
                    	),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-kerjasama/wcu-reserach-publication-kerjasama-view.tpl'); 
	}
	public function add($controller){}
	public function edit($controller){}
	public function delete($controller){}
	public function save($controller){}
	public function update($controller){}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_reserach_publication_kerjasama->get_exsport_kerjasama($controller->input->get('d'));
        $controller->excel_generate->setFileName("Kerjasama".date("Y-m-d")."".$controller->input->get('d'));
        $controller->excel_generate->setSheetName("data");
        $controller->excel_generate->generate($data);
	}
    public function sematkan($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Kerjasama <small> Content management</small>',
                    'title_lembaga'=> getStructur($controller->input->get('d')),
                    'lembaga'=> $controller->input->get('d'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-kerjasama/wcu-reserach-publication-kerjasama-sematkan.tpl'); 
    }
	public function listdata($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurReserachPublication('kerjasama');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'lembaga'=> $controller->model_wcu_reserach_publication_kerjasama->getStakeholder(),
                    'title'=> 'Kerjasama <small> Content management</small>',
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-kerjasama/wcu-reserach-publication-kerjasama.tpl'); 
	}
}
