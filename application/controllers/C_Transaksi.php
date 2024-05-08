<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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

	public function index()
	{
		$this->load->helper('url');
		$this->load->database();
		//desain web
      $data['list'] = $this->M_Transaksi->get_rows('msupplier','cSupID');
      $data['list3'] = $this->M_Transaksi->get_rows('mgood','cGoodID');
      
      
		  $title = "Pemasukan Barang";
		  $this->header($title);
   		$this->load->view('ils_konten/transaksi/tpembelian1',$data);    
    	$this->footer();
	}

//====================================================================

  public function ajax_list_BMB()
  {
    //cBMBNo,dTrx,msupplier.cSupDesc,cRefNo,mwarehouse.cWhdDesc,cDesc,cClose
      $list = $this->M_Transaksi->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cBMBNo;
          $row[] = $estudiante->dTrx;
          $row[] = $estudiante->cSupDesc;
          $row[] = $estudiante->cDesc;
          //add html for action
          $user =$this->session->userdata('cUserGrpID');
          if($user == "01"){
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_bmb1('."'".$estudiante->cBMBNo."'".')"><i class="icon_pencil"></i> Edit</a> <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_bmb1('."'".$estudiante->cBMBNo."'".')">Hapus</a> <a class="btn btn-sm btn-info" href="javascript:void()" title="Cetak" onclick="Cetak('."'".$estudiante->cBMBNo."'".')">Cetak</a>';
          }
         else if($estudiante->cClose == "T" ){
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_bmb1('."'".$estudiante->cBMBNo."'".')"><i class="icon_pencil"></i> Edit</a> <a class="btn btn-sm btn-info" href="javascript:void()" title="Cetak" onclick="Cetak('."'".$estudiante->cBMBNo."'".')">Cetak</a> <label style="color:#FF0000">Blm Tutup</label>';
          }
          else{
              $row[] = '<div align="center" style="align-items: center; align-content: center; text-align: center;"><label style="color:#228B22">Tutup</label><a class="btn btn-sm btn-info" href="javascript:void()" title="Cetak" onclick="Cetak('."'".$estudiante->cBMBNo."'".')">Cetak</a></div>';

          }
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Transaksi->count_all(),
                      "recordsFiltered" => $this->M_Transaksi->count_filtered(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }

  public function ajax_nomor_BMB()
  {
      $tabel = 'tbmb1';
      $hasil = $this->M_Transaksi->get_nomor3($tabel,'cBMBNo');
      $cek = count($hasil->result());

      if ($cek > 0 ) {
        $data = $this->M_Transaksi->get_nomor2($tabel,'cBMBNo');
      }
      else{
           $data = $this->M_Transaksi->nomor_bmb();
      }
      echo json_encode($data);
  }


  public function ajax_add_tbmb1()
  {
      //$this->_validate();
      $tabel = "tbmb1";
      $data = array(
              'cBMBNo' =>$this->input->post('cBMBNo'),
              // 'dTrx' => $this->m_function->konv_tgl($this->input->post('dTrx')),
              'cSupID' => $this->input->post('cSupID'),
              'cDesc' => strtoupper($this->input->post('cDesc')),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $insert = $this->M_Transaksi->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

  //AMBIL DATA mMENU
  private function _validate()
  {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('cMenuID') == '')
      {
          $data['inputerror'][] = 'cMenuID';
          $data['error_string'][] = 'Mohon Isi Kode Menu';
          $data['status'] = FALSE;
      }else{

        if(!$this->_validate_number($this->input->post('cMenuID')))
        {
          $data['inputerror'][] = 'cMenuID';
          $data['error_string'][] = 'Jenis Number(1-10)';
          $data['status'] = FALSE;
        }
      }

      if($this->input->post('cMenuDesc') == '')
      {
          $data['inputerror'][] = 'cMenuDesc';
          $data['error_string'][] = 'Masukan Nama Menu';
          $data['status'] = FALSE;
      }else{

        if(!$this->_validate_string($this->input->post('cMenuDesc')))
        {
          $data['inputerror'][] = 'cMenuDesc';
          $data['error_string'][] = 'Karakter (A-Z,a-z)';
          $data['status'] = FALSE;
        }

      }

      if($data['status'] === FALSE)
      {
          echo json_encode($data);
          exit();
      }
  }
  //==========================================

  private function _validate_string($string)
  {
      $allowed = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
      for ($i=0; $i<strlen($string); $i++)
      {
          if (strpos($allowed, substr($string,$i,1))===FALSE)
          {
              return FALSE;
          }
      }

     return TRUE;
  }

  private function _validate_number($string)
  {
      $allowed = "0123456789";
      for ($i=0; $i<strlen($string); $i++)
      {
          if (strpos($allowed, substr($string,$i,1))===FALSE)
          {
              return FALSE;
          }
      }
     return TRUE;
  }

 public function ajax_list_BMB2()
  {
    //nNo,cBarcode, nQty, mgood.cGodDesc
      $list = $this->M_Transaksi->get_datatables_tbmb2();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cGoodID;
          $row[] = $estudiante->cGoodDesc;
          $row[] = $estudiante->cUnit;
          $row[] = number_format($estudiante->nQty,0,',','.');
          $row[] = number_format($estudiante->nPrice,0,',','.');
          $row[] = number_format($estudiante->nCost,0,',','.');
          $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_bmb2('."'".$estudiante->cGoodID."'".')">Hapus</a>';
          // <a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_bmb2('."'".$estudiante->cGoodID."'".","."'".$estudiante->cBMBNo."'".')"><i class="icon_pencil"></i>Edit</a> 
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => "",//$this->M_Transaksi->count_all_tbmb2(),
                      "recordsFiltered" => "",//$this->M_Transaksi->count_filtered_tbmb2(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }

  public function ajax_add_tbmb2Detil()
  {
      $nQty = $this->input->post('nQty');
      $nPrice = $this->input->post('nPrice');
      $nCost = $this->input->post('nCost');
      
      $nQty = str_replace(".","",$nQty);
      $nQty = str_replace(",", ".", $nQty);
      $nPrice= str_replace(".","",$nPrice);
      $nPrice = str_replace(",", ".", $nPrice);
      $nCost= str_replace(".","",$nCost);
      $nCost = str_replace(",", ".", $nCost);

      $tabel = "tbmb2";
      $condition['cBMBNo'] = $this->input->post('cBMBNo');
      $get = $this->M_Transaksi->getDataDetil($tabel, $condition);
      $tambah = TRUE;

      $nNo = 1;
      foreach ($get->result() as $row){
          if($row->cGoodID == strtoupper($this->input->post('cGoodID'))){
          $total = $row->nQty + $this->input->post('nQty');
          $data = array(
              'cBMBNo' => $row->cBMBNo,
              'nNo' => $row->nNo,
              'cGoodID' => $row->cGoodID,
              'nQty' => $total,
              'nPrice' => $row->nPrice,
              'nCost' => $row->nPrice * $total
          );

          $where = array('cBMBNo' => $row->cBMBNo,
                         'nNo' => $row->nNo,
                         'cGoodID' => $row->cGoodID
                        );
        $this->M_Transaksi->update($where, $data,$tabel);
        $tambah = FALSE;
          }
        $nNo += 1;
      }

      if($tambah){
      $data = array(
              'cBMBNo' => strtoupper($this->input->post('cBMBNo')),
              'nNo' => $nNo,
              
              'cGoodID' => strtoupper($this->input->post('cGoodID')),
              'nQty' => $nQty,
              'nPrice' => $nPrice,
              'nCost' => $nCost
          );
          $insert = $this->M_Transaksi->save($data,$tabel);
         // break;
      }

      echo json_encode(array("status" => TRUE));
  }

public function ajax_update_tbmb2Detil()
  {
      $nQty = $this->input->post('nQty');
      $nPrice = $this->input->post('nPrice');
      $nCost = $this->input->post('nCost');
      
      $nQty = str_replace(".","",$nQty);
      $nQty = str_replace(",", ".", $nQty);
      $nPrice= str_replace(".","",$nPrice);
      $nPrice = str_replace(",", ".", $nPrice);
      $nCost= str_replace(".","",$nCost);
      $nCost = str_replace(",", ".", $nCost);

      $tabel = "tbmb2";
      $condition['cBMBNo'] = $this->input->post('cBMBNo');
      $get = $this->M_Transaksi->getDataDetil($tabel, $condition);
      $tambah = TRUE;

      $nNo = 1;
      foreach ($get->result() as $row){
          if($row->cGoodID == strtoupper($this->input->post('cGoodID'))){

           $data = array(
              'cBMBNo' => $row->cBMBNo,
              'nNo' => $row->nNo,
              'cGoodID' => $row->cGoodID,
              'nPrice' => $nPrice,
              'nCost' => $nCost,
              'cDesc' => strtoupper($this->input->post('cDesc2')),
          );

          $where = array('cBMBNo' => $row->cBMBNo,
                         'nNo' => $row->nNo,
                         'cGoodID' => $row->cGoodID
                        );
        $this->M_Transaksi->update($where, $data,$tabel);
          }
        $nNo += 1;
      }

      echo json_encode(array("status" => TRUE));
  }
  

public function ajax_update_tbmb2_detil()
  {
    $tabel = "tbmb2";  
    $i = $this->input;
    $id = $i->post('checked_id');
    
        if(is_array($id)){
            $this->db->where_in('cGoodID', $id);
        }else{
            $this->db->where('cGoodID', $id);
        }
        $this->db->where('cBMBNo', $this->input->post('cBMBNo'));
        $data = array(
                      // 'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5)),

                      'cAcc'        => "Y",           
          );
      $this->db->update('tbmb2',$data); 
      echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete_tbmb2($id)
  {
      $tabel = "tbmb2";
      $cBMBNo = $this->uri->segment(4);
      $where = array(
                'cBMBNo' => $cBMBNo,
                'cGoodID' => $id
                );
      $this->M_Transaksi->delete_by_id_array($where,$tabel);
      echo json_encode(array("status" => TRUE));
  }

 public function ajax_edit_tbmb1($id)
  {
      $select = "tbmb1.cBMBNo,tbmb1.dTrx,tbmb1.cSupID,msupplier.cSupDesc,tbmb1.cDesc,tbmb1.cClose";
      $tabel = 'tbmb1';
      $tabel2 = 'msupplier';
      $where = array('tbmb1.cBMBNo' => $id);
      $join = "msupplier.cSupID = tbmb1.cSupID";
      $data = $this->M_Transaksi->get_by_id_join2($select,$tabel,$where,$tabel2,$join);
      echo json_encode($data);
  }


  public function ajax_update_tbmb1($id)
  {
     $tabel = "tbmb1";
     $data = array(
              'cBMBNo' =>$this->input->post('cBMBNo'),
              // 'dTrx' => $this->m_function->konv_tgl($this->input->post('dTrx')),
              'cSupID' => $this->input->post('cSupID'),
              'cClose' => strtoupper($this->input->post('cClose')),
              'cDesc' => strtoupper($this->input->post('cDesc')),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $this->M_Transaksi->update(array('cBMBNo' =>$id), $data,$tabel);
      echo json_encode(array("status" => TRUE));
  }


public function ajax_delete_tbmb1($id)
  {
      $tabel = "tbmb1";
      $this->M_Transaksi->delete_by_id($id,$tabel,'cBMBNo');
      echo json_encode(array("status" => TRUE));
  }



public function BKB()
  {
    $this->load->helper('url');
    $this->load->database();
    //desain web
      $data['list3'] = $this->M_Transaksi->get_rows('mgood','cGoodID');
      $data['list4'] = $this->M_Transaksi->get_rowsAsc('muser','cEmailID');
      
      $title = "Pengeluaran Barang";
      $this->header($title);
      $this->load->view('ils_konten/Transaksi/ils_bkb',$data);    
      $this->footer();
  }

//====================================================================

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
          // $row[] = $estudiante->cName;
          // $row[] = $estudiante->cStatus;
          $row[] = $estudiante->cBayar;
          $row[] = $estudiante->cDesc;
          
          
          // $row[] = '<a href="'.base_url().'upload/'.$estudiante->cGambar.'" target="_blank"><b>'.$estudiante->cGambar.'</b></a>' ;

          //add html for action
          $user =$this->session->userdata('cUserGrpID');
          if($user == "01"){
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_BKB1('."'".$estudiante->cBKBNo."'".')"><i class="icon_pencil"></i> Edit</a> <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_BKB1('."'".$estudiante->cBKBNo."'".')">Hapus</a> <a class="btn btn-sm btn-info" href="javascript:void()" title="Cetak" onclick="Cetak('."'".$estudiante->cBKBNo."'".')">Cetak</a>';
          }
         else if($estudiante->cClose == "T" ){
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_BKB1('."'".$estudiante->cBKBNo."'".')"><i class="icon_pencil"></i> Edit</a> <label style="color:#FF0000">Blm Tutup</label>';
          }
          else{
              $row[] = '<div align="center" style="align-items: center; align-content: center; text-align: center;"><label style="color:#228B22">Tutup</label> <a class="btn btn-sm btn-info" href="javascript:void()" title="Cetak" onclick="Cetak('."'".$estudiante->cBKBNo."'".')">Cetak</a></div>';

          }
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

  public function ajax_nomor_BKB()
  {
      $tabel = 'tbkb1';
      $hasil = $this->M_Transaksi->get_nomor3($tabel,'cBKBNo');
      $cek = count($hasil->result());

      if ($cek > 0 ) {
        $data = $this->M_Transaksi->get_nomor2($tabel,'cBKBNo');
      }
      else{
           $data = $this->M_Transaksi->nomor_bkb();
      }
      echo json_encode($data);
  }


  public function ajax_add_tbkb1()
  {
      //$this->_validate();
      $nOA = $this->input->post('nOA');
      $nOA = str_replace(".","",$nOA);
      $nOA = str_replace(",", ".", $nOA);
  

      $tabel = "tbkb1";
      $data = array(
              'cBKBNo' =>$this->input->post('cBKBNo'),
              // 'dTrx' => $this->m_function->konv_tgl($this->input->post('dTrx')),
              'cKonID' => $this->input->post('cKonID'),
              'cStatus' => $this->input->post('cStatus'),
              'cBayar' => $this->input->post('cBayar'),
              'nOA' => $nOA,
              'cDesc' => strtoupper($this->input->post('cDesc')),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $insert = $this->M_Transaksi->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
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
          $row[] = number_format($estudiante->nQty,0,',','.');
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

  public function ajax_add_tbkb2Detil()
  {
      $nQty = $this->input->post('nQty');
      $nPrice = $this->input->post('nPrice');
      $nCost = $this->input->post('nCost');
      $nHpp = $this->input->post('nHpp');
      
      
      $nQty = str_replace(".","",$nQty);
      $nQty = str_replace(",", ".", $nQty);
      $nPrice= str_replace(".","",$nPrice);
      $nPrice = str_replace(",", ".", $nPrice);
      $nCost= str_replace(".","",$nCost);
      $nCost = str_replace(",", ".", $nCost);

      $nHpp= str_replace(".","",$nHpp);
      $nHpp = str_replace(",", ".", $nHpp);

      $tabel = "tbkb2";
      $condition['cBKBNo'] = $this->input->post('cBKBNo');
      $get = $this->M_Transaksi->getDataDetil($tabel, $condition);
      $tambah = TRUE;

      $nNo = 1;
      foreach ($get->result() as $row){
          if($row->cStockID == strtoupper($this->input->post('cGoodID'))){
          $total = $row->nQty + $this->input->post('nQty');
          $data = array(
              'cBKBNo' => $row->cBKBNo,
              'nNo' => $row->nNo,
              'cStockID' => $row->cStockID,
              'nQty' => $total,
              'nPrice' => $row->nPrice,
              'nHpp' => $row->nHpp,
              
              'nCost' => $row->nPrice * $total,
              'nCost2' => $row->nHpp * $total
                
          );

          $where = array('cBKBNo' => $row->cBKBNo,
                         'nNo' => $row->nNo,
                         'cStockID' => $row->cStockID
                        );
        $this->M_Transaksi->update($where, $data,$tabel);
        $tambah = FALSE;
          }
        $nNo += 1;
      }

      if($tambah){
      $data = array(
              'cBKBNo' => strtoupper($this->input->post('cBKBNo')),
              'nNo' => $nNo,
              'cStockID' => strtoupper($this->input->post('cGoodID')),
              'nQty' => $nQty,
              'nPrice' => $nPrice,
              'nHpp' => $nHpp,
              
              'nCost' => $nCost,
              'nCost2' => $nHpp*$nQty,
                
          );
          $insert = $this->M_Transaksi->save($data,$tabel);
         // break;
      }

      echo json_encode(array("status" => TRUE));
  }

public function ajax_update_tbkb2Detil()
  {
      $nQty = $this->input->post('nQty');
      $nPrice = $this->input->post('nPrice');
      $nCost = $this->input->post('nCost');
      
      $nQty = str_replace(".","",$nQty);
      $nQty = str_replace(",", ".", $nQty);
      $nPrice= str_replace(".","",$nPrice);
      $nPrice = str_replace(",", ".", $nPrice);
      $nCost= str_replace(".","",$nCost);
      $nCost = str_replace(",", ".", $nCost);

      $tabel = "tbkb2";
      $condition['cBKBNo'] = $this->input->post('cBKBNo');
      $get = $this->M_Transaksi->getDataDetil($tabel, $condition);
      $tambah = TRUE;

      $nNo = 1;
      foreach ($get->result() as $row){
          if($row->cGoodID == strtoupper($this->input->post('cGoodID'))){

           $data = array(
              'cBKBNo' => $row->cBKBNo,
              'nNo' => $row->nNo,
              'cGoodID' => $row->cGoodID,
              'nPrice' => $nPrice,
              'nCost' => $nCost,
              'cDesc2' => strtoupper($this->input->post('cDesc2')),
          );

          $where = array('cBKBNo' => $row->cBKBNo,
                         'nNo' => $row->nNo,
                         'cGoodID' => $row->cGoodID
                        );
        $this->M_Transaksi->update($where, $data,$tabel);
          }
        $nNo += 1;
      }

      echo json_encode(array("status" => TRUE));
  }
  

public function ajax_delete_tbkb1($id)
  {
      $tabel = "tbkb1";
      $this->M_Transaksi->delete_by_id($id,$tabel,'cBKBNo');
      echo json_encode(array("status" => TRUE));
  }

public function ajax_edit_tbkb1($id)
  {
      $tabel = 'v_bkb1';
      $data = $this->M_Transaksi->get_by_id($id,$tabel,"cBKBNo");
      echo json_encode($data);
  }

  public function ajax_Sum_DetilBKB2($id)
  {
      $tabel = 'tbkb2';
      $data = $this->M_Transaksi->get_by_Sum_detil($id,$tabel,'cBKBNo');
      echo json_encode($data);
  }

  public function ajax_update_tbkb1($id)
  {
      $nOA = $this->input->post('nOA');
      $nOA = str_replace(".","",$nOA);
      $nOA = str_replace(",", ".", $nOA);

      $tabel = "tbkb1";
      $data = array(
              'cBKBNo' =>$this->input->post('cBKBNo'),
              // 'dTrx' => $this->m_function->konv_tgl($this->input->post('dTrx')),
              'cKonID' => $this->input->post('cKonID'),
              'cStatus' => $this->input->post('cStatus'),
              'nOA' => $nOA,
              'cDesc' => strtoupper($this->input->post('cDesc')),
              'cClose' => strtoupper($this->input->post('cClose')),
              'cBayar' => $this->input->post('cBayar'),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );

      $this->M_Transaksi->update(array('cBKBNo' =>$id), $data,$tabel);
      echo json_encode(array("status" => TRUE));
  }


public function ajax_edit_BKB2($id,$id2)
  {
      $select = "tbkb2.cBKBNo,tbkb2.cGoodID,mgood.cGoodDesc,mgood.cUnit,tbkb2.nQty,tbkb2.nPrice,tbkb2.nCost,tbkb2.cDesc2";
      $tabel = 'tbkb2';
      $tabel2 = 'mgood';
      $where = array(
                'tbkb2.cBKBNo' => $id2,
                'tbkb2.cGoodID' => $id
                );
      $join = "mgood.cGoodID = tbkb2.cGoodID";
      $data = $this->M_Transaksi->get_by_id_join2($select,$tabel,$where,$tabel2,$join);
      echo json_encode($data);
  }


public function ajax_update_tbkb2($id)
  {
      $this->_validate_detil_tbkb2();
      $tabel = "tbkb2";
      $cBKBNo = $this->uri->segment(4);
      $where = array('cBKBNo' =>$cBKBNo,
                     'cBarcode' => $id);
      $data = array(
              'nQty' => $this->input->post('demo0'),
          );
      $this->M_Transaksi->update($where, $data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete_tbkb2($id)
  {
      $tabel = "tbkb2";
      $cBKBNo = $this->uri->segment(4);
      $where = array(
                'cBKBNo' => $cBKBNo,
                'cStockID' => $id
                );
      $this->M_Transaksi->delete_by_id_array($where,$tabel);
      echo json_encode(array("status" => TRUE));
  }

// DATA STOCK
  public function ajax_list_stock()
  {
    //nNo,cBarcode, nQty, mgood.cGodDesc
      $list = $this->M_Transaksi->get_datatables_mstock();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cStockID;
          $row[] = $estudiante->cGoodDesc;
          $row[] = $estudiante->cUnit;
          $row[] = number_format($estudiante->nCurQty,0,',','.');
          $row[] = number_format($estudiante->nHpp,2,',','.');
          $row[] = number_format($estudiante->nSale,2,',','.');
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Transaksi->count_all_mstock(),
                      "recordsFiltered" => $this->M_Transaksi->count_filtered_mstock(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }

  public function ajax_cek_mstock($id,$id2,$id3)
  {
      $date = date("Y-m-01",strtotime($this->session->userdata('dStock')));
      $tabel = 'mstock';
      $data = $this->M_Transaksi->get_by_idA($tabel,array('cGoodID' => $id,'dStock' => $date,'cWhdID' => $id2,'nCurQty >=' => $id3));
      echo json_encode($data);
  }


  function ajax_update_upload($id)
  {
    $gambar = $this->input->post('Gambar');
    if(empty($_FILES['cGambar']['name'])){
      $tabel = "tbkb1";
      $data = array(
              // 'cGambar' => $data["file_name"],
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );

          $this->M_Transaksi->update(array('cBKBNo' =>$id), $data,$tabel);
    }
    else{
    if(isset($_FILES["cGambar"]["name"]))
    {
      $config['upload_path'] = './upload/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->load->library('upload', $config);
      if(!$this->upload->do_upload('cGambar'))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        if(file_exists($file=FCPATH.'/upload/'.$gambar)){
        unlink($file);
        }

        $data = $this->upload->data();
        $tabel = "tbkb1";
        $data = array(
              'cGambar' => $data["file_name"],
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );

          $this->M_Transaksi->update(array('cBKBNo' =>$id), $data,$tabel);
      }
    }

  }
  }


public function sum_pembelian($id)
  {
      $tabel = 'v_sum_bmb';
      $data = $this->M_Transaksi->get_by_id($id,$tabel,"cBMBNo");
      echo json_encode($data);
  }

public function sum_penjualan($id)
  {
      $tabel = 'v_sum_bkb';
      $data = $this->M_Transaksi->get_by_id($id,$tabel,"cBKBNo");
      echo json_encode($data);
  }


//==================================================================================================
  }












