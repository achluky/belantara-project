<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paten_hki {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('research_publication');
        $controller->navigation->setBreadcrumbWurReserachPublication('paten_hki', $change);

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
			case "setting": $this->setting($controller);
				break;
			case "sematkan": $this->sematkan($controller, $change);
				break;
			case "listdata": $this->listdata($controller);
				break;
			case "hkiList": $this->hkiList($controller);
				break;
			default: $this->year($controller);
		}
	}
	
	public function view($controller){
		$sess 	=  $controller->session->userdata('logged_in');
		$rst 	=  $controller->model_wcu_reserach_publication_paten_hki->getOnes($controller->input->get('id'));

        $controller->navigation->setBreadcrumbWurReserachPublication('paten_hki', 'Detail Paten dan HKI');
        $controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());

		$year 	=  explode("-", $rst->TanggalPendaftaran);
		$data 	=  array(
                            'url'=> current_url(),
                            'alert' => $controller->input->get('n'),
                            'title'=> 'Paten dan HKI <small> Content management</small>',
                            'departemen'=> $controller->input->get('d'),
                            'patenhaki'=> array(
                            	'NomorPermohonan'=> $rst->NomorPermohonan,
                            	'TanggalPenerimaan'=> convert_date($rst->TanggalPenerimaan),
                            	'NomorPengumuman'=> $rst->NomorPengumuman,
                            	'TanggalPengumuman'=> convert_date($rst->TanggalPengumuman),
                            	'NomorPaten'=> $rst->NomorPaten,
                            	'TanggalPendaftaran'=> convert_date($rst->TanggalPendaftaran),
                            	'TanggalKepemilikan'=> convert_date($rst->TanggalKepemilikan),
                            	'TanggalKadaluarsa'=> convert_date($rst->TanggalKadaluarsa),
                            	'Judul'=> $rst->Judul,
                            	'Abstrak'=> $rst->Abstrak,
                            	'JumlahKlaim'=> $rst->JumlahKlaim,
                            	'Pemilik'=>getPemilikPaten($rst->ID),
                            	'Penemu'=>getPenemuPaten($rst->ID)
                            	),
                            'year'=>$year[0],
                            'last_login' => $sess['last_login'],
                			'session' => $sess['username']
                    );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-paten-hki/wcu-reserach-publication-paten_hki.tpl'); 
	}
	public function add($controller){}
	public function edit($controller){}
	public function delete($controller){}
	public function save($controller){}
	public function update($controller){}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_reserach_publication_paten_hki->get_exsport($controller->input->get('year'));
        $controller->excel_generate->setFileName("PatenHKI".$controller->input->get('y'));
        $controller->excel_generate->generate($data);
	}
    public function setting($controller){}
    public function year($controller){
    	$sess = $controller->session->userdata('logged_in');
		$data = array(
            'url'=> current_url(),
            'alert' => $controller->input->get('n'),
            'title'=> 'Paten dan HKI <small> Content management</small>',
            'label' => array(
                'hkitahun' => $controller->lang->line('label.hkitahun')
            ),
            'year'=> $controller->model_wcu_reserach_publication_paten_hki->getList(),
            'last_login' => $sess['last_login'],
			'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-paten-hki/wcu-reserach-publication-paten_hki-year.tpl'); 
    }
    public function sematkan($controller){
        $sess = $controller->session->userdata('logged_in');
        $data = array(
            'url'=> current_url(),
            'alert' => $controller->input->get('n'),
            'title'=> 'Paten dan HKI <small> Content management</small>',
            'year'=> $controller->input->get('y'),
            'label'=> "Sematkan Paten dan HKI tahun ".$controller->input->get('d'),
            'last_login' => $sess['last_login'],
            'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-paten-hki/wcu-reserach-publication-paten_hki-sematkan.tpl');
    }
	public function listdata($controller){
		$sess = $controller->session->userdata('logged_in');
        $controller->navigation->setBreadcrumbWurReserachPublication('paten_hki', $controller->input->get('y'));
        $controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
            'url'=> current_url(),
            'alert' => $controller->input->get('n'),
            'title'=> 'Paten dan HKI <small> Content management</small>',
            'year'=> $controller->input->get('y'),
            'label' => array(
                'tabel_nim' => $controller->lang->line('label.tabel.nim'),
                'tabel_nama_std' => $controller->lang->line('label.tabel.nama_std'),
                'tabel_stata' => $controller->lang->line('label.tabel.strata'),
                'tabel_action'=>$controller->lang->line('label.tabel.action'),
                'tabel_edit' => $controller->lang->line('label.tabel.edit'),
                'tabel_delete' => $controller->lang->line('label.tabel.delete'),
                'table_action' => $controller->lang->line('label.tabel.action')
            ),
            'departemen'=> $controller->input->get('d'),
            'last_login' => $sess['last_login'],
			'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-paten-hki/wcu-reserach-publication-paten_hki-list.tpl'); 
	}
	public function hkiList($controller){
		$year = $controller->input->get('y');
        $list = $controller->model_wcu_reserach_publication_paten_hki->get_datatables_listHki($year);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $hki) {
            $no++;
            $row = array();
            $row[] = $hki->Judul;
            $row[] = $hki->NomorPermohonan;
            $row[] = convert_date($hki->TanggalPendaftaran);
            $row[] = '<a href="'.base_url().'wcu/reserach_publication/paten_hki/view/?id='.$hki->ID.'" class="btn btn-xs">
            				<i class="fa fa-file fa-fw"></i> View Detail
            		  </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_reserach_publication_paten_hki->count_allStudent($year),
            "recordsFiltered" => $controller->model_wcu_reserach_publication_paten_hki->count_filteredStudent($year),
            "data" => $data
        );
        echo json_encode($output);
	}
}
