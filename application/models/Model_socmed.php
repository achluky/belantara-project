<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_socmed extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listsocmed()
    {
        $this->db->select('*');
        $this->db->from('social_media');
        return $this->db->get();
    }
	
	public function save_socmed($data){
        $this->db->insert('social_media',$data);
        return TRUE;
    }
	
	public function get_socmed_by_id($id){
        $this->db->select('*');
        $this->db->from('social_media');
        $this->db->where('social_media.id',$id);
        return $this->db->get()->row();   
    }
	
	public function update_socmed($id,$data){
        $this->db->where('id',$id);
        $this->db->update('social_media',$data);
        return TRUE;
    }
	
	public function delete_socmed($id){
        $this->db->where('id',$id);
        $this->db->delete('social_media');
        return TRUE;
    }
}
