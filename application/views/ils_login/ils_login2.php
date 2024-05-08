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
        <title>Login - Halensia Gallery</title>

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


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="index.html" class="text-success">
                                            <span><img src="<?php echo base_url('assets/img/logo/Fix2.png') ?>" alt="" height="36"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>

                                <div class="account-content">
                                     
                                     <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert" id="pesan">
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <i class="mdi mdi-block-helper"></i>
                                        <strong>Stop!</strong> <?php echo $info; ?>                                  
                                    </div>

                                    <form class="form-horizontal" method="POST">

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" name="txt_username" required="" placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" name="txt_password" required="" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="form-group text-center m-t-20">
                                            <div class="col-sm-12">
                                                 <input type="submit" class="btn btn-success" value="Login" name="btn_login" onclick="klik()" />
                                            </div>
                                        </div>
                                    </form>
                                     <label>Tidak Memiliki Akun?? <a href="<?php echo site_url('C_Pengguna/Daftar');?>" class="control">Daftar</a></label>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->
                       <!--  
                        <div class="progress">
                            <div class="progress-bar" id="pro" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                         -->
                    <!-- <button class="btn btn-success" onclick="klik()"> UPLOAD </button> <br> <br> -->
                    <!-- <p class="alert-success" id="status"></p> -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

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

        <!-- App js -->
        <script src="<?php echo base_url('assets/template1/assets/js/jquery.core.js') ?>"></script>
        <script src="<?php echo base_url('assets/template1/assets/js/jquery.app.js') ?>"></script>
        

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