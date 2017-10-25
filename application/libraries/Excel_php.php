<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once APPPATH."third_party/PHPExcel/PHPExcel.php";

class Excel_php extends PHPExcel {


    public function __construct() {
        parent::__construct();
    }

    public function read($file){

		$objPHPExcel 		= PHPExcel_IOFactory::load($file);
		$cell_collection 	= $objPHPExcel->getActiveSheet()->getCellCollection();
		
		foreach ($cell_collection as $cell) {
		    $column 	= $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
		    $row 		= $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
		    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
		    $arr_data[$row][$column] = $data_value;
		}

		$data['values'] = $arr_data;

		return $data;

    }
}