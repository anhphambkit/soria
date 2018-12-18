<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 15:14
 */
?>
<div class="header-controller text-center">
    <div class="container">
        <nav id="nav" class="navbar navbar-expand-lg nav-overlay">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/client/ogato-personal/app-assets/img/logo-dark.png') }}" alt="logo" class="logo-1">
            </a>

            <div class="collapse navbar-collapse ">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Home</a>

                        <ul class="dropdown-menu ">

                            <li class="dropdown nav-item dropdown-item">
                                <a href="" class="nav-link dropdown-toggle">Main Demo</a>

                                <ul class="dropdown-menu" role="menu">

                                    <li class="nav-item">
                                        <a href="index.html" class="dropdown-item">Sidebar Light</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="demo-sidebardark.html" class="dropdown-item">Sidebar Dark</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="demo-fullwidth.html" class="dropdown-item">Demo Full width</a>
                                    </li>

                                </ul>
                            </li>

                        </ul>


                    </li>

                    <li class="dropdown nav-item">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Pages</a>

                        <ul class="dropdown-menu ">

                            <li class="dropdown nav-item dropdown-item">
                                <a href="author.html" class="nav-link">Author</a>
                            </li>

                            <li class="dropdown nav-item dropdown-item">
                                <a href="category.html" class="nav-link">archive</a>
                            </li>

                            <li class="dropdown nav-item dropdown-item">
                                <a href="contact.html" class="nav-link">Contact</a>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown nav-item">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Post
                            Formats</a>

                        <ul class="dropdown-menu ">

                            <li class="dropdown nav-item dropdown-item">
                                <a href="" class="nav-link dropdown-toggle">Image Post</a>

                                <ul class="dropdown-menu" role="menu">

                                    <li class="nav-item">
                                        <a href="image-cover-sidebar.html" class="dropdown-item">Sidebar</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="image-cover.html" class="dropdown-item">Full wight</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="dropdown nav-item dropdown-item">
                                <a href="" class="nav-link dropdown-toggle">video Post</a>

                                <ul class="dropdown-menu" role="menu">

                                    <li class="nav-item">
                                        <a href="single-post-video.html" class="dropdown-item">Sidebar</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="single-post-video-fullwidth.html" class="dropdown-item">Full
                                            wight</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="dropdown nav-item dropdown-item">
                                <a href="" class="nav-link dropdown-toggle">Audio</a>

                                <ul class="dropdown-menu" role="menu">

                                    <li class="nav-item">
                                        <a href="single-post-audio.html" class="dropdown-item">Sidebar</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="single-post-audiofullwidth.html" class="dropdown-item">Full
                                            wight</a>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                    </li>

                </ul>
            </div>

            <div class="search_trigger">
                <a class="nav-search search-trigger" href="#"><span class="jam jam-search"></span></a>

                <button class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>


    </div>
</div>

<div class="search-wrap">
    <div class="search-inner">
        <div class="search-cell">
            <form method="get">
                <div class="search-field-holder">
                    <input type="search" class="form-control main-search-input" placeholder="search">
                </div>
            </form>
        </div>
        <span class="icon-close jam jam-close open" id="search-close"></span>
    </div>

</div>
