<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Laporan');
    	$this->load->model('m_function','',TRUE);
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
    	date_default_timezone_set('Asia/Jakarta');
    // jika belum login redirect ke login
            if ($this->session->userdata('logged_in') =="") {
                redirect('C_Pengguna/login');
            }
	}

	public function get_by_id($tabel,$where)
    {
        $this->db->from($tabel);
        $this->db->where($where);
        $query = $this->db->get();

        return $query;
    }

	public function get_by_id_join2($select,$tabel,$where,$tabel2,$join)
    {   $this->db->select($select);
        $this->db->from($tabel);
        $this->db->join($tabel2,$join);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id_join3($select,$tabel,$where,$tabel2,$join,$tabel3,$join2)
    {   $this->db->select($select);
        $this->db->from($tabel);
        $this->db->join($tabel2,$join);
        $this->db->join($tabel3, $join2);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }


    public function get_by_id_join4($tabel1,$table2,$table3,$table4,$where,$join,$join2,$join3)
    {
        $this->db->from($tabel1);
        $this->db->join($table2, $join);
        $this->db->join($table3, $join2);
        $this->db->join($table4, $join3);
        $this->db->where($where);
        $query = $this->db->get();

        return $query;
    }


}
