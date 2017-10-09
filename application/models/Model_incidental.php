<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_incidental extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_listincidental() {
        $sql = "select * from incidental ORDER BY aktif";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_incidental($id) {
        $sql = "select * from incidental WHERE id_incidental='" . $id . "' ";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function update_incidental($data) {
        $sql = "update incidental 
    			SET content_text_id='" . $data['content_text_id'] . "', content_text_en='" . $data['content_text_en'] . "',  
    				link='" . $data['link'] . "', aktif='" . $data['aktif'] . "' 
    			WHERE id_incidental = '" . $data['id'] . "'";
        return $this->db->query($sql);
    }

    public function save_incidental($data) {
        $sql = "insert into incidental 
                values ('" . generateId() . "',
                        '" . $data['content_text_id'] . "',
                        '" . $data['content_text_en'] . "',
                        '',  
                        '" . $data['link'] . "',
                        '',
                        '',
                        '" . $data['aktif'] . "')";
        $this->db->query($sql);
        return TRUE;
    }

    public function delete($id) {
        $sql = "delete from incidental WHERE id_incidental='" . $id . "' ";
        return $this->db->query($sql);
    }

}
