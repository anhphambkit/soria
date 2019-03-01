<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 14:33
 */
?>
<aside id="topSidebar">
    <div class="sidebar">

        <button class="icon">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Logo -->
        <a class="header-logo" href="{{ route('client.page.home', ) }}">
            <img class="logo" src="{{ asset($blogSettings['blog_logo_secondary']) }}" alt="">
        </a>
        <!-- End Logo -->

        <!-- Navbar -->
        <nav class="navbar">
            <div class="navbar-collapse">

            </div>
        </nav>
        <!-- End Navbar -->

        <div class="about_widget">
            <h3 class="widget_title">
                <span>{{ trans('blog.about_me') }}</span>
            </h3>

            <div class="avatar_author">
                <img src="{{ asset($blogSettings['blog_avatar_author']) }}" alt="{{ $blogSettings['blog_name_author'] }}">
            </div>
            <div class="desc_author">

                <h4>{{ $blogSettings['blog_name_author'] }}</h4>
                <div class="short-description-author sidebar-menu">
                    {!! $blogSettings['blog_short_about'] !!}
                </div>
                <div class="scoial-icon">
                    <a href="{{ $blogSettings['blog_facebook'] }}"><span><i class="fab fa-facebook-f"></i></span></a>
                </div>
            </div>
        </div>
    </div>
</aside>
