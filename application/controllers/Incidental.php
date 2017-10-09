<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Incidental extends CI_Controller {

    public $url;
    public $sess;
    public function __construct() {
        parent::__construct();
        //cek session login
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('incidental');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
		$this->load->model('model_incidental');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index() {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Incidental list' => base_url() . 'Incidental'
            ),
            'label' => array(
                'content_text_id' => $this->lang->line('label.tabel.content_text_id'),
                'link' => $this->lang->line('label.tabel.link'),
                'active' => $this->lang->line('label.tabel.active'),
                'tabel_edit' => $this->lang->line('label.tabel.edit'),
                'tabel_delete' => $this->lang->line('label.tabel.delete'),
                'table_action' => $this->lang->line('label.tabel.action'),
            ),
            'incidental_list' => $this->model_incidental->get_listincidental(),
            'title' => 'Incidental <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/incidental.tpl');
    }

    public function add() {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Add Incidental' => base_url() . 'insidental'
            ),
            'title' => 'Incidental <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/incidental_add.tpl');
    }

    public function edit($id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Incidental list' => base_url() . 'incidental',
                'Incidental' => base_url()
            ),
            'incidental' => $this->model_incidental->get_incidental($id),
            'label' => array(
                'content_text_id' => $this->lang->line('label.tabel.content_text_id'),
                'content_text_en' => $this->lang->line('label.tabel.content_text_id'),
                'link' => $this->lang->line('label.tabel.link'),
                'active' => $this->lang->line('label.tabel.active'),
                'tabel_edit' => $this->lang->line('label.tabel.edit'),
                'tabel_delete' => $this->lang->line('label.tabel.delete'),
                'table_action' => $this->lang->line('label.tabel.action'),
            ),
            'title' => 'Incidental <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/incidental_edit.tpl');
    }

    public function update() {
        $data = array(
            'id' => $this->input->post('id'),
            'content_text_id' => $this->input->post('content_text_id'),
            'content_text_en' => $this->input->post('content_text_en'),
            'image_icon' => $this->input->post('image_icon'),
            'link' => $this->input->post('link'),
            'aktif' => $this->input->post('aktif')
        );
        if ($this->model_incidental->update_incidental($data)) {
            $alert = url_title("update succses !");
            redirect('incidental/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
        }
    }

    public function delete($id) {
        $data = array(
            'url' => $this->url,
            'id_incidental' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Incidental list' => base_url() . 'incidental'
            ),
            'title' => 'Incidental <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_incidental->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('incidental/?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/incidental_delete.tpl');
    }

    public function save() {
        $data = array(
            'content_text_id' => $this->input->post('content_text_id'),
            'content_text_en' => $this->input->post('content_text_en'),
            'image_icon' => $this->input->post('image_icon'),
            'link' => $this->input->post('link'),
            'aktif' => $this->input->post('aktif')
        );
        if ($this->model_incidental->save_incidental($data)) {
            $alert = url_title("update succses !");
            redirect('incidental/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
        }
    }

}
