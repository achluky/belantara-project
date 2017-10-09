<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reputation extends CI_Controller {

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
        $this->navbar->setMenuActive('reputation');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_reputation');

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
                'Reputation list' => base_url() . 'reputation'
            ),
            'reputation_list' => $this->model_reputation->get_listreputation(),
            'title' => 'Reputation <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/reputation.tpl');
    }

    public function add() {
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Reputation list' => base_url() . 'reputation'
            ),
            'title' => 'Reputation <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/reputation_add.tpl');
    }

    public function edit($id) {
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Reputation list' => base_url() . 'reputation',
                'Reputation' => base_url()
            ),
            'reputation' => $this->model_reputation->get_reputation_by_id($id),
            'title' => 'Reputation <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/reputation_edit.tpl');
    }

    public function update() {
        $id = $this->input->post('id');
        $config ['upload_path'] = "../ipb/media/images/reputation/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-reputation";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        $file_image = $_FILES['image'];
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('reputation/?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'title_ID' => $this->input->post('title_ID'),
                    'title_EN' => $this->input->post('title_EN'),
                    'content_ID' => $this->input->post('content_ID'),
                    'content_EN' => $this->input->post('content_EN'),
                    'keyword_ID' => $this->input->post('content_ID'),
                    'keyword_EN' => $this->input->post('content_EN'),
                    'photo'=>$this->upload->file_name,
                    //'uri'=>$this->input->post('uri'),
                );
                
                if ($this->model_reputation->update_reputation($id,$data)) {
                    $alert = url_title("Edit succses !");
                    redirect('reputation/edit/'.$id.'?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Edit failed !");
                    redirect('reputation/edit/'.$id.'?n=' . $alert, 'refresh');
                }
            }
        } else {
            $data = array(
                'title_ID' => $this->input->post('title_ID'),
                'title_EN' => $this->input->post('title_EN'),
                'content_ID' => $this->input->post('content_ID'),
                'content_EN' => $this->input->post('content_EN'),
                'keyword_ID' => $this->input->post('content_ID'),
                'keyword_EN' => $this->input->post('content_EN'),
                'photo'=>$this->input->post('image'),
                //'uri'=>$this->input->post('uri'),
            );
            
            if ($this->model_reputation->update_reputation($id,$data)) {
                $alert = url_title("Edit succses !");
                redirect('reputation/edit/'.$id.'?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("Edit failed !");
                redirect('reputation/edit/'.$id.'?n=' . $alert, 'refresh');
            }
        }
    }

    public function delete($id = NUll) {
        $data = array(
            'url' => $this->url,
            'id_reputation' => $id,
            'alert' => "Anda yakin akan menghapus data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Reputation list' => base_url() . 'reputation'
            ),
            'title' => 'Reputation <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            if ($this->model_reputation->delete_reputation($id)) {
                $alert = url_title("delete succses !");
                redirect('reputation/?n=' . $alert, 'refresh');
            }
        }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/reputation_delete.tpl');
    }

    public function save() {
        $config ['upload_path'] = "../ipb/media/images/reputation/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-reputation";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('reputation/?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'title_ID' => $this->input->post('title_ID'),
                    'title_EN' => $this->input->post('title_EN'),
                    'content_ID' => $this->input->post('content_ID'),
                    'content_EN' => $this->input->post('content_EN'),
                    'keyword_ID' => $this->input->post('keyword_ID'),
                    'keyword_EN' => $this->input->post('keyword_EN'),
                    'photo'=>$this->upload->file_name,
                );
                
                if ($this->model_reputation->save_reputation($data)) {
                    $alert = url_title("Add succses !");
                    redirect('reputation/?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Add failed !");
                    redirect('reputation/add/?n=' . $alert, 'refresh');
                }
            }
        }
    }

}
