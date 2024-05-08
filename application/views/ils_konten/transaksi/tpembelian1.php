<style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #5B0386;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}

</style>

    <?php 
           $user =$this->session->userdata('cUserGrpID');
                if($user != "01"){
                   $st = "hidden";
                   }else{
                   $st ="";
                   }
    ?>
                <input type="hidden" name="cUserID" id="cUserID" value="<?php echo $user ?>">
                <!-- Page-Title -->
             

 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"><?php echo $info; ?></h2>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item">
                                        <!-- sssssss -->
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center ">
                        <div class="customize-input float-right ">
                             <button type="button" class="custom-select custom-select-set form-control bg-info border-0 custom-shadow custom-radius btnAdd" id="btnAdd" style="color: #fff; font-size: 16px"> <i class="fa fa-plus-circle"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
<hr>


                <!-- end page title end breadcrumb -->
<div class="row card">
        <div class="col-lg-12 ">
            <section class="panel">
              <div class="panel-body">
                           
                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3 d-none">
                                    <li class="nav-item" onclick="reloadTable();">
                                        <a href="#tab1" data-toggle="tab" aria-expanded="false"
                                            class="nav-link rounded-0 active" id="Hli1">
                                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Daftar Transaksi</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab2" data-toggle="tab" aria-expanded="true" id="Hli2"
                                            class="nav-link rounded-0 ">
                                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Detil</span>
                                        </a>
                                    </li>
                                </ul>


                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                <form id="form-filter" class="form-horizontal">
                                    <br>
                                    <div class="form-group row">
                                            <div class="col-sm-3">
                                               <input type="text" name="dDisplay1" id="dDisplay1" placeholder="Masukan Tanggal" class="form-control input"  style="cursor:pointer; font-size: 14px"/>
                                            </div>
                                            
                                            <div  class="col-sm-3">
                                                <!-- <input type="text" name="cTahun" placeholder="Masukan Tahun" class="form-control"> -->
                                                <input type="text" name="dDisplay2" id="dDisplay2" placeholder="Masukan Tanggal" class="form-control input"  style="cursor:pointer; font-size: 14px"/>
                                            </div>
                                            <div  class="col-sm-2">
                                                 <!-- <a class="btn btn-info ">Proses</a> -->
                                                  <button type="button" class="btn waves-effect waves-light btn-info btndisplay" id="btn_proses">Filter Data</button>

                                            </div>
                                    </div>
                                </form>
                                     
                                     <br><br>
                                        <div class="card-box">
                                            <!-- class="table table-striped table-bordered display" cellspacing="0" style="width:100%" -->
                                            <table id="table" class="table table-striped table-bordered display nowrap" style="width:100%;background-color: #fff">
                                                <thead>
                                                    <tr>
                                                        <th style="width:10px;" align="center">No</th>
                                                        <th>Nomor Pemasukan</th>
                                                        <th>Tanggal</th>
                                                        <th>Supplier</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                </div>

                                <div class="tab-pane " id="tab2">
                                    <br>
                                    <section class="panel d-none" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(176,229,208,1) 42%, rgba(92,202,238,0.41) 93.6% );">
                                            <div class="panel-body  boder" style="border: 20px;border-color: #000">
                                                <div class="form-group">
                                                    <div class="col-sm-12">

                                                        <!-- <h1 class="" style="color: #fff;font-size: 60px" align="Left">Rp.</h1> -->
                                                        <h1 class="" style="color: #000;font-size: 70px" align="right" id="total_header">Rp. 0</h1>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                    </section>
                                    <!-- <hr> -->
        <style type="text/css">
            label{
                font-size: 12px;
            }
            .form-control{
                font-size: 12px
            }
        </style>
                                <form action="#" id="from1" role="form" class="form-horizontal" data-parsley-validate novalidate>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card text-dark"  style="background-image: radial-gradient( circle 311px at 8.6% 27.9%,  rgba(62,147,252,0.57) 12.9%, rgba(239,183,192,0.44) 91.2% );">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">Buat Transaksi</h4>
                                                    </div>
                                                    <div class="card-body">


                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="form" class="control-label">Nomor Transaksi</label>
                                                <input type="text" class="form-control" id="cBMBNo" name="cBMBNo" placeholder="No Pemasukan" readonly parsley-trigger="change" required>
                                                <span class="help-block"></span>  
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <?php 
                                                        $tglStok= $this->m_function->konv_tgl_indo("d M Y"); 
                                                        
                                                    ?>
                                                    <label>Tanggal Transaksi:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="dTrx" name="dTrx" style="cursor:pointer;font-size: 10px" readonly placeholder="Masukan Tanggal" value="<?php echo $tglStok ?>"><span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                    </div>
                                                    <span class="help-block"></span>  
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="row">
                                              <div class="col-sm-8">
                                                <label>Supplier</label>
                                                 <input class="form-control" id="cSupID" name="cSupID" placeholder="Masukan Supplier" maxlength="100" readonly type="hidden">
                                                <input class="form-control" id="cSupDesc" name="cSupDesc" placeholder="Masukan Supplier" maxlength="100" readonly>
                                                <span class="help-block"></span>  
                                            </div>
                                            <div class="col-sm-4">
                                                <label style="opacity: 0">.</label>
                                                <input type="button" class="form-control btn btn-primary" value="Cari" onclick="Supplier();">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label>Keterangan</label>
                                                <input class="form-control" id="cDesc" name="cDesc" placeholder="Masukan Keterangan" maxlength="100" readonly>
                                                <span class="help-block"></span>  
                                            </div>
                                        </div>

                                        <div class="row">
                                             <div class="col-sm-12">
                                                <label>Tutup Transaksi</label>
                                                <select class="form-control" id="cClose" name="cClose" onchange="change_value(this)" disabled>
                                                    <option value="T">Tidak</option>
                                                    <option value="Y">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <div class="col-sm-8"  name="input_header">
                                             <!-- <br><br> <br><br><br> -->
                                             <label style="opacity: 0">.</label>
                                            <a class="btn btn-success btnSave1 form-control" id="btnSave1" onclick="Save_header1()" style="color: #fff">Simpan/Buat Nomor</a>
                                            <!-- <a class="btn btn-danger btnHapus" id="btnHapus">hapus</a> -->
                                            </div>

                                            <div class="col-sm-4">
                                                <label style="opacity: 0">.</label>
                                                <a class="btn btn-primary form-control" id="btnTambah" name="btnTambah" style="color: #fff">Tambah</a>
                                                <a class="btn btn-info btnPrevious form-control" id="btnPrevious" style="color: #fff">Kembali</a>
                                            </div>
                                        </div>

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card text-white bg-dark">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">List Item Barang</h4>
                                                    </div>
                                                    <div class="card-body">

                        <!-- =============================================================================== -->
                                <div id="input_barang">
                                         <div class="form-group row">
                                             <div class="col-md-2">
                                            <label>Kode</label>
                                                <input type="text" class="form-control" name="cGoodID" id="cGoodID" placeholder="Kode" readonly style="font-size: 12px">
                                            </div>

                                            <div class="col-sm-3">
                                            <label>Nama Barang</label>
                                                <input type="text" class="form-control" name="cGoodDesc" id="cGoodDesc" placeholder="Nama Barang" readonly style="font-size: 12px">
                                            </div>
                                            <div class="col-sm-1 d-none">
                                            <label>Satuan</label>
                                                <input type="text" class="form-control" name="cUnit" id="cUnit" placeholder="Satuan" readonly style="font-size: 12px">
                                            </div>

                                            

                                            <div class="col-sm-1 ">
                                                <label style="opacity: 0">.</label>
                                                <input type="button" class="form-control btn btn-success" value="..." onclick="Barang();">
                                            </div>

                                            <div class="col-sm-2">
                                                <label>Qty</label>
                                                <input type="text" name="nQty" id="nQty" class="form-control" value="0" readonly style="text-align: right;font-size: 12px">
                                            </div>
                                            <div class="col-sm-2" id="Harga">
                                                <label>Harga</label>
                                                <input type="text" name="nPrice" id="nPrice" class="form-control" value="0" readonly style="text-align: right;font-size: 12px">
                                            </div>
                                            <div class="col-sm-2" id="Total">
                                                <label>Total</label>
                                                <input type="text" name="nCost" id="nCost" class="form-control" value="0" readonly style="text-align: right;font-size: 12px">
                                            </div>
                                         </div>

                                        <div class="form-group">
                                             <div  class="col-sm-12">
                                                 <a class="form-control btn btn-warning btn_detil" id="btn_detil" onclick="savedetil()" style="color: #fff">Masukan Item Barang Ke List</a>
                                            </div>
                                        </div>
                                        <!-- ================================================== -->


                                                        <!-- isi item -->
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <table id="table3" class="display table table-striped table-bordered" style="width:100%;background-color: #fff;font-size: 12px">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width:10px;" align="center">No</th>
                                                                        <th>Kode</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Satuan</th>
                                                                     
                                                                        <th>Jumlah</th>
                                                                        <th>Harga</th>
                                                                        <th>Total</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th style="width:10px;" align="center">No</th>
                                                                        <th>Kode</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Satuan</th>
                                                                        
                                                                        <th>Jumlah</th>
                                                                        <th>Harga</th>
                                                                        <th>Total</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
