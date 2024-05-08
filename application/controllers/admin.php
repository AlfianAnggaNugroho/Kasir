<?php
	
	//buat class contoller
	class admin extends CI_Controller
	{
		//function global
		function __construct()
		{
			parent::__construct();			
			//untuk integrasi file eksternal (css,js, etc.)			
			$this->load->helper(array('url','form'));
			$this->load->model('M_Pengguna','',TRUE);
			$this->load->model('M_Master');
    		$this->load->model('m_function','',TRUE);
    		$this->load->model('M_Transaksi');
    		date_default_timezone_set('Asia/Jakarta');
			//$this->load->model('m_function','',TRUE);
			//$this->load->database();
			$this->load->library(array('session','form_validation'));
			//$this->load->library('session');							
		}
		//buat method / fungsi
	
	function index()
	{
		$this->login();
	}	
	

	function login()
	{


		$tgl = date('Y-m-01');
		$data2 = $this->db->query("SELECT COUNT(dStock) AS jum FROM mstock WHERE dStock= '$tgl'");

		$total2 = 0;
      	foreach($data2->result()as $baris)
		{
			$total2 += $baris->jum;	
		}

		if($total2 == 0){
			$this->db->query("CALL proc_stok('$tgl','01')");
		}


		$txt_email = $this->input->post('txt_username');
		$txt_password = $this->input->post('txt_password');
		$btn_login = $this->input->post('btn_login');
		//deklarasi nilai awal "info"
		$data["info"]="";	
		//jika button login di klik 
		if(!empty($btn_login))
		{
				///jika ada komponen yg tdk diisi
				if(empty($txt_email)||empty($txt_password))
				{
					$data["info"]="Lengkapi Data!";
				}
				//jika komponen sudah diisi
				else
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
						$sess_data['nama_user'] = $sess->cName;
						
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
					

					redirect ('C_Master');	
					}
					else {
							$data["info"] = "Username / Password Tidak Ada !";
					}
					//==
				}
		}
		
		//tampilkan alamat index (view)
		$this->load->view('ils_login/ils_login',$data);
	}


	function logout() {
//        destroy session
        $this->session->sess_destroy();
        
//        redirect ke halaman login
        redirect('admin/login');
    }
	
	

	function login2()
	{
		$txt_email = $this->input->post('txt_username');
		$txt_password = $this->input->post('txt_password');
		$btn_login = $this->input->post('btn_login');
		//deklarasi nilai awal "info"
		$data["info"]="";	
		//jika button login di klik 
		if(!empty($btn_login))
		{
				///jika ada komponen yg tdk diisi
				if(empty($txt_email)||empty($txt_password))
				{
					$data["info"]="Lengkapi Data!";
				}
				//jika komponen sudah diisi
				else
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
					 	// $sess_data2['dStock'] = $sess->dStock;
					 	$sess_data2['cBranchDesc'] = $sess->cBranchDesc;
					 		
					 }
					 $this->session->set_userdata($sess_data2);
					

					redirect ('C_Home');	
					}
					else {
							$data["info"] = "Email / Password Tidak Ada !";
					}
					//==
				}
		}
		
		//tampilkan alamat index (view)
		$this->load->view('ils_login/ils_login2',$data);
	}


	function logout2() {
//        destroy session
        $this->session->sess_destroy();
        
//        redirect ke halaman login
        redirect('C_Pengguna/login2');
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
      $this->login_daftar($this->input->post('userName'),$this->input->post('cPassword'));
      echo json_encode(array("status" => TRUE));
  }


public function ajax_edit_user($id)
  {
      $tabel = 'mUser';
      $data = $this->M_Master->get_by_idA($tabel,array('cEmailID' =>$id));
      echo json_encode($data);
  }

function login_daftar($txt_email,$txt_password)
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




	

	}




?>