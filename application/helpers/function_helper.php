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

function getStrataID($id){
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

function getPenemuPaten($id){
	$Ci =& get_instance();
	$SELECT =  "SELECT * 
				FROM trxPatenPenemu AS t1 
				LEFT JOIN mstorang AS t2 
				ON t1.OrangID=t2.ID
				WHERE t1.PatenID=".$id."";
	$rst =$Ci->db->query($SELECT);
	if($rst->num_rows()){
		$row = $rst->row();
		return $row->Nama;
	}else{
		return NULL;	
	}
}



function getPemilikPaten($id){
	$Ci 	= & get_instance();
	$SELECT = "	SELECT * 
				FROM trxPatenPemilik AS t1 
				LEFT JOIN mstorang AS t2 
				ON t1.OrangID=t2.ID
				WHERE t1.PatenID=".$id."";
	$rst 	=$Ci->db->query($SELECT);
	if($rst->num_rows()){
		$row = $rst->row();
		return $row->Nama;
	}else{
		return NULL;	
	}
}




function getJenisArtikel($id){
	$Ci =& get_instance();
	$SELECT = "SELECT * FROM refJenisArtikel WHERE ID=".$id."";
	$rst =$Ci->db->query($SELECT);
	if($rst->num_rows()){
		$row = $rst->row();
		return $row->Nama;
	}else{
		return NULL;	
	}
}

function getLingkup($id){
	$Ci =& get_instance();
	if (isset($id) and $id != NULL) {
		$SELECT = "SELECT * FROM refLingkup WHERE ID=".$id."";
		$rst =$Ci->db->query($SELECT);
		if($rst->num_rows()){
			$row = $rst->row();
			return $row->Tingkat;
		}else{
			return NULL;	
		}
	}else{
		return NULL;
	}
}

function getPenulisArtikel($idartikel){
	$Ci =& get_instance();
	if (isset($id) and $id != NULL) {
		$SELECT = "SELECT * FROM trxPenulisArtikel WHERE ID=".$idartikel."";
		$rst =$Ci->db->query($SELECT);
		if($rst->num_rows()){
			$row = $rst->row();
			return array($row->NamaPenulis, $row->OrangID);
		}else{
			return NULL;	
		}
	}else{
		return NULL;
	}
}

//kepegawaian
function getStatus_kepegawaian(){
	$Ci =& get_instance();
	$SELECT = "SELECT * FROM refStatusKepegawaian";
	$rst =$Ci->db->query($SELECT);
	if($rst->num_rows()){
		return $rst;
	}else{
		return NULL;	
	}
}

function getStatus_pegawai(){
	$Ci =& get_instance();
	$SELECT = "SELECT * FROM refStatusPegawai";
	$rst =$Ci->db->query($SELECT);
	if($rst->num_rows()){
		return $rst;
	}else{
		return NULL;	
	}

}


function getDepartement($id){
	$Ci =& get_instance();
	if (isset($id) and $id != NULL) {
		$SELECT = "SELECT * FROM mstMayor WHERE ID=".$id."";
		$rst =$Ci->db->query($SELECT);
		if($rst->num_rows()){
			$row = $rst->row();
			return $row->Nama;
		}else{
			return NULL;	
		}
	}else{
		return NULL;
	}
}


function getDepartementStructur($id){
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

function getFakultasName($id){
	$Ci =& get_instance();
	$SELECT = "SELECT Nama FROM mstStrukturOrganisasi WHERE ID=".$id." AND Aktif=1";
	$rst =$Ci->db->query($SELECT);
	if($rst->num_rows()){
		$row = $rst->row();
		return $row->Nama;
	}else{
		return NULL;	
	}
}

// inovator
function getInovator($IdInovasi){
	$Ci =& get_instance();
	if (isset($IdInovasi) and $IdInovasi != NULL) {
		$SELECT = "SELECT * 
				   FROM trxInovator 
				   JOIN mstOrang
				   ON trxInovator.OrangID=mstOrang.ID
				   WHERE trxInovator.InovasiID=".$IdInovasi."";
		return $Ci->db->query($SELECT);
	}else{
		return NULL;
	}
}


function getInovatorName($IdInovasi){
	$Ci =& get_instance();
	if (isset($IdInovasi) and $IdInovasi != NULL) {
		$SELECT = "SELECT * 
				   FROM trxInovator 
				   JOIN mstOrang
				   ON trxInovator.OrangID=mstOrang.ID
				   WHERE trxInovator.InovasiID=".$IdInovasi."";
		$rst = $Ci->db->query($SELECT);

		if($rst->num_rows()){
		$row = $rst->row();
			return $row->Nama;
		}else{
			return NULL;	
		}
	}else{
		return NULL;
	}
}

function getDosenNama($NIP){
	$Ci =& get_instance();
	$SELECT = "SELECT * 
			   FROM mstDosen
			   JOIN mstOrang
			   ON mstDosen.OrangID=mstOrang.ID
			   WHERE mstDosen.NIP='".$NIP."'";
	$query = $Ci->db->query($SELECT);
	$rst = $query->row();
	return $rst->Nama;
}