<!-- ========================================================================================================= -->
                                </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </form>


                                </div>
                            </div>
              </div>
            </section>
      </div>
  </div>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


                        <!-- Bootstrap modal -->
                    <div class="modal fade glass" id="modal_supplier" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                        <div class="modal-body">
                                             <table id="datatable_supplier" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:10%;">Kode</th>
                                                        <th style="width:190%;">Nama Supplier</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no = 1;
                                                    foreach($list as $value){ ?>
                                                    <tr class="isi_tabel pilih" id="<?php echo $value->cSupID ?>">
                                                        <td><?php echo $no ?></td>
                                                        <td><?php echo $value->cSupID ?></td>
                                                        <td><?php echo $value->cSupDesc ?></td>
                                                    </tr>
                                                    <?php 
                                                    $no += 1;
                                                    } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:10%;">Kode</th>
                                                        <th style="width:190%;">Nama Supplier</th>      
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->



                        <!-- Bootstrap modal -->
                    <div class="modal fade glass" id="modal_barang" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                        <div class="modal-body">
                                             <table id="datatable_barang" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:30%;">Kode</th>
                                                        <th style="width:190%;">Barang</th>
                                                        <th style="width:30%;">Satuan</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no = 1;
                                                    foreach($list3 as $value){ ?>
                                                    <tr class="isi_tabel Pilih3" id="<?php echo $value->cGoodID ?>">
                                                        <td><?php echo $no ?></td>
                                                        <td><?php echo $value->cGoodID ?></td>
                                                        <td><?php echo $value->cGoodDesc ?></td>
                                                        <td><?php echo $value->cUnit ?></td>
                                                        
                                                    </tr>
                                                    <?php 
                                                    $no += 1;
                                                    } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:30%;">Kode</th>
                                                        <th style="width:190%;">Barang</th> 
                                                        <th style="width:30%;">Satuan</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->



                   
