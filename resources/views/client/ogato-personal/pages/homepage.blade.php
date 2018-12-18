<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 16:02
 */
?>
@extends('client.ogato-personal.client-master', [ 'isSinglePost' => false ])

@section('keywords')
@endsection

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

@section('plugin-css')
@endsection

@section('page-css')
@endsection

@section('styles')
@endsection

@section('main-header-page')
    @include('client.ogato-personal.partials.main-center-header')
@endsection

{{--content page must define before section content--}}
@section('content-page')
    @component('client.ogato-personal.components.article')
    @endcomponent
    @component('client.ogato-personal.components.article')
        @slot('typeArticle', 'gallery')
    @endcomponent
    @component('client.ogato-personal.components.article')
        @slot('typeArticle', 'video')
    @endcomponent
    @component('client.ogato-personal.components.article')
        @slot('typeArticle', 'audio')
    @endcomponent
    @component('client.ogato-personal.components.article')
        @slot('typeArticle', 'slide')
    @endcomponent
    @include('client.ogato-personal.partials.pagination')
@endsection

@section('content')
    @include('client.ogato-personal.partials.content-right-sidebar', [ 'isSinglePost' => false ])
@endsection


@section('core-footer-scripts')
@endsection

@section('theme-scripts')
@endsection

@section('plugin-scripts')
@endsection

@section('page-scripts')
@endsection


