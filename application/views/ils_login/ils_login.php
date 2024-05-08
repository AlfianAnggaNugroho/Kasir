<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/layout')?>/images/favicon.png">
    <title>Login Sistem</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/layout')?>/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="background-image: url(<?php echo base_url('assets/foto/04.jpg') ?>);">
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative">
            <!--  style="background:url(<?php echo base_url('assets/layout')?>/images/big/auth-bg.jpg) no-repeat center center;width: 100%;height: 100%" -->
            <div class="auth-box row col-lg-4">
                <!-- <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(<?php echo base_url('assets/layout')?>/images/big/3.jpg);"> -->
                <!-- </div> -->
                <div class="col-lg-12 col-md-6 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="<?php echo base_url('assets/layout')?>/images/big/icon.png" alt="wrapkit" style="width: 200px;height: 100px">
                        </div>
                        <h2 class="mt-1 text-center">Login Sistem</h2>
                        <!-- <p class="text-center">Sistem Informasi Persediaan</p> -->
                        
                        <form class="mt-4" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Username</label>
                                        <input class="form-control" id="uname" type="text"
                                            placeholder="Masukan username" autofocus name="txt_username" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input class="form-control" id="pwd" type="password"
                                            placeholder="Masukan password" name="txt_password" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <!-- <button type="submit" class="btn btn-block btn-dark"  name="btn_login">Login</button> -->

                                    <input type="submit" class="btn btn-dark btn-lg btn-block" value="Login" name="btn_login" onclick="klik()" />
                                    <label style="color: red" id="info"><?php echo $info ?></label>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    <!-- Don't have an account? <a href="#" class="text-danger">Sign Up</a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/layout')?>/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/layout')?>/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="<?php echo base_url('assets/layout')?>/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>


<script type="text/javascript">
    
    $(document).ready(function() {
        var info2 = "<?php echo $info ?>";
        if (info2 == "") {
            info.hide();
           $('.alert').hide();
        }
        else{
            info.show();
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