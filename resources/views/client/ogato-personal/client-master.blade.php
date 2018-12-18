<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 14:19
 */
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keyword" content="@yield('keywords')">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="bipham">
        <meta content="@yield('desc')" name="description" />
        <meta content="{{ csrf_token() }}" name="csrf-token" />

        <!-- START CUSTOM META -->
        @yield('metas')
        <!-- APP CUSTOM META -->

        <!-- Template Title -->
        <title>Soria - @yield('title')</title>

        <!-- START APP FAVICON -->
        <link rel="apple-touch-icon" href="{{ asset('assets/general/images/ico/favicon.ico') }}">
        <link rel="shortcut icon" href="{{ asset('assets/general/images/ico/favicon.ico') }}">
        <!-- APP FAVICON -->

        <!-- Font Google -->
        <link href="https://fonts.googleapis.com/css?family=Marcellus" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cormorant:400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=KoHo:300,400,600" rel="stylesheet">
        @yield('fonts')
        <!-- END FONTS-->

        <!-- ========== START CORE SCRIPTS ========== -->
        @yield('core-scripts')
        <!-- ========== START CORE SCRIPTS ========== -->

        <!-- ========== START THEME CSS ========== -->
        <link href="{{ asset('assets/client/ogato-personal/app-assets/css/plugins.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/client/ogato-personal/app-assets/css/style.css') }}" rel="stylesheet">
        @yield('theme-css')
        <!-- ========== END THEME CSS ========== -->

        <!-- ========== START PLUGINS CSS ========== -->
        @yield('plugin-css')
        <!-- ========== END PLUGINS CSS ========== -->

        <!-- ========== START PAGE CSS ========== -->
        @yield('page-css')
        <!-- ========== END PAGE CSS ========== -->

        @yield('styles')
    </head>
    <body>
        <!-- ========== START LOADER ========== -->
        @include('client.ogato-personal.partials.preloader')
        <!-- ========== END LOADER ========== -->

        <!-- ========== START SIDEBAR MENU ========== -->
        @include('client.ogato-personal.partials.sidebar-menu')
        <!-- ========== END SIDEBAR MENU ========== -->

        <!-- Main Content
   ================================================== -->
        <main id="mainContent">
            <div class="sidebar-overlay"></div>
            <!-- ========== START MAIN CENTER HEADER ========== -->
            @include('client.ogato-personal.partials.main-center-header')
            <!-- ========== END MAIN CENTER HEADER ========== -->

            <!-- ========== START NAV BAR MENU ========== -->
            @include('client.ogato-personal.partials.nav-bar-menu')
            <!-- ========== END NAV BAR MENU ========== -->

            <!-- main content
            ================================================== -->
            @include('client.ogato-personal.partials.content-right-sidebar')
            <!-- End main content
            ================================================== -->

            <!-- footer
            ================================================== -->
            @include('client.ogato-personal.partials.footer')
            <!-- End footer
            ================================================== -->
        </main>
        <!-- End Main Content
        ================================================== -->

        <!-- Recent Posts
        ================================================== -->
        @include('client.ogato-personal.partials.recent-posts')
        <!-- End Recent Posts
        ================================================== -->

        <!-- ========== START CORE FOOTER SCRIPTS ========== -->
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/bootstrap.min.js') }}"></script>
        @yield('core-footer-scripts')
        <!-- ========== END CORE FOOTER SCRIPTS ========== -->

        <!-- ========== START THEME SCRIPTS ========== -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/TweenMax.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/sticky-sidebar.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/youtubepopup.jquery.js') }}"></script>
        <!-- custom JavaScript -->
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/custom.js') }}"></script>
        @yield('theme-scripts')
        <!-- ========== END THEME SCRIPTS ========== -->

        <!-- ========== START PLUGINS SCRIPTS ========== -->
        <!-- ========== END PLUGINS SCRIPTS ========== -->

        <!-- ========== START PAGE SCRIPTS ========== -->
        @yield('page-scripts')
        <!-- ========== END PAGE SCRIPTS ========== -->

        <!-- ========== START CONSTANT HTTP CODE SCRIPTS ========== -->
        {{--@include('client.ogato-personal.layouts.constant')--}}
        <!-- ========== END CONSTANT HTTP CODE SCRIPTS ========== -->
    </body>
</html>
