<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/28/19
 * Time: 21:52
 */
?>
@extends('client.ogato-personal.client-master')

@section('logo-header')
    <a class="navbar-brand" href="{{ route('client.page.home') }}">
        <img src="{{ asset($blogSettings['blog_logo_light_primary']) }}" alt="{{ $blogSettings['website_name'] }}" class="logo-1">
    </a>
@endsection

@section('keywords'){{  $category['meta_keywords'] }}@endsection

@section('desc'){{  $category['meta_description'] }}@endsection

@section('large-image-meta'){{ asset($blogSettings['blog_favicon']) }}@endsection

@section('author-meta'){{ $blogSettings['website_name'] }}@endsection

@section('image-meta'){{ asset($blogSettings['blog_favicon']) }}@endsection

@section('type-post-meta'){{ 'article' }}@endsection

@section('url-post-meta'){{ route('client.blog.category_page', "{$category['slug']}.{$category['id']}") }}@endsection

@section('created-date-post-meta'){{ $category['created_at'] }}@endsection

@section('updated-date-post-meta'){{ $category['updated_at'] }}@endsection

@section('section-post-meta'){{ $category['meta_description'] }}@endsection

@section('metas')
@endsection

@section('title'){{  $category['name'] }} - {{ trans('breadcrumbs.categories') }}@endsection

@section('title-description')@endsection

@section('fonts')
@endsection

@section('core-scripts')
@endsection

@section('theme-css')
    {{--<link href="{{ asset('assets/general/css/typography-content/style.css') }}" rel="stylesheet">--}}
@endsection

@section('plugin-css')
@endsection

@section('page-css')
@endsection

@section('styles')
@endsection

@section('main-header-page')
    @include('client.ogato-personal.partials.header-page',
                [
                    'isCategoryPage' => true,
                    'title' => $category['name'],
                ]
    )
@endsection

{{--content page must define before section content--}}
@section('content-page')
    @foreach($categoryPosts as $categoryPost)
        @component('client.ogato-personal.components.article')
            @slot('typeArticle', strtolower($categoryPost->type_post))
            @slot('medias', $categoryPost->medias)
            @slot('categories', $categoryPost->categories)
            @slot('avatarLink', $categoryPost->avatar_link)
            @slot('createdAt', $categoryPost->created_at)
            @slot('title', $categoryPost->name)
            @slot('desc', $categoryPost->desc)
            @slot('linkPost', $categoryPost->slug . "." . $categoryPost->id)
            @slot('author', $categoryPost->author)
        @endcomponent
    @endforeach
@endsection

@section('content')
    @include('client.ogato-personal.partials.content-right-sidebar', [ 'isSinglePost' => false , 'hasSidebar' => false ])
@endsection


@section('core-footer-scripts')
@endsection

@section('theme-scripts')
@endsection

@section('plugin-scripts')
@endsection

@section('page-scripts')
@endsection


