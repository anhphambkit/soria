<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 16:16
 */
?>
<div class="tt-mobile-header">
    <div class="container-fluid">
        <div class="tt-header-row">
            <div class="tt-mobile-parent-menu">
                <div class="tt-menu-toggle">
                    <i class="icon-03"></i>
                </div>
            </div>
            <!-- search -->
            <div class="tt-mobile-parent-search tt-parent-box"></div>
            <!-- /search -->
            <!-- cart -->
            <div class="tt-mobile-parent-cart tt-parent-box"></div>
            <!-- /cart -->
            <!-- account -->
            <div class="tt-mobile-parent-account tt-parent-box"></div>
            <!-- /account -->
            <!-- currency -->
            <div class="tt-mobile-parent-multi tt-parent-box"></div>
            <!-- /currency -->
        </div>
    </div>
    <div class="container-fluid tt-top-line">
        <div class="row">
            <div class="tt-logo-container">
                <!-- mobile logo -->
                <a class="tt-logo tt-logo-alignment" href="{{ route('client.page.home') }}"><img src="{{ $shopSettings['shop_logo_primary'] }}" alt=""></a>
                <!-- /mobile logo -->
            </div>
        </div>
    </div>
</div>
