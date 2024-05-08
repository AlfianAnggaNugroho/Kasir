<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Laporan');
		$this->load->model('M_Transaksi');
    	$this->load->model('m_function','',TRUE);
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
    	date_default_timezone_set('Asia/Jakarta');
    // jika belum login redirect ke login
            if ($this->session->userdata('logged_in') =="") {
                redirect('C_Pengguna/login');
            }
	}


  function header($title)
  {
  	$data['info'] = $title;
    $this->load->view('ils_header/header',$data);
  }

  public function footer()
  {
    $this->load->view('ils_footer/footer');
  }

  function cetak_tbmb1($cBMBNo)
	{

		$this->load->library('fpdf');
		$this->fpdf->FPDF('P','mm','a4');
		//setting cetakan (continue)
		$this->fpdf->setTopMargin(1);
		$this->fpdf->AliasNbPages();
		$this->fpdf->AddPage();
		
		$this->fpdf->SetFont('Arial','B',8);
		//$this->fpdf->Image("",60,30,90,0,'PNG');
		//margin kiri buat kekanan sebesar 80
		$this->fpdf->Cell(1);
		$this->fpdf->Ln(0);
		$this->fpdf->Cell(36,10,$this->session->userdata('cBranchDesc'),0,0,'L');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Cell(80);
		$this->fpdf->Cell(40,10,'Pemasukan Barang',0,0,'C');
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(80);
        $select = "tbmb1.cBMBNo,tbmb1.dTrx,tbmb1.cSupID,msupplier.cSupDesc,tbmb1.cDesc,tbmb1.cClose";
        $tabel = 'tbmb1';
        $tabel2 = 'msupplier';
      	$where = array('tbmb1.cBMBNo' => $cBMBNo);
      	$join = "msupplier.cSupID = tbmb1.cSupID";
      	$data_Header = $this->M_Laporan->get_by_id_join2($select,$tabel,$where,$tabel2,$join);
     
		foreach($data_Header->result()as $baris)
		{
		$this->fpdf->Ln(2);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,10,'No. Faktur         : '.$baris->cBMBNo,0,0,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->Cell(128);
		$this->fpdf->Cell(10,10,'Tanggal  : '.$this->m_function->dStock_mBranch("d M Y",$baris->dTrx),0,0,'L');
		$this->fpdf->Cell(52);

		$this->fpdf->Ln(5);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,10,'Supplier             : '.$baris->cSupDesc,0,0,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->Cell(128);
		$this->fpdf->Cell(10,10,'Waktu     : '.substr($baris->dTrx,10),0,0,'L');
		$this->fpdf->Cell(52);


		$this->fpdf->Ln(5);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,10,'Keterangan        : '.$baris->cDesc,0,0,'L');
	
		}
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',8);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,6,'No.','LBT',0,'C');	
		$this->fpdf->Cell(20,6,'Kode Barang','LBT',0,'C');			
		$this->fpdf->Cell(90,6,'Nama Barang','LBT',0,'C');
		$this->fpdf->Cell(18,6,'Satuan','LBT',0,'C');	
		$this->fpdf->Cell(14,6,'Qty','LBTR',0,'C');	
		$this->fpdf->Cell(20,6,'Price','LBTR',0,'C');	
		$this->fpdf->Cell(28,6,'Total','LBTR',0,'C');	
		
		$this->fpdf->Ln();

		//isi
	  $select = "tbmb2.cBMBNo,tbmb2.cGoodID,mgood.cGoodDesc,mgood.cUnit,tbmb2.nQty,tbmb2.nPrice,tbmb2.nCost";
      $tabel = 'tbmb2';
      $tabel2 = 'mgood';
    
      
      $where = array(
                'tbmb2.cBMBNo' => $cBMBNo
                );
      $join = "mgood.cGoodID = tbmb2.cGoodID";
   
      $data = $this->M_Laporan->get_by_id_join2($select,$tabel,$where,$tabel2,$join);

      	$no= 1;
      	$this->fpdf->SetFont('Arial','',7);
		foreach($data->result()as $baris)
		{
			$this->fpdf->Cell(1);
			$this->fpdf->Cell(10,6,$no,'LB',0,'C');
			$this->fpdf->Cell(20,6,$baris->cGoodID,'LB',0,'L');	
			$this->fpdf->Cell(90,6,$baris->cGoodDesc."",'LB',0,'L');
			$this->fpdf->Cell(18,6,$baris->cUnit,'LB',0,'C');	
			$this->fpdf->Cell(14,6,$baris->nQty,'LBR',0,'C');
			$this->fpdf->Cell(20,6,$baris->nPrice,'LBR',0,'C');
			$this->fpdf->Cell(28,6,$baris->nCost,'LBR',0,'C');
			/*$this->fpdf->Cell(18,6,$baris->cUnit,'LB',0,'C');	
			$Qty = substr($baris->nQty,-2,2);
			if ($Qty == '00')
			{	
				$this->fpdf->Cell(18,6,number_format($baris->nQty,0,',','.'),'LBR',0,'C');
			}
			else
			{
				$this->fpdf->Cell(18,6,number_format($baris->nQty,2,',','.'),'LBR',0,'C');
			}		*/
			$this->fpdf->Ln();
			$no++;
		}



		//FOOTER CETAK
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(200,27,'','LBR',0,'C');
		$this->fpdf->Ln(0);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(8);
		$this->fpdf->Cell(25,10,'Diketahui, ',0,0,'C');
		
		$this->fpdf->Ln(0);		
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(63);
		$this->fpdf->Cell(20,10,'',0,0,'C');
		
		$this->fpdf->Ln(0);		
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(150);
		$this->fpdf->Cell(20,10,'Verifikasi,',0,0,'C');
		
		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Arial','BU',12);
		$this->fpdf->Cell(8);
		$this->fpdf->Cell(25,10,'(                         )',10,0,'C');
		
		$this->fpdf->SetFont('Arial','BU',12);
		$this->fpdf->Cell(30);
		$this->fpdf->Cell(20,10,'',10,0,'C');
		
	
		$this->fpdf->SetFont('Arial','BU',12);
		$this->fpdf->Cell(65);
		$this->fpdf->Cell(25,10,'(                         )',10,0,'C');

		$this->fpdf->Ln(4);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(8);
		$this->fpdf->Cell(24,10,'Pembuat',0,0,'C');
		
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(30);
		$this->fpdf->Cell(20,10,'',0,0,'C');
		
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(68);
		$this->fpdf->Cell(20,10,'Pimpinan',0,0,'C');
		
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(1);
		


		$this->fpdf->Output();		
	}



