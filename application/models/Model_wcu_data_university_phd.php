
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_data_university_phd extends CI_Model {
   
    // mstDosen phd
    var $column = array('NIP','GelarDepan', 'Nama','GelarBelakang','StrukturOrganisasiID');
    var $order = array('StrukturOrganisasiID' => 'desc');

   public function get_departemen(){
        $sql = "SELECT a.ID, b.Nama
				FROM mstDepartemen a INNER JOIN 
				mstStrukturOrganisasi b ON a.ID = b.ID INNER JOIN
                mstFakultas c ON a.FakultasID=c.ID INNER JOIN 
				mstStrukturOrganisasi d ON c.ID = d.ID
                ORDER BY c.Kode ASC";
        return $this->db->query($sql);
    }
    public function get_list_dosen($param){
        $sql = "SELECT 
                
                dos.NIP, 
                dos.GelarDepan, 
                orang.Nama, 
                dos.GelarBelakang, 
                refstatus.Nama as name
                
                FROM `mstDosen` as dos 
                JOIN `refStatusPegawai` as refstatus 
                ON dos.StatusPegawaiID=refstatus.ID
                
                JOIN `mstOrang` as orang
                ON dos.OrangID=orang.ID
                
                WHERE dos.StrukturOrganisasiID = '".$param."' 
                        AND (`GelarDepan` like  'Prof%' 
                        OR `GelarDepan` like 'Dr.%' 
                        OR `GelarBelakang` like 'Ph.D') ";
        return $this->db->query($sql);
    }
    public function get_exsport($param){
        $sql    = "SELECT 
        
                    dos.NIP, 
                    orang.Nama,
                    dos.GelarDepan As GelarDepan, 
                    dos.GelarBelakang As GelarBelakang, 
                    structur.Nama As Homebase,
                    dos.Kepakaran As Kepakaran,
                    statPegawai.Nama as StatusPeg

                    FROM `mstDosen` As dos 
                    LEFT JOIN mstOrang As orang
                    ON dos.OrangID = orang.ID
                    LEFT JOIN refStatusPegawai As statPegawai
                    ON dos.StatusPegawaiID = statPegawai.ID
                    LEFT JOIN mstStrukturOrganisasi as structur
                    ON dos.StrukturOrganisasiID=structur.ID

                    WHERE dos.StrukturOrganisasiID='".$param."'
                        AND (`GelarDepan` like  'Prof%' 
                        OR `GelarDepan` like 'Dr.%' 
                        OR `GelarBelakang` like 'Ph.D') ";
        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('NIP', 'GelarDepan', 'Nama', 'GelarBelakang', 'Departemen','Status', 'Kepakaran'));
        foreach ($rst->result_array() as $row)
            array_push($data, $row);
        return $data; 
    }
    
    public function get_exsport_option($param1, $param2, $param3){
        $sql    = " SELECT 

                    dos.NIP, 
                    orang.Nama,
                    dos.GelarDepan As GelarDepan, 
                    dos.GelarBelakang As GelarBelakang, 
                    structur.Nama As Homebase,
                    dos.Kepakaran As Kepakaran,
                    statPegawai.Nama as StatusPeg

                    FROM `mstDosen` As dos 
                    LEFT JOIN mstOrang As orang
                    ON dos.OrangID = orang.ID
                    LEFT JOIN refStatusPegawai As statPegawai
                    ON dos.StatusPegawaiID = statPegawai.ID
                    LEFT JOIN mstStrukturOrganisasi as structur
                    ON dos.StrukturOrganisasiID=structur.ID

                    WHERE dos.StatusPegawaiID='".$param1."' AND dos.StatusKepegawaianID='".$param2."' AND dos.StrukturOrganisasiID='".$param3."'
                            AND (`GelarDepan` like  'Prof%' 
                            OR `GelarDepan` like 'Dr.%' 
                            OR `GelarBelakang` like 'Ph.D') ";
        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('NIP', 'GelarDepan', 'Nama', 'GelarBelakang', 'Departemen', 'Kepakaran','Status'));
        foreach ($rst->result_array() as $row)
            array_push($data, $row);
        return $data; 
    }

	public function get_once($nip){
        $sql = "SELECT 

                    dos.NIP, 
                    orang.Nama,
                    dos.GelarDepan As GelarDepan, 
                    dos.GelarBelakang As GelarBelakang, 
                    structur.Nama As Homebase,
                    dos.Kepakaran As Kepakaran,
                    statPegawai.Nama as Status

                    FROM `mstDosen` As dos 
                    LEFT JOIN mstOrang As orang
                    ON dos.OrangID = orang.ID
                    LEFT JOIN refStatusPegawai As statPegawai
                    ON dos.StatusPegawaiID = statPegawai.ID
                    LEFT JOIN mstStrukturOrganisasi as structur
                    ON dos.StrukturOrganisasiID=structur.ID

                    WHERE dos.NIP = '".$nip."'
					AND (`GelarDepan` like  'Prof%' 
                    OR `GelarDepan` like 'Dr.%' 
                    OR `GelarBelakang` like 'Ph.D')";
        return $this->db->query($sql);
    }
    // fronted
    public function get_dosenList($str, $pegawai, $kepegawaian){
        $sql = "SELECT 
                    dos.NIP, 
                    orang.Nama,
                    dos.GelarDepan As GelarDepan, 
                    dos.GelarBelakang As GelarBelakang, 
                    structur.Nama As Homebase,
                    dos.Kepakaran As Kepakaran,
                    statPegawai.Nama as StatusPeg
                    FROM `mstDosen` As dos 
                    LEFT JOIN mstOrang As orang
                    ON dos.OrangID = orang.ID
                    LEFT JOIN refStatusPegawai As statPegawai
                    ON dos.StatusPegawaiID = statPegawai.ID
                    LEFT JOIN mstStrukturOrganisasi as structur
                    ON dos.StrukturOrganisasiID=structur.ID

                    WHERE dos.StatusPegawaiID='".$pegawai."' 
                    AND dos.StatusKepegawaianID='".$kepegawaian."' 
                    AND dos.StrukturOrganisasiID='".$str."'
                    AND (`GelarDepan` like  'Prof%' 
                    OR `GelarDepan` like 'Dr.%' 
                    OR `GelarBelakang` like 'Ph.D')";
        return $this->db->query($sql);
    }
}
