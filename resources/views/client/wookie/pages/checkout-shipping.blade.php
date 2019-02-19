<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/17/19
 * Time: 11:19
 */
?>
@extends('client.wookie.master')

@section('keywords')
@endsection

@section('desc')
@endsection

@section('metas')
@endsection

@section('title')
    Check Out - Shipping
@endsection

@section('fonts')
@endsection

@section('core-scripts')
@endsection

@section('theme-css')
@endsection

@section('plugin-css')
    <link href="{{ asset('assets/vendors/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('page-css')
@endsection

@section('styles')
@endsection

{{--content page must define before section content--}}
@section('content-page')
    <div id="content-cart-page">
        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">CHECKOUT SHIPPING</h1>
                <div class="row">
                    <div class="col-sm-12 col-xl-6 custom-col">
                        @component('client.wookie.forms.address-account')
                            @slot('provincesCities', $provincesCities)
                        @endcomponent
                    </div>
                    <div class="col-sm-12 col-xl-6 custom-col">
                        @component('client.wookie.components.cart-list-products')
                            @slot('products', $cart['products'])
                            @slot('totalPrice', $cart['total_price'])
                            @slot('totalItems', $cart['total_items'])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('core-footer-scripts')
    <script id="template-shop-cart-table" type="text/x-handlebars-template">
        @include('client.wookie.handle-bar.shop-cart-table-handle-bar')
    </script>

    <script src="{{ asset('assets/client/wookie/assets/js/pages/cart.js') }}"></script>
@endsection

@section('theme-scripts')

@endsection

@section('plugin-scripts')
    <script src="{{ asset('assets/vendors/js/jquery.serializejson.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/jquery.buttonLoader.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/select2.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/plugins/mask/jquery.mask.min.js')}}"></script>
@endsection

@section('page-scripts')
    <script>
        const API_ADDRESS = {
            REFRESH_DISTRICTS : "{{ route('general_ajax.address.refresh_districts', $domain) }}",
            REFRESH_WARDS : "{{ route('general_ajax.address.refresh_wards', $domain) }}",
        };
        const API_CHECKOUT = {
            CREATE_DEFAULT_ADDRESS_SHIPPING : "{{ route('ajax.shop.create_address_shipping_default', $domain) }}",
        }
    </script>

    <script src="{{ asset('assets/client/wookie/assets/js/helper/address-form.js')}}"></script>
    <script src="{{ asset('assets/client/wookie/assets/js/pages/checkout-shipping.js')}}"></script>
@endsection



