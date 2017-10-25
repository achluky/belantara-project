
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_reserach_publication_artikel_terindex_google_scholer extends CI_Model {

    // mstMahasiswa

    var $column = array('Judul','TahunTerbit','JenisArtikelID');
    var $order = array('Judul' => 'desc');

    public function getListDepartement(){
        $sql = "SELECT 
                    a.ID, 
                    a.Nama As Mayor,
                    a.StrataID,
                    b.Nama as Strata,
                    b.Kode as KodeStrata,
                    d.Nama As Departemen
                    FROM mstMayor as a INNER JOIN 
                    refStrata as b ON b.ID=a.StrataID INNER JOIN 
                    mstDepartemen c ON a.DepartemenID = c.ID INNER JOIN 
                    mstStrukturOrganisasi d ON c.ID = d.ID
                    WHERE a.StrataID=3 OR a.StrataID=4
                    ORDER BY c.Kode, a.Nama ASC
                    ";
        return $this->db->query($sql);
    }

    public function getYears(){
        $sql = "SELECT DISTINCT `TahunTerbit` 
                FROM `mstArtikelGoogleScholer` 
                ORDER BY TahunTerbit DESC";
        return $this->db->query($sql);
    }

    public function getStructur(){
        $sql = "SELECT * 
                FROM `mstStrukturOrganisasi`";
        return $this->db->query($sql);
    }
    public function get_datatables_listartikel($param, $param2=NULL, $param3=NULL){
        $this->_get_datatables_query($param, $param2, $param3);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_allStudent($param, $param2=NULL, $param3=NULL){
        $this->db->from("mstArtikelGoogleScholer");
        $this->db->where("StructurID",$param);
        return $this->db->count_all_results();
    }
    public function count_filteredStudent($param, $param2=NULL, $param3=NULL){
        $this->_get_datatables_query($param, $param2=NULL, $param3=NULL);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function _get_datatables_query($param, $param2, $param3){
        $this->db->select("
                    T1.ID,
                    T2.Nama as Departement,
                    T1.judul,
                    T3.Nama as JenisArtikelID,
                    T1.NamaArtikel,
                    T1.TahunTerbit,
                    T1.BulanTerbitAwal,
                    T1.BulanTerbitAkhir,
                    T1.KotaTerbit,
                    T1.Url,
                    T1.ISSN ,
                    T1.ISBN,
                    T1.Volume,
                    T1.Halaman,
                    T1.Nomor,
                    T1.Akreditasi,
                    T1.MediaPenerbit,
                    T1.IndexScopus,
                    T4.Tingkat as LevelArtikel
            ");
        $this->db->from("mstArtikelGoogleScholer AS T1");
        $this->db->join("mstStrukturOrganisasi AS T2","T1.StructurID=T2.ID","left");
        $this->db->join("refJenisArtikel AS T3","T1.JenisArtikelID=T3.ID","left");
        $this->db->join("refLingkup AS T4","T1.LevelArtikel=T4.ID","left");
        $this->db->where("T1.StructurID",$param);
        if ($param2!=NULL) {
            $this->db->where("T1.JenisArtikelID",$param2);
        }
        if ($param3!=NULL) {
            $this->db->where("T1.LevelArtikel",$param3);
        }
        $i = 0;
        foreach ($this->column as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }
        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function getOnes($id){
        $sql = "SELECT           
                mstArtikelGoogleScholer.ID,   
                mstArtikelGoogleScholer.Judul,   
                mstArtikelGoogleScholer.StructurID,                    
                mstArtikelGoogleScholer.JenisArtikelID,                
                mstArtikelGoogleScholer.NamaArtikel,
                mstArtikelGoogleScholer.TahunTerbit,
                mstArtikelGoogleScholer.BulanTerbitAwal,
                mstArtikelGoogleScholer.BulanTerbitAkhir,
                mstArtikelGoogleScholer.KotaTerbit,
                mstArtikelGoogleScholer.Url,
                mstArtikelGoogleScholer.ISSN,
                mstArtikelGoogleScholer.ISBN,
                mstArtikelGoogleScholer.Volume,
                mstArtikelGoogleScholer.Nomor,
                mstArtikelGoogleScholer.Akreditasi,
                mstArtikelGoogleScholer.MediaPenerbit,
                mstArtikelGoogleScholer.Halaman,
                mstArtikelGoogleScholer.IndexScopus,
                refLingkup.Tingkat as Tingkat,
                refJenisArtikel.Nama as JenisArtikelNama
                FROM mstArtikelGoogleScholer 
                JOIN refJenisArtikel
                ON mstArtikelGoogleScholer.JenisArtikelID=refJenisArtikel.ID
                JOIN refLingkup
                ON mstArtikelGoogleScholer.LevelArtikel=refLingkup.ID
                WHERE mstArtikelGoogleScholer.ID=".$id."";

        $return = $this->db->query($sql);
        return $return;
    }
    public function get_exsport($param){
        $sql 	= " SELECT 
                    T2.Nama as Departement,
                    T5.Nama as Strata,
                    T1.judul,
                    T3.Nama as JenisArtikelID,
                    T1.NamaArtikel,
                    T1.TahunTerbit,
                    T1.BulanTerbitAwal,
                    T1.BulanTerbitAkhir,
                    T1.KotaTerbit,
                    T1.Url,
                    T1.ISSN ,
                    T1.ISBN,
                    T1.Volume,
                    T1.Halaman,
                    T1.Nomor,
                    T1.Akreditasi,
                    T1.MediaPenerbit,
                    T1.IndexScopus,
                    T4.Tingkat as LevelArtikel
                    FROM mstArtikelGoogleScholer as T1
                    JOIN mstmayor as T2
                    ON T1.StructurID=T2.ID
                    JOIN refJenisArtikel T3
                    ON T1.JenisArtikelID=T3.ID
                    JOIN refLingkup T4
                    ON T1.LevelArtikel=T4.ID
                    JOIN refstrata T5 
                    ON T5.ID=T2.StrataID
                    WHERE T1.StructurID = ".$param."";
        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('Departement','Strata', 'Judul', 'Jenis Artikel','Nama Artikel', 'Thun terbit','Bulan Terbit Awal',
                                    'Bulan Terbit Akhir','Kota Terbit', 'Link', 'ISSN','ISBN','Volume','Halaman','Nomor',
                                    'Akreditasi', 'Media Penerbit', 'Terindex Scopus', 'Level Artikel'));
        foreach ($rst->result_array() as $row)
            array_push($data, $row);
        return $data; 
    }

    public function get_approve_dosenShow($param){
    	if (isset($param) and $param != NULL) {
    		$sql = "INSERT INTO mstMahasiswa_show (`id`,`nipDosen`,`status`) values ('', ".$param.",'phd')";
    		$this->db->query($sql);
    		return true;
    	}else {
    		return false;
    	}
    }

    public function getJenisArticle(){
        $sql = "SELECT * FROM refJenisArtikel";
        return $this->db->query($sql);
    }

    public function getLevelArticle(){
        $sql = "SELECT * FROM refLingkup";
        return $this->db->query($sql);
    }

    public function save($data){
        $array = array(
            'StructurID'=> $data['structur'],
            'judul' => $data['judul'],
            'JenisArtikelID' => $data['JenisArtikelID'],
            'NamaArtikel' => $data['NamaArtikel'],
            'TahunTerbit' => $data['TahunTerbit'],
            'BulanTerbitAwal' => $data['BulanTerbitAwal'],
            'BulanTerbitAkhir' => $data['BulanTerbitAkhir'],
            'KotaTerbit' => $data['KotaTerbit'],
            'Url' => $data['Url'],
            'ISSN' => $data['ISSN'],
            'ISBN' => $data['ISBN'],
            'Volume' => $data['Volume'],
            'Halaman' => $data['Halaman'],
            'Nomor' => $data['Nomor'],
            'Akreditasi' => $data['Akreditasi'],
            'MediaPenerbit' => $data['MediaPenerbit'],
            'IndexScopus' => $data['IndexScopus'],
        'LevelArtikel' => $data['LevelArtikel']
        );

        $this->db->set($array);
        $this->db->insert('mstArtikelGoogleScholer');
        return TRUE;
    }

    public function update($data){
        $array = array(
            'StructurID'=> $data['structur'],
            'judul' => $data['judul'],
            'JenisArtikelID' => $data['JenisArtikelID'],
            'NamaArtikel' => $data['NamaArtikel'],
            'TahunTerbit' => $data['TahunTerbit'],
            'BulanTerbitAwal' => $data['BulanTerbitAwal'],
            'BulanTerbitAkhir' => $data['BulanTerbitAkhir'],
            'KotaTerbit' => $data['KotaTerbit'],
            'Url' => $data['Url'],
            'ISSN' => $data['ISSN'],
            'ISBN' => $data['ISBN'],
            'Volume' => $data['Volume'],
            'Halaman' => $data['Halaman'],
            'Nomor' => $data['Nomor'],
            'Akreditasi' => $data['Akreditasi'],
            'MediaPenerbit' => $data['MediaPenerbit'],
            'IndexScopus' => $data['IndexScopus'],
            'LevelArtikel' => $data['LevelArtikel']
        );  
        $this->db->where('ID', $data['ID']);
        $this->db->update('mstArtikelGoogleScholer',$array);
        return TRUE;
    }
}
