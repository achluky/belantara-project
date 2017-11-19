<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('model_gallery');
        $this->url = current_url();
    }

    public function index() {
        $data = array(
            'url'=> $this->url,
            'site_lang'=>$this->session->userdata('site_lang'),
            'gallery' => $this->model_gallery->get_gallery_all($this->session->userdata('site_lang'))
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/gallery.tpl');
    }
    
    public function detail($slug) {
    }
    
}
