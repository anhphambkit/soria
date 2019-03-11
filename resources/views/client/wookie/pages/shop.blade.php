<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/12/19
 * Time: 14:27
 */
?>
@extends('client.wookie.master', [ 'isHomePage' => true ])

@section('keywords')
    {{ $shopSettings['shop_meta_keywords'] }}
@endsection

@section('desc')
    {{ $shopSettings['shop_meta_description'] }}
@endsection

@section('metas')
@endsection

@section('title')
    {{--{{ trans('breadcrumbs.shop') }}--}}
@endsection

@section('title-description')
    {{ $shopSettings['shop_title_description'] }}
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
            @component('components.partials.message-call-out')
                @slot('contentCallout')
                    <h1 class="title-header-custom text-center">
                        {!! $shopSettings['shop_title'] !!}
                    </h1>
                @endslot
            @endcomponent
            @component('client.wookie.components.block-title')
                @slot('title', trans('shop.best_seller'))
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
                    @slot('title', $categoryName)
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



