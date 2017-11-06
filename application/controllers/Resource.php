<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resource extends CI_Controller {

    public $url;
    public $sess;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');
        }
        $this->load->library('upload');
        $this->load->library('navbar');
        $this->navbar->setMenuActive('resource');
        $this->smartyci->assign('navbar', $this->navbar->getMenu());
        $this->load->model('model_resource');
        if ($this->session->userdata('site_lang')=='EN')
            $this->url = str_replace('EN', 'ID', current_url());
        if ($this->session->userdata('site_lang')=='ID')
            $this->url = str_replace('ID', 'EN', current_url());
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
                'resource list' => base_url() . 'resource'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.resource.title'),
                'tabel_date' => $this->lang->line('label.resource.date'),
                'tabel_lang' => $this->lang->line('label.resource.lang'),
                'tabel_edit' => $this->lang->line('label.resource.edit'),
                'tabel_delete' => $this->lang->line('label.resource.delete'),
                'table_action' => $this->lang->line('label.resource.action')
            ),
            'resource_list' => $this->model_resource->get_listresource(null),
            'title' => 'Resource <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/resource.tpl');
    }

    public function resource_list() {
        $this->navbar->setSubMenuActive('list');
        $list = $this->model_resource->get_datatables_resource();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $resource) {
            $no++;
            $row = array(); 
            $row[] = $no;
            $row[] = $resource->judul;
            $row[] = $resource->waktu;
            $row[] = $resource->id_bahasa;

            //add html for action
            $row[] = '<a href="'.base_url('resource').'/'.strtolower($resource->id_bahasa).'/'. convert_date_format('Y', $resource->waktu).'/'. convert_date_format('m', $resource->waktu).'/'.slug($resource->judul).'/'.$resource->id_berita.'"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> view</a>
                      <a href="' . base_url() . 'resource/edit/' . $resource->id_bahasa . '/' . $resource->id_berita . '"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                      <a href="' . base_url() . 'resource/delete/' . $resource->id_bahasa . '/' . $resource->id_berita . '" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_resource->count_all(),
            "recordsFiltered" => $this->model_resource->count_filtered(),
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
                'resource list' => base_url() . 'resource',
                'Add resource' => base_url() . 'resource/add'
            ),
            'label' => array(
                'resource_title' => $this->lang->line('label.resource.title'),
                'resource_summary' => $this->lang->line('label.resource.summary'),
                'resource_content' => $this->lang->line('label.resource.content'),
                'resource_keyword' => $this->lang->line('label.resource.keyword'),
                'resource_file' => $this->lang->line('label.resource.file'),
                'resource_save' => $this->lang->line('label.resource.save'),
                'resource_cancel' => $this->lang->line('label.resource.cancel')
            ),
            'title' => 'Resource <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/resource_add.tpl');
    }

    public function edit($id_bahasa, $id) {
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'resource list' => base_url() . 'resource',
                'Edit resource' => base_url()
            ),
            'label' => array(
                'resource_edit' => $this->lang->line('label.resource.resourceEdit'),
                'resource_title' => $this->lang->line('label.resource.title'),
                'resource_summary' => $this->lang->line('label.resource.summary'),
                'resource_contet' => $this->lang->line('label.resource.content'),
                'resource_keyword' => $this->lang->line('label.resource.keyword'),
                'resource_file' => $this->lang->line('label.resource.file'),
                'resource_update' => $this->lang->line('label.resource.update'),
                'resource_cancel' => $this->lang->line('label.resource.cancel')
            ),
            'resource' => $this->model_resource->get_resource($id, $id_bahasa),
            'title' => 'resource <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/resource_edit.tpl');
    }

    public function update() {
        $id = $this->input->post('id');
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "../ipb/media/images/resource/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'pdf|doc|xls|xlsx|docx'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title_ID')))."-resource";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('resource/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'id_bahasa' => $this->input->post('id_bahasa'),
                    'judul' => $this->input->post('judul'),
                    'ringkasan' => $this->input->post('ringkasan'),
                    'isi' => $this->input->post('isi'),
                    'keyword' => $this->input->post('keyword')
                );
                
                if ($this->model_resource->update_resource($data, $this->upload->file_name, $this->input->post('id_bahasa'))){
                    $alert = url_title("update succses !");
                    redirect('resource/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
                } else {
                $alert = url_title("update failed !");
                redirect('resource/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
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
            
            if ($this->model_resource->update_resource($data, $this->input->post('image'), $this->input->post('id_bahasa'))) {
                $alert = url_title("update succses !");
                redirect('resource/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $alert = url_title("update failed !");
                redirect('resource/edit/' . $this->input->post('id_bahasa') . '/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
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
                'resource list' => base_url() . 'resource'
            ),
            'title' => 'resource <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_resource->delete($id)) {
                $alert = url_title("delete succses !");
                redirect('resource/?n=' . $alert, 'refresh');
            }
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('admin/resource_delete.tpl');
    }

    public function save() {
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/resource/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'pdf|doc|xls|xlsx|docx'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('judul_id')))."-resource";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (($this->input->post('isi_en') != NULL) and ( $this->input->post('isi_id') != NULL)) {
            if (isset($file_image['name']) and $file_image['name'] != '') {
                if (!$this->upload->do_upload('image')) {
                    $alert = $this->upload->display_errors();
                    redirect('resource/add?n=' . $alert, 'refresh');
                } else {
                    $data = array(
                        'judul_en' => $this->input->post('judul_en'),
                        'judul_id' => $this->input->post('judul_id'),
                        'ringkasan_en' => $this->input->post('ringkasan_en'),
                        'ringkasan_id' => $this->input->post('ringkasan_id'),
                        'isi_en' => $this->input->post('isi_en'),
                        'isi_id' => $this->input->post('isi_id'),
                        'kategori' => 'resource',
                        'keyword_id' => $this->input->post('keyword_id'),
                        'keyword_en' => $this->input->post('keyword_en')
                    );

                    if ($this->model_resource->save_resource($data, $this->upload->file_name)) {
                        $alert = url_title("Save succses !");
                        redirect('resource?n=' . $alert, 'refresh');
                    } else {
                        $alert = url_title("Save failde !");
                        redirect('resource/add?n=' . $alert, 'refresh');
                    }
                }
            } else {
                $alert = url_title("File Not Found !");
                redirect('resource/add?n=' . $alert, 'refresh');
            }
        } else {
            $alert = url_title("Isi empty !");
            redirect('resource/add?n=' . $alert, 'refresh');
        }
    }
    
    // fronted

    public function coba_upload(){
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null);
        if(isset($file_image['name']) and $file_image['name']!=''){
            if(move_uploaded_file($file_image['tmp_name'], "../ipb/media/images/resource/".$file_image['name'])){
                echo "sukses";
            }else{
                echo "gagal";
            }
        }
        $this->smartyci->display('coba_upload.tpl');
    }
    public function frontend_resource(){
        $this->navbar->setSubMenuActive(1);
        $this->smartyci->assign('navbar', $this->navbar->getMenu());

        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'resource list' => base_url() . 'resource'
            ),
            'label' => array(
                'tabel_title' => $this->lang->line('label.tabel.title'),
            ),
            'resource_list' => $this->model_resource->get_listresource(null),
            'title' => 'resource <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );

        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/resource.tpl');
    }
    public function frontend_resource_list() {
        $list = $this->model_resource->get_datatables_resource();
        $data = array();
        $no = $_POST['start'];
        
        foreach ($list as $resource) {
            $no++;
            $row = array();
            $row[] = '<a href="'.base_url().'resource/post/'. convert_date_format('Y', $resource->waktu).'/'. convert_date_format('m', $resource->waktu).'/'.strtolower($resource->id_bahasa).'/'.slug($resource->judul).'/'.$resource->id_berita.'/">'.$resource->judul.'</a>'
                    . '<br>'.$resource->ringkasan.'';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_resource->count_all(),
            "recordsFiltered" => $this->model_resource->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function post($id_bahasa,$year,$month,$title,$id){
        $data = array(
            'url' => $this->url,
            'alert' => isset($_GET['n']) ? $_GET['n'] : '',
            'breadcrumb' => array(
                'Dashboard' => base_url() . 'admin',
                'resource list' => base_url() . 'resource',
                $this->model_resource->get_resource($id)->judul => base_url()
            ),
            'resource' => $this->model_resource->get_resource($id,$id_bahasa),
            'title' => $this->model_resource->get_resource($id)->judul,
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data', $data);
        $this->smartyci->display('frontend/post_resource.tpl');
    }
    
    public function rss() {
        $data['feed_name'] = 'Bogor Agricultural University';
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://ipb.ac.id/rss';
        $data['page_language'] = 'en';
        $data['page_description'] = 'Bogor Agricultural University';
        $data['creator_email'] = 'humas@ipb.ac.id';
        $data['event'] = $this->model_resource->get_feeds();
        
        header('Content-type: application/xml; charset="ISO-8859-1"',true);
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('frontend/feed_resource.tpl');
    }
    
    public function sitemap(){
        $data['event'] = $this->model_resource->get_feeds();
        header('Content-type: application/xml; charset="ISO-8859-1"',true);
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('frontend/sitemap_resource.tpl');
    }

    public function generated(){
        echo generateId();
    }
}
