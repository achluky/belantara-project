<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_menu extends CI_Controller {

    public $url;
    public $sess;
    public function __construct()  
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('main');
        $this->smartyci->assign('navbar',$this->navbar->getMenu());
        
        $this->load->model('model_menu');
        $this->load->model('model_page');
        $this->load->model('model_groupmenu');

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
                ''.$this->lang->line('navigation.navbar.main_menu').'' => base_url().'Menu'
                ),
            'menu_list' => $this->model_menu->get_listmenu(),
            'group_list' => $this->model_groupmenu->get_listgroup()->result(),
            'title'=> 'Menu <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
            );

        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/menu.tpl');
    }

    public function add(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'menu list' => base_url().'main_menu'
                ),
            'page' => $this->model_page->get_listpage()->result(),
            'groupmenu'=>$this->model_groupmenu->get_listgroup()->result(),
            'menuparent'=>$this->model_menu->get_listmenu($this->session->userdata('id_bahasa')),
            'title'=> 'menu <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/menu_add.tpl');
    }
    public function add_group(){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Group menu list' => base_url().'main_menu'
                ),
            'title'=> 'Group Menu <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/groupmenu_add.tpl');
    }


    public function save(){
        $data = array(
            'title_ID' => $this->input->post('menu_id'),
            'title_EN' => $this->input->post('menu_en'),
            'position' => $this->input->post('posisi'),
            'link_type'=> $this->input->post('link_type'),
            'page_id' => ($this->input->post('link_type') == 1 ? $this->input->post('page_id') : 0),
            'url'=> ($this->input->post('link_type') == 2 ? $this->input->post('link') : $this->input->post('url')),
            'uri'=> ($this->input->post('link_type') == 3 ? $this->input->post('name_module') : $this->input->post('uri')),
            'is_parent' => $this->input->post('is_parent'),
            'have_child' => ($this->input->post('is_parent') == 1 ? $this->input->post('have_child') : 0),
            'is_megamenu'=> (empty($this->input->post('is_megamenu')) ? 0 : $this->input->post('is_megamenu')),
            'show_menu' => $this->input->post('show_menu'),
            'parent_id'=> ($this->input->post('is_parent') == 0 ? $this->input->post('parent_id') : 0),
            'dyn_group_id'=>($this->input->post('is_parent') == 0 ? $this->input->post('group_id') : 0),
        );
        //print_r($data);
        if($this->model_menu->save_menu($data)) {
            $alert = url_title("Save succses !");
            redirect('main_menu?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('main_menu/add'.$alert,'refresh');
        }
    }
    public function save_group(){
        $data = array(
            'title_ID' => $this->input->post('title_ID'),
            'title_EN' => $this->input->post('title_EN'),
        );
        //print_r($data);
        if($this->model_groupmenu->save_group($data)) {
            $alert = url_title("Save succses !");
            redirect('main_menu?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('main_menu/add_group'.$alert,'refresh');
        }
    }

    public function edit($id){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Menu list' => base_url().'main_menu',
                'Menu' => base_url()
                ),
            'menu' => $this->model_menu->get_menu($id),
            'page' => $this->model_page->get_listpage()->result(),
            'groupmenu'=>$this->model_groupmenu->get_listgroup()->result(),
            'menuparent'=>$this->model_menu->get_listmenu($this->session->userdata('id_bahasa')),
            'title'=> 'Menu <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/menu_edit.tpl');
    }

    public function edit_group($id){
        $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Group Menu list' => base_url().'main_menu',
                'Menu' => base_url()
                ),
            'groupmenu'=>$this->model_groupmenu->get_group_by_id($id),
            'title'=> 'Group Menu <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/groupmenu_edit.tpl');
    }

    public function update(){
        $data = array(
            'title_ID' => $this->input->post('menu_id'),
            'title_EN' => $this->input->post('menu_en'),
            'position' => $this->input->post('posisi'),
            'link_type'=> $this->input->post('link_type'),
            'page_id' => ($this->input->post('link_type') == 1 ? $this->input->post('page_id') : 0),
            'url'=> ($this->input->post('link_type') == 2 ? $this->input->post('link') : $this->input->post('url')),
            'uri'=> ($this->input->post('link_type') == 3 ? $this->input->post('name_module') : $this->input->post('uri')),
            'is_parent' => $this->input->post('is_parent'),
            'have_child' => ($this->input->post('is_parent') == 1 ? $this->input->post('have_child') : 0),
            'is_megamenu'=> $this->input->post('is_megamenu'),
            'show_menu' => $this->input->post('show_menu'),
            'parent_id'=> ($this->input->post('is_parent') == 0 ? $this->input->post('parent_id') : 0),
            'dyn_group_id'=>($this->input->post('is_parent') == 0 ? $this->input->post('group_id') : 0),
        );
        $id = $this->input->post('id');
        //print_r($data);
        if($this->model_menu->update_menu($id,$data)) {
            $alert = url_title("Update succses !");
            redirect('main_menu/edit/'.$id.'?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('main_menu/edit/'.$id.'?n='.$alert,'refresh');
        }
    }

    public function update_group(){
        $data = array(
            'title_ID' => $this->input->post('title_ID'),
            'title_EN' => $this->input->post('title_EN'),
        );
        $id = $this->input->post('id');
        
        if($this->model_groupmenu->update_group($id,$data)) {
            $alert = url_title("Update succses !");
            redirect('main_menu/edit/'.$id.'?n='.$alert,'refresh');
        }else{
            $alert = url_title("Save failde !");
            redirect('main_menu/edit_group/'.$id.'/'.$alert,'refresh');
        }
    }

    public function delete($id){
        $data = array(
            'url'=> $this->url,
            'id' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'User list' => base_url().'user'
                ),
            'title'=> 'Menu <small>management</small>',
            'child'=> $this->model_menu->childmenu($id),
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            $this->model_menu->delete($id);
            $alert = url_title("delete succses !");
            redirect('main_menu/?n='.$alert,'refresh');   
        }
        
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/menu_delete.tpl');
    }

    public function delete_group($id){
        $data = array(
            'url'=> $this->url,
            'id' => $id,
            'alert' => "Anda yakin akan mendelete data ini !",
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'User list' => base_url().'user'
                ),
            'title'=> 'Group Menu <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username'],
            'site_lang'=>$this->session->userdata('site_lang'),
            );
        
        if (isset($_GET['n']) and $_GET['n'] != NULL){
            $this->model_groupmenu->delete_group($id);
            $alert = url_title("delete succses !");
            redirect('main_menu/?n='.$alert,'refresh');   
        }
        
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/groupmenu_delete.tpl');
    }

    public function menu_dynamic(){
        $this->load->library('menu');

        $menu = $this->menu->getMainMenu();
        $this->smartyci->assign('menu',$menu);

        $data = array(
            'url'=> $this->url,
            'site_lang'=>  $this->session->userdata('site_lang'),
            );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/main-nav-dynamic.tpl');
    }

    public function ajax_parent_isMegamenu(){
        $id_parent = $this->input->post('parent_id');

        if(!empty($id_parent)){
            echo json_encode($this->model_menu->isMegamenu($id_parent));
        }
    }

}
