<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pagehome extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listpage()
    {
    	$sql = "select * from page_home ORDER BY waktu DESC";
    	$result = $this->db->query($sql);
    	return $result;
    }
    public function get_page(){
        $sql = "select id,title from page_home ORDER BY waktu DESC";
        $result = $this->db->query($sql);
        return $result;   
    }
    public function get_page_by_id($id){
        $this->db->select('*');
        $this->db->from('page_home');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }

    public function save_page($data){
        $this->db->insert('page_home',$data);
        return TRUE;
    }

    public function update_page($id,$data){
        $this->db->where('id',$id);
        $this->db->update('page_home',$data);
        return TRUE;
    }

    public function update_page_section4($id,$data){
        $this->db->where('id',$id);
        $this->db->update('page_home',$data);
        return TRUE;
    }

    public function update_page_section5($id,$data){
        $this->db->where('id',$id);
        $this->db->update('page_home',$data);
        return TRUE;
    }

    public function update_page_distribution_maps($id,$data){
        $this->db->where('id',$id);
        $this->db->update('page_home',$data);
        return TRUE;
    }
    

    public function delete($id){
        $hasil['id'] = $id;
        $this->db->delete('page_home',$hasil);
        return TRUE;
    }
}
