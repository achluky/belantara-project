
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_data_university_inovasi extends CI_Model {

    var $column = array('Judul','TerdaftarTanggal','Tingkat');
    var $order = array('TerdaftarTanggal' => 'desc');
    
    public function getLinkup(){
        $sql = "SELECT * FROM `refLingkup`";
        return $this->db->query($sql);
    }
    public function get_listHomeBaseDosen(){
        $sql = "SELECT * FROM `mstStrukturOrganisasi` ORDER BY `mstStrukturOrganisasi`.`ID` ASC";
        return $this->db->query($sql);
    }
    public function get_datatables_listInovasi($param){
        $this->_get_datatables_query($param);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_count_allInovasi($param){
        $this->db->where("LingkupID",$param);
        $this->db->from("trxInovasi");
        return $this->db->count_all_results();
    }
    public function get_count_filteredInovasi($param){
        $this->_get_datatables_query($param);
        $this->db->where("trxInovasi.LingkupID",$param);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function _get_datatables_query($param)
    {
        $this->db->select("trxInovasi.ID,
                           trxInovasi.Judul,
                           trxInovasi.TerdaftarTanggal,
                           reflingkup.Tingkat");
        $this->db->from("trxInovasi");
        $this->db->join("reflingkup", "trxInovasi.LingkupID=reflingkup.ID");
        $this->db->where("trxInovasi.LingkupID",$param);
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
    public function get_listInovasi($param){
        $sql = "SELECT * FROM trxInovasi";
        return $this->db->query($sql);
    }
    public function getInovasiOne($param){
        $sql = "SELECT * FROM trxInovasi WHERE ID = ".$param."";
        $return = $this->db->query($sql);
        return $return->row();
    }
    public function get_exsport_inovasi($param){
        $sql 	= "SELECT 
                    Judul, 
                    refLingkup.Tingkat, 
                    DeskripsiIndonesia, 
                    DeskripsiInggris, 
                    Persfektif ,
                    KeunggulanInovasi, 
                    PotensiAplikasi, 
                    TerdaftarTanggal, 
                    SudahDikomersilkan, 
                    isAdopsi
                  FROM trxInovasi 
                  JOIN  refLingkup 
                  ON trxInovasi.LingkupID = refLingkup.ID  
                  WHERE refLingkup.ID = ".$param."";

        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('Judul', 'Tingkat', 'Deskripsi Indonesia', 'Deskripsi Inggris', 'Persfektif',
                                    'KeunggulanInovasi', 'Potensi Aplikasi','Terdaftar Tanggal', 'Sudah Dikomersilkan', 'isAdopsi'));
        foreach ($rst->result_array() as $row)
            array_push($data, $row);
        return $data; 
    }
    public function get_approve_dosenShow($param){
    	if (isset($param) and $param != NULL) {
    		$sql = "INSERT INTO mstDosen_show (`id`,`nipDosen`,`status`) values ('', ".$param.", 'non-phd')";
    		$this->db->query($sql);
    		return true;
    	}else {
    		return false;
    	}
    }
}