<script type="text/javascript">    
var save_method; //for save method string
var save_methoddetil;
var table;
var id_menu;
var id_menu_T;
var table_detail;
var table_detail3;
var table_detail3View;
// AWAL START
$(document).ready(function() {

// if(cUserID.value != "01"){
    // $('#Harga').hide();
    // $('#Total').hide();
// }

$('#input_barang').hide();
$('#btnSave1').hide();
$('#tampil').hide();

$('#show_save_detil').hide();
// document.getElementById("myTot").style.display = "none";


$('#datatable_supplier').DataTable({ 
        "paging": true,
        });

$('#datatable_barang').DataTable({ 
        "paging": true,
        });

//datatables
    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        //"responsive": true,
        "paging": true,
        // "scrollY": 200,
        "scrollX": true,
        "scrollCollapse": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_Transaksi/ajax_list_BMB')?>",
            "type": "POST",
            "data": function ( data ) {
                data.dDisplay1 = $('#dDisplay1').val();
                data.dDisplay2 = $('#dDisplay2').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

    $('#btn_proses').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    //new $.fn.dataTable.FixedHeader(table);
//=====================================================================================================================
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});
</script>



<script type="text/javascript">
 $('.btnAdd').click(function(){
//    alert();
   $('#from1')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
     
    $('#btnTambah').show();
    var tot = document.getElementById('total_header');
    tot.innerHTML = "Rp. "+formatRupiah('0');
    
    $('#btnSave1').show();
    $('#btnTambah').hide();
    // table_detail.ajax.reload();
     table_detail3.ajax.reload();
    save_method ="add";
    Hli2.click();

    document.getElementById("cDesc").readOnly = false;
    $('#show_save_detil').hide();
    $('.btnAdd').hide();
    
    }); 

    $('#btnTambah').click(function(){
    $('#from1')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    //$('.del_red').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    
    $('#input_barcode').show();  
    $('#btnTambah').show();
    
    $('#btnSave1').show();
    $('#btnTambah').hide();
    // table_detail.ajax.reload();
     table_detail3.ajax.reload();
    save_method ="add";
    document.getElementById("cDesc").readOnly = false;
    
    $('#show_save_detil').hide();
    }); 


function Save_header1()
{
    if(cSupID.value == ""){
        alert("Lengkapi Data!!!");
        return false;
    }
    //Ajax Load data from ajax
    var inisial = "<?php echo $this->session->userdata('cInitIn') ?>";
    $.ajax({
        url : "<?php echo site_url('C_Transaksi/ajax_nomor_BMB')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           if(save_method == "add"){
           var Pk_NO = parseInt(data.cBMBNo.substr(7))+1;
           var dateBulan = data.dTrx.substr(5,2);
           var dateTahun = data.dTrx.substr(0,4);
           var nomor = dateTahun+dateBulan+sprintf('%04d',Pk_NO);
           $('[name="cBMBNo"]').val(inisial+nomor);
           }
           save();
           $('#btnSave').hide();
           $('#btnTambah').hide();
           $('#show_save_detil').show();
           $('#input_barang').show();
           $('#detil3').show();
           $('#detil3_view').hide();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
           // alert('Error getting data from ajax');
        }
    });
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
    //notifikasi_gagal();
    if(save_method == 'add') {
        url = "<?php echo site_url('C_Transaksi/ajax_add_tbmb1') ?>";
    } else {
        url = "<?php echo site_url('C_Transaksi/ajax_update_tbmb1')?>/"+id_menu_T;
        Hli2.click();
    }
    // ajax adding data to database
        $.ajax({
        url : url,
        type: "POST",
        data: $('#from1').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false);
                Sukses_simpan();
                id_menu_T = cBMBNo.value;
                reloadTable();
                table_detail3.ajax.reload();
                // table_detail.ajax.reload();
                // table_detail3.ajax.reload();
                if(save_method != 'add'){
                bersih();
                }
                save_method ="update";

            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            error2()
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
         
        }
    });
   
}


