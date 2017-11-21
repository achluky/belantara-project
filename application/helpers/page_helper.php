<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_page($urutan, $url){
    $CI =& get_instance();
    $sql = "SELECT * FROM widget WHERE name = '".$url."' and urutan = ".$urutan."";
    $rst = $CI->db->query($sql);
    return $rst->row();
}