function cetak_tbkb1($cBKBNo)
	{

		$this->load->library('fpdf');
		$this->fpdf->FPDF('P','mm','a4');
		//setting cetakan (continue)
		$this->fpdf->setTopMargin(1);
		$this->fpdf->AliasNbPages();
		$this->fpdf->AddPage();
		
		$this->fpdf->SetFont('Arial','B',8);
		//$this->fpdf->Image("",60,30,90,0,'PNG');
		//margin kiri buat kekanan sebesar 80
		$this->fpdf->Cell(1);
		$this->fpdf->Ln(0);
		$this->fpdf->Cell(36,10,$this->session->userdata('cBranchDesc'),0,0,'L');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Cell(80);
		
		$select = "cBKBNo,dTrx,cDesc,cClose,cKonID,cName";
      
     	 $tabel = 'v_bkb1';
      	$where = array('cBKBNo' => $cBKBNo);
     
      
      	$data_Header =  $this->M_Laporan->get_by_id($tabel,$where);
     	$nOA = 0;
		foreach($data_Header->result()as $baris)
		{

		$nOA = $baris->nOA;
		$this->fpdf->Cell(40,10,'Pengeluaran Barang',0,0,'C');

		$this->fpdf->Ln(6);
		$this->fpdf->Cell(80);
        
		$this->fpdf->Ln(2);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,10,'No. Pengeluaran   : '.$baris->cBKBNo,0,0,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->Cell(136);
		$this->fpdf->Cell(10,10,'Tanggal  : '.$this->m_function->dStock_mBranch("d M Y",$baris->dTrx),0,0,'L');
		$this->fpdf->Cell(52);
		// $this->fpdf->Cell(10,10,'No Ref        : '.$baris->cReffNo,0,0,'L');

		// $this->fpdf->Ln(5);
		// $this->fpdf->Cell(1);
		// $this->fpdf->Cell(10,10,'Konsumen          : '.$baris->cName,0,0,'L');
		// $this->fpdf->Cell(130);
		// $this->fpdf->Cell(10,10,'Warehouse : '.$baris->cWhdDesc,0,0,'L');

		$this->fpdf->Ln(5);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,10,'Keterangan   : '.$baris->cDesc,0,0,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->Cell(136);
		$this->fpdf->Cell(10,10,'Waktu     : '.substr($baris->dTrx,10),0,0,'L');
		$this->fpdf->Cell(52);

		}
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',8);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,6,'No.','LBT',0,'C');	
		$this->fpdf->Cell(20,6,'Kode','LBT',0,'C');			
		$this->fpdf->Cell(90,6,'Nama Barang','LBT',0,'C');
		$this->fpdf->Cell(18,6,'Satuan','LBT',0,'C');	
		$this->fpdf->Cell(14,6,'Qty','LBTR',0,'C');	
		$this->fpdf->Cell(20,6,'Price','LBTR',0,'C');	
		$this->fpdf->Cell(28,6,'Total','LBTR',0,'C');
		$this->fpdf->Ln();

		//isi
	  $select = "cBKBNo,cGoodID,cGoodDesc,cUnit,nQty,nPrice,nCost";
      $tabel = 'v_tbkb2';
      $where = array(
                'cBKBNo' => $cBKBNo
                );
      $data = $this->M_Laporan->get_by_id($tabel,$where);

      	$no= 1;
      	$TOTALRP = 0;
      	$this->fpdf->SetFont('Arial','',7);
		foreach($data->result()as $baris)
		{
			$this->fpdf->Cell(1);
			$this->fpdf->Cell(10,6,$no,'LB',0,'C');
			$this->fpdf->Cell(20,6,$baris->cStockID,'LB',0,'C');	
			$this->fpdf->Cell(90,6,$baris->cGoodDesc,'LB',0,'L');
			$this->fpdf->Cell(18,6,$baris->cUnit,'LB',0,'C');	
			$this->fpdf->Cell(14,6,$baris->nQty,'LBR',0,'C');
			$this->fpdf->Cell(20,6,number_format($baris->nPrice,0,',','.'),'LBR',0,'R');
			$this->fpdf->Cell(28,6,number_format($baris->nCost,0,',','.'),'LBR',0,'R');
			
			$this->fpdf->Ln();
			$no++;
			$TOTALRP += $baris->nCost;
		}

		$this->fpdf->Cell(1);
		$this->fpdf->Cell(138,6,'GRAND TOTAL','LBT',0,'C');			
		$this->fpdf->Cell(34,6,'','BTR',0,'C');	
		$this->fpdf->Cell(28,6,number_format($TOTALRP,0,',','.'),'LBTR',0,'R');

		$this->fpdf->Ln(6);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(138,6,'','L',0,'C');				
		$this->fpdf->Cell(34,6,'Ongkos Angkut','TR',0,'C');	
		$this->fpdf->Cell(28,6,number_format($nOA,0,',','.'),'LBTR',0,'R');

		$this->fpdf->Ln(6);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(138,6,'','L',0,'C');				
		$this->fpdf->Cell(34,6,'Total Bayar','R',0,'C');	
		$this->fpdf->Cell(28,6,number_format($nOA+$TOTALRP,0,',','.'),'LBTR',0,'R');

		$this->fpdf->Ln(5);

		//FOOTER CETAK
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(200,27,'','LBR',0,'C');
		$this->fpdf->Ln(0);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(8);
		$this->fpdf->Cell(25,10,'Mengetahui,',0,0,'C');
		
		$this->fpdf->Ln(0);		
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(63);
		$this->fpdf->Cell(20,10,',',0,0,'C');
		
		$this->fpdf->Ln(0);		
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(150);
		$this->fpdf->Cell(20,10,'Diketahui,',0,0,'C');
		
		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Arial','BU',12);
		$this->fpdf->Cell(8);
		$this->fpdf->Cell(25,10,'(                         )',10,0,'C');
		
		$this->fpdf->SetFont('Arial','BU',12);
		$this->fpdf->Cell(30);
		$this->fpdf->Cell(20,10,'',10,0,'C');
		
	
		$this->fpdf->SetFont('Arial','BU',12);
		$this->fpdf->Cell(65);
		$this->fpdf->Cell(25,10,'(                         )',10,0,'C');

		$this->fpdf->Ln(4);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(8);
		$this->fpdf->Cell(24,10,'Pegawai',0,0,'C');
		
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(30);
		$this->fpdf->Cell(20,10,'',0,0,'C');
		
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(68);
		$this->fpdf->Cell(20,10,'Pembeli',0,0,'C');
		
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(1);
		$this->fpdf->Output();		
	}