function delete_bmb1(id)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Transaksi/ajax_delete_tbmb1')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                table.ajax.reload();
                sum_total();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               error_Detil();
            }
        });
    }
}

function edit_bmb1(id)
{
    save_method = 'update';
    id_menu_T = id;

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Transaksi/ajax_edit_tbmb1/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
$('#btnSave1').show();
$('#btnTambah').hide();
$('#input_barang').show();

var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
var bulan = ['','Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
//08-09-2018
bulan1= data.dTrx.slice(5,7);
Tahun1 = data.dTrx.slice(0,4);
tgl1 = data.dTrx.slice(8,10);
var bulan = bulan[parseInt(bulan1)];
var tgl_fix = tgl1+" "+bulan+" "+Tahun1;
            $('[name="cBMBNo"]').val(data.cBMBNo);
            $('[name="cSupID"]').val(data.cSupID);
            $('[name="cSupDesc"]').val(data.cSupDesc);
            $('[name="cDesc"]').val(data.cDesc);
            $('[name="cClose"]').val(data.cClose);
            $('[name="dTrx"]').val(tgl_fix);
            Hli2.click();
            sum_total();
    document.getElementById("cDesc").readOnly = false;
    table_detail3.ajax.reload();  
    $('#btnSave').show();
    cClose.disabled = false;  

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}


function savedetil()
{
    if(cBMBNo.value==""){
        alert("Silahkan Buat Nomor Transaksi Dahulu!!!");
        return false;
    }

    if(cGoodID.value==""|| nQty.value==""){
        alert("Mohon lengkapi Data")
        return false;
    }

    $('#btn_detil').text('saving'); //change button text 
    var url;
    if(save_methoddetil == 'add') {
        url = "<?php echo site_url('C_Transaksi/ajax_add_tbmb2Detil') ?>";
    } else {
        url = "<?php echo site_url('C_Transaksi/ajax_update_tbmb2Detil')?>";
    }
    // ajax adding data to database
        $.ajax({
        url : url,
        type: "POST",
        data: $('#from1').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {

            $('#btn_detil').text('Save'); //change button text
                Sukses_simpan();
                table.ajax.reload();
                table_detail3.ajax.reload();
                cClose.disabled = false;
                bersih_detil();
                sum_total();

            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btn_detil').text('Masukan Item Barang'); //change button text
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            table_detail3.ajax.reload();
            //error2()
            error()
            $('#btn_detil').text('Masukan Item Barang'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
         
        }
    });   
}


function sum_total(){
     $.ajax({
        url : "<?php echo site_url('C_Transaksi/sum_pembelian/')?>/"+cBMBNo.value,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            var tot = document.getElementById('total_header');
            // alert(data.total);
            tot.innerHTML = "Rp. "+formatRupiah(data.total);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error getting data from ajax');
          //  kosong();
        }
    });
}



</script>

<script type="text/javascript">
nCost.addEventListener('keyup', function(e)
    {
nCost.value = formatRupiah(this.value);
    }); 
nPrice.addEventListener('keyup', function(e)
    {
        nPrice.value = formatRupiah(this.value);
        nCost.value = parseFloat(nPrice.value.split(".").join("").split(",").join(".")) * parseFloat(nQty.value.split(".").join("").split(",").join("."));
        nCost.value = nCost.value.split(".").join(",");
        //nCost.value = formatRupiah(nCost.value.substr(0));
        nCost.value = formatRupiah(nCost.value);
    }); 
nQty.addEventListener('keyup', function(e)
    {
        var qty = parseFloat(nQty.value.split(".").join("").split(",").join("."));
        var stok = parseFloat(nStock.value.split(".").join("").split(",").join("."));

        if(stok < qty){
                alert("Stok Tidak Cukup, tersedia Stok :"+nStock.value);
                nQty.value = 0;
            return false;
        }
        nQty.value = formatRupiah(this.value);
        nCost.value = parseFloat(nPrice.value.split(".").join("").split(",").join(".")) * parseFloat(nQty.value.split(".").join("").split(",").join("."));
        nCost.value = nCost.value.split(".").join(",");
        //nCost.value = formatRupiah(nCost.value.substr(0));
        nCost.value = formatRupiah(nCost.value);
    }); 
</script>

<script type="text/javascript">
function reloadTable(){
    table.ajax.reload(null,false);
}

function Supplier()
{
    $('#modal_supplier').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Supplier'); // Set Title to Bootstrap modal title
}

function Barang()
{
    $('#modal_barang').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Barang'); // Set Title to Bootstrap modal title
}

$(document).on('click', '.Pilih3', function (e) {
    document.getElementById("cGoodID").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var cGoodDesc = document.getElementById('cGoodDesc');
    cGoodDesc.value = cells[2].innerHTML;
    cUnit.value = cells[3].innerHTML;
    nQty.value = 0;
    nPrice.value = 0;
    nCost.value = 0;
    document.getElementById("nQty").readOnly = false; 
    document.getElementById("nCost").readOnly = false; 
    document.getElementById("nPrice").readOnly = false; 
    save_methoddetil = 'add';
    $('#modal_barang').modal('hide');             
    });



$(document).on('click', '.pilih', function (e) {
    document.getElementById("cSupID").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var cSupDesc = document.getElementById('cSupDesc');
    cSupDesc.value = cells[2].innerHTML;    
    $('#modal_supplier').modal('hide');             
    });

function bersih_detil(){
    cGoodID.value ="";
    cGoodDesc.value ="";
    cUnit.value = "";
    nQty.value = 0;
    nPrice.value = 0;
    nCost.value = 0;
}

function delete_bmb2(id)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Transaksi/ajax_delete_tbmb2')?>/"+id+"/"+cBMBNo.value,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                table_detail3.ajax.reload(null,false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               error_Detil();
            }
        });
    }
}

