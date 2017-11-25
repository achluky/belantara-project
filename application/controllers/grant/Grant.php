<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grant extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('upload');
        $this->load->library('navbar');
        $this->navbar->setMenuActive('dashboard');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        if ($this->session->userdata('site_lang')=='EN') {
            $this->url = str_replace('EN', 'ID', current_url());
        }
        if ($this->session->userdata('site_lang')=='ID') {
            $this->url = str_replace('ID', 'EN', current_url());
        }
        
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index() {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Blog list' => base_url() . 'blog'
            ),
            'title' => 'Grant <small> Dashboard</small>',
            'session' => $this->sess['email']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('dashboard-aplican.tpl');
    }

    public function blog_list() {
        $this->navbar->setSubMenuActive('list');
        $list = $this->model_blog->get_datatables_blog();
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
            $row[] = '<a href="'.base_url('blog').'/'.strtolower($news->id_bahasa).'/'. convert_date_format('Y', $news->waktu).'/'. convert_date_format('m', $news->waktu).'/'.slug($news->judul).'/'.$news->id_berita.'"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> view</a>
                      <a href="' . base_url() . 'blog/edit/' . $news->id_bahasa . '/' . $news->id_berita . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                      <a href="' . base_url() . 'blog/delete/' . $news->id_bahasa . '/' . $news->id_berita . '" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>';
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

    public function profile() {
        $this->navbar->setSubMenuActive("add");
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Blog list' => base_url() . 'blog',
                'Add Blog' => base_url() . 'blog/add'
            ),
            'title' => 'Profile <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/grant/profile.tpl');
    }
    
    public function add_1() {
        $this->navbar->setSubMenuActive("add");
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Blog list' => base_url() . 'blog',
                'Add Blog' => base_url() . 'blog/add'
            ),
            'title' => ' <small>Input Proposal Baru</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/grant/add_1.tpl');
    }
    public function add_2() {
        $this->navbar->setSubMenuActive("add");
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Blog list' => base_url() . 'blog',
                'Add Blog' => base_url() . 'blog/add'
            ),
            'title' => ' <small>Input Proposal Baru</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/grant/add_2.tpl');
    }
    public function add_3() {
        $this->navbar->setSubMenuActive("add");
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Blog list' => base_url() . 'blog',
                'Add Blog' => base_url() . 'blog/add'
            ),
            'title' => ' <small>Input Proposal Baru</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/grant/add_3.tpl');
    }
    public function add_4() {
        $this->navbar->setSubMenuActive("add");
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Blog list' => base_url() . 'blog',
                'Add Blog' => base_url() . 'blog/add'
            ),
            'title' => ' <small>Input Proposal Baru</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/grant/add_4.tpl');
    }
    public function add_5() {
        $this->navbar->setSubMenuActive("add");
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Blog list' => base_url() . 'blog',
                'Add Blog' => base_url() . 'blog/add'
            ),
            'title' => ' <small>Input Proposal Baru</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/grant/add_5.tpl');
    }

    public function edit($id_bahasa, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Blog list' => base_url() . 'blog',
                'Edit Blog' => base_url()
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
            'news' => $this->model_blog->get_blog($id, $id_bahasa),
            'title' => 'Blog <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/blog_edit.tpl');
    }

    public function update() {
        $id = $this->input->post('id');
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/images/blog/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-blog";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('blog/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'keyword' => $this->input->post('keyword')
                );
                
                if ($this->model_blog->update_blog($data, $this->upload->file_name, $this->input->post('id_bahasa'))){
                    $alert = url_title("update succses !");
                    redirect('blog/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                } else {
                $alert = url_title("update failed !");
                redirect('blog/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                }
            }
        } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'keyword' => $this->input->post('keyword')
                );
            
            if ($this->model_blog->update_blog($data, $this->input->post('image'), $this->input->post('id_bahasa'))) {
                $alert = url_title("update succses !");
                redirect('blog/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("update failed !");
                redirect('blog/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            }
        }
    }

    public function coba_upload(){
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if(isset($file_image['name']) and $file_image['name']!=''){
            if(move_uploaded_file($file_image['tmp_name'], "./document/images/blog/".$file_image['name'])){
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
                'Blog list' => base_url() . 'blog',
                'Delete Blog' => base_url() . ''
            ),
            'title' => 'Blog <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_blog->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('blog/?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/blog_delete.tpl');
    }

    public function save() {
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/images/blog/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('judul_id')))."-blog";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (($this->input->post('isi_en') != NULL) and ( $this->input->post('isi_id') != NULL)) {
            if (isset($file_image['name']) and $file_image['name'] != '') {
                if (!$this->upload->do_upload('image')) {
                    $alert = $this->upload->display_errors();
                    redirect('blog/add?n=' . $alert, 'refresh');
                } else {
                    $data = array(
                        'judul_en' => $this->input->post('judul_en'),
                        'judul_id' => $this->input->post('judul_id'),
                        'ringkasan_en' => $this->input->post('ringkasan_en'),
                        'ringkasan_id' => $this->input->post('ringkasan_id'),
                        'isi_en' => $this->input->post('isi_en'),
                        'isi_id' => $this->input->post('isi_id'),
                        'kategori' => 'blog',
                        'keyword_id' => $this->input->post('keyword_id'),
                        'keyword_en' => $this->input->post('keyword_en')
                    );

                    if ($this->model_blog->save_blog($data, $this->upload->file_name)) {
                        $alert = url_title("Save succses !");
                        redirect('blog?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Save failde !");
                        redirect('blog/add?n=' . $alert, 'refresh');
                    }
                }
            } else {
                $alert = url_title("File Not Found !");
                redirect('blog/add?n=' . $alert, 'refresh');
            }
        } else {
            $alert = url_title("Isi empty !");
            redirect('blog/add?n=' . $alert, 'refresh');
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
            'news_list' => $this->model_blog->get_listblog(null),
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
    
    public function rss() {
        $data['feed_name'] = 'Bogor Agricultural University';
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://ipb.ac.id/rss';
        $data['page_language'] = 'en';
        $data['page_description'] = 'Bogor Agricultural University';
        $data['creator_email'] = 'humas@ipb.ac.id';
        $data['event'] = $this->model_blog->get_feeds();
        
        header('Content-type: application/xml; charset="ISO-8859-1"',true);
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('frontend/feed_blog.tpl');
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
