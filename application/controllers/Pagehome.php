<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pagehome extends CI_Controller {

    public $sess;
	public function __construct() 
    {
        parent::__construct();
	    if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $this->load->library('navbar');
        $this->load->library('upload');
        $this->navbar->setMenuActive('pagehome');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
		$this->load->model('model_pagehome');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Page Home' => base_url().'pagehome',
                'page' => base_url()
                ),
            'page'=> $this->model_pagehome->get_page_by_id(1000),
            'title'=> 'Page Home <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/pagehome_add.tpl');
    }

    public function update(){
        $data = array(
                'section_3_judul_EN' => $this->input->post('title_EN'),
                'section_3_judul_ID' => $this->input->post('title_ID'),
                'section_3_deskripsi_EN' => $this->input->post('deskripsi_EN'),
                'section_3_deskripsi_ID' => $this->input->post('deskripsi_ID'),
                'section_3_video'=> $this->input->post('url_video')
        );
        $id = $this->input->post('id');
        if($this->model_pagehome->update_page($id,$data)) {
            $alert = url_title("Update succses !");
            redirect('pagehome/?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('pagehome/?n='.$alert,'refresh');
        }
    }

    public function update_section4(){
        $data = array(
                'section_4_judul_EN' => $this->input->post('title_EN'),
                'section_4_judul_ID' => $this->input->post('title_ID'),
                'section_4_deskripsi_EN' => $this->input->post('deskripsi_EN'),
                'section_4_deskripsi_ID' => $this->input->post('deskripsi_ID')
        );
        $id = $this->input->post('id');
        if($this->model_pagehome->update_page_section4($id,$data)) {
            $alert = url_title("Update succses !");
            redirect('pagehome/?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('pagehome/?n='.$alert,'refresh');
        }
    }
    
    public function update_section5(){
        $id = $this->input->post('id');
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/images/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title')))."-home";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('pagehome/' . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'section_5_judul_EN' => $this->input->post('title_EN'),
                    'section_5_judul_ID' => $this->input->post('title_ID'),
                    'section_5_deskripsi_EN' => $this->input->post('deskripsi_EN'),
                    'section_5_deskripsi_ID' => $this->input->post('deskripsi_ID'),
                    'section_5_image'=> $this->upload->file_name
                );
                if($this->model_pagehome->update_page_section5($id,$data)) {
                    $alert = url_title("Update succses !");
                    redirect('pagehome/?n='.$alert,'refresh');
                }else{
                    $alert = url_title("Save failde !");
                    redirect('pagehome/?n='.$alert,'refresh');
                }
            }
        } else {
                $data = array(
                    'section_5_judul_EN' => $this->input->post('title_EN'), 
                    'section_5_judul_ID' => $this->input->post('title_ID'),
                    'section_5_deskripsi_EN' => $this->input->post('deskripsi_EN'),
                    'section_5_deskripsi_ID' => $this->input->post('deskripsi_ID')
                );
                if($this->model_pagehome->update_page_section5($id,$data)) {
                    $alert = url_title("Update succses !");
                    redirect('pagehome/?n='.$alert,'refresh');
                }else{
                    $alert = url_title("Save failde !");
                    redirect('pagehome/?n='.$alert,'refresh');
                }
        }
    }
    
    public function update_distribution_maps(){
        $id = $this->input->post('id');
        $file_image = (isset($_FILES['distribution_maps']) == TRUE ? $_FILES['distribution_maps'] : null); // ambil dahulu
        $config ['upload_path'] = "./document/images/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title')))."-home";
        $config ['max_size'] = '5500';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('distribution_maps')) {
                $alert = $this->upload->display_errors();
                redirect('pagehome/' . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'distribution_maps'=> $this->upload->file_name
                );
                if($this->model_pagehome->update_page_distribution_maps($id,$data)) {
                    $alert = url_title("Update succses !");
                    redirect('pagehome/?n='.$alert,'refresh');
                }else{
                    $alert = url_title("Save failde !");
                    redirect('pagehome/?n='.$alert,'refresh');
                }
            }
        } else {
            $alert = url_title("Image Distribution Maps Not Found !");
            redirect('pagehome/?n='.$alert,'refresh');
        }
    }

    public function content_edit(){
        $data = array(
            'url'=> $this->url,
            'session_group_name' => $this->sess['group_name'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang')
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('front-end/aboutus.tpl');
    }
}
