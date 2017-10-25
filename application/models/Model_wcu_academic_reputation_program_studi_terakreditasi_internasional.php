<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_academic_reputation_program_studi_terakreditasi_internasional extends CI_Model {

	
    public function __construct()
    {
        parent::__construct();
    }

    public function getListDepartement(){
        $sql = "SELECT 
                    d.ID,
                    d.Kode,
                    d.FakultasID,
                    c.Nama
                FROM mstDepartemen as d 
                INNER JOIN mstStrukturOrganisasi c ON d.ID = c.ID
                WHERE c.Aktif=1
                ORDER BY d.Kode, c.Nama ASC";
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
                        t4.Nama AS Mayor, 
                        s1.Nama AS Departemen, 
                        s2.Nama AS Fakultas, 
                        t1.NilaiAkreditasi, 
                        t1.PredikatAkreditasi, 
                        t1.TMTAkreditasi, 
                        t1.TSTAkreditasi, 
                        t3.Nama AS LembagaPengakreditasi, 
                        t2.Tingkat,
                        t5.ID AS departemenID')
                    ->from($table.' t1 ')
                    ->join("refLingkup  t2","t2.ID = t1.LingkupAkreditasiID", "left")
                    ->join("refLembagaPengakreditasi  t3","t3.ID = t1.LembagaPengakreditasiID", "left")
                    ->join("mstMayor  t4","t4.ID = t1.MayorID", "left")
                    ->join("mstDepartemen  t5","t5.ID = t4.DepartemenID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t5.ID", "left")
                    ->join("mstFakultas t6","t6.ID = t5.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t6.ID", "left")
                    ->join("refStrata  t7","t7.ID = t4.StrataID", "left")
					->where('t1.ID', $id)
					->where('UPPER(t2.Tingkat)', 'INTERNASIONAL');
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
    public function _get_datatables_query($table, $c, $o, $id)
    {
        $this->db
                    ->select('t1.ID, 
                                t4.Nama AS Mayor, 
                                t7.Kode As Strata,
                                t1.NilaiAkreditasi, 
                                t1.PredikatAkreditasi, 
                                t1.TMTAkreditasi, 
                                t1.TSTAkreditasi, 
                                t3.Nama AS LembagaPengakreditasi,
                                t2.Tingkat')
                    ->from($table.' t1 ')
                    ->join("refLingkup  t2","t2.ID = t1.LingkupAkreditasiID", "left")
                    ->join("refLembagaPengakreditasi  t3","t3.ID = t1.LembagaPengakreditasiID", "left")
                    ->join("mstMayor  t4","t4.ID = t1.MayorID", "left")
                    ->join("mstDepartemen  t5","t5.ID = t4.DepartemenID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t5.ID", "left")
                    ->join("mstFakultas t6","t6.ID = t5.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t6.ID", "left")
                    ->join("refStrata  t7","t7.ID = t4.StrataID", "left")
					->where('UPPER(t2.Tingkat)', 'INTERNASIONAL')
                    ->where('t5.ID', $id);
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
	
	public function count_all($table)
    {
        $this->db
                    ->from($table.' t1 ')
                    ->join("refLingkup  t2","t2.ID = t1.LingkupAkreditasiID", "left")
                    ->join("refLembagaPengakreditasi  t3","t3.ID = t1.LembagaPengakreditasiID", "left")
                    ->join("mstMayor  t4","t4.ID = t1.MayorID", "left")
                    ->join("mstDepartemen  t5","t5.ID = t4.DepartemenID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t5.ID", "left")
                    ->join("mstFakultas t6","t6.ID = t5.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t6.ID", "left")
                    ->join("refStrata  t7","t7.ID = t4.StrataID", "left")
					->where('UPPER(t2.Tingkat)', 'INTERNASIONAL');
        return $this->db->count_all_results();
    }
    public function count_filtered($table, $column, $order, $id)
    {
        $this->_get_datatables_query($table, $column, $order, $id);
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	public function get_exsport($table, $header, $header_column,$id){
		$this->db
                    ->select('t1.ID, t4.Nama AS Mayor, s1.Nama AS Departemen, s2.Nama AS Fakultas, 
                        t1.NilaiAkreditasi, t1.PredikatAkreditasi, t1.TMTAkreditasi, t1.TSTAkreditasi, 
                        t3.Nama AS LembagaPengakreditasi, t2.Tingkat')
                    ->from($table.' t1 ')
                    ->join("refLingkup  t2","t2.ID = t1.LingkupAkreditasiID", "left")
                    ->join("refLembagaPengakreditasi  t3","t3.ID = t1.LembagaPengakreditasiID", "left")
                    ->join("mstMayor  t4","t4.ID = t1.MayorID", "left")
                    ->join("mstDepartemen  t5","t5.ID = t4.DepartemenID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t5.ID", "left")
                    ->join("mstFakultas t6","t6.ID = t5.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t6.ID", "left")
                    ->join("refStrata  t7","t7.ID = t4.StrataID", "left")
                    ->where("t5.ID", $id)
					->where('UPPER(t2.Tingkat)', 'INTERNASIONAL');
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
	
	
	public function get_all_tingkat()
    {
        $this->db
					->select('ID, Tingkat AS Nama')
                    ->from("refLingkup");
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
	
	
	public function get_all_lembaga_pengakreditasi()
    {
        $this->db
					->select('ID, Nama')
                    ->from("refLembagaPengakreditasi");
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
}

