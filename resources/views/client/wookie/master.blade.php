<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/12/19
 * Time: 14:27
 */
$isHomePage = isset($isHomePage) ? $isHomePage : false;
$isShowBreadcrumb = isset($isShowBreadcrumb) ? $isShowBreadcrumb : true;
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
        <link rel="apple-touch-icon" href="{{ asset($shopSettings['shop_favicon']) }}">
        <link rel="shortcut icon" href="{{ asset($shopSettings['shop_favicon']) }}">
        <!-- APP FAVICON -->

        <!-- Font Google -->
        <link href="{{ asset('assets/vendors/plugins/fontawesome/css/all.min.css') }}"
              rel="stylesheet">
        @yield('fonts')
        <!-- END FONTS-->

        <!-- ========== START CORE SCRIPTS ========== -->
        <link href="{{ asset('assets/vendors/css/toastr/toastr.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/vendors/css/sweet-alert/sweetalert.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        @yield('core-scripts')
        <!-- ========== START CORE SCRIPTS ========== -->

        <!-- ========== START THEME CSS ========== -->
        <link href="{{ asset('assets/client/wookie/app-assets/css/theme.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/client/wookie/app-assets/css/theme-07.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/general/css/typography-content/style.css') }}" rel="stylesheet">
        @yield('theme-css')
        <!-- ========== END THEME CSS ========== -->

        <!-- ========== START PLUGINS CSS ========== -->
        @yield('plugin-css')
        <!-- ========== END PLUGINS CSS ========== -->

        <!-- ========== START PAGE CSS ========== -->
        <link href="{{ asset('assets/client/wookie/assets/css/custom-shop.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/client/wookie/app-assets/external/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/general/js/loading/soria-loading.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/general/js/loading/loaded.js') }}" type="text/javascript"></script>
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

        <!-- ========== START BREADCRUMB ========== -->
        @if(!$isHomePage && $isShowBreadcrumb)
            @include('client.wookie.partials.breadcrumb')
        @endif
        <!-- ========== END BREADCRUMB ========== -->

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
        <script src="{{ asset('assets/vendors/plugins/fontawesome/js/all.min.js')}}"></script>
        <script src="{{ asset('assets/client/wookie/app-assets/external/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/js/toastr/toastr.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/sweet-alert/sweetalert.min.js')}}"></script>
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

        <!-- Default Options -->
        <script src="{{ asset('assets/general/js/default-configs/toast-default.js')}}"></script>
        @yield('theme-scripts')
        <!-- ========== END THEME SCRIPTS ========== -->

        <!-- ========== START PLUGINS SCRIPTS ========== -->
        @yield('plugin-scripts')
        <!-- ========== END PLUGINS SCRIPTS ========== -->

        <!-- ========== START PAGE SCRIPTS ========== -->
        <script>
            const API_SHOP = {
                ADD_TO_CART : "{{ route('ajax.shop.add_to_cart') }}",
                VIEW_CART_HEADER : "{{ route('ajax.shop.view_cart_header') }}",
                DELETE_PRODUCT_IN_CART : "{{ route('ajax.shop.delete_product_in_cart') }}",
            };
        </script>

        <script id="template-cart-header" type="text/x-handlebars-template">
            @include('client.wookie.handle-bar.view-cart-header')
        </script>

        <script src="{{ asset('assets/client/wookie/assets/js/shop.js') }}"></script>
        @yield('page-scripts')
        <!-- ========== END PAGE SCRIPTS ========== -->

        <!-- ========== START CONSTANT HTTP CODE SCRIPTS ========== -->
        @include('generals.constant')
        <!-- ========== END CONSTANT HTTP CODE SCRIPTS ========== -->
    </body>
</html>