<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Announcement extends CI_Controller {

    public $url;
    public $sess;
    public function __construct() {
        parent::__construct();
        //cek session login
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }

        if ($this->session->userdata('site_lang')=='EN') {
            $this->url = str_replace('EN', 'ID', current_url());
        }
        if ($this->session->userdata('site_lang')=='ID') {
            $this->url = str_replace('ID', 'EN', current_url());
        }

        $this->load->library('upload');
        $this->load->library('navbar');
        $this->navbar->setMenuActive('announcement');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_announcement');

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
                'Announcement list' => base_url() . 'announcement'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
                'tabel_date' => $this->lang->line('label.tabel.date'),
                'tabel_lang' => $this->lang->line('label.tabel.lang'),
                'tabel_edit' => $this->lang->line('label.tabel.edit'),
                'tabel_delete' => $this->lang->line('label.tabel.delete'),
                'table_action' => $this->lang->line('label.tabel.action')
            ),
            'announcement_list' => $this->model_announcement->get_listannouncement(null),
            'title' => 'Announcement <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/announcement.tpl');
    }

    public function announcement_list() {
        $this->navbar->setSubMenuActive('list');
        $list = $this->model_announcement->get_datatables_announcement();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $announcement) {
            $no++;
            $row = array();
            $row[] = $announcement->judul;
            $row[] = $announcement->waktu;
            $row[] = $announcement->id_bahasa;

            //add html for action
            $row[] = '<a href="' . base_url('announcement') . '/' . strtolower($announcement->id_bahasa) . '/' . convert_date_format('Y', $announcement->waktu) . '/' . convert_date_format('m', $announcement->waktu) . '/' . slug($announcement->judul) . '/' . $announcement->id_pengumuman . '"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> view</a>
                    <a href="' . base_url() . 'announcement/edit/' . $announcement->id_bahasa . '/' . $announcement->id_pengumuman . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                    <a href="' . base_url() . 'announcement/delete/' . $announcement->id_bahasa . '/' . $announcement->id_pengumuman . '" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_announcement->count_all(),
            "recordsFiltered" => $this->model_announcement->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add() {
        $this->navbar->setSubMenuActive('add');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Announcement list' => base_url() . 'announcement'
            ),
            'title' => 'Announcement <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/announcement_add.tpl');
    }

    public function edit($id_bahasa, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Announcement list' => base_url() . 'announcement',
                'Announcement' => base_url()
            ),
            'label' => array(
                'announcement_edit' => $this->lang->line('label.announcementEdit'),
                'announcement_title' => $this->lang->line('label.announcement.title'),
                'announcement_summary' => $this->lang->line('label.announcement.summary'),
                'announcement_contet' => $this->lang->line('label.announcement.content'),
                'announcement_keyword' => $this->lang->line('label.announcement.keyword'),
                'announcement_image' => $this->lang->line('label.announcement.image'),
                'announcement_update' => $this->lang->line('label.announcement.update'),
                'announcement_cancel' => $this->lang->line('label.announcement.cancel')
            ),
            'announcement' => $this->model_announcement->get_announcement($id, $id_bahasa),
            'title' => 'Announcement <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/announcement_edit.tpl');
    }

    public function update() {
        $id = $this->input->post('id');
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "../ipb/media/images/announcement/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|png|PNG'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('judul')))."-announcement";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('announcement/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'type' => $this->input->post('type'),
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'keyword' => $this->input->post('keyword')
                );
                
                if ($this->model_announcement->update_announcement($data, $this->upload->file_name, $this->input->post('id_bahasa'))){
                    $alert = url_title("update succses !");
                    redirect('announcement/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                } else {
                $alert = url_title("update failed !");
                redirect('announcement/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                }
            }
        } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'type' => $this->input->post('type'),
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'keyword' => $this->input->post('keyword')
                );
            
            if ($this->model_announcement->update_announcement($data, $this->input->post('image'), $this->input->post('id_bahasa'))) {
                $alert = url_title("update succses !");
                redirect('announcement/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("update failed !");
                redirect('announcement/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            }
        }
    }

    public function delete($idbahasa = NULL, $id = NUll) {
        $data = array(
            'url' => $this->url,
            'id_pengumuman' => $id,
            'id_bahasa' => $idbahasa,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Announcement list' => base_url() . 'announcement'
            ),
            'title' => 'Announcement <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_announcement->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('announcement/?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/announcement_delete.tpl');
    }

    public function save() {
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "../ipb/media/images/announcement/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('judul_id')))."-announcement";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (($this->input->post('isi_en') != NULL) and ( $this->input->post('isi_id') != NULL)) {
            if (isset($file_image['name']) and $file_image['name'] != '') {
                if (!$this->upload->do_upload('image')) {
                    $alert = $this->upload->display_errors();
                    redirect('announcement/add?n=' . $alert, 'refresh');
                } else {
                     $data = array(
                        'type' => $this->input->post('type'),
                        'judul_en' => $this->input->post('judul_en'),
                        'judul_id' => $this->input->post('judul_id'),
                        'ringkasan_en' => $this->input->post('ringkasan_en'),
                        'ringkasan_id' => $this->input->post('ringkasan_id'),
                        'isi_en' => $this->input->post('isi_en'),
                        'isi_id' => $this->input->post('isi_id'),
                        'keyword_id' => $this->input->post('keyword_id'),
                        'keyword_en' => $this->input->post('keyword_en')
                    );

                    if ($this->model_announcement->save_announcement($data, $this->upload->file_name)) {
                        $alert = url_title("Save succses !");
                        redirect('announcement?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Save failde !");
                        redirect('announcement/add?n=' . $alert, 'refresh');
                    }
                }
            } else {
                $alert = url_title("File Not Found !");
                redirect('announcement/add?n=' . $alert, 'refresh');
            }
        } else {
            $alert = url_title("Isi empty !");
            redirect('announcement/add?n=' . $alert, 'refresh');
        }
    }

    public function frontend_announcement() {
        $this->navbar->setSubMenuActive(1);
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'announcement list' => base_url() . 'announcement'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
            ),
            'announcement_list' => $this->model_announcement->get_listannouncement(null),
            'title' => 'announcement <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/announcement.tpl');
    }

    public function frontend_announcement_list() {
        $list = $this->model_announcement->get_datatables_announcement();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $announcement) {
            $no++;
            $row = array();
            //$row[] = '<a href="'. base_url().'announcement/post/'.date('Y', $announcement->waktu).'/'.  slug($announcement->judul).'">'.$announcement->judul.'</a>';
            $row[] = '<a href="' . base_url() . 'announcement/post/' . convert_date_format('Y', $announcement->waktu) . '/' . convert_date_format('m', $announcement->waktu) . '/' . strtolower($announcement->id_bahasa) . '/' . slug($announcement->judul) . '/' . $announcement->id_pengumuman . '/">' . $announcement->judul . '</a>'
                    . '<br>' . $announcement->ringkasan . '';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_announcement->count_all(),
            "recordsFiltered" => $this->model_announcement->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function post($id_bahasa, $year, $month, $title, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'announcement list' => base_url() . 'announcement',
                $this->model_announcement->get_announcement($id)->judul => base_url()
            ),
            'announcement' => $this->model_announcement->get_announcement($id, $id_bahasa),
            'title' => $this->model_announcement->get_announcement($id)->judul,
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/post_announcement.tpl');
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
