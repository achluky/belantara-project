<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_employee_reputation_publikasi_jurnal_internasional extends CI_Model {

	
    public function __construct()
    {
        parent::__construct();
    }

    public function getYears($table){
        $sql = "SELECT distinct TahunTerbit
                FROM ".$table." ORDER BY TahunTerbit DESC";
        return $this->db->query($sql);
    }

    public function update($table, $data)
    {
    	if(isset($data['ID'])){
			$this->db->where('ID', $data['ID']);
			return $this->db->update($table, $data);
		}		
		return false;
    }

    public function save($table, $data)
    {
    	if(is_array($data)){
			$this->db->insert($table, $data);
			return  $this->db->insert_id();
		}		
		return null;
    }

    public function delete($table, $id)
    {
    	if($id!=null){
			return $this->db->delete($table, array("ID"=>$id));
		}		
		return false;
    }
	public function get_once($table, $id)
    {
	
        $this->db->from($table);
		$this->db->where('ID', $id); 
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
	public function get_once_with_relation($table, $id)
    {
	   $this->db
                    ->select('t1.ID, 
                        t1.Judul AS JudulPaper, 
                        t1.NamaArtikel AS NamaJurnal, 
                        t5.Nama As NamaPenulis, 
                        t2.Urutan AS PenulisKe, 
                        t4.Tingkat, 
                        t1.TahunTerbit,
                        t1.KotaTerbit, 
                        t1.ISSN, 
                        t1.ISBN, 
                        t1.Volume, 
                        t1.Halaman, 
                        t1.Nomor, 
                        t1.Url')
                    ->from($table.' t1 ')
                    ->join("trxPenulisArtikel  t2","t2.ArtikelID = t1.ID", "inner")
                    ->join("refJenisArtikel  t3","t3.ID = t1.JenisArtikelID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LevelArtikel", "left")
                    ->join("mstOrang  t5","t5.ID = t2.OrangID", "left")
					->where('t1.ID', $id)
					->where('UPPER(t3.Nama)', 'JURNAL')
					->where('UPPER(t4.Tingkat)', 'INTERNASIONAL')
					->order_by('t1.Judul', 'ASC')
					->order_by('t2.Urutan', 'ASC');
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
    public function _get_datatables_query($table, $c, $o, $id)
    {
            $this->db
                    ->select('t1.ID, 
                        t1.Judul AS JudulPaper, 
                        t1.NamaArtikel AS NamaJurnal, 
                        t5.Nama AS NamaPenulis , 
                        t2.Urutan AS PenulisKe, 
                        t4.Tingkat, 
                        t1.Url')
                    ->from($table.' t1 ')
                    ->join("trxPenulisArtikel  t2","t2.ArtikelID = t1.ID", "inner")
                    ->join("refJenisArtikel  t3","t3.ID = t1.JenisArtikelID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LevelArtikel", "left")
                    ->join("mstOrang  t5","t5.ID = t2.OrangID", "left")
					->where('UPPER(t3.Nama)', 'JURNAL')
					->where('UPPER(t4.Tingkat)', 'INTERNASIONAL')
                    ->where('t1.TahunTerbit', $id)
					->order_by('t1.Judul', 'ASC')
					->order_by('t2.Urutan', 'ASC');
		$sub_query = $this->db->get_compiled_select();

		#Create main query
		$this->db->select('*');
		$this->db->from('('.$sub_query.') a');
		
        $i = 0;
        foreach ($c as $item)    
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
    public function get_datatables($table, $column, $order, $id)
    {
        $this->_get_datatables_query($table, $column, $order, $id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
	
	public function count_all($table,$id)
    {
         $this->db
                    ->from($table.' t1 ')
                    ->join("trxPenulisArtikel  t2","t2.ArtikelID = t1.ID", "inner")
                    ->join("mstOrang  t5","t5.ID = t2.OrangID", "left")
                    ->join("refJenisArtikel  t3","t3.ID = t1.JenisArtikelID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LevelArtikel", "left")
					->where('UPPER(t3.Nama)', 'JURNAL')
					->where('UPPER(t4.Tingkat)', 'INTERNASIONAL')
                    ->where('t1.TahunTerbit', $id);
        return $this->db->count_all_results();
    }
    public function count_filtered($table, $column, $order, $id)
    {
        $this->_get_datatables_query($table, $column, $order, $id);
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	public function get_exsport($table, $header, $header_column, $id){
		 $this->db
                    ->select('t1.ID, t1.Judul AS JudulPaper, t1.NamaArtikel AS NamaJurnal, t5.Nama As NamaPenulis, t2.Urutan AS PenulisKe, t4.Tingkat, t1.TahunTerbit, t1.KotaTerbit, t1.ISSN, t1.ISBN, t1.Volume, t1.Halaman, t1.Nomor, t1.Url')
                    ->from($table.' t1 ')
                    ->join("trxPenulisArtikel  t2","t2.ArtikelID = t1.ID", "inner")
                    ->join("mstOrang  t5","t5.ID = t2.OrangID", "left")
                    ->join("refJenisArtikel  t3","t3.ID = t1.JenisArtikelID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LevelArtikel", "left")
                    ->where('UPPER(t3.Nama)', 'JURNAL')
					->where('UPPER(t4.Tingkat)', 'INTERNASIONAL')
                    ->where('t1.TahunTerbit', $id)
					->order_by('t1.Judul', 'ASC')
					->order_by('t2.Urutan', 'ASC');
		$result	 = $this->db->get()->result_array();
    	$data = array(1 => $header);
		$i=0;
    	foreach ($result as $row1){
			$temp = array();
			if(is_array($row1)){
				foreach($header_column as $row2){
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
	
	
	public function get_all_negara()
    {
        $this->db
					->select('ID, Nama')
                    ->from("refNegara");
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
	
	
	public function get_all_jenis_kontak_survey()
    {
        $this->db
					->select('ID, Nama')
                    ->from("refJenisKontakSurvey");
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
}

