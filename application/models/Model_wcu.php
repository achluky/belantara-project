<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_wcu extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_academic_survey(){
        $sql        = "SELECT * FROM wcu_academic_contact_survey WHERE status=1";
        $result     = $this->db->query($sql);
        return $result;
    }
    public function get_prestasi_newsletter(){
    	$sql        = "SELECT * FROM wcu_prestasi_newsletter WHERE status=1";
        $result     = $this->db->query($sql);
        return $result;	
    }
    public function get_konferensi_internasional(){
    	$sql        = "SELECT * FROM wcu_konferensi_internasional WHERE status=1";
        $result     = $this->db->query($sql);
        return $result;		
    }
    public function get_foreign_guests(){
        $sql        = "SELECT * FROM wcu_foreign_guests WHERE  status=1";
        $result     = $this->db->query($sql);
        return $result;     
    }
    public function get_db($tabel){
        $sql        = "SELECT * FROM ".$tabel." WHERE  status=1";
        $result     = $this->db->query($sql);
        return $result;   
    }

    public function save_academic_survey($data){
    	return $this->db->insert('wcu_academic_contact_survey',$data);
    }
    public function save_prestasi_newsletter($data){
    	return $this->db->insert('wcu_prestasi_newsletter',$data);	
    }
    public function save_konferensi_internasional($data) {
        return $this->db->insert('wcu_konferensi_internasional',$data);
    }
    public function save_foreign_guests($data){
        return $this->db->insert('wcu_foreign_guests',$data);
    }
    public function save_db($data, $tabel){
        return $this->db->insert($tabel,$data);   
    }

    public function get_contact($id){
    	$sql = "SELECT * FROM wcu_academic_contact_survey WHERE id=".$id."";
      	$result = $this->db->query($sql);
    	return $result->row();
    }
    public function get_newsletter($id){
    	$sql = "SELECT * FROM wcu_prestasi_newsletter WHERE id=".$id."";
    	$result = $this->db->query($sql);
    	return $result->row();
    }
    public function get_konferensi($id){
        $sql = "SELECT * FROM wcu_konferensi_internasional WHERE id=".$id."";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_foreign($id){
        $sql = "SELECT * FROM wcu_foreign_guests WHERE id=".$id."";
        $result = $this->db->query($sql);
        return $result->row();   
    }
    public function get_Onedb($where, $tabel){
        $sql = "SELECT * FROM ".$tabel." WHERE ".$where."";
        $result = $this->db->query($sql);
        return $result->row();      
    }

    public function update_academic_survey($data, $id){
    	$this->db->where("id", $id);
    	return $this->db->update('wcu_academic_contact_survey',$data);
    }
    public function update_prestasi_newsletter($data, $id){
    	$this->db->where("id", $id);
    	return $this->db->update('wcu_prestasi_newsletter',$data);
    }
    public function update_konferensi_internasional($data, $id){
        $this->db->where("id", $id);
        return $this->db->update('wcu_konferensi_internasional',$data);   
    }
    public function update_foreign_guests($data, $id){
        $this->db->where("id", $id);
        return $this->db->update('wcu_foreign_guests',$data);   
    }
    public function update_db($data, $field, $value, $tabel){
        $this->db->where($field, $value);
        return $this->db->update($tabel,$data);   
    }

    /* Eksport */
    public function get_exsport(){
    	$sql = "SELECT source, title,first_name,last_name,job_title,department,institution,country,email,phone FROM wcu_academic_contact_survey WHERE status=1";
    	$rst = $this->db->query($sql);
    	$data = array(1 => array ('source', 'title','first name','last name','job title','department','institution','country','email','phone'));
    	foreach ($rst->result_array() as $row)
    		array_push($data, $row);
    	return $data;
    }
    public function get_exsport_prestasi_newsletter(){
    	$sql = "SELECT newsletter, prestasi, mitra_internasional, link FROM wcu_prestasi_newsletter WHERE status=1";
    	$rst = $this->db->query($sql);
    	$data = array(1 => array ('newsletter', 'prestasi', 'mitra_internasional', 'link'));
    	foreach ($rst->result_array() as $row)
    		array_push($data, $row);
    	return $data;
    }
    public function get_exsport_konferensi_internasional(){
        $sql    = "SELECT name, tahun, penyelenggara, link FROM wcu_konferensi_internasional WHERE status=1";
        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('name', 'tahun', 'penyelenggara', 'link'));
        foreach ($rst->result_array() as $row)
            array_push($data, $row);
        return $data;   
    }
    public function get_exsport_foreign_guests(){
        $sql    = "SELECT unit_kerja, acara, tahun, nama_tamu,asal_negara FROM wcu_foreign_guests WHERE status=1";
        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('unit kerja', 'acara', 'tahun', 'nama tamu', 'asal negara'));
        foreach ($rst->result_array() as $row)
            array_push($data, $row);
        return $data;   
    }
    //using api
    public function get_exsport_programStudy(){}
    public function get_exsport_employe_survey(){
        $sql    = "SELECT source, title, first_name, last_name,position, sector, company_name, country, email, Phone FROM wcu_employee_survey WHERE status=1";
        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('source', 'title', 'first_name', 'last_name','position', 'sector', 'company_name', 'country', 'email', 'Phone'));
        foreach ($rst->result_array() as $row)
            array_push($data, $row);
        return $data; 
    }
    //using api
    public function get_exsport_employe_publikasi(){}
    public function get_exsport_staff_phd(){}
    public function get_exsport_graduate_student(){}
    public function get_exsport_undergraduate_student(){}


    public function get_delete($id){
    	$data = array(
    		'status'=>'0'
    		);
    	$this->db->where("id", $id);
    	return $this->db->update('wcu_academic_contact_survey',$data);
    }
    public function get_prestasi_newsletter_delete($id){
    	$data = array(
    		'status'=>'0'
    		);
    	$this->db->where("id", $id);
    	return $this->db->update('wcu_prestasi_newsletter',$data);
    }
    public function get_konferensi_internasional_delete($id){
        $data = array(
            'status'=>'0'
            );
        $this->db->where("id", $id);
        return $this->db->update('wcu_konferensi_internasional', $data);
    }
    public function get_deleteDb($tabel, $field, $value){
        $data = array(
            'status'=>'0'
            );
        $this->db->where($field, $value);
        return $this->db->update($tabel, $data);   
    }
    

    public function get_API($menu){
        $sql = "SELECT * FROM wcu_API WHERE menu='".$menu."'";
        $result = $this->db->query($sql);
        return $result->row(); 
    }
    public function update_API($data, $menu){
        $this->db->where("menu", $menu);
        return $this->db->update('wcu_API',$data);   
    }

    
    // wcudosen
    var $column = array('NIP','GelarDepan', 'Nama','GelarBelakang','Homebase');
    var $order = array('NAMA' => 'desc');

    public function get_listHomeBaseDosen($param){
        if ($param=='departement') {
            $sql = "SELECT DISTINCT `Homebase` FROM `WCUDosen`";
        }
        return $this->db->query($sql);
    }
    public function get_listDosen($param){
        $sql = "SELECT NIP, GelarDepan, Nama, GelarBelakang, Homebase FROM `WCUDosen` WHERE Homebase = '".$param."' ";
        return $this->db->query($sql);
    }
    public function get_count_allDosen($param){
        $this->db->where("Homebase",$param);
        $this->db->from("WCUDosen");
        return $this->db->count_all_results();
    }
    public function get_count_filteredDosen($param){
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function _get_datatables_query($param)
    {
        $this->db->select("NIP, GelarDepan, Nama, GelarBelakang, Homebase");
        $this->db->where("Homebase",$param);
        $this->db->from("WCUDosen");
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
    public function get_exsport_staff_dosen($param){
        $sql    = "SELECT NIP, GelarDepan, Nama, GelarBelakang, Homebase FROM WCUDosen WHERE Homebase='".$param."'";
        $rst    = $this->db->query($sql);
        $data   = array(1 => array ('NIP', 'GelarDepan', 'Nama', 'GelarBelakang', 'HOMEBASE'));
        foreach ($rst->result_array() as $row)
            array_push($data, $row);
        return $data; 
    }

}

