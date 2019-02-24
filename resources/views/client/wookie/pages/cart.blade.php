<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/27/19
 * Time: 22:22
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
    Cart
@endsection

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
    @if($cart['total_items'] > 0)
        <div id="content-cart-page">
            <div class="container-indent">
                @component('client.wookie.components.header-image')
                    @slot('headerImage', "Shopping Cart")
                @endcomponent
                <div class="container">
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
                                            <th>SUBTOTAL</th>
                                            <td>{{ number_format($cart['total_price'], 0, ",", ".") }} đ</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>GRAND TOTAL</th>
                                            <td>{{ number_format($cart['total_price'], 0, ",", ".") }} đ</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <a href="{{ route('client.shop.checkout_shipping', $domain) }}" class="btn btn-lg"><span class="icon icon-check_circle"></span>PROCEED TO CHECKOUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div id="content-cart-page">
            <div class="container-indent nomargin">
                <div class="tt-empty-cart">
                    <span class="tt-icon icon-f-39"></span>
                    <h1 class="tt-title">SHOPPING CART IS EMPTY</h1>
                    <p>You have no items in your shopping cart.</p>
                    <a href="{{ route('client.shop.index', $domain) }}" class="btn">CONTINUE SHOPPING</a>
                </div>
            </div>
        </div>
    @endif
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



