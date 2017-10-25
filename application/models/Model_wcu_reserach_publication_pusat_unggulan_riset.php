<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_reserach_publication_pusat_unggulan_riset extends CI_Model {

    // mstMahasiswa

    var $column = array('ID','Nama_pusat','Produk_Unggulan','Kontak');
    var $order = array('ID' => 'ASC');

    public function get_Pusat(){
        $sql = "SELECT * FROM mststrukturorganisasi  
                WHERE KelompokStrukturID=7 OR KelompokStrukturID=11 OR KelompokStrukturID=12 OR KelompokStrukturID=13 OR KelompokStrukturID=14";
        return $this->db->query($sql);
    }
    public function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_all(){
        $this->db->from("mstprodukunggulan");
        return $this->db->count_all_results();
    }
    public function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function _get_datatables_query(){
        $this->db->select("
                    t1.ID,
                    t1.Nama,
                    t1.Kode,
                    t1.Kontak,
                    t2.Nama as NamaPusat");
        $this->db->from("mstprodukunggulan t1");
        $this->db->join("mststrukturorganisasi t2","t1.StrukturOrganisasiID = t2.ID");
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
    public function save($data){
        $this->db->set($data);
        $this->db->insert('mstprodukunggulan');
        return $this->db->insert_id();
    }   
    public function get_once($id){
        $sql = "SELECT 
                    mstprodukunggulan.ID,
                    mstprodukunggulan.Nama,
                    mstprodukunggulan.Kode,
                    mstprodukunggulan.Kontak,
                    mststrukturorganisasi.Nama as NamaPusat,
                    mstprodukunggulan.StrukturOrganisasiID
                FROM mstprodukunggulan 
                JOIN mststrukturorganisasi 
                ON mstprodukunggulan.StrukturOrganisasiID = mststrukturorganisasi.ID 
                WHERE mstprodukunggulan.ID = '".$id."'";
        $return = $this->db->query($sql);
        return $return->row();
    }
    public function update($data,$id){
        $this->db->where('ID', $id);
        $this->db->update('mstprodukunggulan', $data); 
        return True;
    }
    public function delete($id){
        $data = array(
               'Status' => 0
            );

        $this->db->where('ID', $id);
        return $this->db->update('mstprodukunggulan', $data); 
    }
    public function get_exsport(){
        $sql 	= " SELECT
                    ID,
                    Nama_pusat,
                    Produk_Unggulan,
                    Kontak
                    FROM mstprodukunggulan";
        $rst    = $this->db->query($sql);   
        $data   = array(1 => array ('ID', 'Nama pusat','Produk Unggulan','Kontak'));
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
