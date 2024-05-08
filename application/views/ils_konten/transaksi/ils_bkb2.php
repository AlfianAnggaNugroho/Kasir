                <?php 
                    $user =$this->session->userdata('cUserGrpID');
                ?>

                     <?php 
                    if($user != "01" AND $user !="05"){
                        $hakacs = "hidden";
                            $hk = "";
                                                   
                    }
                    else{
                            $hakacs = "";
                            $hk = "hidden";
                    }
                    ?>
                <input type="hidden" name="cUserID" id="cUserID" value="<?php echo $user ?>">
                <!-- Page-Title -->
               
                <!-- end page title end breadcrumb -->
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <h4 class="header-title m-t-0 m-b-30">Transaksi</h4>
                            <ul class="nav nav-tabs">
                                <li class="active" id="li1"><a href="#tab1" id="Hli1" data-toggle="tab">Daftar</a></li>
                                <li class="" id="li2"><a href="#tab2" id="Hli2" data-toggle="tab">Detail</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                <form id="form-filter" class="form-horizontal">
                                    <br>
                                    <div class="form-group">
                                            <div class="col-sm-1">
                                                <a class="btn btn-primary btnRefresh" onclick="reloadTable()">Refresh</a>
                                            </div>
                                            <div class="col-sm-2">
                                               <input type="text" name="dDisplay1" id="dDisplay1" placeholder="Masukan Tanggal" class="form-control input"  style="cursor:pointer"/>
                                            </div>
                                            
                                            <div  class="col-sm-2">
                                                <!-- <input type="text" name="cTahun" placeholder="Masukan Tahun" class="form-control"> -->
                                                <input type="text" name="dDisplay2" id="dDisplay2" placeholder="Masukan Tanggal" class="form-control input"  style="cursor:pointer"/>
                                            </div>
                                            <div  class="col-sm-2">
                                                 <a class="btn btn-info btndisplay" id="btn_proses">Proses</a>
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
                                                        <th>Nomor Penjualan</th>
                                                        <th>Tanggal</th>
                                                        <th>Konsumen</th>
                                                        <th>Persetujuan</th>
                                                        <th>Pembayaran</th>
                                                        <th style="width:120px;">Aksi</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width:10px;" align="center">No</th>
                                                        <th>Nomor Penjualan</th>
                                                        <th>Tanggal</th>
                                                        <th>Konsumen</th>
                                                        <th>Persetujuan</th>
                                                        <th>Pembayaran</th>
                                                        <th style="width:120px;">Aksi</th>                                      
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                </div>

                                <div class="tab-pane" id="tab2">
                                    <form action="#" id="from1" role="form" class="form-horizontal" data-parsley-validate novalidate>
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label for="form" class="control-label">Nomor Transaksi</label>
                                                <input type="text" class="form-control" id="cBKBNo" name="cBKBNo" placeholder="Nomor Penjualan" readonly parsley-trigger="change" required>
                                                <span class="help-block"></span>  
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <?php $tglStok= $this->m_function->konv_tgl_indo("d M Y"); 
                                                        
                                                    ?>
                                                    <label>Tanggal Transaksi:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="dTrx" name="dTrx" style="cursor:pointer" readonly placeholder="Masukan Tanggal" value="<?php echo $tglStok ?>"><span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                    </div>
                                                    <span class="help-block"></span>  
                                                </div>
                                            </div> 

                                            <div class="col-sm-2 hidden">
                                                <label>Kode Konsumen</label>
                                                <input class="form-control" id="cKonID" name="cKonID" placeholder="Masukan Konsumen" maxlength="100" readonly type="" value="">
                                            </div>
                                             <div class="col-sm-6">
                                                <label>Konsumen</label>
                                                <input class="form-control" id="cKonDesc" name="cKonDesc" placeholder="Masukan Konsumen" maxlength="100" readonly value="">
                                                <span class="help-block"></span>  
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label>Status</label>
                                                <input type="text" class="form-control" name="cStatus" id="cStatus" value="" readonly>
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Ongkos Angkut</label>
                                                <input type="text" id="nOA" name="nOA" class="form-control" readonly>
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Status Pembayaran</label>
                                                <input type="text" id="cBayar" name="cBayar" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Keterangan</label>
                                                <input class="form-control" id="cDesc" name="cDesc" placeholder="Masukan Keterangan" maxlength="100" readonly>
                                                <span class="help-block"></span>  
                                            </div>
                                        </div>

                                        <div class="form-group" id="tampil">
                                            <div class="col-sm-7">
                                                <img src="" width="400" height="100" class="img-thumbnail" name="foto_lama" id="foto_lama" />
                                            </div>

                                            <div class="col-sm-3">
                                                <label>Bukti Pembayaran</label>
                                                <!-- <input type="text"  onclick="upload()" value="upload" class="form-control btn-success">  -->
                                                <a class="btn btn-success btnsave form-control" id="btnSave" onclick="upload()">Upload</a>
                                                <label style="font-size: 12px;color: #fe0729">Format : *.jpg/*.jpeg/*.png/</label>
                                            </div>
                                        </div>
                    
                    
                                        <div class="form-group">
                                            <div class="col-sm-6"  name="input_header">
                                             <!-- <br><br> <br><br><br> -->
                                            <!-- <a class="btn btn-success btnsave " id="btnSave" onclick="Save_header1()">Save</a> -->
                                            <!-- <a class="btn btn-danger btnHapus" id="btnHapus">hapus</a> -->
                                            <a class="btn btn-info btnPrevious" id="btnPrevious">Kembali</a>
                                            </div>
                                        </div>
<!-- ====================================================================================================================== -->
                                    <div id="show_save_detil">
                                    <!-- <form action="#" id="from2" role="form" class="form-horizontal" data-parsley-validate novalidate> -->
                                        <div class="form-group" id="detil3">
                                            <div class="col-sm-12">
                                                <table id="table3" class="display table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width:10px;" align="center">No</th>
                                                        <th>Kode</th>
                                                        <th>Nama Barang</th>
                                                        <th>Satuan</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Total</th>
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
                                                    </tr>
                                                </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                      

                                        <div class="form-group" id="detil3_view">
                                            <div class="col-sm-12">
                                                <table id="table3_View" class="display table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width:10px;" align="center">No</th>
                                                        <th>Kode</th>
                                                        <th>Nama Barang</th>
                                                        <th>Satuan</th>
                                                        <th>Qty</th>
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
                                                        <th>Qty</th>
                                                    </tr>
                                                </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                        </div>
                                    </form>
                                </div>
                            </div>

                    <div id="modal_konsumen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
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
                    <div id="modal_barang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" style="width:80%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="custom-width-modalLabel">Daftar Barang</h4>
                                        </div>
                                        <div class="modal-body">
                                             <table id="datatable_barang" class="table table-striped table-bordered">
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
                                                <tfoot>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:30%;">Kode Stock</th>
                                                        <th style="width:190%;">Barang</th>
                                                        <th style="width:30%;">Satuan</th> 
                                                        <th style="width:30%;">Stock</th> 
                                                        <th style="width:30%;">HPP</th> 
                                                        <th style="width:30%;">Harga Jual</th> 
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->



                <div class="modal fade" id="modal_form" role="dialog">
                    <div class="modal-dialog" style="width: 50%; text-align: left;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Form Upload</h3>
                            </div>
                        <div class="modal-body form">
                            <form method="post" id="form" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-2 hidden" id="foto_lama2">
                                            <!-- <label class="control-label">Foto Lama</label> -->
                                            
                                            <input type="" name="Gambar">
                                        </div>

                                         <div class="col-md-5">
                                            <label class="control-label">Upload</label>
                                            <input type="file" name="cGambar" id="cGambar" class="form-control btn-warning btn-xs" />
                                            <span class="help-block"></span>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <input type="submit" name="btnSave" id="btnSave" value="Save" class="btn btn-info" />
                                            <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button> -->
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                            <div class="modal-footer">
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- End Bootstrap modal -->



                    
                        </div>
                    </section>
                </div> <!-- end col -->

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
            "url": "<?php echo site_url('C_Home/ajax_list_BKB')?>",
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
   $('#from1')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    //$('.del_red').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
     
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
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
    $('#show_save_detil').hide();
    }); 

    $('#btnTambah').click(function(){
    $('#from1')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    //$('.del_red').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
     
    
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
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
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
            $('[name="dTrx"]').val(tgl_fix);
            $('[name="cBayar"]').val(data.cBayar);
            
            $('#foto_lama2').show();
            // alert(data.cGambar);
             $('#foto_lama').attr('src', '<?php echo base_url('upload/')?>/'+data.cGambar); 

            $('.nav-tabs > .active').next('li').find('a').trigger('click');
            $('#btnSave').show();

            table_Stock.ajax.reload();
     
    
    // table_detail.ajax.reload();
    table_detail3.ajax.reload();  
    table_Stock.ajax.reload();
    $('#btnSave').show();
    $('#btnTambah').show();
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
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btn_detil').text('Save'); //change button text
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            table_detail3.ajax.reload();
            table_Stock.ajax.reload();
            //error2()
            error()
            $('#btn_detil').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
         
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
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    bersih();
    });

function bersih(){
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
   var URL = "<?php echo site_url('C_Laporan/cetak_nota')?>/"+id;
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
      function GetFileName(){
          // Get your file input (by it's id)
          var fileInput = document.getElementById('cGambar');
          // Use a regular expression to pull the file name only
          var fileName = fileInput.value.split(/(\\|\/)/g).pop();
          // Alert the file name (example)
          $('#foto_lama').attr('src', '<?php echo base_url('upload/')?>/'+fileName); 
          // alert(fileName);
      }


function validasiFile(){
    var inputFile = document.getElementById('file');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!ekstensiOk.exec(pathFile)){
        alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png/.gif');
        inputFile.value = '';
        return false;
    }
}


</script>

