<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/2/19
 * Time: 00:34
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
    <div class="container-indent">
        <div class="container">
            <div class="row flex-sm-row-reverse">
                <div class="col-md-4 col-lg-3 col-xl-3 leftColumn rightColumn aside">
                    <div class="tt-btn-col-close">
                        <a href="#">Close</a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9 col-xl-9">
                    <div class="content-indent container-fluid-custom-mobile-padding-02">
                        <div class="tt-filters-options">
                            <h1 class="tt-title">
                                {{ $category->name }} <span class="tt-title-total">({{ sizeof($categoryProducts) }})</span>
                            </h1>
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
                            {{--<a href="#" class="btn btn-border">LOAD MORE</a>--}}
                            {{--<div class="tt_item_all_js">--}}
                                {{--<a href="#" class="btn btn-border01">NO MORE ITEM TO SHOW</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
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
@endsection

@section('page-scripts')
@endsection



