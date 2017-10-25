<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laboratorium_sertifikasi_internasional {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->load->model('model_wcu_internasionalization_laboratorium_sertifikasi_internasional');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('internasionalization');
        $controller->navigation->setBreadcrumbWurInternationalization('laboratorium_sertifikasi_internasional',$change);
		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		switch($change){
			case "view": $this->view($controller);
				break;
			case "export": $this->export($controller);
				break;
			case "sematkan": $this->sematkan($controller);
				break;
			case 'lablist':$this->lablist($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller){
		$sess = $controller->session->userdata('logged_in');
		$rst = $controller->model_wcu_internasionalization_laboratorium_sertifikasi_internasional->getonce($controller->input->get('id'));
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Laboratorium Akriditasi Internasional ',
		            'lab'=> array(
		            	'RuangID'=> $rst->Nama,
		            	'NilaiAkreditasi'=> $rst->NilaiAkreditasi,
		            	'LingkupID'=> $rst->Tingkat,
		            	'TSTAkreditasi'=> $rst->TSTAkreditasi,
		            	'LembagaPengakreditasiID'=> $rst->Lembaga
		            	),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/laboratorium_sertifikasi_internasional-view.tpl');
	}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_internasionalization_laboratorium_sertifikasi_internasional->get_exsport();
     	$controller->excel_generate->setFileName("Laboratorium yang mendapatkan sertifikasi internasional".$controller->input->get('y'));
        $controller->excel_generate->generate($data);
	}
    public function sematkan($controller){

		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Laboratorium Akriditasi Internasional',
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/laboratorium_sertifikasi_internasional-sematkan.tpl'); 
    }
	public function listdata($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Laboratorium Akriditasi Internasional',
                    'base'=> $controller->input->get('base'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-internationalization/laboratorium_sertifikasi_internasional.tpl'); 

	}
	public function lablist($controller){
        $list = $controller->model_wcu_internasionalization_laboratorium_sertifikasi_internasional->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $artikel) {
            $no++;
            $row = array();
            $row[] = $artikel->Nama;
            $row[] = $artikel->NilaiAkreditasi;
            $row[] = $artikel->TSTAkreditasi;
            $row[] = $artikel->Lembaga;
            $row[] = '<a href="'.base_url().'wcu/internationalization/laboratorium_sertifikasi_internasional/view/?id='.$artikel->IDLab.'" class="btn btn-xs">
            				<i class="fa fa-file fa-fw"></i> View
            		  </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_internasionalization_laboratorium_sertifikasi_internasional->count_all(),
            "recordsFiltered" => $controller->model_wcu_internasionalization_laboratorium_sertifikasi_internasional->count_filtered(),
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
	}
}
