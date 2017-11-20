<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminpressrelease extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('upload');
        $this->load->library('navbar');
        $this->navbar->setMenuActive('press_release');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_press_release');

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
                'Press Release list' => base_url() . 'adminpressrelease'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
                'tabel_date' => $this->lang->line('label.tabel.date'),
                'tabel_lang' => $this->lang->line('label.tabel.lang'),
                'tabel_edit' => $this->lang->line('label.tabel.edit'),
                'tabel_delete' => $this->lang->line('label.tabel.delete'),
                'table_action' => $this->lang->line('label.tabel.action')
            ),
            'title' => 'Press Release <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/press_release.tpl');
    }

    public function press_release_list() {
        $this->navbar->setSubMenuActive('list');
        $list = $this->model_press_release->get_datatables_press_release();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $news) {
            $no++;
            $row = array(); 
            $row[] = $no;
            $row[] = $news->judul;
            $row[] = $news->waktu;
            $row[] = $news->id_bahasa;
            //add html for action
            $row[] = '<a href="'.base_url('press-release').'/'.$news->slug.'"  class="btn btn-xs" target = "_blank_"><i class="fa fa-file fa-fw"></i> view </a>
                      <a href="' . base_url() . 'adminpressrelease/edit/' . $news->id_bahasa . '/' . $news->id_berita . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                      <a href="' . base_url() . 'adminpressrelease/delete/' . $news->id_bahasa . '/' . $news->id_berita . '" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_press_release->count_all(),
            "recordsFiltered" => $this->model_press_release->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add() {
        $this->navbar->setSubMenuActive("add");
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Press Release list' => base_url() . 'adminpressrelease',
                'Add Press Release' => base_url() . 'adminpressrelease/add'
            ),
            'title' => 'press_release <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/press_release_add.tpl');
    }

    public function edit($id_bahasa, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'press_release list' => base_url() . 'adminpressrelease',
                'Edit press_release' => base_url()
            ),
            'label' => array(
                'news_edit' => $this->lang->line('label.newsEdit'),
                'news_title' => $this->lang->line('label.news.title'),
                'news_summary' => $this->lang->line('label.news.summary'),
                'news_contet' => $this->lang->line('label.news.content'),
                'news_location' => $this->lang->line('label.news.location'),
                'news_interviewees' => $this->lang->line('label.news.interviewees'),
                'news_keyword' => $this->lang->line('label.news.keyword'),
                'news_image' => $this->lang->line('label.news.image'),
                'news_update' => $this->lang->line('label.news.update'),
                'news_cancel' => $this->lang->line('label.news.cancel')
            ),
            'news' => $this->model_press_release->get_press_release($id, $id_bahasa),
            'title' => 'press_release <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/press_release_edit.tpl');
    }

    public function update() {

        $id = $this->input->post('id');
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/images/press_release/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-press_release";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('adminpressrelease/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
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
                
                if ($this->model_press_release->update_press_release($data, $this->upload->file_name, $this->input->post('id_bahasa'))){
                    $alert = url_title("update succses !");
                    redirect('adminpressrelease/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                } else {
                $alert = url_title("update failed !");
                redirect('adminpressrelease/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                }
            }
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'id_bahasa' => $this->input->post('id_bahasa'),
                'judul' => $this->input->post('judul'),
                'ringkasan' => $this->input->post('ringkasan'),
                'isi' => $this->input->post('isi'),
                'keyword' => $this->input->post('keyword'),
                'slug' => str_replace(" ", "-", preg_replace('/[^a-zA-Z0-9]/',' ', strtolower( $this->input->post('judul')))) 
            );

            if ($this->model_press_release->update_press_release($data, $this->input->post('image'), $this->input->post('id_bahasa'))) {
                $alert = url_title("update succses !");
                redirect('adminpressrelease/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("update failed !");
                redirect('adminpressrelease/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            }
        }
    }

    public function delete($lang,$id) {
        $data = array(
            'url' => $this->url,
            'id_berita' => $id,
            'lang'=>$lang,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'press_release list' => base_url() . 'adminpressrelease',
                'Delete press_release' => base_url() . ''
            ),
            'title' => 'press_release <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_press_release->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('adminpressrelease/?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/press_release_delete.tpl');
    }

    public function save() {
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/images/press_release/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('judul_id')))."-press_release";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (($this->input->post('isi_en') != NULL) and ( $this->input->post('isi_id') != NULL)) {
            if (isset($file_image['name']) and $file_image['name'] != '') {
                if (!$this->upload->do_upload('image')) {
                    $alert = $this->upload->display_errors();
                    redirect('adminpressrelease/add?n=' . $alert, 'refresh');
                } else {
                    $data = array(
                        'judul_en' => $this->input->post('judul_en'),
                        'judul_id' => $this->input->post('judul_id'),
                        'ringkasan_en' => $this->input->post('ringkasan_en'),
                        'ringkasan_id' => $this->input->post('ringkasan_id'),
                        'isi_en' => $this->input->post('isi_en'),
                        'isi_id' => $this->input->post('isi_id'),
                        'kategori' => 'press_release',
                        'keyword_id' => $this->input->post('keyword_id'),
                        'keyword_en' => $this->input->post('keyword_en'),
                        'slug' => preg_replace('/[^a-zA-Z0-9 ]/',' ',$this->input->post('judul_en'))
                    );

                    if ($this->model_press_release->save_press_release($data, $this->upload->file_name)) {
                        $alert = url_title("Save succses !");
                        redirect('adminpressrelease?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Save failde !");
                        redirect('adminpressrelease/add?n=' . $alert, 'refresh');
                    }
                }
            } else {
                $alert = url_title("File Not Found !");
                redirect('adminpressrelease/add?n=' . $alert, 'refresh');
            }
        } else {
            $alert = url_title("Isi empty !");
            redirect('adminpressrelease/add?n=' . $alert, 'refresh');
        }
    }
    
    
    public function sitemap(){
        $data['event'] = $this->model_press_release->get_feeds();
        header('Content-type: application/xml; charset="ISO-8859-1"',true);
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('frontend/sitemap_press_release.tpl');
    }

    public function generated(){
        echo generateId();
    }
}
