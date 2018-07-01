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
    <meta content="Coderthemes" name="author" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <!-- START CUSTOM META -->
    @yield('metas')
    <!-- APP CUSTOM META -->

    <title>Backend Application - @yield('title')</title>

    <!-- START APP FAVICON -->
    <link rel="shortcut icon" href="{{ asset('packages/theme/vendors/images/favicon.ico') }}">
    <!-- APP FAVICON -->

    <!-- ========== START CORE SCRIPTS ========== -->
    @yield('core-scripts')
    <!-- ========== START CORE SCRIPTS ========== -->

    <!-- ========== START THEME CSS ========== -->
    @yield('theme-css')
    <!-- ========== END THEME CSS ========== -->

    <!-- ========== START PLUGINS CSS ========== -->
    @yield('plugin-css')
    <!-- ========== END PLUGINS CSS ========== -->

    <!-- ========== START PAGE CSS ========== -->
    @yield('page-css')
    <!-- ========== START PAGE CSS ========== -->

    <!-- BEGIN FONTS-->
    <link href="{{ asset('backend/MordernAdmin/vendors/images/favicon.ico') }}"
          rel="stylesheet">
    @yield('fonts')
    <!-- END FONTS-->

    @yield('styles')
</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <!-- ========== START FIXED TOP NAV ========== -->
    @include('backend.MordernAdmin.layouts.nav-top')
    <!-- ========== END FIXED TOP NAV ========== -->

    <!-- ========== START LEFT SIDEBAR ========== -->
    @include('backend.MordernAdmin.layouts.sidebar-menu')
    <!-- ========== END LEFT SIDEBAR ========== -->

    <!-- START RIGHT CONTENT -->
    @include('backend.MordernAdmin.layouts.app-content')
    <!-- END RIGHT CONTENT -->

    <!-- START FOOTER -->
    @include('backend.MordernAdmin.layouts.footer')
    <!-- END FOOTER -->

    <!-- ========== START THEME SCRIPTS ========== -->
    @yield('theme-scripts')
    <!-- ========== END THEME SCRIPTS ========== -->

    <!-- ========== START PLUGINS SCRIPTS ========== -->
    @yield('plugin-scripts')
    <!-- ========== END PLUGINS SCRIPTS ========== -->

    <!-- ========== START PAGE SCRIPTS ========== -->
    @yield('page-scripts')
    <!-- ========== START PAGE SCRIPTS ========== -->
</body>
</html>
