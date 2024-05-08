<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Master');
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
		$title = "TOKO SURYA MAJU";
    $data['info'] = 'Dashboard';
    $data['list'] = $this->M_Master->get_rows('mBranch','cBranchID');
    $data['list2'] = $this->M_Master->get_rows('v_dasboard','data_barang');
    $data['list3'] = $this->M_Master->get_rows('limit_stock','cGoodID');
     
    $data['penjualan'] = $this->db->get('g_penjualan')->row_array();
    $data['pembelian'] = $this->db->get('g_pembelian')->row_array();

    // $data['list2'] = $this->M_Master->get_rows('dasbor','cTotUser');
    
		$this->header($title);
   		$this->load->view('ils_konten/Home2',$data);    
    	$this->footer();
	}

	function menu()
  	{
   	$this->load->helper('url');
		$this->load->database();
		//desain web
		$title = "Data Menu";
		$data['tampil'] = $this->M_Master->detail_Single();	
		$this->header($title);
   	$this->load->view('ils_konten/Admin/ils_menu',$data);    
    $this->footer();
  	}

//====================================================================

  public function ajax_list_menu()
  {
      $list = $this->M_Master->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cMenuID;
          $row[] = $estudiante->cMenuDesc;
          $row[] = $estudiante->cUserID;
          //add html for action
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_menu('."'".$estudiante->cMenuID."'".')"><i class="icon_pencil"></i> Edit</a>
                <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_menu('."'".$estudiante->cMenuID."'".')"><i class="icon_trash_alt"></i> Delete</a>';
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Master->count_all(),
                      "recordsFiltered" => $this->M_Master->count_filtered(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }

  
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
 //=========================================================================================
  //CONTROL USER
 //=========================================================================================
  function user()
    {
    $this->load->helper('url');
    $this->load->database();
    $data['list'] = $this->M_Master->get_rows('mUserGrp1','cUserGrpID');
    $data['list2'] = $this->M_Master->get_rows('mBranch','cBranchID');
    //desain web
    $title = "Data User";
    $this->header($title);
      $this->load->view('ils_konten/Admin/ils_user',$data);    
      $this->footer();
    }

public function ajax_list_user()
  {
      $list = $this->M_Master->get_datatables_user();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $user_list) {
        if($user_list->cUserGrpID!='02'){
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $user_list->cEmailID;
          $row[] = md5($user_list->cPassword);
          $row[] = $user_list->cName;
          $row[] = $user_list->cUserGrpDesc;
          //add html for action
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_user('."'".$user_list->cEmailID."'".')"><i class="icon_pencil"></i> Edit</a>
                <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_user('."'".$user_list->cEmailID."'".')"><i class="icon_trash_alt"></i> Delete</a>';
          $data[] = $row;
        }
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Master->count_all_user(),
                      "recordsFiltered" => $this->M_Master->count_filtered_user(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }

  public function ajax_add_user()
  {
      $this->_validate_user();
      $tabel = "mUser";
      $data = array(
              'cEmailID' => $this->input->post('cEmailID'),
              'cPassword' => $this->input->post('cPassword'),
              'cName' => strtoupper($this->input->post('cName')),
              'cUserGrpID' =>$this->input->post('cUserGrpID'),
              'cBranchID' =>$this->input->post('cBranchID'),
          );
      $insert = $this->M_Master->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

public function ajax_edit_user($id)
  {
      $tabel = 'mUser';
      $data = $this->M_Master->get_by_id($id,$tabel,"cEmailID");
      echo json_encode($data);
  }

public function ajax_update_user($id)
  {
      $this->_validate_user();
      $tabel = "mUser";
      $data = array(
              'cEmailID' => $this->input->post('cEmailID'),
              'cPassword' => $this->input->post('cPassword'),
              'cName' => strtoupper($this->input->post('cName')),
              'cUserGrpID' =>$this->input->post('cUserGrpID'),
              'cBranchID' =>$this->input->post('cBranchID'),
          );
      $this->M_Master->update(array('cEmailID' =>$id), $data,$tabel);
      echo json_encode(array("status" => TRUE));
  }



 public function ajax_delete_user($id)
  {
      $tabel = "mUser";
      $this->M_Master->delete_by_id($id,$tabel,'cEmailID');
      echo json_encode(array("status" => TRUE));
  }


  private function _validate_user()
  {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('cEmailID') == '')
      {
          $data['inputerror'][] = 'cEmailID';
          $data['error_string'][] = 'Mohon Isi Email';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cPassword') == '')
      {
          $data['inputerror'][] = 'cPassword';
          $data['error_string'][] = 'Masukan Password';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cName') == '')
      {
          $data['inputerror'][] = 'cName';
          $data['error_string'][] = 'Masukan Nama';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cUserGrpID') == '')
      {
          $data['inputerror'][] = 'cUserGrpID';
          $data['error_string'][] = 'Masukan Group User';
          $data['status'] = FALSE;
      }else{
      }
      
      if($this->input->post('cBranchID') == '')
      {
          $data['inputerror'][] = 'cBranchID';
          $data['error_string'][] = 'Masukan Perusahaan';
          $data['status'] = FALSE;
      }else{
      }
      if($data['status'] === FALSE)
      {
          echo json_encode($data);
          exit();
      }
  }
 //=========================================================================================
  //SELESAI CONTROL USER
 //=========================================================================================


//=========================================================================================
  //CONTROL Group USER
 //=========================================================================================
function Group_user()
    {
    $this->load->helper('url');
    $this->load->database();
    $data['list'] = "";
   // $data['list2'] = $this->M_Master->get_rows('mBranch','cBranchID');
    //desain web
    $title = "Data Group User";
    $this->header($title);
    $this->load->view('ils_konten/Admin/ils_Grp_user',$data);    
    $this->footer();
    }

public function ajax_list_Grp_user()
  {
      $list = $this->M_Master->get_datatables_userGrp();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $user_list) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $user_list->cUserGrpID;
          $row[] = $user_list->cUserGrpDesc;
          //add html for action
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_userGrp1('."'".$user_list->cUserGrpID."'".')"><i class="icon_pencil"></i> Edit</a>
                <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_UserGrp1('."'".$user_list->cUserGrpID."'".')"><i class="icon_trash_alt"></i> Delete</a>';
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Master->count_all_userGrp(),
                      "recordsFiltered" => $this->M_Master->count_filtered_userGrp(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }

//DETI MENU CUSER GROUP2
public function ajax_list_menu2()
  {
      //$this->M_Master-> _get_datatables_query_userGrp2('01');
      $list = $this->M_Master->get_datatables_by_ID();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cMenuID;
          $row[] = $estudiante->cMenuDesc;
          //add html for action
          $row[] = '<div style="text-align: center;"><a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_UserGrp2('."'".$estudiante->cMenuID."'".')"><i class="icon_trash_alt"></i> Delete</a> </div>';
          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => "",
                      "recordsFiltered" => "",
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }


public function ajax_add_userGrp1()
  {
      $this->_validate_userGrp1();
      $tabel = "mUserGrp1";
      $data = array(
              'cUserGrpID' => $this->input->post('cUserGrpID'),
              'cUserGrpDesc' => $this->input->post('cUserGrpDesc'),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $insert = $this->M_Master->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

public function ajax_update_userGrp1($id)
  {
      $this->_validate_userGrp1();
      $tabel = "mUserGrp1";
      $data = array(
              'cUserGrpID' => $this->input->post('cUserGrpID'),
              'cUserGrpDesc' => $this->input->post('cUserGrpDesc'),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $this->M_Master->update(array('cUserGrpID' =>$id), $data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

public function ajax_add_userGrp2()
  {
     $this->_validate_userGrp1();
      $tabel = "mUserGrp2";
      $data = array(
              'cUserGrpID' => $this->input->post('cUserGrpID'),
              'cMenuID' => $this->input->post('cMenuID'),
              'cLevel' => "Y",
          );
      $insert = $this->M_Master->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete_UserGrp1($id)
  {
      $tabel = "mUserGrp1";
      $this->M_Master->delete_by_id($id,$tabel,'cUserGrpID');
      echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete_UserGrp2($id)
  {
      $tabel = "mUserGrp2";
      $cUserGrpID = $this->uri->segment(4);



      $this->M_Master->delete_by_id_array(array('cUserGrpID' => $cUserGrpID,'cMenuID' => $id ),$tabel);
      echo json_encode(array("status" => TRUE));
  }

  public function ajax_edit_userGrp1($id)
  {
      $tabel = 'mUserGrp1';
      $data = $this->M_Master->get_by_id($id,$tabel,"cUserGrpID");
      echo json_encode($data);
  }


//---------------------------------------------------------------------------------
private function _validate_userGrp1()
  {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('cUserGrpID') == '')
      {
          $data['inputerror'][] = 'cUserGrpID';
          $data['error_string'][] = 'Mohon Isi Kode Group User';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cUserGrpDesc') == '')
      {
          $data['inputerror'][] = 'cUserGrpDesc';
          $data['error_string'][] = 'Masukan Nama Group User';
          $data['status'] = FALSE;
      }else{
      }

      if($data['status'] === FALSE)
      {
          echo json_encode($data);
          exit();
      }
  }

  //=========================================================================================
  //SELESAI CONTROL Group USER
 //=========================================================================================

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
              'cUserGrpID' =>'02',
              'cBranchID' =>'01',
          );
      $this->M_Master->update(array('cEmailID' =>$this->input->post('userName')), $data,$tabel);
       echo "<script> alert('Data Berhasil Diubah') </script>";
      $this->user_profil($this->input->post('userName'));
      // echo json_encode(array("status" => TRUE));
  }


public function profil()
  {
    $this->load->helper('url');
    $this->load->database();
    //desain web
      $title = "DATA PERUSAHAAN";
      $data['list'] = $this->M_Master->get_rows('mBranch','cBranchID');
      $this->header($title);
      $this->load->view('ils_konten/perusahaan',$data);    
      $this->footer();
  }

  public function ajax_update_company()
  {
    //  $this->_validate_user();
      $tabel = "mBranch";
      $data = array(
              // 'cBranchID' => $this->input->post('userName'),
              // 'cPassword' => $this->input->post('cPassword'),
              'cBranchDesc' => strtoupper($this->input->post('cName')),
              'cBranchADDR' => strtoupper($this->input->post('cAddress')),
              'cPhone' => strtoupper($this->input->post('cPhone')),
              'cHP' => strtoupper($this->input->post('cHP')),
              'cDesc' => $this->input->post('editor1'),
              'cMap' => $this->input->post('cMap'),  
          );
      $this->M_Master->update(array('cBranchID' =>'01'), $data,$tabel);
       echo "<script> alert('Data Berhasil Diubah') </script>";
      $this->profil();
      // echo json_encode(array("status" => TRUE)); TOKO SURYA MAJU
  }
// =======================================================================================================


 //======================================GRP BARANG===================================================
  function grp_barang()
    {
    $this->load->helper('url');
    $this->load->database();
    //desain web
    $title = "Data Group Barang";
   // $data['tampil'] = $this->M_Master->detail_Single(); 
    $this->header($title);
      $this->load->view('ils_konten/Master/ils_grp_barang');    
      $this->footer();
    }

  public function ajax_list_grp_barang()
  {
    //cGoodGrpID``cGoodGrpDesc`
      $list = $this->M_Master->get_datatables_mgoodgrp();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cGoodGrpID;
          $row[] = $estudiante->cGoodGrpDesc;
          //add html for action
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_goodgrp('."'".$estudiante->cGoodGrpID."'".')"><i class="icon_pencil"></i> Edit</a>
                <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_goodgrp('."'".$estudiante->cGoodGrpID."'".')"><i class="icon_trash_alt"></i> Delete</a>';
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Master->count_all_mgoodgrp(),
                      "recordsFiltered" => $this->M_Master->count_filtered_mgoodgrp(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }

  public function ajax_delete_mgoodgrp($id)
  {
      $tabel = "mgoodgrp";
      $this->M_Master->delete_by_id($id,$tabel,'cGoodGrpID');
      echo json_encode(array("status" => TRUE));
  }

  public function ajax_edit_mgoodgrp($id)
  {
      $tabel = 'mgoodgrp';
      $data = $this->M_Master->get_by_id($id,$tabel,'cGoodGrpID');
      echo json_encode($data);
  }

  public function ajax_add_mgoodgrp()
  {
      $this->_validate_grpBarang();
      $tabel = "mgoodgrp";
      $data = array(
              'cGoodGrpID' => $this->input->post('cGoodGrpID'),
              'cGoodGrpDesc' => strtoupper($this->input->post('cGoodGrpDesc')),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $insert = $this->M_Master->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

  public function ajax_update_mgoodgrp($id)
  {
      $this->_validate_grpBarang();
      $tabel = "mgoodgrp";
      $data = array(
              'cGoodGrpID' => $this->input->post('cGoodGrpID'),
              'cGoodGrpDesc' => strtoupper($this->input->post('cGoodGrpDesc')),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $this->M_Master->update(array('cGoodGrpID' =>$id), $data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

  private function _validate_grpBarang()
  {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('cGoodGrpID') == '')
      {
          $data['inputerror'][] = 'cGoodGrpID';
          $data['error_string'][] = 'Mohon Isi Kode';
          $data['status'] = FALSE;
      }else{

        if(!$this->_validate_number($this->input->post('cGoodGrpID')))
        {
          $data['inputerror'][] = 'cGoodGrpID';
          $data['error_string'][] = 'Jenis Number(1-10)';
          $data['status'] = FALSE;
        }
      }

      if($this->input->post('cGoodGrpDesc') == '')
      {
          $data['inputerror'][] = 'cGoodGrpDesc';
          $data['error_string'][] = 'Masukan Nama Group';
          $data['status'] = FALSE;
      }

      if($data['status'] === FALSE)
      {
          echo json_encode($data);
          exit();
      }
  }

 function barang()
    {
    $this->load->helper('url');
    $this->load->database();
    $data['list'] = $this->M_Master->get_rows('mGoodGrp','cGoodGrpID');
    //desain web
    $title = "Data Barang";
    $this->header($title);
      $this->load->view('ils_konten/Master/ils_barang',$data);    
      $this->footer();
    }

  public function ajax_list_barang()
  {
    //cGoodGrpID``cGoodGrpDesc`
      $list = $this->M_Master->get_datatables_mgood();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cGoodID;
          $row[] = $estudiante->cGoodDesc;
          $row[] = $estudiante->cUnit;
          $row[] = $estudiante->cGoodGrpDesc;
          // $row[] = '<img src="'.base_url().'upload/produk/'.$estudiante->cFoto.'" width="300" height="225" class="img-thumbnail" />';
          //add html for action
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_good('."'".$estudiante->cGoodID."'".')"><i class="icon_pencil"></i> Edit</a>
                <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_good('."'".$estudiante->cGoodID."'".')"><i class="icon_trash_alt"></i> Delete</a>';
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Master->count_all_mgood(),
                      "recordsFiltered" => $this->M_Master->count_filtered_mgood(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }


function ajax_upload()
  {
    $this->load->helper('url');
    $this->load->database();

    if(isset($_FILES["cFoto"]["name"]))
    {
      $config['upload_path'] = './upload/produk/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->load->library('upload', $config);
      if(!$this->upload->do_upload('cFoto'))
      {
        // echo $this->upload->display_errors();
        $tabel = "mgood";
        $data = array(
              'cGoodID' => $this->input->post('cGoodID'),
              'cGoodDesc' => strtoupper($this->input->post('cGoodDesc')),
              'cUnit' => strtoupper($this->input->post('cUnit')),
              'cGoodGrpID' => $this->input->post('cGoodGrpID'),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5)),
              // 'cFoto' => $data["file_name"],
              'cDesc' => strtoupper($this->input->post('cDesc'))
          );
        $insert = $this->M_Master->save($data,$tabel);

      }
      else
      {
        $data = $this->upload->data();
        $tabel = "mgood";
        $data = array(
              'cGoodID' => $this->input->post('cGoodID'),
              'cGoodDesc' => strtoupper($this->input->post('cGoodDesc')),
              'cUnit' => strtoupper($this->input->post('cUnit')),
              'cGoodGrpID' => $this->input->post('cGoodGrpID'),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5)),
              // 'cFoto' => $data["file_name"],
              'cDesc' => strtoupper($this->input->post('cDesc'))
          );
        $insert = $this->M_Master->save($data,$tabel);
      }
    }
  }

  public function ajax_delete_mgood($id)
  {
      $this->load->helper('file');
      //delete_files(base_url("uploads/".$id2));
      $tabel = "mgood";
      $delete = $this->M_Master->delete_by_id2($id,$tabel,'cGoodID');
      echo json_encode(array("status" => TRUE));
  }

 public function ajax_edit_mgood($id)
  {
      $tabel = 'mgood';
      $data = $this->M_Master->get_by_id($id,$tabel,'cGoodID');
      echo json_encode($data);
  }

  function ajax_update_mgood($id)
  {
    $gambar = $this->input->post('Gambar');
    if(empty($_FILES['cFoto']['name'])){
      $tabel = "mgood";
      $data = array(
              'cGoodID' => $this->input->post('cGoodID'),
              'cGoodDesc' => strtoupper($this->input->post('cGoodDesc')),
              'cUnit' => strtoupper($this->input->post('cUnit')),
              'cGoodGrpID' => $this->input->post('cGoodGrpID'),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5)),
              'cDesc' => strtoupper($this->input->post('cDesc')),
          );
       $this->M_Master->update(array('cGoodID' =>$id), $data,$tabel);
    }
    else{
    if(isset($_FILES["cFoto"]["name"]))
    {
      $config['upload_path'] = './upload/produk/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->load->library('upload', $config);
      if(!$this->upload->do_upload('cFoto'))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        if(file_exists($file=FCPATH.'/upload/'.$gambar)){
        unlink($file);
        }

        $data = $this->upload->data();
        $tabel = "mgood";
        $data = array(
              'cGoodID' => $this->input->post('cGoodID'),
              'cGoodDesc' => strtoupper($this->input->post('cGoodDesc')),
              'cUnit' => strtoupper($this->input->post('cUnit')),
              'cGoodGrpID' => $this->input->post('cGoodGrpID'),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5)),
              'cFoto' => $data["file_name"],
              'cDesc' => strtoupper($this->input->post('cDesc')),
          );
       $this->M_Master->update(array('cGoodID' =>$id), $data,$tabel);
      }
    }

  }
  }


//---------------------------------------------------------------------------------
private function _validate_good()
  {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('cGoodID') == '')
      {
          $data['inputerror'][] = 'cGoodID';
          $data['error_string'][] = 'Mohon Isi Kode';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cGoodDesc') == '')
      {
          $data['inputerror'][] = 'cGoodDesc';
          $data['error_string'][] = 'Masukan Nama Barang';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cUnit') == '')
      {
          $data['inputerror'][] = 'cUnit';
          $data['error_string'][] = 'Masukan Satuan Barang';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('nMin') == '')
      {
          $data['inputerror'][] = 'nMin';
          $data['error_string'][] = 'Masukan Minimum Barang';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('nMax') == '')
      {
          $data['inputerror'][] = 'nMax';
          $data['error_string'][] = 'Masukan Maximum Barang';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cGoodGrpID') == '')
      {
          $data['inputerror'][] = 'cGoodGrpID';
          $data['error_string'][] = 'Masukan Group Barang';
          $data['status'] = FALSE;
      }else{
      }

      if($data['status'] === FALSE)
      {
          echo json_encode($data);
          exit();
      }
  }

  function Supplier()
    {
    $this->load->helper('url');
    $this->load->database();
    $data['list'] = $this->M_Master->get_rows('mGoodGrp','cGoodGrpID');
    //desain web
    $title = "Data Supplier";
    $this->header($title);
      $this->load->view('ils_konten/Master/ils_supplier',$data);    
      $this->footer();
    }

public function ajax_list_supplier()
  {
    //'cSupID','cSupDesc','cAddress','cPhone','cHP','cFax'
      $list = $this->M_Master->get_datatables_msupplier();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $estudiante->cSupID;
          $row[] = $estudiante->cSupDesc;
          $row[] = $estudiante->cAddress;
          $row[] = $estudiante->cPhone;
          $row[] = $estudiante->cHP;          
          $row[] = $estudiante->cFax;
          //add html for action
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_sup('."'".$estudiante->cSupID."'".')"><i class="icon_pencil"></i> Edit</a>
                <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_sup('."'".$estudiante->cSupID."'".')"><i class="icon_trash_alt"></i> Delete</a>';
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Master->count_filtered_msupplier(),
                      "recordsFiltered" => $this->M_Master->count_all_msupplier(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }

  public function ajax_edit_msupplier($id)
  {
      $tabel = 'msupplier';
      $data = $this->M_Master->get_by_id($id,$tabel,'cSupID');
      echo json_encode($data);
  }

  public function ajax_delete_msupplier($id)
  {
      $tabel = "msupplier";
      $this->M_Master->delete_by_id($id,$tabel,'cSupID');
      echo json_encode(array("status" => TRUE));
  }

  public function ajax_add_msupplier()
  {
      $this->_validate_msupplier();
      $tabel = "msupplier";
      $data = array(
              'cSupID' => $this->input->post('cSupID'),
              'cSupDesc' => strtoupper($this->input->post('cSupDesc')),
              'cAddress' => strtoupper($this->input->post('cAddress')),
              'cPhone' => strtoupper($this->input->post('cPhone')),
              'cHP' => strtoupper($this->input->post('cHP')),
              'cFax' => strtoupper($this->input->post('cFax')),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $insert = $this->M_Master->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

public function ajax_update_msupplier($id)
  {
      $this->_validate_msupplier();
      $tabel = "msupplier";
      $data = array(
              'cSupID' => $this->input->post('cSupID'),
              'cSupDesc' => strtoupper($this->input->post('cSupDesc')),
              'cAddress' => strtoupper($this->input->post('cAddress')),
              'cPhone' => strtoupper($this->input->post('cPhone')),
              'cHP' => strtoupper($this->input->post('cHP')),
              'cFax' => strtoupper($this->input->post('cFax')),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $this->M_Master->update(array('cSupID' =>$id), $data,$tabel);
      echo json_encode(array("status" => TRUE));
  }


  //---------------------------------------------------------------------------------
private function _validate_msupplier()
  {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('cSupID') == '')
      {
          $data['inputerror'][] = 'cSupID';
          $data['error_string'][] = 'Mohon Isi Kode';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cSupDesc') == '')
      {
          $data['inputerror'][] = 'cSupDesc';
          $data['error_string'][] = 'Masukan Nama Supplier';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cAddress') == '')
      {
          $data['inputerror'][] = 'cAddress';
          $data['error_string'][] = 'Masukan Alamat';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cPhone') == '')
      {
          $data['inputerror'][] = 'cPhone';
          $data['error_string'][] = 'Masukan Telepone';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cHP') == '')
      {
          $data['inputerror'][] = 'cHP';
          $data['error_string'][] = 'Masukan No HP';
          $data['status'] = FALSE;
      }else{
      }

      if($this->input->post('cFax') == '')
      {
          $data['inputerror'][] = 'cFax';
          $data['error_string'][] = 'Masukan No Fax';
          $data['status'] = FALSE;
      }else{
      }

      if($data['status'] === FALSE)
      {
          echo json_encode($data);
          exit();
      }
  }

  function stock()
    {
    $this->load->helper('url');
    $this->load->database();
    $data['list2'] = $this->M_Master->get_rows('mgood','cGoodID');

    //desain web
    $title = "Data Stock";
    $this->header($title);
      $this->load->view('ils_konten/Master/ils_stock',$data);    
      $this->footer();
    }

  public function ajax_list_stock()
  {
    //array('dStock','mstock.cGoodID','mgood.cGoodDesc','nBegQty','nBegCost','nCurQty','nCurQty');
      $list = $this->M_Master->get_datatables_mstock();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $estudiante) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = date("M Y",strtotime($estudiante->dStock));
          $row[] = $estudiante->cGoodID;
          $row[] = $estudiante->cGoodDesc;      
          $row[] = $estudiante->nCurQty;
      $Qty = substr($estudiante->average,-2,2);
      if ($Qty == '00')
      { 
          $row[] = number_format($estudiante->average,0,',','.');
      }
      else{
          $row[] = number_format($estudiante->average,0,',','.');
      }
          $row[] = number_format($estudiante->nCurCost,0,',','.');
          //add html for action
          $row[] = number_format($estudiante->nSale,0,',','.');
          $data[] = $row;
      }
      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_Master->count_filtered_mstock(),
                      "recordsFiltered" => $this->M_Master->count_all_mstock(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
  }


public function ajax_add_mstock()
  {
      $tabel = "mstock";
      $data = array(
              'dStock'  => date('Y-m-01'),
              'cStockID' => 'STCK'.$this->input->post('cGoodID'),
              'cGoodID' => $this->input->post('cGoodID'),
              'nCurQty' => $this->input->post('nCurQty'),
              'nCurCost' => strtoupper($this->input->post('nCurCost')),
              'nSale' => strtoupper($this->input->post('nSale')),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $insert = $this->M_Master->save($data,$tabel);
      echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete_mstock($id,$id2)
  {
      $tabel = "mstock";
      $this->M_Master->delete_by_id_array(array('dStock' =>$id,'cGoodID'=>$id2),$tabel);
      echo json_encode(array("status" => TRUE));
  }
  //AMBIL DATA mInvmstock
  public function ajax_edit_mstock($id,$id2)
  {
      $tabel = 'v_mstock2';
      $data = $this->M_Master->get_by_id2(array('cGoodID'=>$id2),$tabel);
      echo json_encode($data);
  }

  public function ajax_edit_mstock2($id)
  {
      $tabel = 'mstock';
      $data = $this->M_Master->get_by_id($id,$tabel,'cGoodID');
      echo json_encode($data);
  }


  public function ajax_update_mstock($id)
  {
      // $this->_validate();
      $tabel = "mstock";
      $data = array(
              // 'dStock'  => date('Y-m-01'),
              'cStockID' => 'STCK'.$this->input->post('cGoodID'),
              'cGoodID' => $this->input->post('cGoodID'),
              'nCurQty' => $this->input->post('nCurQty'),
              'nCurCost' => strtoupper($this->input->post('nCurCost')),
              'nSale' => strtoupper($this->input->post('nSale')),
              'cUserID' => strtoupper(substr($this->session->userdata('username'),0,5))
          );
      $this->M_Master->update(array('cGoodID' =>$id,'dStock'=>$this->input->post('dStock')), $data,$tabel);
      echo json_encode(array("status" => TRUE));
  }





function analisa()
    {
    $this->load->helper('url');
    $this->load->database();
    // $data['list'] = "";
    $data['list'] = $this->M_Master->get_rows2('v_analisa_penjualan','cStockID');
    //desain web
    $title = "Tingkat Penjualan";
    $this->header($title);
    $this->load->view('penjualan',$data);    
    $this->footer();
    }


 function grafik()
    {
    $this->load->helper('url');
    $this->load->database();
    // $data['list'] = "";
    $data['list'] = $this->M_Master->get_rows('v_st_jual','cStockID');
    //desain web
    $title = "Grafik";
    $this->header($title);
    $this->load->view('grafik',$data);    
    $this->footer();
    }

  public function grafik2($id,$id2)
  {
    $id = substr($id,-4);
      //$tabel = 'mUserGrp1';
     $data = $this->M_Master->grafik($id,$id2);
      //$data = $this->db->query("CALL grafik('2019')");
      echo json_encode($data);
  }
// ===================================================================================
  public function aboutme()
  {
    $this->load->helper('url');
    $this->load->database();
    //desain web
    $title = "TOKO SURYA MAJU";
    $data['info'] = 'About Me';
    
    $this->header($title);
      $this->load->view('ils_konten/aboutme',$data);    
      $this->footer();
  }


//===================================================================================

  }












