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
        <a class="header-logo" href="#">
            <img class="logo" src="{{ asset('assets/client/ogato-personal/app-assets/img/logo-dark.png') }}" alt="">
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
                <span>About Me</span>
            </h3>

            <div class="avatar_author">
                <img src="{{ asset('assets/client/ogato-personal/app-assets/img/authors/1.jpg') }}" alt="Mona">
            </div>
            <div class="desc_author">

                <h4>Stash</h4>
                <p class="mb-15">One sided love like drowning in the sea and mutual love like flying between
                    clouds.</p>
                <div class="scoial-icon mb-20">
                    <a href="#0"><span><i class="fab fa-facebook-f"></i></span></a>
                    <a href="#0"><span><i class="fab fa-twitter"></i></span></a>
                    <a href="#0"><span><i class="fab fa-linkedin-in"></i></span></a>
                    <a href="#0"><span><i class="fab fa-instagram"></i></span></a>
                    <a href="#0"><span><i class="fab fa-behance"></i></span></a>
                </div>
            </div>
        </div>

        <div class="categories_widget">
            <h3 class="widget_title">
                <span>Categories</span>
            </h3>

            <div class="categories_item">
                <span class="category_image cover-bg" data-image-src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p2.jpg') }}"></span>
                <span class="categories_title">Fashion</span>
                <span class="categories_count">5 Posts</span>
                <a href="#" class="categories_link"></a>
            </div>

            <div class="categories_item">
                <span class="category_image cover-bg" data-image-src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p3.jpg') }}"></span>
                <span class="categories_title">Hollywood</span>
                <span class="categories_count">5 Posts</span>
                <a href="#" class="categories_link"></a>
            </div>

            <div class="categories_item">
                <span class="category_image cover-bg" data-image-src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p1.jpg') }}"></span>
                <span class="categories_title">Tips & Tricks</span>
                <span class="categories_count">6 Posts</span>
                <a href="#" class="categories_link"></a>
            </div>
        </div>
    </div>
</aside>