function cetak_nota($cBKBNo)
	{

		$this->load->library('fpdf');
		$this->fpdf->FPDF('P','mm','a4');
		//setting cetakan (continue)
		$this->fpdf->setTopMargin(1);
		$this->fpdf->AliasNbPages();
		$this->fpdf->AddPage();
		
		$this->fpdf->SetFont('Arial','B',8);
		//$this->fpdf->Image("",60,30,90,0,'PNG');
		//margin kiri buat kekanan sebesar 80
		$this->fpdf->Cell(1);
		$this->fpdf->Ln(0);
		$this->fpdf->Cell(36,10,$this->session->userdata('cBranchDesc'),0,0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Cell(80);
		
		$select = "cBKBNo,dTrx,cDesc,cClose,cKonID,cName";
      
     	 $tabel = 'v_bkb1';
      	$where = array('cBKBNo' => $cBKBNo);
     
      
      	$data_Header =  $this->M_Laporan->get_by_id($tabel,$where);
     
		foreach($data_Header->result()as $baris)
		{

			$nOA = $baris->nOA;
		$this->fpdf->Cell(40,10,'Pengeluaran Barang',0,0,'C');

		$this->fpdf->Ln(6);
		$this->fpdf->Cell(80);
        
		$this->fpdf->Ln(2);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,10,'No. Pengeluaran   : '.$baris->cBKBNo,0,0,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->Cell(136);
		$this->fpdf->Cell(10,10,'Tanggal  : '.$this->m_function->dStock_mBranch("d M Y",$baris->dTrx),0,0,'L');
		$this->fpdf->Cell(52);
		// $this->fpdf->Cell(10,10,'No Ref        : '.$baris->cReffNo,0,0,'L');

		$this->fpdf->Ln(5);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,10,'Konsumen          : '.$baris->cName,0,0,'L');
		$this->fpdf->Cell(130);
		// $this->fpdf->Cell(10,10,'Warehouse : '.$baris->cWhdDesc,0,0,'L');

		$this->fpdf->Ln(5);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,10,'Keterangan   : '.$baris->cDesc,0,0,'L');
	
		}
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',8);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(10,6,'No.','LBT',0,'C');	
		$this->fpdf->Cell(20,6,'Kode','LBT',0,'C');			
		$this->fpdf->Cell(90,6,'Nama Barang','LBT',0,'C');
		$this->fpdf->Cell(18,6,'Satuan','LBT',0,'C');	
		$this->fpdf->Cell(14,6,'Qty','LBTR',0,'C');	
		$this->fpdf->Cell(20,6,'Price','LBTR',0,'C');	
		$this->fpdf->Cell(28,6,'Total','LBTR',0,'C');
		$this->fpdf->Ln();

		//isi
	  $select = "cBKBNo,cGoodID,cGoodDesc,cUnit,nQty,nPrice,nCost";
      $tabel = 'v_tbkb2';
      $where = array(
                'cBKBNo' => $cBKBNo
                );
      $data = $this->M_Laporan->get_by_id($tabel,$where);

      	$no= 1;
      	$TOTALRP = 0;
      	$this->fpdf->SetFont('Arial','',7);
		foreach($data->result()as $baris)
		{
			$this->fpdf->Cell(1);
			$this->fpdf->Cell(10,6,$no,'LB',0,'C');
			$this->fpdf->Cell(20,6,$baris->cStockID,'LB',0,'C');	
			$this->fpdf->Cell(90,6,$baris->cGoodDesc,'LB',0,'L');
			$this->fpdf->Cell(18,6,$baris->cUnit,'LB',0,'C');	
			$this->fpdf->Cell(14,6,$baris->nQty,'LBR',0,'C');
			$this->fpdf->Cell(20,6,$baris->nPrice,'LBR',0,'R');
			$this->fpdf->Cell(28,6,$baris->nCost,'LBR',0,'R');

			$this->fpdf->Ln();
			$no++;
			$TOTALRP += $baris->nCost;
		}

		$this->fpdf->Cell(1);
		$this->fpdf->Cell(138,6,'GRAND TOTAL','LBT',0,'C');			
		$this->fpdf->Cell(34,6,'','BTR',0,'C');	
		$this->fpdf->Cell(28,6,$TOTALRP,'LBTR',0,'R');

		$this->fpdf->Ln(6);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(138,6,'','L',0,'C');				
		$this->fpdf->Cell(34,6,'Ongkos Angkut','TR',0,'C');	
		$this->fpdf->Cell(28,6,$nOA,'LBTR',0,'R');

		$this->fpdf->Ln(6);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(138,6,'','L',0,'C');				
		$this->fpdf->Cell(34,6,'Total Bayar','R',0,'C');	
		$this->fpdf->Cell(28,6,$nOA+$TOTALRP,'LBTR',0,'R');

		$this->fpdf->Ln(2);
		$this->fpdf->Cell(1);
		$this->fpdf->Cell(200,4,'','LBR',0,'C');
		
		$this->fpdf->Output();		
	}

