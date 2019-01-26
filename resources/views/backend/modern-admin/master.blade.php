<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 01:36
 */
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="bipham">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="@yield('desc')" name="description" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <!-- START CUSTOM META -->
    @yield('metas')
    <!-- APP CUSTOM META -->

    <title>Backend Application - @yield('title')</title>

    <!-- START APP FAVICON -->
    <link rel="apple-touch-icon" href="{{ asset('assets/general/images/ico/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('assets/general/images/ico/favicon.ico') }}">
    <!-- APP FAVICON -->

    <!-- BEGIN FONTS-->
    <link href="{{ asset('assets/backend/modern-admin/app-assets/fonts/family-open-sans.css') }}"
          rel="stylesheet">
    <link href="{{ asset('assets/backend/modern-admin/app-assets/fonts/line-awesome/css/line-awesome.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('assets/vendors/plugins/fontawesome/css/all.min.css') }}"
          rel="stylesheet">
    @yield('fonts')
    <!-- END FONTS-->

    <!-- ========== START CORE SCRIPTS ========== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link href="{{ asset('assets/vendors/css/sweet-alert/sweetalert.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/css/toastr/toastr.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/plugins/DataTables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/switchery.min.css') }}">
    @yield('core-scripts')
    <!-- ========== START CORE SCRIPTS ========== -->

    <!-- ========== START THEME CSS ========== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/helper/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/general/css/app.css') }}">
    @yield('theme-css')
    <!-- ========== END THEME CSS ========== -->

    <!-- ========== START PLUGINS CSS ========== -->
    @yield('plugin-css')
    <!-- ========== END PLUGINS CSS ========== -->

    <!-- ========== START PAGE CSS ========== -->
    @yield('page-css')
    <!-- ========== START PAGE CSS ========== -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/assets/css/style-custom.css') }}">
    <script src="{{ asset('assets/backend/modern-admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/general/js/loading/soria-loading.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/general/js/loading/loaded.js') }}" type="text/javascript"></script>
    @yield('styles')
    <script>
        setTimeout(()=>{
            SORIALoading.open();
        },10)

        $( window ).on( "load", function() {
            SORIALoading.close();
        });
    </script>
</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <!-- ========== START FIXED TOP NAV ========== -->
    @include('backend.modern-admin.layouts.nav-top')
    <!-- ========== END FIXED TOP NAV ========== -->

    <!-- ========== START LEFT SIDEBAR ========== -->
    @include('backend.modern-admin.layouts.sidebar-menu')
    <!-- ========== END LEFT SIDEBAR ========== -->

    <!-- START RIGHT CONTENT -->
    @include('backend.modern-admin.layouts.app-content')
    <!-- END RIGHT CONTENT -->

    <!-- START FOOTER -->
    @include('backend.modern-admin.layouts.footer')
    <!-- END FOOTER -->

    <!-- ========== START CORE FOOTER SCRIPTS ========== -->
    <script src="{{ asset('assets/vendors/plugins/fontawesome/js/all.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/plugins/numeral/min/numeral.min.js')}}"></script>
    <script src="{{ asset('assets/backend/modern-admin/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/modern-admin/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/modern-admin/app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/modern-admin/app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/jquery.serializejson.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/jquery.buttonLoader.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/select2.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/plugins/DataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/switchery.min.js')}}"></script>
    @yield('core-footer-scripts')
    <!-- ========== END CORE FOOTER SCRIPTS ========== -->

    <!-- ========== START THEME SCRIPTS ========== -->
    <script src="{{ asset('assets/backend/modern-admin/app-assets/vendors/js/ui/headroom.min.js') }}" type="text/javascript"></script>
    @yield('theme-scripts')
    <!-- ========== END THEME SCRIPTS ========== -->

    <!-- ========== START PLUGINS SCRIPTS ========== -->
    @yield('plugin-scripts')
    <!-- ========== END PLUGINS SCRIPTS ========== -->
    <script src="{{ asset('assets/vendors/js/jquery.core.js')}}"></script>
    <!-- ========== START PAGE SCRIPTS ========== -->
    @yield('page-scripts')
    <!-- ========== END PAGE SCRIPTS ========== -->

    <!-- ========== START CONSTANT HTTP CODE SCRIPTS ========== -->
    @include('backend.modern-admin.layouts.constant')
    <!-- ========== END CONSTANT HTTP CODE SCRIPTS ========== -->
</body>
</html>
