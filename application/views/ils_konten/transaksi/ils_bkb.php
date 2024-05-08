                <?php 
                    $user =$this->session->userdata('cUserGrpID');
                ?>

                     <?php 
                    if($user != "01" AND $user !="05"){
                        $hakacs = "d-none";
                            $hk = "";
                                                   
                    }
                    else{
                            $hakacs = "";
                            $hk = "d-none";
                    }
                    ?>
 <?php 
                if($user != "01"){
                   $st = "d-none";
                   }else{
                   $st ="";
                   }
    ?>

<style type="text/css">
    label{
        font-size: 12px;
    }

</style>
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
                             <button type="button" class="custom-select custom-select-set form-control bg-info border-0 custom-shadow custom-radius btnAdd" id="btnAdd" style="color: #fff"> <i class="fa fa-plus-circle"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
<hr>


         <div class="row card">      
                <!-- end page title end breadcrumb -->
                <div class="col-lg-12">
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
                                               <input type="text" name="dDisplay1" id="dDisplay1" placeholder="Masukan Tanggal" class="form-control input"  style="cursor:pointer"/>
                                            </div>
                                            
                                            <div  class="col-sm-3">
                                                <!-- <input type="text" name="cTahun" placeholder="Masukan Tahun" class="form-control"> -->
                                                <input type="text" name="dDisplay2" id="dDisplay2" placeholder="Masukan Tanggal" class="form-control input"  style="cursor:pointer"/>
                                            </div>
                                            <div  class="col-sm-2">
                                                 <!-- <a class="btn btn-info ">Proses</a> -->
                                                  <button type="button" class="btn waves-effect waves-light btn-info btndisplay" id="btn_proses">Filter Data</button>

                                            </div>
                                    </div>
                                </form>
                                     
                                     <br>
                                        <div class="card-box">
                                            <!-- class="table table-striped table-bordered display" cellspacing="0" style="width:100%" -->
                                            
                                            <table id="table" class="table table-striped table-bordered display nowrap" style="width:100%;background-color: #fff">
                                                <thead>
                                                    <tr>
                                                        <th style="width:10px;" align="center">No</th>
                                                        <th>Nomor Pengeluaran</th>
                                                        <th>Tanggal</th>
                                                        <!-- <th>Konsumen</th> -->
                                                        <!-- <th>Status</th> -->
                                                        <th>Status Pembayaran</th>
                                                        <th>Keterangan</th>
                                                        <th style="width:120px;">Aksi</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                              
                                            </table>
                                        </div>
                                </div>

                                <div class="tab-pane" id="tab2">
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
                                    <form action="#" id="from1" role="form" class="form-horizontal" data-parsley-validate novalidate>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="card text-dark" style="background-image: radial-gradient( circle 311px at 8.6% 27.9%,  rgba(62,147,252,0.57) 12.9%, rgba(239,183,192,0.44) 91.2% );">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-dark">Buat Transaksi</h4>
                                                    </div>
                                                    <div class="card-body">


                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="form" class="control-label">Nomor Transaksi</label>
                                                <input type="text" class="form-control" id="cBKBNo" name="cBKBNo" placeholder="Nomor Pengeluaran" readonly parsley-trigger="change" required style="font-size: 12px;">
                                                <span class="help-block"></span>  
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <?php 
                                                        $tglStok= $this->m_function->konv_tgl_indo("d M Y"); 
                                                        
                                                    ?>
                                                    <label>Tanggal Transaksi:</label>
                                                    <div class="input-group">
                                                         <input type="text" style="font-size: 12px;" class="form-control" id="dTrx" name="dTrx" style="cursor:pointer" readonly placeholder="Masukan Tanggal" value="<?php echo $tglStok ?>"><span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                    </div>
                                                    <span class="help-block"></span>  
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="row">
                                               <div class="col-sm-2 d-none">
                                                <label>Kode Konsumen</label>
                                                <input class="form-control" id="cKonID" name="cKonID" placeholder="Masukan Konsumen" maxlength="100" readonly type="" value="UMUM">
                                            </div>
                                             <div class="col-sm-6 d-none">
                                                <label>Konsumen</label>
                                                <input style="font-size: 12px;" class="form-control" id="cKonDesc" name="cKonDesc" placeholder="Masukan Konsumen" maxlength="100" readonly value="UMUM">
                                                <span class="help-block"></span>  
                                            </div>
                                            <div class="col-sm-1 d-none">
                                                <label style="opacity: 0">.</label>
                                                <input type="button" class="form-control btn btn-primary" value="Pilih" onclick="konsumen();">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Ongkos Angkut</label>
                                                <input type="text" style="font-size: 12px;" id="nOA" name="nOA" class="form-control" style="color: #000;text-align: right;" value="0">
                                            </div>
                                             <div class="col-sm-6">
                                                <label>Pembayaran</label>
                                                <select class="form-control" id="cBayar" name="cBayar" style="font-size: 12px;">
                                                    <option value="BELUM">Belum</option>
                                                    <option value="SUDAH">Sudah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-4 d-none">
                                                <label>Status</label>
                                                <select id="cStatus" name="cStatus" class="form-control">
                                                    <!-- <option value="Tunggu">Tunggu</option> -->
                                                    <option value="Setuju">Setuju</option>
                                                    <option value="Tidak Setuju">Tidak Setuju</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label>Keterangan</label>
                                               <input class="form-control" id="cDesc" name="cDesc" placeholder="Masukan Keterangan" maxlength="100" readonly style="font-size: 12px;">
                                                <span class="help-block"></span>  
                                            </div>
                                        </div>

                                        <div class="row">
                                             <div class="col-sm-12">
                                               <label>Tutup Transaksi</label>
                                                <select class="form-control" id="cClose" name="cClose" onchange="change_value(this)" disabled style="font-size: 12px;">
                                                    <option value="T">Tidak</option>
                                                    <option value="Y">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <div class="col-sm-8"  name="input_header">
                                             <!-- <br><br> <br><br><br> -->
                                             <label style="opacity: 0">.</label>
                                            <a class="btn btn-success btnSave1 form-control" id="btnSave1" onclick="Save_header1()" style="color: #fff;font-size: 12px">Simpan/Buat Nomor</a>
                                            <!-- <a class="btn btn-danger btnHapus" id="btnHapus">hapus</a> -->
                                            </div>

                                            <div class="col-sm-4">
                                                <label style="opacity: 0">.</label>
                                                <!-- <a class="btn btn-primary form-control" id="btnTambah" name="btnTambah" style="color: #fff">Tambah</a> -->
                                                <a class="btn btn-info btnPrevious form-control" id="btnPrevious" style="color: #fff;font-size: 12px">Kembali</a>
                                            </div>
                                        </div>

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card text-dark" style="">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-dark">Keranjang Barang</h4>
                                                    </div>
                                                    <div class="card-body">

                        <!-- =============================================================================== -->


                                         <div class="form-group row">
                                              <div class="col-md-2">
                                            <label>Kode</label>
                                                <input type="text" class="form-control" name="cGoodID" id="cGoodID" placeholder="Kode Barang" readonly style="font-size: 12px;">
                                            </div>

                                            <div class="col-sm-3">
                                            <label>Nama Barang</label>
                                                <input type="text" class="form-control" name="cGoodDesc" id="cGoodDesc" placeholder="Nama Barang" readonly style="font-size: 12px;">
                                            </div>
                                            <div class="col-sm-1 d-none">
                                            <label>Satuan</label>
                                                <input type="text" class="form-control" name="cUnit" id="cUnit" placeholder="Satuan" readonly style="font-size: 12px;">
                                            </div>
                                            <div class="col-sm-1 ">
                                                <label style="opacity: 0">.</label>
                                                <input type="button" class="form-control btn btn-success" value="..." onclick="Barang();" style="font-size: 12px;">
                                            </div>

                                            <div class="col-sm-2">
                                                <label>Qty</label>
                                                <input type="text" name="nQty" id="nQty" class="form-control" value="0" readonly style="text-align: right;font-size: 12px">
                                                <input type="hidden" name="nStock" id="nStock" class="form-control" value="0" readonly style="text-align: right;">
                                            </div>
                                            <div class="col-sm-2 " id="Harga">
                                                <label>Harga</label>
                                                <input type="text" name="nPrice" id="nPrice" class="form-control" value="0" readonly style="text-align: right;font-size: 12px">
                                            </div>

                                            <div class="col-sm-2 d-none">
                                                <label>hpp</label>
                                                <input type="text" name="nHpp" id="nHpp" class="form-control" value="0" readonly style="text-align: right;font-size: 12px">
                                            </div>
                                            

                                            <div class="col-sm-2 " id="Total">
                                                <label>Total</label>
                                                <input type="text" name="nCost" id="nCost" class="form-control" value="0" readonly style="text-align: right;font-size: 12px">
                                            </div>

                                            <div class="col-sm-4 d-none">
                                                <label>Keterangan</label>
                                                <input type="text" name="cDesc2" id="cDesc2" class="form-control" value="" readonly style="text-align: right;">
                                            </div>

                                         </div>

                                        <div class="form-group">
                                             <div  class="col-sm-12">
                                                 <a class="form-control btn btn-warning btn_detil" id="btn_detil" onclick="savedetil()" style="color: #fff;font-size: 12px">Masukan Item Barang Ke List</a>
                                            </div>
                                        </div>
                                        <!-- ================================================== -->


                                                        <!-- isi item -->
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <table id="table3" class="display table table-striped table-bordered" style="width:100%;font-size: 12px; background-color: #fff">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="width:10px;" align="center">No</th>
                                                                            <th>Kode</th>
                                                                            <th>Nama Barang</th>
                                                                            <th>Satuan</th>
                                                                            <th>Jumlah</th>
                                                                            <?php if($user != "07"){ ?>
                                                                            <th>Harga</th>
                                                                            <th>Total</th>
                                                                            <?php } ?>
                                                                            <?php if($user == "07"){ ?>
                                                                            <th>Keterangan</th>
                                                                            <?php } ?>
                                                                            <th>Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    </tbody>
                                                                   
                                                                    </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                    <div id="modal_konsumen" class="modal fade glass" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" style="width:65%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="custom-width-modalLabel">Daftar Konsumen</h4>
                                        </div>
                                        <div class="modal-body">
                                             <table id="datatable_Konsumen" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <!-- <th style="width:30%;">Kode</th> -->
                                                        <th style="width:190%;">Konsumen</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no = 1;
                                                    foreach($list4 as $value){ 
                                                        if($value->cUserGrpID == "02"){
                                                        ?>
                                                    <tr class="isi_tabel Pilih4" id="<?php echo $value->cEmailID ?>">
                                                        <td><?php echo $no ?></td>
                                                        <!-- <td><?php echo $value->cWhdID ?></td> -->
                                                        <td><?php echo $value->cName?></td>
                                                    </tr>
                                                    <?php 
                                                    $no += 1;
                                                    }} ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <!-- <th style="width:30%;">Kode</th> -->
                                                        <th style="width:190%;">Konsumen</th>      
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
                                             <table id="datatable_barang" class="table table-striped table-bordered" width="100%" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:30%;">Kode Stock</th>
                                                        <th style="width:190%;">Barang</th>
                                                        <th style="width:30%;">Satuan</th> 
                                                        <th style="width:30%;">Stock</th> 
                                                        <th style="width:30%;">HPP</th> 
                                                        <th style="width:30%;">Harga Jual</th> 
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                               
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                    
                        </div>
                    </section>
                </div> <!-- end col -->
            </div>

