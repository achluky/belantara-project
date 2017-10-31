<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Navbar {
	
	private $menu;
	private $menuActive;
	private $subMenuActive;
	protected $controller;
	
    public function __construct() {
		$this->controller = & get_instance();
        $this->controller->lang->load('navigation',$this->controller->session->userdata('site_lang'));
		$this->setMenuDashboard();
		$sess = $this->controller->session->userdata('logged_in');
		switch(strtolower($sess['group_name'])){
			case "admin": $this->allowAdmin();
			break;
			case "editor":$this->allowEditor();
			break;
			case "wcu":$this->allowWUR();
			break;
		}
    }
	
	// admin akses
	private function allowAdmin(){
		// $this->setMenuWur();
		//$this->setMenuReferensiDBINTEGRASI();
		$this->setMenuNews();
		$this->setMenuPage();
		$this->setMenuEvent();
		$this->setMenuAnnouncement();
		$this->setPerson();
		$this->setRef();
		// $this->setMenuCampus();
		// $this->setMenuFaculties();
		// $this->setMenuReputation();
		// $this->setMenuMedia();
		// $this->setMenuBanner();
		// $this->setMenuInfografis();
		$this->setMainMenu();
		$this->setMenuLink();
		$this->setMenuIncidental();
		$this->setMenuUser();
		$this->setMenuSetting();
	}
	
	// Edit akses
	private function allowEditor(){
		$this->setMenuNews();
		$this->setMenuEvent();
		$this->setMenuAnnouncement();
		$this->setMenuBanner();
		$this->setMenuPage();
		$this->setMainMenu();
		$this->setMenuLink();
		$this->setMenuIncidental();
	}
	

	private function setMenuDashboard(){
		$this->menu['dashboard']=array("name"=>$this->controller->lang->line('navigation.navbar.dashboard'),
							"url"=>base_url(),
							"status"=>"", 
							"class"=>"glyphicon glyphicon-home",
							"submenu"=>null);
	}
	
	private function setMenuWur(){
		$this->menu['wur']=array("name"=>$this->controller->lang->line('navigation.navbar.wcu'),
							"url"=>base_url()."wcu",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-globe",
							"submenu"=>array(
												"academic_reputation"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.wcu.academic_reputation'),
												"url"=>base_url()."wcu/academic",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"employee_reputation"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.wcu.employee_reputation'),
												"url"=>base_url()."wcu/employee",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"internasionalization"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.wcu.internationalization'),
												"url"=>base_url()."wcu/internationalization",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"research_publication"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.wcu.reserach_publication'),
												"url"=>base_url()."wcu/reserach_publication",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"data_university"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.wcu.data_university'),
												"url"=>base_url()."wcu/data_university",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"grafik_data"=>array(
												"name"=>"Grafik WUR",
												"url"=>"http://dev.ipb.ac.id/data/",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}
	private function setMenuReferensiDBINTEGRASI(){
		$this->menu['reference']=array("name"=>$this->controller->lang->line('navigation.navbar.referensi'),
							"url"=>base_url()."referensi",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-globe",
							"submenu"=>array(
												"jenis_kegiatan_mahasiswa"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.jenis_kegiatan_mahasiswa'),
												"url"=>base_url()."referensi/jenis_kegiatan_mahasiswa",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"jenis_kelamin"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.jenis_kelamin'),
												"url"=>base_url()."referensi/jenis_kelamin",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"status_penulis"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.status_penulis'),
												"url"=>base_url()."referensi/status_penulis",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"jenis_kontak_survey"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.jenis_kontak_survey'),
												"url"=>base_url()."referensi/jenis_kontak_survey",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"jenis_artikel"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.jenis_artikel'),
												"url"=>base_url()."referensi/jenis_artikel",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"asosiasi_profesi"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.asosiasi_profesi'),
												"url"=>base_url()."referensi/asosiasi_profesi",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"lembaga_pengakreditasi"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.lembaga_pengakreditasi'),
												"url"=>base_url()."referensi/lembaga_pengakreditasi",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"lingkup"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.lingkup'),
												"url"=>base_url()."referensi/lingkup",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"negara"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.negara'),
												"url"=>base_url()."referensi/negara",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"prestasi_mahasiswa"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.prestasi_mahasiswa'),
												"url"=>base_url()."referensi/prestasi_mahasiswa",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"ruang"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.ruang'),
												"url"=>base_url()."referensi/ruang",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"status_kepegawaian"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.status_kepegawaian'),
												"url"=>base_url()."referensi/status_kepegawaian",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"status_pegawai"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.status_pegawai'),
												"url"=>base_url()."referensi/status_pegawai",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"strata"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.referensi.strata'),
												"url"=>base_url()."referensi/strata",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
											)
							);
	}
	private function setMenuNews(){
		$this->menu['news']=array("name"=>$this->controller->lang->line('navigation.navbar.news'),
							"url"=>base_url()."news",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-file",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.news.add'),
												"url"=>base_url()."news/add",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.news.list'),
												"url"=>base_url()."news",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}
	private function setMenuEvent(){
		$this->menu['event']=array("name"=>$this->controller->lang->line('navigation.navbar.event'),
							"url"=>base_url()."event",
							"status"=>"", 
							"class"=>"ion ion-calendar",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.event.add'),
												"url"=>base_url()."event/add",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.event.list'),
												"url"=>base_url()."event",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}
	private function setMenuAnnouncement(){
		$this->menu['announcement']=array("name"=>$this->controller->lang->line('navigation.navbar.announcement'),
							"url"=>base_url()."announcement",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-bullhorn",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.announcement.add'),
												"url"=>base_url()."announcement/add",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.announcement.list'),
												"url"=>base_url()."announcement",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}
	private function setPerson(){
		$this->menu['person']=array("name"=>$this->controller->lang->line('navigation.navbar.person'),
							"url"=>base_url()."person",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-file",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.person.add'),
												"url"=>base_url()."person/add",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.person.list'),
												"url"=>base_url()."person",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}
	private function setRef(){
		$this->menu['ref']=array("name"=>$this->controller->lang->line('navigation.navbar.ref'),
							"url"=>base_url()."person",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-book",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.ref.person'),
												"url"=>base_url()."referensi/category",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}
	private function setMenuBanner(){
		$this->menu['banner']=array("name"=>$this->controller->lang->line('navigation.navbar.banner'),
							"url"=>base_url()."banner",
							"status"=>"", 
							"class"=>"ion ion-images",
							"submenu"=>null);
	}
	
	private function setMenuPage(){
		$this->menu['page']=array("name"=>$this->controller->lang->line('navigation.navbar.page'),
							"url"=>base_url()."page",
							"status"=>"", 
							"class"=>"ion ion-android-folder",
							"submenu"=>null);
	}

	private function setMainMenu(){
		$this->menu['main']=array("name"=>$this->controller->lang->line('navigation.navbar.main_menu'),
							"url"=>base_url()."main_menu",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-link",
							"submenu"=>null);
	}

	private function setMenuLink(){
		$this->menu['link']=array("name"=>$this->controller->lang->line('navigation.navbar.links'),
							"url"=>base_url()."link",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-link",
							"submenu"=>null);
	}
	
	private function setMenuIncidental(){
		$this->menu['incidental']=array("name"=>$this->controller->lang->line('navigation.navbar.incidental'),
							"url"=>base_url()."incidental",
							"status"=>"", 
							"class"=>"ion ion-ios-infinite",
							"submenu"=>null);
	}
	
	
	private function setMenuUser(){
		$this->menu['user']=array("name"=>$this->controller->lang->line('navigation.navbar.user'),
							"url"=>base_url()."user",
							"status"=>"", 
							"class"=>"ion ion-person",
							"submenu"=>array(
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.user.list'),
												"url"=>base_url()."user",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"group_list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.user.group.list'),
												"url"=>base_url()."user/groups",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}
	
	private function setMenuSetting(){
		$this->menu['setting']=array("name"=>$this->controller->lang->line('navigation.navbar.setting'),
							"url"=>base_url()."setting",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-cog",
							"submenu"=>array(
												"pengaturan_sistem"=>array(
													"name"=>$this->controller->lang->line('navigation.navbar.setting.pengaturan_sistem'),
													"url"=>base_url()."setting/pengaturan_sistem",
													"status"=>"", 
													"class"=>"fa fa-circle-o",
												),
												"sosial_media"=>array(
													"name"=>$this->controller->lang->line('navigation.navbar.setting.social_media'),
													"url"=>base_url()."socmed",
													"status"=>"", 
													"class"=>"fa fa-circle-o",
												),
												"import_user"=>array(
													"name"=>$this->controller->lang->line('navigation.navbar.setting.import_user'),
													"url"=>base_url()."setting/import_user",
													"status"=>"", 
													"class"=>"fa fa-circle-o",
												),
											)
							);
	}

	private function setMenuFaculties(){
		$this->menu['faculties']=array("name"=>$this->controller->lang->line('navigation.navbar.faculty'),
			"url"=>base_url()."faculties",
			"status"=>"", 
			"class"=>"glyphicon glyphicon-queen",
			"submenu"=>array(
					"add"=>array(
					"name"=>$this->controller->lang->line('navigation.navbar.faculty.add'),
					"url"=>base_url()."faculties/add",
					"status"=>"", 
					"class"=>"fa fa-circle-o",
					),
					"list"=>array(
					"name"=>$this->controller->lang->line('navigation.navbar.faculty.list'),
					"url"=>base_url()."faculties",
					"status"=>"", 
					"class"=>"fa fa-circle-o",
					)
				)
			);
	}
	private function setMenuCampus(){
		$this->menu['campuss']=array("name"=>$this->controller->lang->line('navigation.navbar.campuss'),
			"url"=>base_url()."campus",
			"status"=>"", 
			"class"=>"glyphicon glyphicon-king",
			"submenu"=>array(
					"add"=>array(
					"name"=>$this->controller->lang->line('navigation.navbar.campuss.add'),
					"url"=>base_url()."campus/add",
					"status"=>"", 
					"class"=>"fa fa-circle-o",
					),
					"list"=>array(
					"name"=>$this->controller->lang->line('navigation.navbar.campuss.list'),
					"url"=>base_url()."campus",
					"status"=>"", 
					"class"=>"fa fa-circle-o",
					)
				)
			);
	}

	private function setMenuReputation(){
		$this->menu['reputation']=array("name"=>$this->controller->lang->line('navigation.navbar.reputation'),
		"url"=>base_url()."reputation",
		"status"=>"", 
		"class"=>"glyphicon glyphicon-knight",
		"submenu"=>array(
				"add"=>array(
				"name"=>$this->controller->lang->line('navigation.navbar.reputation.add'),
				"url"=>base_url()."reputation/add",
				"status"=>"", 
				"class"=>"fa fa-circle-o",
				),
				"list"=>array(
				"name"=>$this->controller->lang->line('navigation.navbar.reputation.list'),
				"url"=>base_url()."reputation",
				"status"=>"", 
				"class"=>"fa fa-circle-o",
				)
			)
		);
	}
	
    private function setMenuMedia(){
		$this->menu['media']=array("name"=>$this->controller->lang->line('navigation.navbar.media'),
		"url"=>"",
		"status"=>"", 
		"class"=>"ion ion-ios-infinite",
		"submenu"=>array(
				"add"=>array(
				"name"=>$this->controller->lang->line('navigation.navbar.media.photo'),
				"url"=>base_url()."media/photo",
				"status"=>"", 
				"class"=>"fa fa-circle-o",
				),
				"list"=>array(
				"name"=>$this->controller->lang->line('navigation.navbar.media.document'),
				"url"=>base_url()."media/pdf",
				"status"=>"", 
				"class"=>"fa fa-circle-o",
				)
			)
		);
	}

	private function setMenuInfografis(){
		$this->menu['infografis']=array("name"=>$this->controller->lang->line('navigation.navbar.infografis'),
							"url"=>base_url()."infografis",
							"status"=>"", 
							"class"=>"ion ion-images",
							"submenu"=>null);
	}

	public function setMenuActive($index){
		$this->menuActive = $index;
	}
	public function setSubMenuActive($index){
		$this->subMenuActive = $index;
	}
	public function getMenu(){
		if($this->menuActive!==null){
			if(isset($this->menu[$this->menuActive])){
				$this->menu[$this->menuActive]["status"] = "active";
				if($this->subMenuActive!==null){
					if(is_array($this->menu[$this->menuActive]["submenu"])){
						if(isset($this->menu[$this->menuActive]["submenu"][$this->subMenuActive])){
							$this->menu[$this->menuActive]["submenu"][$this->subMenuActive]["status"] = "active";
						}
					}
				}
			}
		}
		return $this->menu;
	}
}
