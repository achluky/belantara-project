<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Press_release extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('model_press_release');
        $this->url = current_url();
    }

    public function index() {
        
        $data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'press_release' => $this->model_press_release->get_press_release_all($this->session->userdata('site_lang'))
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/press_release.tpl');
    }
    
    public function detail($slug) {
        $data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'blog' => $this->model_blog->get_blog_all($this->session->userdata('site_lang')),
            'blog_detail' => $this->model_blog->get_blog_front($slug, $this->session->userdata('site_lang'))
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/blog_detail.tpl');
    }
    
}
