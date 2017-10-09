<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link extends CI_Controller {

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
        $this->navbar->setMenuActive('link');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
		$this->load->model('model_link');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index(){
        $data = array(
            'lang'=>$this->session->userdata('id_bahasa'),
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Link list' => base_url().'link'
            ),
            'link' => $this->model_link->get_listlink(),
            'title'=> 'Link <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/link.tpl');
    }


    public function update(){
        $data = array(
                    'sort' => $this->input->post('pos')
                );
        if($this->model_link->link_update($data)){
            $alert = url_title("update succses !");
            redirect('link/?n='.$alert,'refresh');
        }
    }

    public function add(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Link list' => base_url().'link'
            ),
            'title'=> 'Link <small>management</small>',
             'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/link_add.tpl');
    }


    public function save(){
        $data = array(
                    'nama_link_id' => $this->input->post('link_id'),
                    'nama_link_en' => $this->input->post('link_en'),
                    'link' => $this->input->post('link')
                );

        if($this->model_link->save_link($data)) {
            $alert = url_title("Save succses !");
            redirect('link?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('link/add'.$alert,'refresh');
        }
    }

    public function edit($id){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'User list' => base_url().'user',
                'User' => base_url()
            ),
            'user' => $this->model_user->get_user($id),
            'title'=> 'User <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/user_edit.tpl');
    }


    public function delete($id){
        $data = array(
            'url'=> $this->url,
            'id_berita' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'User list' => base_url().'user'
            ),
            'title'=> 'User <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        if (isset($_GET['n']) and $_GET['n'] != NULL)
            if ($this->model_user->delete($id)){
                $alert = url_title("delete succses !");
                redirect('user/?n='.$alert,'refresh');   
            }
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/user_delete.tpl');
    }

}