<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//buat class
class M_function extends CI_Model
{ 

	function dStock_mBranch($format, $tanggal, $bahasa="id"){
 	$en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat",
	"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
 	"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
	return str_replace($en,$$bahasa,date($format,strtotime($tanggal)));
	}


	function dPayment_ind($tanggal,$format="d M Y", $bahasa="id"){
 	$en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat",
	"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
 	"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
	return str_replace($en,$$bahasa,date($format,strtotime($tanggal)));
	}
	
	function No_Trx($value,$no)
	{
		if (strlen($value)==1)
		{
			$no="000";
			return $no;
		}
		else if (strlen($value)==2)
		{
			$no="00";
			return $no;
		}
		else if (strlen($value)==3)
		{
			$no="0";
			return $no;
		}
		else if (strlen($value)==4)
		{
			$no="";
			return $no;
		}
	}
 
	
	function konv_tgl_indo($format, $tanggal="now", $bahasa="id"){
 	$en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat",
	"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

 
 	$id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
 	"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
	return str_replace($en,$$bahasa,date($format,strtotime($tanggal)));}
	
	function konv_tgl_en($format, $tanggal="now", $bahasa="en"){
 	$en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat",
	"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
 
 	$id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
 	"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
	return str_replace($id,$$bahasa,date($format,strtotime($tanggal)));}
	
	function konv_tgl($tgl)
	{
		$bulan=substr($tgl,3,-5);
		if ($bulan == "Januari")
		{
			$bulan1 = "01";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "Februari")
		{
			$bulan1 = "02";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "Maret")
		{
			$bulan1 = "03";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "April")
		{
			$bulan1 = "04";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "Mei")
		{
			$bulan1 = "05";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "Juni")
		{
			$bulan1 = "06";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "Juli")
		{
			$bulan1 = "07";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "Agustus")
		{
			$bulan1 = "08";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "September")
		{
			$bulan1 = "09";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "Oktober")
		{
			$bulan1 = "10";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "Nopember")
		{
			$bulan1 = "11";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
		else
		if ($bulan == "Desember")
		{
			$bulan1 = "12";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y."-".$bulan1."-".$d;
		}
	}
	
	function konv_tgl1($tgl)
	{
		$bulan=substr($tgl,3,-5);
		if ($bulan == "Januari")
		{
			$bulan1 = "01";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "Februari")
		{
			$bulan1 = "02";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "Maret")
		{
			$bulan1 = "03";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "April")
		{
			$bulan1 = "04";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "Mei")
		{
			$bulan1 = "05";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "Juni")
		{
			$bulan1 = "06";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "Juli")
		{
			$bulan1 = "07";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "Agustus")
		{
			$bulan1 = "08";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "September")
		{
			$bulan1 = "09";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "Oktober")
		{
			$bulan1 = "10";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "Nopember")
		{
			$bulan1 = "11";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
		else
		if ($bulan == "Desember")
		{
			$bulan1 = "12";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1;
		}
	}
	
	function konv_tgl2($tgl)
	{
		$bulan=substr($tgl,0,2);
		if ($bulan == "01")
		{
			$bulan1 = "Januari";	
			return $bulan1;
		}
		else
		if ($bulan == "02")
		{
			$bulan1 = "Februari";		
			return $bulan1;
		}
		else
		if ($bulan == "03")
		{
			$bulan1 = "Maret";		
			return $bulan1;
		}
		else
		if ($bulan == "04")
		{
			$bulan1 = "April";		
			return $bulan1;
		}
		else
		if ($bulan == "05")
		{
			$bulan1 = "Mei";	
			return $bulan1;
		}
		else
		if ($bulan == "06")
		{
			$bulan1 = "Juni";		
			return $bulan1;
		}
		else
		if ($bulan == "07")
		{
			$bulan1 = "Juli";		
			return $bulan1;
		}
		else
		if ($bulan == "08")
		{
			$bulan1 = "Agustus";		
			return $bulan1;
		}
		else
		if ($bulan == "09")
		{
			$bulan1 = "September";	
			return $bulan1;
		}
		else
		if ($bulan == "10")
		{
			$bulan1 = "Oktober";		
			return $bulan1;
		}
		else
		if ($bulan == "11")
		{
			$bulan1 = "Nopember";	
			return $bulan1;
		}
		else
		if ($bulan == "12")
		{
			$bulan1 = "Desember";	
			return $bulan1;
		}
	}
	
	function konv_tgl3($tgl)
	{
		$bulan=substr($tgl,3,-5);
		if ($bulan == "Januari")
		{
			$bulan1 = "01";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "Februari")
		{
			$bulan1 = "02";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "Maret")
		{
			$bulan1 = "03";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "April")
		{
			$bulan1 = "04";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "Mei")
		{
			$bulan1 = "05";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "Juni")
		{
			$bulan1 = "06";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "Juli")
		{
			$bulan1 = "07";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "Agustus")
		{
			$bulan1 = "08";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "September")
		{
			$bulan1 = "09";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "Oktober")
		{
			$bulan1 = "10";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "Nopember")
		{
			$bulan1 = "11";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
		else
		if ($bulan == "Desember")
		{
			$bulan1 = "12";
			$d = substr($tgl,0,2);
			$y = substr($tgl,-4,4);		
			return $y.$bulan1.$d;
		}
	}

}
?>