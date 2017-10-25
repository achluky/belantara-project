<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_employee_reputation_keikutsertaan_dosen extends CI_Model {

	
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
	
        $this->db
                    ->select('t1.ID, t1.NIP, t4.Nama AS NamaDosen, t1.AsosiasiID, t1.Posisi, t1.NomorAnggota, t1.TerdaftarTanggal')
                    ->from($table.' t1 ')
                    ->join("mstDosen  t2","t2.NIP = t1.NIP", "left")
                    ->join("mstOrang t4", "t4.ID=t2.OrangID")
					->where('t1.ID', $id); 
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
	public function get_once_with_relation($table, $id)
    {
	
       $this->db
                    ->select('t1.ID, 
                        t1.NIP, 
                        t4.Nama AS NamaDosen, 
                        t3.Nama AS NamaAsosiasi, 
                        t1.Posisi, 
                        t1.NomorAnggota, 
                        t1.TerdaftarTanggal, 
                        t7.Nama AS Negara, 
                        t2.StrukturOrganisasiID AS Departement,
                        s1.Nama AS NamaDepartemen,
                        s2.Nama AS Fakultas')
                    ->from($table.' t1 ')
                    ->join("mstDosen  t2","t2.NIP = t1.NIP", "left")
                    ->join("mstOrang t4", "t4.ID=t2.OrangID")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t2.StrukturOrganisasiID", "left")
                    ->join("mstDepartemen t8","t8.ID = s1.ID", "left")
                    ->join("mstFakultas t9","t9.ID = t8.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t9.ID", "left")
                    ->join("refAsosiasiProfesi  t3","t3.ID = t1.AsosiasiID", "left")
                    ->join("refnegara t7", "t7.ID=t3.NegaraID", "left")
					->where('t1.ID', $id);
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
    public function _get_datatables_query($table, $c, $o, $id)
    {
          $this->db
                    ->select('t1.ID, 
                        t1.NIP, 
                        t4.Nama AS NamaDosen, 
                        t3.Nama AS NamaAsosiasi, 
                        t1.Posisi, 
                        t1.NomorAnggota, 
                        t1.TerdaftarTanggal,
                        t7.Nama AS Negara')
                    ->from($table.' t1 ')
                    ->join("mstDosen  t2"," t2.NIP = t1.NIP", "left")
                    ->join("mstOrang t4", "t4.ID=t2.OrangID")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t2.StrukturOrganisasiID", "left")
                    ->join("mstDepartemen t8","t8.ID = s1.ID", "left")
                    ->join("mstFakultas t9","t9.ID = t8.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t9.ID", "left")
                    ->join("refAsosiasiProfesi  t3","t3.ID = t1.AsosiasiID", "left")
                    ->join("refnegara t7", "t7.ID=t3.NegaraID", "left")
                    ->where("t8.ID", $id)
                    ->where("t7.Nama!=", "Indonesia");
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
                    ->join("mstDosen  t2","t2.NIP = t1.NIP", "left")
                    ->join("mstOrang t4", "t4.ID=t2.OrangID")
                    ->join("refAsosiasiProfesi  t3","t3.ID = t1.AsosiasiID", "left");
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
                        t1.NIP, 
                        t4.Nama AS NamaDosen, 
                        t3.Nama AS NamaAsosiasi, 
                        t1.Posisi, 
                        t1.NomorAnggota, 
                        t1.TerdaftarTanggal,
                        t7.Nama AS Negara')
                    ->from($table.' t1 ')
                    ->join("mstDosen  t2","t2.NIP = t1.NIP", "left")
                    ->join("mstOrang t4", "t4.ID=t2.OrangID")
                    ->join("mstStrukturOrganisasi  s1","s1.ID = t2.StrukturOrganisasiID", "left")
                    ->join("mstDepartemen t8","t8.ID = s1.ID", "left")
                    ->join("mstFakultas t9","t9.ID = t8.FakultasID", "left")
                    ->join("mstStrukturOrganisasi  s2","s2.ID = t9.ID", "left")
                    ->join("refAsosiasiProfesi  t3","t3.ID = t1.AsosiasiID", "left")
                    ->join("refnegara t7", "t7.ID=t3.NegaraID", "left")
                    ->where("t8.ID", $id)
                    ->where("t7.Nama!=", "Indonesia");
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
	
	
	public function get_all_asosiasi()
    {
        $this->db
					->select('ID, Nama')
                    ->from("refAsosiasiProfesi");
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
	
	
	public function get_all_dosen()
    {
        $this->db
					->select('NIP AS ID, Nama')
                    ->from("mstDosen");
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
}

