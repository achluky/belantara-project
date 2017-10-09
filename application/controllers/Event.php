<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
        $this->navbar->setMenuActive('event');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $this->load->model('model_event');

        if ($this->session->userdata('site_lang')=='EN') {
            $this->url = str_replace('EN', 'ID', current_url());
        }
        if ($this->session->userdata('site_lang')=='ID') {
            $this->url = str_replace('ID', 'EN', current_url());
        }

        $this->load->helper(array('xml'));
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index() {
        $this->navbar->setSubMenuActive('list');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Event list' => base_url() . 'event'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
                'tabel_start' => $this->lang->line('label.tabel_date_start'),
                'tabel_end' => $this->lang->line('label.tabel_date_end'),
                'tabel_lang' => $this->lang->line('label.tabel.lang'),
                'tabel_edit' => $this->lang->line('label.tabel.edit'),
                'tabel_delete' => $this->lang->line('label.tabel.delete'),
                'table_action' => $this->lang->line('label.tabel.action'),
            ),
            'event_list' => $this->model_event->get_listevent(),
            'title' => 'Event <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/event.tpl');
    }

    public function add() {
        $this->navbar->setSubMenuActive('add');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Event list' => base_url() . 'event'
            ),
            'last_login' => $this->sess['last_login'],
            'title' => 'Event <small>management</small>',
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/event_add.tpl');
    }

    public function edit($id_bahasa, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Event list' => base_url() . 'event',
                'Event' => base_url()
            ),
            'event' => $this->model_event->get_news($id, $id_bahasa),
            'title' => 'News <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/event_edit.tpl');
    }

    public function update() {
        $id = $this->input->post('id');
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "../ipb/media/images/event/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('judul')))."-event";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('event/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'waktu' => $this->input->post('waktu'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'judul' => $this->input->post('judul'),
                    'keyword' => $this->input->post('keyword'),
                    'prioritas' => 1,
                );
                
                if ($this->model_event->update_event($data, $this->upload->file_name, $this->input->post('id_bahasa'))){
                    $alert = url_title("update succses !");
                    redirect('event/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                } else {
                $alert = url_title("update failed !");
                redirect('event/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                }
            }
        } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'waktu' => $this->input->post('waktu'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'judul' => $this->input->post('judul'),
                    'keyword' => $this->input->post('keyword')
                );
            
            if ($this->model_event->update_event($data, $this->input->post('image'), $this->input->post('id_bahasa'))) {
                $alert = url_title("update succses !");
                redirect('event/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("update failed !");
                redirect('event/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            }
        }
    }

    public function delete($id) {
        $data = array(
            'url' => $this->url,
            'id_event' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Event list' => base_url() . 'event'
            ),
            'title' => 'Event <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_event->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('event/?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/event_delete.tpl');
    }

    public function save() {
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "../ipb/media/images/event/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('judul_id')))."-event";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (($this->input->post('isi_en') != NULL) and ( $this->input->post('isi_id') != NULL)) {
            if (isset($file_image['name']) and $file_image['name'] != '') {
                if (!$this->upload->do_upload('image')) {
                    $alert = $this->upload->display_errors();
                    redirect('event/add?n=' . $alert, 'refresh');
                } else {
                    $data = array(
                    'judul_en' => $this->input->post('judul_en'),
                    'judul_id' => $this->input->post('judul_id'),
                    'ringkasan_en' => $this->input->post('ringkasan_en'),
                    'ringkasan_id' => $this->input->post('ringkasan_id'),
                    'isi_en' => $this->input->post('isi_en'),
                    'isi_id' => $this->input->post('isi_id'),
                    'waktu' => $this->input->post('waktu'),
                    'keyword_id' => $this->input->post('keyword_id'),
                    'keyword_en' => $this->input->post('keyword_en'),
                    'prioritas' => 1,
                    );

                    if ($this->model_event->save_event($data, $this->upload->file_name)) {
                        $alert = url_title("Save succses !");
                        redirect('event?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Save failde !");
                        redirect('event/add' . $alert, 'refresh');
                    }
                }
            } else {
                $alert = url_title("File Not Found !");
                redirect('event/add?n=' . $alert, 'refresh');
            }
        } else {
            $alert = url_title("Isi empty !");
            redirect('event/add?n=' . $alert, 'refresh');
        }
    }
    public function post($id_bahasa, $year, $month, $title, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Event list' => base_url() . 'event',
                $this->model_event->get_news($id)->judul => base_url()
            ),
            'event' => $this->model_event->get_news($id, $id_bahasa),
            'title' => $this->model_event->get_news($id)->judul,
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/post_event.tpl');
    }

    public function rss() {
        $data['feed_name'] = 'Bogor Agricultural University';
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://ipb.ac.id/rss';
        $data['page_language'] = 'en';
        $data['page_description'] = 'Bogor Agricultural University';
        $data['creator_email'] = 'humas@ipb.ac.id';
        $data['event'] = $this->model_event->get_feeds();
        
        header('Content-type: application/xml; charset="ISO-8859-1"',true);
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('frontend/feed_event.tpl');
    }
    
    public function sitemap(){
        $data['event'] = $this->model_event->get_feeds();
        header('Content-type: application/xml; charset="ISO-8859-1"',true);
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('frontend/sitemap_event.tpl');
    }

}
