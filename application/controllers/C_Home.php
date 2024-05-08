<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Master');
    $this->load->model('m_function','',TRUE);
    $this->load->model('M_Transaksi');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		
		$this->load->model('M_Pengguna','',TRUE);
    date_default_timezone_set('Asia/Jakarta');
    // jika belum login redirect ke login
            if ($this->session->userdata('logged_in') =="") {
                redirect('C_Pengguna/login2');
            }
	}

  function header($title)
  {
  	$data['info'] = $title;
  	$data['list'] = $this->M_Master->get_rows('keranjang','cUserID');
  	$data['list2'] = $this->M_Master->get_rows('mgoodgrp','cGoodGrpID');
  	
    $this->load->view('ils_header/header2',$data);
  }

  public function footer()
  {
    $this->load->view('ils_footer/footer2');
  }

	public function index()
	{
		$this->load->helper('url');
		$this->load->database();
		//desain web
		$title = "TOKO GEZA GRROSIR";
		$data['list'] = $this->M_Master->get_rows('dasbor','cStockID');
		$this->header($title);
   		$this->load->view('ils_konten/Home',$data);    
    	$this->footer();
	}


	public function detil($id)
	{
		$this->load->helper('url');
		$this->load->database();
		//desain web
		$title = "TOKO GEZA GRROSIR";
		$data['list'] = $this->M_Master->get_rows('dasbor','cStockID');
		$data['list2'] = $this->M_Master->get_rows('msize','cSizeID');
		$data['list3'] = $this->M_Master->get_rows('mranting','cUserID');
		$data['list4'] = $this->M_Master->get_rows('v_ulasan','cStockID');

		$data['cStockID'] = $id;
		$this->header($title);
   		$this->load->view('ils_konten/detil',$data);    
    	$this->footer();
	}


public function Daftar()
	{
		$this->load->helper('url');
		$this->load->database();
		//desain web
		  $title = "Daftar User Baru";
		// $this->header($title);
   		$this->load->view('ils_konten/daftar');    
    	// $this->footer();
	}

public function add_user()
  {
      $tabel = "mUser";
      $data = array(
              'cEmailID' => $this->input->post('userName'),
              'cPassword' => $this->input->post('cPassword'),
              'cName' => strtoupper($this->input->post('cName')),
              'cAddress' => strtoupper($this->input->post('cAddress')),
              'cPhone' => strtoupper($this->input->post('cPhone')),
              'cHP' => strtoupper($this->input->post('cHP')),
              'cUserGrpID' =>'02',
              'cBranchID' =>'01',
          );
      $insert = $this->M_Master->save($data,$tabel);
      $this->login($this->input->post('userName'),$this->input->post('cPassword'));
      echo json_encode(array("status" => TRUE));
  }


public function ajax_edit_user($id)
  {
      $tabel = 'mUser';
      $data = $this->M_Master->get_by_idA($tabel,array('cEmailID' =>$id));
      echo json_encode($data);
  }


function login($txt_email,$txt_password)
	{

					$data_table = array('cEmailID' => $txt_email,
										'cPassword' => $txt_password //md5($this->input->post('txt_password', TRUE))
					);
					$hasil = $this->M_Pengguna->cek_user($data_table);
				//	$mCompany = $this->M_Pengguna->get_rows('mCompany','cCoID');
					$cek = count($hasil->result());
					if ($cek > 0 ) {
					foreach ($hasil->result() as $sess) {
						$sess_data['logged_in'] = 'Sudah Loggin';
						$sess_data['username'] = $sess->cEmailID;
						$sess_data['cUserGrpID'] = $sess->cUserGrpID;
						$cUserGrpID = $sess->cUserGrpID;
						$this->session->set_userdata($sess_data);
					}
					$where = array('cUserGrpID' => $cUserGrpID);
					
					$where2 = array('cBranchID' => '01');
					$brand2 = $this->M_Pengguna->get_rows_id("mbranch",$where2);
					foreach ($brand2->result() as $sess) {
					 	$sess_data2['dStock'] = $sess->dStock;
					 	$sess_data2['cBranchDesc'] = $sess->cBranchDesc;	
					 }
					 $this->session->set_userdata($sess_data2);
					

					redirect('C_Home');	
					}
					else {
							$data["info"] = "Email / Password Tidak Ada !";
					}
					//==
		
		//tampilkan alamat index (view)
		$this->load->view('ils_login/ils_login',$data);
	}


	public function add_keranjang()
  {
      $tabel = "t_tbkb2";
      $data = array(
              'cUserID' => $this->session->userdata('username'),
              'cStockID' => $this->input->post('cStockID'),
              'cSizeID' => $this->input->post('cSizeID'),
              
			  'nQty' => $this->input->post('demo0'),
              'nHpp' => $this->input->post('nHpp'),
              'nPrice' => $this->input->post('nSale'),
              'nCost' => $this->input->post('nSale')*$this->input->post('demo0'),
              'nCost2' => $this->input->post('nHpp')*$this->input->post('demo0'),
          );
      $insert = $this->M_Master->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }


  public function add_ranting()
  {
      $tabel = "mranting";
      $this->M_Master->delete_by_id($this->session->userdata('username'),$tabel,'cUserID');
      if($this->input->post('rating')==""){
      	$rate = 0;
      }else{
      	$rate = $this->input->post('rating');
      }
      $data = array(
              'cUserID' => $this->session->userdata('username'),
              'cStockID' => $this->input->post('cStockID'),
              'cRanting' => $rate,
          );
      $insert = $this->M_Master->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }


