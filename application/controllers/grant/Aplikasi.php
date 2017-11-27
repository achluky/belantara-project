<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('grant');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_grant');
        $this->load->model('model_profil');
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index(){
        $profil = $this->model_profil->get($this->sess['id']);
        $data = array(
            'url' => $this->url,
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Propsal' => base_url() . ''
            ),
            'error_msg' => '',
            'profil' => $profil,
            'grant' => $this->model_grant->grant($profil->id_biodata),
            'title' => 'Proposal <small> Grant</small>',
            'session' => $this->sess['username'],
            'name' => $this->sess['name'],
            'last_login' => $this->sess['last_login'],
            'no' => 1
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('grant/grant.tpl');
    }

    public function create($level, $action=NULL){
        if ($level == 1) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant' => $this->session->userdata('grant'),
                'title' => 'Proposal <small> Grant</small>',
                'session' => $this->sess['username'],
                'session_all' => $_SESSION,
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                $data = array(
                  'pengaju_pejabat_utama' => $_POST['pengaju_pejabat_utama'],
                  'pengaju_pejabat_utama_jabatan' => $_POST['pengaju_pejabat_utama_jabatan'],
                  'pengaju_pejabat_kegiatan' => $_POST['pengaju_pejabat_kegiatan'],
                  'pengaju_pejabat_kegiatan_jabatan' => $_POST['pengaju_pejabat_kegiatan_jabatan'],
                  'id_biodata' => $_POST['id_biodata'],
                  'grant_portofolio' => $_POST['grant_portofolio'],
                  'grant_dokumen' => $_POST['grant_dokumen']
                );
                $this->session->set_userdata('grant', $data);
                redirect('grant/aplikasi/create/2', 'refresh');
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_1.tpl');
        }
        if ($level == 2) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant_proyek' => $this->session->userdata('grant_proyek'),
                'title' => 'Proposal <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                $data = array(
                  'proyek_judul' => $_POST['proyek_judul'],
                  'proyek_lansekap' => $_POST['proyek_lansekap'],
                  'proyek_provinsi' => $_POST['proyek_provinsi'],
                  'proyek_kota' => $_POST['proyek_kota'],
                  'proyek_kecamatan' => $_POST['proyek_kecamatan'],
                  'proyek_desa' => $_POST['proyek_desa'],
                  'proyek_tgl_mulai' => $_POST['proyek_tgl_mulai'],
                  'proyek_durasi' => $_POST['proyek_durasi'],
                  'proyek_manfaat' => $_POST['proyek_manfaat'],
                  'proyek_luas_dampak' => $_POST['proyek_luas_dampak'],
                  'proyek_tematik_kegiatan' => $_POST['proyek_tematik_kegiatan'],
                  'proyek_kategori_kegiatan' => $_POST['proyek_kategori_kegiatan']
                );
                $this->session->set_userdata('grant_proyek', $data);
                redirect('grant/aplikasi/create/3', 'refresh');
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_2.tpl');
        }
        if ($level == 3) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant_risalah' => $this->session->userdata('grant_risalah'),
                'title' => 'Proposal <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                $data = array(
                  'risalah_latar_belakang' => $_POST['risalah_latar_belakang'],
                  'risalah_tujuan' => $_POST['risalah_tujuan'],
                  'risalah_perubahan' => $_POST['risalah_perubahan'],
                  'risalah_metode' => $_POST['risalah_metode']
                );
                $this->session->set_userdata('grant_risalah', $data);
                redirect('grant/aplikasi/create/4', 'refresh');
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_3.tpl');
        }
        if ($level == 4) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant_indikator' => $this->session->userdata('grant_indikator'),
                'title' => 'Proposal <small> Grant</small>',
                'session' => $this->sess['username'],
                'session_all' => $_SESSION,
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {                
                $data = array(
                  'indikator_nama' => $_POST['indikator_nama']
                );
                $this->session->set_userdata('grant_indikator', $data);
                redirect('grant/aplikasi/create/5', 'refresh');
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_4.tpl');
        }
        if ($level == 5) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant_kegiatan_dana' => $this->session->userdata('grant_kegiatan_dana'),
                'title' => 'Proposal <small> Grant</small>',
                'session' => $this->sess['username'],
                'session_all' => $_SESSION,
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {          
                $data = array(
                  'kegiatan_dana_jenis' => $_POST['kegiatan_dana_jenis'],
                  'kegiatan_dana_nama' => $_POST['kegiatan_dana_nama'],
                  'kegiatan_dana_jumlah' => $_POST['kegiatan_dana_jumlah']
                );
                $this->session->set_userdata('grant_kegiatan_dana', $data);
                redirect('grant/aplikasi/create/6', 'refresh');
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_5.tpl');
        }
        if ($level == 6) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'title' => 'Proposal <small> Grant</small>',
                'session' => $this->sess['username'],
                'session_all' => $_SESSION,
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_6.tpl');
        }
    }


    public function upload_doc(){
        var_dump($_FILES);
        /*
        $this->load->library('upload');
        $file_doc = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/images/blog/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-blog";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_doc['name']) and $file_doc['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('adminblog/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'keyword' => $this->input->post('keyword'),
                    'slug' => preg_replace('/[^a-zA-Z0-9 ]/',' ',$this->input->post('judul'))
                );
                
                if ($this->model_blog->update_blog($data, $this->upload->file_name, $this->input->post('id_bahasa'))){
                    $alert = url_title("update succses !");
                    redirect('adminblog/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                } else {
                $alert = url_title("update failed !");
                redirect('adminblog/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                }
            }
        } else {
        }*/
    }

    public function edit($level){
        if ($level == 1) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant' => $this->model_grant->get_grant($profil->id_biodata),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                if ($_POST['id_grant'] != NULL and $_POST['id_grant'] != '') {
                    $id_grant = $_POST['id_grant'];
                    unset($_POST['id_grant']);
                    if($this->model_grant->update_grant($_POST, $id_grant)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $data['error_msg']  = "Data Gagal Diupdate"; 
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                } else {
                    if($this->model_grant->insert_grant($_POST)){
                        $alert = url_title("Data Berhasil Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Data Gagal Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_1.tpl');
        }
        if ($level == 2) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant' => $this->model_grant->get_poyek(4),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {

                if ($_POST['proyek_judul'] != NULL) {
                    $id_biodata = $_POST['id_biodata'];
                    unset($_POST['id_biodata']);
                    if($this->model_grant->update($_POST, $id_biodata)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $data['error_msg']  = "Data Gagal Diupdate"; 
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                } else {
                    if($this->model_grant->insert_grant_proyek($_POST)){
                        $alert = url_title("Data Berhasil Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Data Gagal Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_2.tpl');
        }
        if ($level == 3) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant' => $this->model_grant->get($profil->id_biodata),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                if ($_POST['pengaju_pejabat_utama'] != NULL) {
                    $id_biodata = $_POST['id_biodata'];
                    unset($_POST['id_biodata']);
                    if($this->model_grant->update($_POST, $id_biodata)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $data['error_msg']  = "Data Gagal Diupdate"; 
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                } else {
                    if($this->model_grant->insert($_POST)){
                        $alert = url_title("Data Berhasil Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Data Gagal Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_3.tpl');
        }
        if ($level == 4) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant' => $this->model_grant->get($profil->id_biodata),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                if ($_POST['pengaju_pejabat_utama'] != NULL) {
                    $id_biodata = $_POST['id_biodata'];
                    unset($_POST['id_biodata']);
                    if($this->model_grant->update($_POST, $id_biodata)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $data['error_msg']  = "Data Gagal Diupdate"; 
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                } else {
                    if($this->model_grant->insert($_POST)){
                        $alert = url_title("Data Berhasil Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Data Gagal Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_4.tpl');
        }
        if ($level == 5) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant' => $this->model_grant->get($profil->id_biodata),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                if ($_POST['pengaju_pejabat_utama'] != NULL) {
                    $id_biodata = $_POST['id_biodata'];
                    unset($_POST['id_biodata']);
                    if($this->model_grant->update($_POST, $id_biodata)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $data['error_msg']  = "Data Gagal Diupdate"; 
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                } else {
                    if($this->model_grant->insert($_POST)){
                        $alert = url_title("Data Berhasil Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Data Gagal Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_5.tpl');
        }
        if ($level == 6) {
            $profil = $this->model_profil->get($this->sess['id']);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant' => $this->model_grant->get($profil->id_biodata),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                if ($_POST['pengaju_pejabat_utama'] != NULL) {
                    $id_biodata = $_POST['id_biodata'];
                    unset($_POST['id_biodata']);
                    if($this->model_grant->update($_POST, $id_biodata)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $data['error_msg']  = "Data Gagal Diupdate"; 
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                } else {
                    if($this->model_grant->insert($_POST)){
                        $alert = url_title("Data Berhasil Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Data Gagal Disimpan");
                        redirect('grant/aplikasi/create/2?n=' . $alert, 'refresh');
                    }
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_6.tpl');
        }
    }
}