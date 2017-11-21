<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function convert_date($date){
	/*
	 *	change data
	 */
	$date = date("d-m-Y", strtotime($date));
	return $date;
}
function convert_date_format( $format,$date){
	/*
	 *	change data
	 */
	$date = date($format, strtotime($date));
	return $date;
}
function generateId(){
	 return md5(time().uniqid().rand());
}
function Status($id){
	if ($id == 1) {
		return "Active";
	}else{
		return "Non-Active";
	}
}
function debug($var){
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
	die();
}
function groups($id){
    $Ci =& get_instance();
    $sql = "SELECT name FROM sf_guard_group WHERE id = ".$id."";
    $rst = $Ci->db->query($sql);
    $r   =$rst->row();
    return $r->name;
}
function slug($text) {
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}
function checkApproval($id, $idReference, $table){
    $Ci =& get_instance();
	$SELECT = "SELECT * FROM ".$table." WHERE ".$idReference."='".$id."'";
	$rst =$Ci->db->query($SELECT);
	if($rst->num_rows())
		return TRUE;
	else
		return FALSE;
}
function getStrata($id){
	$Ci =& get_instance();
	$SELECT = "SELECT * FROM refStrata WHERE ID=".$id."";
	$rst =$Ci->db->query($SELECT);
	if($rst->num_rows()){
		$row = $rst->row();
		return $row->Nama;
	}else{
		return NULL;
	}
}
function getStructur($id){
	$Ci =& get_instance();
	$SELECT = "SELECT * FROM mstStrukturOrganisasi WHERE ID=".$id."";
	$rst =$Ci->db->query($SELECT);
	if($rst->num_rows()){
		$row = $rst->row();
		return $row->Nama;
	}else{
		return NULL;
	}
}
function getJenisKelaminID($id){
	$Ci =& get_instance();
	$SELECT = "SELECT * FROM refJenisKelamin WHERE ID=".$id."";
	$rst =$Ci->db->query($SELECT);
	if($rst->num_rows()){
		$row = $rst->row();
		return $row->Nama;
	}else{
		return NULL;
	}
}