
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_reserach_publication_kerjasama extends CI_Model {

    // mstDosen
    var $column = array('NamaKerjasama','Stakeholder'); 
    var $order = array('NamaKerjasama' => 'desc');

    public function getStakeholder(){
        $sql = "SELECT * FROM `mstStrukturOrganisasi` 
                WHERE Aktif=1";
        return $this->db->query($sql);
    }
    public function get_datatables_listKerjasama($param){
        $this->_get_datatables_query($param);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_count_allKerjasama($param){
        $this->db->where("Stakeholder",$param);
        $this->db->from("trxKerjasama");
        return $this->db->count_all_results();
    }
    public function get_count_filteredKerjasama($param){
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function _get_datatables_query($param)
    {
        $this->db->select("*");
        $this->db->from("trxKerjasama");
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
        $this->db->where("Stakeholder",$param);
    }

    public function get_listInovasi($param){
        $sql = "SELECT * FROM trxInovasi";
        return $this->db->query($sql);
    }
    public function getViewOne($param){
        $sql = "SELECT * FROM trxKerjasama WHERE ID = ".$param."";
        $return = $this->db->query($sql);
        return $return->row();
    }

    public function get_exsport_kerjasama($param){
        $sql    = "SELECT 
                    NamaKerjasama,
                    BidangKerjasama,
                    LingkupID,
                    Tahun,
                    TanggalMulai,
                    TanggalSelesai
                   FROM trxKerjasama
                   WHERE Stakeholder='".$param."'";
        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('Nama Kerjasama', 'Bidang Kerjasama', 'Lingkup', 'Tahun', 'Tanggal Mulai','Tanggal Selesai'));
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
