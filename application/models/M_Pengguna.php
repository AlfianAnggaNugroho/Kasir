<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//buat class
class M_Pengguna extends CI_Model
{ 
	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	function login($table,$where)
	{	
		return $this->db->get_where('muser',$where);	
	}


	public function cek_user($data) {
			$query = $this->db->get_where('muser', $data);
			//$query = $this->db->query("SELECT cEmailID, count(cEmailID) AS countEmail FROM muser WHERE cEmailID = 'aldi' AND cPassword ='aldi123' GROUP BY cEmailID");
			return $query;
		}

	public function get_rows($table,$Order)
    {
        $this->db->from($table);
        $this->db->order_by($Order, 'ASC');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_rows_id($table,$where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

}
?>