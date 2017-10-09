<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {

	public $sess;
	
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
		$this->load->library('navigation');
		$this->load->model('model_referensi');
        $this->sess = $this->session->userdata('logged_in');
		
    }

    public function index() {
		$data = array(
                'url'=> current_url(),
                'alert' => $this->input->get('n'),
                'title'=> $this->lang->line('navigation.navbar.referensi'),
                'last_login' => $this->sess['last_login'],
				'session' => $this->sess['username']
            );
        
		$this->navigation->setMenuActive('reference');
		$this->navigation->setBreadcrumbReference(null);
		$this->smartyci->assign('navbar',$this->navigation->getNavbar());
		$this->smartyci->assign('breadcrumb',$this->navigation->getBreadcrumb());
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/reference/index.tpl');   
	}
    
    public function jenis_kegiatan_mahasiswa($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/jenis_kegiatan_mahasiswa');
		$this->jenis_kegiatan_mahasiswa->run($this, $parameter, $id);
    
	}
    public function jenis_kelamin($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/jenis_kelamin');
		$this->jenis_kelamin->run($this, $parameter, $id);
    
	}
    public function jenis_kontak_survey($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/jenis_kontak_survey');
		$this->jenis_kontak_survey->run($this, $parameter, $id);
    
	}
    public function status_penulis($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/status_penulis');
		$this->status_penulis->run($this, $parameter, $id);
    
	}
    public function jenis_artikel($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/jenis_artikel');
		$this->jenis_artikel->run($this, $parameter, $id);
    
	}
    public function lingkup($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/lingkup');
		$this->lingkup->run($this, $parameter, $id);
    
	}
    public function prestasi_mahasiswa($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/prestasi_mahasiswa');
		$this->prestasi_mahasiswa->run($this, $parameter, $id);
    
	}
    public function status_pegawai($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/status_pegawai');
		$this->status_pegawai->run($this, $parameter, $id);
    
	}
    public function status_kepegawaian($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/status_kepegawaian');
		$this->status_kepegawaian->run($this, $parameter, $id);
    
	}
    
    public function strata($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/strata');
		$this->strata->run($this, $parameter, $id);
    
	}
    public function negara($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/negara');
		$this->negara->run($this, $parameter, $id);
    
	}
    
    public function ruang($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/ruang');
		$this->ruang->run($this, $parameter, $id);
    
	}
    
    public function asosiasi_profesi($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/asosiasi_profesi');
		$this->asosiasi_profesi->run($this, $parameter, $id);
    
	}
    
    public function lembaga_pengakreditasi($parameter=NULL,$id=NULL){
		
      	$this->load->library('Reference/lembaga_pengakreditasi');
		$this->lembaga_pengakreditasi->run($this, $parameter, $id);
    
	}

}
