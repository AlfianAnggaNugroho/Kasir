


 <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Jabatan</h4>
                        </div>
                    </div>
                </div>
 <!-- end page title end breadcrumb -->
        <div class="row">
          
          <div class="col-lg-12">
            <section class="panel">
              <div class="panel-body">
                <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">Daftar Jabatan</a></li>
                                <li><a href="#tab2" data-toggle="tab">Inputan</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                        <div class="card-box">
                                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width:30px;" align="center">No</th>
                                                        <th style="width:40px;">Kode</th>
                                                        <th style="width:650px;">Group</th>
                                                        <th style="width:150px;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th align="center">No</th>
                                                        <th>Kode</th>
                                                        <th>Group</th>
                                                        <th style="width:150px;">Aksi</th>                                  
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    <a class="btn btn-primary btnAdd">Tambah</a>
                                    <a class="btn btn-primary btnRefresh" onclick="reloadTable()">Refresh</a>
                                </div>
                                
                                <div class="tab-pane" id="tab2">
                                        <div class="card-box">
                                            <form action="#" id="form">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                            <label class="control-label"><b>Kode Group</b></label>
                                                            <input name="cUserGrpID" id="cUserGrpID" placeholder="Masukan Kode Group" class="form-control" type="text" maxlength="50" readonly>
                                                            <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                            <label class="control-label"><b>Nama Group</b></label>
                                                            <input type="text" id="cUserGrpDesc" name="cUserGrpDesc" class="form-control" placeholder="Group" disabled="disabled">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                            <label class="control-label" style="opacity: 0">.</label>
                                                             <button type="button" id="btnSave" onclick="save2()" class="btn btn-primary form-control" disabled="disabled">Save</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                        </form>
                                    <a class="btn btn-primary btnAdd">Tambah</a>
                                    <a class="btn btn-primary btnPrevious">Previous</a>
                                </div>
                                </div>
                            </div>

              </div>
            </section>
          </div>
        </div>

                <!-- </div> end col -->
<!--  JAVA SCRIPT DAN AJAX  -->
<script type="text/javascript">

var save_method; //for save method string
var save_method2;

var table;
var id_menu;
var id_menu_T;

var table_menu;


function save2()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
    //notifikasi_gagal();
    if(save_method == 'add') {
        url = "<?php echo site_url('C_Master/ajax_add_userGrp1') ?>";
    } else {
        url = "<?php echo site_url('C_Master/ajax_update_userGrp1')?>/"+cUserGrpID.value;
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
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
               // $('#modal_form').modal('hide');
                reloadTable();
                $('.detil').show();
                save_method = 'update';
                notifikasi();
               // document.getElementById("cUserGrpID").readOnly = true; 
                table_menu.ajax.reload(null,false);
                
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
            $('.nav-tabs > .active').prev('li').find('a').trigger('click');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
           error2();
           // alert("jkhk");
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
            document.getElementById("cUserGrpID").readOnly = true; 
        }
    });
   
}

// AWAL START
$(document).ready(function() {
$('.detil').hide();
$('#datatable').DataTable({
    'paging' : true,
});

//table_menu.ajax.reload(null,false);
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
         // "scrollY": 200,
        "scrollX": true,
        "scrollCollapse": true,

        // Load data for the table's content from an Ajax source
        "ajax": {

            "url": "<?php echo site_url('C_Master/ajax_list_Grp_user') ?>",
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
//=====================================================================================================================
//SHOW TABLE MENU
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

    table_menu = $('#table2').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "paging": true, //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            
            "url": "<?php echo site_url('C_Master/ajax_list_menu2/')?>",
            "type": "POST",
            "data": function ( data ) {
                data.cUserGrpID = $('#cUserGrpID').val();
            }
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

    table_menu.ajax.reload(null,false);

});

function reloadTable()
{
    table.ajax.reload(null,false); //reload datatable ajax
    $('#deleteList').hide();
}

function reloadTable2()
{
    table_menu.ajax.reload(null,false); //reload datatable ajax
}

</script>

<script type="text/javascript">
function delete_UserGrp1(id)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Master/ajax_delete_UserGrp1')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                reloadTable();
                alert_hapus();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                error();
            }
        });
    }
}

function delete_UserGrp2(id)
{
    if(confirm('Are you sure delete this data? '+id))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Master/ajax_delete_UserGrp2')?>/"+id+"/"+cUserGrpID.value,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                reloadTable();
                alert_hapus();
                table_menu.ajax.reload(null,false);
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                error();
            }
        });
    }
}

function edit_userGrp1(id)
{
    //alert(id);
    save_method = 'update';
    id_menu_T = id;
    $.ajax({
        url : "<?php echo site_url('C_Master/ajax_edit_userGrp1/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            tambah_data();
            document.getElementById("cUserGrpID").readOnly = true; 
            $('.nav-tabs > .active').next('li').find('a').trigger('click');
            $('.detil').show();

            $('[name="cUserGrpID"]').val(data.cUserGrpID);
            $('[name="cUserGrpDesc"]').val(data.cUserGrpDesc);
            table_menu.ajax.reload(null,false);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}

</script>
<!-- ============================================================================================================ -->
<script type="text/javascript">
// JAVASCRIP NEXT TAP
    function tambah_data(){
    $('#btnSave').text('Save');
    cUserGrpID.value="";
    cUserGrpDesc.value = "";
    //cUserGrpID.disabled=false;
    document.getElementById("cUserGrpID").readOnly = false; 
    cUserGrpDesc.disabled=false;
    btnSave.disabled = false;
    $('.detil').hide();
    
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
    }

    $('.btnAdd').click(function(){
    save_method = 'add';
    tambah_data();
    });

    $('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
</script>

