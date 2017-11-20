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
                'widget' => $this->input->post('widget'),
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
            'widget_list'=> $this->model_page->get_widget_byURL($id),
            'title'=> 'Page <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/page_edit.tpl');
    }

    public function update(){

        if( count($_POST['widget_selected']) > 0){
            $widget_content = implode("-", $_POST['widget_selected']);
        } else {
            $widget_content = '';
        }

        $data = array(
                'title_EN' => $this->input->post('title_EN'),
                'title_ID' => $this->input->post('title_ID'),
                'keyword_EN' => $this->input->post('keyword_EN'),
                'keyword_ID' => $this->input->post('keyword_ID'),
                'waktu'=> date('Y-m-d h:i:s'),
                'url'=> $this->input->post('url'),
                'controller'=> $this->input->post('controller'),
                'widget_content' => $widget_content
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

    // ========================== EDIT CONTENT ====================================
    public function content_edit($slug){
        if ($slug == 'contact-us') {
            $data = array(
                'url'=> $this->url,
                'alert' => isset($_GET['n'])?$_GET['n']:'',
                'breadcrumb' => array(
                    'Dashboard'=>base_url().'admin',
                    'Page list' => base_url().'page',
                    'page' => base_url()
                ),
                'page' => $this->model_page->get_page_by_slug($slug),
                'title'=> 'Page <small>management</small>',
                'last_login' => $this->sess['last_login'],
                'session' => $this->sess['username'],
                'site_lang'=>$this->session->userdata('site_lang'),
            );
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/contact-us-edit.tpl');
        } else {
            $data = array(
                'url'=> $this->url,
                'session_group_name' => $this->sess['group_name'],
                'session' => $this->sess['username'],
                'site_lang'=>$this->session->userdata('site_lang')
            );
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/'.$slug.'.tpl');
        }
    }

    public function update_contact(){
        $data = array(
                'title_EN' => $this->input->post('title_EN'),
                'title_ID' => $this->input->post('title_ID'),
                'content_EN' => $this->input->post('deskripsi_EN'),
                'content_ID' => $this->input->post('deskripsi_ID'),
                'other_EN' => $this->input->post('alamat_EN'),
                'other_ID' => $this->input->post('alamat_ID'),
        );

        $slug = $this->input->post('slug');
        if($this->model_page->update_page_contact($slug,$data)) {
            $alert = url_title("Update succses !");
            redirect('page/content_edit/contact-us/?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('page/content_edit/contact-us/?n='.$alert,'refresh');
        }
    }

    public function widget($act){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Page list' => base_url().'page',
                'Widget list' => base_url().'page/widget/list',
            ),
            'title'=> 'Page - Widget <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        if ($act == 'save') {
            if ( ($this->input->post('name') != NULL) ) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'content_EN' => $this->input->post('content_EN'),
                    'content_ID' => $this->input->post('content_ID')
                );

                if($this->model_page->save_page_widget($data)){
                    $alert = url_title("Saved!");
                    redirect('page/widget/list?n='.$alert,'refresh');
                }else{
                    $alert = url_title("save failed !");
                    redirect('page/widget/add?n='.$alert,'refresh');
                }
            }else{
                $alert = url_title("is empty !");
                redirect('page/widget/add?n='.$alert,'refresh');
            }
        } else if ($act == 'list') {
            $data['widget'] = $this->model_page->get_page_widget();
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/page_widget_list.tpl');
        } else if ($act == 'edit'){
            $id = isset($_GET['id'])?$_GET['id']:'';
            if ($id == '') {
                $alert = url_title("ID widget Kososng!");
                redirect('page/widget/list?n='.$alert,'refresh');
            } else {
                $data['widget'] = $this->model_page->get_widget($id);
                $this->smartyci->assign('data',$data);
                $this->smartyci->display('admin/page_widget_edit.tpl');
            }
        } else if($act == 'update'){
            $id = $this->input->post('id');
            $data = array(
                'name' => $this->input->post('name'),
                'content_EN' => $this->input->post('content_EN'),
                'content_ID' => $this->input->post('content_ID'),
                'urutan' => $this->input->post('urutan')
            );

            if($this->model_page->update_page_widget($data, $id)){
                $alert = url_title("Update succses");
                redirect('page/widget/edit/?id='.$id.'&n='.$alert,'refresh');
            }else{
                $alert = url_title("save failed !");
                redirect('page/widget/add?n='.$alert,'refresh');
            }
        }else {
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/page_widget_add.tpl');
        }
    }
}
