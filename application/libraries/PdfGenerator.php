<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PdfGenerator{
  public function generate($html,$filename)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);
    require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");
 
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    // $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
    $output = $dompdf->output();
    $status = file_put_contents('./document/pdf/'.$filename.'.pdf', $output);
    if ($status)
      return true;
    else 
      return false;
  }
}