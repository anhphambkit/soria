<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 16:19
 */
?>
<!-- tt-desktop-header -->
<div class="tt-desktop-header">
    <div class="container">
        <div class="tt-header-holder">
            <div class="tt-obj-logo obj-aligment-center">
                <!-- logo -->
                <a class="tt-logo tt-logo-alignment" href="{{ route('client.shop.index', $domain) }}">
                    <img src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/logo.png') }}" alt="">
                </a>
                <!-- /logo -->
            </div>
            <div class="tt-obj-options obj-move-right tt-position-absolute">
                <!-- tt-search -->
                @include('client.wookie.partials.header.search-header')
                <!-- /tt-search -->

                <!-- tt-cart -->
                @include('client.wookie.partials.header.cart-header')
                <!-- /tt-cart -->

                <!-- tt-account -->
                @include('client.wookie.partials.header.account-header')
                <!-- /tt-account -->

                <!-- tt-langue and tt-currency -->
                {{--@include('client.wookie.partials.header.other-settings-header')--}}
                <!-- /tt-langue and tt-currency -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tt-header-holder">
            <div class="tt-obj-menu obj-aligment-center">
                <!-- tt-menu -->
                @include('client.wookie.partials.header.nav-menu-header')
                <!-- /tt-menu -->
            </div>
        </div>
    </div>
</div>
