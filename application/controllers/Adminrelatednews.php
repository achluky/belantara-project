<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminrelatednews extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('upload');
        $this->load->library('navbar');
        $this->navbar->setMenuActive('related_news');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_related_news');
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
                'Related News list' => base_url() . 'adminrelatednews'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
                'tabel_date' => $this->lang->line('label.tabel.date'),
                'tabel_lang' => $this->lang->line('label.tabel.lang'),
                'tabel_edit' => $this->lang->line('label.tabel.edit'),
                'tabel_delete' => $this->lang->line('label.tabel.delete'),
                'table_action' => $this->lang->line('label.tabel.action')
            ),
            'title' => 'Related News <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/related_news.tpl');
    }

    public function related_news_list() {
        $this->navbar->setSubMenuActive('list');
        $list = $this->model_related_news->get_datatables_related_news();
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
            $row[] = '<a href="'.$news->isi.'"  class="btn btn-xs" target = "_blank_"><i class="fa fa-file fa-fw"></i> view </a>
                      <a href="' . base_url() . 'adminrelatednews/edit/' . $news->id_bahasa . '/' . $news->id_berita . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                      <a href="' . base_url() . 'adminrelatednews/delete/' . $news->id_bahasa . '/' . $news->id_berita . '" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_related_news->count_all(),
            "recordsFiltered" => $this->model_related_news->count_filtered(),
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
                'Related News list' => base_url() . 'adminrelatednews',
                'Add Related News' => base_url() . 'adminrelatednews/add'
            ),
            'title' => 'Related News <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/related_news_add.tpl');
    }

    public function edit($id_bahasa, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Related News list' => base_url() . 'adminrelatednews',
                'Edit Related News' => base_url()
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
            'news' => $this->model_related_news->get_related_news($id, $id_bahasa),
            'title' => 'Blog <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'site_lang'=>$this->session->userdata('site_lang'),
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/related_news_edit.tpl');
    }

    public function update() {
        $id = $this->input->post('id');
        $data = array(
            'id' => $this->input->post('id'),
            'id_bahasa' => $this->input->post('id_bahasa'),
            'judul' => $this->input->post('judul'),
            'ringkasan' => $this->input->post('ringkasan'),
            'isi' => $this->input->post('link'),
            'keyword' => $this->input->post('keyword'),
            'slug' => str_replace(" ", "-", preg_replace('/[^a-zA-Z0-9 ]/',' ',strtolower($this->input->post('judul'))))
        );

        if ($this->model_related_news->update_related_news($data, $this->input->post('id_bahasa'))) {
            $alert = url_title("update succses !");
            redirect('adminrelatednews/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
        } else {
            $alert = url_title("update failed !");
            redirect('adminrelatednews/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
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
                'Related News list' => base_url() . 'adminrelatednews',
                'Delete Related News' => base_url() . ''
            ),
            'title' => 'Related News <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_related_news->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('adminrelatednews/?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/related_news_delete.tpl');
    }

    public function save() {
        if (($this->input->post('judul_en') != NULL) and ( $this->input->post('judul_en') != NULL)) {
            $data = array(
                'judul_en' => $this->input->post('judul_en'),
                'judul_id' => $this->input->post('judul_id'),
                'ringkasan_en' => $this->input->post('ringkasan_en'),
                'ringkasan_id' => $this->input->post('ringkasan_id'),
                'isi_en' => $this->input->post('link'),
                'isi_id' => $this->input->post('link'),
                'kategori' => 'related_news',
                'keyword_id' => $this->input->post('keyword_id'),
                'keyword_en' => $this->input->post('keyword_en'),
                'slug' => str_replace(" ", "-", preg_replace('/[^a-zA-Z0-9 ]/',' ',strtolower($this->input->post('judul'))))
            );
            if ($this->model_related_news->save_related_news($data)) {
                $alert = url_title("Save succses !");
                redirect('adminrelatednews?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("Save failde !");
                redirect('adminrelatednews/add?n=' . $alert, 'refresh');
            }
        } else {
            $alert = url_title("Isi empty !");
            redirect('adminrelatednews/add?n=' . $alert, 'refresh');
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
                'Blog list' => base_url() . 'blog'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
            ),
            'news_list' => $this->model_related_news->get_listblog(null),
            'title' => 'Blog <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/blog.tpl');
    }
    public function frontend_news_list() {
        $list = $this->model_blog->get_datatables_news();
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
            "recordsTotal" => $this->model_blog->count_all(),
            "recordsFiltered" => $this->model_blog->count_filtered(),
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
                $this->model_blog->get_blog($id)->judul => base_url()
            ),
            'news' => $this->model_blog->get_blog($id,$id_bahasa),
            'title' => $this->model_blog->get_blog($id)->judul,
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/post_blog.tpl');
    }
    
    public function sitemap(){
        $data['event'] = $this->model_blog->get_feeds();
        header('Content-type: application/xml; charset="ISO-8859-1"',true);
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('frontend/sitemap_blog.tpl');
    }

    public function generated(){
        echo generateId();
    }
}
