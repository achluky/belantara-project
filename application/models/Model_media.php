<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_media extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_listmedia($offset, $limit)
    {
    	$sql = "select * from media_item ORDER BY updated_at DESC LIMIT $offset, $limit ";
    	$result = $this->db->query($sql);
    	return $result;
        
    }

    public function get_list_media_by_group_by_type($offset,$limit,$type){
        $sql = "SELECT * from media_item WHERE type='".$type."' ORDER BY updated_at DESC LIMIT $offset, $limit";
        return $this->db->query($sql);
    }
    
    public function getById($id){
        $this->db->where('id',$id);
        return $this->db->get('media_item')->row();
    }
    
    public function insert($data){
        $this->db->insert('media_item',$data);
        return TRUE;
    }
    
    public function edit($id,$data){
        $this->db->where('id',$id);
        $this->db->update('media_item',$data);
        return TRUE;
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('media_item');
        return TRUE;
    }
}