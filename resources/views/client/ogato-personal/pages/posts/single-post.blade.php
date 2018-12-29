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
    <link href="{{ asset('assets/client/ogato-personal/assets/css/style.css') }}" rel="stylesheet">
@endsection

@section('plugin-css')
@endsection

@section('page-css')
@endsection

@section('styles')
@endsection

@section('main-header-page')
    @include('client.ogato-personal.partials.header-page', [ 'categories' => $post['categories'], 'title' => $post['name'], 'createdDate' => $post['created_at'], 'author' => $post['author'] ])
@endsection

@section('related-posts')
    @include('client.ogato-personal.partials.recent-posts')
@endsection

{{--content page must define before section content--}}
@section('content-page')
    @component('client.ogato-personal.components.article-detail')
        @slot('typeArticle', strtolower($post['type_post']))
        @slot('imageFeature', $post['image_feature'])
        @slot('medias', $post['medias'])
        @slot('content', $post['content'])
        @slot('avatarLink', $post['avatar_link'])
        @slot('createdAt', $post['created_at'])
        @slot('author', $post['author'])
    @endcomponent

    <div class="clearfix"></div>

    {{--@include('client.ogato-personal.partials.comment-section')--}}
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


