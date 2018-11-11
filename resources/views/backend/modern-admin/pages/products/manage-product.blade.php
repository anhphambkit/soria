<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/6/18
 * Time: 06:47
 */
?>
@extends('backend.modern-admin.master')

@section('desc')

@endsection

@section('metas')

@endsection

@section('title')
    Manage Products
@endsection

@section('fonts')

@endsection

@section('theme-css')

@endsection

@section('core-scripts')
    <script src="{{ asset('assets/vendors/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('assets/vendors/plugins/ckfinder/ckfinder.js')}}"></script>
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
                'title' => trans('breadcrumbs.products')
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
                    {{ trans('product.title_filter') }}
                @endsection

                @section('btnSearchFilter')
                    @parent
                @endsection

                @section('btn-others')
                    <div class="col-lg-12 bb-panels-column-section">
                        @component('components.elements.button')
                            @slot('id', 'btn-create-product')
                            @slot('type', 'button')
                            @slot('class','btn-primary')
                            @slot('attributes', [ 'data-toggle' => 'modal', 'data-target' => '#modal-create-product'])
                            @slot('label', trans('product.add_new'))
                        @endcomponent
                    </div>
                @endsection

                @section('area-modals')
                    @include('backend.modern-admin.modals.products.create-new-product-modal')
                    {{--@include('backend.modern-admin.modals.products.edit-product-modal')--}}
                @stop

                @component('components.layouts.list-with-search')
                    @slot('idTable_DTS', 'manage-products')
                    @slot('hasSearchFilter', false)
                    @slot('tableHeaderFooter')
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Publish</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Publish</th>
                            <th>Created Date</th>
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
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/load-image.all.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/canvas-to-blob.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/jquery.iframe-transport.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/jquery.fileupload.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/jquery.fileupload-process.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/jquery.fileupload-image.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/jquery.fileupload-audio.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/jquery.fileupload-video.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-file-upload/js/jquery.fileupload-validate.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/noty/noty.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-confirm/jquery-confirm.min.js')}}" type="text/javascript"></script>
@endsection

@section('page-scripts')
    <script>
        const URL = {
            GEL_LIST_PRODUCTS : "{{ route('admin_ajax.product.get_all_products', $domain) }}",
            CREATE_PRODUCT : "{{ route('admin_ajax.product.create_product', $domain) }}",
            DETAIL_PRODUCT : "{{ route('admin_ajax.product.get_detail_product', $domain) }}",
            UPDATE_PRODUCT : "{{ route('admin_ajax.product.update_product', $domain) }}",
        };
    </script>
    <script src="{{ asset('assets/backend/modern-admin/assets/js/pages/product/manage-products.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/modern-admin/assets/js/pages/product/new-product.js') }}" type="text/javascript"></script>
    {{--<script src="{{ asset('assets/backend/modern-admin/assets/js/partials/product/edit-product.js') }}" type="text/javascript"></script>--}}
    <script type="application/javascript">
        core.initCkEditor4('desc');
        core.initCkEditor4('long_desc');
        core.initDropzoneImplement('.bb-attach-files-widget .bb-upload');
        core.initBindDropDrag();
        core.initFileUploadWidget('#bb-widget-attachments-images-feature', 'imgFeatures');
        core.initFileUploadWidget('#bb-widget-attachments-images-gallery', 'imgGalleries');
    </script>
@endsection

