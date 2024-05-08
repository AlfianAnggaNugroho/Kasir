<?php 
foreach($list as $value){ 
if($value->cEmailID == $this->session->userdata('username')){
 $username = $value->cEmailID;
 $name = $value->cName;
 $nohp = $value->cHP;
 $notlp = $value->cPhone;
 $alamat = $value->cAddress;
 $password = $value->cPassword;
}
}
 ?>
  

 <div class="row card">
          <div class="col-lg-12">
            <section class="panel">
              <br>
              <div class="panel-body">
                <div class="form">
                 <form method="post" action="<?php echo site_url('C_Master/ajax_update_user_profil');?>" id="register_form" data-parsley-validate novalidate class="form-horizontal">
                                             <div class="form-group row">
                                                <div class="col-sm-6">
                                                <label for="cName">Nama Pengguna<span class="text-danger">*</span></label>
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
                                                <label for="cAddress">Alamat<span class="text-danger">*</span></label>
                                                <input type="text" name="cAddress" parsley-trigger="change" required value="<?php echo $alamat ?>"
                                                       placeholder="Masukan Alamat Pengguna" class="form-control" id="cAddress">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                <label for="userName">Username<span class="text-danger">*</span></label>
                                                <input type="text" name="userName" parsley-trigger="change" required value="<?php echo $username ?>"
                                                       placeholder="Masukan Username" class="form-control" id="userName" readonly>
                                                <!-- <label for="userName"><span class="text-danger" id="txt_warning">*</span></label> -->
                                                <input type="hidden" name="cek" id="cek">
                                                </div>
                                        
                                            <div class="col-sm-3">
                                                <label for="pass1">Password<span class="text-danger">*</span></label>
                                                <input id="pass1" type="password" placeholder="Password" required value="<?php echo $password ?>"
                                                       class="form-control" name="cPassword">
                                            </div>
                                            <div class="col-sm-3 d-none">
                                                <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                                <input data-parsley-equalto="#pass1" type="password" required
                                                       placeholder="Password" class="form-control" id="passWord2">
                                            </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit" id="save">
                                                    UPDATE PROFIL
                                                </button>
                                                </div>
                                            </div>
                                            <div class="form-group d-none">
                                                <div class="col-sm-12">
                                                    <label>Sudah Memiliki Akun?? <a href="<?php echo site_url('C_Pengguna/login');?>" class="control">Sign in</a></label>
                                                </div>
                                            </div>
                                        </form>
                </div>
              </div>
            </section>
          </div>
        </div>      

<script type="text/javascript">

function cek_user()
{
    $.ajax({
        url : "<?php echo site_url('C_Master/ajax_edit_user/')?>/"+userName.value,
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
</script>