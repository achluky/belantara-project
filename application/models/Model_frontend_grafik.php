<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_frontend_grafik extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function get_jumlah_mahasiswa_berdasarkan_pendidikan()
    {
		$data = array();
    	$sql = "SELECT 'Diploma' AS Strata, a.TahunMasuk, COUNT(*) as Jumlah FROM 
				mstMahasiswa a INNER JOIN 
				mstProgramKeahlian b ON a.ProgramKeahlianID = b.ID WHERE b.StrataID = 1
				GROUP BY (a.TahunMasuk)
				ORDER BY a.TahunMasuk DESC";
    	$result = $this->db->query($sql);
		foreach($result->result() as $row){
			if($row->TahunMasuk==null)continue;
			if(!isset($data[$row->TahunMasuk]))
				$data[$row->TahunMasuk] = array("Diploma"=>$row->Jumlah,"S1"=>0,"S2"=>0,"S3"=>0);
		}
		$sql = "SELECT 'S1' AS Strata, a.TahunMasuk, COUNT(*) as Jumlah FROM 
				mstMahasiswa a INNER JOIN 
				mstMayor b ON a.MayorID = b.ID WHERE b.StrataID = 2
				GROUP BY (a.TahunMasuk)
				ORDER BY a.TahunMasuk DESC";
    	$result = $this->db->query($sql);
		foreach($result->result() as $row){
			if($row->TahunMasuk==null)continue;
			if(!isset($data[$row->TahunMasuk]))
				$data[$row->TahunMasuk] = array("Diploma"=>0,"S1"=>$row->Jumlah,"S2"=>0,"S3"=>0);
			else
				$data[$row->TahunMasuk]["S1"]=$row->Jumlah;
		}
		$sql = "SELECT 'S2' AS Strata, a.TahunMasuk, COUNT(*) as Jumlah FROM 
				mstMahasiswa a INNER JOIN 
				mstMayor b ON a.MayorID = b.ID WHERE b.StrataID = 3
				GROUP BY (a.TahunMasuk)
				ORDER BY a.TahunMasuk DESC";
    	$result = $this->db->query($sql);
		foreach($result->result() as $row){
			if($row->TahunMasuk==null)continue;
			if(!isset($data[$row->TahunMasuk]))
				$data[$row->TahunMasuk] = array("Diploma"=>0,"S1"=>0,"S2"=>$row->Jumlah,"S3"=>0);
			else
				$data[$row->TahunMasuk]["S2"]=$row->Jumlah;
		}
		$sql = "SELECT 'S3' AS Strata, a.TahunMasuk, COUNT(*) as Jumlah FROM 
				mstMahasiswa a INNER JOIN 
				mstMayor b ON a.MayorID = b.ID WHERE b.StrataID = 4
				GROUP BY (a.TahunMasuk)
				ORDER BY a.TahunMasuk DESC";
    	$result = $this->db->query($sql);
		foreach($result->result() as $row){
			if($row->TahunMasuk==null)continue;
			if(!isset($data[$row->TahunMasuk]))
				$data[$row->TahunMasuk] = array("Diploma"=>0,"S1"=>0,"S2"=>0,"S3"=>$row->Jumlah);
			else
				$data[$row->TahunMasuk]["S3"]=$row->Jumlah;
		}
		$categories = array();
		$diploma = array();
		$s1 = array();
		$s2 = array();
		$s3 = array();
		for($i=date("Y")-5; $i<=date("Y");$i++){
			$categories[]=$i;
			if(!isset($data[$i])){
				$diploma[]=0;
				$s1[]=0;
				$s2[]=0;
				$s3[]=0;				
			}else{
				$diploma[]=$data[$i]['Diploma'];
				$s1[]=$data[$i]['S1'];
				$s2[]=$data[$i]['S2'];
				$s3[]=$data[$i]['S3'];	
			}
		}
		
		return array("categories"=>json_encode($categories, JSON_NUMERIC_CHECK),"diploma"=>json_encode($diploma, JSON_NUMERIC_CHECK),
		"s1"=>json_encode($s1, JSON_NUMERIC_CHECK),"s2"=>json_encode($s2, JSON_NUMERIC_CHECK),"s3"=>json_encode($s3, JSON_NUMERIC_CHECK));
		
	}
    public function get_jumlah_dosen_berdasarkan_gelar_phd()
    {
		$phd=0;
		$nonphd=0;
    	$sql = "SELECT  COUNT(*) AS Jumlah   FROM `mstDosen` as dos 
                INNER JOIN `mstOrang` as orang ON dos.OrangID=orang.ID
                WHERE  (`GelarDepan` like  'Prof%' 
                        OR `GelarDepan` like 'Dr.%' 
                        OR `GelarBelakang` like 'Ph.D') AND dos.StatusPegawaiID = 1";
    	$result = $this->db->query($sql)->result();
		if(isset($result[0])){
			$phd=$result[0]->Jumlah;
		}
    	$sql = "SELECT  COUNT(*) AS Jumlah   FROM `mstDosen` as dos 
                INNER JOIN `mstOrang` as orang ON dos.OrangID=orang.ID
                WHERE  (`GelarDepan` not like  'Prof%' 
                        AND `GelarDepan` not like 'Dr.%' 
                        AND `GelarBelakang` not like 'Ph.D') AND dos.StatusPegawaiID = 1";
    	$result = $this->db->query($sql)->result();
		if(isset($result[0])){
			$nonphd=$result[0]->Jumlah;
		}
		
		return array("phd"=>$phd, "nonphd"=>$nonphd);
		
	}
    public function get_jumlah_dosen_berdasarkan_status_pegawai()
    {
		$aktif=0;
		$mutasi=0;
		$mengundurkan_diri=0;
		$pensiun=0;
		$meninggal_dunia=0;
    	$sql = "SELECT  s.Nama AS Status, COUNT(*) AS Jumlah   FROM `mstDosen` as dos 
                INNER JOIN `mstOrang` as orang ON dos.OrangID=orang.ID
                INNER JOIN `refStatusPegawai` as s ON s.ID=dos.StatusPegawaiID
				GROUP BY (dos.StatusPegawaiID)";
    	$result = $this->db->query($sql)->result();
		if(isset($result[0])){
			foreach($result as $key=>$row){
				switch(strtolower($row->Status)){
					case "aktif": $aktif=$row->Jumlah;
					break;
					case "mutasi": $mutasi=$row->Jumlah;
					break;
					case "mengundurkan diri": $mengundurkan_diri=$row->Jumlah;
					break;
					case "pensiun": $pensiun=$row->Jumlah;
					break;
					case "meninggal dunia": $meninggal_dunia=$row->Jumlah;
					break;
				}
			}
		}
		
		return array("aktif"=>$aktif, "mutasi"=>$mutasi, "mengundurkan_diri"=>$mengundurkan_diri, "pensiun"=>$pensiun, "meninggal_dunia"=>$meninggal_dunia);
		
	}
}
