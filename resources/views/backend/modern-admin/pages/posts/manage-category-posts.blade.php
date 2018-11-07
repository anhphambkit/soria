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

@endsection

@section('page-css')

@endsection

@section('styles')

@endsection

@section('breadcrumbs')
    @component('components.layouts.breadcrumbs')
        @slot('header', trans('category.header_manage_categories'))
        @slot('items', [
            [
                'active' => false,
                'link' => route('admin.dashboard', $domain),
                'title' => trans('breadcrumbs.home')
            ],
            [
                'active' => false,
                'link' => route('admin.post.category.index', $domain),
                'title' => trans('breadcrumbs.categories')
            ],
            [
                'active' => false,
                'link' => route('admin.post.category.index', $domain),
                'title' => trans('breadcrumbs.post')
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

                @section('btnSearchFilter')
                    @parent
                @endsection

                @section('btn-others')
                    <div class="col-lg-12 ks-panels-column-section">
                        @component('components.elements.button')
                            @slot('id', 'btn-create-category')
                            @slot('type', 'button')
                            @slot('class','btn-primary')
                            @slot('attributes', [ 'data-toggle' => 'modal', 'data-target' => '#modal-create-post-category'])
                            @slot('label', trans('category.add_new'))
                        @endcomponent
                    </div>
                @endsection

                @section('area-modals')
                    @include('backend.modern-admin.modals.posts.create-new-post-category-modal')
                    @include('backend.modern-admin.modals.posts.edit-category-post-modal')
                @stop

                @component('components.layouts.list-with-search')
                    @slot('idTable_DTS', 'manage-categories')
                    @slot('hasSearchFilter', false)
                    @slot('tableHeaderFooter')
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created Date.</th>
                                <th>Updated Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created Date.</th>
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
@endsection

@section('page-scripts')
    <script>
        const URL = {
            GEL_LIST_CATEGORIES : "{{ route('admin_ajax.post.get_all_post_category', $domain) }}",
            CREATE_CATEGORY : "{{ route('admin_ajax.post.create_post_category', $domain) }}",
            DETAIL_POST_CATEGORY : "{{ route('admin_ajax.post.get_detail_post_category', $domain) }}",
            UPDATE_POST_CATEGORY : "{{ route('admin_ajax.post.update_post_category', $domain) }}",
        };
    </script>
    <script src="{{ asset('assets/backend/modern-admin/assets/js/pages/post/manage-post-category.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/backend/modern-admin/assets/js/pages/post/new-post-category.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/backend/modern-admin/assets/js/partials/post/edit-post-category.js') }}"
            type="text/javascript"></script>
@endsection

