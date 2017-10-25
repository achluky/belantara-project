<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kerjasama_internasional {
	
    public function __construct() { }
    
	public function run($controller, $change, $id=NULL) { 
		$controller->navigation->setMenuActive('wur');
        $controller->navigation->setSubMenuActive('research_publication');
        $controller->navigation->setBreadcrumbWurDataUniversity('kerjasama_internasional');

		$controller->smartyci->assign('navbar',$controller->navigation->getNavbar());
		$controller->smartyci->assign('breadcrumb',$controller->navigation->getBreadcrumb());
	
		switch($change){
			case "view": $this->view($controller);
				break;
			case "add": $this->add($controller);
				break;
			case "edit": $this->edit($controller);
				break;
			case "delete": $this->delete($controller);
				break;
			case "save": $this->save($controller);
				break;
			case "update": $this->update($controller);
				break;
			case "export": $this->export($controller);
				break;
			case "setting": $this->setting($controller);
				break;
			default: $this->listdata($controller);
		}
	}
	
	public function view($controller){}
	public function add($controller){}
	public function edit($controller){}
	public function delete($controller){}
	public function save($controller){}
	public function update($controller){}
	public function export($controller){}
    public function setting($controller){}
	public function listdata($controller){}
}
