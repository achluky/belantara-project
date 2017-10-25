<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inovasi {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('research_publication');
        $controller->navigation->setBreadcrumbWurReserachPublication('inovasi', $change);

		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	
		switch($change){
			case "tingkat": $this->view($controller);
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
			case "sematkan": $this->setting($controller);
				break;
			case 'viewList': $this->viewList($controller);
				break;
			case 'view': $this->viewOne($controller);
				break;
			case 'category': $this->category($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller){
		$sess = $controller->session->userdata('logged_in');

		$controller->navigation->setBreadcrumbWurReserachPublication('inovasi', 'List Inovasi '.getLingkup($controller->input->get('id')));
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());

		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Inovasi',
                    'label'=> array(
                    		'tabel_Judul'=> $controller->lang->line('label.tabel.judul_inovasi'),
                    		'tabel_tingkat'=> $controller->lang->line('label.lingkup'),
                    		'tabel_taggalTerdaftar'=> $controller->lang->line('label.tabel.taggalTerdaftar'),
                    		'tabel_action'=> $controller->lang->line('label.tabel.action'),
                    		'sematkan'=>$controller->lang->line('label.tabel.sematkan')
                    	),
                    'title_tingkat' => getLingkup($controller->input->get('id')),
                    'id'=> $controller->input->get('id'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-inovasi/wcu-data-university-inovasi-list.tpl'); 
	}

	public function viewList($controller){
    		$list = $controller->model_wcu_data_university_inovasi->get_datatables_listInovasi($controller->input->get("id"));
    		$data = array();
	        $no = $controller->input->post('start');
        	foreach ($list as $dat) {
	        	$no++;
	            $row = array();
	            $row[] = $dat->Judul;
	            $row[] = $dat->Tingkat;
	            $row[] = convert_date_format("d-m-Y",$dat->TerdaftarTanggal);
				$row[] = '<a href="'.base_url().'wcu/reserach_publication/inovasi/view/?id='.$dat->ID.'" class="btn btn-xs">
	            				<i class="fa fa-file fa-fw"></i> View Detail
	            		  </a>';
	            $data[] = $row;
	        }
	        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsTotal" => $controller->model_wcu_data_university_inovasi->get_count_allInovasi($controller->input->get("id")),
	            "recordsFiltered" => $controller->model_wcu_data_university_inovasi->get_count_filteredInovasi($controller->input->get("id")),
	            "data" => $data,
	        );
	        echo json_encode($output);
	}
	public function viewOne($controller){
		$sess = $controller->session->userdata('logged_in');
		$nim 	= $controller->input->get("id");
		$row 	= $controller->model_wcu_data_university_inovasi->getInovasiOne($nim);
		$controller->navigation->setBreadcrumbWurReserachPublication('inovasi', 'Detail Inovasi');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'linkup'=> $controller->model_wcu_data_university_inovasi->getLinkup(),
                    'title'=> 'Inovasi <small> Yang di hasilkan </small>',
                    'inovasi' => array( 
							'Judul'=> $row->Judul,
							'DeskripsiIndonesia'=>$row->DeskripsiIndonesia,
							'DeskripsiInggris'=>$row->DeskripsiInggris,
							'Persfektif'=>$row->Persfektif,
							'KeunggulanInovasi'=>$row->KeunggulanInovasi,
							'PotensiAplikasi'=>$row->PotensiAplikasi,
							'TerdaftarTanggal'=>convert_date_format("d-m-Y",$row->TerdaftarTanggal),
							'SudahDikomersilkan'=>($row->SudahDikomersilkan)?"Sudah":"Belum",
							'isAdopsi'=>($row->isAdopsi==1)?"Sudah":"Belum",
							'LingkupID'=>$row->LingkupID,
							'Inovator'=> getInovator($nim)
							),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-inovasi/wcu-data-university-inovasi-detail.tpl');

	}
	public function add($controller){}
	public function edit($controller){}
	public function delete($controller){}
	public function save($controller){}
	public function update($controller){}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_data_university_inovasi->get_exsport_inovasi($controller->input->get('id'));
        $controller->excel_generate->setFileName("Inovasi".getLingkup($controller->input->get('id')));
        $controller->excel_generate->generate($data);
	}
    public function setting($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Inovasi <small> Yang di Hasilkan</small>',
                    'label'=> 'Sematkan',
                    'title_lingkup'=>getLingkup($controller->input->get('id')),
                    'lingkup'=>$controller->input->get('id'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-inovasi/wcu-data-university-inovasi-sematkan.tpl'); 
    }
	public function listdata($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'linkup'=> $controller->model_wcu_data_university_inovasi->getLinkup(),
                    'title'=> 'Inovasi <small> Yang di Hasilkan</small>',
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-inovasi/wcu-data-university-inovasi.tpl'); 
	}
}
