<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require('application/libraries/fpdf/fpdf.php');

class Pdf_halaman_Kartu_stok extends FPDF
{  
var $CI;
 function Header(){   
    global $title,$Whd;
    //$lebar = $this->w;
    $this->SetFont('Arial','B',12);
    //$w = $this->GetStringWidth($title );
    //$this->SetX(($lebar -$w)/2);
	$this->Ln(6);
	$this->SetFont('Arial','B',12);
	$this->Cell(50);
	$this->Cell(0,10,''.$title,0,0,'L');
	$this->Ln();
	$this->Cell(400,10,'KARTU STOK BULANAN',0,0,'C');
	$this->Ln(15);
	$this->Cell(80);
	
	$this->Ln();
	$this->SetFont('Arial','B',9);
	$this->Cell(225);
	$this->Cell(50,5,'DEBET','LT',0,'C');
	$this->Cell(50,5,'KREDIT','LT',0,'C');
	$this->Cell(50,5,'SALDO','LRT',0,'C');
	$this->Ln();
	$this->SetFont('Arial','B',9);
    $this->Cell(10,5,'NO.','LBT',0,'C');
	$this->Cell(20,5,'TANGGAL','LBT',0,'C');		
	$this->Cell(25,5,'KODE TRX','LBT',0,'C');	
	$this->Cell(170,5,'KETERANGAN','LBT',0,'C');			
	$this->Cell(20,5,'QTY','LBT',0,'C');
	$this->Cell(30,5,'RP','LBT',0,'C');	
	$this->Cell(20,5,'QTY','LBT',0,'C');
	$this->Cell(30,5,'RP','LBT',0,'C');
	$this->Cell(20,5,'QTY','LBT',0,'C');
	$this->Cell(30,5,'RP','LBRT',0,'C');



    
    //$this->Cell($w,9,$title  ,0,0,'C');
    $this->Ln();
   // $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
    //$this->Ln(10);

}

  	function Footer(){
  	$this->SetY(250);
  	//Arial italic 8
   	$this->SetFont('Arial','I',8);
   	//Page number
   	$this->Cell(390,10,'Hal '.$this->PageNo().' / {nb}',0,0,'R');
  	}
}
?>