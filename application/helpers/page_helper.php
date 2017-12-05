<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_page($urutan, $url){
    $CI =& get_instance();
    $sql = "SELECT * FROM widget WHERE name = '".$url."' and urutan = ".$urutan."";
    $rst = $CI->db->query($sql);
    return $rst->row();
}

function get_grant_kegiatan_dana_lanjut($id_kegiatan_dana){

    $CI =& get_instance();
    $sql = "SELECT * FROM grant_kegiatan_dana_lanjut WHERE id_kegiatan_dana = '".$id_kegiatan_dana."' ";
    return $CI->db->query($sql);

}

function get_grant_kegiatan_dana_jumlah($id_kegiatan_dana){
    $CI =& get_instance();
    $sql = "SELECT sum(jumlah) as jumlah_dana FROM grant_kegiatan_dana_lanjut WHERE id_kegiatan_dana = '".$id_kegiatan_dana."' ";
    return $CI->db->query($sql)->row();

}

function get_grant_status_by_id($id_status){
    $CI =& get_instance();
    $sql = "SELECT status FROM grant_status WHERE id_status = ".$id_status." ";
    return $CI->db->query($sql)->row();

}

