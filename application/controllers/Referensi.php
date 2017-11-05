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

    //category
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


    public function category_add(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Kategori Karyawan' => base_url().'referensi/category'
            ),
            'label' => array(
                'category' => $this->lang->line('label.tabel.category_employee')
            ),
            'title'=> ' Employe Category <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/ref_category_employe_add.tpl');
    }

    public function category_save(){
        if ( ($this->input->post('category_ID') != NULL) and ($this->input->post('category_EN') != NULL) ) {
            $data = array(
                'category_ID' => $this->input->post('category_ID'),
                'category_EN' => $this->input->post('category_EN')
            );

            if($this->model_referensi->save_category_employee($data)){
                $alert = url_title("Saved!");
                redirect('referensi/category?n='.$alert,'refresh');
            }else{
                $alert = url_title("save failed !");
                redirect('referensi/category_add?n='.$alert,'refresh');
            }
        }else{
            $alert = url_title("is empty !");
            redirect('referensi/category_add?n='.$alert,'refresh');
        }
    }

    public function category_delete($id){
        $data = array(
            'url'=> $this->url,
            'id' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Kategori Karyawan' => base_url().'referensi/category'
                ),
            'title'=> ' Employe Category <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            $this->model_referensi->delete($id);
            $alert = url_title("delete succses !");
            redirect('page/?n='.$alert,'refresh');   
        }
        
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/page_delete.tpl');
    }

     public function category_edit($id){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Kategori Karyawan' => base_url().'referensi/category',
                'Edit Kategori' => base_url()
                ),
            'label' => array(
                'category' => $this->lang->line('label.tabel.category_employee')
            ),
            'category'=> $this->model_referensi->get_category_byid($id),
            'title'=> ' Employe Category <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/ref_category_employe_edit.tpl');
    }

    public function category_update(){
        $data = array(
                'category_ID' => $this->input->post('category_ID'),
                'category_EN' => $this->input->post('category_EN')
        );
        $id = $this->input->post('id');
        if($this->model_referensi->update_category_employe($id,$data)) {
            $alert = url_title("Update succses !");
            redirect('referensi/category_edit/'.$id.'?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('referensi/category_edit/'.$id.'?n='.$alert,'refresh');
        }
    }
}
