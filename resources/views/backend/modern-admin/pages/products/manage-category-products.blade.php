<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 10/19/18
 * Time: 20:17
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
                'title' => trans('breadcrumbs.manage')
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
                @section('titleSearchFilter')
                    {{ trans('category.title_filter') }}
                @endsection

                @section('contentSearchFilter')
                    {{--<div class="row row-search-form">--}}
                        {{--<fieldset class="form-group col-sm-3">--}}
                            {{--<label class="form-control-label" for="contact_name">{{ trans('agoyu::agoyu.manage_consumer_page.contact_name') }}</label>--}}
                            {{--<input type="text" class="form-control pl-3" name="username" id="username" placeholder="{{ trans('agoyu::agoyu.manage_consumer_page.contact_name') }}">--}}
                        {{--</fieldset>--}}
                        {{--<fieldset class="form-group col-sm-3">--}}
                            {{--<label class="form-control-label" for="status">{{ trans('agoyu::agoyu.manage_consumer_page.status') }}</label>--}}
                            {{--<select class="form-control pl-3" id="status" name="status">--}}
                                {{--<option selected disabled>{{ trans('agoyu::agoyu.manage_consumer_page.select_status_title') }}</option>--}}
                                {{--<option value="0">{{ trans('agoyu::agoyu.manage_consumer_page.inactive') }}</option>--}}
                                {{--<option value="1">{{ trans('agoyu::agoyu.manage_consumer_page.active') }}</option>--}}
                            {{--</select>--}}
                        {{--</fieldset>--}}
                    {{--</div>--}}
                @endsection

                @section('btnSearchFilter')
                    @parent
                @endsection

                @section('btn-others')
                    <div class="col-lg-12 ks-panels-column-section">
                        @component('components.elements.button')
                            @slot('id', 'create-consumer')
                            @slot('type', 'button')
                            @slot('class','btn-primary')
                            @slot('attributes', [ 'data-toggle' => 'modal', 'data-target' => '#modal-create-consumer'])
                            @slot('label', trans('category.add_new'))
                        @endcomponent
                    </div>
                @endsection

                @section('area-modals')
                    {{--@include('agoyu::modals.create-consumer', ['typeCreateConsumer' => 'personal'])--}}
                @stop

                @include('components.layouts.list-with-search',
                        [
                        'idTable_DTS' => 'manage-categories'
                        ]
                    )
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
            GEL_LIST_CATEGORIES : "{{ route('admin_ajax.product.get_all_product_category', $domain) }}",
        };
    </script>
    <script src="{{ asset('assets/backend/modern-admin/assets/js/pages/manage-product-category.js') }}"
            type="text/javascript"></script>
@endsection

