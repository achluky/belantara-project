<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_link extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listlink()
    {
    	$sql = "select nama_links_".$this->session->userdata('site_lang').", id_links from menulinks ORDER BY urutan ";
        $result = $this->db->query($sql);
    	return $result;
    }

    public function get_ling($id)
    {
    	$sql = "select * from menulinks WHERE id_links='".$id."' ";
    	$result = $this->db->query($sql);
    	return $result->row();
    }

    public function link_update($data)
    {
        foreach ($data['sort'] as $key => $value) {
            $sql = "update menulinks   
                SET urutan='".$key."'
                WHERE id_links = '".$value."'";
            $this->db->query($sql);
        }

        return TRUE;
    }

    public function save_link($data)
    {


        $sql = "select MAX(urutan) as urutan from menulinks";
        $result = $this->db->query($sql);
        $rst = $result->row();

        $sql = "insert into menulinks 
                values ('',
                        '".$data['nama_link_id']."',
                        '".$data['nama_link_en']."',
                        '".$data['link']."',
                        '',
                        ".$rst->urutan."
                        )";
        $this->db->query($sql);
        return TRUE;
    }

    public function delete($id){
    	$sql = "Update menulinks SET is_active=0 WHERE id='".$id."' ";
    	return $this->db->query($sql);
    }
}
