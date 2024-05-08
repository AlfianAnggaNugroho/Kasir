<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/icon.png') ?> ">

        <title><?php echo $info; ?></title>
        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/template1/plugins/morris/morris.css') ?>">
         <!-- DataTables -->
        <link href="<?php echo base_url('assets/template1/plugins/datatables/jquery.dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/buttons.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/responsive.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/scroller.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/dataTables.colVis.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/dataTables.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/template1/plugins/datatables/fixedColumns.dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>

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
        <!-- <?php echo base_url('') ?> -->
        <script src="<?php echo base_url('assets/template1/assets/js/modernizr.min.js') ?>"></script>
        
    </head>

    <body>
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">
                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                            <!--Zircos-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="<?php echo site_url('C_Master/');?>" class="logo">
                            <img src="<?php echo base_url('assets/img/logo/Fix2.png') ?>" alt="" height="30">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">
                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown navbar-c-items">
                              <!--  <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url('assets/img/profil/aldi.jpg') ?>" alt="user-img" class="img-circle"> </a> -->
                              <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li class="text-center">
                                        <h4>Selamat Datang</h4>
                                    </li>
                                    <!--
                                    <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                    -->
                                    <li><a href="<?php echo site_url('C_Pengguna/login'); ?>"><i class="ti-power-off m-r-5"></i> Login</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>
                    <!-- end menu-extras -->

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <ul class="navigation-menu">
                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                            </li>
                        </ul>
                    </div>
                      <?php // $this->load->view('menu.php'); ?>
                        <!-- End navigation menu -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">