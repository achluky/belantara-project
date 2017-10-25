<?php 	if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Excel_generate {
	
	private $fileName = "my-test";
	private $sheetName = "Sheet";


	public function generate($data)
	{
        
		    require_once("Excel/php-excel.class.php");
			$xls = new Excel_XML('UTF-8', false, $this->sheetName);
			$xls->addArray($data);
			$xls->generateXML($this->fileName);
	}
	
	public function setFileName($fileName){
		$this->fileName = $fileName;
	}
	public function setSheetName($sheetName){
		$this->sheetName=$sheetName;
	}
}