function edit_BKB2(id,id2)
{
   // alert(id+" "+id2)
    save_methoddetil = 'update';
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Transaksi/ajax_edit_tadm2/')?>/"+id+"/"+id2,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="cKompID"]').val(data.cKompID);
            $('[name="cGoodDesc"]').val(data.cName);
            $('[name="nBobot"]').val(data.nBobot);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}

$('.btnPrevious').click(function(){
    Hli1.click();
    $('.btnAdd').show();
    reloadTable();
    table_detail3.ajax.reload(); 
    bersih();
    });

function bersih(){
    $('#btnSave1').hide();
    $('#btnTambah').show();
    Hli1.click();
}

function Cetak(id){
   // alert(id);
   var URL = "<?php echo site_url('C_Laporan/cetak_tbmb1')?>/"+id;
    $.ajax({
            type: "POST",
            url : URL,
            data: "id="+id,
            success: function(data)
            {
      //  window.location.href='<?php echo site_url('C_Laporan/cetak_Eksport')?>/'+id;
            window.open(URL, '_blank');
            }
        });
}



function change_value(cStatus){
    if (document.getElementById("cStatus").value == ''){
         $('#btnSave1').hide();
    }
    else
    if (document.getElementById("cStatus").value !=''){
         $('#btnSave1').show();
         $('#btnTambah').show();
    }
}


