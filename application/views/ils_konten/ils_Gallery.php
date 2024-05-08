
                <div class="row">
                    <div class="col-lg-14">
                        <div class="card-box">
                                <h2 class="header-title m-t-0 m-b-30">Gallery</h2>
                                <div class="icon-list-demo row">
                                    <div class="">
                                        <i class="fa fa-plus-circle" onclick="addEstudiante()"></i> Tambah
                                        <i class="glyphicon glyphicon-refresh" onclick="reloadTable()"></i> Refresh
                                    </div>
                                </div><br> 
                            <table id="table" id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th align="center">No</th>
                                        <th>ID Foto</th>
                                        <th>Nama Foto</th>
                                        <th>Gambar</th>
                                        <th style="width:150px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th align="center">No</th>
                                        <th>ID Foto</th>
                                        <th>Nama Foto</th>
                                        <th>Gambar</th>
                                        <th style="width:150px; text-align: center;">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap modal -->
                <div class="modal fade" id="modal_form" role="dialog">
                    <div class="modal-dialog" style="width: 50%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Form Gallery</h3>
                            </div>
                        <div class="modal-body form">
                            <form method="post" id="form" align="center" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-6 hidden">
                                            <label class="control-label">Kode Foto</label>
                                            <input name="cGalID" id="cGalID" placeholder="Kode Gallery" class="form-control" type="text"  readonly>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">Nama Foto</label>
                                            <input name="cName" id="cName" placeholder="Nama Gallery" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                        <div class="col-md-2" id="foto_lama2">
                                            <label class="control-label">Foto Lama</label>
                                            <img src="" width="100" height="125" class="img-thumbnail" name="foto_lama" id="foto_lama" />
                                            <input type="hidden" name="Gambar">
                                        </div>

                                         <div class="col-md-5" >
                                             <label class="control-label">Foto Gallery Baru</label>
                                            <input type="file" name="cGambar" id="cGambar" class="form-control btn-warning btn-xs" />
                                            <span class="help-block"></span>
                                        </div>

                                    </div>

                                     <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">Keterangan</label>
                                            <textarea name="cDesc" id="cDesc" class="form-control" placeholder="Masukan Keterangan Gallery"></textarea>
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
         // "scrollY": 200,
        "scrollX": true,
        "scrollCollapse": true,

        // Load data for the table's content from an Ajax source
        "ajax": {
            
            "url": "<?php echo site_url('C_Master/ajax_list_Gallery') ?>",
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
    save_method = 'add';

    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Input Gallery Baru'); // Set Title to Bootstrap modal title
    $('#foto_lama').attr('src', '');
    $('#foto_lama2').hide();
}

function edit_Gallery(id)
{
    save_method = 'update';
    id_menu_T = id;
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Master/ajax_edit_Gallery/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#foto_lama2').show();
            $('[name="cGalID"]').val(data.cGalID);
            $('[name="cName"]').val(data.cName);
            $('select[name="cPenerbitID"]').val(data.cPenerbitID);
            $('select[name="cPengarangID"]').val(data.cPengarangID);
            $('select[name="cGalleryGrpID"]').val(data.cGalleryGrpID);
            $('[name="cTahun"]').val(data.cTahun);
            $('[name="cDesc"]').val(data.cDesc);
            $('[name="Gambar"]').val(data.cGambar);
            $('.selectpicker').selectpicker('refresh'); 
            //$('[name="foto_lama"]').val(data.cGambar);

            $('#foto_lama').attr('src', '<?php echo base_url('./upload/gallery/')?>/'+data.cGambar);

            // $("input type=[file]").val('<?php echo base_url('./upload/gallery/')?>/'+data.cGambar);
            
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

function delete_Gallery(id,id2)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Master/ajax_delete_Gallery')?>/"+id+"/"+id2,
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

function deleteList()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    if(list_id.length > 0)
    {
        if(confirm('Are you sure delete this '+list_id.length+' data?'))
        {
            $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "index.php/estudiante/ajax_list_delete",
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        reloadTable();
                    }
                    else
                    {
                        alert('Failed.');
                    }

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
    else
    {
        alert('no data selected');
    }
}

</script>

<script>
$(document).ready(function(){
    var url;
    $('#form').on('submit', function(e){
        e.preventDefault();
       
        if(cName.value == ""|| cDesc.value == "") {
            Lengkapi_Data();
        }
        else{
        if($('#cGambar').val() == '' && save_method == 'add')
        {
            alert("Please Select the File");
        }
        else
        {
        if(save_method == 'add') {
            url = "<?php echo base_url(); ?>C_Master/ajax_upload";
        } else {
            url = "<?php echo site_url('C_Master/ajax_update_Gallery')?>/"+id_menu_T;
        }
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
        
        }
    });
});
</script>
