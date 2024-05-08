<?php $user = $this->session->userdata('cUserGrpID'); ?>

<style type="text/css">
    .hide-menu{
        color: #fff;
    }
</style>

                    <ul id="sidebarnav" style="color: #fff">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Master/')?>"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
            <?php if($user == "01"){?>

                        
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Master</span></li>
                        
                         <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Master/Supplier/');?>"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Data Supplier</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Master/barang/');?>"
                                aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                                    class="hide-menu">Data Barang
                                </span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Master/grp_barang/');?>"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Data Group Barang
                                </span></a>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Master/stock/');?>"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">Data Stock
                                </span></a>
                        </li>
                        
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Transaksi</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Transaksi/');?>"
                                aria-expanded="false"><i data-feather="shopping-bag" class="feather-icon"></i><span
                                    class="hide-menu">Pembelian
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Transaksi/BKB');?>"
                                aria-expanded="false"><i data-feather="shopping-cart" class="feather-icon"></i><span
                                    class="hide-menu">Penjualan</span></a></li>

                       
                         <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Laporan</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Laporan/rincian_beli');?>"
                                aria-expanded="false"><i data-feather="book" class="feather-icon"></i><span
                                    class="hide-menu">Pembelian
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Laporan/rincian_jual');?> "
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Penjualan</span></a></li>

                         <!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Laporan/kartu_stok_bulanan');?>" -->
                                <!-- aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span -->
                                    <!-- class="hide-menu">Harga Rata - Rata</span></a></li> -->
                        <!-- <li class="list-divider"></li> -->
                                            
                        <!-- <li class="list-divider"></li> -->
                        <!-- <li class="nav-small-cap"><span class="hide-menu">Profil</span></li> -->
                        <!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Master/user_profil');?>" -->
                                <!-- aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span -->
                                    <!-- class="hide-menu">My Profil</span></a></li> -->
                        <!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('admin/logout');?>" -->
                                <!-- aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span -->
                                    <!-- class="hide-menu">Logout</span></a></li> -->
                    

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Admin</span></li>

                        <!-- <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Master/profil/');?>" 
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Data Perusahaan
                                </span></a>
                        </li> -->
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Master/user/');?>"
                                aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                    class="hide-menu">Data User</span></a></li>


                    </ul>
                    

                     


<?php } ?>


 <?php if($user == "03"){?>
  <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Transaksi</span></li>

                        <li class="sidebar-item d-none"> <a class="sidebar-link" href="<?php echo site_url('C_Transaksi/');?>"
                                aria-expanded="false"><i data-feather="shopping-bag" class="feather-icon"></i><span
                                    class="hide-menu">Pembelian
                                </span></a>
                        </li>
                        <li class="sidebar-item "> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Transaksi/BKB');?>"
                                aria-expanded="false"><i data-feather="shopping-cart" class="feather-icon"></i><span
                                    class="hide-menu">Penjualan</span></a></li>
                                    
 <!-- <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Master</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Master/barang/');?>"
                                aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                                    class="hide-menu">Data Barang
                                </span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Master/grp_barang/');?>"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Data Group Barang
                                </span></a>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Master/stock/');?>"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">Data Stock
                                </span></a>
                        </li>
                        

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Master/Supplier/');?>"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Data Supplier</span></a></li> -->

                          <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Laporan</span></li>

                       <!--  <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('C_Laporan/rincian_beli');?>"
                                aria-expanded="false"><i data-feather="book" class="feather-icon"></i><span
                                    class="hide-menu">Pembelian
                                </span></a>
                        </li> -->
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Laporan/rincian_jual');?> "
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Penjualan</span></a></li>

                         <!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Laporan/kartu_stok_bulanan');?>" -->
                                <!-- aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span -->
                                    <!-- class="hide-menu">Harga Rata - Rata</span></a></li> -->
                        <!-- <li class="list-divider"></li> -->
                                            
                        <!-- <li class="list-divider"></li> -->
                        <!-- <li class="nav-small-cap"><span class="hide-menu">Profil</span></li> -->
                        <!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('C_Master/user_profil');?>" -->
                                <!-- aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span -->
                                    <!-- class="hide-menu">My Profil</span></a></li> -->
                        <!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('admin/logout');?>" -->
                                <!-- aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span -->
                                    <!-- class="hide-menu">Logout</span></a></li> -->
                    </ul>

 <?php } ?>


                  