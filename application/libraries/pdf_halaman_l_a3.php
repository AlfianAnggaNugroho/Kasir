<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require('application/libraries/fpdf/fpdf.php');

class Pdf_halaman_l_a3 extends FPDF
{  
  	function Footer(){
  	$this->SetY(800);
  	//Arial italic 8
   	$this->SetFont('Arial','I',12);
   	//Page number
   	$this->Cell(1150,10,'Hal '.$this->PageNo().' / {nb}',0,0,'R');
  	}
}
?>