<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel_terindex_google_scholer {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('research_publication');
        $controller->navigation->setBreadcrumbWurReserachPublication('artikel_terindex_google_scholer',$change);

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
			case "prodi": $this->category($controller);
				break;
			case "articlelist" :$this->articlelist($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurReserachPublication('artikel_terindex_google_scholer', 'Program Studi');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Artikel Terindex <small> Google Scholar </small> ',
                    'artikel' => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getOnes($controller->input->get('id'))->row(),
	                'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );	
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_google_scholer/wcu-reserach-publication-artikel_terindex_google_scholer.tpl'); 
	}
	public function add($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'jenisArticle' => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getJenisArticle(),
                    'levelArticle' => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getLevelArticle(),
                    'structur'=> $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getListDepartement(),
                    'title'=> 'Add Artikel Terindex Google Scholar <small> Content management</small>',
	                'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );	
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_google_scholer/wcu-reserach-publication-artikel_terindex_google_scholer-add.tpl'); 
	}
	public function edit($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'jenisArticle' => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getJenisArticle(),
                    'levelArticle' => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getLevelArticle(),
                    'structur'=> $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getListDepartement(),
                    'title'=> 'Edit Artikel Terindex Google Scholar <small> Content management</small>',
	                'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );	
        $controller->smartyci->assign('data',$data);
		$controller->smartyci->assign('once', 
					$controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getOnes($controller->input->get('id'))->row()
				);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_google_scholer/wcu-reserach-publication-artikel_terindex_google_scholer-edit.tpl'); 
	
	}
	public function delete($controller){}
	public function save($controller){
		if($controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->save($_POST)){
				    $alert = url_title("success");
		            redirect('wcu/reserach_publication/artikel_terindex_google_scholer?n='.$alert, 'refresh');
		}

	}
	public function update($controller){
		if($controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->update($_POST)){
				    $alert = url_title("success");
		            redirect('wcu/reserach_publication/artikel_terindex_google_scholer/prodi/?d='.$_POST["structur"].'&n='.$alert, 'refresh');
		}		
	}
	public function export($controller){
		$controller->load->library('excel_generate');
        $data = $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->get_exsport(
        		$controller->input->get('d')
        		);
     	$controller->excel_generate->setFileName("Atikel Terindex Google Scholer ".$controller->input->get('d'));
        $controller->excel_generate->generate($data);
	}
    public function sematkan($controller){

		$sess = $controller->session->userdata('logged_in');

		if ($controller->input->get('xen')==1 and $controller->input->get('xen')!=null) {

			$structur = $controller->input->post('structur');
			$jenis_artikel = $controller->input->post('jenis_artikel');
			$levelArtikel = $controller->input->post('levelArtikel');
			$iframe = '<iframe width="100%" height="100%" src="'.base_url().'view/artikel_terindex_google_scholer/?str='.$structur.'&jenis_artikel='.$jenis_artikel.'&levelArtikel='.$levelArtikel.'" frameborder="0" allowfullscreen></iframe>';

        	$controller->smartyci->assign('structur',$structur);
        	$controller->smartyci->assign('jenis_artikel',$jenis_artikel);
        	$controller->smartyci->assign('levelArtikel',$levelArtikel);
			$data = array(
	                    'url'=> current_url(),
	                    'alert' => $controller->input->get('n'),
	                    'iframe'=>$iframe,
	                    'jenisArticle' => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getJenisArticle(),
	                    'levelArticle' => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getLevelArticle(),
	                    'structur'=> $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getListDepartement(),
	                    'title'=> 'Sematkan Artikel Terindex Google Scholar <small> Content management</small>',
		                'last_login' => $sess['last_login'],
						'session' => $sess['username']
	        );	
	    }else {
        	$controller->smartyci->assign('structur',$controller->input->get('d'));
        	$controller->smartyci->assign('jenis_artikel',"");
        	$controller->smartyci->assign('levelArtikel',"");
			$data = array(
	                    'url'=> current_url(),
	                    'alert' => $controller->input->get('n'),
	                    'iframe'=>'',
	                    'jenisArticle' => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getJenisArticle(),
	                    'levelArticle' => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getLevelArticle(),
	                    'structur'=> $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getListDepartement(),
	                    'title'=> 'Sematkan Artikel Terindex Google Scholar <small> Content management</small>',
		                'last_login' => $sess['last_login'],
						'session' => $sess['username']
	        );	
	    	
	    }
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_google_scholer/wcu-reserach-publication-artikel_terindex_google_scholer-sematkan.tpl'); 
    }
	public function listdata($controller){
		$sess = $controller->session->userdata('logged_in');
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'title'=> 'Artikel Terindex <small> Google Scholar </small> ',
		            'structur'=>$controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getListDepartement(),
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_google_scholer/wcu-reserach-publication-artikel_terindex_google_scholer-category.tpl'); 
	}
	public function category($controller){
		$sess = $controller->session->userdata('logged_in');
		$controller->navigation->setBreadcrumbWurReserachPublication('artikel_terindex_google_scholer', 'Program Studi');
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
		$data = array(
                    'url'=> current_url(),
                    'alert' => $controller->input->get('n'),
                    'departement' => $controller->input->get('d'),
                    'title'=> 'Artikel Terindex <small> Google Scholar </small> ',
                    'last_login' => $sess['last_login'],
					'session' => $sess['username']
        );
        $controller->smartyci->assign('data',$data);
        $controller->smartyci->display('admin/Wcu-artikel_terindex_google_scholer/wcu-reserach-publication-artikel_terindex_google_scholer-list.tpl'); 
	}
	public function articlelist($controller){
		$year = $controller->input->get('y');
        $list = $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->get_datatables_listartikel($year);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $artikel) {
            $no++;
            $row = array();
            $row[] = $artikel->judul;
            $row[] = $artikel->TahunTerbit;
            $row[] = $artikel->JenisArtikelID;
            
            //add html for action
            $row[] = '	<a href="'.base_url().'wcu/reserach_publication/artikel_terindex_google_scholer/view/?id='.$artikel->ID.'" class="btn btn-xs">
            				<i class="fa fa-file fa-fw"></i> View
            		  	</a> 
						<a href="'.base_url().'wcu/reserach_publication/artikel_terindex_google_scholer/edit/?id='.$artikel->ID.'" class="btn btn-xs">
		            	<i class="fa fa-edit fa-fw"></i> Edit
		            	</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->count_allStudent($year),
            "recordsFiltered" => $controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->count_filteredStudent($year),
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
	}
}
