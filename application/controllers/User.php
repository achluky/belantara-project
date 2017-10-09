<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->navbar->setMenuActive('user');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
		$this->load->model('model_user');
        $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');
    }

    public function index(){
        $this->navbar->setSubMenuActive('list');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'User list' => base_url().'user'
            ),
            'user' => $this->model_user->get_listuser(),
            'title'=> 'User <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/user.tpl');
    }

    public function add(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'User list' => base_url().'user'
            ),
            'level'=> $this->model_user->get_listuserGroups(),
            'title'=> 'User <small>management</small>',
            'last_login' => $this->sess['last_login'],
			'session' => $this->sess['username']
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/user_add.tpl');
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
            'level'=> $this->model_user->get_listuserGroups(),
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

    public function active($id){
        if(!$this->model_user->active($id)) {
            $alert = url_title("User Active !");
            redirect('user?n='.$alert,'refresh');
        }else{
            $alert = url_title("Update failde !");
            redirect('user?n='.$alert,'refresh');
        }
    }

    public function save(){
        $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'password_again' => $this->input->post('password_again'),
                    'level' => $this->input->post('level')
                );

        if ( ($this->input->post('username') != NULL) and ($this->input->post('password') != NULL) ) {

                if(!$this->model_user->save_user($data)) {
                    $alert = url_title("Save succses !");
                    redirect('user?n='.$alert,'refresh');
                }else{
                    $alert = url_title("Save failde !");
                    redirect('user/add?n='.$alert,'refresh');
                }

        }else{

            $alert = url_title("Isi empty !");
            redirect('user/add?n='.$alert,'refresh');
        }
    }

    public function update(){
        if(!$this->model_user->update_user($_POST)) {
            $alert = url_title("Update succses !");
            redirect('user?n='.$alert,'refresh');
        }else{
            $alert = url_title("Update failde !");
            redirect('user/edit?n='.$alert,'refresh');
        }
    }

    public function groups($var=NULL,$id=NULL){
        $this->navbar->setSubMenuActive('group_list');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
        if ($var=='add') {
            $data = array(
                'url'=> $this->url,
                'alert' => isset($_GET['n'])?$_GET['n']:'',
                'breadcrumb' => array(
                    'Dashboard'=>base_url().'admin',
                    'User Groups List'=>base_url().'/user/groups',
                ),
                'title'=> 'User <small>Groups management</small>',
                'last_login' => $this->sess['last_login'],
				'session' => $this->sess['username']
            );
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/user-groups-add.tpl');
        } elseif($var=='save'){
            $this->model_user->save_groups($_POST);
            $alert = url_title("Groups User Succses Save !");
            redirect('user/groups/?n='.$alert,'refresh');
        } elseif($var=='delete'){
            $this->model_user->delete_groups($id);
            $alert = url_title("Groups User Succses Delete !");
            redirect('user/groups/?n='.$alert,'refresh');
        } elseif($var=='edit'){
            $data = array(
                'url'=> $this->url,
                'alert' => isset($_GET['n'])?$_GET['n']:'',
                'breadcrumb' => array(
                    'Dashboard'=>base_url().'admin',
                    'User Groups List'=>base_url().'/user/groups',
                ),
                'user_groups' => $this->model_user->get_userGroups($id),
                'title'=> 'User <small>Groups management</small>',
                'last_login' => $this->sess['last_login'],
				'session' => $this->sess['username']
            );
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/user-groups-edit.tpl');
        } elseif($var=='update'){
            $this->model_user->update_groups($_POST);
            $alert = url_title("Groups User Succses Update !");
            redirect('user/groups/?n='.$alert,'refresh');
        } else {
            $data = array(
                'url'=> $this->url,
                'alert' => isset($_GET['n'])?$_GET['n']:'',
                'breadcrumb' => array(
                    'Dashboard'=>base_url().'admin'
                ),
                'user_groups' => $this->model_user->get_listuserGroups(),
                'title'=> 'User <small>Groups management</small>',
                'last_login' => $this->sess['last_login'],
				'session' => $this->sess['username']
            );
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/user-groups.tpl');
        }
    }
}