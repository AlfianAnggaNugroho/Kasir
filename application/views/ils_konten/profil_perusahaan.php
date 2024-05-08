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
 

                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">

                                    <h4 class="header-title m-t-0" align="center"><?php echo $name; ?></h4>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="contact-map">
                                                <?php echo $map; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-20">
                                        <p>
                                            <?php echo $desc; ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <!-- end row -->





                        </div>
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