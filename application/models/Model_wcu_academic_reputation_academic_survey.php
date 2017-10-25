<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_academic_reputation_academic_survey extends CI_Model {

	
    public function __construct()
    {
        parent::__construct();
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
                    ->select('t1.ID, t1.NamaDepan, t1.NamaBelakang, t1.Gelar, t1.Email, t1.Telepon, t2.Nama AS Negara, t1.Universitas, t1.Pekerjaan, t1.PosisiPekerjaan, t1.SektorPekerjaan, t1.Departemen, t1.Institusi, t3.Nama AS JenisKontakSurvey')
                    ->from($table.' t1 ')
                    ->join("refNegara  t2","t2.ID = t1.NegaraID", "left")
                    ->join("refJenisKontakSurvey  t3","t3.ID = t1.JenisKontakSurveyID", "left")
					->where('t1.ID', $id)
					->where('t3.ID', 1);
		$result	 = $this->db->get()->result_array();
        return (isset($result[0])?$result[0]:array("ID"=>null));
    }
    public function _get_datatables_query($table, $c, $o)
    {
          $this->db
                    ->select('t1.ID, t3.Nama AS JenisKontakSurvey, t1.NamaDepan, t1.NamaBelakang, t1.Gelar, t2.Nama AS Negara,  
                        t1.Universitas, t1.Pekerjaan, t1.Departemen, t1.Institusi')
                    ->from($table.' t1 ')
                    ->join("refNegara  t2","t2.ID = t1.NegaraID", "left")
                    ->join("refJenisKontakSurvey  t3","t3.ID = t1.JenisKontakSurveyID", "left")
					->where('t3.ID', 1);
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
    public function get_datatables($table, $column, $order)
    {
        $this->_get_datatables_query($table, $column, $order);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
	
	public function count_all($table)
    {
         $this->db
                    ->from($table.' t1 ')
                    ->join("refNegara  t2","t2.ID = t1.NegaraID", "left")
                    ->join("refJenisKontakSurvey  t3","t3.ID = t1.JenisKontakSurveyID", "left")
					->where('t3.ID', 1);
        return $this->db->count_all_results();
    }
    public function count_filtered($table, $column, $order)
    {
        $this->_get_datatables_query($table, $column, $order);
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	public function get_exsport($table, $header, $header_column){
		 $this->db
                    ->select('t1.ID, t1.NamaDepan, t1.NamaBelakang, t1.Gelar, t1.Email, t1.Telepon, t2.Nama AS Negara, t1.Universitas, t1.Pekerjaan, t1.PosisiPekerjaan, t1.SektorPekerjaan, t1.Departemen, t1.Institusi, t3.Nama AS JenisKontakSurvey')
                    ->from($table.' t1 ')
                    ->join("refNegara  t2","t2.ID = t1.NegaraID", "left")
                    ->join("refJenisKontakSurvey  t3","t3.ID = t1.JenisKontakSurveyID", "left")
					->where('t3.ID', 1);
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

