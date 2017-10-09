<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_banner extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function get_listbanner($offset, $limit)
    {
    	$sql = "select * from slide_image_new ORDER BY tanggal DESC LIMIT $offset, $limit ";
    	$result = $this->db->query($sql);
    	return $result;
    }

    public function get_banner($id)
    {
    	$sql = "select * from slide_image_new WHERE  id='".$id."' ";
    	$result = $this->db->query($sql);
    	return $result->row();
    }

    public function update_banner($data,$id, $img=NULL)
    {
        if ($img != NULL) {
            $sql = "update slide_image_new 
                    SET 
                    title='".$data['title']."', 
                    title_en='".$data['title_en']."', 
                    deskripsi='".$data['deskripsi']."', 
                    deskripsi_en='".$data['deskripsi_en']."', 
                    link='".$data['link']."', 
                    look='".$data['look']."',
                    image='".$img."'
                    WHERE 
                    id='".$id."'";
        }else{
            $sql = "update slide_image_new 
                    SET 
                    title='".$data['title']."', 
                    title_en='".$data['title_en']."', 
                    deskripsi='".$data['deskripsi']."', 
                    deskripsi_en='".$data['deskripsi_en']."', 
                    link='".$data['link']."', 
                    look='".$data['look']."'
                    WHERE 
                    id='".$id."'";
        }
    	return $this->db->query($sql);
    }

    public function save_banner($data, $id, $image)
    {
        $sql = "insert into slide_image_new 
                values ('".$id."',
                		'".$image."',
                        '".$data['title']."',
                        '".$data['title_en']."',
                        '".$data['deskripsi']."',
                        '".$data['deskripsi_en']."',
                        '".$data['link']."',
                        '".$data['link']."',
                        1,
                        '".date("Y-m-d H:i:s")."')";
        $this->db->query($sql);
        return TRUE;
    }

    public function delete($id){
    	$sql = "delete from slide_image_new WHERE id='".$id."' ";
    	return $this->db->query($sql);
    }
}
