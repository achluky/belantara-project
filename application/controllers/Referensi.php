<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {

    public $sess;
	
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('ref');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
		$this->load->model('model_referensi');
        $this->url = current_url();
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

    public function category(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Kategori Karyawan' => base_url().'person/category'
            ),
            'category_person_list' => $this->model_referensi->get_category(),
            'title'=> ' Employe Category <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/ref_category_employe.tpl');
    }

}
