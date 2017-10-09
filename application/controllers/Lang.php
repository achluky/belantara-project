<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lang extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    function s($language = "") {

    	$language = ($language != "") ? $language : "ID";
    	$this->session->set_userdata('site_lang', $language);
    	$this->session->set_userdata('id_bahasa', $language);
        redirect($_GET['url']);
    }
}