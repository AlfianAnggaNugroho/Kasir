<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/Fix2.png') ?>">
        <!-- App title -->
        <title>Halensia Gallery</title>

        <!-- App css -->
        <link href="<?php echo base_url('assets/template1/assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/template1/assets/css/core.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/template1/assets/css/components.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/template1/assets/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/template1/assets/css/pages.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/template1/assets/css/menu.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/template1/assets/css/responsive.css')?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/template1/plugins/switchery/switchery.min.css')?>">
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url('assets/template1/assets/js/modernizr.min.js') ?>"></script>

    </head>


    <body>
        <br><br>
        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">

                                    <h4 class="header-title m-t-0">Silahkan Isi Data Berikut ini</h4>
                                    <p class="text-muted font-13 m-b-10">
                                       Anda dapat membuat user baru jika ingin mengakses pembelian pada website. jika sudah memiliki akun anda bisa masuk melalui menu login
                                    </p>

                                    <div class="p-20">
                                        <form method="post" action="<?php echo site_url('C_Pengguna/add_user');?>" id="from1" data-parsley-validate novalidate class="form-horizontal"> <div class="form-group">
                                                <div class="col-sm-6">
                                                <label for="cName">Nama Pengguna<span class="text-danger">*</span></label>
                                                <input type="text" name="cName" parsley-trigger="change" required
                                                       placeholder="Masukan Nama Pengguna" class="form-control" id="cName">
                                                </div>

                                                <div class="col-sm-3">
                                                <label for="cPhone">Nomor Telepon<span class="text-danger">*</span></label>
                                                <input type="text" name="cPhone" parsley-trigger="change" required
                                                       placeholder="Masukan Telepon" class="form-control" id="cPhone">
                                                </div>

                                                <div class="col-sm-3">
                                                <label for="cHP">Nomor HP<span class="text-danger">*</span></label>
                                                <input type="text" name="cHP" parsley-trigger="change" required
                                                       placeholder="Masukan No HP" class="form-control" id="cHP">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                              <div class="col-sm-12">
                                                <label for="cAddress">Alamat<span class="text-danger">*</span></label>
                                                <input type="text" name="cAddress" parsley-trigger="change" required
                                                       placeholder="Masukan Alamat Pengguna" class="form-control" id="cAddress">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                <label for="userName">User Name<span class="text-danger">*</span></label>
                                                <input type="text" name="userName" parsley-trigger="change" required
                                                       placeholder="Masukan Username" class="form-control" id="userName">
                                                <label for="userName"><span class="text-danger" id="txt_warning">*</span></label>
                                                <input type="hidden" name="cek" id="cek">
                                                </div>
                                        
                                            <div class="col-sm-3">
                                                <label for="pass1">Password<span class="text-danger">*</span></label>
                                                <input id="pass1" type="password" placeholder="Password" required
                                                       class="form-control" name="cPassword">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                                <input data-parsley-equalto="#pass1" type="password" required
                                                       placeholder="Password" class="form-control" id="passWord2">
                                            </div>
                                            </div>

                                            <div class="form-group text-right m-b-0">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit" id="save">
                                                    Daftar
                                                </button>
                                                <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                    Reset
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label>Sudah Memiliki Akun?? <a href="<?php echo site_url('C_Pengguna/login2');?>" class="control">Sign in</a></label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                            <!-- end row -->

        <script>
            var resizefunc = [];
        </script>

       
