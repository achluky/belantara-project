<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_groupmenu extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listgroup()
    {
    	$sql = "select * from dyn_groups ORDER BY id DESC";
    	$result = $this->db->query($sql);
    	return $result;
    }
    public function get_group(){
        $sql = "select * from dyn_groups ORDER BY id DESC";
        $result = $this->db->query($sql);
        return $result;   
    }
    public function get_group_by_id($id){
        $this->db->select('*');
        $this->db->from('dyn_groups');
        $this->db->where('dyn_groups.id',$id);
        return $this->db->get()->row();   
    }
    
    public function save_group($data){
        $this->db->insert('dyn_groups',$data);
        return TRUE;
    }

    public function update_group($id,$data){
        $this->db->where('id',$id);
        $this->db->update('dyn_groups',$data);
        return TRUE;
    }

    public function delete_group($id){
        $this->db->where('id',$id);
        $this->db->delete('dyn_groups');
        return TRUE;
    }
}
