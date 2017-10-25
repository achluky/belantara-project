<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel_terindex_scopus {
	
    public function __construct() { }
    
	public function run($controller, $change,$id=NULL) { 

		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('research_publication');
        $controller->navigation->setBreadcrumbWurReserachPublication('artikel_terindex_scopus', $change, $id);

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
			case "category": $this->category($controller, $id);
				break;
			case "articlelist": $this->articlelist($controller,$id);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller){
		$sess = $controller->session->userdata('logged_in');
		$rst = $controller->model_wcu_reserach_publication_artikel_terindex_scopus->getOnes($controller->input->get('id'));
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Paten dan HKI <small> Content management</small>',
		            'artikel'=> array(
		            	'Judul'=> $rst->Judul,
		            	'JenisArtikelID'=> getJenisArtikel($rst->JenisArtikelID),
		            	'NamaArtikel'=> $rst->NamaArtikel,
		            	'TahunTerbit'=> $rst->TahunTerbit,
		            	'BulanTerbitAwal'=> $rst->BulanTerbitAwal,
		            	'BulanTerbitAkhir'=> $rst->BulanTerbitAkhir,
		            	'KotaTerbit'=> $rst->KotaTerbit,
		            	'Url'=> $rst->Url,
		            	'ISSN'=> $rst->ISSN,
		            	'ISBN'=> $rst->ISBN,
		            	'Volume'=> $rst->Volume,
		            	'Halaman'=>$rst->Halaman,
		            	'Nomor'=>$rst->Nomor,
		            	'Akreditasi'=>$rst->Akreditasi,
		            	'MediaPenerbit'=>$rst->MediaPenerbit,
		            	'IndexScopus'=>($rst->IndexScopus=="Y")?"Ya":"Tidak",
		            	'LevelArtikel'=>getLingkup($rst->LevelArtikel)
		            	),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_scopus/wcu-reserach-publication-artikel_terindex_scopus.tpl');
	}
	public function add($controller){}
	public function edit($controller){}
	public function delete($controller){}
	public function save($controller){}
	public function update($controller){}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_reserach_publication_artikel_terindex_scopus->get_exsport(
        		$controller->input->get('y')
        		);
     	$controller->excel_generate->setFileName("Atikel Terindex Scopus Tahun ".$controller->input->get('y'));
        $controller->excel_generate->generate($data);
	}
    public function sematkan($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Artikel Terindex Scopus <small> Content management</small>',
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('year',$controller->input->get('y'));
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_scopus/wcu-reserach-publication-artikel_terindex_scopus-sematkan.tpl'); 
    }
	public function listdata($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Artikel Terindex Scopus <small> Content management</small>',
		            'year'=>$controller->model_wcu_reserach_publication_artikel_terindex_scopus->getYears(),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_scopus/wcu-reserach-publication-artikel_terindex_scopus-category.tpl'); 

	}
	public function category($controller,$year){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurReserachPublication('artikel_terindex_scopus', $year);
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Artikel Terindex Scopus <small> Content management</small>',
                    'yaer'=>$year,
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_scopus/wcu-reserach-publication-artikel_terindex_scopus-list.tpl'); 
	}
	public function articlelist($controller, $year){
        $list = $controller->model_wcu_reserach_publication_artikel_terindex_scopus->get_datatables_listartikel($year);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $artikel) {
            $no++;
            $row = array();
            $row[] = $artikel->Judul;
            $row[] = $artikel->TahunTerbit;
            $row[] = getJenisArtikel($artikel->JenisArtikelID);
            //$row[] = $artikel->NamaPenulis;
            
            //add html for action
            $row[] = '<a href="'.base_url().'wcu/reserach_publication/artikel_terindex_scopus/view/?id='.$artikel->ID.'" class="btn btn-xs">
            				<i class="fa fa-file fa-fw"></i> View
            		  </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_reserach_publication_artikel_terindex_scopus->count_all($year),
            "recordsFiltered" => $controller->model_wcu_reserach_publication_artikel_terindex_scopus->count_filtered($year),
            "data" => $data
        );
        //output to json format
        echo json_encode($output);

	}
}
