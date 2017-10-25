<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_internasionalization_laboratorium_sertifikasi_internasional extends CI_Model {

	private $header = array('ID','Ruang','Nilai Akreditasi','Predikat Akreditasi','TMT Akreditasi','TST Akreditasi','Lembaga Pengakreditasi','Lingkup Akreditasi');
    private $header_column = array('AUTONUMBER','RuangID','NilaiAkreditasi','PredikatAkreditasi','TMTAkreditasi','TSTAkreditasi','LembagaPengakreditasiID','LingkupAkreditasiID');
    
    private $c = array('NilaiAkreditasi', 'PredikatAkreditasi', 'TMTAkreditasi', 'TSTAkreditasi', 'Nama');
    private $o = array('t2.Nama' => 'asc');

    public function __construct()
    {
        parent::__construct();
    }

	public function get_once_with_relation($table, $id)
    {
	
       $this->db
                    ->select('t1.ID, t3.NIM, t3.Nama AS NamaMahasiswa, t4.Nama AS Strata, t3.Mayor, t3.Departemen, t3.Fakultas, t2.InstitusiTujuan, t5.Nama AS NegaraTujuan, t2.Kegiatan, t2.TanggalMulai, t2.TanggalSelesai')
                    ->from($table.' t1 ')
                    ->join("trxOutbound  t2","t2.ID = t1.OutbondID", "left")
                    ->join("mstMahasiswa  t3","t3.NIM = t1.NIM", "left")
                    ->join("refStrata  t4","t4.ID = t3.StrataID", "left")
                    ->join("refNegara  t5","t5.ID = t2.NegaraTujuanID", "left")
                    ->where("t4.Kode","S2")->or_where("t4.Kode","S3")
					->where('t1.ID', $id);
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
    public function _get_datatables_query()
    {
        $this->db
                    ->select('t1.ID as IDLab, t1.NilaiAkreditasi, t1.PredikatAkreditasi, t1.TMTAkreditasi, 
                              t1.TSTAkreditasi, t2.Nama, t3.nama as Lembaga, t4.Tingkat')
                    ->from('hisAkreditasiLab t1')
                    ->join("refRuang  t2","t2.ID = t1.RuangID", "left")
                    ->join("refLembagaPengakreditasi  t3","t3.ID = t1.LembagaPengakreditasiID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LingkupAkreditasiID", "left")
                    ->where("t1.LingkupAkreditasiID",1);
		$sub_query = $this->db->get_compiled_select();

		#Create main query
		$this->db->select('*');
		$this->db->from('('.$sub_query.') a');
		
        $i = 0;
        foreach ($this->c as $item)    
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }
		
        if(isset($_POST['order']))
        {
			$orderby = $column[$_POST['order']['0']['column']];
            $this->db->order_by($orderby, $_POST['order']['0']['dir']);
        }
        else if(isset($o))
        {
            $order = $o;
			$orderby = key($order);
            $this->db->order_by($orderby, $order[key($order)]);
        }
    }
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
	
	public function count_all()
    {
        $this->db
                    ->from('hisAkreditasiLab t1')
                    ->join("refRuang  t2","t2.ID = t1.RuangID", "left")
                    ->join("refLembagaPengakreditasi  t3","t3.ID = t1.LembagaPengakreditasiID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LingkupAkreditasiID", "left")
                    ->where("t1.LingkupAkreditasiID",1);
        return $this->db->count_all_results();
    }
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	public function get_exsport(){
		$this->db
                    ->from('hisAkreditasiLab t1')
                    ->join("refRuang  t2","t2.ID = t1.RuangID", "left")
                    ->join("refLembagaPengakreditasi  t3","t3.ID = t1.LembagaPengakreditasiID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LingkupAkreditasiID", "left")
                    ->where("t1.LingkupAkreditasiID",1);
		$result	 = $this->db->get()->result_array();
    	$data = array(1 => $this->header);
		$i=0;
    	foreach ($result as $row1){
			$temp = array();
			if(is_array($row1)){
				foreach($this->header_column as $row2){
					if(strtoupper($row2)=="AUTONUMBER"){
						$temp['No.'] = ++$i;
					}else{
						$temp[$row2] = $row1[$row2];
					}
				}
			}
			if(count($temp)>0)
				array_push($data, $temp);
		}
    	return $data;
    }


    public function getonce($id){
        // $sql = "SELECT * FROM hisAkreditasiLab WHERE ID = ".$id."";
        // $return = $this->db->query($sql);
        $this->db
                    ->select('t1.ID as IDLab, t1.NilaiAkreditasi, t1.PredikatAkreditasi, t1.TMTAkreditasi, 
                              t1.TSTAkreditasi, t2.Nama, t3.nama as Lembaga, t4.Tingkat')
                    ->from('hisAkreditasiLab t1')
                    ->join("refRuang  t2","t2.ID = t1.RuangID", "left")
                    ->join("refLembagaPengakreditasi  t3","t3.ID = t1.LembagaPengakreditasiID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LingkupAkreditasiID", "left")
                    ->where("t1.LingkupAkreditasiID",1)
                    ->where("t1.ID",$id);
        $result  = $this->db->get();            
        return $result->row();
    }

}

