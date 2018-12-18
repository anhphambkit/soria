<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 16:05
 */
?>
<div id="content_full" class="section-padding">
    <div class="container">
        <div class="row sticky-container">
            <!-- latest-posts -->
            <div class="col-lg-8 content">
                <div id="content" class="latest-posts">
                    @yield('content-page')
                </div>
            </div>
            <!-- End latest-posts -->

            <!-- Side Bar -->
            <div class="col-lg-4">
                @include('client.ogato-personal.partials.sidebar-page')
            </div>
            <!-- End Side Bar -->
        </div>
    </div>
</div>
