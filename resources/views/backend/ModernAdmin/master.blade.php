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
    <link href="{{ asset('assets/backend/modernadmin/app-assets/fonts/family-open-sans.css') }}"
          rel="stylesheet">
    <link href="{{ asset('assets/backend/modernadmin/app-assets/fonts/line-awesome/css/line-awesome.min.css') }}"
          rel="stylesheet">
    @yield('fonts')
    <!-- END FONTS-->

    <!-- ========== START CORE SCRIPTS ========== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modernadmin/app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modernadmin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modernadmin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link href="{{ asset('assets/vendors/css/sweet-alert/sweetalert2.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    @yield('core-scripts')
    <!-- ========== START CORE SCRIPTS ========== -->

    <!-- ========== START THEME CSS ========== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/modernadmin/app-assets/css/app.css') }}">
    @yield('theme-css')
    <!-- ========== END THEME CSS ========== -->

    <!-- ========== START PLUGINS CSS ========== -->
    @yield('plugin-css')
    <!-- ========== END PLUGINS CSS ========== -->

    <!-- ========== START PAGE CSS ========== -->
    @yield('page-css')
    <!-- ========== START PAGE CSS ========== -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modernadmin/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modernadmin/assets/css/style-custom.css') }}">
    @yield('styles')
</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <!-- ========== START FIXED TOP NAV ========== -->
    @include('backend.ModernAdmin.layouts.nav-top')
    <!-- ========== END FIXED TOP NAV ========== -->

    <!-- ========== START LEFT SIDEBAR ========== -->
    @include('backend.ModernAdmin.layouts.sidebar-menu')
    <!-- ========== END LEFT SIDEBAR ========== -->

    <!-- START RIGHT CONTENT -->
    @include('backend.ModernAdmin.layouts.app-content')
    <!-- END RIGHT CONTENT -->

    <!-- START FOOTER -->
    @include('backend.ModernAdmin.layouts.footer')
    <!-- END FOOTER -->

    <!-- ========== START CORE FOOTER SCRIPTS ========== -->
    <script src="{{ asset('assets/backend/modernadmin/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/modernadmin/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/modernadmin/app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/modernadmin/app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/jquery.serializejson.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/jquery.buttonLoader.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/sweet-alert/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/select2.min.js')}}"></script>
    @yield('core-footer-scripts')
    <!-- ========== END CORE FOOTER SCRIPTS ========== -->

    <!-- ========== START THEME SCRIPTS ========== -->
    <script src="{{ asset('assets/backend/modernadmin/app-assets/vendors/js/ui/headroom.min.js') }}" type="text/javascript"></script>
    @yield('theme-scripts')
    <!-- ========== END THEME SCRIPTS ========== -->

    <!-- ========== START PLUGINS SCRIPTS ========== -->
    @yield('plugin-scripts')
    <!-- ========== END PLUGINS SCRIPTS ========== -->

    <!-- ========== START PAGE SCRIPTS ========== -->
    @yield('page-scripts')
    <!-- ========== END PAGE SCRIPTS ========== -->

    <!-- ========== START CONSTANT HTTP CODE SCRIPTS ========== -->
    @include('backend.ModernAdmin.layouts.constant')
    <!-- ========== END CONSTANT HTTP CODE SCRIPTS ========== -->
</body>
</html>
