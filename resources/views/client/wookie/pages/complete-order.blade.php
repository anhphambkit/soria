<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 14:26
 */
?>
@extends('client.wookie.master', [ 'isShowBreadcrumb' => false ])

@section('keywords'){{ $shopSettings['shop_meta_keywords'] }}@endsection

@section('desc'){{ $shopSettings['shop_meta_description'] }}@endsection

@section('large-image-meta'){{ asset($shopSettings['shop_favicon']) }}@endsection

@section('author-meta'){{ $shopSettings['website_name'] }}@endsection

@section('image-meta'){{ asset($shopSettings['shop_favicon']) }}@endsection

@section('type-post-meta'){{ 'article' }}@endsection

@section('url-post-meta'){{ route('client.shop.complete_order') }}@endsection

@section('created-date-post-meta')@endsection

@section('updated-date-post-meta')@endsection

@section('section-post-meta')@endsection

@section('metas')
@endsection

@section('title'){{ trans('shop.complete_order') }}@endsection

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
    <div id="content-page">
        <div class="container-indent">
            <div class="container">
                <div class="text-center">
                    <div class="icon-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="order-success-thanks">{{ trans('shop.thank_you_after_order_completed') }}</h3>
                    <a href="{{ route('client.shop.index') }}" class="btn">{{ trans('shop.continue_shopping') }}</a>
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
@endsection

@section('page-scripts')
@endsection