public function add_ulasan()
  {
      $tabel = "mulasan";
      $data = array(
              'cUserID' => $this->session->userdata('username'),
              'cStockID' => $this->input->post('cStockID'),
              'cDesc' => $this->input->post('cDesc'),
          );
      $insert = $this->M_Master->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

public function keranjang()
	{
		$this->load->helper('url');
		$this->load->database();
		//desain web
		  $title = "Keranjang Belanja";
		$this->header($title);
   		$this->load->view('ils_konten/keranjang');    
    	$this->footer();
	}

public function ajax_list_v_list()
  {
    //'cSizeID','cSize','cAddress','cPhone','cHP','cFax'
      $list = $this->M_Master->get_datatables_v_list();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cStockID;
          $row[] = $estudiante->cGoodDesc;
          $row[] = $estudiante->cUnit;
          $row[] = $estudiante->nQty;
          $row[] = $estudiante->nPrice;
          $row[] = $estudiante->nCost;
          //add html for action
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_sup('."'".$estudiante->cStockID."'".')"><i class="icon_pencil"></i> Edit</a>
                <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_sup('."'".$estudiante->cStockID."'".')"><i class="icon_trash_alt"></i> Delete</a>';
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Master->count_filtered_v_list(),
                      "recordsFiltered" => $this->M_Master->count_all_v_list(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }


  public function ajax_edit_qty($id)
  {
      $tabel = 't_tbkb2';
      $where = array('cStockID' =>$id,
  					 'cUserID' =>$this->session->userdata('username'));
      $data = $this->M_Master->get_by_id2($where,$tabel);
      echo json_encode($data);
  }


  public function ajax_update_qty($id)
  {
      $tabel = "t_tbkb2";
      $data = array(
              'nQty' => $this->input->post('demo0'),
          );

      $this->M_Master->update(array('cStockID' =>$id,
  					 'cUserID' =>$this->session->userdata('username')), $data,$tabel);

      $condition['cUserID'] = $this->session->userdata('username');
      $get = $this->M_Transaksi->getDataDetil2($tabel, $condition);

      foreach ($get->result() as $row){
          if($row->cStockID == $id){

           $data = array(
              'nCost' => $row->nPrice*$row->nQty,
              'nCost2' => $row->nHpp*$row->nQty,
          );

          $where = array('cUserID' => $row->cUserID,
                         'cStockID' => $row->cStockID
                        );
        $this->M_Transaksi->update($where, $data,$tabel);
          }
      }

      echo json_encode(array("status" => TRUE));
  }

 public function ajax_delete_qty($id)
  {
      $tabel = "t_tbkb2";
      $this->M_Master->delete_by_id_array(array('cStockID' =>$id,
  					 'cUserID' =>$this->session->userdata('username')),$tabel);
      echo json_encode(array("status" => TRUE));
  }


  public function checkout(){
  	error_reporting(0);
  	$dateStock = date("Ym");
	$results= $this->db->query("SELECT IFNULL(RIGHT(`cBKBNo`,4),0) AS BKBNo FROM `tbkb1` WHERE DATE_FORMAT(`dTrx`,'%Y%m') = '$dateStock' ORDER BY cBKBNo DESC LIMIT 1;");
	foreach($results->result()as $baris);					
	$value=$baris->BKBNo + 1;
	

	$no='';
	$i=$this->m_function->No_Trx($value,$no);
	$BKBNo=$dateStock.$i.$value;

	 $tabel = "tbkb1";
     $data = array(
              'cBKBNo' => $BKBNo,
              'dTrx' => date('Y-m-d'),
              'cKonID' => $this->session->userdata('username'),
              'cStatus' => "Tunggu",
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $insert = $this->M_Transaksi->save($data,$tabel);

      $condition['cUserID'] = $this->session->userdata('username');
      $get = $this->M_Transaksi->getDataDetil2("t_tbkb2", $condition);

      $nNo = 1;
      foreach ($get->result() as $row){
           $data = array(
           	  'cBKBNo' => $BKBNo,
           	  'nNo' => $nNo,
           	  'cStockID' => $row->cStockID,
           	  'nQty' => $row->nQty,
           	  'nPrice' => $row->nPrice,
			  'nHpp' => $row->nHpp,
              'nCost' => $row->nCost,
              'nCost2' => $row->nCost2,
          );
        $this->M_Transaksi->save($data,"tbkb2");
        $nNo++;
      }


      $this->M_Master->delete_by_id($this->session->userdata('username'),"t_tbkb2",'cUserID');
      redirect('C_Home/hasil/'.$BKBNo);

  }

public function hasil($id)
	{
		$this->load->helper('url');
		$this->load->database();
		//desain web
		$title = "Transaksi";
		$data['BKBNo'] = $id;
    $data['list'] = $this->M_Master->get_rows('v_bkb1','cBKBNo');
		$this->header($title);
   		$this->load->view('ils_konten/hasil',$data);    
    	$this->footer();
	}

public function ajax_list_BKB2()
  {
    //nNo,cBarcode, nQty, mgood.cGodDesc
      $list = $this->M_Transaksi->get_datatables_tbkb2();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cStockID;
          $row[] = $estudiante->cGoodDesc;
          $row[] = $estudiante->cUnit;
          $row[] = number_format($estudiante->nQty,2,',','.');
          $user =$this->session->userdata('cUserGrpID');

          $row[] = number_format($estudiante->nPrice,0,',','.');
          $row[] = number_format($estudiante->nCost,0,',','.');
           // $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_BKB2('."'".$estudiante->cGoodID."'".","."'".$estudiante->cBKBNo."'".')"><i class="icon_pencil"></i>Edit</a>';
          $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_BKB2('."'".$estudiante->cStockID."'".')">Hapus</a>'; 
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => "",//$this->M_Transaksi->count_all_tbkb2(),
                      "recordsFiltered" => "",//$this->M_Transaksi->count_filtered_tbkb2(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }

public function BKB()
  {
    $this->load->helper('url');
    $this->load->database();
    //desain web
      $data['list3'] = $this->M_Transaksi->get_rows('mgood','cGoodID');
      $data['list4'] = $this->M_Transaksi->get_rowsAsc('muser','cEmailID');
      
      $title = "Transaksi";
      $this->header($title);
      $this->load->view('ils_konten/Transaksi/ils_bkb2',$data);    
      $this->footer();
  }

public function ajax_list_BKB()
  {
    //cBKBNo,dTrx,msupplier.cSupDesc,cRefNo,mwarehouse.cWhdDesc,cDesc,cClose
      $list = $this->M_Transaksi->get_datatables_tbkb1();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cBKBNo;
          $row[] = $estudiante->dTrx;
          $row[] = $estudiante->cName;
          $row[] = $estudiante->cStatus;
          $row[] = $estudiante->cBayar;
          
          //add html for action
          $user =$this->session->userdata('cUserGrpID');
  
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_BKB1('."'".$estudiante->cBKBNo."'".')"><i class="icon_pencil"></i>Lihat</a> <a class="btn btn-sm btn-info" href="javascript:void()" title="Cetak" onclick="Cetak('."'".$estudiante->cBKBNo."'".')">Cetak</a>';
          $data[] = $row;
        
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Transaksi->count_all_tbkb1(),
                      "recordsFiltered" => $this->M_Transaksi->count_filtered_tbkb1(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }


public function user_profil()
  {
    $this->load->helper('url');
    $this->load->database();
    //desain web
      $title = "Edit Profil";
      $data['list'] = $this->M_Master->get_rows('muser','cEmailID');
      $this->header($title);
      $this->load->view('ils_konten/user_profil',$data);    
      $this->footer();
  }

  public function ajax_update_user_profil()
  {
    //  $this->_validate_user();
      $tabel = "mUser";
      $data = array(
              'cEmailID' => $this->input->post('userName'),
              'cPassword' => $this->input->post('cPassword'),
              'cName' => strtoupper($this->input->post('cName')),
              'cAddress' => strtoupper($this->input->post('cAddress')),
              'cPhone' => strtoupper($this->input->post('cPhone')),
              'cHP' => strtoupper($this->input->post('cHP')),
              // 'cUserGrpID' =>'02',
              'cBranchID' =>'01',
          );
      $this->M_Master->update(array('cEmailID' =>$this->input->post('userName')), $data,$tabel);
       echo "<script> alert('Data Berhasil Diubah') </script>";
      $this->user_profil($this->input->post('userName'));
      // echo json_encode(array("status" => TRUE));
  }



}












