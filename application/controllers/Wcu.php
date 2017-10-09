<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wcu extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
		$this->load->library('navigation');
		$this->sess = $this->session->userdata('logged_in');
    }

    public function index() {
		$data = array(
                'url'=> current_url(),
                'alert' => $this->input->get('n'),
                'title'=> 'Asia World University Ranking',
                'last_login' => $this->sess['last_login'],
				'session' => $this->sess['username']
            );
        
		$this->navigation->setMenuActive('wur');
		$this->navigation->setBreadcrumbWur(null);
		$this->smartyci->assign('navbar',$this->navigation->getNavbar());
		$this->smartyci->assign('breadcrumb',$this->navigation->getBreadcrumb());
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/wcu.tpl');   
	}
    
    public function academic($parameter=NULL, $c=NULL, $id=NULL){
		
        $this->load->model('model_wcu');

        if ($parameter=='academic_survey') {
			$this->load->library('WCU/academic_survey');
			$this->academic_survey->run($this, $c, $id);
        } elseif($parameter=='prestasi_newsletter'){
    		$this->load->library('WCU/prestasi_newsletter');
			$this->prestasi_newsletter->run($this, $c, $id);
        } elseif($parameter=='konferensi_internasional'){
			$this->load->library('WCU/konferensi_internasional');
			$this->konferensi_internasional->run($this, $c, $id);
        } elseif($parameter=='foreign_guests'){
			$this->load->library('WCU/foreign_guests');
			$this->foreign_guests->run($this, $c, $id);
        } elseif($parameter=='program_studi_terakreditasi_internasional'){
			$this->load->library('WCU/program_studi_terakreditasi_internasional');
			$this->program_studi_terakreditasi_internasional->run($this, $c, $id);
        } elseif ($parameter=='academic_survey') {
			$this->load->library('WCU/academic_survey');
			$this->academic_survey->run($this, $c, $id);
        } else {
			$data = array(
                'url'=> current_url(),
                'alert' => $this->input->get('n'),
                'title'=> 'Academic Reputation',
                'last_login' => $this->sess['last_login'],
				'session' => $this->sess['username']
            );
            $this->navigation->setMenuActive('wur');
			$this->navigation->setSubMenuActive('academic_reputation');
			$this->navigation->setBreadcrumbWurAcademicReputation(null);
			
			$this->smartyci->assign('navbar',$this->navigation->getNavbar());
			$this->smartyci->assign('breadcrumb',$this->navigation->getBreadcrumb());
			$this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/wcu-academic-reputation.tpl');   
        }
    }

    public function employee($parameter=NULL, $c=NULL, $id=NULL){

        $this->load->model('model_wcu');

        if ($parameter=='employee_survey') {
			$this->load->library('WCU/employee_survey');
			$this->employee_survey->run($this, $c, $id);
        }elseif($parameter=='kompetisi_internasional'){
			$this->load->library('WCU/kompetisi_internasional');
			$this->kompetisi_internasional->run($this, $c, $id);
        } elseif($parameter=='keikutsertaan_dosen'){
            $this->load->library('WCU/keikutsertaan_dosen');
			$this->keikutsertaan_dosen->run($this, $c, $id);
        } elseif($parameter=='publikasi_jurnal_internasional'){
			$this->load->library('WCU/publikasi_jurnal_internasional');
			$this->publikasi_jurnal_internasional->run($this, $c, $id);
        }  else {
			$data = array(
                'url'=> current_url(),
                'alert' => $this->input->get('n'),
                'title'=> 'Employee Reputation',
                'last_login' => $this->sess['last_login'],
                'session' => $this->sess['username']
            );
			$this->navigation->setMenuActive('wur');
			$this->navigation->setSubMenuActive('employee_reputation');
			$this->navigation->setBreadcrumbWurEmployeeReputation(null);
			$this->smartyci->assign('navbar',$this->navigation->getNavbar());
			$this->smartyci->assign('breadcrumb',$this->navigation->getBreadcrumb());
			$this->smartyci->assign('data',$data);
			$this->smartyci->display('admin/wcu-employe-reputation.tpl');   
        }
    }
    
    public function internationalization($parameter=NULL, $c=NULL, $id=NULL){
        
        $this->load->model('model_wcu');

        if ($parameter=='inbound' || 
			$parameter=='undergraduate_outbound' || 
			$parameter=='postgraduate_outbound' || 
			$parameter=='laboratorium_sertifikasi_internasional' || 
			$parameter=='penghargaan_dosen_internasional') {
			$this->load->library('WCU/'.$parameter,'NULL','LIB');
            $this->LIB->run($this, $c, $id);
        } else {
            $data = array(
                'url'=> current_url(),
                'alert' => $this->input->get('n'),
                'title'=> 'Internasionalization',
                'last_login' => $this->sess['last_login'],
                'session' => $this->sess['username']
            );
			$this->navigation->setMenuActive('wur');
			$this->navigation->setSubMenuActive('internasionalization');
			$this->navigation->setBreadcrumbWurInternationalization(null);
			$this->smartyci->assign('navbar',$this->navigation->getNavbar());
			$this->smartyci->assign('breadcrumb',$this->navigation->getBreadcrumb());
			
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/wcu-internationalization.tpl');   
        }
    }
	
    public function reserach_publication($parameter=NULL, $c=NULL, $id=NULL){

        $this->load->model('model_wcu');

        if ($parameter=='kerjasama_internasional') {
            $this->load->library('WCU/kerjasama_internasional');
            $this->kerjasama_internasional->run($this, $c);
        } elseif($parameter=='kerjasama_nasional'){
            $this->load->library('WCU/kerjasama_nasional');
            $this->kerjasama_nasional->run($this, $c);
        } elseif($parameter=='kerjasama'){
            $this->load->model('model_wcu_reserach_publication_kerjasama');
            $this->load->library('WCU/kerjasama');
            $this->kerjasama->run($this, $c);
        } elseif($parameter=='artikel_terindex_scopus'){
            $this->load->model('model_wcu_reserach_publication_artikel_terindex_scopus');
            $this->load->library('WCU/artikel_terindex_scopus');
            $this->artikel_terindex_scopus->run($this, $c, $id);
        } elseif($parameter=='pusat_unggulan_riset'){
            $this->load->model('model_wcu_reserach_publication_pusat_unggulan_riset');
            $this->load->library('WCU/pusat_unggulan_riset');
            $this->pusat_unggulan_riset->run($this, $c, $id);
        } elseif($parameter=='paten_hki'){
            $this->load->model('model_wcu_reserach_publication_paten_hki');
            $this->load->library('WCU/paten_hki');
            $this->paten_hki->run($this, $c);
        } elseif($parameter=='inovasi'){
            $this->load->model('model_wcu_data_university_inovasi');
            $this->load->library('WCU/inovasi');
            $this->inovasi->run($this, $c);
        } elseif($parameter=='artikel_terindex_google_scholer'){
            $this->load->model('model_wcu_reserach_publication_artikel_terindex_google_scholer');
            $this->load->library('WCU/artikel_terindex_google_scholer');
            $this->artikel_terindex_google_scholer->run($this, $c);
        } else {
            $data = array(
                'url'=> current_url(),
                'alert' => $this->input->get('n'),
                'title'=> 'Research and Publication',
                'last_login' => $this->sess['last_login'],
                'session' => $this->sess['username']
            );
            $this->navigation->setMenuActive('wur');
            $this->navigation->setSubMenuActive('research_publication');
            $this->navigation->setBreadcrumbWurReserachPublication(null);
            $this->smartyci->assign('navbar',$this->navigation->getNavbar());
            $this->smartyci->assign('breadcrumb',$this->navigation->getBreadcrumb());
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/wcu-reserach_publication.tpl');   
        }
    }

    public function data_university($parameter=NULL, $c=NULL, $id=NULL){

        if ($parameter=='staff_dosen' || 
			$parameter=='staff_phd' || 
			$parameter=='undergraduate_student' || 
			$parameter=='postgraduate_student') {
			$this->load->library('WCU/'.$parameter,'NULL','LIB');
            $this->LIB->run($this, $c, $id);
        } else {
            $data = array(
                'url'=> current_url(),
                'alert' => $this->input->get('n'),
                'title'=> 'Data University',
                'last_login' => $this->sess['last_login'],
                'session' => $this->sess['username']
            );
            $this->navigation->setMenuActive('wur');
			$this->navigation->setSubMenuActive('data_university');
			$this->navigation->setBreadcrumbWurDataUniversity(null);
			$this->smartyci->assign('navbar',$this->navigation->getNavbar());
			$this->smartyci->assign('breadcrumb',$this->navigation->getBreadcrumb());
			$this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/wcu-data_university.tpl');   
        }
    }

}
