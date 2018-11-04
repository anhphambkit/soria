<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 22:12
 */
?>
@extends('backend.modern-admin.master')

@section('desc')

@endsection

@section('metas')

@endsection

@section('title')

@endsection

@section('fonts')

@endsection

@section('core-scripts')

@endsection

@section('theme-css')

@endsection

@section('core-scripts')

@endsection

@section('plugin-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/fonts/meteocons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/css/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/css/pages/dashboard-ecommerce.css') }}">
@endsection

@section('styles')

@endsection
{{-- ['admin', 'drsori.bi'] --}}
@section('breadcrumbs')
    @component('components.layouts.breadcrumbs')
        @slot('header', trans('category.header_create_new_category'))
        @slot('items', [
            [
                'active' => false,
                'link' => route('admin.dashboard', $domain),
                'title' => trans('breadcrumbs.home')
            ],
            [
                'active' => false,
                'link' => route('admin.product.category.index', $domain),
                'title' => trans('breadcrumbs.categories')
            ],
            [
                'active' => false,
                'link' => route('admin.product.category.index', $domain),
                'title' => trans('breadcrumbs.product')
            ],
            [
                'active' => true,
                'link' => '#',
                'title' => trans('breadcrumbs.new')
            ],
        ])
    @endcomponent
@endsection

@section('header-right')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 none-padding">
                @component('components.partials.cardbox')
                    @slot('title', trans('category.category_name'))
                    @slot('isActive', true)
                    @slot('content')
                        @include('backend.modern-admin.forms.products.create-new-product-category-form',
                                [
                                    'idForm' => 'form-create-new-category'
                                ])
                    @endslot
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
    <script>
        const URL = {
            CREATE_CATEGORY : "{{ route('admin_ajax.product.create_product_category', $domain) }}"
        }
    </script>
    <script src="{{ asset('assets/backend/modern-admin/assets/js/pages/product/new-product-category.js') }}"
            type="text/javascript"></script>
@endsection