<script type="text/javascript">    
var save_method; //for save method string
var save_methoddetil;
var table;
var id_menu;
var id_menu_T;
var table_detail;
var table_detail3;
var table_detail3View;
var table_Stock;
// AWAL START
$(document).ready(function() {
if(cUserID.value != "01"){
    $('#Harga').show();
    $('#Total').show();
}


$('#btnSave').hide();
$('#show_save_detil').hide();
// document.getElementById("myTot").style.display = "none";

$('#datatable_Pemakaian').DataTable({ 
        "paging": true,
        });
 $('#datatable_gudang').DataTable({ 
        "paging": true,
        });

 $('#datatable_Konsumen').DataTable({ 
        "paging": true,
        });

//datatables
    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        //"responsive": true,
        "paging": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_Transaksi/ajax_list_BKB')?>",
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
    table_detail3.ajax.reload();
    $('.btnAdd').hide();
   $('#from1')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    //$('.del_red').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
     
    document.getElementById("cDesc").readOnly = false;
    cClose.disabled = true;
    $('#input_barcode').show();  
    $('#btnTambah').show();
    cClose.disabled = true;
    $('#btnSave').show();
    $('#btnTambah').hide();
    table_Stock.ajax.reload();
    // table_detail.ajax.reload();
    // table_detail3.ajax.reload();
    save_method ="add";
    Hli2.click();
    $('#show_save_detil').hide();
    }); 

    $('#btnTambah').click(function(){
    $('#from1')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    //$('.del_red').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
     
    document.getElementById("cDesc").readOnly = false;
    table_Stock.ajax.reload();
    cClose.disabled = true;
    $('#input_barcode').show();  
    $('#btnTambah').show();
    cClose.disabled = true;
    $('#btnSave').show();
    $('#btnTambah').hide();
    // table_detail.ajax.reload();
    // table_detail3.ajax.reload();
    save_method ="add";
    $('#show_save_detil').hide();
    }); 


