<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pusat_unggulan_riset {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('research_publication');
        $controller->navigation->setBreadcrumbWurReserachPublication('pusat_unggulan_riset', $change);
		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		switch($change){
			case "view": $this->view($controller,$id);
				break;
			case "add": $this->add($controller);
				break;
			case "edit": $this->edit($controller,$id);
				break;
			case "delete": $this->delete($controller,$id);
				break;
			case "save": $this->save($controller);
				break;
			case "update": $this->update($controller);
				break;
			case "export": $this->export($controller);
				break;
			case "setting": $this->setting($controller);
				break;
			case 'listdata-json': $this->listdata_json($controller);
				break;
			case 'sematkan':$this->sematkan($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	public function view($controller, $id=null){
        $sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_reserach_publication_pusat_unggulan_riset->get_once($id),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur15'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-unggulan-riset/pusat_unggulan_riset-view.tpl'); 
	}
	public function add($controller){
        $sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.reserach_publication.wur23')."",
                    'pusat'=> $controller->model_wcu_reserach_publication_pusat_unggulan_riset->get_Pusat(),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-unggulan-riset/pusat_unggulan_riset-add.tpl'); 
	}
	public function save($controller){
		$data = array(
            'StrukturOrganisasiID' => $controller->input->post('Nama_pusat'),
            'Nama' => $controller->input->post('Produk_Unggulan'),
            'Kode' => $controller->input->post('Kode'),
            'Kontak' => $controller->input->post('Kontak')
		);

		$id = $controller->model_wcu_reserach_publication_pusat_unggulan_riset->save($data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('wcu/reserach_publication/pusat_unggulan_riset/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/reserach_publication/pusat_unggulan_riset/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
        $sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_reserach_publication_pusat_unggulan_riset->get_once($id),
                    'pusat'=> $controller->model_wcu_reserach_publication_pusat_unggulan_riset->get_Pusat(),
					'title'=> $controller->lang->line('navigation.navbar.wcu.reserach_publication.wur23')."",
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-unggulan-riset/pusat_unggulan_riset-edit.tpl'); 
	}
	public function update($controller){
		$id = $controller->input->post('id');
		$data = array(
            'StrukturOrganisasiID' => $controller->input->post('Nama_pusat'),
            'Nama' => $controller->input->post('Produk_Unggulan'),
            'Kode' => $controller->input->post('Kode'),
            'Kontak' => $controller->input->post('Kontak')

        );
		if ($controller->model_wcu_reserach_publication_pusat_unggulan_riset->update($data,$id)) {
            $alert = url_title("success");
			redirect('wcu/reserach_publication/pusat_unggulan_riset/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/reserach_publication/pusat_unggulan_riset/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id=null){
		if($controller->model_wcu_reserach_publication_pusat_unggulan_riset->delete($id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('wcu/reserach_publication/pusat_unggulan_riset/?n=' . $alert, 'refresh');
	}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_reserach_publication_pusat_unggulan_riset->get_exsport();
        $controller->excel_generate->setFileName("PusatUnggulanRiset");
        $controller->excel_generate->setSheetName("Data");
        $controller->excel_generate->generate($data);
	}
	public function sematkan($controller){
        $sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
					'title'=> $controller->lang->line('navigation.navbar.wcu.reserach_publication.wur23')."",
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-unggulan-riset/pusat_unggulan_riset-sematkan.tpl'); 
	}
	public function listdata($controller){ 
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_list'=> null,
					'label' => array(
							'tabel_id' => $controller->lang->line('label.tabel.id'),
							'tabel_nama_pusat' => $controller->lang->line('label.nama_pusat'),
							'tabel_produk' => $controller->lang->line('label.produk'),
                            'tabel_kode' => "Kode",
							'tabel_kontak' => $controller->lang->line('label.kontak'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.reserach_publication.wur23')."",
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-unggulan-riset/pusat_unggulan_riset.tpl'); 
	}
	
	public function listdata_json($controller){ 
		$list = $controller->model_wcu_reserach_publication_pusat_unggulan_riset->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->ID;
            $row[] = $item->NamaPusat;
            $row[] = $item->Nama;
            $row[] = $item->Kode;
            $row[] = $item->Kontak;
			//add html for action
            $row[] = '<a href="' . base_url('wcu/reserach_publication/pusat_unggulan_riset') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
            	<a href="' . base_url('wcu/reserach_publication/pusat_unggulan_riset') . '/edit/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> '.$controller->lang->line('label.tabel.edit').'</a>
                    ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_reserach_publication_pusat_unggulan_riset->count_all(),
            "recordsFiltered" => $controller->model_wcu_reserach_publication_pusat_unggulan_riset->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}
}
