<?php 	if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CI_pdfgenerator {
	public function generate($html,$filename)
	{

			define('DOMPDF_ENABLE_AUTOLOAD',TRUE);
		    require_once("/opt/lampp/htdocs/BSB/dompdf-0.6.1/dompdf_config.inc.php");
		    $dompdf = new DOMPDF();
		    $dompdf->load_html($html);
  			$dompdf->set_paper("legal","landscape");
		    $dompdf->render();
		    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
	}
}