<!-- ================================================JQUERY/ JAVASCRIPT================================================== -->
        
        <!-- jQuery  -->
        <script src="<?php echo base_url('assets/template1/assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/js/detect.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/js/fastclick.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/js/jquery.blockUI.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/js/waves.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/js/jquery.slimscroll.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/js/jquery.scrollTo.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/switchery/switchery.min.js') ?>"></script>
        <!-- =================================================================================================================== -->
         <!-- Toastr js -->
        <script src="<?php echo base_url('assets/template1/plugins/toastr/toastr.min.js')?>"></script>
        <!-- Toastr init js (Demo)-->
        <script src="<?php echo base_url('assets/template1/assets/pages/jquery.toastr.js')?>"></script>
        
        <!-- isotope filter plugin -->
        <script type="text/javascript" src="<?php echo base_url('assets/template1/plugins/isotope/js/isotope.pkgd.min.js')?>"></script>

        <!-- Magnific popup -->
        <script type="text/javascript" src="<?php echo base_url('assets/template1/plugins/magnific-popup/js/jquery.magnific-popup.min.js') ?>"></script>

        <!-- ================================================== -->
        <script src="<?php echo base_url('assets/template1/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/dataTables.bootstrap.js') ?>"></script>

        <script src="<?php echo base_url('assets/template1/plugins/datatables/dataTables.buttons.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/buttons.bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/jszip.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/pdfmake.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/vfs_fonts.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/buttons.html5.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/buttons.print.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/dataTables.fixedHeader.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/dataTables.keyTable.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/dataTables.responsive.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/responsive.bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/dataTables.scroller.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/dataTables.colVis.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/datatables/dataTables.fixedColumns.min.js') ?>"></script>

        <!-- init -->
        <script src="<?php echo base_url('assets/template1/assets/pages/jquery.datatables.init.js') ?>"></script>
        <!-- Counter js  -->
        <script src="<?php echo base_url('assets/template1/plugins/waypoints/jquery.waypoints.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/counterup/jquery.counterup.min.js') ?>"></script>

        <!--Morris Chart-->
        <script src="<?php echo base_url('assets/template1/plugins/morris/morris.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/plugins/raphael/raphael-min.js') ?>"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url('assets/template1/assets/pages/jquery.dashboard.js') ?>"></script>
        <!-- <script src="<?php echo base_url('assets/template1/assets/pages/jquery.form-pickers.init.js')?>"></script> -->


        <script type="text/javascript" src="<?php echo base_url('assets/template1/plugins/parsleyjs/parsley.min.js') ?>"></script>
<!-- RANGE -->
        <script src="<?php echo base_url('assets/template1/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template1/plugins/autocomplete/jquery.mockjax.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template1/assets/pages/jquery.form-advanced.init.js')?>"></script>


        <!-- Tooltipster js -->
        <script src="<?php echo base_url('assets/template1/plugins/tooltipster/tooltipster.bundle.min.js')?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/pages/jquery.tooltipster.js')?>"></script>

        <script src="<?php echo base_url('assets/template1/plugins/jquery.filer/js/jquery.filer.min.js')?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('assets/template1/assets/js/jquery.core.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/js/jquery.app.js') ?>"></script>
        
        <script src="<?php echo base_url('assets/template1/assets/pages/jquery.fileuploads.init.js') ?>"></script>      

        <!-- PLUGIN select-->
        <script src="<?php echo base_url('assets/template1/plugins/select_piker/bootstrap-select.min.js')?>"></script>

         <!-- Plugin datepicker -->
        <!-- <script src="<?php echo base_url('assets/template1/plugins/fullcalendar/fullcalendar.min.js')?>"></script>  -->
        <!-- <script src="<?php echo base_url('assets/template1/plugins/fullcalendar/dcalendar.picker.js')?>"></script> -->
        <script src="<?php echo base_url('assets/template1/plugins/fullcalendar/bootstrap-datepicker.js')?>"></script>
        <script src="<?php echo base_url('assets/editor/ckeditor.js')?>"></script>
        <script src="<?php echo base_url('assets/editor/styles.js')?>"></script>

    </body>
</html>

<script type="text/javascript">
    
    $(document).ready(function() {
        var info = "<?php echo $info ?>";
        if (info == "") {
           $('.alert').hide();
        }
        else{
            $('.alert').show();
        }

    });
     function alert_login() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Pemberitahuan', {
                        icon: '<?php echo site_url('assets/img/Tick_Mark_Dark-512.png'); ?>',
                        body: "Anda Berhasil Login!!!",
                    });
                    notifikasi.onclick = function () {
                       // window.open("http://erllang.ga");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };
            function alert_Gagal_login() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Pemberitahuan', {
                        icon: '<?php echo site_url('assets/img/Tick_Mark_Dark-512.png'); ?>',
                        body: "UserName/Password",
                    });
                    notifikasi.onclick = function () {
                       // window.open("http://erllang.ga");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };
</script>



<script type="text/javascript">
     function klik() {
              var pro = document.getElementById("pro");   
              var width = 1;
              var id = setInterval(kondisiPro, 10);

              function kondisiPro() {
                if (width >= 100) {
                  clearInterval(id);
                } else {
                  width++; 
                  pro.style.width = width + '%'; 
                  pro.innerHTML = width + "%"; 
                }

                if (width == 100 ) {

                    document.getElementById("status").innerHTML = " Berhasil Di Upload ";
                }
              }
            }
</script>


<script type="text/javascript">

function cek_user()
{
    $.ajax({
        url : "<?php echo site_url('C_Pengguna/ajax_edit_user/')?>/"+userName.value,
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


userName.addEventListener('keyup', function(e)
    {
        cek_user();  
    }); 
</script>