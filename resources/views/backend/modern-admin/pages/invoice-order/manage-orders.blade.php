<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/8/19
 * Time: 08:18
 */
?>
@extends('backend.modern-admin.master')

@section('desc')

@endsection

@section('metas')

@endsection

@section('title')
    Manage Orders
@endsection

@section('fonts')

@endsection

@section('theme-css')

@endsection

@section('core-scripts')
@endsection

@section('plugin-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/plugins/noty/noty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/plugins/jquery-confirm/jquery-confirm.min.css')}}"> <!-- original -->
@endsection

@section('page-css')
@endsection

@section('styles')
@endsection
@section('breadcrumbs')
    @component('components.layouts.breadcrumbs')
        @slot('header', trans('product.header_manage_products'))
        @slot('items', [
            [
                'active' => false,
                'link' => route('admin.dashboard', $domain),
                'title' => trans('breadcrumbs.home')
            ],
            [
                'active' => false,
                'link' => route('admin.product.index', $domain),
                'title' => trans('breadcrumbs.invoice_order')
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
                    Manage Orders
                @endsection

                @section('btnSearchFilter')
                    @parent
                @endsection

                @section('area-modals')
                    {{--@include('backend.modern-admin.modals.products.edit-product-modal')--}}
                @stop

                @component('components.layouts.list-with-search')
                    @slot('idTable_DTS', 'manage-orders')
                    @slot('hasSearchFilter', false)
                    @slot('tableHeaderFooter')
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Total Price</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Updated Date</th>
                            <th>Updated Date</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Total Price</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Updated Date</th>
                            <th>Updated Date</th>
                        </tr>
                        </tfoot>
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
    <script src="{{ asset('assets/vendors/plugins/noty/noty.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-confirm/jquery-confirm.min.js')}}" type="text/javascript"></script>
@endsection

@section('page-scripts')
    <script>
        const URL = {
            GET_ALL_ORDERS : "{{ route('admin_ajax.invoice_order.get_all_orders', $domain) }}",
        };
    </script>
    <script src="{{ asset('assets/backend/modern-admin/assets/js/pages/invoice-order/manage-order.js') }}" type="text/javascript"></script>
@endsection

