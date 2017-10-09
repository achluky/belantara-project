<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public $url;
    public $sess;
	public function __construct() 
    {
        parent::__construct();
        //cek session login
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $this->load->library('navbar');
        $this->load->library('upload');
        $this->navbar->setMenuActive('banner');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
		$this->load->model('model_banner');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index(){
		$limit=20;
    	if (isset($_GET['p']) and $_GET['p']!=NULL ) {
    		$offset=$_GET['p'];
    	}else{
    		$offset=0;
    	}
        $data = array(
        	'limit'=>$limit,
        	'page'=>$offset,
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Banner list' => base_url().'banner'
            ),
            'banner_list' => $this->model_banner->get_listbanner($offset, $limit),
            'title'=> 'Banner <small>management</small>',
			'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/banner.tpl');
    }

    public function add(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Banner list' => base_url().'Banner'
            ),
            'title'=> 'Banner <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/banner_add.tpl');
    }

    public function edit($id){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Banner list' => base_url().'banner',
                'Banner' => base_url()
            ),
            'banner' => $this->model_banner->get_banner($id),
            'title'=> 'Barner <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/banner_edit.tpl');
    }

    public function update() {
        $id = $this->input->post('id');
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "../ipb/media/images/banner/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title')))."-banner";
        $config ['max_size'] = '5500';
        
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (isset($file_image['name']) and $file_image['name'] != '') {
            if (!$this->upload->do_upload('image')) {
                $alert = $this->upload->display_errors();
                redirect('banner/edit/' . $this->input->post('id') . '?n=' . $alert, 'refresh');
            } else {
                $data = array(
                    'deskripsi' => $this->input->post('deskripsi'),
                    'deskripsi_en' => $this->input->post('deskripsi_en'),
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'look' => $this->input->post('status'),
                    'link' => $this->input->post('link')
                );
                
                if($this->model_banner->update_banner($data, $id, $this->upload->file_name)){
                    $alert = url_title("update succses !");
                    redirect('banner/edit/'.$id.'/?n='.$alert,'refresh');
                }else{
                    $alert = url_title("update failde !");
                    redirect('banner/edit/'.$id.'?n='.$alert,'refresh');   
                }
            }
        } else {
                $data = array(
                    'deskripsi' => $this->input->post('deskripsi'),
                    'deskripsi_en' => $this->input->post('deskripsi_en'),
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'look' => $this->input->post('status'),
                    'link' => $this->input->post('link')
                );
                if($this->model_banner->update_banner($data, $id)){
                    $alert = url_title("update succses !");
                    redirect('banner/edit/'.$id.'/?n='.$alert,'refresh');
                }else{
                    $alert = url_title("update failde !");
                    redirect('banner/edit/'.$id.'?n='.$alert,'refresh');   
                }
        }
    }

  //   public function update(){
		// $id = $this->input->post('id');
  //       $data = array(
  //           'deskripsi' => $this->input->post('deskripsi'),
  //           'title' => $this->input->post('title'),
  //           'look' => $this->input->post('status'),
  //           'link' => $this->input->post('link')
  //       );

  //       $file_image = $_FILES['image'];
  //       if (isset($file_image['name']) and $file_image['name'] != '' ) {

  //           move_uploaded_file($file_image['tmp_name'], "../ipb/media/images/banner/" . $file_image['name']);
            
  //   		if($this->model_banner->update_banner($data, $id, $file_image['name'])){
	 //            $alert = url_title("update succses !");
	 //            redirect('banner/edit/'.$id.'/?n='.$alert,'refresh');
	 //        }else{
	 //            $alert = url_title("update failde !");
	 //            redirect('banner/edit/'.$id.'?n='.$alert,'refresh');   
	 //        }
	        
  //   	}else{
  //   		if($this->model_banner->update_banner($data, $id)){
	 //            $alert = url_title("update succses !");
	 //            redirect('banner/edit/'.$id.'/?n='.$alert,'refresh');
	 //        }else{
	 //            $alert = url_title("update failde !");
	 //            redirect('banner/edit/'.$id.'?n='.$alert,'refresh');   
	 //        }
  //   	}
  //   }

    public function save() {
        $file_image = (isset($_FILES['image']) == TRUE ? $_FILES['image'] : null); // ambil dahulu
        $config ['upload_path'] = "../ipb/media/images/banner/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'JPG|jpg|JPEG|jpeg|PNG|png'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = url_title(slug($this->input->post('title')))."-banner";
        $config ['max_size'] = '5500';
        $config['max_width'] = '1200'; //1000x200pixel
        $config['max_height'] = '400';
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (($this->input->post('deskripsi_en') != NULL) and ( $this->input->post('title_en') != NULL)) {
            if (isset($file_image['name']) and $file_image['name'] != '') {
                if (!$this->upload->do_upload('image')) {
                    $alert = $this->upload->display_errors();
                    redirect('banner/add?n=' . $alert, 'refresh');
                } else {
                    $id = generateId();
                    $data = array(
                        'deskripsi' => $this->input->post('deskripsi'),
                        'deskripsi_en' => $this->input->post('deskripsi_en'),
                        'title' => $this->input->post('title'),
                        'title_en' => $this->input->post('title_en'),
                        'look' => $this->input->post('status'),
                        'link' => $this->input->post('link')
                    );

                    if($this->model_banner->save_banner($data, $id, $this->upload->file_name)){
                        $alert = url_title("Add succses !");
                        redirect('banner/edit/'.$id.'/?n='.$alert,'refresh');
                    }else{
                        $alert = url_title("Add faild !");
                        redirect('event/edit/'.$id.'?n='.$alert,'refresh');   
                    }
                }
            } else {
                $alert = url_title("File Not Found !");
                redirect('banner/add?n=' . $alert, 'refresh');
            }
        } else {
            $alert = url_title("Isi empty !");
            redirect('banner/add?n=' . $alert, 'refresh');
        }
    }

    public function delete($id){
        $data = array(
            'url'=> $this->url,
            'id_banner' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Banner list' => base_url().'barner'
            ),
            'title'=> 'Banner <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_banner->delete($id)){
                $alert = url_title("delete succses !");
                redirect('banner/?n='.$alert,'refresh');   
            }
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/banner_delete.tpl');
    }

}
