<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo APP_NAME; ?> | <?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="<?php echo APP_NAME; ?>" name="description" />
        <meta content="<?php echo APP_NAME; ?>" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/site/icon.jpeg')?>">
         
        <link href="<?php echo base_url(); ?>assets/admin/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
         <!-- DataTables -->
        <link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/toastr/toastr.min.css">
        <script src="<?php echo base_url(); ?>assets/admin/toastr/toastr.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
        <script src="<?php echo base_url(); ?>assets/notify.js"></script>
        
        <!--Bootstrap Tags Input [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>assets/admin/plugin/tags-input/bootstrap-tagsinput.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>assets/admin/plugin/tags-input/bootstrap-tagsinput.min.js"></script>

       <!-- Js -->
       <script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/admin/libs/select2/js/select2.min.js"></script>
    <!-- Required datatable js -->
    <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <style type="text/css">
        .bootstrap-tagsinput .tag [data-role="remove"]:after {
            content: "x";
            color: red;
        }
    </style>
    </head>
    <body data-sidebar="dark">
    <!-- <body data-layout="horizontal" data-topbar="colored"> -->
        <!-- Begin page -->
        <div id="layout-wrapper">
            <header id="page-topbar">
              <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                  <div class="navbar-brand-box">
                    <a href="<?php echo base_url('panel/dashboard'); ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo base_url('assets/site/lo-go.png')?>" alt="<?php echo APP_NAME; ?>" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo base_url('assets/site/lo-go.png')?>" alt="<?php echo APP_NAME; ?>" alt="<?php echo APP_NAME; ?>" height="17">
                        </span>
                    </a>
                    <a href="<?php echo base_url('panel/dashboard'); ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo base_url('assets/site/lo-go.png')?>" alt="<?php echo APP_NAME; ?>" alt="<?php echo APP_NAME; ?>" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo base_url('assets/site/lo-go.png')?>" alt="<?php echo APP_NAME; ?>" alt="<?php echo APP_NAME; ?>" height="50">
                        </span>
                    </a>
                  </div>
                  <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                      <i class="mdi mdi-menu"></i>
                  </button>
                </div>
                <div class="d-flex">
                  <div class="dropdown d-none d-lg-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen font-size-24"></i>
                    </button>
                  </div>
                  <div class="dropdown d-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="ti-bell"></i>
                      <span class="badge bg-danger rounded-pill">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                      <div class="p-3">
                        <div class="row align-items-center">
                          <div class="col">
                            <h5 class="m-0"> Notifications (258) </h5>
                          </div>
                        </div>
                      </div>
                      <div data-simplebar style="max-height: 230px;">
                        <a href="javascript:void(0);" class="text-reset notification-item">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar-xs">
                              <span class="avatar-title border-success rounded-circle ">
                                  <i class="mdi mdi-cart-outline"></i>
                              </span>
                            </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1">Your order is placed</h6>
                              <div class="text-muted">
                                <p class="mb-1">If several languages coalesce the grammar</p>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">View all</a>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img class="rounded-circle header-profile-user" src="<?php echo base_url('assets/admin/images/no-uesr.jpg')?>" alt="<?php echo APP_NAME; ?>" alt="<?php echo getValueByColumn($this->tbl_admin,'name',['id'=>get_admin_id()]);?>">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <!-- item-->
                      <a class="dropdown-item" href="<?php echo base_url('panel/dashboard/profile');?>"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i> Profile</a>
                      <a class="dropdown-item d-block" href="<?php echo base_url('panel/dashboard/changepassword');?>"><i class="mdi mdi-cog font-size-17 text-muted align-middle me-1"></i> Settings</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="<?php echo base_url('panel/dashboard/logout');?>"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a>
                    </div>
                  </div>
                </div>
              </div>
            </header>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="<?php echo base_url();?>panel/dashboard" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="<?php //echo base_url();?>panel/category" class="waves-effect">
                                    <i class="mdi mdi-buffer"></i>
                                    <span>PNG Category</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="javascript:void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-buffer"></i>
                                    <span>PNG Image</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                     <li><a href="<?php echo base_url(); ?>panel/pngimage/add">Upload PNG</a></li>
                                     <li><a href="<?php echo base_url(); ?>panel/pngimage">PNG Images</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url('panel/dashboard/keys');?>" class="waves-effect">
                                    <i class="mdi mdi-buffer"></i>
                                    <span>Text Data</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                    <!-- start page title -->