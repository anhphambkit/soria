<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/2/19
 * Time: 00:34
 */
?>
@extends('client.wookie.master')

@section('keywords'){{ $category->meta_keywords }}@endsection

@section('desc'){{ $category->meta_description }}@endsection

@section('large-image-meta'){{ asset($shopSettings['shop_favicon']) }}@endsection

@section('author-meta'){{ $shopSettings['website_name'] }}@endsection

@section('image-meta'){{ asset($shopSettings['shop_favicon']) }}@endsection

@section('type-post-meta'){{ 'article' }}@endsection

@section('url-post-meta'){{ route('client.shop.category_page', "{$category->slug}.{$category->id}") }}@endsection

@section('created-date-post-meta'){{ $category->created_at }}@endsection

@section('updated-date-post-meta'){{ $category->updated_at }}@endsection

@section('section-post-meta'){{ $category->meta_description }}@endsection

@section('metas')
@endsection

@section('title'){{ $category->name }}@endsection

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

{{--content page must define before section content--}}
@section('content-page')
    @component('client.wookie.components.header-image')
        @slot('headerImage', $category->name)
    @endcomponent
    <div class="container">
        {{--<div class="row">--}}
            {{--<h1 class="tt-title">--}}
                {{--{{  }} <span class="tt-title-total">({{ sizeof($categoryProducts) }} {{ trans('shop.product') }})</span>--}}
            {{--</h1>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-md-12 col-lg-9 col-xl-9">
                <div class="content-indent container-fluid-custom-mobile-padding-02">
                    <div class="tt-filters-options">

                    </div>
                    <div class="tt-product-listing row">
                        @foreach($categoryProducts as $categoryProduct)
                            <div class="col-6 col-md-4 tt-col-item">
                                @component('client.wookie.components.product.product-item')
                                    @slot('product', $categoryProduct)
                                @endcomponent
                            </div>
                        @endforeach
                    </div>
                    {{--<div class="text-center tt_product_showmore">--}}
                    {{--<a href="#" class="btn btn-border">{{ trans('blog.detail') }}</a>--}}
                    {{--<div class="tt_item_all_js">--}}
                    {{--<a href="#" class="btn btn-border01">NO MORE ITEM TO SHOW</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col-md-12 col-lg-3 col-xl-3 custom-right-service-sidebar">
                <div class="tt-btn-col-close">
                    <a href="#">Close</a>
                </div>
                @include('client.wookie.components.product.partials.services-product')
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
@endsection



