<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminreference extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('upload');
        $this->load->library('navbar');
        $this->navbar->setMenuActive('reference');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_reference');
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
                'Reference list' => base_url() . 'adminreference'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
                'tabel_date' => $this->lang->line('label.tabel.date'),
                'tabel_lang' => $this->lang->line('label.tabel.lang'),
                'tabel_edit' => $this->lang->line('label.tabel.edit'),
                'tabel_delete' => $this->lang->line('label.tabel.delete'),
                'table_action' => $this->lang->line('label.tabel.action')
            ),
            'title' => 'Reference <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/reference.tpl');
    }

    public function references_list() {
        $this->navbar->setSubMenuActive('list');
        $list = $this->model_reference->get_datatables_reference();
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
            $row[] = '<a href="'.base_url('references').'/'.$news->slug.'"  class="btn btn-xs" target = "_blank_"><i class="fa fa-file fa-fw"></i> view </a>
                      <a href="' . base_url() . 'adminreference/edit/' . $news->id_bahasa . '/' . $news->id_berita . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                      <a href="' . base_url() . 'adminreference/delete/' . $news->id_bahasa . '/' . $news->id_berita . '" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_reference->count_all(),
            "recordsFiltered" => $this->model_reference->count_filtered(),
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
                'Reference list' => base_url() . 'adminreference',
                'Add Reference' => base_url() . 'adminreference/add'
            ),
            'title' => 'Reference <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/reference_add.tpl');
    }

    public function edit($id_bahasa, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'Reference list' => base_url() . 'adminreference',
                'Edit Reference' => base_url()
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
            'news' => $this->model_reference->get_reference($id, $id_bahasa),
            'title' => 'reference <small>management</small>',
            'site_lang'=>$this->session->userdata('site_lang'),
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/reference_edit.tpl');
    }

    public function update() {

        $id = $this->input->post('id');
        $file_image = (isset($_FILES['pdf']) == TRUE ? $_FILES['pdf'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/reference/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'pdf'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-reference";
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('pdf')) {
                $alert = $this->upload->display_errors();
                redirect('adminreference/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'keyword' => $this->input->post('keyword'),
                    'slug' => str_replace(" ", "-", preg_replace('/[^a-zA-Z0-9 ]/',' ',strtolower($this->input->post('judul'))))
                );
                
                if ($this->model_reference->update_reference($data, $this->upload->file_name, $this->input->post('id_bahasa'))){
                    $alert = url_title("update succses !");
                    redirect('adminreference/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                } else {
                $alert = url_title("update failed !");
                redirect('adminreference/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                }
            }
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'id_bahasa' => $this->input->post('id_bahasa'),
                'judul' => $this->input->post('judul'),
                'ringkasan' => $this->input->post('ringkasan'),
                'keyword' => $this->input->post('keyword'),
                'slug' => str_replace(" ", "-", preg_replace('/[^a-zA-Z0-9 ]/',' ',strtolower($this->input->post('judul'))))
            );
            if ($this->model_reference->update_reference($data,$this->input->post('pdf'), $this->input->post('id_bahasa'))) {
                $alert = url_title("update succses !");
                redirect('adminreference/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("update failed !");
                redirect('adminreference/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
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
                'Reference list' => base_url() . 'adminrelatednews',
                'Delete Reference' => base_url() . ''
            ),
            'title' => 'Reference <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_reference->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('adminreference/?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/reference_delete.tpl');
    }

    public function save() {
        $file_image = (isset($_FILES['pdf']) == TRUE ? $_FILES['pdf'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/reference/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'pdf'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('judul_id')))."-reference";
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (($this->input->post('judul_en') != NULL) and ( $this->input->post('judul_id') != NULL)) {
            if (isset($file_image['name']) and $file_image['name'] != '') {
                if (!$this->upload->do_upload('pdf')) {
                    $alert = $this->upload->display_errors();
                    redirect('adminreference/add?n=' . $alert, 'refresh');
                } else {
                    $data = array(
                        'judul_en' => $this->input->post('judul_en'),
                        'judul_id' => $this->input->post('judul_id'),
                        'ringkasan_en' => $this->input->post('ringkasan_en'),
                        'ringkasan_id' => $this->input->post('ringkasan_id'),
                        'isi_en' => $this->input->post('pdf'),
                        'isi_id' => $this->input->post('pdf'),
                        'kategori' => 'reference',
                        'keyword_id' => $this->input->post('keyword_id'),
                        'keyword_en' => $this->input->post('keyword_en'),
                        'slug' => preg_replace('/[^a-zA-Z0-9 ]/',' ',$this->input->post('judul_en'))
                    );

                    if ($this->model_reference->save_reference($data, $this->upload->file_name)) {
                        $alert = url_title("Save succses !");
                        redirect('adminreference?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Save failde !");
                        redirect('adminreference/add?n=' . $alert, 'refresh');
                    }
                }
            } else {
                $alert = url_title("File Not Found !");
                redirect('adminreference/add?n=' . $alert, 'refresh');
            }
        } else {
            $alert = url_title("Isi empty !");
            redirect('adminreference/add?n=' . $alert, 'refresh');
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
                'reference list' => base_url() . 'reference'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
            ),
            'news_list' => $this->model_related_news->get_listreference(null),
            'title' => 'reference <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/reference.tpl');
    }
    public function frontend_news_list() {
        $list = $this->model_reference->get_datatables_news();
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
            "recordsTotal" => $this->model_reference->count_all(),
            "recordsFiltered" => $this->model_reference->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    

    public function generated(){
        echo generateId();
    }
}
