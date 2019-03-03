<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/17/19
 * Time: 11:19
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
    {{ trans('shop.checkout_shipping') }}
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
            @component('client.wookie.components.header-image')
                @slot('headerImage', trans('address-form.checkout_shipping'))
            @endcomponent
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xl-6 custom-col">
                        <div id="shipping-address-area">
                            @if($addressBooks->isNotEmpty())
                                <h5>{{ trans('address-form.select_shipping_address') }}:</h5>
                            @endif
                            <div class="list-address-shipping">
                                @if($addressBooks->isNotEmpty())
                                    @foreach($addressBooks as $addressBook)
                                        @component('client.wookie.components.card-address')
                                            @slot('address', $addressBook)
                                        @endcomponent
                                    @endforeach
                                @else
                                    <h5>{{ trans('address-form.add_new_shipping_address') }}:</h5>
                                    @component('client.wookie.forms.address-account')
                                        @slot('provincesCities', $provincesCities)
                                        @slot('isDefault', true)
                                    @endcomponent
                                @endif
                            </div>
                            @if($addressBooks->isNotEmpty())
                                <div class="action-address-shipping-area">
                                <span class="guide-custom">
                                    {{ trans('address-form.do_you_want_ship_to_other_address') }}
                                </span>
                                    <span class="action-custom">
                                    <a href="#" class="btn-link new-shipping-address-action">{{ trans('address-form.add_new_shipping_address') }}</a>
                                </span>
                                </div>
                            @endif
                        </div>
                        <div class="crud-form-area">
                            <div class="new-form-area" style="display: none">
                                <h5>{{ trans('address-form.add_new_shipping_address') }}:</h5>
                                @component('client.wookie.forms.address-account')
                                    @slot('provincesCities', $provincesCities)
                                @endcomponent
                            </div>
                            <div class="edit-form-area" style="display: none">
                                <h5>{{ trans('address-form.edit_shipping_address') }}:</h5>
                                @component('client.wookie.forms.address-account')
                                    @slot('provincesCities', $provincesCities)
                                    @slot('isUpdate', true)
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6 custom-col">
                        <h5>{{ trans('address-form.preview_order') }}:</h5>
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
            REFRESH_DISTRICTS : "{{ route('general_ajax.address.refresh_districts') }}",
            REFRESH_WARDS : "{{ route('general_ajax.address.refresh_wards') }}",
        };
        const API_CHECKOUT = {
            CREATE_ADDRESS_SHIPPING : "{{ route('ajax.shop.create_address_shipping') }}",
            DELETE_ADDRESS_SHIPPING : "{{ route('ajax.shop.delete_address_shipping') }}",
            UPDATE_ADDRESS_SHIPPING : "{{ route('ajax.shop.update_address_shipping') }}",
            DETAIL_ADDRESS_SHIPPING : "{{ route('ajax.shop.get_detail_address_shipping') }}",
            SHIP_TO_THIS_ADDRESS : "{{ route('ajax.shop.ship_to_this_address') }}",
        }
    </script>

    <script id="template-checkout-shipping-address" type="text/x-handlebars-template">
        @include('client.wookie.handle-bar.checkout-shipping-address')
    </script>

    <script src="{{ asset('assets/client/wookie/assets/js/pages/checkout-shipping.js')}}"></script>
    <script src="{{ asset('assets/client/wookie/assets/js/partials/new-shipping-address.js')}}"></script>
    @if($addressBooks->isEmpty())
        <script src="{{ asset('assets/client/wookie/assets/js/partials/new-default-shipping-address.js')}}"></script>
    @endif
@endsection



