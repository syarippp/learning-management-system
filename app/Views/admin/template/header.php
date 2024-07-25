<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard - Guru</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url() ?>main/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo"><a href="index.html"><b><img src="../../assets/images/logo.png" alt=""> </b><span class="brand-title"><img src="../../assets/images/logo-text.png" alt=""></span></a>
            </div>
            <div class="nav-control">
                <div class="hamburger"><span class="line"></span>  <span class="line"></span>  <span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content">
                <div class="header-left">
                    <ul>
                        <li class="icons position-relative"><a href="javascript:void(0)"><i class="icon-magnifier f-s-16"></i></a>
                            <div class="drop-down animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <div class="header-search" id="header-search">
                                        <form action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <div class="input-group-append"><span class="input-group-text"><i class="icon-magnifier"></i></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="header-right">
                    <ul>
                        <!-- <li class="icons">
                            <a href="javascript:void(0)">
                                <i class="mdi mdi-comment"></i>
                                <div class="pulse-css"></div>
                            </a>
                            <div class="drop-down animated bounceInDown">
                                <div class="dropdown-content-heading">
                                    <span class="pull-left">Messages</span>  
                                    <a href="javascript:void()" class="pull-right text-white">View All</a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="pull-left mr-3 avatar-img" src="../../assets/images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Druid Wensleydale</div>
                                                    <div class="notification-text">A wonderful serenit has take possession</div><small class="notification-timestamp">08 Hours ago</small>
                                                </div>
                                            </a><span class="notify-close"><i class="ti-close"></i></span>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="pull-left mr-3 avatar-img" src="../../assets/images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Fig Nelson</div>
                                                    <div class="notification-text">A wonderful serenit has take possession</div><small class="notification-timestamp">08 Hours ago</small>
                                                </div>
                                            </a><span class="notify-close"><i class="ti-close"></i></span>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="pull-left mr-3 avatar-img" src="../../assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Bailey Wonger</div>
                                                    <div class="notification-text">A wonderful serenit has take possession</div><small class="notification-timestamp">08 Hours ago</small>
                                                </div>
                                            </a><span class="notify-close"><i class="ti-close"></i></span>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="pull-left mr-3 avatar-img" src="../../assets/images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Bodrum Salvador</div>
                                                    <div class="notification-text">A wonderful serenit has take possession</div><small class="notification-timestamp">08 Hours ago</small>
                                                </div>
                                            </a><span class="notify-close"><i class="ti-close"></i></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons">
                            <a href="javascript:void(0)">
                                <i class="mdi mdi-bell"></i>
                                <div class="pulse-css"></div>
                            </a>
                            <div class="drop-down animated bounceInDown dropdown-notfication">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="fa fa-check"></i></span>
                                                <div class="notification-content">
                                                    <div class="notification-heading">Druid Wensleydale</div>
                                                    <span class="notification-text">A wonderful serenit of my entire soul.</span> 
                                                    <small class="notification-timestamp">20 May 2018, 15:32</small>
                                                </div>
                                            </a>
                                            <span class="notify-close"><i class="ti-close"></i>
                                                </span>
                                        </li>
                                        <li><a href="javascript:void()"><span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="fa fa-close"></i></span><div class="notification-content"><div class="notification-heading">Inverness McKenzie</div><span class="notification-text">A wonderful serenit of my entire soul.</span> <small class="notification-timestamp">20 May 2018, 15:32</small></div></a>
                                            <span class="notify-close"><i class="ti-close"></i>
                                                </span>
                                        </li>
                                        <li><a href="javascript:void()"><span class="mr-3 avatar-icon bg-success-lighten-2"><i class="fa fa-check"></i></span><div class="notification-content"><div class="notification-heading">McKenzie Inverness</div><span class="notification-text">A wonderful serenit of my entire soul.</span> <small class="notification-timestamp">20 May 2018, 15:32</small></div></a>
                                            <span class="notify-close"><i class="ti-close"></i>
                                                </span>
                                        </li>
                                        <li><a href="javascript:void()"><span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="fa fa-close"></i></span><div class="notification-content"><div class="notification-heading">Inverness McKenzie</div><span class="notification-text">A wonderful serenit of my entire soul.</span> <small class="notification-timestamp">20 May 2018, 15:32</small></div></a>
                                            <span class="notify-close"><i class="ti-close"></i>
                                                </span>
                                        </li>
                                        <li class="text-left"><a href="javascript:void()" class="more-link">Show All Notifications</a>  <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li> -->
                        <li class="icons">
                            <a href="javascript:void(0)" class="log-user">
                                <img src="<?= base_url() ?>profil_picture/pp.jpg" alt=""> <span>Super Admin</span>  <i class="fa fa-caret-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <!-- <li><a href="<?= base_url('guru/profil') ?>"><i class="icon-user"></i> <span>My Profile</span></a>
                                        </li> -->
                                        <li><a href="<?= base_url('home/logout') ?>"><i class="icon-power"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li class="mega-menu mega-menu-lg">
                        <a href="<?php echo base_url('admin/index'); ?>">
                            <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a href="<?php echo base_url('admin/data_mapel'); ?>">
                            <i class="mdi mdi-book"></i><span class="nav-text">Data Mapel</span>
                        </a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="nav-text">Data Guru & Siswa</span> <span class="badge bg-dpink text-white nav-badge">02</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url('admin/data_guru'); ?>">Data Guru</a>
                            </li>
                            <li><a href="<?php echo base_url('admin/data_siswa'); ?>">Data Siswa</a>
                            </li>
                        </ul>
                    </li>
                    

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->