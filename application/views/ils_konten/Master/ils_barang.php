
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
                             <button type="button" class="custom-select custom-select-set form-control bg-info border-0 custom-shadow custom-radius" onclick="addEstudiante()" style="color: #fff"> <i class="fa fa-plus-circle"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
<hr>

        <div class="col-lg-12">
            <section class="panel">
              <div class="panel-body">
                            <table id="table" id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th align="center">No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <!-- <th>Min</th> -->
                                        <!-- <th>Max</th> -->
                                        <th>Group Barang</th>
                                        <!-- <th>Foto</th> -->
                                        <th style="width:150px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                
                            </table>
                        </div>
                    </section>
        </div>
                   





                <!-- Bootstrap modal -->
                <!-- Bootstrap modal -->
                    <div class="modal fade glass" id="modal_form" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>

                        <div class="modal-body form">
                            <form method="post" id="form" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Kode</label>
                                                <input name="cGoodID" id="cGoodID" placeholder="Kode Barang" class="form-control" type="text" maxlength="12">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <input name="cGoodDesc" id="cGoodDesc" placeholder="Nama Barang" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="">Satuan</label>
                                                <input name="cUnit" placeholder="Unit" id="cUnit" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-9">
                                            <label>Group Barang</label>
                                            <select name="cGoodGrpID" id="cGoodGrpID" class="form-control">
                                            <option value="">--Select Group Barang--</option>
                                            <?php
                                            foreach($list as $value){
                                            echo '<option value="'.$value->cGoodGrpID.'">'.$value->cGoodGrpDesc.'</option>';
                                            }
                                            ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="row d-none"> 
                                        <div class="col-md-2" id="foto_lama2">
                                            <label class="control-label">Foto Lama</label>
                                            <img src="" width="100" height="125" class="img-thumbnail" name="foto_lama" id="foto_lama" />
                                            <input type="hidden" name="Gambar">
                                        </div>

                                         <div class="col-md-5" >
                                             <label class="control-label">Foto Baru</label>
                                            <input type="file" name="cFoto" id="cFoto" class="form-control btn-warning btn-xs" />
                                            <span class="help-block"></span>
                                        </div>

                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Keterangan</label>
                                            <textarea name="cDesc" id="cDesc" class="form-control" placeholder="Masukan Keterangan Buku"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
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



<!--  JAVA SCRIPT DAN AJAX  -->
<script type="text/javascript">

var save_method; //for save method string
var table;
var id_menu_T;

$(document).ready(function() {
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            
            "url": "<?php echo site_url('C_Master/ajax_list_barang') ?>",
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

function showBottomDelete()
{
  var total = 0;

  $('.data-check').each(function()
  {
     total+= $(this).prop('checked');
  });

  if (total > 0)
      $('#deleteList').show();
  else
      $('#deleteList').hide();
}

function addEstudiante()
{
    $('#foto_lama2').hide();
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    save_method = 'add';
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Input Barang Baru'); // Set Title to Bootstrap modal title
}

function edit_good(id)
{
    save_method = 'update';
    id_menu_T = id;
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Master/ajax_edit_mgood/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#foto_lama2').show();
            $('[name="cGoodID"]').val(data.cGoodID);
            $('[name="cGoodDesc"]').val(data.cGoodDesc);
            $('[name="cUnit"]').val(data.cUnit);
            $('[name="cGoodGrpID"]').val(data.cGoodGrpID);
            $('[name="Gambar"]').val(data.cFoto);
            $('[name="cDesc"]').val(data.cDesc);
            $('#foto_lama').attr('src', '<?php echo base_url('upload/produk')?>/'+data.cFoto);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}

function reloadTable()
{
    table.ajax.reload(null,false); //reload datatable ajax
    $('#deleteList').hide();
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('C_Master/ajax_add_mgood') ?>";
    } else {
        url = "<?php echo site_url('C_Master/ajax_update_mgood')?>/"+id_menu_T;
    }

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
                reloadTable();
                notifikasi();
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

function delete_good(id)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Master/ajax_delete_mgood')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reloadTable();
                alert_hapus();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
}
</script>


<script type="text/javascript">
    nMin.addEventListener('keyup', function(e)
    {
        nMin.value = formatRupiah(this.value);
    }); 

    nMax.addEventListener('keyup', function(e)
    {
        nMax.value = formatRupiah(this.value);
    });    

</script>



<script>
$(document).ready(function(){
    var url;
    $('#form').on('submit', function(e){
        e.preventDefault();
       
        if(cGoodID.value=="" || cGoodDesc.value == "" || cUnit.value == "" || cGoodGrpID.value == ""||cDesc.value == "") {
            alert("Lengkapi data")
        }
        else{

        if(save_method == 'add') {
            url = "<?php echo site_url('C_Master/ajax_upload')?>";
        } else {
            url = "<?php echo site_url('C_Master/ajax_update_mgood')?>/"+id_menu_T;
        }

        // window.open(url, '_blank');

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
                $('#modal_form').modal('hide');
                reloadTable();
                }
            });
        
        
        }
    });
});
</script>
