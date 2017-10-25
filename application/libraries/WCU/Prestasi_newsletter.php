<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prestasi_newsletter {
	
	private $table = 'trxPrestasiIPB';
	private $header = array('No.','Nama Prestasi','Nama Penyelenggara','Newsletter','Mitra Pempublikasi','Website','Tingkat','Tahun');
	private $header_column = array('AUTONUMBER','NamaPrestasi','NamaPenyelenggara','Newsletter','NamaMitraPempublikasi','SitusWeb','Tingkat','Tahun');
	
	private $column = array('ID','NamaPrestasi','NamaPenyelenggara','Newsletter','NamaMitraPempublikasi','SitusWeb','Tingkat','Tahun');
	private $order = array('ID' => 'asc');
		
    public function __construct() { }
    
	public function run($controller, $change, $id) { 
		$controller->load->model('model_wcu_academic_reputation_prestasi_newsletter');
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('academic_reputation');
		$controller->navigation->setBreadcrumbWurAcademicReputation('prestasi_newsletter');

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
			case 'sematkan': $this->sematkan($controller);
				break;
			case "export": $this->export($controller);
				break;
			case "listdata-json": $this->listdata_json($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('prestasi_newsletter', 'view');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_prestasi_newsletter->get_once_with_relation($this->table, $id),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur11'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/prestasi_newsletter_view.tpl'); 
	}
	public function add($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('prestasi_newsletter', 'add');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$tingkat = $controller->model_wcu_academic_reputation_prestasi_newsletter->get_all_tingkat();
		
		$data = array(
                    'url'=> current_url(),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur11'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('tingkat',$tingkat);
        $controller->smartyci->display('admin/Wcu-academic_reputation/prestasi_newsletter_add.tpl'); 
	}
	public function save($controller){
		$data = array(
            'NamaPrestasi' => $controller->input->post('nama_prestasi'),
            'NamaPenyelenggara' => $controller->input->post('nama_penyelenggara'),
            'Newsletter' => $controller->input->post('newsletter'),
            'NamaMitraPempublikasi' => $controller->input->post('nama_mitra_pempublikasi'),
            'SitusWeb' => $controller->input->post('situs_web'),
            'LingkupID' => ($controller->input->post('tingkat')==""?NULL:$controller->input->post('tingkat')),
            'Tahun' => $controller->input->post('tahun'),
            'DateCreated' => date("Y-m-d H:i:s"),
            'DateUpdated' => date("Y-m-d H:i:s"),
        );
		$id = $controller->model_wcu_academic_reputation_prestasi_newsletter->save($this->table, $data);
		if ($id!=null) {
            $alert = url_title("success");
			redirect('wcu/academic/prestasi_newsletter/edit/' . $id. '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/prestasi_newsletter/add?n=' . $alert, 'refresh');
        }
	}
	public function edit($controller, $id=null){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('prestasi_newsletter', 'edit');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$tingkat = $controller->model_wcu_academic_reputation_prestasi_newsletter->get_all_tingkat();
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'data_view'=>  $controller->model_wcu_academic_reputation_prestasi_newsletter->get_once($this->table, $id),
					'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur11'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->assign('tingkat',$tingkat);
        $controller->smartyci->display('admin/Wcu-academic_reputation/prestasi_newsletter_edit.tpl'); 
	}
	public function update($controller){
		$data = array(
            'ID' => $controller->input->post('id'),
            'NamaPrestasi' => $controller->input->post('nama_prestasi'),
            'NamaPenyelenggara' => $controller->input->post('nama_penyelenggara'),
            'Newsletter' => $controller->input->post('newsletter'),
            'NamaMitraPempublikasi' => $controller->input->post('nama_mitra_pempublikasi'),
            'SitusWeb' => $controller->input->post('situs_web'),
            'LingkupID' => ($controller->input->post('tingkat')==""?NULL:$controller->input->post('tingkat')),
            'Tahun' => $controller->input->post('tahun'),
            'DateUpdated' => date("Y-m-d H:i:s"),
        );

		if ($controller->model_wcu_academic_reputation_prestasi_newsletter->update($this->table, $data)) {
            $alert = url_title("success");
			redirect('wcu/academic/prestasi_newsletter/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("failed");
			redirect('wcu/academic/prestasi_newsletter/edit/' . $controller->input->post('id'). '?n=' . $alert, 'refresh');
        }
	}
	public function delete($controller, $id){
		if($controller->model_wcu_academic_reputation_prestasi_newsletter->delete($this->table, $id)) {
            $alert = url_title("success");
        } else {
            $alert = url_title("failed");
        }
		redirect('wcu/academic/prestasi_newsletter/?n=' . $alert, 'refresh');
	}
	public function export($controller){ 
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_academic_reputation_prestasi_newsletter->get_exsport($this->table, $this->header, $this->header_column);
        $controller->excel_generate->setFileName("Prestasi_IPB");
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
							'tabel_nama_prestasi' => $controller->lang->line('label.nama_prestasi'),
							'tabel_nama_penyelenggara' => $controller->lang->line('label.nama_penyelenggara'),
							'tabel_newsletter' => $controller->lang->line('label.newsletter'),
							'tabel_nama_mitra_pempublikasi' => $controller->lang->line('label.nama_mitra_pempublikasi'),
							'tabel_situs_web' => $controller->lang->line('label.situs_web'),
							'tabel_tingkat' => $controller->lang->line('label.tingkat'),
							'tabel_tahun' => $controller->lang->line('label.tahun'),
							'tabel_delete' => $controller->lang->line('label.tabel.delete'),
							'table_action' => $controller->lang->line('label.tabel.action')
						),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur11'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/prestasi_newsletter.tpl'); 
	}
	
	public function listdata_json($controller){ 
		$list = $controller->model_wcu_academic_reputation_prestasi_newsletter->get_datatables($this->table, $this->column, $this->order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->NamaPrestasi;
            $row[] = $item->NamaPenyelenggara;
            $row[] = $item->Newsletter;
            $row[] = $item->NamaMitraPempublikasi;
            $row[] = '<td><i class="glyphicon glyphicon-link"></i> &nbsp; <a href="'.$item->SitusWeb.'" target="_blank_">'.$item->SitusWeb.'</a></td>';
            $row[] = $item->Tingkat;
            $row[] = $item->Tahun;
			/*
            //add html for action
            $row[] = '<a href="' . base_url('wcu/academic/prestasi_newsletter') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    <a href="' . base_url('wcu/academic/prestasi_newsletter') . '/edit/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> '.$controller->lang->line('label.tabel.edit').'</a>
                    <a href="#delete" class="btn btn-xs btn-danger" onClick="delete_data(\'' . base_url('wcu/academic/prestasi_newsletter') . '/delete/' . $item->ID. '\')"><i class="fa fa-remove fa-fw"></i> '.$controller->lang->line('label.tabel.delete').'</a>
					';
			*/
            //add html for action
            $row[] = '<a href="' . base_url('wcu/academic/prestasi_newsletter') . '/view/' . $item->ID . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> '.$controller->lang->line('label.tabel.view').'</a>
                    ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_academic_reputation_prestasi_newsletter->count_all($this->table),
            "recordsFiltered" => $controller->model_wcu_academic_reputation_prestasi_newsletter->count_filtered($this->table, $this->column, $this->order),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}

	public function sematkan($controller){

		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurAcademicReputation('konferensi_internasional', 'Sematkan');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> $controller->lang->line('navigation.navbar.wcu.academic_reputation.wur12'),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
		
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-academic_reputation/prestasi_newsletter_sematkan.tpl'); 
	}
}
