<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 16:33
 */
?>
<div class="tt-desctop-parent-menu tt-parent-box">
    <div class="tt-desctop-menu tt-menu-small">
        <nav>
            <ul>
                {{--<li class="dropdown tt-megamenu-col-02">--}}
                    {{--<a class="tt-logo tt-logo-alignment logo-stuck" href="{{ route('client.page.home') }}">--}}
                        {{--<img src="{{ asset($shopSettings['shop_logo_secondary']) }}" alt="">--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="dropdown tt-megamenu-col-02 selected">
                    <a href="{{ route('client.page.home') }}">{{ trans('breadcrumbs.home') }}</a>
                </li>
                <li class="dropdown megamenu tt-megamenu-col-02">
                    <a href="{{ route('client.shop.index') }}">SHOP</a>
                    <div class="dropdown-menu dropdown-menu-custom">
                        <div class="row tt-col-list">
                            <div class="col-12">
                                <h6 class="tt-title-submenu">
                                    <a href="#">Product Categories</a>
                                </h6>
                                <ul class="tt-megamenu-submenu custom-menu">
                                    @foreach($shopCategories as $shopCategory)
                                        @php
                                            $linkCategory['urlCategory'] = "{$shopCategory->slug}.{$shopCategory->id}";
                                        @endphp
                                        <li>
                                            <a href="{{ route('client.shop.category_page', $linkCategory) }}">{{ $shopCategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown tt-megamenu-col-01">
                    <a href="{{ route('client.blog.home') }}">BLOG</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
