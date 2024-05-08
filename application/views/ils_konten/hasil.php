
<form action="#" id="from1" role="form" class="form-horizontal" data-parsley-validate novalidate>
<?php 
foreach ($list as $value) {
   if($value->cBKBNo == $BKBNo){
        $tangagl = $value->dTrx;
        $status = $value->cStatus;
        $konsu = $value->cName;
        $hp = $value->cHP;
        $Alamat = $value->cAddress;
   }
}
?>
            
             <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <h4 class="header-title m-t-0 m-b-30">Order Barang</h4>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>No Faktur</label>
                                        <input type="text" class="form-control" name="cBKBNo" id="cBKBNo" value="<?php echo $BKBNo ?>" readonly>
                                    </div>

                                    <div class="col-sm-3">
                                        <label>Tanggal</label>
                                        <input type="text" class="form-control" name="dTrx" id="dTrx" value="<?php echo $tangagl ?>" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Konsumen</label>
                                        <input type="text" class="form-control" name="cKonName" id="cKonName" value="<?php echo $konsu ?>" readonly>
                                    </div>

                                    <div class="col-sm-2">
                                        <label>Status</label>
                                        <input type="text" class="form-control" name="cStatus" id="cStatus" value="<?php echo $status ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>HP</label>
                                        <input type="text" class="form-control" name="cHP" id="cHp" value="<?php echo $hp ?>" readonly>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="cAlamat" id="cAlamat" value="<?php echo $Alamat ?>" readonly>
                                    </div>

                                </div>

                                     <div class="form-group">
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

                                    <div class="form-group" id="detil3">
                                            <div class="col-sm-3">
                                                <!-- <input class="btn btn-info" name="btnsave" value="Cekout" onclick="cekout()"> -->
                                            </div>
                                    </div>

                            </div>
                        </div>
                    </div>
            </div>
</form>




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

//datatables
    table = $('#table3').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        //"responsive": true,
        "paging": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_Home/ajax_list_BKB2')?>",
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

    table.ajax.reload();
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


function edit_sup(id)
{
    save_method = 'update';
    id_menu_T = id;
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Home/ajax_edit_qty/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="cStockID"]').val(data.cStockID);
            $('[name="demo0"]').val(data.nQty);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}



function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('C_Home/ajax_add_msize') ?>";
    } else {
        url = "<?php echo site_url('C_Home/ajax_update_qty')?>/"+id_menu_T;
    }

    // window.open(url, '_blank');

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
              $('#modal_form').modal('hide');
               table.ajax.reload();
                
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
            notifikasi_gagal();
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function delete_sup(id)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Home/ajax_delete_qty')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                table.ajax.reload();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
}


function cekout()
{
    if(confirm('Anda Yakin ingin cekout?'))
    {
        var  url = "<?php echo site_url('C_Home/checkout')?>";
        window.open(url, '_blank');
    }
}

</script>
