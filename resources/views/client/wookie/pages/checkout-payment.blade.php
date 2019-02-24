<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 09:17
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
    Check Out - Payment
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
                <h1 class="tt-title-subpages noborder">{{ trans('address-form.checkout_payment') }}</h1>
                <div class="row">
                    <div class="col-sm-12 col-xl-6 custom-col">
                        <div class="shipping-area custom-area">
                            <h5>1. {{ trans('address-form.select_method_shipping') }}</h5>
                            @component('client.wookie.components.shipping-methods')
                            @endcomponent
                        </div>
                        <div class="payment-area custom-area">
                            <h5>2. {{ trans('address-form.select_method_payment') }}</h5>
                            @component('client.wookie.components.payment-methods')
                            @endcomponent
                        </div>
                        <div class="action-payment-page">
                            <a href="#" class="btn btn-large-custom btn-custom-shop btn-checkout-order">{{ trans('address-form.order') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6 custom-col">
                        <h5>{{ trans('address-form.preview_order') }}:</h5>
                        <div class="address-shipping-info">
                            @component('client.wookie.components.card-address-shipping')
                                @slot('address', $addressShipping)
                            @endcomponent
                        </div>
                        <div class="cart-info">
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
    </div>
@endsection

@section('core-footer-scripts')
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
            CREATE_ADDRESS_SHIPPING : "{{ route('ajax.shop.create_address_shipping', $domain) }}",
            DELETE_ADDRESS_SHIPPING : "{{ route('ajax.shop.delete_address_shipping', $domain) }}",
            UPDATE_ADDRESS_SHIPPING : "{{ route('ajax.shop.update_address_shipping', $domain) }}",
            DETAIL_ADDRESS_SHIPPING : "{{ route('ajax.shop.get_detail_address_shipping', $domain) }}",
            SHIP_TO_THIS_ADDRESS : "{{ route('ajax.shop.ship_to_this_address', $domain) }}",
        }
    </script>

    <script id="template-checkout-shipping-address" type="text/x-handlebars-template">
        @include('client.wookie.handle-bar.checkout-shipping-address')
    </script>

    <script src="{{ asset('assets/client/wookie/assets/js/pages/checkout-shipping.js')}}"></script>
    <script src="{{ asset('assets/client/wookie/assets/js/partials/new-shipping-address.js')}}"></script>
@endsection



