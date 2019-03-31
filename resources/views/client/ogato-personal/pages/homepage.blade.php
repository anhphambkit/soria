<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 16:02
 */
?>
@extends('client.ogato-personal.client-master', [ 'isSinglePost' => false ])

@section('keywords'){{ $blogSettings['blog_meta_keywords'] }}@endsection

@section('desc'){{ $blogSettings['blog_meta_description'] }}@endsection

@section('large-image-meta'){{ asset($blogSettings['blog_favicon']) }}@endsection

@section('author-meta'){{ $blogSettings['website_name'] }}@endsection

@section('image-meta'){{ asset($blogSettings['blog_favicon']) }}@endsection

@section('type-post-meta'){{ 'article' }}@endsection

@section('url-post-meta'){{ route('client.blog.home') }}@endsection

@section('created-date-post-meta')@endsection

@section('updated-date-post-meta')@endsection

@section('section-post-meta')@endsection

@section('metas')
@endsection

@section('title')@endsection

@section('title-description'){{ $blogSettings['blog_title_description'] }}@endsection

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
    @foreach($posts as $post)
        @component('client.ogato-personal.components.article')
            @slot('typeArticle', strtolower($post->type_post))
            @slot('medias', $post->medias)
            @slot('categories', $post->categories)
            @slot('avatarLink', $post->avatar_link)
            @slot('createdAt', $post->created_at)
            @slot('title', $post->name)
            @slot('desc', $post->desc)
            @slot('linkPost', $post->slug . "." . $post->id)
            @slot('author', $post->author)
        @endcomponent
    @endforeach
    {{--@include('client.ogato-personal.partials.pagination')--}}
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


