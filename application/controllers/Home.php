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

            'site_lang'=>$this->session->userdata('site_lang'),
        );
        $this->smartyci->assign('data',$data);
        if ($data['site_lang']=='ID')
        {
            $this->smartyci->display('front-end/index_id.tpl');
        }
        else
        {
            $this->smartyci->display('front-end/index.tpl');
        }
        
    }
    
    public function contact() {
        $data = array(
            'url'=> $this->url,

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
    
    public function gallery() {
        $data = array(
            'url'=> $this->url,

            'site_lang'=>$this->session->userdata('site_lang'),
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/gallery.tpl');
    }
    
    public function related_news() {
        $data = array(
            'url'=> $this->url,

            'site_lang'=>$this->session->userdata('site_lang'),
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/related-news.tpl');
    }
    
    public function references() {
        $data = array(
            'url'=> $this->url,

            'site_lang'=>$this->session->userdata('site_lang'),
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/references.tpl');
    }
    
    public function resources() {
        $data = array(
            'url'=> $this->url,

            'site_lang'=>$this->session->userdata('site_lang'),
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/resources.tpl');
    }
    
    public function press_release() {
        $data = array(
            'url'=> $this->url,

            'site_lang'=>$this->session->userdata('site_lang'),
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/press-release.tpl');
    }

    public function management(){
        
    	$data = array(
            'url'=> $this->url,

            'employee_management' => $this->model_home->get_employee_management(),
            'site_lang'=>$this->session->userdata('site_lang'),
        );

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
    	$data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang')
        );
        
        $this->smartyci->assign('data',$data);
        if ($data['site_lang']=='ID')
        {
            $this->smartyci->display('front-end/aboutus_id.tpl');
        }
        else
        {
            $this->smartyci->display('front-end/aboutus.tpl');
        }
    }
    
    public function program(){
    	$data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang')
        );

        $this->smartyci->assign('data',$data);
        if ($data['site_lang']=='ID')
        {
            $this->smartyci->display('front-end/program_id.tpl');
        }
        else
        {
            $this->smartyci->display('front-end/program.tpl');
        }
    }
    public function grantarea(){
    	$data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang')
        );

        $this->smartyci->assign('data',$data);
        if ($data['site_lang']=='ID')
        {
            $this->smartyci->display('front-end/workingarea_id.tpl');
        }
        else
        {
            $this->smartyci->display('front-end/workingarea.tpl');
        }
    }
    public function approach(){
    	$data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang')
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/approach.tpl');
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
