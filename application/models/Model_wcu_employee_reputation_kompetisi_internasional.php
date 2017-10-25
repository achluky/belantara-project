<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_employee_reputation_kompetisi_internasional extends CI_Model {

	
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
                    d.Nama As Departemen
                    FROM mstMayor as a INNER JOIN 
                    refStrata as b ON b.ID=a.StrataID INNER JOIN 
                    mstDepartemen c ON a.DepartemenID = c.ID INNER JOIN 
                    mstStrukturOrganisasi d ON c.ID = d.ID
                    -- WHERE a.StrataID=3 OR a.StrataID=4
                    ORDER BY c.Kode, a.Nama ASC
                    ";
        return $this->db->query($sql);
    }
    public function getMayor($id=null){
        
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
                    ->select('t1.ID, t1.NIM,  t6.Nama AS NamaMahasiswa, t1.JudulKegiatan, t1.JenisKegiatanMahasiswaID, t1.Penyelenggara, t1.Tempat,
                     t1.TanggalKegiatan, t1.LingkupID, t1.PrestasiMahasiswaID, t1.Sertifikat')
                    ->from($table.' t1 ')
                    ->join("mstMahasiswa  t2","t2.NIM = t1.NIM", "left")
                    ->join("mstOrang  t6","t6.ID = t2.OrangID", "left")
                    ->join("refLingkup  t3","t3.ID = t1.LingkupID", "left")
					->where('UPPER(t3.Tingkat)', 'INTERNASIONAL');
		$this->db->where('ID', $id); 
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
	public function get_once_with_relation($table, $id)
    {
	
       $this->db
                    ->select('t1.ID, 
                        t1.NIM, 
                        t6.Nama AS NamaMahasiswa, 
                        t1.JudulKegiatan, 
                        t3.Nama AS JenisKegiatanMahasiswa, 
                        t1.Penyelenggara, 
                        t1.Tempat, 
                        t1.TanggalKegiatan, 
                        t4.Tingkat, 
                        t5.Nama AS Prestasi, 
                        t1.Sertifikat,
                        t7.ID AS MayorID, 
                        t7.StrataID')
                    ->from($table.' t1 ')
                    ->join("mstMahasiswa  t2","t2.NIM = t1.NIM", "left")
                    ->join("mstOrang  t6","t6.ID = t2.OrangID", "left")
                    ->join("mstMayor t7","t2.MayorID = t7.ID", "left")
                    ->join("mstDepartemen t8","t8.ID = t7.DepartemenID", "left")
                    ->join("mstStrukturorganisasi t9", "t9.ID=t8.ID", "left")
                    ->join("refJenisKegiatanMahasiswa  t3","t3.ID = t1.JenisKegiatanMahasiswaID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LingkupID", "left")
                    ->join("refPrestasiMahasiswa  t5","t5.ID = t1.PrestasiMahasiswaID", "left")
					->where('t1.ID', $id)
					->where('UPPER(t4.Tingkat)', 'INTERNASIONAL');
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
    public function _get_datatables_query($table, $c, $o, $id)
    {
          $this->db
                    ->select('t1.ID, 
                        t1.NIM, 
                        t6.Nama AS NamaMahasiswa, 
                        t1.JudulKegiatan, 
                        t1.Penyelenggara, 
                        t1.Tempat, 
                        t1.TanggalKegiatan, 
                        t4.Tingkat, 
                        t5.Nama AS Prestasi')
                    ->from($table.' t1 ')
                    ->join("mstMahasiswa  t2","t2.NIM = t1.NIM", "left")
                    ->join("mstOrang  t6","t6.ID = t2.OrangID", "left")
                    ->join("mstMayor t7","t2.MayorID = t7.ID", "left")
                    ->join("mstDepartemen t8","t8.ID = t7.DepartemenID", "left")
                    ->join("refJenisKegiatanMahasiswa  t3","t3.ID = t1.JenisKegiatanMahasiswaID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LingkupID", "left")
                    ->join("refPrestasiMahasiswa  t5","t5.ID = t1.PrestasiMahasiswaID", "left")
                    ->where("t7.ID",$id)
					->where('UPPER(t4.Tingkat)', 'INTERNASIONAL');
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
                    ->join("mstMahasiswa  t2","t2.NIM = t1.NIM", "left")
                    ->join("mstOrang  t6","t6.ID = t2.OrangID", "left")
                    ->join("refJenisKegiatanMahasiswa  t3","t3.ID = t1.JenisKegiatanMahasiswaID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LingkupID", "left")
                    ->join("refPrestasiMahasiswa  t5","t5.ID = t1.PrestasiMahasiswaID", "left")
					->where('UPPER(t4.Tingkat)', 'INTERNASIONAL');
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
                    ->select('t1.ID, t1.NIM, t6.Nama AS NamaMahasiswa, t1.JudulKegiatan, t3.Nama AS JenisKegiatan, t1.Penyelenggara, t1.Tempat, t1.TanggalKegiatan, t4.Tingkat, t5.Nama AS Prestasi, t1.Sertifikat')
                    ->from($table.' t1 ')
                    ->join("mstMahasiswa  t2","t2.NIM = t1.NIM", "left")
                    ->join("mstOrang  t6","t6.ID = t2.OrangID", "left")
                    ->join("mstMayor t7","t2.MayorID = t7.ID", "left")
                    ->join("mstDepartemen t8","t8.ID = t7.DepartemenID", "left")
                    ->join("refJenisKegiatanMahasiswa  t3","t3.ID = t1.JenisKegiatanMahasiswaID", "left")
                    ->join("refLingkup  t4","t4.ID = t1.LingkupID", "left")
                    ->join("refPrestasiMahasiswa  t5","t5.ID = t1.PrestasiMahasiswaID", "left")
                    ->where("t7.ID",$id)
					->where('UPPER(t4.Tingkat)', 'INTERNASIONAL');
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
	
	
	public function get_all_prestasi_mahasiswa()
    {
        $this->db
					->select('ID, Nama')
                    ->from("refPrestasiMahasiswa");
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
	
	
	public function get_all_jenis_kegiatan_mahasiswa()
    {
        $this->db
					->select('ID, Nama')
                    ->from("refJenisKegiatanMahasiswa");
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
	
	
	public function get_all_mahasiswa()
    {
        $this->db
					->select('NIM AS ID, Nama')
                    ->from("mstMahasiswa");
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
}

