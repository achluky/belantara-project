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
        $this->load->helper('page');
        $profil = $this->model_profil->get($this->sess['id']);
        if ($profil == NULL) {
           $id_biodata = 0;
        } else {
            $id_biodata = $profil->id_biodata;
        }
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Propsal' => base_url() . ''
            ),
            'error_msg' => '',
            'profil' => $profil,
            'grant' => $this->model_grant->grant($id_biodata),
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

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_6.tpl');
        }
    }

    // edit
    public function edit($level, $id_grant, $action = NULL){
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
                'grant' => $this->model_grant->get_grant($id_grant),
                'document' => $this->model_grant->get_document($id_grant),
                'portofolio' => $this->model_grant->get_portofolio($id_grant),
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
                        redirect('grant/aplikasi/edit/2/'.$id_grant.'?n=' . $alert, 'refresh');
                    } else { 
                        $alert = url_title("Data Gagal Diupdate");
                        redirect('grant/aplikasi/edit/1/'.$id_grant.'?n=' . $alert, 'refresh');
                    }
                } else {
                    $data['error_msg']  = "Proposal belum dibuat"; 
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_1_edit.tpl');
        }
        if ($level == 2) {
            $profil = $this->model_profil->get($this->sess['id']);
            $grant_proyek = $this->model_grant->get_poyek($id_grant);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant_proyek' => $grant_proyek,
                'proyek_kategori_kegiatan' => $this->model_grant->proyek_kategori_kegiatan($grant_proyek->id_proyek),
                'proyek_tematik_kegiatan' => $this->model_grant->proyek_tematik_kegiatan($grant_proyek->id_proyek),
                'kategori_kegiatan' => $this->model_grant->kategori_kegiatan(),
                'tematik_kegiatan' => $this->model_grant->tematik_kegiatan(),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                if ($_POST['id_grant'] != NULL and $_POST['id_grant'] != '') {
                    $id_grant = $_POST['id_grant'];
                    unset($_POST['id_grant']);
                    if($this->model_grant->update_grant_proyek($_POST, $id_grant)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/edit/3/'.$id_grant.'?n=' . $alert, 'refresh');
                    } else { 
                        $alert = url_title("Data Gagal Diupdate");
                        redirect('grant/aplikasi/edit/3/'.$id_grant.'?n=' . $alert, 'refresh');
                    }
                } else {
                    $data['error_msg']  = "Proposal belum dibuat"; 
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_2_edit.tpl');
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
                'grant_risalah' => $this->model_grant->get_risalah($id_grant),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                if ($_POST['id_grant'] != NULL and $_POST['id_grant'] != '') {
                    $id_grant = $_POST['id_grant'];
                    unset($_POST['id_grant']);
                    if($this->model_grant->update_grant_risalah($_POST, $id_grant)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/edit/4/'.$id_grant.'?n=' . $alert, 'refresh');
                    } else { 
                        $alert = url_title("Data Gagal Diupdate");
                        redirect('grant/aplikasi/edit/4/'.$id_grant.'?n=' . $alert, 'refresh');
                    }
                } else {
                    $data['error_msg']  = "Proposal belum dibuat"; 
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_3_edit.tpl');
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
                'id_grant' => $id_grant,
                'grant_indikator' => $this->model_grant->get_grant_indikator($id_grant),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {

                if ($_POST['id_grant'] != NULL and $_POST['id_grant'] != '') {
                    $id_grant = $_POST['id_grant'];
                    unset($_POST['id_grant']);
                    if($this->model_grant->update_grant_indikator($_POST, $id_grant)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/edit/5/'.$id_grant.'?n=' . $alert, 'refresh');
                    } else { 
                        $alert = url_title("Data Gagal Diupdate");
                        redirect('grant/aplikasi/edit/5/'.$id_grant.'?n=' . $alert, 'refresh');
                    }
                } else {
                    $data['error_msg']  = "Proposal belum dibuat"; 
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_4_edit.tpl');
        }
        if ($level == 5) {
            $profil = $this->model_profil->get($this->sess['id']);
            $grant_kegiatan_dana = $this->model_grant->get_grant_kegiatan_dana($id_grant);
            $data = array(
                'url' => $this->url,
                'alert' => isset($_GET['n']) ? $_GET['n'] : '',
                'breadcrumb' => array(
                    'Dashboard' => base_url() . 'admin',
                    'Proposal' => base_url() . ''
                ),
                'error_msg' => '',
                'profil' => $profil,
                'grant_kegiatan_dana'=> $grant_kegiatan_dana,
                'grant_kegiatan_dana_lanjut' => $this->model_grant->get_grant_kegiatan_dana_lanjut($grant_kegiatan_dana->id_kegiatan_dana),
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );

            if ($action == 'save') {
                if ($_POST['id_grant'] != NULL and $_POST['id_grant'] != '') {
                    $id_grant = $_POST['id_grant'];
                    $id_kegiatan_dana = $_POST['id_kegiatan_dana'];
                    unset($_POST['id_grant']);
                    unset($_POST['id_kegiatan_dana']);
                    if($this->model_grant->update_grant_kegiatan_dana($_POST, $id_grant, $id_kegiatan_dana)){
                        $alert = url_title("Data Berhasil Diupdate");
                        redirect('grant/aplikasi/edit/6/'.$id_grant.'?n=' . $alert, 'refresh');
                    } else { 
                        $alert = url_title("Data Gagal Diupdate");
                        redirect('grant/aplikasi/edit/6/'.$id_grant.'?n=' . $alert, 'refresh');
                    }
                } else {
                    $data['error_msg']  = "Proposal belum dibuat"; 
                }
            } 

            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_5_edit.tpl');
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
                'grant' => $this->model_grant->persent_grant($id_grant, 'grant'),
                'grant_proyek' => $this->model_grant->persent_grant($id_grant, 'grant_proyek'),
                'grant_risalah' => $this->model_grant->persent_grant($id_grant, 'grant_risalah'),
                'grant_indikator' => $this->model_grant->persent_grant($id_grant, 'grant_indikator'),
                'grant_kegiatan_dana' => $this->model_grant->persent_grant($id_grant, 'grant_kegiatan_dana'),
                'id_grant' => $id_grant,
                'title' => 'Profil <small> Grant</small>',
                'session' => $this->sess['username'],
                'name' => $this->sess['name'],
                'last_login' => $this->sess['last_login']
            );
            $this->smartyci->assign('data', $data);
            $this->smartyci->display('grant/grant_6_edit.tpl');
        }
    }

    public function upload_doc(){
        $status = "";
        $msg = "";
        $file_element_name = 'file';
        if ($status != "error")
        {
            $config['upload_path'] = './document/doc/';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $status = "success";
                $msg = "File successfully uploaded";
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function save(){
        if ($this->model_grant->save_app_aplication()) {
            $alert = url_title("Proses Penyimpanan atau Pengiriman Sukses !");
            redirect('/grant/aplikasi/?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("Proses Penyimpanan atau Pengiriman failed !");
            redirect('/grant/aplikasi/create/6/n=' . $alert, 'refresh');
        }
    }

    public function update($id_grant, $id_biodata){
        $this->model_grant->update_app_aplication($id_grant, $id_biodata);
    }

}







