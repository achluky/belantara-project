<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_gallery extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function get_listgallery($offset, $limit)
    {
    	$sql = "select * from gallery ORDER BY tanggal DESC LIMIT $offset, $limit ";
    	$result = $this->db->query($sql);
    	return $result;
    }

    public function get_gallery($id)
    {
    	$sql = "select * from gallery WHERE  id='".$id."' ";
    	$result = $this->db->query($sql);
    	return $result->row();
    }

    public function update_gallery($data,$id, $img=NULL)
    {
        if ($img != NULL) {
            $sql = "update gallery 
                    SET 
                    title='".$data['title']."', 
                    title_en='".$data['title_en']."', 
                    deskripsi='".$data['deskripsi']."', 
                    deskripsi_en='".$data['deskripsi_en']."', 
                    image='".$img."'
                    WHERE 
                    id='".$id."'";
        }else{
            $sql = "update gallery 
                    SET 
                    title='".$data['title']."', 
                    title_en='".$data['title_en']."', 
                    deskripsi='".$data['deskripsi']."', 
                    deskripsi_en='".$data['deskripsi_en']."'
                    WHERE 
                    id='".$id."'";
        }
    	return $this->db->query($sql);
    }

    public function save_gallery($data, $id, $image)
    {
        $sql = "insert into gallery 
                values ('".$id."',
                		'".$image."',
                        '".$data['title']."',
                        '".$data['title_en']."',
                        '".$data['deskripsi']."',
                        '".$data['deskripsi_en']."',
                        '".date("Y-m-d H:i:s")."')";
        $this->db->query($sql);
        return TRUE;
    }

    public function delete($id){
    	$sql = "delete from gallery WHERE id='".$id."' ";
    	return $this->db->query($sql);
    }
}
