<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
* @bogor agriculture university
*/
class View extends CI_Controller {
    public $url;
    function __construct() 
    {
        parent::__construct();
		$this->url = current_url();
    }

    public function index($controller, $change=NULL, $id=NULL){
        $this->load->library('Fronted/'.$controller,'NULL','LIB');
        switch ($change) {
            case 'list': $this->LIB->list_();
                break;
            case 'view': $this->LIB->once($id);
                break;
            default: $this->LIB->view();
        }
    }
   
}
