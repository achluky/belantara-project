<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Campus extends CI_Controller {

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
        $this->navbar->setMenuActive('campuss');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_campus');
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
                'Campus list' => base_url() . 'campus'
            ),
            'campus_list' => $this->model_campus->get_listcampus(),
            'title' => 'Campus <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/campus.tpl');
    }
	
	public function add() {
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Campus list' => base_url() . 'campus'
            ),
            'title' => 'Campus <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/campus_add.tpl');
    }
	
	public function save() {
				
        $config ['upload_path'] = "../ipb/media/images/campus/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('nama')))."-campus";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur
		
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('campus/?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'nama_en' => $this->input->post('nama_en'),
                    'alamat' => $this->input->post('alamat'),
                    'alamat_en' => $this->input->post('alamat_en'),
                    'isi' => $this->input->post('isi'),
                    'isi_en' => $this->input->post('isi_en'),
                    'photo'=>$this->upload->file_name,
                );
                
                if ($this->model_campus->save_campus($data)) {
                    $alert = url_title("Add succses !");
                    redirect('campus/?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Add failed !");
                    redirect('campus/add/?n=' . $alert, 'refresh');
                }
            }
        }
    }
	
	public function edit($id) {
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'campus list' => base_url() . 'campus',
                'campus' => base_url()
            ),
            'campus' => $this->model_campus->get_campus_by_id($id),
            'title' => 'Campus <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/campus_edit.tpl');
    }
	
	public function update() {
        $id = $this->input->post('id');
        $config ['upload_path'] = "../ipb/media/images/campus/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('nama')))."-campus";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        $file_image = $_FILES['image'];
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('campus/?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'nama_en' => $this->input->post('nama_en'),
                    'alamat' => $this->input->post('alamat'),
                    'alamat_en' => $this->input->post('alamat_en'),
                    'isi' => $this->input->post('isi'),
                    'isi_en' => $this->input->post('isi_en'),
                    'photo'=>$this->upload->file_name,
                );
                if ($this->model_campus->update_campus($id,$data)) {
                    $alert = url_title("Edit succses !");
                    redirect('campus/edit/'.$id.'?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Edit failed !");
                    redirect('campus/edit/?n=' . $alert, 'refresh');
                }
            }
        } else {
            $data = array(
				'nama' => $this->input->post('nama'),
				'nama_en' => $this->input->post('nama_en'),
				'alamat' => $this->input->post('alamat'),
				'alamat_en' => $this->input->post('alamat_en'),
				'isi' => $this->input->post('isi'),
				'isi_en' => $this->input->post('isi_en'),
                'photo'=>$this->input->post('image'),
            );
            
            if ($this->model_campus->update_campus($id,$data)) {
                $alert = url_title("Edit succses !");
                redirect('campus/edit/'.$id.'?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("Edit failed !");
                redirect('campus/edit/?n=' . $alert, 'refresh');
            }
        }
    }
	
	public function detail($id){
         $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Campus list' => base_url() . 'campus',
                'campus' => base_url()
            ),
            'title' => 'Campus <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $data['campus'] = $this->model_campus->get_campus_by_id($id);

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/campus_details.tpl');
    }
	
	public function delete($id = NUll) {
        $data = array(
            'url' => $this->url,
            'id_campus' => $id,
            'alert' => "Anda yakin akan menghapus data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'campus list' => base_url() . 'campus'
            ),
            'title' => 'Campus <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            if ($this->model_campus->delete_campus($id)) {
                $alert = url_title("delete succses !");
                redirect('campus/?n=' . $alert, 'refresh');
            }
        }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/campus_delete.tpl');
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
