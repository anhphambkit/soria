<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 14:26
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
    Complete Order
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
    <div id="content-page">
        <div class="container-indent">
            <div class="container">
                <div class="text-center">
                    <div class="icon-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="order-success-thanks">Thank you. Your order has been processed.</h3>
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



