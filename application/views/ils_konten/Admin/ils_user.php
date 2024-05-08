
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
       
 <!-- end page title end breadcrumb -->
        <div class="row">
        <!-- <hr> -->
          <div class="col-lg-12">
            <section class="panel">
              <div class="panel-body">
                <table id="table" id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th align="center">No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Name</th>
                                        <th>Group User</th>
                                        <th style="width:150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th align="center">No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Name</th>
                                        <th>Group User</th>
                                        <th style="width:150px;">Aksi</th>                                    
                                    </tr>
                                </tfoot>
                </table>
              </div>
            </section>
          </div>
        </div>



                <!-- Bootstrap modal -->
                    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                        <div class="modal-body form">
                            <form action="#" id="form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                             <label class="control-label">Username</label>
                                            <input name="cEmailID" placeholder="Masukan Username" class="form-control" type="text" maxlength="50">
                                            <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <input name="cPassword" placeholder="Masukan Password" class="form-control" type="Password">
                                            <span class="help-block"></span>
                                            </div>
                                        </div>
                                       
                                    </div>

                                     <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <input name="cName" placeholder="Masukan Nama" class="form-control" type="text">
                                            <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group"> 
                                            <label class="control-label">Jabatan</label>
                                            <select name="cUserGrpID" class="form-control">
                                            <option value="">--Select Group User--</option>
                                            <?php
                                            foreach($list as $value){
                                            if($value->cUserGrpID !='02'){
                                            echo '<option value="'.$value->cUserGrpID.'">'.$value->cUserGrpDesc.'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                            <span class="help-block"></span>

                                            </div>
                                        </div>

                                        <div class="col-md-6 d-none">
                                            <div class="form-group">
                                                <label class="control-label">Perusahaan</label>
                                                <select name="cBranchID" class="form-control">
                                                <?php
                                                foreach($list2 as $value2){
                                                echo '<option value="'.$value2->cBranchID.'">'.$value2->cBranchDesc.'</option>';
                                                }
                                                ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                            </form>
                        </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
            
            "url": "<?php echo site_url('C_Master/ajax_list_user') ?>",
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
    $('.modal-title').text('Input User Baru'); // Set Title to Bootstrap modal title
}

function edit_user(id)
{
    //alert(id);
    save_method = 'update';
    id_menu_T = id;
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Master/ajax_edit_user/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="cEmailID"]').val(data.cEmailID);
            $('[name="cPassword"]').val(data.cPassword);
            $('[name="cName"]').val(data.cName);
            $('[name="cUserGrpID"]').val(data.cUserGrpID);
            $('[name="cBranchID"]').val(data.cBranchID);
            
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
        url = "<?php echo site_url('C_Master/ajax_add_user') ?>";
    } else {
        url = "<?php echo site_url('C_Master/ajax_update_user')?>/"+id_menu_T;
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
                notifikasi();
                reloadTable();
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

function delete_user(id)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Master/ajax_delete_User')?>/"+id,
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
