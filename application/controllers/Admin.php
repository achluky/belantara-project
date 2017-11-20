<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
* @ahmadluky
*/
class Admin extends CI_Controller {

    public $url;
    
    function __construct() 
    {
        parent::__construct();
		$this->load->library('navbar');
        $this->navbar->setMenuActive('dashboard');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
		$this->load->model('model_admin');
		$this->url = current_url();		
    }
    
    public function index(){
        //cek session login
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }

        $sess = $this->session->userdata('logged_in');
        
        $data = array(
            'url'=> $this->url,
            'title'=> 'DASHBOARD',
            'session' => $sess['username'],
            'group_name' => $sess['group_name'],
            'last_login' => $sess['last_login'],
            'content'=> 'widget'
        );
		
		$this->smartyci->assign('data',$data);
        $this->smartyci->display('dashboard/dashboard-'.$data['group_name'].'.tpl');
    }

    public function auth()
    {
        if (isset($_POST['user']) and $_POST['user'] != NULL) {
            if(isset($_POST['pwd']) and $_POST['pwd'] != NULL){
                
                $salt       = $this->model_admin->get_salt($_POST['user']);
                $result     = $this->model_admin->auth($_POST['user'], $_POST['pwd'], $salt);
				
                if($result->num_rows()){
                    $sess_array = array();
                    foreach ($result->result() as $row)
                    {
					    $sess_array = array(
                          'id' => $row->id,
                          'username' => $row->username,
                          'group_name' => strtolower($row->group_name),
                          'last_login' => $row->last_login
                        );
                        $this->session->set_userdata('logged_in', $sess_array);
                    }
					$this->model_admin->set_last_login($sess_array['username']);
                    redirect($this->config->item('base_url').'admin', 'refresh');
                }else{
                    $this->load->library('ldap_auth');
					$result = $this->ldap_auth->auth($_POST['user'], $_POST['pwd']);
					if($result){
						if($salt===null){
							$this->model_admin->save_user_from_ldap($result[0], $_POST['user'], $_POST['pwd']);
						}
						$result = $this->model_admin->auth_ldap($result[0]["uid"][0], $salt);
						if($result->num_rows()){
							$sess_array = array();
							foreach ($result->result() as $row)
							{
								$sess_array = array(
								  'id' => $row->id,
								  'username' => $row->username,
								  'group_name' => strtolower($row->group_name),
								  'last_login' => $row->last_login
								);
								$this->session->set_userdata('logged_in', $sess_array);
							}
							$this->model_admin->set_last_login($sess_array['username']);
							redirect($this->config->item('base_url').'admin', 'refresh');
						}
					}
					if($salt===null){
						$data['error_msg']  = "Not Found username";      
					}else{
						$data['error_msg']  = "Invalid password";      
					}
                }

            }else{
                $data['error_msg']  = "Invalid username or password";
                
            }
        }else{
            $data['error_msg']  = "Invalid username or password";
        }
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('login.tpl');
    }

    public function logout()
    {
        if($this->session->userdata('logged_in'))
        {
            $this->session->sess_destroy();
            redirect($this->config->item('base_url').'login', 'refresh');
        }else{
            redirect($this->config->item('base_url').'login', 'refresh');
        }
    }

}
