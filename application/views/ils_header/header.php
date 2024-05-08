<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/layout')?>/images/favicon.png">
    <title><?php echo $info; ?></title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/layout')?>/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/layout')?>/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/layout')?>/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/layout')?>/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- DataTables -->
        <link href="<?php echo base_url('assets/template1/plugins/datatables/jquery.dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/buttons.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/responsive.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/scroller.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/dataTables.colVis.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/dataTables.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/fixedColumns.dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>

 <link rel="stylesheet" href="<?php echo base_url('assets/template1/plugins/fullcalendar/datepicker.css');?>" />

   <!-- Notification css (Toastr) -->
        <link href="<?php echo base_url('assets/template1/plugins/toastr/toastr.min.css')?>" rel="stylesheet" type="text/css" />


<style type="text/css">
    .help-block {
        color: red;
    }
</style>
        <style type="text/css">
            .glass{
                    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
                    backdrop-filter: blur(10px);
                    -webkit-backdrop-filter: blur(10px);
                    border-radius: 20px;
                    border:1px solid rgba(255, 255, 255, 0.18);
                    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
                }
        </style>
</head>

<body>
    <script src="<?php echo base_url('assets/template1/assets/js/jquery.min.js') ?>"></script>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6" >
            <nav class="navbar top-navbar navbar-expand-md"  style="background-image: linear-gradient( 109.6deg,  rgba(44,83,131,1) 18.9%, rgba(95,175,201,1) 91.1% );">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand" style="background-image: linear-gradient( 109.6deg,  rgba(44,83,131,1) 18.9%, rgba(95,175,201,1) 91.1% );">
                        <!-- Logo icon -->
                        <a href="index.html" style="background-image: linear-gradient( 109.6deg,  rgba(44,83,131,1) 18.9%, rgba(95,175,201,1) 91.1% );">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="<?php echo base_url('assets/layout')?>/images/logo-icon.png" alt="homepage" class="dark-logo" style="width: 190px;height: 60px" />
                                <!-- Light Logo icon -->
                                <img src="<?php echo base_url('assets/layout')?>/images/logo-icon.png" alt="homepage" class="light-logo" style="width: 190px;height: 60px" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <!-- <img src="<?php echo base_url('assets/layout')?>/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                                <!-- Light Logo text -->
                                <!-- <img src="<?php echo base_url('assets/layout')?>/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->

    <style>
        /* Gaya tooltip */
        .tooltip-inner {
            background-color: #ff6b6b; /* Warna latar belakang tooltip */
            color: #fff; /* Warna teks tooltip */
            border-radius: 4px; /* Sudut radius border tooltip */
            border: 1px solid #f44141; /* Warna border tooltip */
        }

        .tooltip.show {
            opacity: 1 !important; /* Menghindari efek transisi fadeIn/out */
        }
    </style>

                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                             <!--  isi menu left-->
                            <li>
                                    <a class="nav-link" href="<?php echo base_url('C_Master/aboutme') ?>" style="color: #fff" title="Informasi Aplikasi dan tentang perusahaan"  data-toggle="tooltip" data-placement="top">
                                <span class="ml-2 d-none d-lg-inline-block"><i data-feather="info" class="feather-icon" ></i></a>
                            </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <!-- <input class="form-control custom-shadow custom-radius border-0 bg-white" -->
                                            <!-- type="search" placeholder="Search" aria-label="Search"> -->
                                        <!-- <i class="form-control-icon" data-feather="search"></i> -->
                                    </div>
                                </form>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" style="color: #fff">
                                <img src="<?php echo base_url('assets/layout')?>/images/users/01.png" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span
                                        class="text-dark" ><label  style="color: #fff"><?php echo $this->session->userdata('nama_user') ?></label></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="<?php echo site_url('C_Master/user_profil');?>"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                              
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo site_url('admin/logout');?>"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                               
                                
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6" style="background-image: linear-gradient( 109.6deg,  rgba(44,83,131,1) 18.9%, rgba(95,175,201,1) 91.1% );">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <?php $this->load->view('menu.php'); ?>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb d-none">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1"><?php echo $info; ?></h3>
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
                            <select class="custom-select custom-select-set form-control bg-info border-0 custom-shadow custom-radius" disabled=""  style="color: #fff">
                                <option selected  style="color: #fff"><a href="">Wellcome <?php echo $this->session->userdata('nama_user') ?> !</a></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                 <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>