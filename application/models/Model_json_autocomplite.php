<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_json_autocomplite extends CI_Model {

	
    public function __construct()
    {
        parent::__construct();
    }
	
	public function search_mahasiswa($q=null)
    {
        $this->db
					->select('NIM as id, CONCAT(Nama," - ",NIM) as text')
                    ->from("mstMahasiswa")
					->like('Nama',$q, 'match')
					->or_like('NIM',$q, 'match')
					->limit(500);
		$this->db->order_by('Nama', 'asc');
		$this->db->order_by('NIM', 'asc');
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
	
	public function search_dosen($q=null)
    {
        $this->db
					->select('NIP as id, CONCAT(Nama," - ",NIP) as text')
                    ->from("mstDosen")
					->like('Nama',$q, 'match')
					->or_like('NIP',$q, 'match')
					->limit(500);
		$this->db->order_by('Nama', 'asc');
		$this->db->order_by('NIP', 'asc');
		$result	 = $this->db->get()->result_array();
        return (isset($result)?$result:null);
    }
}

