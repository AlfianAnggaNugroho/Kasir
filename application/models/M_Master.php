<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Master extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    var $table_menu = 'mMenu';
    var $column_menu = array('cMenuID','cMenuDesc','cUserID'); //set column field database for order and search
    var $order_menu = array('cMenuID' => 'desc'); // default order

    private function _get_datatables_query()
    {
     //   $this->db->select('cMenuID, cMenuDesc,cUserID');
        $this->db->from('mMenu');
      //  $this->db->join('tbl_carrera', 'tbl_carrera.carr_id = tbl_estudiante.carr_id');
        $i = 0;
        foreach ($this->column_menu as $item) // loop column
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
                if(count($this->column_menu) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_menu))
        {
            $order = $this->order_menu;
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
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table_menu);
        return $this->db->count_all_results();
    }

    public function get_by_id($id,$tabel,$cID)
    {
        $this->db->from($tabel);
        $this->db->where($cID,$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function grafik($id,$id2)
    {
        $query = $this->db->query("CALL grafik('$id2','$id')");
        return $query->row();
    }


    public function get_by_id2($where,$tabel)
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
        $query2 = $this->db->query("SELECT '0' AS cEmailID");
        $cek = count($query->result());
        if($cek != 0){
        return $query->row();
        }
        else{
            return $query2->row();
        }
    }


    public function get_by_id_join2($tabel,$table2,$where,$join)
    {
        $this->db->from($tabel);
        $this->db->join($table2, $join);
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
        $this->db->order_by($Order, 'ASC');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_rows2($table,$Order)
    {
        $this->db->from($table);
        // $this->db->order_by($Order, 'ASC');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_rows_join($table1,$table2,$join,$Order)
    {
        $this->db->from($table1);
        $this->db->join($table2, $join);
        $this->db->order_by($Order, 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

 public function delete_by_id2($id,$tabel,$cID)
    {
        $this->db->where($cID, $id);
        $this->db->delete($tabel);
        return TRUE;
    }
//==============================================================

	function detail_Single(){
  		$result = $this->db->get('mMenu');
  		return $result;
  	}
//==================================================================
//MODEL USER STAR
//=================================================================

    var $table_user = 'mUser';
    var $column_user = array('cEmailID','cPassword','cName','mUserGrp1.cUserGrpDesc'); //set column field database for order and search
    var $order_user = array('mUser.cEmailID' => 'desc'); // default order
    private function _get_datatables_query_user()
    {
     //   $this->db->select('cMenuID, cMenuDesc,cUserID');
       // $this->db->from('mUser');
      //  $this->db->join('tbl_carrera', 'tbl_carrera.carr_id = tbl_estudiante.carr_id');
        $this->db->select('cEmailID, cPassword, cName, mUserGrp1.cUserGrpDesc,mUserGrp1.cUserGrpID');
        $this->db->from($this->table_user);
        $this->db->join('mUserGrp1', 'mUserGrp1.cUserGrpID = mUser.cUserGrpID');
        $i = 0;
        foreach ($this->column_user as $item) // loop column
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
                if(count($this->column_user) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_user))
        {
            $order = $this->order_user;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_user()
    {
        $this->_get_datatables_query_user();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_user()
    {
        $this->_get_datatables_query_user();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_user()
    {
        $this->db->from($this->table_user);
        return $this->db->count_all_results();
    }



//==================================================================
//MODEL USER SELESAI
//=================================================================


//==================================================================
//MODEL Group USER STAR
//=================================================================

    var $table_userGrp = 'mUserGrp1';
    var $column_userGrp = array('cUserGrpID','cUserGrpDesc'); //set column field database for order and search
    var $order_userGrp = array('cUserGrpID' => 'desc'); // default order
    private function _get_datatables_query_userGrp()
    {
        $this->db->select('cUserGrpID,cUserGrpDesc, cUserID');
        $this->db->from($this->table_userGrp);
       // $this->db->join('mUserGrp1', 'mUserGrp1.cUserGrpID = mUser.cUserGrpID');
        $i = 0;
        foreach ($this->column_userGrp as $item) // loop column
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
                if(count($this->column_userGrp) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_userGrp))
        {
            $order = $this->order_userGrp;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_userGrp()
    {
        $this->_get_datatables_query_userGrp();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_userGrp()
    {
        $this->_get_datatables_query_userGrp();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_userGrp()
    {
        $this->db->from($this->table_userGrp);
        return $this->db->count_all_results();
    }


    var $table_userGrp2 = 'mUserGrp2';
    var $column_userGrp2 = array('mMenu.cMenuID','mMenu.cMenuDesc','mUserGrp2.cUserGrpID'); //set column field database for order and search
    var $order_userGrp2 = array('mMenu.cMenuID' => 'desc'); // default order

    function _get_datatables_query_userGrp2()
    {
        $this->db->select('mMenu.cMenuID,mMenu.cMenuDesc,mUserGrp2.cUserGrpID');
        $this->db->from($this->table_userGrp2);
        $this->db->join('mUserGrp1', 'mUserGrp1.cUserGrpID = mUserGrp2.cUserGrpID');
        $this->db->join('mMenu', 'mMenu.cMenuID = mUserGrp2.cMenuID');
        if($this->input->post('cUserGrpID')) {
            $this->db->where('mUserGrp2.cUserGrpID',$this->input->post('cUserGrpID'));
        }else{
            $this->input->post('mUserGrp2.cUserGrpID','');
        }
        
        $i = 0;
        foreach ($this->column_userGrp2 as $item) // loop column
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
                if(count($this->column_userGrp2) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_userGrp2))
        {
            $order = $this->order_userGrp2;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_by_ID()
    {
        $this->_get_datatables_query_userGrp2();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    // ==============================================GUdang=====================================================
var $table_Gallery = 'mGallery';
    var $column_Gallery = array('cGalID','cName','cGambar'); //set column field database for order and search
    var $order_Gallery = array('cGalID' => 'desc'); // default order

    private function _get_datatables_query_Gallery()
    {
     //   $this->db->select('cGalID, cName,cUserID');
        $this->db->from('mGallery');
        $i = 0;
        foreach ($this->column_Gallery as $item) // loop column
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
                if(count($this->column_Gallery) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_Gallery))
        {
            $order = $this->order_Gallery;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_Gallery()
    {
        $this->_get_datatables_query_Gallery();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_Gallery()
    {
        $this->_get_datatables_query_Gallery();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_Gallery()
    {
        $this->db->from($this->table_Gallery);
        return $this->db->count_all_results();
    }



  // ==============================================mgoodgrp=====================================================
    var $table_mgoodgrp = 'mgoodgrp';
    var $column_mgoodgrp = array('cGoodGrpID','cGoodGrpDesc'); //set column field database for order and search
    var $order_mgoodgrp = array('cGoodGrpID' => 'desc'); // default order

    private function _get_datatables_query_mgoodgrp()
    {
     //   $this->db->select('cMenuID, cMenuDesc,cUserID');
        $this->db->from('mgoodgrp');
      //  $this->db->join('tbl_carrera', 'tbl_carrera.carr_id = tbl_estudiante.carr_id');
        $i = 0;
        foreach ($this->column_mgoodgrp as $item) // loop column
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
                if(count($this->column_mgoodgrp) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_mgoodgrp))
        {
            $order = $this->order_mgoodgrp;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_mgoodgrp()
    {
        $this->_get_datatables_query_mgoodgrp();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_mgoodgrp()
    {
        $this->_get_datatables_query_mgoodgrp();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_mgoodgrp()
    {
        $this->db->from($this->table_mgoodgrp);
        return $this->db->count_all_results();
    }

    // ==============================================mgood=====================================================
    var $table_mgood = 'mgood';
    var $column_mgood = array('cGoodID','cGoodDesc','cUnit','nMin','nMax','mgoodgrp.cGoodGrpDesc'); //set column field database for order and search
    var $order_mgood = array('cGoodID' => 'desc'); // default order

    private function _get_datatables_query_mgood()
    {
     //   $this->db->select('cMenuID, cMenuDesc,cUserID');
        $this->db->from('mgood');
        $this->db->join('mgoodgrp','mgoodgrp.cGoodGrpID = mgood.cGoodGrpID');
      //  $this->db->join('tbl_carrera', 'tbl_carrera.carr_id = tbl_estudiante.carr_id');
        $i = 0;
        foreach ($this->column_mgood as $item) // loop column
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
                if(count($this->column_mgood) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_mgood))
        {
            $order = $this->order_mgood;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_mgood()
    {
        $this->_get_datatables_query_mgood();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_mgood()
    {
        $this->_get_datatables_query_mgood();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_mgood()
    {
        $this->db->from($this->table_mgood);
        return $this->db->count_all_results();
    }

    // ==============================================msupplier=====================================================
    var $table_msupplier = 'msupplier';
    var $column_msupplier = array('cSupID','cSupDesc','cAddress','cPhone','cHP','cFax'); //set column field database for order and search
    var $order_msupplier = array('cSupID' => 'desc'); // default order

    private function _get_datatables_query_msupplier()
    {
        $this->db->from('msupplier');
        $i = 0;
        foreach ($this->column_msupplier as $item) // loop column
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
                if(count($this->column_msupplier) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_msupplier))
        {
            $order = $this->order_msupplier;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_msupplier()
    {
        $this->_get_datatables_query_msupplier();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_msupplier()
    {
        $this->_get_datatables_query_msupplier();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_msupplier()
    {
        $this->db->from($this->table_msupplier);
        return $this->db->count_all_results();
    }
    
     // ==============================================mstock=====================================================
    var $table_mstock = 'v_mstock2';
    var $column_mstock = array('dStock','cGoodID','cGoodDesc','nBegQty','nBegCost','nCurQty','nCurCost'); //set column field database for order and search
    var $order_mstock = array(  'dStock' => 'desc',
                                'cGoodID' => 'desc'
                              ); // default order

    private function _get_datatables_query_mstock()
    {
        $this->db->from('v_mstock2');
        // $this->db->join('mgood','mgood.cGoodID = mstock.cGoodID');
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
        return $query->num_rows();
    }

    public function count_all_mstock()
    {
        $this->db->from($this->table_mstock);
        return $this->db->count_all_results();
    }    

    var $table_v_list = 'v_list';
    var $column_v_list = array('cStockID','cGoodDesc'); //set column field database for order and search
    var $order_v_list = array('cStockID' => 'desc'); // default order

    private function _get_datatables_query_v_list()
    {
        $this->db->from('v_list');
        $this->db->where('cUserID',$this->session->userdata('username'));
        $i = 0;
        foreach ($this->column_v_list as $item) // loop column
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
                if(count($this->column_v_list) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_v_list))
        {
            $order = $this->order_v_list;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_v_list()
    {
        $this->_get_datatables_query_v_list();

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_v_list()
    {
        $this->_get_datatables_query_v_list();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_v_list()
    {
        $this->db->from($this->table_v_list);
        return $this->db->count_all_results();
    }
 


}
