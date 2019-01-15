<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/12/19
 * Time: 14:27
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="@yield('keywords')">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="bipham">
        <meta content="@yield('desc')" name="description" />
        <meta content="{{ csrf_token() }}" name="csrf-token" />

        <!-- START CUSTOM META -->
        @yield('metas')
        <!-- APP CUSTOM META -->

        <!-- Template Title -->
        <title>@yield('title') - Soria Shop</title>

        <!-- START APP FAVICON -->
        <link rel="apple-touch-icon" href="{{ asset('assets/general/images/ico/favicon.ico') }}">
        <link rel="shortcut icon" href="{{ asset('assets/general/images/ico/favicon.ico') }}">
        <!-- APP FAVICON -->

        <!-- Font Google -->
        @yield('fonts')
        <!-- END FONTS-->

        <!-- ========== START CORE SCRIPTS ========== -->
        @yield('core-scripts')
        <!-- ========== START CORE SCRIPTS ========== -->

        <!-- ========== START THEME CSS ========== -->
        <link href="{{ asset('assets/client/wookie/app-assets/css/theme.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/client/wookie/app-assets/css/theme-07.css') }}" rel="stylesheet">
        {{--<link href="{{ asset('assets/client/wookie/assets/css/custom-theme.css') }}" rel="stylesheet">--}}
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
        @include('client.wookie.partials.loader')
        <!-- ========== END LOADER ========== -->

        <!-- ========== START HEADER ========== -->
        @include('client.wookie.partials.header-menu')
        <!-- ========== END HEADER ========== -->

        <!-- ========== START CONTENT PAGE ========== -->
        @include('client.wookie.partials.content-page')
        <!-- ========== END CONTENT PAGE ========== -->

        <!-- ========== START FOOTER ========== -->
        @include('client.wookie.partials.footer')
        <!-- ========== END FOOTER ========== -->

        <!-- ========== START BACK TO TOP ========== -->
        @include('client.wookie.partials.back-to-top')
        <!-- ========== END BACK TO TOP ========== -->

        <!-- ========== START MODAL ADD TO CART ========== -->
        @include('client.wookie.modals.add-to-cart-modal')
        <!-- ========== END MODAL ADD TO CART ========== -->

        <!-- ========== START MODAL QUICK VIEW ========== -->
        @include('client.wookie.modals.quick-view-modal')
        <!-- ========== END MODAL QUICK VIEW ========== -->

        <!-- ========== START CORE FOOTER SCRIPTS ========== -->
        <script src="{{ asset('assets/client/wookie/app-assets/external/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/bootstrap/js/bootstrap.min.js') }}"></script>
        @yield('core-footer-scripts')
        <!-- ========== END CORE FOOTER SCRIPTS ========== -->

        <!-- ========== START THEME SCRIPTS ========== -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('assets/client/wookie/app-assets/external/slick/slick.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/panelmenu/panelmenu.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/instafeed/instafeed.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/countdown/jquery.plugin.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/countdown/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/lazyLoad/lazyload.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/js/main.js') }}"></script>
        <!-- custom JavaScript -->
        <!-- form validation and sending to mail -->
        <script src="{{ asset('assets/client/wookie/app-assets/external/form/jquery.form.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/form/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/form/jquery.form-init.js') }}"></script>
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