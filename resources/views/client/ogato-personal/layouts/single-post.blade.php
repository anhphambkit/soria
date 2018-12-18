<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 16:02
 */
?>
@extends('client.ogato-personal.client-master')

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
    @include('client.ogato-personal.partials.header-page')
@endsection

@section('related-posts')
    @include('client.ogato-personal.partials.recent-posts')
@endsection

{{--content page must define before section content--}}
@section('content-page')
    @component('client.ogato-personal.components.article-detail')
        @slot('typePost', 'image')
    @endcomponent

    <div class="clearfix"></div>

    @include('client.ogato-personal.partials.comment-section')
@endsection

@section('content')
    @include('client.ogato-personal.partials.content-right-sidebar')
@endsection


@section('core-footer-scripts')
@endsection

@section('theme-scripts')
@endsection

@section('plugin-scripts')
@endsection

@section('page-scripts')
@endsection


