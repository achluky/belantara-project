<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_internasionalization_undergraduate_outbound extends CI_Model {

	
    public function __construct()
    {
        parent::__construct();
    }

     public function getListDepartement(){
		$sql = "SELECT 
					a.ID, 
					a.Nama As Mayor,
					a.StrataID,
					b.Nama as Strata,
					b.Kode as KodeStrata,
					d.Nama As Departemen,
					f.Nama As Fakultas
					FROM mstMayor as a INNER JOIN 
					refStrata as b ON b.ID=a.StrataID INNER JOIN 
					mstDepartemen c ON a.DepartemenID = c.ID INNER JOIN 
					mstStrukturOrganisasi d ON c.ID = d.ID INNER JOIN 
					mstFakultas e ON c.FakultasID = e.ID INNER JOIN 
					mstStrukturOrganisasi f ON f.ID = e.ID
					WHERE a.StrataID=2
					ORDER BY e.Kode, a.Nama ASC";
        return $this->db->query($sql);
    }
	
	
    public function getMayor($id=null){
        if($id==null)return "";
        $tempId = explode("-", $id);
        if(!isset($tempId[1]))return "";
        $id = $tempId[1];
        
        $sql = "SELECT 
                    a.ID, 
                    a.Nama As Mayor,
                    c.Nama As Departemen
                    FROM mstMayor as a INNER JOIN 
                    mstDepartemen b ON a.DepartemenID = b.ID INNER JOIN 
                    mstStrukturOrganisasi c ON b.ID = c.ID
                    WHERE a.ID = $id 
                    ORDER BY b.Kode, a.Nama ASC";
        $result = $this->db->query($sql)->result();
        
        if(count($result)>0)
            return $result[0]->Mayor;
        else
            return "";
    }
	public function get_once_with_relation($table, $id)
    {
	
       $this->db
                    
                    ->select('t1.ID, 
                        t3.NIM, 
                        t6.Nama AS NamaMahasiswa, 
                        t4.Nama AS Strata, 
                        t7.Nama As Mayor, 
                        s1.Nama As Departemen, 
                        s2.Nama As Fakultas, 
                        t2.InstitusiTujuan, 
                        t5.Nama AS NegaraTujuan, 
                        t2.Kegiatan, 
                        t2.TanggalMulai, 
                        t2.TanggalSelesai')
                    ->from($table.' t1 ')
                    ->join("trxOutbound  t2","t2.ID = t1.OutbondID", "left")
                    ->join("mstMahasiswa  t3","t3.NIM = t1.NIM", "left")
                    ->join("mstOrang t6","t3.OrangID = t6.ID", "left")
                    ->join("mstMayor t7","t3.MayorID = t7.ID", "left")
                    ->join("mstDepartemen t8","t8.ID = t7.DepartemenID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t8.ID", "left")
                    ->join("mstFakultas t9","t9.ID = t8.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t9.ID", "left")
                    ->join("refStrata  t4","t4.ID = t7.StrataID", "left")
                    ->join("refNegara  t5","t5.ID = t2.NegaraTujuanID", "left")
                    ->where("t7.StrataID","2")
					->where('t1.ID', $id);
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
    public function _get_datatables_query($table, $c, $o, $id)
    {
        $this->db
                    ->select('t1.ID,
                                t3.NIM, 
                                t6.Nama AS NamaMahasiswa, 
                                t4.Nama AS Strata, 
                                t7.Nama As Mayor, 
                                t2.InstitusiTujuan, 
                                t5.Nama AS NegaraTujuan, 
                                t2.Kegiatan, 
                                t2.TanggalMulai, 
                                t2.TanggalSelesai'
                            )
                    ->from($table.' t1 ')
                    ->join("trxOutbound  t2","t2.ID = t1.OutbondID", "left")
                    ->join("mstMahasiswa  t3","t3.NIM = t1.NIM", "left")
                    ->join("mstOrang t6","t3.OrangID = t6.ID", "left")
                    ->join("mstMayor t7","t3.MayorID = t7.ID", "left")
                    ->join("mstDepartemen t8","t8.ID = t7.DepartemenID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t8.ID", "left")
                    ->join("mstFakultas t9","t9.ID = t8.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t9.ID", "left")
                    ->join("refStrata  t4","t4.ID = t7.StrataID", "left")
                    ->join("refNegara  t5","t5.ID = t2.NegaraTujuanID", "left")
                    ->where("t7.ID",$id)
					->where("t7.StrataID","2");
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
					->join("trxOutbound  t2","t2.ID = t1.OutbondID", "left")
                    ->join("mstMahasiswa  t3","t3.NIM = t1.NIM", "left")
                    ->join("mstOrang t6","t3.OrangID = t6.ID", "left")
                    ->join("mstMayor t7","t3.MayorID = t7.ID", "left")
                    ->join("mstDepartemen t8","t8.ID = t7.DepartemenID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t8.ID", "left")
                    ->join("mstFakultas t9","t9.ID = t8.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t9.ID", "left")
                    ->join("refStrata  t4","t4.ID = t7.StrataID", "left")
                    ->join("refNegara  t5","t5.ID = t2.NegaraTujuanID", "left")
                    ->where("t7.ID",$id)
                    ->where("t7.StrataID","2");
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
                     ->select('t1.ID, 
                        t3.NIM, 
                        t6.Nama AS NamaMahasiswa, 
                        t4.Nama AS Strata, 
                        t7.Nama As Mayor, 
                        s1.Nama As Departemen, 
                        s2.Nama As Fakultas, 
                        t2.InstitusiTujuan, 
                        t5.Nama AS NegaraTujuan, 
                        t2.Kegiatan, 
                        t2.TanggalMulai, 
                        t2.TanggalSelesai')
                    ->from($table.' t1 ')
                    ->join("trxOutbound  t2","t2.ID = t1.OutbondID", "left")
                    ->join("mstMahasiswa  t3","t3.NIM = t1.NIM", "left")
                    ->join("mstOrang t6","t3.OrangID = t6.ID", "left")
                    ->join("mstMayor t7","t3.MayorID = t7.ID", "left")
                   ->join("mstDepartemen t8","t8.ID = t7.DepartemenID", "left")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t8.ID", "left")
                    ->join("mstFakultas t9","t9.ID = t8.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t9.ID", "left")
                    ->join("refStrata  t4","t4.ID = t7.StrataID", "left")
                    ->join("refNegara  t5","t5.ID = t2.NegaraTujuanID", "left")
                    ->where("t7.ID",$id)
                    ->where("t7.StrataID","2");
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

