<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 16:30
 */
?>
<div class="tt-desktop-parent-cart tt-parent-box bb-cart-box" onclick="viewCartHeader()">
    <div class="tt-cart tt-dropdown-obj">
        <button class="tt-dropdown-toggle" data-tooltip="Cart" data-tposition="bottom">
            <i class="icon-f-39"></i>
            <span class="tt-badge-cart cart-header-items @if($totalItems <= 0) d-none @endif">{{ $totalItems }}</span>
        </button>
        <div class="tt-dropdown-menu">
            <div class="tt-mobile-add">
                <h6 class="tt-title">{{ trans('shop.shopping_cart') }}</h6>
                <button class="tt-close">Close</button>
            </div>
            <div class="tt-dropdown-inner">
                <div class="tt-cart-layout">
                    <div class="tt-cart-content" id="cart-header-content">

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('client.wookie.partials.header.add-to-cart-sucess-alert')
</div>
