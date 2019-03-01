<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 16:17
 */
?>
<nav class="panel-menu mobile-main-menu">
    <ul>
        <li>
            <a href="{{ route('client.page.home') }}">{{ trans('breadcrumbs.home') }}</a>
        </li>
        <li>
            <a href="{{ route('client.shop.index') }}">SHOP</a>
            <ul>
                <li>
                    <a href="#">Product Categories</a>
                    <ul>
                        @foreach($shopCategories as $shopCategory)
                            <li>
                                <a href="#">{{ $shopCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('client.blog.home') }}">BLOG</a>
        </li>
    </ul>
    <div class="mm-navbtn-names">
        <div class="mm-closebtn">Close</div>
        <div class="mm-backbtn">Back</div>
    </div>
</nav>