function upload()
{
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Upload'); // Set Title to Bootstrap modal title
}
</script>


<script>
$(document).ready(function(){
    var url;
    $('#form').on('submit', function(e){
        e.preventDefault();
       
    var inputFile = document.getElementById('cGambar');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!ekstensiOk.exec(pathFile)){
        alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png');
        inputFile.value = '';
        return false;
    }

        if($('#cGambar').val() == '')
        {
            alert("Please Select the File");
        }
        else
        {
        // if(save_method == 'add') {
            // url = "<?php echo base_url(); ?>C_Master/ajax_upload";
        // } else {
            url = "<?php echo site_url('C_Transaksi/ajax_update_upload')?>/"+id_menu_T;
        // }
            $.ajax({
                url: url, 
                //base_url() = http://localhost/tutorial/codeigniter
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function(data)
                {
                GetFileName();
                Sukses_simpan();

                // $('#foto_lama').attr('src', '<?php echo base_url('upload/')?>/'+fileName); 
                  
                $('#modal_form').modal('hide');
                }
            });
        }
    });
});
</script>

<script type='text/javascript'>
$(document).ready(function() {
    table_detail3 = $('#table3').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
       
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_Transaksi/ajax_list_BMB2')?>",
            "type": "POST",
            "data": function ( data ) {
                data.cBMBNo = $('#cBMBNo').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
table_detail3.ajax.reload();
});

</script>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>