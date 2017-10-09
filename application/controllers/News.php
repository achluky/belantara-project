<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('upload');
        $this->load->library('navbar');
        $this->navbar->setMenuActive('news');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_news');

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
                'News list' => base_url() . 'news'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
                'tabel_date' => $this->lang->line('label.tabel.date'),
                'tabel_lang' => $this->lang->line('label.tabel.lang'),
                'tabel_edit' => $this->lang->line('label.tabel.edit'),
                'tabel_delete' => $this->lang->line('label.tabel.delete'),
                'table_action' => $this->lang->line('label.tabel.action')
            ),
            'news_list' => $this->model_news->get_listnews(null),
            'title' => 'News <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/news.tpl');
    }

    public function news_list() {
        $this->navbar->setSubMenuActive('list');
        $list = $this->model_news->get_datatables_news();
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
            $row[] = '<a href="'.base_url('news').'/'.strtolower($news->id_bahasa).'/'. convert_date_format('Y', $news->waktu).'/'. convert_date_format('m', $news->waktu).'/'.slug($news->judul).'/'.$news->id_berita.'"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> view</a>
                      <a href="' . base_url() . 'news/edit/' . $news->id_bahasa . '/' . $news->id_berita . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                      <a href="' . base_url() . 'news/delete/' . $news->id_bahasa . '/' . $news->id_berita . '" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_news->count_all(),
            "recordsFiltered" => $this->model_news->count_filtered(),
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
                'News list' => base_url() . 'news',
                'Add News' => base_url() . 'news/add'
            ),
            'title' => 'News <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/news_add.tpl');
    }

    public function edit($id_bahasa, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'News list' => base_url() . 'news',
                'Edit News' => base_url()
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
            'news' => $this->model_news->get_news($id, $id_bahasa),
            'title' => 'News <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/news_edit.tpl');
    }

    public function update() {
        $id = $this->input->post('id');
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "../ipb/media/images/news/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-news";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('news/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'lokasi' => $this->input->post('lokasi'),
                    'narasumber' => $this->input->post('narasumber'),
                    'keyword' => $this->input->post('keyword')
                );
                
                if ($this->model_news->update_news($data, $this->upload->file_name, $this->input->post('id_bahasa'))){
                    $alert = url_title("update succses !");
                    redirect('news/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                } else {
                $alert = url_title("update failed !");
                redirect('news/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                }
            }
        } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'lokasi' => $this->input->post('lokasi'),
                    'narasumber' => $this->input->post('narasumber'),
                    'keyword' => $this->input->post('keyword')
                );
            
            if ($this->model_news->update_news($data, $this->input->post('image'), $this->input->post('id_bahasa'))) {
                $alert = url_title("update succses !");
                redirect('news/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("update failed !");
                redirect('news/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            }
        }
    }

    public function coba_upload(){
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if(isset($file_image['name']) and $file_image['name']!=''){
            if(move_uploaded_file($file_image['tmp_name'], "../ipb/media/images/news/".$file_image['name'])){
                echo "sukses";
            }else{
                echo "gagal";
            }
        }
        $this->smartyci->display('coba_upload.tpl');
    }

    public function delete($lang,$id) {
        $data = array(
            'url' => $this->url,
            'id_berita' => $id,
            'lang'=>$lang,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'News list' => base_url() . 'news'
            ),
            'title' => 'News <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_news->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('news/?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/news_delete.tpl');
    }

    public function save() {
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "../ipb/media/images/news/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('judul_id')))."-news";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (($this->input->post('isi_en') != NULL) and ( $this->input->post('isi_id') != NULL)) {
            if (isset($file_image['name']) and $file_image['name'] != '') {
                if (!$this->upload->do_upload('image')) {
                    $alert = $this->upload->display_errors();
                    redirect('news/add?n=' . $alert, 'refresh');
                } else {
                    $data = array(
                        'judul_en' => $this->input->post('judul_en'),
                        'judul_id' => $this->input->post('judul_id'),
                        'ringkasan_en' => $this->input->post('ringkasan_en'),
                        'ringkasan_id' => $this->input->post('ringkasan_id'),
                        'isi_en' => $this->input->post('isi_en'),
                        'isi_id' => $this->input->post('isi_id'),
                        'lokasi' => $this->input->post('lokasi'),
                        'narasumber' => $this->input->post('narasumber'),
                        'keyword_id' => $this->input->post('keyword_id'),
                        'keyword_en' => $this->input->post('keyword_en')
                    );

                    if ($this->model_news->save_news($data, $this->upload->file_name)) {
                        $alert = url_title("Save succses !");
                        redirect('news?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Save failde !");
                        redirect('news/add?n=' . $alert, 'refresh');
                    }
                }
            } else {
                $alert = url_title("File Not Found !");
                redirect('news/add?n=' . $alert, 'refresh');
            }
        } else {
            $alert = url_title("Isi empty !");
            redirect('news/add?n=' . $alert, 'refresh');
        }
    }
    
    public function frontend_news(){
        $this->navbar->setSubMenuActive(1);
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'News list' => base_url() . 'news'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
            ),
            'news_list' => $this->model_news->get_listnews(null),
            'title' => 'News <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/news.tpl');
    }
    public function frontend_news_list() {
        $list = $this->model_news->get_datatables_news();
        $data = array();
        $no = $_POST['start'];
        
        foreach ($list as $news) {
            $no++;
            $row = array();
            //$row[] = '<a href="'. base_url().'news/post/'.date('Y', $news->waktu).'/'.  slug($news->judul).'">'.$news->judul.'</a>';
            $row[] = '<a href="'.base_url().'news/post/'. convert_date_format('Y', $news->waktu).'/'. convert_date_format('m', $news->waktu).'/'.strtolower($news->id_bahasa).'/'.slug($news->judul).'/'.$news->id_berita.'/">'.$news->judul.'</a>'
                    . '<br>'.$news->ringkasan.'';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_news->count_all(),
            "recordsFiltered" => $this->model_news->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    
    public function post($id_bahasa,$year,$month,$title,$id){
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'News list' => base_url() . 'news',
                $this->model_news->get_news($id)->judul => base_url()
            ),
            'news' => $this->model_news->get_news($id,$id_bahasa),
            'title' => $this->model_news->get_news($id)->judul,
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/post_news.tpl');
    }
    
    public function rss() {
        $data['feed_name'] = 'Bogor Agricultural University';
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://ipb.ac.id/rss';
        $data['page_language'] = 'en';
        $data['page_description'] = 'Bogor Agricultural University';
        $data['creator_email'] = 'humas@ipb.ac.id';
        $data['event'] = $this->model_news->get_feeds();
        
        header('Content-type: application/xml; charset="ISO-8859-1"',true);
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('frontend/feed_news.tpl');
    }
    
    public function sitemap(){
        $data['event'] = $this->model_news->get_feeds();
        header('Content-type: application/xml; charset="ISO-8859-1"',true);
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('frontend/sitemap_news.tpl');
    }

    public function generated(){
        echo generateId();
    }
}
