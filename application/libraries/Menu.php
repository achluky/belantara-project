<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu {
    public function __construct() {
    }

    public function getMainMenu(){
    	$CI =& get_instance();
		$CI->load->model('Model_menu');
    	$site_lang = $CI->session->userdata('site_lang');
    	$data['menuUtama'] = $CI->Model_menu->getMenuUtama($site_lang);
    	// echo '<pre>';
    	// print_r($data['menuUtama']);
    	// die();
        $menu = array();
        if(!empty($data['menuUtama'])){
        	foreach ($data['menuUtama'] as $key=> $value) {
	            if($value->is_parent == 1)
	            {
	                $menu[$value->id]['menu'] = $value;
	                
	                if($value->is_megamenu == 1){
	                    $group_menu = $CI->Model_menu->getGroup($value->id,$site_lang);
	                    $menu[$value->id]['group'] = $group_menu;

	                    // memasukkan submenu ke group menu
	                    if(!empty($group_menu)){
	                    	foreach ($group_menu as $key => $groups) {
		                        $menu[$value->id]['submenu'][$key] = $CI->Model_menu->getSubMenuByGroupId($groups->id,$site_lang);
		                    }
	                    }
	                }
	                else{
	                	// ambil sub menu yang bukan megamenu
	                	$getSubMenu = $CI->Model_menu->getSubMenu($value->id,$site_lang);

	                    if(!empty($getSubMenu)){
	                        $menu[$value->id]['submenu'] = $getSubMenu; 
	                    } 
	                }
	           //      echo '<pre>';
        				// print_r($getSubMenu);
        				// echo $site_lang;
        				// die();

	            }
	        }
        }
        return $menu;
        
    }	
}
