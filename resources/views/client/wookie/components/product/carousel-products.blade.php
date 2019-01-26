<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 21:20
 */
$products = isset($products) ? $products : [];
//dd($products);
?>
<div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-layout-product-item slick-animated-show-js">
    @foreach($products as $product)
        <div class="col-2 col-md-4 col-lg-3">
            @component('client.wookie.components.product.product-item')
                @slot('product', $product)
            @endcomponent
        </div>
    @endforeach
</div>
