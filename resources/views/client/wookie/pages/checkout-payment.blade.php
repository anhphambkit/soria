<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 09:17
 */
?>
@extends('client.wookie.master', [ 'isShowBreadcrumb' => false ])

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
    <div id="content-payment-page">
        <div class="container-indent">
            @component('client.wookie.components.header-image')
                @slot('headerImage', trans('address-form.checkout_payment'))
            @endcomponent
            <div class="container">
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
        const API_CHECKOUT = {
            ORDER : "{{ route('ajax.shop.checkout_new_order') }}",
        }
    </script>


    <script src="{{ asset('assets/client/wookie/assets/js/pages/checkout-payment.js')}}"></script>
@endsection



