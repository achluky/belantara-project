<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pdf extends CI_Controller {
    
    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('todo');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_profil');
        $this->load->model('model_grant');
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index()
    {
        $id_grant = $_POST['id_grant'];
        $this->load->library('pdfgenerator');
        $this->load->helper('page');
        $data = array(
            'grant' => $this->model_grant->getGrantFull($id_grant, $this->sess['id'])
        );
        $html = $this->load->view('grant/pdf', $data, true);
        if ($this->pdfgenerator->generate($html,'proposal_'. $id_grant)){
            echo json_encode(
                array('status'=> 1, 'name_file' => 'proposal_'. $id_grant.'')
            );
        }else{
            echo json_encode(
                array('status'=> 0)
            );
        }
    }

    public function download($filename){
        $this->load->helper('download');
        force_download('./document/pdf/'.$filename.'.pdf', NULL);
    }
}