function Save_header1()
{
    if(cKonID.value == ""){
        alert("Lengkapi Data!!!");
        return false;
    }
    //Ajax Load data from ajax
    var inisial = "<?php echo $this->session->userdata('cInitOut') ?>";
    $.ajax({
        url : "<?php echo site_url('C_Transaksi/ajax_nomor_BKB')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           if(save_method == "add"){
           var Pk_NO = parseInt(data.cBKBNo.substr(7))+1;
           var dateBulan = data.dTrx.substr(5,2);
           var dateTahun = data.dTrx.substr(0,4);
           var nomor = dateTahun+dateBulan+sprintf('%04d',Pk_NO);
           $('[name="cBKBNo"]').val(inisial+nomor);
           }
           save();
           $('#btnSave').hide();
           $('#btnTambah').hide();
           $('#show_save_detil').show();
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
        url = "<?php echo site_url('C_Transaksi/ajax_add_tbkb1') ?>";
    } else {
        url = "<?php echo site_url('C_Transaksi/ajax_update_tbkb1')?>/"+id_menu_T;
        Hli1.click();
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
                id_menu_T = cBKBNo.value;
                reloadTable();
                table_detail3View.ajax.reload(null,false);
                table_detail3.ajax.reload();
                table_Stock.ajax.reload();
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


function delete_BKB1(id)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Transaksi/ajax_delete_tbkb1')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                table.ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               error_Detil();
            }
        });
    }
}

