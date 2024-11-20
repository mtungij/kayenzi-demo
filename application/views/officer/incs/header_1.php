
<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>Mikoposoft | <?php //echo $manager_data->comp_name; ?> Officer Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Fonts -->

    <!--begin::Page Vendors Styles (used by this page) -->
    <link href="<?php echo base_url() ?>assets/new/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles (used by all pages) -->
    <link href="<?php echo base_url() ?>assets/new/assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/new/assets/css/demo12/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/new/assets/css/demo12/wizard-4.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::DataTable Styles -->
    
    <!--end::DataTable Styles -->

    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


    <!--begin::Invoice Style -->
    <link href="<?php echo base_url() ?>assets/new/assets/css/demo12/invoice-1.css" rel="stylesheet" type="text/css" />
    <!--end::Invoice Style -->

    <!-- jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/logo.png" />
</head>
<!-- end::Head -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile kt-header-mobile--fixed">
        <div class="kt-header-mobile__logo">
            <a href="#">
                <img alt="Logo" src="<?php echo base_url() ?>assets/img/logo.png" style="width: 100px; height: 80px;">
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>
    <!-- end:: Header Mobile -->

    <!-- begin:: Page Content -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- begin:: Aside -->
            <button class="kt-aside-close" id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside kt-aside--fixed kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                <!-- begin:: Aside Brand -->
                <div class="kt-aside__brand kt-grid__item" id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="#">
                            <img alt="Logo" src="<?php echo base_url() ?>assets/img/logo.png" style="width: 100px; height: 80px;">
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
                    </div>
                </div>
                <!-- end:: Aside Brand -->
         
