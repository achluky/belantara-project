<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listuser()
    {
    	$sql = "select * from sf_guard_user ORDER BY username ";
    	$result = $this->db->query($sql);
    	return $result;
    }

    public function get_user($id)
    {
    	$sql = "select * from sf_guard_user WHERE id='".$id."' ";
    	$result = $this->db->query($sql);
    	return $result->row();
    }

    public function delete($id){
    	$sql = "Update sf_guard_user SET is_active=0 WHERE id='".$id."' ";
    	return $this->db->query($sql);
    }

    public function save_user($data){
        $salt = uniqid();
        $password   = sha1($salt.$data['password']);
        
        $sql = "insert into sf_guard_user 
                values ('',
                        '".$data['username']."',
                        'sha1',
                        '".$salt."',
                        '".$password."',
                        '1',
                        '".$data['level']."',
                        '".date("Y-m-d H:i:s")."',
                        '".date("Y-m-d H:i:s")."',
                        '".date("Y-m-d H:i:s")."' 
                        )";
        $this->db->query($sql);
    }

    public function update_user($POST){
        if ($POST['password'] != NULL and $POST['password_again'] != NULL) {
            $sql  = "select salt from sf_guard_user where username='".$POST['username']."'";
            $rst  = $this->db->query($sql);
            $ro   = $rst->row(); 
            $data = array(
               'password' => sha1($ro->salt.$POST['password']),
               'is_super_admin' => $POST['level'],
               'updated_at' => date("Y-m-d")
            );
            
            $this->db->where('id', $POST['id']);
            $this->db->update('sf_guard_user', $data); 
        }else{
            $data = array(
               'is_super_admin' => $POST['level'],
               'updated_at' => date("Y-m-d")
            );
            
            $this->db->where('id', $POST['id']);
            $this->db->update('sf_guard_user', $data); 
        }
    }

    public function active($id){
        $data = array(
           'is_active' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('sf_guard_user', $data); 
    }

    public function get_listuserGroups(){
        $sql = "SELECT * FROM sf_guard_group";
        return $this->db->query($sql);
    }

    public function save_groups($POST){
        $sql = "insert into sf_guard_group 
                values ('',
                        '".$POST['name']."',
                        '".$POST['description']."',
                        '".date("Y-m-d H:i:s")."',
                        '".date("Y-m-d H:i:s")."'
                        )";
        $this->db->query($sql);
    }

    public function delete_groups($id){
        $sql = "DELETE FROM sf_guard_group WHERE id=".$id." ";
        return $this->db->query($sql);
    }

    public function get_userGroups($id){
        $sql = "SELECT * FROM sf_guard_group WHERE id=".$id." ";
        $rst = $this->db->query($sql);
        return $rst->row();
    }

    public function update_groups($POST){
        $data = array(
           'name' => $POST['name'],
           'description' => $POST['description']
        );
        
        $this->db->where('id', $POST['id']);
        $this->db->update('sf_guard_group', $data); 
    }

    public function import_user($data){

        foreach ($data as $key => $value) {
            
            $sql = "insert into sf_guard_user 
                     values ('',
                            '".$value."',
                            'sha1',
                            '',
                            '',
                            '1',
                            '5',
                            '".date("Y-m-d H:i:s")."',
                            '".date("Y-m-d H:i:s")."',
                            '".date("Y-m-d H:i:s")."' 
                            )";
            $this->db->query($sql);
        }

        return TRUE;
    }
}
