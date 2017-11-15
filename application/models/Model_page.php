<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_page extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listpage()
    {
    	$sql = "select * from page_ini ORDER BY waktu DESC";
    	$result = $this->db->query($sql);
    	return $result;
    }
    public function get_page(){
        $sql = "select id,title from page_ini ORDER BY waktu DESC";
        $result = $this->db->query($sql);
        return $result;   
    }
    public function get_page_by_id($id){
        $this->db->select('*');
        $this->db->from('page_ini');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }

    public function get_page_by_slug($slug){
        $this->db->select('*');
        $this->db->from('page_ini');
        $this->db->where('url',$slug);
        return $this->db->get()->row();
    }

    public function save_page($data){
        $this->db->insert('page_ini',$data);
        return TRUE;
    }

    public function update_page($id,$data){
        $this->db->where('id',$id);
        $this->db->update('page_ini',$data);
        return TRUE;
    }
    
    public function update_page_contact($slug,$data){
        $this->db->where('url',$slug);
        $this->db->update('page_ini',$data);
        return TRUE;
    }

    public function delete($id){
        $hasil['id'] = $id;
        $this->db->delete('page_ini',$hasil);
        return TRUE;
    }
}
