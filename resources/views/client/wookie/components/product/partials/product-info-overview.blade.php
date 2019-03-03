<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/19/19
 * Time: 22:32
 */
?>
<div class="tt-product-single-info">
    <div class="tt-add-info">
        <ul>
            <li><span>SKU:</span> {{ $sku }}</li>
            {{--<li><span>Availability:</span> 40 in Stock</li>--}}
        </ul>
    </div>
    <h1 class="tt-title">{{ $name }}</h1>
    <div class="tt-price">
        <span class="new-price">{{ number_format($price, 0, ",", ".") }} đ</span>
    </div>
    {{--<div class="tt-review">--}}
        {{--<div class="tt-rating">--}}
            {{--<i class="icon-star"></i>--}}
            {{--<i class="icon-star"></i>--}}
            {{--<i class="icon-star"></i>--}}
            {{--<i class="icon-star-half"></i>--}}
            {{--<i class="icon-star-empty"></i>--}}
        {{--</div>--}}
        {{--<a class="product-page-gotocomments-js" href="#">(1 Customer Review)</a>--}}
    {{--</div>--}}
    <div class="tt-wrapper short-description-product">
        {!! $shortDesc !!}
    </div>
    {{--<div class="tt-wrapper">--}}
        {{--<div class="tt-countdown_box_02">--}}
            {{--<div class="tt-countdown_inner">--}}
                {{--<div class="tt-countdown"--}}
                     {{--data-date="2018-11-01"--}}
                     {{--data-year="Yrs"--}}
                     {{--data-month="Mths"--}}
                     {{--data-week="Wk"--}}
                     {{--data-day="Day"--}}
                     {{--data-hour="Hrs"--}}
                     {{--data-minute="Min"--}}
                     {{--data-second="Sec"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="tt-wrapper">
        <div class="tt-row-custom-01 tt-responsive-lg">
            <div class="col-item">
                <div class="tt-input-counter style-01">
                    <span class="minus-btn"></span>
                    <input type="text" value="1" size="9999" class="quantity-product-detail">
                    <span class="plus-btn"></span>
                </div>
            </div>
            <div class="col-item">
                <a href="#" onclick="addToCartFromDetail({{ $productId }})" class="btn btn-lg"><i class="icon-f-39"></i>ADD TO CART</a>
            </div>
        </div>
    </div>
    {{--<div class="tt-wrapper">--}}
        {{--<ul class="tt-list-btn">--}}
            {{--<li><a class="btn-link" href="#"><i class="icon-n-072"></i>ADD TO WISH LIST</a></li>--}}
            {{--<li><a class="btn-link" href="#"><i class="icon-n-08"></i>ADD TO COMPARE</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="tt-wrapper">--}}
        {{--<div class="tt-add-info">--}}
            {{--<ul>--}}
                {{--<li><span>Vendor:</span> Polo</li>--}}
                {{--<li><span>Product Type:</span> T-Shirt</li>--}}
                {{--<li><span>Tag:</span> <a href="#">T-Shirt</a>, <a href="#">Women</a>, <a href="#">Top</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
