<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 14:19
 */
$isSinglePost = isset($isSinglePost) ? $isSinglePost : true;
$classBodyCustom = isset($classBodyCustom) ? $classBodyCustom : '';

if ($isSinglePost) {
    $classBodyPage = 'single-post';

}
else {
    $classBodyPage = '';
}
$classBodyPage .= $classBodyCustom;
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="@yield('keywords')">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="bipham">
        <meta content="@yield('desc')" name="description" />
        <meta content="{{ csrf_token() }}" name="csrf-token" />

        <!-- Cập nhật thêm HTML với thuộc tính temscope và itemtype. -->
        {{--<html itemscope itemtype="http://schema.org/Article">--}}
        <!-- Google Authorship and Publisher Markup -->
        {{--<link rel="author" href="https://plus.google.com/Google+_Profile/posts"/>--}}
        {{--<link rel="publisher" href=”https://plus.google.com/Google+_Page_Profile"/>--}}

        <!-- Schema.org markup for Google+ -->
        {{--<meta itemprop="name" content="Tiêu đề website hoặc tên bài">--}}
        {{--<meta itemprop="description" content="Mô tả">--}}
        {{--<meta itemprop="image" content="http://www.example.com/image.jpg">--}}

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="@yield('large-image-meta')">
        <meta name="twitter:site" content="{{ $blogSettings['website_link'] }}">
        <meta name="twitter:title" content="@yield('title'){{(!$isSinglePost)?" | {$blogSettings['website_name']} Shop":"{$blogSettings['website_name']} - "}}@yield('title-description')">
        <meta name="twitter:description" content="@yield('desc')">
        <meta name="twitter:creator" content="@yield('author-meta')">
        <!-- Hình ảnh mô tả cho Twitter summary card với kích thước tối thiểu 280x150px -->
        <meta name="twitter:image" content="@yield('image-meta')">

        <!-- Open Graph data -->
        <meta property="og:title" content="@yield('title'){{(!$isSinglePost)?" | {$blogSettings['website_name']} Shop":"{$blogSettings['website_name']} - "}}@yield('title-description')" />
        <meta property="og:type" content="@yield('type-post-meta')" />
        <meta property="og:url" content="@yield('url-post-meta')" />
        <meta property="og:image" content="@yield('image-meta')" />
        <meta property="og:description" content="@yield('desc')" />
        <meta property="og:site_name" content="{{ $blogSettings['website_link'] }}" />
        <meta property="article:published_time" content="@yield('created-date-post-meta')" />
        <meta property="article:modified_time" content="@yield('updated-date-post-meta')" />
        <meta property="article:section" content="@yield('section-post-meta')" />
        <meta property="article:tag" content="@yield('keywords')" />
        <meta property="fb:app_id" content="{{ $blogSettings['id_facebook_app'] }}" />
        <meta property="og:locale" content="{{ $blogSettings['locale'] }}" />

        <!-- START CUSTOM META -->
        @yield('metas')
        <!-- APP CUSTOM META -->

        <!-- Template Title -->
        <title>@yield('title'){{ ($isSinglePost) ? " | {$blogSettings['website_name']} Blog" : "{$blogSettings['website_name']} - " }}@yield('title-description')</title>

        <!-- START APP FAVICON -->
        <link rel="apple-touch-icon" href="{{ asset($blogSettings['blog_favicon']) }}">
        <link rel="shortcut icon" href="{{ asset($blogSettings['blog_favicon']) }}">

        <!-- APP FAVICON -->

        <!-- Font Google -->
        <link href="https://fonts.googleapis.com/css?family=Marcellus" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cormorant:400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=KoHo:300,400,600" rel="stylesheet">
        @yield('fonts')
        <!-- END FONTS-->

        <!-- ========== START CORE SCRIPTS ========== -->
        @yield('core-scripts')
        <!-- ========== START CORE SCRIPTS ========== -->

        <!-- ========== START THEME CSS ========== -->
        <link href="{{ asset('assets/client/ogato-personal/app-assets/css/plugins.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/client/ogato-personal/app-assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/client/ogato-personal/assets/css/custom-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/general/css/custom.css') }}" rel="stylesheet">
        @yield('theme-css')
        <!-- ========== END THEME CSS ========== -->

        <!-- ========== START PLUGINS CSS ========== -->
        @yield('plugin-css')
        <!-- ========== END PLUGINS CSS ========== -->

        <!-- ========== START PAGE CSS ========== -->
        @yield('page-css')
        <!-- ========== END PAGE CSS ========== -->

        @yield('styles')
    </head>
    <body class="{{ $classBodyPage }}">
        <!-- ========== START LOADER ========== -->
        @include('client.ogato-personal.partials.loader')
        <!-- ========== END LOADER ========== -->

        <!-- ========== START SIDEBAR MENU ========== -->
        @include('client.ogato-personal.partials.sidebar-menu')
        <!-- ========== END SIDEBAR MENU ========== -->

        <!-- Main Content
   ================================================== -->
        <main id="mainContent">
            <div class="sidebar-overlay"></div>

            @if ($isSinglePost)
                <!-- ========== START NAV BAR MENU ========== -->
                @include('client.ogato-personal.partials.nav-bar-menu')
                <!-- ========== END NAV BAR MENU ========== -->

                <!-- ========== START MAIN CENTER HEADER ========== -->
                @yield('main-header-page')
                <!-- ========== END MAIN CENTER HEADER ========== -->
            @else
                <!-- ========== START MAIN CENTER HEADER ========== -->
                @yield('main-header-page')
                <!-- ========== END MAIN CENTER HEADER ========== -->

                    <!-- ========== START NAV BAR MENU ========== -->
                @include('client.ogato-personal.partials.nav-bar-menu')
                <!-- ========== END NAV BAR MENU ========== -->
            @endif

            <!-- main content
            ================================================== -->
            @yield('content')
            <!-- End main content
            ================================================== -->

            <!-- footer
            ================================================== -->
            @include('client.ogato-personal.partials.footer')
            <!-- End footer
            ================================================== -->
        </main>
        <!-- End Main Content
        ================================================== -->

        <!-- Viewed Posts
        ================================================== -->
{{--        @include('client.ogato-personal.partials.viewed-posts')--}}
        <!-- End Viewed Posts
        ================================================== -->

        <!-- ========== START CORE FOOTER SCRIPTS ========== -->
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/bootstrap.min.js') }}"></script>
        @yield('core-footer-scripts')
        <!-- ========== END CORE FOOTER SCRIPTS ========== -->

        <!-- ========== START THEME SCRIPTS ========== -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/TweenMax.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/sticky-sidebar.min.js') }}"></script>
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/youtubepopup.jquery.js') }}"></script>
        <!-- custom JavaScript -->
        <script src="{{ asset('assets/client/ogato-personal/app-assets/js/custom.js') }}"></script>
        @yield('theme-scripts')
        <!-- ========== END THEME SCRIPTS ========== -->

        <!-- ========== START PLUGINS SCRIPTS ========== -->
        @yield('plugin-scripts')
        <!-- ========== END PLUGINS SCRIPTS ========== -->

        <!-- ========== START PAGE SCRIPTS ========== -->
        @yield('page-scripts')
        <!-- ========== END PAGE SCRIPTS ========== -->

        <!-- ========== START CONSTANT HTTP CODE SCRIPTS ========== -->
        {{--@include('client.ogato-personal.layouts.constant')--}}
        <!-- ========== END CONSTANT HTTP CODE SCRIPTS ========== -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137380558-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-137380558-1');
        </script>
        <!-- ========== END Global site tag (gtag.js) - Google Analytics ========== -->
    </body>
</html>
