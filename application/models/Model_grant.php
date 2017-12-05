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
	public function grant($id_biodata=NULL){
        if ($id_biodata ==  NULL){
        $result = $this->db->query("SELECT * FROM `grant`  
                                    JOIN grant_proyek ON `grant`.`id_grant`= `grant_proyek`.`id_grant` 
                                    JOIN grant_tasks ON `grant`.`id_grant` =  `grant_tasks`.`t_grant`");

        } else {
		$result = $this->db->query("SELECT * FROM `grant`  
                                    JOIN grant_proyek ON `grant`.`id_grant`= `grant_proyek`.`id_grant` 
                                    JOIN grant_tasks ON `grant`.`id_grant` =  `grant_tasks`.`t_grant`
                                    WHERE `grant`.`id_biodata` = ".$id_biodata."");
        }
        if ($result->num_rows()>0) {
            return $result;
        } else {
            return NULL;
        }
	}

	public function get_grant($id_grant){
		$query = $this->db->query("SELECT * FROM `grant` WHERE id_grant = ".$id_grant."");
		return $query->row();
	}

    public function get_document($id_grant){
        return $this->db->query("SELECT * FROM `grant_dokumen` WHERE id_grant = ".$id_grant."");
    }

    public function get_portofolio($id_grant){
        return $this->db->query("SELECT * FROM `grant_portofolio` WHERE id_grant = ".$id_grant."");
    }

	public function insert_grant($data){
        $this->db->insert('grant',$data);
        return $this->db->error();
	}

	public function update_grant($data, $id_grant){

        $this->db->trans_begin();
        $grant_portofolio = $data['grant_portofolio'];
        $grant_dokumen =  $data['grant_dokumen'];
        
        $count = 0;
        if (!empty($data["pengaju_pejabat_utama"])) {
            $count += 1;
        }
        if (!empty($data["pengaju_pejabat_utama_jabatan"])) {
            $count += 1;
        }
        if (!empty($data["pengaju_pejabat_kegiatan"])) {
            $count += 1;
        }
        if (!empty($data["pengaju_pejabat_kegiatan_jabatan"])) {
            $count += 1;
        }
        if (count($data["grant_dokumen"]['dokumen_nama'])>0) {
            $count += 1;
        }
        if (count($data["grant_portofolio"]['portofolio_project'])>0) {
            $count += 1;
        }
        $persen  = ($count/6) * 100;

        $data['resume'] = $persen;
        unset($data['grant_portofolio']);
        unset($data['grant_dokumen']);

        $this->db->trans_begin();
		$this->db->where('id_grant', $id_grant);
		$this->db->update('grant', $data);
        $error = $this->db->error();    

        // Dokumen Lampiran
        $sql_delete = "DELETE FROM grant_dokumen WHERE id_grant = $id_grant";
        $this->db->query($sql_delete);
        $error = $this->db->error();    


        for ($i=0; $i < count($grant_dokumen['dokumen_nama']); $i++) {
            $sql = "INSERT INTO grant_dokumen (dokumen_nama, dokumen_file, id_grant) VALUES ('".$grant_dokumen['dokumen_nama'][$i]."','".$grant_dokumen['dokumen_file'][$i]."', ".$id_grant.") ";
            $this->db->query($sql);
            $error = $this->db->error();
        }
        
        // Portofolio
        $sql_delete = "DELETE FROM grant_portofolio WHERE id_grant = $id_grant";
        $this->db->query($sql_delete);
        $error = $this->db->error();    

        for ($j=0; $j < count($grant_portofolio['portofolio_project']); $j++) { 
            $sql = "INSERT INTO grant_portofolio (portofolio_project, portofolio_dana, portofolio_sumber, portofolio_periode, portofolio_durasi, id_grant) VALUES ('".$grant_portofolio['portofolio_project'][$j]."','".$grant_portofolio['portofolio_dana'][$j]."','".$grant_portofolio['portofolio_sumber'][$j]."','".$grant_portofolio['portofolio_periode'][$j]."','".$grant_portofolio['portofolio_durasi'][$j]."', ".$id_grant.") ";
            $this->db->query($sql);
            $error = $this->db->error();
        }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return array('result'=>$error );
        } else {
            $this->db->trans_commit();
            return array('result'=>$error);
        }  

	}

	public function get_poyek($id){
		$query = $this->db->query("SELECT * FROM `grant_proyek` WHERE id_grant = ".$id."");
		return $query->row();
	}

	public function insert_grant_proyek($data){
        $this->db->insert('grant_proyek',$data);
        return $this->db->error();
	}

    public function update_grant_proyek($data, $id_grant){

        $this->db->trans_begin();
        $id_grant_proyek = $data['id_grant_proyek'];
        $proyek_tematik_kegiatan = $data['proyek_tematik_kegiatan'];
        $proyek_kategori_kegiatan = $data['proyek_kategori_kegiatan'];

        $count = 0;
        if (!empty($data["proyek_judul"])) {
            $count += 1;
        }
        if (!empty($data["proyek_lansekap"])) {
            $count += 1;
        }
        if (!empty($data["proyek_provinsi"])) {
            $count += 1;
        }
        if (!empty($data["proyek_kota"])) {
            $count += 1;
        }
        if (!empty($data["proyek_kecamatan"])) {
            $count += 1;
        }
        if (!empty($data["proyek_desa"])) {
            $count += 1;
        }
        if (!empty($data["proyek_tgl_mulai"])) {
            $count += 1;
        }
        if (!empty($data["proyek_durasi"])) {
            $count += 1;
        }
        if (!empty($data["proyek_manfaat"])) {
            $count += 1;
        }
        if (!empty($data["proyek_luas_dampak"])) {
            $count += 1;
        }
        if (count($data["proyek_tematik_kegiatan"])>0) {
            $count += 1;
        }
        $persen  = ($count/11) * 100;
        $data['resume'] = $persen;
        unset($data['proyek_tematik_kegiatan']);
        unset($data['proyek_kategori_kegiatan']);
        unset($data['id_grant_proyek']);

        // debug($data);

        $this->db->trans_begin();
        $this->db->where('id_grant', $id_grant);
        $this->db->update('grant_proyek', $data);
        $error = $this->db->error();    

        // Proyek Grant-Tematika Kegiatan
        $sql_delete = "DELETE FROM grant_proyek_tematik_kegiatan WHERE id_grant_proyek = $id_grant_proyek";
        $this->db->query($sql_delete);
        $error = $this->db->error();    

        foreach ($proyek_tematik_kegiatan as $index => $value) {
            $sql = "INSERT INTO grant_proyek_tematik_kegiatan (id_grant_proyek, id_tematik) VALUES ('".$id_grant_proyek."','".$index."') ";
            $this->db->query($sql);
            $error = $this->db->error();
        }
        // Proyek Grant-Tematika Kegiatan
        $sql_delete = "DELETE FROM grant_proyek_kategori_kegiatan WHERE id_grant_proyek = $id_grant_proyek";
        $this->db->query($sql_delete);
        $error = $this->db->error();   

        foreach ($proyek_kategori_kegiatan as $key => $value) {
            $sql = "INSERT INTO grant_proyek_kategori_kegiatan (id_grant_proyek, id_kegiatan) VALUES ('".$id_grant_proyek."','".$key."') ";
            $this->db->query($sql);
            $error = $this->db->error();
        }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return $error;
        } else {
            $this->db->trans_commit();
            return $error;
        }  

    }

    public function kategori_kegiatan(){
        return $this->db->query("SELECT * FROM `grant_kategori_kegiatan` ");
    }

    public function tematik_kegiatan(){
        return $this->db->query("SELECT * FROM `grant_tematik_kegiatan` ");
    }

    public function proyek_kategori_kegiatan($id_grant_proyek){
        $result = $this->db->query("SELECT * FROM `grant_proyek_kategori_kegiatan` WHERE id_grant_proyek = $id_grant_proyek ");
        $arr_kegiatan = array();
        foreach($result->result() as $row){
            array_push($arr_kegiatan, $row->id_kegiatan);
        }
        return $arr_kegiatan;
    }

    public function proyek_tematik_kegiatan($id_grant_proyek){
        $result =  $this->db->query("SELECT * FROM `grant_proyek_tematik_kegiatan` WHERE id_grant_proyek = $id_grant_proyek");
        $arr_tematik = array();
        foreach($result->result() as $row){
            array_push($arr_tematik, $row->id_tematik);
        }
        return $arr_tematik;
    }

    public function get_risalah($id_grant){
        $query = $this->db->query("SELECT * FROM `grant_risalah` WHERE id_grant = ".$id_grant."");
        return $query->row();
    }

    public function update_grant_risalah($data, $id_grant){
        $this->db->trans_begin();
        $count = 0;
        if (!empty($data["risalah_latar_belakang"])) {
            $count += 1;
        }
        if (!empty($data["risalah_tujuan"])) {
            $count += 1;
        }
        if (!empty($data["pengaju_pejabat_kegiatan"])) {
            $count += 1;
        }
        if (!empty($data["risalah_perubahan"])) {
            $count += 1;
        }
        if (!empty($data["risalah_metode"])) {
            $count += 1;
        }
        $persen  = ($count/4) * 100;
        $data['resume'] = $persen;
        $this->db->where('id_grant', $id_grant);
        $this->db->update('grant_risalah', $data);
        $error = $this->db->error(); 

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return $error;
        } else {
            $this->db->trans_commit();
            return $error;
        }  
    }

    public function get_grant_indikator($id_grant){
        return $this->db->query("SELECT * FROM `grant_indikator` WHERE id_grant = ".$id_grant."");
    }

    public function update_grant_indikator($data, $id_grant){
        $this->db->trans_begin();
        $count = 0; 
        if (count($data["indikator_nama"])>0) {
            $count += 1;
        }
        $resume = $count *100;
        $sql_delete = "DELETE FROM grant_indikator WHERE id_grant = $id_grant";
        $this->db->query($sql_delete);
        $error = $this->db->error();  
        foreach ($data['indikator_nama'] as $indexof => $value) {
            $sql = "INSERT INTO grant_indikator (indikator_nama, resume, id_grant) VALUES ('".$value."','".$resume."', '".$id_grant."') ";
            $this->db->query($sql);
            $error = $this->db->error();
        }
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return $error;
        } else {
            $this->db->trans_commit();
            return $error;
        }  
    }

    public function get_grant_kegiatan_dana($id_grant){
        return $this->db->query("SELECT * FROM `grant_kegiatan_dana` WHERE id_grant = ".$id_grant."")->row();
    }

    public function get_grant_kegiatan_dana_lanjut($id_kegiatan_dana){
        return $this->db->query("SELECT * FROM `grant_kegiatan_dana_lanjut` WHERE id_kegiatan_dana = ".$id_kegiatan_dana."");
    }

    public function update_grant_kegiatan_dana($data, $id_grant, $id_kegiatan_dana){
        $kegiatan_dana_nama = $data['kegiatan_dana_nama'];
        $kegiatan_dana_jumlah = $data['kegiatan_dana_jumlah'];

        $count = 0;
        if (!empty($data["kegiatan_dana_jenis"])) {
            $count += 1;
        }
        if (count($data["kegiatan_dana_nama"])>0) {
            $count += 1;
        }
        if (count($data["kegiatan_dana_jumlah"])>0) {
            $count += 1;
        }
        $data['resume']  = ($count/3) * 100;

        unset($data['kegiatan_dana_nama']);
        unset($data['kegiatan_dana_jumlah']);

        $this->db->trans_begin();
        $this->db->where('id_grant', $id_grant);
        $this->db->update('grant_kegiatan_dana', $data);
        $error = $this->db->error(); 

        $sql_delete = "DELETE FROM grant_kegiatan_dana_lanjut WHERE id_kegiatan_dana = $id_kegiatan_dana";
        $this->db->query($sql_delete);
        $error = $this->db->error();  

        for ($x=0; $x < count($kegiatan_dana_nama); $x++) { 
            $sql = "INSERT INTO grant_kegiatan_dana_lanjut (id_kegiatan_dana, nama, jumlah) VALUES ('".$id_kegiatan_dana."','".$kegiatan_dana_nama[$x]."', '".$kegiatan_dana_jumlah[$x]."') ";
            $this->db->query($sql);
            $error = $this->db->error();
        }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return $error;
        } else {
            $this->db->trans_commit();
            return $error;
        }  
    }

    // save aplication

	public function save_app_aplication(){
		$grant = $_SESSION['grant'];
        $grant_portofolio = $grant['grant_portofolio'];
        $grant_dokumen =  $grant['grant_dokumen'];

        unset($grant['grant_portofolio']);
        unset($grant['grant_dokumen']);

        // Informasi Pengaju
        $grant['date_simpan'] =date("Y-m-d");
        $grant['date_kirim'] =date("Y-m-d");
        $grant['status_grant'] = 'Review';

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

    // udape application
    public function update_app_aplication($id_grant, $id_biodata){

        // set task for grant manager
        $this->db->trans_begin();
        $rst = $this->db->query("select * from sf_guard_user where is_super_admin=4");
        foreach($rst->result() as $row){
            $grant = array(
                "t_type" => 5,
                "t_grant"=> $id_grant,
                "t_user"=> $row->id,
                "t_date"=> date("Y-m-d h:s:i"),
                "t_read"=> 0,
                "t_tanggapan"=> ""
            );
            $this->db->insert('grant_tasks', $grant);
            $error = $this->db->error();    
        }
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return $error;
        } else {
            $this->db->trans_commit();
            return $error;
        }  

    }

    // cek persen

    public function persent_grant($id_grant, $table){
        return $this->db->query("SELECT resume FROM `".$table."` WHERE id_grant = $id_grant")->row();
    }

    // cek todo

    public function getTodo($id_user){
        $result = $this->db->query("select * from grant_tasks JOIN grant_status ON t_type = id_status JOIN grant_proyek ON t_grant = id_grant WHERE grant_tasks.t_user=".$id_user." ");
        if ($result->num_rows()>0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function getStatus(){
        return $this->db->query("SELECT * FROM grant_status");
    }

    // grant full
    public function getGrantFull($id_grant, $id_user){
        return $this->db->query("SELECT
                * 
            FROM
                `grant`
                JOIN grant_indikator ON `grant`.id_grant = grant_indikator.id_grant
                JOIN grant_proyek ON `grant`.id_grant = grant_proyek.id_grant
                JOIN grant_kegiatan_dana ON `grant`.id_grant = grant_kegiatan_dana.id_grant
                JOIN grant_risalah ON `grant`.id_grant = grant_risalah.id_grant
                JOIN grant_tasks ON `grant`.id_grant = grant_tasks.t_grant
            WHERE
                `grant`.id_grant = ".$id_grant." and grant_tasks.t_user =".$id_user." ")->row();
    }

    // grant save_tanggapan
    public function save_tanggapan($data, $id_user, $id_grant){
        $this->db->where('t_grant', $id_grant);
        $this->db->where('t_user', $id_user);
        $this->db->update('grant_tasks', $data);
        return $this->db->error();
    }

    // grant update status
    public function save_status($data, $id_user, $id_grant){
        $this->db->where('t_grant', $id_grant);
        $this->db->where('t_user', $id_user);
        $this->db->update('grant_tasks', $data);
        return $this->db->error();
    }
}
?>