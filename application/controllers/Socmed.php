<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Socmed extends CI_Controller {

    public $url;
    public $sess;
    public function __construct() {
        parent::__construct();
        //cek session login
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('upload');
        $this->load->library('navbar');
        $this->navbar->setMenuActive('setting');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_socmed');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index() {
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Social media list' => base_url() . 'social media'
            ),
            'socmed_list' => $this->model_socmed->get_listsocmed(),
            'title' => 'Social Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/socmed.tpl');
    }
	
	public function add() {
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Social media list' => base_url() . 'socmed'
            ),
            'title' => 'Social Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/socmed_add.tpl');
    }
	
	public function save() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'link' => $this->input->post('link'),
            'urutan' => $this->input->post('urutan'),
            'icon'=> $this->input->post('icon'),
        );
        
        if ($this->model_socmed->save_socmed($data)) {
            $alert = url_title("Add succses !");
            redirect('socmed/?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("Add failed !");
            redirect('socmed/add/?n=' . $alert, 'refresh');
        }
    }
	
	public function edit($id) {
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Campus list' => base_url() . 'socmed',
                'Social Media' => base_url()
            ),
            'socmed' => $this->model_socmed->get_socmed_by_id($id),
            'title' => 'Social Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/socmed_edit.tpl');
    }
	
	public function update() {
        $id = $this->input->post('id');
        $data = array(
			'nama' => $this->input->post('nama'),
			'link' => $this->input->post('link'),
			'urutan' => $this->input->post('urutan'),
            'icon'=>$this->input->post('icon'),
        );
        
        if ($this->model_socmed->update_socmed($id,$data)) {
            $alert = url_title("Edit succses !");
            redirect('socmed/?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("Edit failed !");
            redirect('socmed/edit/?n=' . $alert, 'refresh');
        }
    }
	
	public function detail($id){
         $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Social media list' => base_url() . 'socmed',
                'social media' => base_url()
            ),
            'title' => 'Social Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $data['socmed'] = $this->model_socmed->get_socmed_by_id($id);

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/socmed_details.tpl');
    }
	
	public function delete($id = NUll) {
        $data = array(
            'url' => $this->url,
            'id_socmed' => $id,
            'alert' => "Anda yakin akan menghapus data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Social media list' => base_url() . 'campus'
            ),
            'title' => 'Social Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            if ($this->model_socmed->delete_socmed($id)) {
                $alert = url_title("delete succses !");
                redirect('socmed/?n=' . $alert, 'refresh');
            }
        }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/socmed_delete.tpl');
    }

    public function rss() {
        $data['feed_name'] = 'Bogor Agricultural University';
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://ipb.ac.id/rss';
        $data['page_language'] = 'en';
        $data['page_description'] = 'Bogor Agricultural University';
        $data['creator_email'] = 'humas@ipb.ac.id';
        $data['announcement'] = $this->model_announcement->get_feeds();
//        print_r($data['announcement']);

        header('Content-type: application/xml; charset="ISO-8859-1"', true);
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/feed_announcement.tpl');
    }

    public function sitemap() {
        $data['announcement'] = $this->model_announcement->get_feeds();
        header('Content-type: application/xml; charset="ISO-8859-1"', true);
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/sitemap_announcement.tpl');
    }

}
