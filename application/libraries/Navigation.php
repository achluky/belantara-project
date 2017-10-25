<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require("Navbar.php");

class Navigation extends Navbar{
	
	private $breadcrumb;
	
    public function __construct() {
			parent::__construct();
			$this->controller = & get_instance();
	}
	
	public function setBreadcrumbWur(){
		$this->breadcrumb =  array(
									$this->controller->lang->line('navigation.navbar.dashboard')=>base_url().'admin',
									$this->controller->lang->line('navigation.navbar.wcu') => base_url().'wcu'
									);
	}
	public function setBreadcrumbReference($change, $action=null){
		$this->breadcrumb =  array(
									$this->controller->lang->line('navigation.navbar.dashboard')=>base_url().'admin',
									$this->controller->lang->line('navigation.navbar.referensi') => base_url().'referensi'
									);
		if($change=="jenis_kegiatan_mahasiswa"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.jenis_kegiatan_mahasiswa')] = base_url().'referensi/jenis_kegiatan_mahasiswa';
		}elseif($change=="strata"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.strata')] = base_url().'referensi/strata';
		}elseif($change=="status_pegawai"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.status_pegawai')] = base_url().'referensi/status_pegawai';
		}elseif($change=="status_kepegawaian"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.status_kepegawaian')] = base_url().'referensi/status_kepegawaian';
		}elseif($change=="jenis_kelamin"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.jenis_kelamin')] = base_url().'referensi/jenis_kelamin';
		}elseif($change=="status_penulis"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.status_penulis')] = base_url().'referensi/status_penulis';
		}elseif($change=="jenis_kontak_survey"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.jenis_kontak_survey')] = base_url().'referensi/jenis_kontak_survey';
		}elseif($change=="jenis_artikel"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.jenis_artikel')] = base_url().'referensi/jenis_artikel';
		}elseif($change=="lingkup"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.lingkup')] = base_url().'referensi/lingkup';
		}elseif($change=="prestasi_mahasiswa"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.prestasi_mahasiswa')] = base_url().'referensi/prestasi_mahasiswa';
		}elseif($change=="negara"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.negara')] = base_url().'referensi/negara';
		}elseif($change=="ruang"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.ruang')] = base_url().'referensi/ruang';
		}elseif($change=="lembaga_pengakreditasi"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.lembaga_pengakreditasi')] = base_url().'referensi/lembaga_pengakreditasi';
		}elseif($change=="asosiasi_profesi"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.referensi.asosiasi_profesi')] = base_url().'referensi/asosiasi_profesi';
		}
		
		if($action=="add"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.add')] = null;
		}elseif($action=="edit"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.edit')] = null;
		}elseif($action=="delete"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.delete')] = null;
		}elseif($action=="view"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.view')] = null;
		}
	}
	public function setBreadcrumbWurAcademicReputation($change, $action=null){
		$this->setBreadcrumbWur();
		$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.academic_reputation')] = base_url().'wcu/academic';
		if($change=="prestasi_newsletter"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.academic_reputation.wur11')] = base_url().'wcu/academic/prestasi_newsletter';
		}elseif($change=="konferensi_internasional"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.academic_reputation.wur12')] = base_url().'wcu/academic/konferensi_internasional';
		}elseif($change=="foreign_guests"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.academic_reputation.wur13')] = base_url().'wcu/academic/foreign_guests';
		}elseif($change=="program_studi_terakreditasi_internasional"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.academic_reputation.wur14')] = base_url().'wcu/academic/program_studi_terakreditasi_internasional';
		}elseif($change=="academic_survey"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.academic_reputation.wur15')] = base_url().'wcu/academic/academic_survey';
		}
		
		if($action=="add"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.add')] = null;
		}elseif($action=="edit"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.edit')] = null;
		}elseif($action=="delete"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.delete')] = null;
		}elseif($action=="view"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.view')] = null;
		}else{
			if ($action!=NULL) {
				$this->breadcrumb[$action] = null;
			}
		}
	}
	public function setBreadcrumbWurEmployeeReputation($change, $action=null){
		$this->setBreadcrumbWur();
		$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.employee_reputation')] = base_url().'wcu/employee';
		if($change=="kompetisi_internasional"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.employee_reputation.wur16')] = base_url().'wcu/employee/kompetisi_internasional';
		}elseif($change=="publikasi_jurnal_internasional"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.employee_reputation.wur17')] = base_url().'wcu/employee/publikasi_jurnal_internasional';
		}elseif($change=="keikutsertaan_dosen"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.employee_reputation.wur18')] = base_url().'wcu/employee/keikutsertaan_dosen';
		}elseif($change=="employee_survey"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.employee_reputation.wur19')] = base_url().'wcu/employee/employee_survey';
		}
		
		if($action=="add"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.add')] = null;
		}elseif($action=="edit"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.edit')] = null;
		}elseif($action=="delete"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.delete')] = null;
		}elseif($action=="view"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.view')] = null;
		}else{
			if ($action!=NULL) {
				$this->breadcrumb[$action] = null;
			}
		}
	}
	public function setBreadcrumbWurInternationalization($change, $action=null){
		$this->setBreadcrumbWur();
		$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.internationalization')] = base_url().'wcu/internationalization';
		if($change=="inbound"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.internationalization.wur5wur7')] = base_url().'wcu/internationalization/inbound';
		}elseif($change=="undergraduate_outbound"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.internationalization.wur6')] = base_url().'wcu/internationalization/undergraduate_outbound';
		}elseif($change=="postgraduate_outbound"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.internationalization.wur8')] = base_url().'wcu/internationalization/postgraduate_outbound';
		}elseif($change=="laboratorium_sertifikasi_internasional"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.internationalization.wur9')] = base_url().'wcu/internationalization/laboratorium_sertifikasi_internasional';
		}elseif($change=="penghargaan_dosen_internasional"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.internationalization.wur10')] = base_url().'wcu/internationalization/penghargaan_dosen_internasional';
		}
		
		if($action=="add"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.add')] = null;
		}elseif($action=="edit"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.edit')] = null;
		}elseif($action=="delete"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.delete')] = null;
		}elseif($action=="view"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.view')] = null;
		}elseif($action=="list"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.listdata')] = null;
		}else{
			if ($action!=NULL) {
				$this->breadcrumb[$action] = null;
			}
		}
	}
	public function setBreadcrumbWurReserachPublication($change, $action=null, $id=NULL){
		$this->setBreadcrumbWur();
		$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.reserach_publication')] = base_url().'wcu/reserach_publication';
		if($change=="kerjasama_internasional"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.reserach_publication.wur20')] = base_url().'wcu/reserach_publication/kerjasama_internasional';
		}elseif($change=="kerjasama_nasional"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.reserach_publication.wur21')] = base_url().'wcu/reserach_publication/kerjasama_nasional';
		}elseif($change=="kerjasama"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.reserach_publication.wur27')] = base_url().'wcu/reserach_publication/kerjasama';
		}elseif($change=="artikel_terindex_scopus"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.reserach_publication.wur22')] = base_url().'wcu/reserach_publication/artikel_terindex_scopus';
		}elseif($change=="pusat_unggulan_riset"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.reserach_publication.wur23')] = base_url().'wcu/reserach_publication/pusat_unggulan_riset';
		}elseif($change=="paten_hki"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.reserach_publication.wur24')] = base_url().'wcu/reserach_publication/paten_hki';
		}elseif($change=="inovasi"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.reserach_publication.wur25')] = base_url().'wcu/reserach_publication/inovasi';
		}elseif($change=="artikel_terindex_google_scholer"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.reserach_publication.wur26')] = base_url().'wcu/reserach_publication/artikel_terindex_google_scholer';
		}
		
		if($action=="add"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.add')] = null;
		}elseif($action=="edit"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.edit')] = null;
		}elseif($action=="delete"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.delete')] = null;
		}elseif($action=="view"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.view')] = null;
		}elseif ($action=='category') {
			$this->breadcrumb['Program Studi/Mayor'] = null;

			// if($change=="artikel_terindex_google_scholer")
			// $this->breadcrumb[$this->controller->lang->line('label.departemen')] = base_url().'wcu/reserach_publication/artikel_terindex_google_scholer';
			// if($change=="artikel_terindex_scopus"){
			// 	$this->breadcrumb[$this->controller->lang->line('label.departemen')] = base_url().'wcu/reserach_publication/artikel_terindex_scopus';
			// 	$this->breadcrumb[$id] = null;
			// }
			// if ($this->controller->input->get("base")!="") {
			// 	$this->breadcrumb[getStructur($this->controller->input->get("y"))] = 
			// 	base_url().'wcu/reserach_publication/artikel_terindex_scopus/category/?y='.$this->controller->input->get("y").'';
			// 	$this->breadcrumb[$this->controller->input->get("base")] = null; 
			// }else{
			// 	$this->breadcrumb[getStructur($this->controller->input->get("y"))] = null;
			// }

		}elseif($action=='listdata'){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.listdata')] = null;
		}elseif($action=='sematkan'){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.sematkan')] = null;
		}else{
			if ($action!=NULL) {
				$this->breadcrumb[$action] = null;
			}
		}
	}
	public function setBreadcrumbWurDataUniversity($change, $action=null){
		$this->setBreadcrumbWur();
		$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.data_university')] = base_url().'wcu/data_university';
		
		if($change=="staff_dosen"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.data_university.wur1')] = base_url().'wcu/data_university/staff_dosen/departement';
		}elseif($change=="staff_phd"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.data_university.wur2')] = base_url().'wcu/data_university/staff_phd/departement';
		}elseif($change=="undergraduate_student"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.data_university.wur3')] = base_url().'wcu/data_university/undergraduate_student';
		}elseif($change=="postgraduate_student"){
			$this->breadcrumb[$this->controller->lang->line('navigation.navbar.wcu.data_university.wur4')] = base_url().'wcu/data_university/postgraduate_student';
		}
		
		if($action=="add"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.add')] = null;
		}elseif($action=="edit"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.edit')] = null;
		}elseif($action=="delete"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.delete')] = null;
		}elseif($action=="view"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.view')] = null;
		}elseif($action=="departement"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.mahasiswa')] = null;
		}elseif($action=="faculty"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.faculty')] = null;
		}elseif($action=="all"){
			$this->breadcrumb[$this->controller->lang->line('label.tabel.all')] = null;
		}elseif($action=="export_option") {
			$this->breadcrumb['Export Option'] = null;
		}elseif($action=="sematkan") {
			$this->breadcrumb['Sematkan'] = null;
		}
	}

	
	
	public function getNavbar(){
		return parent::getMenu();
	}
	public function getBreadcrumb(){
		return $this->breadcrumb;
	}
}
