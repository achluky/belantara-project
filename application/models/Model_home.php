<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_home extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_slider(){
        $sql = "select * from slide_image_new";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_page_home(){
        $sql = "select * from page_home where id =1000";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function get_blog($lang){
        $sql = "select * from berita_ini where kategori = 'blog' and id_bahasa = '".$lang."' LIMIT 3";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_news($lang){
        $sql = "select * from berita_ini where kategori = 'news' and id_bahasa = '".$lang."' ORDER BY waktu DESC LIMIT 3";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_resource($lang){
        $sql = "select * from berita_ini where kategori = 'resource' and id_bahasa = '".$lang."' ORDER BY waktu DESC LIMIT 3";
        $result = $this->db->query($sql);
        return $result;
    }
    public function get_employee_management()
    {
    	$sql = "select * from person where idcategory = 7";
    	$result = $this->db->query($sql);
    	return $result;
    }
    
    public function get_employee_adv_committee()
    {
    	$sql = "select * from person where idcategory = 12";
    	$result = $this->db->query($sql);
    	return $result;
    }

    public function get_employee_boards(){
        $sql = "select a.*, b.category_EN, b.category_ID from person a left join ref_category_employee b ON b.id = a.idcategory where a.idcategory <> 7 and a.idcategory <> 12";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_boards_category(){
        $sql = "select * from ref_category_employee where id <> 7 and id <> 12";
        $result = $this->db->query($sql);
        return $result;
    }
    
    public function get_detail_boards($id)
    {
        $sql = "select * from person a left join ref_category_employee b ON b.id = a.idcategory where a.idPerson=$id";
        $result = $this->db->query($sql);
        return $result->row();
    }
}
