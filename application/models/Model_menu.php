<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_menu extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

     public function getMenuUtama($lang){
        $this->db->select('*');
        $this->db->from('dyn_menu');
        $this->db->where('dyn_menu.show_menu','1');
        //$this->db->where('dyn_menu.id_bahasa',$lang); 
        $this->db->order_by('dyn_menu.position','asc');       
        return $this->db->get()->result();
    }

    public function getSubMenu($parent_id,$lang){
        $this->db->select('*');
        $this->db->from('dyn_menu');
        $this->db->where('dyn_menu.parent_id',$parent_id);
        $this->db->where('dyn_menu.show_menu','1');
        $this->db->order_by('dyn_menu.position','asc');
        //$this->db->where('dyn_menu.id_bahasa',$lang);
        return $this->db->get()->result();
    }

    public function getGroup($parent_id,$lang){
        $this->db->select('dyn_groups.*');
        $this->db->from('dyn_menu');
        $this->db->join('dyn_groups','dyn_groups.id=dyn_menu.dyn_group_id');
        //$this->db->where('dyn_menu.is_megamenu','1');
        $this->db->where('dyn_menu.parent_id',$parent_id);
        //$this->db->where('dyn_menu.id_bahasa',$lang);
        $this->db->distinct();
        //$this->db->order_by('dyn_menu.position','asc');
        return $this->db->get()->result();
    }
    public function getSubMenuByGroupId($group_id,$lang){
        $this->db->select('*');
        $this->db->from('dyn_menu');
        $this->db->where('dyn_menu.dyn_group_id',$group_id);
        $this->db->where('dyn_menu.show_menu','1');
        $this->db->order_by('dyn_menu.position','asc');
        //$this->db->where('dyn_menu.id_bahasa',$lang);
        return $this->db->get()->result();
    }

    
    // backend
    public function get_listmenu()
    {
    	//$this->db->select('dyn_menu.*,mparent.title_ID mparent_ID,mparent.title_EN mparent_EN');
        $this->db->select('dyn_menu.*');
        $this->db->from('dyn_menu');
        //$this->db->join('dyn_menu mparent','mparent.parent_id=dyn_menu.id','left');
        return $this->db->get();
    }

    public function get_menu($id)
    {
    	$sql = "select * from dyn_menu WHERE id='".$id."' ";
    	$result = $this->db->query($sql);
    	return $result->row();
    }

    public function update_menu($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('dyn_menu',$data);
        return TRUE;
    }

    public function save_menu($data)
    {
        $this->db->insert('dyn_menu',$data);
        return TRUE;
    }

    public function delete($id){
    	//$sql = "Update dyn_menu SET WHERE id='".$id."' ";
    	$this->db->where('id',$id);
        $this->db->delete('dyn_menu');
    }

    public function isMegamenu($id){
        $this->db->select('dyn_menu.is_megamenu');
        $this->db->from('dyn_menu');
        $this->db->where('dyn_menu.id',$id);
        $result = $this->db->get()->row_array();
        return $result['is_megamenu'];
    }

    public function childmenu($id){
        $this->db->select('*');
        $this->db->from('dyn_menu');
        $this->db->where('dyn_menu.parent_id',$id);
        return $this->db->get()->result();
    }
}