function rincian_beli(){
		$title = "Laporan Pemasukan";
  		$this->header($title);
  		$this->load->view('ils_konten/Laporan/laporan_pembelian');
  		$this->footer();
  }

function Laporan_pembelian($pr1,$pr2)
	{
		//$pr1 = substr($pr1,-4);
		$pr1 = str_replace("_"," ",$pr1);
		$pr2 = str_replace("_"," ",$pr2);
		$pr1 = $this->m_function->konv_tgl($pr1);
		$pr2 = $this->m_function->konv_tgl($pr2);

		$this->load->library('MC_Table.php');
		$pdf= new MC_Table();
		//setting cetakan (continue)
		$pdf->setTopMargin(1);
		$pdf->setLeftMargin(2);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		$pdf->SetFont('Arial','B',8);
		//$pdf->Image("",60,30,90,0,'PNG');
		//margin kiri buat kekanan sebesar 80
		$pdf->Cell(1);
		$pdf->Ln(0);
		$pdf->Cell(36,10,$this->session->userdata('cBranchDesc'),0,0,'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(80);
		$pdf->Cell(40,10,'LAPORAN',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(80);
		$pdf->Cell(40,10,'Pemasukan Barang',0,0,'C');
		$pdf->Cell(80);
		$pdf->Ln(5);
		$pdf->Cell(205,6,'','B',0,'C');		

		$pdf->SetFont('Arial','',8);
		$pdf->Ln(8);
		$pdf->Cell(2,10,'Periode : '.$pr1.' S/D '.$pr2,0,0,'L');
		$pdf->Ln(8);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(1);
		$pdf->Cell(8,6,'No','LBT',0,'C');
		$pdf->Cell(15,6,'Tanggal','LBT',0,'C');	
		$pdf->Cell(16,6,'No Beli','LBT',0,'C');	
		$pdf->Cell(40,6,'Supplier','LBTR',0,'C');
		$pdf->Cell(58,6,'Nama Barang','LBTR',0,'C');
		$pdf->Cell(15,6,'Qty','LBTR',0,'C');
		$pdf->Cell(22,6,'Price','LBTR',0,'C');
		$pdf->Cell(25,6,'Total','LBTR',0,'C');
		
		$pdf->Ln(6);
		$pdf->SetWidths(array(8,15,16,40,58,15,22,25));
		$no =1;
		$tot1 = 0;$tot2 = 0;$tot3 = 0;
		$data_detil = $this->db->query("CALL laporan1('$pr1','$pr2')");
      	foreach($data_detil->result()as $baris)
		{
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(1);
			$pdf->Row(array(
				array($no,'C'),
                array($baris->dTrx,'C'),
                array($baris->cBMBNo,'C'),
                array($baris->cSupDesc,'L'),
           		array($baris->cGoodDesc." / ".$baris->cUnit,'L'),
           		array($baris->nQty,'C'),
           		array($baris->nPrice,'R'),
           		array($baris->nCost,'R')
           		
                     
    		));
		$no++;
		$tot1 +=$baris->nQty;
		$tot2 +=$baris->nPrice;
		$tot3 +=$baris->nCost;
		
		}	
		$pdf->Cell(1);
		$pdf->Cell(137,6,'Grand Total','LBTR',0,'C');
		$pdf->Cell(15,6,$tot1,'LBTR',0,'C');
		$pdf->Cell(22,6,"",'LBTR',0,'C');
		$pdf->Cell(25,6,$tot3,'LBTR',0,'R');

		$pdf->Ln(6);
		$pdf->SetFont('Arial','',8);
	

		$pdf->Ln(1);
		$pdf->Cell(199,10,'Lampung Selatan,'.date("d M Y"),0,0,'R');

		$pdf->Ln(3);
		$pdf->Cell(175,10,'Mengetahui',0,0,'R');

		$pdf->Ln(6);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(1);

		$pdf->Ln(0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(8);
		// $pdf->Cell(25,10,'Kepala Sekolah,',0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(85);
		// $pdf->Cell(25,10,'Petugas Monev,',0,0,'C');
		
		$pdf->Ln(0);		
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(166);
		$pdf->Cell(20,10,'Pimpinan,',0,0,'C');
		
		$pdf->Ln(15);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(8);
		// $pdf->Cell(25,10,$this->session->userdata('cKepala'),10,0,'C');
		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(52);
		// $pdf->Cell(25,10,$this->session->userdata('cMonev'),10,0,'C');
		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(94);
		$pdf->Cell(25,10,"",10,0,'C');
		
		$pdf->Ln(4);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(10);
		// $pdf->Cell(20,10,'NIP.'.$this->session->userdata('cNipKepala'),0,0,'C');

		$pdf->Ln(0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(85);
		// $pdf->Cell(25,10,'NIP.'.$this->session->userdata('cNipMonev'),0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetFont('Arial','U',8);
		$pdf->Cell(163);
		$pdf->Cell(25,10,"(                           )",0,0,'C');
		
		$pdf->Ln(6);
		$pdf->SetFont('Arial','',9);
		// $pdf->Cell(25,10,'1. Putih : Pimpinan, 2. Merah : Penyerah, 3. Kuning : Gudang',0,0,'L');
		$pdf->Output();		
	}	


	function rincian_jual(){
		$title = "Laporan Pengeluaran";
  		$this->header($title);
  		 $data['list3'] = $this->M_Transaksi->get_rows('mgood','cGoodID');
  		$this->load->view('ils_konten/Laporan/laporan_penjualan',$data);
  		$this->footer();
  }

function Laporan_penjualan($pr1,$pr2)
	{
		//$pr1 = substr($pr1,-4);
		$pr1 = str_replace("_"," ",$pr1);
		$pr2 = str_replace("_"," ",$pr2);
		$pr1 = $this->m_function->konv_tgl($pr1);
		$pr2 = $this->m_function->konv_tgl($pr2);

		$this->load->library('MC_Table.php');
		$pdf= new MC_Table();
		//setting cetakan (continue)
		$pdf->setTopMargin(1);
		$pdf->setLeftMargin(2);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		$pdf->SetFont('Arial','B',8);
		//$pdf->Image("",60,30,90,0,'PNG');
		//margin kiri buat kekanan sebesar 80
		$pdf->Cell(1);
		$pdf->Ln(0);
		$pdf->Cell(36,10,$this->session->userdata('cBranchDesc'),0,0,'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(80);
		$pdf->Cell(40,10,'LAPORAN',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(80);
		$pdf->Cell(40,10,'Pengeluaran Barang',0,0,'C');
		$pdf->Cell(80);
		$pdf->Ln(5);
		$pdf->Cell(205,6,'','B',0,'C');		

		$pdf->SetFont('Arial','',8);
		$pdf->Ln(8);
		$pdf->Cell(2,10,'Periode : '.$pr1.' S/D '.$pr2,0,0,'L');
		$pdf->Ln(8);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(1);
		$pdf->Cell(8,6,'No','LBT',0,'C');
		$pdf->Cell(15,6,'Tanggal','LBT',0,'C');	
		$pdf->Cell(16,6,'No Faktur','LBT',0,'C');	
		$pdf->Cell(40,6,'Konsumen','LBTR',0,'C');
		$pdf->Cell(58,6,'Nama Barang','LBTR',0,'C');
		$pdf->Cell(15,6,'Qty','LBTR',0,'C');
		$pdf->Cell(22,6,'Price','LBTR',0,'C');
		$pdf->Cell(25,6,'Total','LBTR',0,'C');
		
		$pdf->Ln(6);
		$pdf->SetWidths(array(8,15,16,40,58,15,22,25));
		$no =1;
		$tot1 = 0;$tot2 = 0;$tot3 = 0;
		$data_detil = $this->db->query("CALL laporan2('$pr1','$pr2')");
      	foreach($data_detil->result()as $baris)
		{
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(1);
			$pdf->Row(array(
				array($no,'C'),
                array($baris->dTrx,'C'),
                array($baris->cBKBNo,'C'),
                array($baris->cKonID,'L'),
           		array($baris->cGoodDesc,'L'),
           		array($baris->nQty,'C'),
           		array(number_format($baris->nPrice,0,',','.'),'R'),
           		array(number_format($baris->nCost,0,',','.'),'R')
           		
                     
    		));
		$no++;
		$tot1 +=$baris->nQty;
		$tot2 +=$baris->nPrice;
		$tot3 +=$baris->nCost;
		
		}	
		$pdf->Cell(1);
		$pdf->Cell(137,6,'Grand Total','LBTR',0,'C');
		$pdf->Cell(15,6,number_format($tot1,0,',','.'),'LBTR',0,'C');
		$pdf->Cell(22,6,"",'LBTR',0,'C');
		$pdf->Cell(25,6,number_format($tot3,0,',','.'),'LBTR',0,'R');

		$pdf->Ln(6);
		$pdf->SetFont('Arial','',8);
	

		$pdf->Ln(1);
		$pdf->Cell(199,10,'Lampung Selatan,'.date("d M Y"),0,0,'R');

		$pdf->Ln(3);
		$pdf->Cell(175,10,'Mengetahui',0,0,'R');

		$pdf->Ln(6);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(1);

		$pdf->Ln(0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(8);
		// $pdf->Cell(25,10,'Kepala Sekolah,',0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(85);
		// $pdf->Cell(25,10,'Petugas Monev,',0,0,'C');
		
		$pdf->Ln(0);		
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(166);
		$pdf->Cell(20,10,'Pimpinan,',0,0,'C');
		
		$pdf->Ln(15);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(8);
		// $pdf->Cell(25,10,$this->session->userdata('cKepala'),10,0,'C');
		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(52);
		// $pdf->Cell(25,10,$this->session->userdata('cMonev'),10,0,'C');
		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(94);
		$pdf->Cell(25,10,"",10,0,'C');
		
		$pdf->Ln(4);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(10);
		// $pdf->Cell(20,10,'NIP.'.$this->session->userdata('cNipKepala'),0,0,'C');

		$pdf->Ln(0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(85);
		// $pdf->Cell(25,10,'NIP.'.$this->session->userdata('cNipMonev'),0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetFont('Arial','U',8);
		$pdf->Cell(163);
		$pdf->Cell(25,10,"(                           )",0,0,'C');
		
		$pdf->Ln(6);
		$pdf->SetFont('Arial','',9);
		// $pdf->Cell(25,10,'1. Putih : Pimpinan, 2. Merah : Penyerah, 3. Kuning : Gudang',0,0,'L');
		$pdf->Output();		
	}	

// =====================================================================================

function Laporan_penjualan2($pr1,$pr2,$id)
	{
		//$pr1 = substr($pr1,-4);
		$pr1 = str_replace("_"," ",$pr1);
		$pr2 = str_replace("_"," ",$pr2);
		$pr1 = $this->m_function->konv_tgl($pr1);
		$pr2 = $this->m_function->konv_tgl($pr2);

		$this->load->library('MC_Table.php');
		$pdf= new MC_Table();
		//setting cetakan (continue)
		$pdf->setTopMargin(1);
		$pdf->setLeftMargin(2);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		$pdf->SetFont('Arial','B',8);
		//$pdf->Image("",60,30,90,0,'PNG');
		//margin kiri buat kekanan sebesar 80
		$pdf->Cell(1);
		$pdf->Ln(0);
		$pdf->Cell(36,10,$this->session->userdata('cBranchDesc'),0,0,'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(80);
		$pdf->Cell(40,10,'LAPORAN',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(80);
		$pdf->Cell(40,10,'Pengeluaran Barang',0,0,'C');
		$pdf->Cell(80);
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',8);
		// $pdf->Ln(8);
		$pdf->Cell(80);
		$pdf->Cell(40,10,'Periode : '.$pr1.' S/D '.$pr2,0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(205,6,'','B',0,'C');		

		$nama_barang = "";
		$total_penjualan ="";
		$total_qty ="";

		$tabel = 'v_penjualan';
      	$where = array(
      		"DATE_FORMAT(dTrx,'%Y-%m-%d') >=" => $pr1,
      		"DATE_FORMAT(dTrx,'%Y-%m-%d') <=" => $pr2,
      		"cGoodID" => $id,
      		);
      	$data_Header =  $this->M_Laporan->get_by_id($tabel,$where);
     	foreach($data_Header->result()as $baris)
		{
			$nama_barang = $baris->cGoodDesc;
			$total_penjualan += $baris->nCost;
			$total_qty += $baris->nQty;
		}


		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(1);
		$pdf->Cell(58,6,'NAMA BARANG','LT',0,'C');
		$pdf->Cell(5,6,':','T',0,'C');
		$pdf->Cell(136,6,$nama_barang,'TR',0,'L');

		$pdf->Ln(6);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(1);
		$pdf->Cell(58,6,'TOTAL BARANG','L',0,'C');	
		$pdf->Cell(5,6,':','C',0,'C');
		$pdf->Cell(136,6,number_format($total_qty, 0, ",", "."),'R',0,'L');

		$pdf->Ln(6);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(1);
		$pdf->Cell(58,6,'TOTAL PENJUALAN','LB',0,'C');	
		$pdf->Cell(5,6,':','B',0,'C');
		$pdf->Cell(136,6,'Rp. ' . number_format($total_penjualan,0,",","."),'BR',0,'L');

		$pdf->Ln(6);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(1);
		
		$pdf->Cell(45,6,'Tanggal Transaksi','LBT',0,'C');	
		$pdf->Cell(40,6,'No Faktur','LBT',0,'C');	
		$pdf->Cell(34,6,'Qty','LBTR',0,'C');
		$pdf->Cell(35,6,'Price','LBTR',0,'C');
		$pdf->Cell(45,6,'Total','LBTR',0,'C');
		
		$pdf->Ln(6);
		$pdf->SetWidths(array(45,40,34,35,45));
		$no =1;
		$tot1 = 0;$tot2 = 0;$tot3 = 0;

		$tabel2 = 'v_penjualan';
      	$where2 = array(
      		"DATE_FORMAT(dTrx,'%Y-%m-%d') >=" => $pr1,
      		"DATE_FORMAT(dTrx,'%Y-%m-%d') <=" => $pr2,
      		"cGoodID" => $id,
      		);
      	$data_detil =  $this->M_Laporan->get_by_id($tabel2,$where2);
     	foreach($data_detil->result()as $baris)
		{
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(1);
			$pdf->Row(array(
                array($baris->dTrx,'C'),
                array($baris->cBKBNo,'C'),
           		array($baris->nQty,'C'),
           		array('Rp. ' . number_format($baris->nPrice,0,',','.'),'R'),
           		array('Rp. ' . number_format($baris->nCost,0,',','.'),'R')
    		));
		}


		$pdf->Ln(6);
		$pdf->SetFont('Arial','',8);	
		$pdf->Ln(1);
		$pdf->Cell(199,10,'Lampung Selatan,'.date("d M Y"),0,0,'R');
		$pdf->Ln(3);
		$pdf->Cell(175,10,'Mengetahui',0,0,'R');
		$pdf->Ln(6);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(1);
		$pdf->Ln(0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(8);
		// $pdf->Cell(25,10,'Kepala Sekolah,',0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(85);
		// $pdf->Cell(25,10,'Petugas Monev,',0,0,'C');
		
		$pdf->Ln(0);		
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(166);
		$pdf->Cell(20,10,'Pimpinan,',0,0,'C');
		
		$pdf->Ln(15);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(8);
		// $pdf->Cell(25,10,$this->session->userdata('cKepala'),10,0,'C');
		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(52);
		// $pdf->Cell(25,10,$this->session->userdata('cMonev'),10,0,'C');
		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(94);
		$pdf->Cell(25,10,"",10,0,'C');
		
		$pdf->Ln(4);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(10);
		// $pdf->Cell(20,10,'NIP.'.$this->session->userdata('cNipKepala'),0,0,'C');

		$pdf->Ln(0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(85);
		// $pdf->Cell(25,10,'NIP.'.$this->session->userdata('cNipMonev'),0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetFont('Arial','U',8);
		$pdf->Cell(163);
		$pdf->Cell(25,10,"(                           )",0,0,'C');
		
		$pdf->Ln(6);
		$pdf->SetFont('Arial','',9);
		// $pdf->Cell(25,10,'1. Putih : Pimpinan, 2. Merah : Penyerah, 3. Kuning : Gudang',0,0,'L');
		$pdf->Output();		
	}	




// ========================================================================================

function kartu_stok_bulanan()
	{


		$cMT = $this->input->post('cMT');	
		$txt_tahun = $this->input->post('txt_tahun');
		$Kd1 = $this->input->post('Kd1');	
		$Desc1 = $this->input->post('Desc1');
		$Kd2 = 'STCK'.$this->input->post('Kd2');	
		$Desc2 = $this->input->post('Desc2');
		$Gd = $this->input->post('Gd');
		$GDesc1 = $this->input->post('GDesc1');
		$cetak= $this->input->post('cetak');
		$export= $this->input->post('export');
		
		$this->form_validation->set_rules('cMT');
		$this->form_validation->set_rules('txt_tahun');
		$this->form_validation->set_rules('Kd1');
		$this->form_validation->set_rules('Desc1');
		$this->form_validation->set_rules('Kd2');
		$this->form_validation->set_rules('Desc2');
		$this->form_validation->set_rules('Gd');
		$this->form_validation->set_rules('GDesc1');
		$this->form_validation->set_rules('cetak');
		$this->form_validation->set_rules('export');
		$data["info"]="";		
		$data["info2"]="Harga Rata-Rata Bergerak";
		if(!empty($cetak))
    	{
						if(empty($Kd1)||empty($Desc1))
						{
							$data["info"]="Lengkapi Data!";
						}
						//jika komponen sudah diisi
						else
						{
			
		$dReport = $txt_tahun.$cMT;
		$this->load->library('pdf_halaman_l');
		
		$pdf = new Pdf_halaman_l('L','mm',array(260, 480));
		$pdf->setLeftMargin(18);

				$pdf->AliasNbPages();
				$pdf->AddPage();
		
				//$this->fpdf->image(base_url().'Ext/Template/Progressus/assets/images/logo2.jpg',5,4,10,10);
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(1);
				$pdf->Cell(10,10,$this->session->userdata("ses_ILS_branchdesc"),0,0,'L');
		
				$pdf->Ln(6);
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell(50);
				$pdf->Cell(310,10,'KARTU STOK BULANAN',0,0,'C');
				$pdf->Cell(80);
				$pdf->Ln(10);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(36,8,'PERIODE : '.strtoupper($this->m_function->konv_tgl2($cMT)).' '.$txt_tahun,0,'L');
				$pdf->Ln(5);
				$pdf->Cell(36,8,'KODE BARANG : '.$Kd1.','.' NAMA BARANG : '.$Desc1,0,'L');

				$pdf->Ln();
				$pdf->SetFont('Arial','B',9);
				$pdf->Cell(225);
				$pdf->Cell(70,5,'DEBET','LT',0,'C');
				$pdf->Cell(70,5,'KREDIT','LT',0,'C');
				$pdf->Cell(70,5,'SALDO','LRT',0,'C');
		
				$pdf->Ln();
				$pdf->SetFont('Arial','B',9);
        		$pdf->Cell(10,5,'NO.','LBT',0,'C');
				$pdf->Cell(20,5,'TANGGAL','LBT',0,'C');		
				$pdf->Cell(25,5,'KODE TRX','LBT',0,'C');	
				$pdf->Cell(170,5,'KETERANGAN','LBT',0,'C');			
				$pdf->Cell(20,5,'QTY','LBT',0,'C');
				$pdf->Cell(20,5,'RATA2','LBT',0,'C');
				$pdf->Cell(30,5,'RP','LBT',0,'C');	
				$pdf->Cell(20,5,'QTY','LBT',0,'C');
				$pdf->Cell(20,5,'RATA2','LBT',0,'C');
				$pdf->Cell(30,5,'RP','LBT',0,'C');
				$pdf->Cell(20,5,'QTY','LBT',0,'C');
				$pdf->Cell(20,5,'RATA2','LBT',0,'C');
				$pdf->Cell(30,5,'RP','LBRT',0,'C');
				$pdf->Ln();		

		$no=1; $Tot1=0; $Tot2=0; $Tot3=0; $Tot4=0; $Tot5=0; $Tot6=0; $i=0; $max=40;
	
				$nTotQty = 0;
				$nCostD = 0;
				$nQtyK = 0;
				$nCostK = 0;

		$data_detil = $this->db->query("CALL card_stock_monthly('$dReport','$Kd1','$Kd2')");
      	foreach($data_detil->result()as $baris)
		{

				if($i == $max)
				{
				$pdf->AddPage();
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(1);
				$pdf->Cell(10,10,$this->session->userdata("ses_ILS_branchdesc"),0,0,'L');
		
				$pdf->Ln(6);
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell(50);
				$pdf->Cell(300,10,'KARTU STOK BULANAN',0,0,'C');
					$pdf->Ln(10);
				$pdf->Cell(36,8,'PERIODE : '.strtoupper($this->m_function->konv_tgl2($cMT)).' '.$txt_tahun,0,'L');		
				//$this->fpdf->image(base_url().'Ext/Template/Progressus/assets/images/logo2.jpg',5,4,10,10);
					$pdf->Ln(6);
					$pdf->SetFont('Arial','',10);
		
					$pdf->Ln();
					$pdf->SetFont('Arial','B',9);
					$pdf->Cell(225);
					$pdf->Cell(70,5,'DEBET','LT',0,'C');
					$pdf->Cell(70,5,'KREDIT','LT',0,'C');
					$pdf->Cell(70,5,'SALDO','LRT',0,'C');
		
					$pdf->Ln();
					$pdf->SetFont('Arial','B',9);
        			$pdf->Cell(10,5,'NO.','LBT',0,'C');
					$pdf->Cell(20,5,'TANGGAL','LBT',0,'C');		
					$pdf->Cell(25,5,'KODE TRX','LBT',0,'C');	
					$pdf->Cell(170,5,'KETERANGAN','LBT',0,'C');			
					$pdf->Cell(20,5,'QTY','LBT',0,'C');
					$pdf->Cell(20,5,'RATA2','LBT',0,'C');
					$pdf->Cell(30,5,'RP','LBT',0,'C');	
					$pdf->Cell(20,5,'QTY','LBT',0,'C');
					$pdf->Cell(20,5,'RATA2','LBT',0,'C');
					$pdf->Cell(30,5,'RP','LBT',0,'C');
					$pdf->Cell(20,5,'QTY','LBT',0,'C');
					$pdf->Cell(20,5,'RATA2','LBT',0,'C');
					$pdf->Cell(30,5,'RP','LBRT',0,'C');
					$pdf->Ln();
					$i = 0;
				}
		
				$pdf->SetFont('Arial','',9);
				$pdf->Cell(10,5,$no,'LB',0,'C');
				$pdf->Cell(20,5,date("d/m/Y",strtotime($baris->dStock)),'LB',0,'C');	
				$pdf->Cell(25,5,$baris->cNoTrx,'LB',0,'C');		
				$pdf->Cell(170,5,$baris->cDesc,'LB',0,'L');		
				$pdf->Cell(20,5,number_format($baris->nQtyD,0,',','.'),'LB',0,'R');
				$pdf->Cell(20,5,number_format($baris->nRataD,0,',','.'),'LB',0,'R');
				$pdf->Cell(30,5,number_format($baris->nCostD,0,',','.'),'LB',0,'R');	
				$pdf->Cell(20,5,number_format($baris->nQtyK,0,',','.'),'LB',0,'R');
				$pdf->Cell(20,5,number_format($baris->nRataK,0,',','.'),'LB',0,'R');
				$pdf->Cell(30,5,number_format($baris->nCostK,0,',','.'),'LBR',0,'R');
				$pdf->Cell(20,5,number_format($baris->saldo1,0,',','.'),'LB',0,'R');
				$pdf->Cell(20,5,number_format($baris->nRataS,0,',','.'),'LB',0,'R');
				$pdf->Cell(30,5,number_format($baris->saldo2,0,',','.'),'LBR',0,'R');
				$pdf->Ln();			
				$i++;
				$no++;

				$nTotQty = $nTotQty+$baris->nQtyD;
				$nCostD = $nCostD+$baris->nCostD;
				$nQtyK = $nQtyK+$baris->nQtyK;
				$nCostK = $nCostK+$baris->nCostK;

		}
				$pdf->SetFont('Arial','B',9);
				$pdf->Cell(225,5,'GRAND TOTAL','LB',0,'C');	
				$pdf->Cell(20,5,number_format($nTotQty,0,',','.'),'LB',0,'R');
				$pdf->Cell(20,5,'','LB',0,'R');
				$pdf->Cell(30,5,number_format($nCostD,0,',','.'),'LB',0,'R');	
				$pdf->Cell(20,5,number_format($nQtyK,0,',','.'),'LB',0,'R');
				$pdf->Cell(20,5,'','LB',0,'R');
				$pdf->Cell(30,5,number_format($nCostK,0,',','.'),'LBR',0,'R');
				//$pdf->Cell(15,5,'','LB',0,'R');
				$pdf->Cell(70,5,'','LBR',0,'R');
			$pdf->Output('KARTU STOK BULAN '.strtoupper($this->m_function->konv_tgl2($cMT)).' '.$txt_tahun.'.pdf','I');
		
		}			
		}
		
		$this->header('HARGA RATA - RATA BERGERAK');
		$data['list3'] = $this->M_Transaksi->get_rows('mgood','cGoodID');
  		$this->load->view('ils_konten/Laporan/kartu_stok_bulanan',$data);
  		$this->footer();

}



}