<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pengaturansistem extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listpengaturan()
    {
        $this->db->select('*');
        $this->db->from('pengaturan_sistem');
        return $this->db->get();
    }

    public function get_pengaturansistem_by_id($id){
        $this->db->select('*');
        $this->db->from('pengaturan_sistem');
        $this->db->where('pengaturan_sistem.id',$id);
        return $this->db->get()->row();   
    }
    
    public function save_pengaturansistem($data){
        $this->db->insert('pengaturan_sistem',$data);
        return TRUE;
    }

    public function update_pengaturansistem($data){
        foreach ($data as $key => $value) {
            $this->db->where('id',$key+1);
            $get['nilai']=$value;   
            $this->db->update('pengaturan_sistem',$get);
        }
        return TRUE;
    }

    public function delete_reputation($id){
        $this->db->where('id',$id);
        $this->db->delete('pengaturan_sistem');
        return TRUE;
    }
}
