<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 16:02
 */
//dd($posts);
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
    @foreach($posts as $post)
        @component('client.ogato-personal.components.article')
            @slot('typeArticle', strtolower($post->type_post))
            @slot('medias', $post->medias)
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


