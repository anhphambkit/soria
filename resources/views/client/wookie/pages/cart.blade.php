<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/27/19
 * Time: 22:22
 */
?>
@extends('client.wookie.master', [ 'isShowBreadcrumb' => false ])

@section('keywords'){{ $shopSettings['shop_meta_keywords'] }}@endsection

@section('desc'){{ $shopSettings['shop_meta_description'] }}@endsection

@section('large-image-meta'){{ asset($shopSettings['shop_logo_primary']) }}@endsection

@section('author-meta'){{ $shopSettings['website_name'] }}@endsection

@section('image-meta'){{ asset($shopSettings['shop_logo_primary']) }}@endsection

@section('type-post-meta'){{ 'article' }}@endsection

@section('url-post-meta'){{ route('client.shop.cart') }}@endsection

@section('created-date-post-meta')@endsection

@section('updated-date-post-meta')@endsection

@section('section-post-meta')@endsection

@section('metas')
@endsection

@section('title'){{ trans('shop.shopping_cart') }}@endsection

@section('title-description')@endsection

@section('fonts')
@endsection

@section('core-scripts')
@endsection

@section('theme-css')
@endsection

@section('plugin-css')
@endsection

@section('page-css')
@endsection

@section('styles')
@endsection

@section('content-page')
    @component('client.wookie.components.header-image')
        @slot('headerImage', trans('shop.shopping_cart'))
    @endcomponent
    <div class="container" id="content-cart-page">
        @if($cart['total_items'] > 0)
            <div class="row">
                <div class="col-sm-12 col-xl-8">
                    @component('client.wookie.components.shop-cart-table')
                        @slot('products', $cart['products'])
                    @endcomponent
                </div>
                <div class="col-sm-12 col-xl-4">
                    <div class="tt-shopcart-wrapper">
                        <div class="tt-shopcart-box tt-boredr-large">
                            <table class="tt-shopcart-table01">
                                <tbody>
                                <tr>
                                    <th class="text-uppercase">{{ trans('shop.sub_total') }}</th>
                                    <td>{{ number_format($cart['total_price'], 0, ",", ".") }} đ</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-uppercase">{{ trans('shop.grand_total') }}</th>
                                    <td>{{ number_format($cart['total_price'], 0, ",", ".") }} đ</td>
                                </tr>
                                </tfoot>
                            </table>
                            <a href="{{ route('client.shop.checkout_shipping') }}" class="text-uppercase btn btn-lg full-width-btn-custom"><span class="icon icon-check_circle"></span>{{ trans('shop.proceed_to_checkout') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="tt-empty-cart">
                <span class="tt-icon icon-f-39"></span>
                <h1 class="tt-title text-uppercase">{{ trans('shop.shopping_cart_is_empty') }}</h1>
                <p>{{ trans('shop.you_have_no_items_in_your_shopping_cart') }}</p>
                <a href="{{ route('client.shop.index') }}" class="btn text-uppercase">{{ trans('shop.continue_shopping') }}</a>
            </div>
        @endif
    </div>
@endsection

@section('core-footer-scripts')

@endsection

@section('theme-scripts')
@endsection

@section('plugin-scripts')
@endsection

@section('page-scripts')
    <script id="template-shop-cart-table" type="text/x-handlebars-template">
        @include('client.wookie.handle-bar.shop-cart-table-handle-bar')
    </script>

    <script src="{{ asset('assets/client/wookie/assets/js/pages/cart.js') }}"></script>
@endsection



