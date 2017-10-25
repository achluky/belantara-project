<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu_internasionalization_penghargaan_dosen_internasional extends CI_Model {

    var $column = array('NIPdosen','Nama', 'Departemen', 'Negara', 'Instansi');
    var $order = array('NIP' => 'desc');

    public function getListDepartement(){
       $sql = "SELECT a.ID, b.Nama As Departemen,
					d.Nama As Fakultas
				FROM mstDepartemen a INNER JOIN 
				mstStrukturOrganisasi b ON a.ID = b.ID INNER JOIN
                mstFakultas c ON a.FakultasID=c.ID INNER JOIN 
				mstStrukturOrganisasi d ON c.ID = d.ID
                ORDER BY c.Kode ASC";
        return $this->db->query($sql);
    }

    public function get_datatables_listpenghargaan($param){
        $this->_get_datatables_query($param);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_allPenghargaan($param){
        $this->db->from("hisPenghargaanDosen");
        $this->db->join("mstDosen", "mstDosen.NIP=hisPenghargaanDosen.NIP");
        $this->db->where("hisPenghargaanDosen.LingkupID", 1);
        $this->db->where("mstDosen.StrukturOrganisasiID", $param);
        return $this->db->count_all_results();
    }
    public function count_filteredPenghargaan($param){
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function _get_datatables_query($param){	
    	$this->db->select(" hisPenghargaanDosen.ID, 
                            hisPenghargaanDosen.NIP as NIPdosen, 
                            mstOrang.Nama,
    						mstStrukturOrganisasi.Nama AS Departemen, 
                            hisPenghargaanDosen.Negara, 
                            hisPenghargaanDosen.Instansi,
                            hisPenghargaanDosen.JabatanPemberi");
        $this->db->from("hisPenghargaanDosen");
        $this->db->join("mstDosen", "mstDosen.NIP=hisPenghargaanDosen.NIP");
        $this->db->join("mstOrang", "mstOrang.ID=mstDosen.OrangID");
        $this->db->join("mstStrukturOrganisasi", "mstStrukturOrganisasi.ID=mstDosen.StrukturOrganisasiID");
        $this->db->where("mstDosen.StrukturOrganisasiID", $param);
        $this->db->where("hisPenghargaanDosen.LingkupID", 1);
		
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
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function getOnes($id){
        /**$sql = "SELECT  hisPenghargaanDosen.ID, 
                        hisPenghargaanDosen.NIP as NIPdosen, 
                        mstDosen.OrangID, 
                        hisPenghargaanDosen.LingkupID,
                        hisPenghargaanDosen.Nomor,
    					mstDosen.StrukturOrganisasiID, 
                        hisPenghargaanDosen.Negara, 
                        hisPenghargaanDosen.Instansi,
                        hisPenghargaanDosen.JabatanPemberi,
                        hisPenghargaanDosen.TanggalPerolehan
    			FROM hisPenghargaanDosen JOIN mstDosen 
        		ON hisPenghargaanDosen.NIP=mstDosen.NIP
        		WHERE hisPenghargaanDosen.ID = '".$id."'";
        $return = $this->db->query($sql);
        return $return->row();**/


        $this->db->select(" hisPenghargaanDosen.ID, 
                            hisPenghargaanDosen.NIP as NIPdosen, 
                            mstorang.Nama, 
                            mststrukturorganisasi.Nama as Homebase, 
                            hisPenghargaanDosen.LingkupID,
                            mststrukturorganisasi.StrukturOrganisasiID, 
                            mststrukturorganisasi.ID as DepartemenID,
                            hisPenghargaanDosen.Nomor,
                            hisPenghargaanDosen.Negara, 
                            hisPenghargaanDosen.Instansi,
                            hisPenghargaanDosen.JabatanPemberi,
                            hisPenghargaanDosen.TanggalPerolehan");
        $this->db->from("hisPenghargaanDosen");
        $this->db->join('mstDosen', "mstDosen.NIP=hisPenghargaanDosen.NIP");
        $this->db->join('mstorang', "mstorang.ID=mstDosen.OrangID");
        $this->db->join('mststrukturorganisasi', "mststrukturorganisasi.ID=mstDosen.StrukturOrganisasiID");
        $this->db->where("hisPenghargaanDosen.LingkupID", 1);
        $this->db->where("hisPenghargaanDosen.ID", $id);
        $return = $this->db->get();
        return $return->row();
    }
    public function get_exsport($param){    
        $this->db->select(" hisPenghargaanDosen.ID, 
        					hisPenghargaanDosen.NIP as NIPdosen, 
        					mstorang.Nama, 
        					hisPenghargaanDosen.Nomor,
    						mststrukturorganisasi.Nama as Homebase, 
    						hisPenghargaanDosen.Negara, 
    						hisPenghargaanDosen.Instansi,
    						hisPenghargaanDosen.JabatanPemberi");
        $this->db->from("hisPenghargaanDosen");
        $this->db->join('mstDosen', "mstDosen.NIP=hisPenghargaanDosen.NIP");
        $this->db->join('mstorang', "mstorang.ID=mstDosen.OrangID");
        $this->db->join('mststrukturorganisasi', "mststrukturorganisasi.ID=mstDosen.StrukturOrganisasiID");
        $this->db->where("hisPenghargaanDosen.LingkupID", 1);
        $this->db->where("mstDosen.StrukturOrganisasiID",$param);
        $rst = $this->db->get();
        $data   = array(1 => array ('ID', 'NIPdosen', 'NamaNama', 'Nomor', 'Departemen', 
            'Negara', 'Instansi', 'JabatanPemberi'));
        foreach ($rst->result_array() as $row)
            array_push($data, $row);
        return $data; 
    }

}
