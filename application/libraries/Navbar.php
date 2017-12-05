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
			case "gm":$this->allowGm();
			break;
			case "comittee":$this->allowComittee();
			break;
			case "bm":$this->allowBm();
			break;
			case "applican":$this->allowApplican();
			break;
		}
    }

	private function allowAdmin(){
		$this->setMenuBlog();
		$this->setMenuRelatedNews();
		$this->setMenuPressRelease();
		$this->setMenuReferences();
		$this->setMenuResourcet();
		$this->setMenuPage();
		$this->setMenuPageHome();
		$this->setMenuSlider();
		$this->setMenuBanner();
		$this->setPerson();
		$this->setRef();
		$this->setMenuUser();
		$this->setMenuSetting();
	}
	
	private function allowGm(){
		$this->setMenuTodo();
		$this->setMenuAllApplication();
	}

	private function allowComittee(){
		$this->setMenuTodo();
		$this->setMenuAllApplication();
	}

	private function allowBm(){
		$this->setMenuTodo();
		$this->setMenuAllApplication();
	}

	private function allowApplican(){
		$this->setPengaturan();
		$this->setGrant();
	}
	
	

	private function setMenuDashboard(){
		$this->menu['dashboard']=array("name"=>$this->controller->lang->line('navigation.navbar.dashboard'),
							"url"=>base_url()."admin",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-home",
							"submenu"=>null);
	}
	

	private function setMenuTodo(){
		$this->menu['todo']=array("name"=>$this->controller->lang->line('navigation.navbar.todo'),
							"url"=>base_url()."grant/todo",
							"status"=>"", 
							"class"=>"fa fa-bell",
							"submenu"=>null);

	}

	private function setMenuAllApplication(){
		$this->menu['application']=array("name"=>$this->controller->lang->line('navigation.navbar.app'),
							"url"=>base_url()."grant/all",
							"status"=>"", 
							"class"=>"fa fa-book",
							"submenu"=>null);
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
	private function setMenuBlog(){
		$this->menu['blog']=array("name"=>$this->controller->lang->line('navigation.navbar.blog'),
							"url"=>base_url()."adminblog",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-file",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.blog.add'),
												"url"=>base_url()."adminblog/add",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.blog.list'),
												"url"=>base_url()."adminblog",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}

	private function setMenuRelatedNews(){
		$this->menu['related_news']=array("name"=>$this->controller->lang->line('navigation.navbar.rn'),
							"url"=>base_url()."adminrelatednews",
							"status"=>"", 
							"class"=>"ion ion-social-rss",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.rn.add'),
												"url"=>base_url()."adminrelatednews/add",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.rn.list'),
												"url"=>base_url()."adminrelatednews",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}
	private function setMenuPressRelease(){
		$this->menu['press_release']=array("name"=>$this->controller->lang->line('navigation.navbar.pr'),
							"url"=>base_url()."adminpressrelease",
							"status"=>"", 
							"class"=>"ion ion-speakerphone",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.pr.add'),
												"url"=>base_url()."adminpressrelease/add",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.pr.list'),
												"url"=>base_url()."adminpressrelease",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												)
											)
							);
	}
	private function setMenuReferences(){
		$this->menu['reference']=array("name"=>$this->controller->lang->line('navigation.navbar.reference'),
							"url"=>base_url()."adminreference",
							"status"=>"", 
							"class"=>"ion ion-ios-analytics",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.reference.add'),
												"url"=>base_url()."adminreference/add",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.reference.list'),
												"url"=>base_url()."adminreference",
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
							"class"=>"ion ion-wifi", // resource
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.event.add'),
												"url"=>base_url()."event/add",
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
	private function setMenuResourcet(){
		$this->menu['resource']=array("name"=>$this->controller->lang->line('navigation.navbar.resource'),
							"url"=>base_url()."resource",
							"status"=>"", 
							"class"=>"ion ion-wifi",
							"submenu"=>array(
												"add"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.resource.add'),
												"url"=>base_url()."resource/add",
												"status"=>"", 
												"class"=>"fa fa-circle-o",
												),
												"list"=>array(
												"name"=>$this->controller->lang->line('navigation.navbar.resource.list'),
												"url"=>base_url()."resource",
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
							"class"=>"ion ion-person-stalker",
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
		$this->menu['gallery']=array("name"=>$this->controller->lang->line('navigation.navbar.banner'),
							"url"=>base_url()."gallery_manajement",
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

	private function setMenuPageHome(){
		$this->menu['pagehome']=array("name"=>$this->controller->lang->line('navigation.navbar.pagehome'),
							"url"=>base_url()."pagehome",
							"status"=>"", 
							"class"=>"ion ion-android-folder",
							"submenu"=>null);
	}


	private function setMenuSlider(){
		$this->menu['slider']=array("name"=>$this->controller->lang->line('navigation.navbar.slider'),
							"url"=>base_url()."slider",
							"status"=>"", 
							"class"=>"ion ion-images",
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
													"name"=>$this->controller->lang->line('navigation.navbar.setting.longlat'),
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
												/*
												"import_user"=>array(
													"name"=>$this->controller->lang->line('navigation.navbar.setting.import_user'),
													"url"=>base_url()."setting/import_user",
													"status"=>"", 
													"class"=>"fa fa-circle-o",
												),*/
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


	private function setPengaturan(){
		$this->menu['pengaturan']=array("name"=>"Pengaturan",
			"url"=>"",
			"status"=>"", 
			"class"=>"ion ion-ios-infinite",
			"submenu"=>array(
					"add"=>array(
						"name"=>"Profil",
						"url"=>base_url()."grant/profil",
						"status"=>"", 
						"class"=>"fa fa-circle-o",
					),
					"list"=>array(
						"name"=>"Pengaturan Lanjut",
						"url"=>base_url()."grant/profil/lanjut",
						"status"=>"", 
						"class"=>"fa fa-circle-o",
					)
				)
		);
	}
	private function setGrant(){
		$this->menu['grant']=array("name"=> "Proposal",
							"url"=>base_url()."grant/aplikasi",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-th-list",
							"submenu"=>null);

	}
	private function setBerkas(){
		$this->menu['link']=array("name"=>"Berkas",
							"url"=>base_url()."grant/archive",
							"status"=>"", 
							"class"=>"glyphicon glyphicon-th-list",
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
