<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_internasionalization_inbound extends CI_Model {

	
    public function __construct()
    {
        parent::__construct();
    }

    public function get_departemen(){
        $sql = "SELECT a.ID, b.Nama AS Departemen,  d.Nama AS Fakultas 
				FROM mstDepartemen a INNER JOIN 
				mstStrukturOrganisasi b ON a.ID = b.ID INNER JOIN
                mstFakultas c ON a.FakultasID=c.ID INNER JOIN 
				mstStrukturOrganisasi d ON c.ID = d.ID
                ORDER BY c.Kode ASC";
        return $this->db->query($sql);
    }
    public function get_departemen_once($id=null){
       $sql = "SELECT a.ID, b.Nama AS Departemen,  d.Nama AS Fakultas 
				FROM mstDepartemen a INNER JOIN 
				mstStrukturOrganisasi b ON a.ID = b.ID INNER JOIN
                mstFakultas c ON a.FakultasID=c.ID INNER JOIN 
				mstStrukturOrganisasi d ON c.ID = d.ID
				WHERE a.ID = $id
                ORDER BY c.Kode ASC";
        $result = $this->db->query($sql)->result();
        
        if(count($result)>0)
            return $result[0]->Departemen;
        else
            return "";
    }
	public function get_once_with_relation($table, $id)
    {
       $this->db

                    ->select('
                                t1.ID, 
                                t2.Nama AS NamaMahasiswa, 
                                s1.Nama AS Departemen, 
                                s2.Nama AS Fakultas, 
                                t3.Nama AS NegaraAsal, 
                                t1.Kegiatan, 
                                t1.TanggalMulai, 
                                t1.TanggalSelesai, '
                            )
                    ->from($table.' t1 ')
                    ->join("mstOrangTamu  t2","t2.ID = t1.OrangTamuID", "left")
                    ->join("refNegara  t3","t3.ID = t1.NegaraAsalID", "left")
                    ->join("mstDepartemen t4","t4.ID = t1.UnitID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t4.ID", "left")
                    ->join("mstFakultas t5","t5.ID = t4.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t5.ID", "left")
                    ->where("t1.ID",$id);

		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
    public function _get_datatables_query($table, $c, $o, $id)
    {
        $this->db  
                    ->select('
                                t1.ID, 
                                t2.Nama AS NamaMahasiswa, 
                                t3.Nama AS NegaraAsal, 
                                t1.Kegiatan, 
                                t1.TanggalMulai, 
                                t1.TanggalSelesai, '
                            )
                    ->from($table.' t1 ')
                    ->join("mstOrangTamu  t2","t2.ID = t1.OrangTamuID", "left")
                    ->join("refNegara  t3","t3.ID = t1.NegaraAsalID", "left")
                    ->join("mstDepartemen t4","t4.ID = t1.UnitID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t4.ID", "left")
                    ->join("mstFakultas t5","t5.ID = t4.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t5.ID", "left")
                    ->where("t4.ID",$id);
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
	
	public function count_all($table, $id)
    {
        $this->db
                    ->from($table.' t1 ')
                    ->join("mstOrangTamu  t2","t2.ID = t1.OrangTamuID", "left")
                    ->join("refNegara  t3","t3.ID = t1.NegaraAsalID", "left")
                    ->join("mstDepartemen t4","t4.ID = t1.UnitID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t4.ID", "left")
                    ->join("mstFakultas t5","t5.ID = t4.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t5.ID", "left")
                    ->where("t4.ID",$id);
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
                    ->select('
                                t1.ID, 
                                t2.Nama AS NamaMahasiswa, 
                                s1.Nama AS Departemen, 
                                s2.Nama AS Fakultas, 
                                t3.Nama AS NegaraAsal, 
                                t1.Kegiatan, 
                                t1.TanggalMulai, 
                                t1.TanggalSelesai, '
                            )
                    ->from($table.' t1 ')
                    ->join("mstOrangTamu  t2","t2.ID = t1.OrangTamuID", "left")
                    ->join("refNegara  t3","t3.ID = t1.NegaraAsalID", "left")
                    ->join("mstDepartemen t4","t4.ID = t1.UnitID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t4.ID", "left")
                    ->join("mstFakultas t5","t5.ID = t4.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t5.ID", "left")
                    ->where("t4.ID",$id);

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
}

