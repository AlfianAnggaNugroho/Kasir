<?php 
foreach($list as $value){ 
// if($value->cEmailID == $this->session->userdata('username')){
 // $username = $value->cBranchDesc;
 $name = $value->cBranchDesc;
 $nohp = $value->cHP;
 $notlp = $value->cPhone;
 $alamat = $value->cBranchADDR;
 $desc = $value->cDesc;
 $map = $value->cMap;
// }
}
 ?>


 <div class="page-breadcrumb2">
              
                        <h2 class="page-title text-truncate text-dark font-weight-medium "><?php echo $info; ?></h2>
                       
                  
</div>
<hr>
<div class="row card">
          <div class="col-lg-12">
            <section class="panel">
              <div class="panel-body">
                <br>
                 <form method="post" action="<?php echo site_url('C_Master/ajax_update_company');?>" id="from1" data-parsley-validate novalidate class="form-horizontal">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                <label for="cName">Nama Perusahaan<span class="text-danger">*</span></label>
                                                <input type="text" name="cName" parsley-trigger="change" required value="<?php echo $name ?>" 
                                                       placeholder="Masukan Nama Pengguna" class="form-control" id="cName">
                                                </div>

                                                 <div class="col-sm-3">
                                                <label for="cPhone">Nomor Telepon<span class="text-danger">*</span></label>
                                                <input type="text" name="cPhone" parsley-trigger="change" required value="<?php echo $notlp ?>" placeholder="Masukan Telepon" class="form-control" id="cPhone">
                                                </div>

                                                <div class="col-sm-3">
                                                <label for="cHP">Nomor HP<span class="text-danger">*</span></label>
                                                <input type="text" name="cHP" parsley-trigger="change" required value="<?php echo $nohp ?>"
                                                       placeholder="Masukan No HP" class="form-control" id="cHP">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <label for="cAddress">Alamat Perusahaan<span class="text-danger">*</span></label>
                                                <input type="text" name="cAddress" parsley-trigger="change" required value="<?php echo $alamat ?>" 
                                                       placeholder="Masukan Nama Pengguna" class="form-control" id="cAddress">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <label for="cAddress">Google Map</label>
                                                    <textarea class="form-control" name="cMap" id="cMap" style="height: 100px"><?php echo $map ?></textarea>
                                                </div>
                                            </div>

                                        <div class="form-group d-none">
                                            <div class="col-sm-12">
                                                <textarea type="text" class="form-control ckeditor" name="editor1" id="editor1" ><?php echo $desc ?></textarea>
                                            </div>
                                        </div>

                                           
                                                <button class="btn btn-primary waves-effect waves-light" type="submit" id="save">UPDATE PROFIL</button>
                                           <!-- <a class="btn btn-primary btnAdd">Tambah</a> -->
                                        </form>
              </div>
            </section>
          </div>
        </div>

<script type="text/javascript">

function cek_user()
{
    $.ajax({
        url : "<?php echo site_url('C_Home/ajax_edit_user/')?>/"+userName.value,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            if(data.cEmailID == ""||data.cEmailID==null||data.cEmailID=="0"){
                $('[name="cek"]').val("");
                document.getElementById('txt_warning').innerHTML ="*";
                save.disabled = false;
            }else{
            $('[name="cek"]').val(data.cEmailID);
            document.getElementById('txt_warning').innerHTML = 'Username '+data.cEmailID+" Telah Digunakan";
            save.disabled = true;
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          //  alert('Error getting data from ajax');
            $('[name="cek"]').val("");
            document.getElementById('txt_warning').innerHTML ="*";
            save.disabled = false;
        }
    });
}

/*
userName.addEventListener('keyup', function(e)
    {
        cek_user();  
    }); 
*/


function save()
{
    // CKEDITOR.replace('editor1');
    var data = CKEDITOR.instances.editor1.getData();
    editor1.value = data;
    // alert(editor1.value);
    
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
    //notifikasi_gagal();
    if(save_method == 'add') {
        url = "<?php echo site_url('C_Transaksi/ajax_add_berita') ?>";
    } else {
        url = "<?php echo site_url('C_Transaksi/ajax_update_tPO1')?>/"+id_menu_T;
        
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
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
                $('.nav-tabs > .active').prev('li').find('a').trigger('click');
                id_menu_T = cPONo.value;
                reloadTable();
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
            error2()
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
         
        }
    }); 
   
}

</script>