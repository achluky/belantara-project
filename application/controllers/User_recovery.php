<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_recovery extends CI_Controller {

    public $url;
	public function __construct() 
    {
        //parent::__construct();
        //$this->load->model('model_user');
        //$this->url = current_url();
    }

    public function index(){
		/*
        $data = array(
            'user'=> $this->model_user->get_listuser(),
            'url'=> $this->url,
            'title'=> 'User <small>recovery password</small>',
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/user-recovery.tpl');
		*/
    }

    public function send(){
	/*
        var_dump($_POST);
        die();
		*/
    }
}