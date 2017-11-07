<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public $sess;
	public function __construct() 
    {
        parent::__construct();
	    if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('page');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
		$this->load->model('model_page');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index(){
    	$data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Page list' => base_url().'page'
            ),
            'page_list' => $this->model_page->get_listpage(),
            'title'=> 'Page <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/page.tpl');
    }

    public function add(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Page list' => base_url().'page'
            ),
            'title'=> 'Page <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/page_add.tpl');
    }
    public function save(){
        if ( ($this->input->post('title_EN') != NULL) and ($this->input->post('title_ID') != NULL) ) {
            $data = array(
                'title_EN' => $this->input->post('title_EN'),
                'title_ID' => $this->input->post('title_ID'),
                'keyword_EN' => $this->input->post('title_EN'),
                'keyword_ID' => $this->input->post('title_EN'),
                'waktu'=> date('Y-m-d h:i:s'),
                'url'=> $this->input->post('url')
            );

            if($this->model_page->save_page($data)){
                $alert = url_title("Saved!");
                redirect('page?n='.$alert,'refresh');
            }else{
                $alert = url_title("save failed !");
                redirect('page/add?n='.$alert,'refresh');
            }
        }else{
            $alert = url_title("is empty !");
            redirect('page/add?n='.$alert,'refresh');
        }
    }

    public function delete($id){
        $data = array(
            'url'=> $this->url,
            'id' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Halaman list' => base_url().'Halaman'
                ),
            'title'=> 'Halaman <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            $this->model_page->delete($id);
            $alert = url_title("delete succses !");
            redirect('page/?n='.$alert,'refresh');   
        }
        
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/page_delete.tpl');
    }

     public function edit($id){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Page list' => base_url().'page',
                'page' => base_url()
                ),
            'page'=> $this->model_page->get_page_by_id($id),
            'title'=> 'Page <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/page_edit.tpl');
    }

    public function update(){
        $data = array(
                'title_EN' => $this->input->post('title_EN'),
                'title_ID' => $this->input->post('title_ID'),
                'keyword_EN' => $this->input->post('keyword_EN'),
                'keyword_ID' => $this->input->post('keyword_ID'),
                'waktu'=> date('Y-m-d h:i:s'),
                'url'=> $this->input->post('url'),
                'controller'=> $this->input->post('controller')
        );
        $id = $this->input->post('id');
        if($this->model_page->update_page($id,$data)) {
            $alert = url_title("Update succses !");
            redirect('page/edit/'.$id.'?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('page/edit/'.$id.'?n='.$alert,'refresh');
        }
    }

    public function content_edit(){
        $data = array(
            'url'=> $this->url,
            'session_group_name' => $this->sess['group_name'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang')
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/aboutus.tpl');
    }
}
