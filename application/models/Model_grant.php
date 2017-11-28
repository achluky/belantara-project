<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Model_grant extends CI_Model{	
		
	public function __construct() {
		parent::__construct();
	}
		
	public function get_email($id){
		$query = $this->db->query("SELECT * FROM sf_guard_user WHERE id = ".$id."");
		return $query->row();
	}

	public function update_email($data, $id){
		$this->db->where('id', $id);
		$this->db->update('sf_guard_user', $data);
        return $this->db->error();
	}
	
	//
	public function grant($id_biodata){
		return $this->db->query("SELECT * FROM `grant` JOIN grant_proyek ON `grant`.`id_grant`= `grant_proyek`.`id_grant` WHERE `grant`.`id_biodata` = ".$id_biodata."");
	}

	public function get_grant($id_grant){
		$query = $this->db->query("SELECT * FROM `grant` WHERE id_grant = ".$id_grant."");
		return $query->row();
	}

	public function insert_grant($data){
        $this->db->insert('grant',$data);
        return $this->db->error();
	}

	public function update_grant($data, $id){
		$this->db->where('id_grant', $id);
		$this->db->update('grant', $data);
        return $this->db->error();
	}


	public function get_poyek($id){
		$query = $this->db->query("SELECT * FROM `grant_proyek` WHERE id_grant = ".$id."");
		return $query->row();
	}

	public function insert_grant_proyek($data){
        $this->db->insert('grant_proyek',$data);
        return $this->db->error();
	}


	public function save_app_aplication(){
		$grant = $_SESSION['grant'];
        $grant_portofolio = $grant['grant_portofolio'];
        $grant_dokumen =  $grant['grant_dokumen'];

        unset($grant['grant_portofolio']);
        unset($grant['grant_dokumen']);

        // Informasi Pengaju
        $this->db->trans_begin();
        $this->db->insert('grant', $grant);
        $error = $this->db->error();    
        $id_grant = $this->db->insert_id();

        // Dokumen Lampiran
        for ($i=0; $i < count($grant_dokumen); $i++) { 
            $sql = "INSERT INTO grant_dokumen (dokumen_nama, dokumen_file, id_grant) VALUES ('".$grant_dokumen['dokumen_nama'][$i]."','".$grant_dokumen['dokumen_file'][$i]."', ".$id_grant.") ";
            $this->db->query($sql);
            $error = $this->db->error();
        }

        // Portofolio
        for ($j=0; $j < count($grant_portofolio['portofolio_project']); $j++) { 
            $sql = "INSERT INTO grant_portofolio (portofolio_project, portofolio_dana, portofolio_sumber, portofolio_periode, portofolio_durasi, id_grant) VALUES ('".$grant_portofolio['portofolio_project'][$j]."','".$grant_portofolio['portofolio_dana'][$j]."','".$grant_portofolio['portofolio_sumber'][$j]."','".$grant_portofolio['portofolio_periode'][$j]."','".$grant_portofolio['portofolio_durasi'][$j]."', ".$id_grant.") ";
            $this->db->query($sql);
            $error = $this->db->error();
        }


        // Proyek Grant
        $grant_proyek = $_SESSION['grant_proyek'];

        $proyek_tematik_kegiatan = $grant_proyek['proyek_tematik_kegiatan'];
        $proyek_kategori_kegiatan = $grant_proyek['proyek_kategori_kegiatan'];

        unset($grant_proyek['proyek_tematik_kegiatan']);
        unset($grant_proyek['proyek_kategori_kegiatan']);

        $grant_proyek['id_grant'] = $id_grant;

        $this->db->insert('grant_proyek', $grant_proyek);
        $error = $this->db->error();    
        $id_proyek = $this->db->insert_id();

        // Proyek Grant-Tematika Kegiatan
        foreach ($proyek_tematik_kegiatan as $index => $value) {
            $sql = "INSERT INTO grant_proyek_tematik_kegiatan (id_grant_proyek, id_tematik) VALUES ('".$id_proyek."','".$index."') ";
            $this->db->query($sql);
            $error = $this->db->error();
        }
        // Proyek Grant-Tematika Kegiatan
        foreach ($proyek_kategori_kegiatan as $key => $value) {
            $sql = "INSERT INTO grant_proyek_kategori_kegiatan (id_grant_proyek, id_kegiatan) VALUES ('".$id_proyek."','".$key."') ";
            $this->db->query($sql);
            $error = $this->db->error();
        }

        // Risalah
        $grant_risalah = $_SESSION['grant_risalah'];
        $grant_risalah['id_grant'] = $id_grant;
        $this->db->insert('grant_risalah', $grant_risalah);
        $error = $this->db->error();    
        $id_risalah = $this->db->insert_id();

        // Indikator
        $indikator_nama = $_SESSION['grant_indikator']['indikator_nama'];
        foreach ($indikator_nama as $indexof => $value) {
            $sql = "INSERT INTO grant_indikator (indikator_nama, id_grant) VALUES ('".$value."','".$id_grant."') ";
            $this->db->query($sql);
            $error = $this->db->error();
        }

        //Grant Kegiatan Dana
        $grant_kegiatan_dana = $_SESSION['grant_kegiatan_dana'];
        $grant_kegiatan_dana['id_grant'] = $id_grant;
        $kegiatan_dana_nama = $grant_kegiatan_dana['kegiatan_dana_nama'];
        $kegiatan_dana_jumlah = $grant_kegiatan_dana['kegiatan_dana_jumlah'];


        unset($grant_kegiatan_dana['kegiatan_dana_nama']);
        unset($grant_kegiatan_dana['kegiatan_dana_jumlah']);

        $this->db->insert('grant_kegiatan_dana', $grant_kegiatan_dana);
        $error = $this->db->error();    
        $id_kegiatan_dana = $this->db->insert_id();

        for ($x=0; $x < count($kegiatan_dana_nama); $x++) { 
            $sql = "INSERT INTO grant_kegiatan_dana_lanjut (id_kegiatan_dana, nama, jumlah) VALUES ('".$id_kegiatan_dana."','".$kegiatan_dana_nama[$x]."', '".$kegiatan_dana_jumlah[$x]."') ";
            $this->db->query($sql);
            $error = $this->db->error();
        }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return array('result'=>$error );
        } else {
            $this->db->trans_commit();
            unset($_SESSION['grant']);
            unset($_SESSION['grant_proyek']);
            unset($_SESSION['grant_risalah']);
            unset($_SESSION['grant_indikator']);
            unset($_SESSION['grant_kegiatan_dana']);
            return array('result'=>$error);
        }  
	}
}
?>