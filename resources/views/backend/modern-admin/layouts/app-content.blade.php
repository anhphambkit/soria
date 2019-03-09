<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 07:52
 */
?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                @yield('breadcrumbs')
            </div>
            <div class="content-header-right col-md-6 col-12 text-right">
                @yield('header-right')
            </div>
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>