<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {

    public $sess;
	public function __construct() 
    {
        parent::__construct();
	    if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('person');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
		$this->load->model('model_person');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index(){
    	$data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Employee list' => base_url().'person'
            ),
            'person_list' => $this->model_person->get_listperson(),
            'title'=> 'Employee <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/person.tpl');
    }

    public function add(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Employee list' => base_url().'person'
            ),
            'category_employee' => $this->model_person->get_listcategory(),
            'sub_category_employee' => $this->model_person->get_listsub_category(),
            'title'=> 'Employee <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/person_add.tpl');
    }
    public function save(){
        $this->load->library('upload');

        $file_image = (isset($_FILES['foto']) == TRUE ? $_FILES['foto'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/images/employee/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        // $config ['file_name'] = url_title(slug($this->input->post('nama')))."-employee";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if ( ($this->input->post('nama') != NULL) and ($this->input->post('deskripsi') != NULL) ) {
            if (isset($file_image['name']) and $file_image['name'] != '') {
                if (!$this->upload->do_upload('foto')) {
                    $alert = $this->upload->display_errors();
                    redirect('person/add?n=' . $alert, 'refresh');
                } else {
                    $data = array(
                        'name' => $this->input->post('nama'),
                        'jabatan' => $this->input->post('jabatan'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'create_date'=> date('Y-m-d h:i:s'),
                        'image'=> $file_image['name'],
                        'idcategory'=> $this->input->post('idcategory'),
                        'idsubcategory'=> $this->input->post('idsubcategory')
                    );
                    if($this->model_person->save_person($data)){
                        $alert = url_title("Saved!");
                        redirect('person?n='.$alert,'refresh');
                    }else{
                        $alert = url_title("save failed !");
                        redirect('person/add?n='.$alert,'refresh');
                    }
                }
            } else {
                $alert = url_title("File Not Found !");
                redirect('person/add?n=' . $alert, 'refresh');
            }
        }else{
            $alert = url_title("is empty !");
            redirect('person/add?n='.$alert,'refresh');
        }
    }

    public function delete($id){
        $data = array(
            'url'=> $this->url,
            'id' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Halaman list' => base_url().'Halaman'
                ),
            'title'=> 'Halaman <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            $this->model_page->delete($id);
            $alert = url_title("delete succses !");
            redirect('page/?n='.$alert,'refresh');   
        }
        
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/person_delete.tpl');
    }

    public function edit($id){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Page list' => base_url().'page',
                'page' => base_url()
                ),
            'page'=> $this->model_page->get_page_by_id($id),
            'title'=> 'Page <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/person_edit.tpl');
    }

    public function update(){
        $data = array(
          'title_EN' => $this->input->post('title_EN'),
                'title_ID' => $this->input->post('title_ID'),
                'keyword_EN' => $this->input->post('title_EN'),
                'keyword_ID' => $this->input->post('title_EN'),
                'content_EN' => $this->input->post('content_EN'),
                'content_ID' => $this->input->post('content_ID'),
                'waktu'=> date('Y-m-d h:i:s'),
                'sidebar'=> $this->input->post('sidebar'),
                'url'=> $this->input->post('url')
        );

        $id = $this->input->post('id');
        //print_r($data);
        if($this->model_page->update_page($id,$data)) {
            $alert = url_title("Update succses !");
            redirect('page/edit/'.$id.'?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('page/edit/'.$id.'?n='.$alert,'refresh');
        }
    }
}
