<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 07:44
 */
?>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{ URL::to('/') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash
            .main">Dashboard</span></a>
            </li>
            <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Backend</span><i class="la la-ellipsis-h ft-minus"
                                                                  data-toggle="tooltip"
                                                                        data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-gift"></i><span class="menu-title" data-i18n="nav
            .page_layouts.main">Products</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ \Illuminate\Support\Facades\URL::to('/product/category/list') }}">Categories</a>
                    </li>
                    <li><a class="menu-item" href="{{ \Illuminate\Support\Facades\URL::to('/product/list') }}">Product</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-gift"></i><span class="menu-title" data-i18n="nav
            .page_layouts.main">Posts</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ URL::to('/post/category/list') }}">Categories</a>
                    </li>
                    <li><a class="menu-item" href="layout-2-columns.html">Post</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
