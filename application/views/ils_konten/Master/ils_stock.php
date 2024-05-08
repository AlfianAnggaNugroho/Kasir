
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
                   
                </div>
            </div>
<hr>
        

        <div class="col-lg-12">
            <section class="panel">
              <div class="panel-body">
                            <div class="col-md-14">
                        <div class="card-box">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                        <div class="card-box">
                                            <table id="table" class="table table-striped table-bordered display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th align="center">No</th>
                                                    <th>Tgl Stock</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama</th>
                                                    <th>Qty</th>
                                                    <th>HPP</th>
                                                    <th>Total RP</th>
                                                    <th>Harga Jual(20%)</th>
                                                    
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
                    </section>
        </div>




                                <div id="modal_barang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" style="width:60%;">
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
                                                        <th style="width:30%;">Kode</th>
                                                        <th style="width:190%;">Barang</th>
                                                        <th style="width:30%;">Satuan</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no = 1;
                                                    foreach($list2 as $value){ ?>
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

<!--  JAVA SCRIPT DAN AJAX  -->
<script type="text/javascript">

var save_method; //for save method string
var table;
var id_menu_T;



$(document).ready(function() {
    $('.detil').hide();
    $('.btnSave').hide();

$('#datatable_barang').DataTable({
        "paging": true,
});

    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "paging": true,
        //"fix" : true,
        "scrollY": 200,
        "scrollX": true,
        "scrollCollapse": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            
            "url": "<?php echo site_url('C_Master/ajax_list_stock') ?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ 0 ], //first column
                "orderable": false, //set not orderable
            },
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },

        ],


    });

    //set input/textarea/select event when change value, remove class error and remove text help block
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

    //check all
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
        showBottomDelete();
    });
});

</script>


<!-- ============================================================================================================ -->
<script type="text/javascript">
// JAVASCRIP NEXT TAP
    function tambah_data(){
    $('#btnSave').text('Save');
   
    $('.detil').hide();
    
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
    }

    $('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
</script>

<script type="text/javascript">
    //TAMBAH
    $('.btnAdd').click(function(){ 

    document.getElementById("nCurQty").readOnly = false;
    document.getElementById("nCurCost").readOnly = false;
    document.getElementById("nSale").readOnly = false;
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
    save_method ="add";
    $('.btnSave').show();
    $('.btnAdd').hide();
    }); 

// ======================================== KONTROL TAB KONTEN =====================================================
$('#Fli3').click(function(){
    document.getElementById("li1").classList.remove("active");
    document.getElementById("li2").classList.remove("active");
    document.getElementById("li3").classList.add("active");
});

$('#Fli2').click(function(){
    document.getElementById("li1").classList.remove("active");
    document.getElementById("li2").classList.add("active");
    document.getElementById("li3").classList.remove("active");
});

$('#Fli1').click(function(){
    document.getElementById("li1").classList.add("active");
    document.getElementById("li2").classList.remove("active");
    document.getElementById("li3").classList.remove("active");
});

$('#Hli3').click(function(){
    document.getElementById("li1F").classList.remove("active");
    document.getElementById("li2F").classList.remove("active");
    document.getElementById("li3F").classList.add("active");
});

$('#Hli2').click(function(){
    document.getElementById("li1F").classList.remove("active");
    document.getElementById("li2F").classList.add("active");
    document.getElementById("li3F").classList.remove("active");
});

$('#Hli1').click(function(){
    document.getElementById("li1F").classList.add("active");
    document.getElementById("li2F").classList.remove("active");
    document.getElementById("li3F").classList.remove("active");
});

$('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    $('#from1')[0].reset();
    bersih();
    });

function Barang()
{
    $('#modal_barang').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Barang'); // Set Title to Bootstrap modal title
}

$(document).on('click', '.Pilih3', function (e) {
    document.getElementById("cGoodID").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var cGoodDesc = document.getElementById('cGoodDesc');
    var desc = cells[2].innerHTML;
    cGoodDesc.value = desc.replace("&amp;","&");
    $('#modal_barang').modal('hide');             
    });

function reloadTable()
{
    table.ajax.reload(null,false); //reload datatable ajax
}

function save()
{  
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
    //notifikasi_gagal();
    if(save_method == 'add') {
        url = "<?php echo site_url('C_Master/ajax_add_mstock') ?>";
    } else {
        url = "<?php echo site_url('C_Master/ajax_update_mstock')?>/"+id_menu_T;
        
    }
     // window.open(url, '_blank');
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
                reloadTable();
                $('.nav-tabs > .active').prev('li').find('a').trigger('click');
                bersih();
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
            error2();
             // window.open(url, '_blank');
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
         
        }
    });
}

function bersih(){
    $('.btnSave').hide();
    $('.btnAdd').show();
    document.getElementById("nCurQty").readOnly = false;
    document.getElementById("nCurCost").readOnly = false;
}

function delete_mstock(id,id2)
{
    if(confirm('Are you sure delete this data? '+id2))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Master/ajax_delete_mstock')?>/"+id+"/"+id2,
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


function edit_mstock(id,id2)
{
    // $('#from1')[0].reset(); // reset form on modals
    save_method = 'update';
    id_menu_T = id2;
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Master/ajax_edit_mstock/')?>/"+id+"/"+id2,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
    
            $('[name="nCurQty"]').val(data.nCurQty);
            $('[name="nCurCost"]').val(data.nCurCost);
            $('[name="cGoodID"]').val(data.cGoodID);
            $('[name="cGoodDesc"]').val(data.cGoodDesc);
            $('[name="dStock"]').val(data.dStock);
            $('[name="nSale"]').val(data.nSale);
            
            document.getElementById("nCurQty").readOnly = false;
            document.getElementById("nCurCost").readOnly = false;
            $('.btnSave').show();
            $('.btnAdd').hide();
            $('.nav-tabs > .active').next('li').find('a').trigger('click');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}

</script>
