<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 16:02
 */
?>
@extends('client.ogato-personal.client-master')

@section('logo-header')
    <a class="navbar-brand" href="{{ route('client.page.home') }}">
        <img src="{{ asset($blogSettings['blog_logo_light_primary']) }}" alt="{{ $blogSettings['website_name'] }}" class="logo-1">
    </a>
@endsection

@section('keywords'){{  $post['meta_keywords'] }}@endsection

@section('desc'){{  $post['meta_description'] }}@endsection

@section('large-image-meta'){{ asset($post['image_feature']['path_300x300']) }}@endsection

@section('author-meta'){{ $post['author']}}@endsection

@section('image-meta'){{ asset($post['image_feature']['path_300x300']) }}@endsection

@section('type-post-meta'){{ 'article' }}@endsection

@section('url-post-meta'){{ route('client.post.detail', "{$post['slug']}.{$post['id']}") }}@endsection

@section('created-date-post-meta'){{ $post['created_at'] }}@endsection

@section('updated-date-post-meta'){{ $post['updated_at'] }}@endsection

@section('section-post-meta'){{ $post['meta_description'] }}@endsection

@section('metas')
@endsection

@section('title'){{  $post['name'] }}@endsection

@section('title-description')@endsection

@section('fonts')
@endsection

@section('core-scripts')
@endsection

@section('theme-css')
    <link href="{{ asset('assets/general/css/typography-content/style.css') }}" rel="stylesheet">
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


