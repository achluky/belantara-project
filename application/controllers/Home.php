<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('model_home');
        $this->url = current_url();
    }
    
    public function index() {
        $data = array(
            'url'=> $this->url,
            'session_group_name' => $this->session->userdata('group_name'),
            'site_lang'=>$this->session->userdata('site_lang'),
            'slider' => $this->model_home->get_slider(),
            'page_home' => $this->model_home->get_page_home(),
            'blog' => $this->model_home->get_blog($this->session->userdata('site_lang')),
            'last_news' => $this->model_home->get_news($this->session->userdata('site_lang')),
            'last_resource' => $this->model_home->get_resource($this->session->userdata('site_lang'))
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/index.tpl');
    }
    
    public function references() {
        $data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'references' => $this->model_home->get_references_all($this->session->userdata('site_lang')),
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/references.tpl');
    }
    
    public function resources() {
        $data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'resources' => $this->model_home->get_resource_all($this->session->userdata('site_lang')),
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/resources.tpl');
    }

    public function related_news(){
        $data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'related_news' => $this->model_home->get_related_news_all($this->session->userdata('site_lang')),
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/related_news.tpl');
    }

    public function contact() {
        $data = array(
            'url'=> $this->url,
            'session_group_name' => $this->session->userdata('group_name'),
            'site_lang'=>$this->session->userdata('site_lang'),
        );
        $this->smartyci->assign('data',$data);
        if ($data['site_lang']=='ID')
        {
            $this->smartyci->display('front-end/contact.tpl');
        }
        else
        {
            $this->smartyci->display('front-end/contact.tpl');
        }
        
    }

    public function management(){
        $data = array(
            'url'=> $this->url,
            'employee_management' => $this->model_home->get_employee_management(),
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        if ($data['site_lang']=='ID')
        {
            $data['page_title'] = 'MANAJEMEN KAMI';
            $data['header'] = 'Tim Manajemen Belantara bertanggung jawab dalam pelaksanaan operasional sehari-hari, pengelolaan kegiatan konservasi, restorasi, program - program dan proyek - proyek pengembangan masyarakat  Belantara.';
        }
        else
        {
            $data['page_title'] = 'OUR MANAGEMENT';
            $data['header'] = 'The Foundation’s Management Team is responsible for the day to day operation and management of Belantara’s conservation, restoration, and community development activities and projects.';
        }
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/management.tpl');
    }
    
    public function adv_committee(){
    	$data = array(
            'url'=> $this->url,
            'employee_management' => $this->model_home->get_employee_adv_committee(),
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/advisory.tpl');
    }
    
    public function aboutus(){
        $this->load->helper('page');
    	$data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'slug' => $this->uri->segment(1, 0)
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/about-us.tpl');
    }
    
    public function program(){
        $this->load->helper('page');
    	$data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'slug' => $this->uri->segment(1, 0)
        );
        $this->smartyci->assign('data',$data);      
        $this->smartyci->display('front-end/program.tpl');
    }
    public function grantarea(){
        $this->load->helper('page');
    	$data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'slug' => $this->uri->segment(1, 0)
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/workingarea.tpl');
    }
    public function approach(){
        $this->load->helper('page');
    	$data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'slug' => $this->uri->segment(1, 0)
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/approach.tpl');
    }
    public function project(){
        $data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang')
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/modal_test.tpl');
    }
    public function boards(){
    	$data = array(
            'url'=> $this->url,

            'employee_boards' => $this->model_home->get_employee_boards(),
            'boards_category' => $this->model_home->get_boards_category(),
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/boards.tpl');
    }
    
    
    public function boardsdetail($id)
    {
        $data = array(
            'site_lang' => $this->session->userdata('site_lang'),
            'people'    => $this->model_home->get_detail_boards($id)
        );
        
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/people-ajax.tpl');
    }
    

    
    
}
