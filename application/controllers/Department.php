<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department extends CI_Controller {

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
        $this->navbar->setMenuActive('faculties');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_department');
        $this->load->model('model_department');
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
                'Department list' => base_url() . 'department'
            ),
            'department_list' => $this->model_department->get_listdepartment(),
            'title' => 'Department <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/Department.tpl');
    }

    public function add($id_faculty) {
        $data = array(
            'id_faculty'=>$id_faculty,
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'department list' => base_url() . 'department'
            ),
            'title' => 'department <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/department_add.tpl');
    }

    public function edit($id_faculty,$id_department) {
        $data = array(
            'id_faculty'=>$id_faculty,
            'id_department'=>$id_department,
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Department list' => base_url() . 'department',
                'department' => base_url()
            ),
            'department' => $this->model_department->get_department_by_id($id_department),
            'title' => 'department <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/department_edit.tpl');
    }

    public function update() {
        $id_faculty = $this->input->post('id_faculty');
        $id_department = $this->input->post('id_department');
        $config ['upload_path'] = "../ipb/media/images/department/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-department";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        $file_image = $_FILES['image'];
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('faculties/detail/'.$id_faculty.'?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'title_ID' => $this->input->post('title_ID'),
                    'title_EN' => $this->input->post('title_EN'),
                    'content_ID' => $this->input->post('content_ID'),
                    'content_EN' => $this->input->post('content_EN'),
                    'content_division_ID' => $this->input->post('content_division_ID'),
                    'content_division_EN' => $this->input->post('content_division_EN'),
                    'address' => $this->input->post('address'),
                    'id_faculty' => $this->input->post('id_faculty'),
                    'photo'=>$this->upload->file_name,
                    'uri'=>$this->input->post('uri'),
                );
                
                if ($this->model_department->update_department($id_department,$data)) {
                    $alert = url_title("Edit succses !");
                    redirect('department/edit/'.$id_faculty.'/'.$id_department.'?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Edit failed !");
                    redirect('department/edit/'.$id_faculty.'/'.$id_department.'?n=' . $alert, 'refresh');
                }
            }
        } else {
            $data = array(
                'title_ID' => $this->input->post('title_ID'),
                'title_EN' => $this->input->post('title_EN'),
                'content_ID' => $this->input->post('content_ID'),
                'content_EN' => $this->input->post('content_EN'),
                'content_division_ID' => $this->input->post('content_division_ID'),
                'content_division_EN' => $this->input->post('content_division_EN'),
                'address' => $this->input->post('address'),
                'id_faculty' => $this->input->post('id_faculty'),
                'photo'=>$this->input->post('image'),
                'uri'=>$this->input->post('uri'),
            );
            
            if ($this->model_department->update_department($id_department,$data)) {
                $alert = url_title("Edit succses !");
                 redirect('department/edit/'.$id_faculty.'/'.$id_department.'?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("Edit failed !");
                redirect('department/edit/'.$id_faculty.'/'.$id_department.'?n=' . $alert, 'refresh');
            }
        }
    }

    public function delete($id_faculty = NUll,$id_department=NUll) {
        $data = array(
            'url' => $this->url,
            'id_department' => $id_department,
            'id_faculty'=>$id_faculty,
            'alert' => "Anda yakin akan menghapus data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'department list' => base_url() . 'department'
            ),
            'title' => 'Department <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            if ($this->model_department->delete_department($id_department)) {
                $alert = url_title("delete succses !");
                redirect('faculties/detail/'.$id_faculty.'?n=' . $alert, 'refresh');
            }
        }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/department_delete.tpl');
    }

    public function save() {
        $config ['upload_path'] = "../ipb/media/images/department/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-department";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('faculties/detail/'.$this->input->post('id_faculty').'?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'title_ID' => $this->input->post('title_ID'),
                    'title_EN' => $this->input->post('title_EN'),
                    'content_ID' => $this->input->post('content_ID'),
                    'content_EN' => $this->input->post('content_EN'),
                    'content_division_ID' => $this->input->post('content_division_ID'),
                    'content_division_EN' => $this->input->post('content_division_EN'),
                    'address' => $this->input->post('address'),
                    'id_faculty' => $this->input->post('id_faculty'),
                    'photo'=>$this->upload->file_name,
                    'uri'=>$this->input->post('uri'),
                );
                
                if ($this->model_department->save_department($data)) {
                    $alert = url_title("Add succses !");
                    redirect('faculties/detail/'.$this->input->post('id_faculty').'?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Add failed !");
                    redirect('department/add/'.$this->input->post('id_faculty').'?n=' . $alert, 'refresh');
                }
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
                'department list' => base_url() . 'department',
                'department' => base_url()
            ),
            'title' => 'department <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $data['department'] = $this->model_department->get_department_by_id($id);
        $data['department'] = $this->model_department->get_department_by_id_faculty($data['department']->id);

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/department_details.tpl');
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
