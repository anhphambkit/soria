<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/19/19
 * Time: 22:38
 */
?>
<!-- mobile product slider  -->
@include('client.wookie.components.product.partials.mobile-product-slide')
<!-- /mobile product slider  -->

<div class="container container-fluid-mobile">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="row custom-single-page">
                <div class="col-6 hidden-xs">
                <!-- Desktop product slider  -->
                @include('client.wookie.components.product.partials.desktop-product-slide')
                <!-- /Desktop product slider  -->
                </div>
                <div class="col-6">
                    <!-- Product Overview  -->
                @include('client.wookie.components.product.partials.product-info-overview')
                <!-- /Product Overview  -->
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            @include('client.wookie.components.product.partials.services-product')
        </div>
    </div>
</div>