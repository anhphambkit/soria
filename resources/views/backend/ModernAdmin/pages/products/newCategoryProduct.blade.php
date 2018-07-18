<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 22:12
 */
?>
@extends('backend.ModernAdmin.master')

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
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/modernadmin/app-assets/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/modernadmin/app-assets/fonts/meteocons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/modernadmin/app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/modernadmin/app-assets/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/modernadmin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/modernadmin/app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/modernadmin/app-assets/css/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/modernadmin/app-assets/css/pages/dashboard-ecommerce.css') }}">
@endsection

@section('styles')

@endsection
{{-- ['admin', 'drsori.bi'] --}}
@section('breadcrumbs')
    @component('components.breadcrumbs')
        @slot('header', trans('category.header_create_new_category'))
        @slot('items', [
            [
                'active' => false,
                'link' => route('admin.dashboard', $domain),
                'title' => 'Home'
            ],
            [
                'active' => false,
                'link' => route('admin.product.category.index', $domain),
                'title' => 'Categories'
            ],
            [
                'active' => false,
                'link' => route('admin.product.category.index', $domain),
                'title' => 'Product'
            ],
            [
                'active' => true,
                'link' => '#',
                'title' => 'New'
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
                @component('components.cardbox')
                    @slot('title', trans('category.category_name'))
                    @slot('isActive', true)
                    @slot('content')
                        <form role="form" id="form-create-new-category">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    @component('components.field')
                                        @slot('title', trans('category.name'))
                                        @slot('name', 'name')
                                        @slot('id', 'name')
                                        @slot('required', true)
                                    @endcomponent
                                </div>
                                <div class="col-md-4">
                                    @component('components.field')
                                        @slot('title', trans('category.slug'))
                                        @slot('name', 'slug')
                                        @slot('id', 'slug')
                                        @slot('required', true)
                                    @endcomponent
                                </div>
                                <div class="col-md-4">
                                    @component('components.field')
                                        @slot('title', trans('category.category_parent'))
                                        @slot('name', 'parent_id')
                                        @slot('id', 'parent_id')
                                        @slot('type', 'dropdown')
                                        <?php
                                        $dropdown[''] = 'Select parent category';
                                        foreach ($categories as $category) {
                                            $dropdown[$category->id] = $category->name;
                                        }
                                        ?>
                                        @slot('values', $dropdown)
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    @component('components.field')
                                        @slot('title', trans('category.desc'))
                                        @slot('name', 'desc')
                                        @slot('id', 'desc')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    @component('components.field')
                                        @slot('title', trans('category.order'))
                                        @slot('type', 'number')
                                        @slot('name', 'order')
                                        @slot('id', 'order')
                                        @slot('attributes', ['step' => 1, 'min' => "1"])
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    @component('components.field')
                                        @slot('title', trans('category.meta_title'))
                                        @slot('id', 'meta_title')
                                        @slot('name', 'meta_title')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    @component('components.field')
                                        @slot('title', trans('category.meta_keyword'))
                                        @slot('name', 'meta_keywords')
                                        @slot('id', 'meta_keywords')
                                    @endcomponent

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    @component('components.field')
                                        @slot('title', trans('category.meta_desc'))
                                        @slot('id', 'meta_description')
                                        @slot('name', 'meta_description')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group row action-group">
                                <div class="col-12 text-right">
                                    @component('components.button')
                                        @slot('id', 'submit-new-category')
                                        @slot('control', 'submit')
                                        @slot('label', trans('generals.create'))
                                    @endcomponent

                                    @component('components.button')
                                        @slot('id', 'cancel-new-category')
                                        @slot('control', 'button')
                                        @slot('label', trans('generals.cancel'))
                                    @endcomponent
                                </div>
                            </div>
                        </form>
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
        const PRODUCT_API = {
            TEST_AJAX : "{{ route('test_ajax') }}",
            CREATE_CATEGORY : "{{ route('admin_ajax.product.create_product_category', $domain) }}"
        }
    </script>
    <script src="{{ asset('backend/modernadmin/assets/js/pages/newProductCategory.js') }}"
            type="text/javascript"></script>
@endsection
