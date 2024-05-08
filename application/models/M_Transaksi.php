<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transaksi extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

// =======================================================================================
    public function get_by_id($id,$tabel,$cID)
    {
        $this->db->from($tabel);
        $this->db->where($cID,$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_id_R($id,$tabel,$cID)
    {
        $this->db->from($tabel);
        $this->db->where($cID,$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_id2($tabel,$where)
    {
        $this->db->from($tabel);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_idA($tabel,$where)
    {
        $this->db->from($tabel);
        $this->db->where($where);
        $query = $this->db->get();
        $query2 = $this->db->query("SELECT '0' AS cGoodID");
        $cek = count($query->result());
        if($cek != 0){
        return $query->row();
        }
        else{
            return $query2->row();
        }
    }

    public function get_by_idB($tabel,$where)
    {
        $this->db->from($tabel);
        $this->db->join('v_adm1','v_adm1.cAdmNo = v_adm12.cAdmNo');
        $this->db->where($where);
        $query = $this->db->get();
        $query2 = $this->db->query("SELECT '0' AS cGoodID");
        $cek = count($query->result());
        if($cek != 0){
        return $query->row();
        }
        else{
            return $query2->row();
        }
    }

     public function get_by_Sum_detil($id,$tabel,$cID)
    {
        $this->db->select("SUM(nQty) AS tot");
        $this->db->from($tabel);
        $this->db->where($cID,$id);
        $query = $this->db->get();

        return $query->row();
    }


    public function get_by_id_join2($select,$tabel,$where,$tabel2,$join)
    {   $this->db->select($select);
        $this->db->from($tabel);
        $this->db->join($tabel2,$join);
        $this->db->where($where);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_by_id_join3($select,$tabel,$where,$tabel2,$join,$tabel3,$join2)
    {   $this->db->select($select);
        $this->db->from($tabel);
        $this->db->join($tabel2,$join);
        $this->db->join($tabel3, $join2);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_id_join4($tabel1,$table2,$table3,$table4,$where,$join,$join2,$join3)
    {
        $this->db->from($tabel1);
        $this->db->join($table2, $join);
        $this->db->join($table3, $join2);
        $this->db->join($table4, $join3);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_id_join1($id,$tabel,$cID,$con1,$con2)
    {
        //'mSubled','cAccGLNo'
        $this->db->from($tabel);
        $this->db->join('mSubled', 'mFPGoods.cAccGLNo = mSubled.cAccGLNo');
        $this->db->where($cID,$id);
        $query = $this->db->get();

        return $query->row();
    }
    
    public function save($data,$tabel)
    {
        $this->db->insert($tabel,$data);
        return $this->db->insert_id();
    }

    public function update($where, $data, $tabel)
    {
        $this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id,$tabel,$cID)
    {
        $this->db->where($cID, $id);
        $this->db->delete($tabel);
    }

    public function delete_by_id_array($where,$tabel)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    public function get_rows($table,$Order)
    {
        $this->db->from($table);
        $this->db->order_by($Order, 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_rowsAsc($table,$Order)
    {
        $this->db->from($table);
        $this->db->order_by($Order, 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_nomor2($table,$Order)
    {
        $date = date("Y-m-d");
        $year = substr($date,0,4);
        $month = substr($date,5,2);

        $this->db->from($table);
        $this->db->order_by($Order, 'DESC');
        //$this->db->where($where);
        $this->db->where('YEAR(dTrx)', $year);
        $this->db->where('MONTH(dTrx)',$month);
        $this->db->limit(1); 
        $query = $this->db->get();
        return $query->row();
    }

    public function nomor_bmb(){
        $date = date("Y-m-d");
        $no = $this->db->query("SELECT '0000000000' AS cBMBNo, '$date' AS dTrx");
        return $no->row();
    }

    public function nomor_bkb(){
        $date = date("Y-m-d");
        $no = $this->db->query("SELECT '0000000000' AS cBKBNo, '$date' AS dTrx");
        return $no->row();
    }


    public function get_nomor3($table,$Order)
    {
        $date = date("Y-m-d");
        $year = substr($date,0,4);
        $month = substr($date,5,2);
        $where = array('YEAR(dTrx)' => $year,
                     'MONTH(dTrx)'=>$month);
        $query = $this->db->get_where($table, $where);
       return $query;
    }


    public function get_rows_join($table1,$table2,$join,$Order)
    {
        $this->db->from($table1);
        $this->db->join($table2, $join);
        $this->db->order_by($Order, 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

	function detail_Single(){
  		$result = $this->db->get('mMenu');
  		return $result;
  	}

    function getDataDetil($table, $condition)
    {
        $this->db->where($condition); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by('nNo','asc');
        return $this->db->get();
    }

     function getDataDetil2($table, $condition)
    {
        $this->db->where($condition); 
        $this->db->select("*");
        $this->db->from($table);
        return $this->db->get();
    }
// =====================================================================================================
    var $table_tbmb = 'tbmb1';
    var $column_tbmb = array('cBMBNo','dTrx','msupplier.cSupDesc','cDesc','cClose'); //set column field database for order and search
    var $order_tbmb = array('cBMBNo' => 'desc'); // default order

    private function _get_datatables_query()
    {
        $date = date("Y-m-d");
        if ($this->input->post('dDisplay1') and $this->input->post('dDisplay2')) {
            $dDisplay1 =  $this->m_function->konv_tgl($this->input->post('dDisplay1'));
            $dDisplay2 =  $this->m_function->konv_tgl($this->input->post('dDisplay2'));

            $array = array('DATE_FORMAT(dTrx,"%Y-%m-%d") >=' => $dDisplay1, 'DATE_FORMAT(dTrx,"%Y-%m-%d") <=' => $dDisplay2);
            $this->db->where($array); //$this->input->post('cTahun')
        }else{
             $this->db->where('DATE_FORMAT(dTrx,"%Y-%m-%d")', $date);
        }
      $this->db->select('cBMBNo,dTrx,msupplier.cSupDesc,cDesc,cClose');
      $this->db->from('tbmb1');
      $this->db->join('msupplier','msupplier.cSupID = tbmb1.cSupID');    

        $i = 0;
        foreach ($this->column_tbmb as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_tbmb) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_tbmb))
        {
            $order = $this->order_tbmb;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return count($query->result());
    }

    public function count_all()
    {
        $this->db->from($this->table_tbmb);
        return $this->db->count_all_results();
    }

    var $table_tbmb2 = 'tbmb2';
    var $column_tbmb2 = array('tbmb2.cBMBNo','tbmb2.nNo','tbmb2.cGoodID','mgood.cGoodDesc','mgood.cUnit','tbmb2.nQty','tbmb2.nPrice','tbmb2.nCost'); //set column field database for order and search
    var $order_tbmb2 = array('tbmb2.cBMBNo' => 'desc'); // default order

    private function _get_datatables_query_tbmb2()
    {
        if ($this->input->post('cBMBNo') != "") {
             $this->db->where('tbmb2.cBMBNo', $this->input->post('cBMBNo'));
        }else{
             $this->db->where('tbmb2.cBMBNo', '');
        }
      $this->db->select('tbmb2.cBMBNo,tbmb2.nNo,tbmb2.cGoodID,mgood.cGoodDesc,mgood.cUnit,tbmb2.nQty,tbmb2.nPrice,tbmb2.nCost');
      $this->db->from('tbmb2');
      $this->db->join('mgood','mgood.cGoodID = tbmb2.cGoodID');   
     


        $i = 0;
        foreach ($this->column_tbmb2 as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_tbmb2) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_tbmb2))
        {
            $order = $this->order_tbmb2;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_tbmb2()
    {
        $this->_get_datatables_query_tbmb2();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_tbmb2()
    {
        $this->_get_datatables_query_tbmb2();
        $query = $this->db->get();
        return count($query->result());
    }

    public function count_all_tbmb2()
    {
        $this->db->from($this->table_tbmb2);
        return $this->db->count_all_results();
    }




    // ==========================BKB==================================================
    var $table_tbkb = 'tbkb1';
    var $column_tbkb = array('tbkb1.cBKBNo','dTrx','cDesc','cClose'); //set column field database for order and search
    var $order_tbkb = array('tbkb1.cBKBNo' => 'desc'); // default order

    private function _get_datatables_query_tbkb1()
    {
        $date = date("Y-m-d");
        if ($this->input->post('dDisplay1') and $this->input->post('dDisplay2')) {
            $dDisplay1 =  $this->m_function->konv_tgl($this->input->post('dDisplay1'));
            $dDisplay2 =  $this->m_function->konv_tgl($this->input->post('dDisplay2'));

            $array = array('DATE_FORMAT(dTrx,"%Y-%m-%d") >=' => $dDisplay1, 'DATE_FORMAT(dTrx,"%Y-%m-%d") <=' => $dDisplay2);
            $this->db->where($array); //$this->input->post('cTahun')
        }else{
             $this->db->where('DATE_FORMAT(dTrx,"%Y-%m-%d")', $date);
        }
      $this->db->select('tbkb1.cBKBNo,dTrx,cDesc,cClose,muser.cName,tbkb1.cStatus,tbkb1.cBayar,cGambar,cBayar');
      $this->db->from('tbkb1');
      $this->db->join('muser','muser.cEmailID = tbkb1.cKonID'); 

      $user =$this->session->userdata('cUserGrpID');
          if($user == "02"){
            $this->db->where('cKonID', $this->session->userdata('username'));
          }


        $i = 0;
        foreach ($this->column_tbkb as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_tbkb) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_tbkb))
        {
            $order = $this->order_tbkb;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_tbkb1()
    {
        $this->_get_datatables_query_tbkb1();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_tbkb1()
    {
        $this->_get_datatables_query_tbkb1();
        $query = $this->db->get();
        return count($query->result());
    }

    public function count_all_tbkb1()
    {
        $this->db->from($this->table_tbkb);
        return $this->db->count_all_results();
    }

    var $table_tbkb2 = 'v_tbkb2';
    var $column_tbkb2 = array('cBKBNo','nNo','cStockID','cGoodDesc','cUnit','nQty','nPrice','nCost'); //set column field database for order and search
    var $order_tbkb2 = array('cBKBNo' => 'desc'); // default order

    private function _get_datatables_query_tbkb2()
    {
        if ($this->input->post('cBKBNo') != "") {
             $this->db->where('cBKBNo', $this->input->post('cBKBNo'));
        }else{
             $this->db->where('cBKBNo', '');
        }
      $this->db->select('cBKBNo,nNo,cStockID,cGoodID,cGoodDesc,cUnit,nQty,nPrice,nCost');
      $this->db->from('v_tbkb2');
      

        $i = 0;
        foreach ($this->column_tbkb2 as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_tbkb2) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_tbkb2))
        {
            $order = $this->order_tbkb2;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_tbkb2()
    {
        $this->_get_datatables_query_tbkb2();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_tbkb2()
    {
        $this->_get_datatables_query_tbkb2();
        $query = $this->db->get();
        return count($query->result());
    }

    public function count_all_tbkb2()
    {
        $this->db->from($this->table_tbkb2);
        return $this->db->count_all_results();
    }

    var $table_mstock = 'v_stock_jual';
    var $column_mstock = array('cStockID','cGoodID','cGoodDesc','cUnit','nCurQty','nCurCost'); //set column field database for order and search
    var $order_mstock = array('cGoodID' => 'desc'); // default order

    private function _get_datatables_query_mstock()
    {
      $date = date("Y-m-01",strtotime($this->session->userdata('dStock')));
      $this->db->select('cStockID,cGoodID,cGoodDesc,cUnit,nCurQty,nCurCost,nHpp,nSale');
      $this->db->from('v_stock_jual');
      $this->db->where('dStock',$date);
      

        $i = 0;
        foreach ($this->column_mstock as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_mstock) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_mstock))
        {
            $order = $this->order_mstock;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_mstock()
    {
        $this->_get_datatables_query_mstock();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_mstock()
    {
        $this->_get_datatables_query_mstock();
        $query = $this->db->get();
        return count($query->result());
    }

    public function count_all_mstock()
    {
        $this->db->from($this->table_mstock);
        return $this->db->count_all_results();
    }





}