function edit_BKB1(id)
{
    save_method = 'update';
    id_menu_T = id;
    //Ajax Load data from ajax
   // var URL= "<?php echo site_url('C_Transaksi/ajax_edit_tbkb1/')?>/"+id;
    // window.open(URL, '_blank');
    $.ajax({
        url : "<?php echo site_url('C_Transaksi/ajax_edit_tbkb1/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
var bulan = ['','Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
//08-09-2018
bulan1= data.dTrx.slice(5,7);
Tahun1 = data.dTrx.slice(0,4);
tgl1 = data.dTrx.slice(8,10);
var bulan = bulan[parseInt(bulan1)];
var tgl_fix = tgl1+" "+bulan+" "+Tahun1;
            $('[name="cBKBNo"]').val(data.cBKBNo);
            $('[name="nOA"]').val(data.nOA);
            $('[name="cStatus"]').val(data.cStatus);
            $('[name="cKonID"]').val(data.cKonID);
            $('[name="cKonDesc"]').val(data.cName);
            $('[name="cDesc"]').val(data.cDesc);
            $('[name="cClose"]').val(data.cClose);
            $('[name="cBayar"]').val(data.cBayar);
            $('[name="dTrx"]').val(tgl_fix);
            Hli2.click();
            $('#btnSave').show();
            table_Stock.ajax.reload();
            sum_total_bkb();
     
    document.getElementById("cDesc").readOnly = false;
    // table_detail.ajax.reload();
    table_detail3.ajax.reload();  
    table_Stock.ajax.reload();
    $('#btnSave').show();
    $('#btnTambah').show();
    cClose.disabled = false;  
    $('#show_save_detil').show();
    $('#detil3').show();
    $('#detil3_view').hide();

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}

$(document).ready(function() {
    table_detail3 = $('#table3').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
       // "responsive": true,
        "paging": true,
        "scrollY": 200,
        "scrollX": true,
        "scrollCollapse": true,
      "language": {
            "info": ""
        },
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_Transaksi/ajax_list_BKB2')?>",
            "type": "POST",
            "data": function ( data ) {
                data.cBKBNo = $('#cBKBNo').val();
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

table_detail3View = $('#table3_View').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
       // "responsive": true,
        "paging": true,
        "scrollY": 200,
        "scrollX": true,
        "scrollCollapse": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_Transaksi/ajax_list_BKB2')?>",
            "type": "POST",
            "data": function ( data ) {
                data.cBKBNo = $('#cBKBNo').val();
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
table_detail3View.ajax.reload();


table_Stock = $('#datatable_barang').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
       // "responsive": true,
        "paging": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_Transaksi/ajax_list_stock')?>",
            "type": "POST",
            "data": function ( data ) {
                data.cWhdID = $('#cWhdID').val();
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
table_Stock.ajax.reload();


});

function savedetil()
{
    if(cBKBNo.value==""){
        alert("Silahkan Buat Nomor Transaksi Dahulu!!!");
        return false;
    }

    if(cGoodID.value==""|| nQty.value==""){
        alert("Mohon lengkapi Data")
        return false;
    }

    var qty = parseFloat(nQty.value.split(".").join("").split(",").join("."));
    var stock = parseFloat(nStock.value.split(".").join("").split(",").join("."));
    
    if(qty>stock){
        alert("Stock Tidak Cukup");
        return false;
    }
    $('#btn_detil').text('saving...'); //change button text 
    var url;
    if(save_methoddetil == 'add') {
        url = "<?php echo site_url('C_Transaksi/ajax_add_tbkb2Detil') ?>";
    } else {
        url = "<?php echo site_url('C_Transaksi/ajax_update_tbkb2Detil')?>";
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
                Sukses_simpan();
                table.ajax.reload();
                table_detail3.ajax.reload();
                table_Stock.ajax.reload();
                cClose.disabled = false;
                bersih_detil();
                sum_total_bkb();
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
            table_Stock.ajax.reload();
            //error2()
            error()
            $('#btn_detil').text('Masukan Item Barang'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
         
        }
    });   
}




function sum_total_bkb(){
     $.ajax({
        url : "<?php echo site_url('C_Transaksi/sum_penjualan/')?>/"+cBKBNo.value,
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

function Pemakaian()
{
    $('#modal_Pemakaian').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Pemakaian'); // Set Title to Bootstrap modal title
}

function Gudang()
{
    $('#modal_gudang').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Gudang'); // Set Title to Bootstrap modal title
}

function konsumen()
{
    $('#modal_konsumen').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Konsumen'); // Set Title to Bootstrap modal title
}

function Barang()
{
    $('#modal_barang').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Barang'); // Set Title to Bootstrap modal title
}



$(document).on('click', '.pilih', function (e) {
    document.getElementById("cUseID").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var cUseDesc = document.getElementById('cUseDesc');
    cUseDesc.value = cells[2].innerHTML;    
    $('#modal_Pemakaian').modal('hide');             
    });

$(document).on('click', '.Pilih2', function (e) {
    document.getElementById("cWhdID").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var cWhdDesc = document.getElementById('cWhdDesc');
    cWhdDesc.value = cells[2].innerHTML;    
    $('#modal_gudang').modal('hide');             
    });

$(document).on('click', '.Pilih4', function (e) {
    document.getElementById("cKonID").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var cKonDesc = document.getElementById('cKonDesc');
    cKonDesc.value = cells[1].innerHTML;    
    $('#modal_konsumen').modal('hide');             
    });

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

function bersih_detil(){
    cGoodID.value ="";
    cGoodDesc.value ="";
    cUnit.value = "";
    nQty.value = 0;
    nPrice.value = 0;
    nCost.value = 0;
    cDesc2.value = "";
}

function delete_BKB2(id)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Transaksi/ajax_delete_tbkb2')?>/"+id+"/"+cBKBNo.value,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                table_detail3.ajax.reload(null,false);
                table_Stock.ajax.reload();
                sum_total_bkb();
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
        url : "<?php echo site_url('C_Transaksi/ajax_edit_BKB2/')?>/"+id+"/"+id2,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#btn_detil').text('Update');
            $('[name="cGoodID"]').val(data.cGoodID);
            $('[name="cGoodDesc"]').val(data.cGoodDesc);
            $('[name="cUnit"]').val(data.cUnit);
            $('[name="nQty"]').val(data.nQty);
            $('[name="nPrice"]').val(data.nPrice);
            $('[name="nCost"]').val(data.nCost);
            $('[name="cDesc2"]').val(data.cDesc2);
            
            //document.getElementById("nQty").readOnly = false; 
            //document.getElementById("nCost").readOnly = false; 
            document.getElementById("nQty").readOnly = false;
            document.getElementById("cDesc2").readOnly = false;
            
            table_Stock.ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}

$('.btnPrevious').click(function(){
    Hli1.click();
    bersih();
    $('.btnAdd').show();
    });

function bersih(){
    Hli1.click();
    $('#show_save_detil').hide();
    $('#from1')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    //$('.del_red').removeClass('has-error'); // clear error class
    $('.help-block').empty();

    $('#btnSave').hide();
    $('#btnTambah').show();
    $('#detil3').show();
    $('#detil3_view').hide();
}

function Cetak(id){
   // alert(id);
   var URL = "<?php echo site_url('C_Laporan/cetak_tbkb1')?>/"+id;
    $.ajax({
            type: "POST",
            url : URL,
            data: "id="+id,
            success: function(data)
            {
            window.open(URL, '_blank');
            }
        });
}

function change_value(cClose){
    if (document.getElementById("cClose").value == ''){
         $('#btnSave').hide();
    }
    else
    if (document.getElementById("cClose").value !=''){
         $('#btnSave').show();
         $('#btnTambah').show();
    }
}

$('#datatable_barang tbody').on('click', 'tr', function () {
  var tr = $(this).closest('tr');
  var id = tr.children('td:eq(1)').text();
  var id2 = tr.children('td:eq(2)').text();
  var id3 = tr.children('td:eq(3)').text();
  var id4 = tr.children('td:eq(4)').text();
  var id5 = tr.children('td:eq(5)').text();
  var id6 = tr.children('td:eq(6)').text();
  
  cGoodID.value = id;
  cGoodDesc.value=id2;
  cUnit.value = id3;
  nPrice.value = id6;
  nStock.value = id4;
  nHpp.value = id5;
  document.getElementById("nQty").readOnly = false; 
  document.getElementById("nCost").readOnly = true; 
  document.getElementById("nPrice").readOnly = true; 
  save_methoddetil = 'add';
  $('#modal_barang').modal('hide');

 
    });

function cek_mStock()
{
    $.ajax({
        url : "<?php echo site_url('C_Transaksi/ajax_cek_mstock/')?>/"+cGoodID.value+"/"+cWhdID.value+"/"+nQty.value,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
         //  alert(data.cGoodID);
           if(data.cGoodID !="0"){
              // alert("ada");
              // alert(data.cGoodID);
               savedetil();
            }
            else{
                alert("Stok Tidak Cukup");
                // bersih_detil();
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
          //  kosong();
        }
    });
}



function change_value2(cClose){
    

    if (document.getElementById("cDK").value == 'D'){
         // $('#btnSave').hide();
         cUseID.value ="T002";
         cUseDesc.value = "PENJUALAN";
    }
    else{
            cUseID.value ="T001";
            cUseDesc.value = "PRIVE";
    }

}

</script>



<script>

function save_detil_barang()
{
    var url;  
    url = "<?php echo site_url('C_Transaksi/ajax_update_tbkb2_detil')?>";
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
                Sukses_simpan();
                reloadTable();
                table_detail3View.ajax.reload(null,false);
                table_detail3.ajax.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            error2()
        }
    });
   
}


function save_detil_barang2()
{
    var url;  
    url = "<?php echo site_url('C_Transaksi/ajax_update_tbkb2_detil_batal')?>";
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
                Sukses_simpan();
                reloadTable();
                table_detail3View.ajax.reload(null,false);
                table_detail3.ajax.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            error2()
        }
    });
}



function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Apakah Anda Yakin Ingin Keluarkan Barang dari gudang?");
        if(result){
            // alert('yes');
            save_detil_barang();
            return true;
        }else{
            return false;
        }
    }else{
        alert('Pilih salah satu Barang');
        return false;
    }
}


function batal_masuk(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Apakah Anda Yakin Ingin Batalkan Keluarkan Barang dari gudang?");
        if(result){
            // alert('yes');
            save_detil_barang2();
            return true;
        }else{
            return false;
        }
    }else{
        alert('Pilih salah satu Barang');
        return false;
    }
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
