<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        //cek session login
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('navbar');
        $this->load->library('upload');
        $this->navbar->setMenuActive('media');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $this->load->model('model_media', 'media');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }

    // public function index() {
    //     $limit = 20;
    //     if (isset($_GET['p']) and $_GET['p'] != NULL) {
    //         $offset = $_GET['p'];
    //     } else {
    //         $offset = 0;
    //     }
    //     $data = array(
    //         'limit' => $limit,
    //         'page' => $offset,
    //         'url' => $this->url,
    //         'alert' => isset($_GET['n']) ? $_GET['n'] : '',
    //         'breadcrumb' => array(
    //             'Dashboard' => base_url() . 'admin',
    //             'Media list' => base_url() . 'Media'
    //         ),
    //         'media_list' => $this->media->get_listmedia($offset, $limit),
    //         'title' => 'Media <small>management</small>',
    //         'last_login' => $this->sess['last_login'],
    //         'session' => $this->sess['username']
    //     );

    //     $this->smartyci->assign('data', $data);
    //     $this->smartyci->display('admin/media.tpl');
    // }
    
    public function photo() {
        $limit = 20;
        if (isset($_GET['p']) and $_GET['p'] != NULL) {
            $offset = $_GET['p'];
        } else {
            $offset = 0;
        }
        $data = array(
            'limit' => $limit,
            'page' => $offset,
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Media list' => base_url() . 'Media'
            ),
            'media_list'=> $this->media->get_list_media_by_group_by_type($offset,$limit,'image'),
            'title' => 'Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/media_photo.tpl');
    }

    public function pdf() {
        $limit = 20;
        if (isset($_GET['p']) and $_GET['p'] != NULL) {
            $offset = $_GET['p'];
        } else {
            $offset = 0;
        }
        $data = array(
            'limit' => $limit,
            'page' => $offset,
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Media list' => base_url() . 'Media'
            ),
            'media_list'=> $this->media->get_list_media_by_group_by_type($offset,$limit,'pdf'),
            'title' => 'Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/media_pdf.tpl');
    }

    public function add_photo() {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Media list' => base_url() . 'Media'
            ),
            'title' => 'Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/media_add_photo.tpl');
    }

    public function add_pdf() {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Media list' => base_url() . 'Media'
            ),
            'title' => 'Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/media_add_pdf.tpl');
    }


    public function insert_photo() {
        $config ['upload_path'] = "../ipb/media/images/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = slug($this->input->post('title'));
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('media/add_photo/?n=' . $alert, 'refresh');
            } else {
                $identitas_photo = $this->upload->data();
                $data = array(
                    'type' => 'image',
                    'format' => ltrim($identitas_photo['file_ext'],'.'),
                    'width' => $identitas_photo['image_width'],
                    'height' => $identitas_photo['image_height'],
                    'title' => $this->input->post('title'),
                    'description' => "",
                    'credit' => "",
                    'owner_id' => '19',
                    'view_is_secure' => 1, // mendeteksi klo ini upload file dengan panel backend.ipb.ac.id
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'slug' => slug($this->input->post('title'))
                );
                if ($this->media->insert($data)) {
                    $alert = url_title("Add succses !");
                    redirect('media/photo?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Add faild !");
                    redirect('media/add_photo/?n=' . $alert, 'refresh');
                }
            }
        }
    }

    public function insert_pdf() {
        $config ['upload_path'] = "../ipb/ipb/document/pdf/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'PDF|pdf'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = slug($this->input->post('title'));
        $config ['max_size'] = '10000';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('media/add_pdf/?n=' . $alert, 'refresh');
            } else {
                $identitas_pdf = $this->upload->data();
                $data = array(
                    'type' => 'pdf',
                    'format' => 'pdf',
                    'width' => '',
                    'height' => '',
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('deskripsi'),
                    'credit' => "",
                    'owner_id' => '19',
                    'view_is_secure' => 1, // mendeteksi klo ini upload file dengan panel adminjuara.ipb.ac.id
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'slug' => slug($this->input->post('title'))
                );
                if ($this->media->insert($data)) {
                    $alert = url_title("Add succses !");
                    redirect('media/pdf?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Add faild !");
                    redirect('media/add_pdf/?n=' . $alert, 'refresh');
                }
            }
        }
    }

    public function delete_photo($id) {
        $data = array(
            'url' => $this->url,
            'id_media' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Media list' => base_url() . 'media'
            ),
            'get_photo' => $this->media->getById($id),
            'title' => 'Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->media->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('media/photo?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/media_delete_photo.tpl');
    }
    
    public function delete_pdf($id) {
        $data = array(
            'url' => $this->url,
            'id_media' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Media list' => base_url() . 'media'
            ),
            'get_pdf' => $this->media->getById($id),
            'title' => 'Media <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->media->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('media/pdf?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/media_delete_pdf.tpl');
    }
}
