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
                <li class="dropdown tt-megamenu-col-02">
                    <a class="tt-logo tt-logo-alignment logo-stuck" href="{{ route('client.shop.index', $domain) }}">
                        <img src="{{ asset('assets/client/wookie/app-assets/settings/logo-vert.png') }}" alt="">
                    </a>
                </li>
                <li class="dropdown tt-megamenu-col-02 selected">
                    <a href="{{ route('client.page.home', $domain) }}">HOME</a>
                </li>
                <li class="dropdown megamenu">
                    <a href="{{ route('client.shop.index', $domain) }}">SHOP</a>
                </li>
                <li class="dropdown tt-megamenu-col-01">
                    <a href="{{ route('client.blog.home', $domain) }}">BLOG</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
