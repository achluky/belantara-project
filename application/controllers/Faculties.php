<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faculties extends CI_Controller {

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
        $this->load->model('model_faculties');
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
                'Faculties list' => base_url() . 'faculties'
            ),
            'faculties_list' => $this->model_faculties->get_listfaculties(),
            'title' => 'Faculties <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/faculties.tpl');
    }

    public function add() {
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Faculties list' => base_url() . 'faculties'
            ),
            'title' => 'Faculties <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/faculties_add.tpl');
    }

    public function edit($id) {
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Faculties list' => base_url() . 'faculties',
                'faculties' => base_url()
            ),
            'faculties' => $this->model_faculties->get_faculties_by_id($id),
            'title' => 'Faculties <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/faculties_edit.tpl');
    }

    public function update() {
        $id = $this->input->post('id');
        $config ['upload_path'] = "../ipb/media/images/faculty/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-faculty";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('faculties/?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'title_ID' => $this->input->post('title_ID'),
                    'title_EN' => $this->input->post('title_EN'),
                    'content_ID' => $this->input->post('content_ID'),
                    'content_EN' => $this->input->post('content_EN'),
                    'content_background_ID' => $this->input->post('content_background_ID'),
                    'content_background_EN' => $this->input->post('content_background_EN'),
                    'content_competence_ID' => $this->input->post('content_competence_ID'),
                    'content_competence_EN' => $this->input->post('content_competence_EN'),
                    'content_quality_ID' => $this->input->post('content_quality_ID'),
                    'content_quality_EN' => $this->input->post('content_quality_EN'),
                    'content_education_ID' => $this->input->post('content_education_ID'),
                    'content_education_EN' => $this->input->post('content_education_EN'),
                    'content_facilities_ID' => $this->input->post('content_facilities_ID'),
                    'content_facilities_EN' => $this->input->post('content_facilities_EN'),
                    'content_research_ID' => $this->input->post('content_research_ID'),
                    'content_research_EN' => $this->input->post('content_research_EN'),
                    'address' => $this->input->post('address'),
                    'code' => $this->input->post('code'),
                    'singkatan'=> $this->input->post('singkatan'),
                    'photo'=>$this->upload->file_name,
                    'uri'=>$this->input->post('uri'),
                );
                
                if ($this->model_faculties->update_faculties($id,$data)) {
                    $alert = url_title("Edit succses !");
                    redirect('faculties/edit/'. $id .'?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Edit failed !");
                    redirect('faculties/edit/?n=' . $alert, 'refresh');
                }
            }
        } else {
            $data = array(
                'title_ID' => $this->input->post('title_ID'),
                'title_EN' => $this->input->post('title_EN'),
                'content_ID' => $this->input->post('content_ID'),
                'content_EN' => $this->input->post('content_EN'),
                'content_background_ID' => $this->input->post('content_background_ID'),
                'content_background_EN' => $this->input->post('content_background_EN'),
                'content_competence_ID' => $this->input->post('content_competence_ID'),
                'content_competence_EN' => $this->input->post('content_competence_EN'),
                'content_quality_ID' => $this->input->post('content_quality_ID'),
                'content_quality_EN' => $this->input->post('content_quality_EN'),
                'content_education_ID' => $this->input->post('content_education_ID'),
                'content_education_EN' => $this->input->post('content_education_EN'),
                'content_facilities_ID' => $this->input->post('content_facilities_ID'),
                'content_facilities_EN' => $this->input->post('content_facilities_EN'),
                'content_research_ID' => $this->input->post('content_research_ID'),
                'content_research_EN' => $this->input->post('content_research_EN'),
                'address' => $this->input->post('address'),
                'code' => $this->input->post('code'),
                'singkatan'=> $this->input->post('singkatan'),
                'photo'=>$this->input->post('image'),
                'uri'=>$this->input->post('uri'),
            );
            
            if ($this->model_faculties->update_faculties($id,$data)) {
                $alert = url_title("Edit succses !");
                redirect('faculties/edit/'. $id .'?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("Edit failed !");
                redirect('faculties/edit/?n=' . $alert, 'refresh');
            }
        }
    }

    public function delete($id = NUll) {
        $data = array(
            'url' => $this->url,
            'id_faculties' => $id,
            'alert' => "Anda yakin akan menghapus data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'fakultas list' => base_url() . 'faculties'
            ),
            'title' => 'Fakultas <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            if ($this->model_faculties->delete_faculties($id)) {
                $alert = url_title("delete succses !");
                redirect('faculties/?n=' . $alert, 'refresh');
            }
        }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/faculties_delete.tpl');
    }

    public function save() {
        $config ['upload_path'] = "../ipb/media/images/faculty/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-faculty";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('faculties/?n=' .$alert, 'refresh');
            } else {
                $data = array(
                    'title_ID' => $this->input->post('title_ID'),
                    'title_EN' => $this->input->post('title_EN'),
                    'content_ID' => $this->input->post('content_ID'),
                    'content_EN' => $this->input->post('content_EN'),
                    'content_background_ID' => $this->input->post('content_background_ID'),
                    'content_background_EN' => $this->input->post('content_background_EN'),
                    'content_competence_ID' => $this->input->post('content_competence_ID'),
                    'content_competence_EN' => $this->input->post('content_competence_EN'),
                    'content_quality_ID' => $this->input->post('content_quality_ID'),
                    'content_quality_EN' => $this->input->post('content_quality_EN'),
                    'content_education_ID' => $this->input->post('content_education_ID'),
                    'content_education_EN' => $this->input->post('content_education_EN'),
                    'content_facilities_ID' => $this->input->post('content_facilities_ID'),
                    'content_facilities_EN' => $this->input->post('content_facilities_EN'),
                    'content_research_ID' => $this->input->post('content_research_ID'),
                    'content_research_EN' => $this->input->post('content_research_EN'),
                    'address' => $this->input->post('address'),
                    'code' => $this->input->post('code'),
                    'singkatan'=> $this->input->post('singkatan'),
                    'photo'=>$this->upload->file_name,
                    'uri'=>$this->input->post('uri'),
                );
                
                if ($this->model_faculties->save_faculties($data)) {
                    $alert = url_title("Add succses !");
                    redirect('faculties/?n=' . $alert, 'refresh');
                } else {
                    $alert = url_title("Add failed !");
                    redirect('faculties/add/?n=' . $alert, 'refresh');
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
                'Faculties list' => base_url() . 'faculties',
                'faculties' => base_url()
            ),
            'title' => 'Faculties <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $data['faculties'] = $this->model_faculties->get_faculties_by_id($id);
        $data['department'] = $this->model_department->get_department_by_id_faculty($data['faculties']->id);

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/faculties_details.tpl');
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
