<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require('application/libraries/fpdf/fpdf.php');

class Pdf_halaman_p extends FPDF
{  
  	function Footer(){
  	$this->SetY(318);
  	//Arial italic 8
   	$this->SetFont('Arial','I',8);
   	//Page number
   	$this->Cell(0,10,'Hal '.$this->PageNo().' / {nb}',0,0,'R');
  	}
}
?>