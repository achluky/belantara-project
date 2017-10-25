
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_reserach_publication_artikel_terindex_scopus extends CI_Model {

    // mstMahasiswa

    var $column = array('Judul','TahunTerbit','JenisArtikelID', 'NamaPenulis', 'Homebase');
    var $order = array('Judul' => 'desc');

    public function getYears(){
        $sql = "SELECT DISTINCT `TahunTerbit` FROM `mstArtikel` WHERE IndexScopus='Y' ORDER BY TahunTerbit DESC";
        return $this->db->query($sql);
    }
    public function get_datatables_listartikel($param){
        $this->_get_datatables_query($param);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all($param){
        $this->db->from("mstArtikel");
        $this->db->join('trxPenulisArtikel', 'trxPenulisArtikel.ArtikelID = mstArtikel.ID');
        $this->db->join('mstDosen', 'mstDosen.OrangID = trxPenulisArtikel.OrangID');
        $this->db->where("mstArtikel.IndexScopus", "Y");
        return $this->db->count_all_results();
    }
    public function count_filtered($param){
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function _get_datatables_query($param){
        $this->db->select("mstArtikel.ID as ID, 
                            mstArtikel.Judul, 
                            mstArtikel.TahunTerbit, 
                            mstArtikel.JenisArtikelID");
        $this->db->from("mstArtikel");
        //$this->db->join('trxPenulisArtikel','trxPenulisArtikel.ArtikelID = mstArtikel.ID', 'left');
        //$this->db->join('mstorang','mstorang.ID=trxPenulisArtikel.OrangID', 'left');
        $this->db->where("mstArtikel.TahunTerbit",$param);
        $this->db->where("mstArtikel.IndexScopus", "Y");

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


    public function get_datatables_listartikel3($param, $param2=NULL){
        $this->db->select("mstArtikel.ID as ID, mstArtikel.Judul, mstArtikel.TahunTerbit, mstArtikel.JenisArtikelID, 
                            trxPenulisArtikel.NamaPenulis, mstDosen.Homebase");
        $this->db->from("mstArtikel");
        $this->db->join('trxPenulisArtikel', 'trxPenulisArtikel.ArtikelID = mstArtikel.ID');
        $this->db->join('mstDosen', 'mstDosen.OrangID = trxPenulisArtikel.OrangID');
        $this->db->where("mstArtikel.TahunTerbit",$param);
        if ($param2!="") {
            $this->db->where("mstDosen.Homebase",$param2);
        }
        $this->db->where("mstArtikel.IndexScopus", "Y");
        $query = $this->db->get();
        return $query;
    }
    public function getOnes($id){
        $sql = "SELECT * FROM mstArtikel WHERE ID = '".$id."'";
        $return = $this->db->query($sql);
        return $return->row();
    }
    public function get_exsport($param){    
        $this->db->select(" mstArtikel.Judul, 
                            refjenisartikel.Nama as JenisArtikelID, 
                            mstArtikel.NamaArtikel, 
                            mstArtikel.TahunTerbit, 
                            mstArtikel.BulanTerbitAwal, 
                            mstArtikel.BulanTerbitAkhir, 
                            mstArtikel.KotaTerbit, 
                            mstArtikel.Url,
                            mstArtikel.ISSN, 
                            mstArtikel.ISBN, 
                            mstArtikel.Volume, 
                            mstArtikel.Halaman,
                            mstArtikel.Nomor, 
                            mstArtikel.Akreditasi, 
                            mstArtikel.MediaPenerbit,
                            reflingkup.Tingkat");
        $this->db->from("mstArtikel");
        $this->db->join('reflingkup','reflingkup.ID = mstArtikel.LevelArtikel');
        $this->db->join('refjenisartikel','refjenisartikel.ID = mstArtikel.JenisArtikelID');
        $this->db->where("mstArtikel.TahunTerbit",$param);
        $this->db->where("mstArtikel.IndexScopus", "Y");
        $rst = $this->db->get();
        $data   = array(1 => array ('Judul', 'Jenis', 'Nama Artikel', 'Tahun Terbit', 'Bulan TerbitAwal', 'Bulan Terbit Akhir', 
            'Kota Terbit', 'Url', 'ISSN', 'ISBN', 'Volume', 'Halaman', 'Nomor', 'Akreditasi', 'Media Penerbit','Lingkup'));
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
}
