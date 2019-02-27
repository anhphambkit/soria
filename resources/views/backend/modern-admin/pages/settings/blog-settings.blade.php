<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 22:21
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
            <div class="none-padding col-lg-12">
                @component('components.sections.card')
                    @slot('id', 'card-general-blog')
                    @slot('title', 'Generals Blog')
                    @slot('content')
                        @include('backend.modern-admin.forms.settings.setting-form',
                            [
                                'idForm' => 'form-blog-setting'
                            ])
                    @endslot
                    @slot('controls', ['reload', 'edit'])
                    @slot('class','card-setting')
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
        };
    </script>
@endsection

