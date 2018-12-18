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
@endsection

@section('core-footer-scripts')
@endsection

@section('theme-scripts')
@endsection

@section('plugin-scripts')
@endsection

@section('page-scripts')
@endsection


