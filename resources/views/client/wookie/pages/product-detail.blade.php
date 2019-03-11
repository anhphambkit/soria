<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/19/19
 * Time: 21:10
 */
$breadcrumbs = [
    trans('breadcrumbs.home') => route('client.page.home'),
    trans('breadcrumbs.shop') => route('client.shop.index'),
];

if (!empty($product['categories'])) {
    foreach ($product['categories'] as $category) {
        $breadcrumbs[$category['name']] = route('client.shop.category_page', "{$category['slug']}.{$category['id']}");
    }
}

$breadcrumbs[$product['name']] = route('client.product.detail', "{$product['slug']}.{$product['id']}");
?>
@extends('client.wookie.master')

@section('keywords')
    {{ $product['meta_keywords'] }}
@endsection

@section('desc')
    {{ $product['meta_description'] }}
@endsection

@section('metas')
@endsection

@section('title')
    {{ $product['name'] }}
@endsection

@section('title-description')
    {{--{{ $shopSettings['shop_title_description'] }}--}}
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
    <div id="tt-pageContent">
        <div class="container-indent">
            @component('client.wookie.components.product.product-overview-section')
                @slot('productGalleryMedias', $product['gallery_images'])
                @slot('productFeatureMedias', $product['feature_images'])
                @slot('name', $product['name'])
                @slot('sku', $product['sku'])
                @slot('shortDesc', $product['desc'])
                @slot('price', $product['price'])
                @slot('salePrice', $product['sale_price'])
                @slot('categories', $product['categories'])
                @slot('rating', $product['rating'])
                @slot('productId', $product['id'])
                @slot('mainServices', $mainServices)
            @endcomponent
        </div>

        <div class="container-indent wrapper-social-icon">
            <div class="container">
                @component('client.wookie.partials.social-horizontal')
                @endcomponent
            </div>
        </div>
        <div class="container-indent">
            <div class="container">
                @component('client.wookie.components.product.partials.detail-product-collages')
                    @slot('longDesc', $product['long_desc'])
                @endcomponent
            </div>
        </div>
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                @component('client.wookie.components.block-title')
                    @slot('title', trans('shop.related_products'))
                @endcomponent
                @component('client.wookie.components.product.carousel-products')
                    @slot('products', $relatedProducts)
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section('core-footer-scripts')
@endsection

@section('theme-scripts')
@endsection

@section('plugin-scripts')
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/client/wookie/app-assets/external/elevatezoom/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('assets/client/wookie/app-assets/external/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/client/wookie/app-assets/external/panelmenu/panelmenu.js') }}"></script>
    <script src="{{ asset('assets/client/wookie/app-assets/external/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/client/wookie/assets/js/pages/detail-product.js') }}"></script>
@endsection



