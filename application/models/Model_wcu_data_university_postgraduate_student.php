
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_data_university_postgraduate_student  extends CI_Model {

    var $column = array('NIM','Nama','TempatLahir','TanggalLahir','JenisKelamin','Fakultas','Departemen','Mayor','Strata');
    var $order = array('NIM' => 'desc');

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
					WHERE a.StrataID=3 OR a.StrataID=4
					ORDER BY c.Kode, a.Nama ASC
					";
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
					WHERE (a.StrataID=3 OR a.StrataID=4) AND a.ID = $id
					ORDER BY b.Kode, a.Nama ASC";
		$result = $this->db->query($sql)->result();
		
		if(count($result)>0)
			return $result[0]->Mayor;
		else
			return "";
    }
	
    public function get_datatables_listStudent($param,$param2){
        $this->_get_datatables_query($param,$param2);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_allStudent($param,$param2){
        $this->db->from("mstMahasiswa");
        $this->db->join('mstOrang','mstMahasiswa.OrangID=mstOrang.ID');
        $this->db->join('mstMayor','mstMahasiswa.MayorID=mstMayor.ID');
        $this->db->join('refStrata','refStrata.ID=mstMayor.StrataID');
        $where = "mstMahasiswa.MayorID='".$param."' AND mstMayor.StrataID=".$param2."";
        $this->db->where($where);
        return $this->db->count_all_results();
    }
    public function count_filteredStudent($param,$param2){
        $this->_get_datatables_query($param,$param2);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function _get_datatables_query($param,$param2){
		$this->db->select("

				mstMahasiswa.NIM, 
				mstOrang.Nama,
				mstOrang.TempatLahir,
				mstOrang.TanggalLahir,
				refJenisKelamin.Nama as JenisKelamin,
				s2.Nama as Fakultas,
                s1.Nama as Departemen,
                mstMayor.Nama as Mayor,
				refStrata.Nama as Strata
            ");
        $this->db->from("mstMahasiswa");
        $this->db->join('mstOrang','mstMahasiswa.OrangID=mstOrang.ID');
		$this->db->join('mstMayor', 'mstMayor.ID=mstMahasiswa.MayorID', 'left');
        $this->db->join('mstDepartemen', 'mstDepartemen.ID=mstMayor.DepartemenID', 'left');
        $this->db->join('mstStrukturOrganisasi s1', 's1.ID=mstDepartemen.ID', 'left');
        $this->db->join('mstFakultas', 'mstFakultas.ID=mstDepartemen.FakultasID', 'left');
        $this->db->join('mstStrukturOrganisasi s2', 's2.ID=mstFakultas.ID', 'left');
        $this->db->join('refStrata','refStrata.ID=mstMayor.StrataID');
        $this->db->join('refJenisKelamin','mstOrang.JenisKelaminID=refJenisKelamin.ID');
		$where = "mstMahasiswa.MayorID='".$param."' AND mstMayor.StrataID=".$param2."";
        $this->db->where($where);
		
		$sub_query = $this->db->get_compiled_select();

		#Create main query
		$this->db->select('*');
		$this->db->from('('.$sub_query.') a');
		
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
			$orderby = $column[$_POST['order']['0']['column']];
            $this->db->order_by($orderby, $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
			$orderby = key($order);
            $this->db->order_by($orderby, $order[key($order)]);
        }
    }

    //////////////////

    public function getStudenOne($nim){
        $sql = "SELECT 
                    mstOrang.Nama,
                    mstOrang.TempatLahir,
                    mstOrang.TanggalLahir,
                    mstOrang.JenisKelaminID,
                    s2.Nama as Fakultas,
                    s1.Nama as Departemen,
                    mstMayor.Nama as Mayor,
                    mstMayor.StrataID
                FROM mstMahasiswa INNER JOIN 
				mstOrang ON mstMahasiswa.OrangID=mstOrang.ID INNER JOIN
                mstMayor ON mstMahasiswa.MayorID=mstMayor.ID INNER JOIN
                mstDepartemen ON mstMayor.DepartemenID=mstDepartemen.ID INNER JOIN
                mstStrukturOrganisasi s1 ON s1.ID=mstDepartemen.ID INNER JOIN
                mstFakultas ON mstDepartemen.FakultasID=mstFakultas.ID INNER JOIN
                mstStrukturOrganisasi s2 ON s2.ID=mstFakultas.ID
                WHERE NIM = '".$nim."' AND (mstMayor.StrataID=3 OR mstMayor.StrataID=4)";
        return $this->db->query($sql);
    }

    public function get_exsport_graduate_mahasiswa($param,$param2){
        $sql = "SELECT 
                    mstMahasiswa.NIM, 
                    mstOrang.Nama,
                    mstOrang.TempatLahir,
                    mstOrang.TanggalLahir,
                    refJenisKelamin.Nama as JenisKelamin,
                    s2.Nama as Fakultas,
                    s1.Nama as Departemen,
                    mstMayor.Nama as Mayor,
                    refStrata.Nama as Strata

               FROM mstMahasiswa INNER JOIN 
				mstOrang ON mstMahasiswa.OrangID=mstOrang.ID INNER JOIN
                mstMayor ON mstMahasiswa.MayorID=mstMayor.ID INNER JOIN
                mstDepartemen ON mstMayor.DepartemenID=mstDepartemen.ID INNER JOIN
                mstStrukturOrganisasi s1 ON s1.ID=mstDepartemen.ID INNER JOIN
                mstFakultas ON mstDepartemen.FakultasID=mstFakultas.ID INNER JOIN
                mstStrukturOrganisasi s2 ON s2.ID=mstFakultas.ID
                JOIN refStrata
                ON mstMayor.StrataID=refStrata.ID
                JOIN refJenisKelamin
                ON mstOrang.JenisKelaminID=refJenisKelamin.ID
                
                WHERE mstMahasiswa.MayorID = '".$param."' AND mstMayor.StrataID=".$param2."";
        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('NIM','Nama','TempatLahir', 'TanggalLahir', 'JenisKelamin', 'Fakultas', 'Departemen', 'Mayor', 'Strata'));
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
