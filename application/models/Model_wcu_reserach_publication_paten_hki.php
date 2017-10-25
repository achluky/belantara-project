
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_reserach_publication_paten_hki extends CI_Model {

    // mstMahasiswa

    var $column = array('Judul','NomorPermohonan','TanggalPengumuman');
    var $order = array('Judul' => 'desc');

    public function getList(){
        $sql = "SELECT DISTINCT YEAR(TanggalPendaftaran) as Tahun FROM `trxPaten` 
                ORDER BY YEAR(`TanggalPendaftaran`) DESC ";
        return $this->db->query($sql);
    }
    public function get_datatables_listHki($param){
        $this->_get_datatables_query($param);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_allStudent($param){
        $this->db->from("trxPaten");
        $this->db->like('TanggalPendaftaran', $param, 'after'); 
        return $this->db->count_all_results();
    }
    public function count_filteredStudent($param){
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function _get_datatables_query($param){
        $this->db->select("*");
        $this->db->from("trxPaten");
        $this->db->like("TanggalPendaftaran", $param, "after");
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
        $sql = "SELECT * FROM trxPaten WHERE ID = '".$id."'";
        $return = $this->db->query($sql);
        return $return->row();
    }
    public function get_exsport($param){
        $sql 	= " SELECT
                    T2.NomorPermohonan,
                    T2.TanggalPenerimaan,
                    T2.NomorPengumuman,
                    T2.TanggalPengumuman,
                    T2.NomorPaten,
                    T2.TanggalPendaftaran,
                    T2.TanggalKepemilikan,
                    T2.TanggalKadaluarsa,
                    T2.Judul,
                    T2.Abstrak,
                    T2.JumlahKlaim,
                    T4.Nama as Penemu
                    FROM trxpatenpenemu T1
                    JOIN trxpaten T2 
                    ON T1.PatenID=T2.ID
                    JOIN trxpatenpemilik T3
                    ON T3.PatenID=T2.ID
                    JOIN mstorang T4
                    ON T4.ID=T1.OrangID
                    WHERE T2.TanggalPendaftaran LIKE '".$param."%'";
        $rst    = $this->db->query($sql);   
        $data   = array(1 => array ('NomorPermohonan', 'TanggalPenerimaan','NomorPengumuman','TanggalPengumuman','NomorPaten',
                                    'TanggalPendaftaran','TanggalKepemilikan','TanggalKadaluarsa','Judul','Abstrak','JumlahKlaim','Penemu'));
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
