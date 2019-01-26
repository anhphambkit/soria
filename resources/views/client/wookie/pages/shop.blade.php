<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/12/19
 * Time: 14:27
 */
//dd($products);
?>
@extends('client.wookie.master', [ 'isHomePage' => true ])

@section('keywords')
@endsection

@section('desc')
@endsection

@section('metas')
@endsection

@section('title')
    Shop
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

{{--content page must define before section content--}}
@section('content-page')
    <div class="container-indent nomargin">
        <div class="container-fluid">
            <div class="row no-gutter">
                @component('client.wookie.components.slider-banner')
                @endcomponent
            </div>
        </div>
    </div>

    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            @component('client.wookie.components.block-title')
                @slot('title', "BEST SELLER")
            @endcomponent
            @component('client.wookie.components.product.carousel-products')
                @slot('products', $bestSellerProducts)
            @endcomponent
        </div>
    </div>

    @foreach($productGroups as $categoryName => $productGroup)
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                @component('client.wookie.components.block-title')
                    @slot('title', strtoupper($categoryName))
                @endcomponent
                @component('client.wookie.components.product.carousel-products')
                    @slot('products', $productGroup)
                @endcomponent
            </div>
        </div>
    @endforeach
@endsection

@section('core-footer-scripts')
@endsection

@section('theme-scripts')
@endsection

@section('plugin-scripts')
@endsection

@section('page-scripts')
@endsection



