<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penghargaan_dosen_internasional {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		
		$controller->load->model('model_wcu_internasionalization_penghargaan_dosen_internasional');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('internasionalization');
        $controller->navigation->setBreadcrumbWurInternationalization('penghargaan_dosen_internasional',$change);

		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	
		switch($change){
			case "view": $this->view($controller);
				break;
			case "export": $this->export($controller);
				break;
			case "sematkan": $this->sematkan($controller);
				break;
			case 'penghargaanlist':$this->penghargaanlist($controller);
				break;
			case "list": $this->listdata($controller);
				break;
			default: $this->departement($controller);
		}
	}
	
	
	public function view($controller){
		$sess = $controller->session->userdata('logged_in');
		$rst = $controller->model_wcu_internasionalization_penghargaan_dosen_internasional->getOnes($controller->input->get('id'));
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Penghargaan Dosen Internasional',
		            'penghargaan'=> array(
		            	'Nip'=> $rst->NIPdosen,
		            	'Nama'=> $rst->Nama,
		            	'LingkupID'=> getLingkup($rst->LingkupID),
		            	'Tanggal Perolehan'=> $rst->TanggalPerolehan,
		            	'Nomor'=> $rst->Nomor,
		            	'Negara'=> $rst->Negara,
		            	'Instansi'=> $rst->Instansi,
		            	'JabatanPemberi'=> $rst->JabatanPemberi,
		            	'TanggalPerolehan'=>$rst->TanggalPerolehan,
		            	'StrukturID'=>$rst->StrukturOrganisasiID,
		            	'Departement'=>$rst->Homebase,
		            	'DepartementID'=>$rst->DepartemenID
		            	),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/penghargaan_dosen_internasional-view.tpl');
	}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_internasionalization_penghargaan_dosen_internasional->get_exsport(
        		$controller->input->get('base')
        		);
     	$controller->excel_generate->setFileName("Penghargaan Dosen Internasional ".$controller->input->get('y'));
        $controller->excel_generate->generate($data);
	}
    public function sematkan($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurInternationalization('penghargaan_dosen_internasional', 'Sematkan');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Penghargaan Dosen Internasional',
                    'departement'=> $controller->input->get('base'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/penghargaan_dosen_internasional-sematkan.tpl'); 
    }
    public function departement($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Penghargaan Dosen Internasional',
                    'departement'=> $controller->model_wcu_internasionalization_penghargaan_dosen_internasional->getListDepartement(),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/penghargaan_dosen_internasional-category.tpl'); 
    }
	public function listdata($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Penghargaan Dosen Internasional',
                    'base'=> $controller->input->get('base'),
                    'base_title'=> getDepartementStructur($controller->input->get('base')),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/penghargaan_dosen_internasional.tpl'); 

	}
	public function penghargaanlist($controller){
		$base = $controller->input->get('base');
        $list = $controller->model_wcu_internasionalization_penghargaan_dosen_internasional->get_datatables_listpenghargaan($base);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->NIPdosen;
            $row[] = $item->Nama;
            $row[] = $item->Departemen;
            $row[] = $item->Negara;
            $row[] = $item->Instansi;
            $row[] = '<a href="'.base_url().'wcu/internationalization/penghargaan_dosen_internasional/view/?id='.$item->ID.'" class="btn btn-xs">
            				<i class="fa fa-file fa-fw"></i> Detail
            		  </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_internasionalization_penghargaan_dosen_internasional->count_allPenghargaan($base),
            "recordsFiltered" => $controller->model_wcu_internasionalization_penghargaan_dosen_internasional->count_filteredPenghargaan($base),
            "data" => $data
        );
        echo json_encode($output);
	}
}
