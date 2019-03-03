<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 21:13
 */
$linkProduct['urlProduct'] = $product['slug'] . "." . $product['id'];
$medias = isset($product['medias']) ? $product['medias'] : [];
$categories = isset($product['categories']) ? $product['categories'] : [];
$options = isset($options) ? $options : [];
$featureImage = "assets/client/wookie/app-assets/images/skin-lingerie/product/product-08.jpg";
$hoverImage = null;
if (sizeof($medias) > 0)
    $featureImage = reset($medias)['path_org'];
if (sizeof($medias) > 1)
    $hoverImage = end($medias)['path_org'];

$countdown = isset($countdown) ? $countdown : null;
$rating = isset($rating) ? $rating : null;
?>
<div class="tt-product thumbprod-center bb-product-item">
    <div class="tt-image-box">
        <a href="#" class="tt-btn-quickview custom-position-left" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
        {{--<a href="#" class="tt-btn-wishlist custom-position-left" data-tooltip="Add to Wishlist" data-tposition="left"></a>--}}
        {{--<a href="#" class="tt-btn-compare custom-position-left" data-tooltip="Add to Compare" data-tposition="left"></a>--}}
        <a href="{{ route('client.product.detail', $linkProduct) }}">
            <span class="tt-img">
                <img class="bb-img-feature-product" src="{{ asset($featureImage) }}" alt="">
            </span>
            @if($hoverImage !== null)
                <span class="tt-img-roll-over">
                    <img src="{{ asset($hoverImage) }}" data-src="{{ asset($hoverImage) }}" alt="">
                </span>
            @endif
        </a>
        @if($countdown !== null)
            <div class="tt-countdown_box">
                <div class="tt-countdown_inner">
                    <div class="tt-countdown"
                         data-date="2018-12-08"
                         data-year="Yrs"
                         data-month="Mths"
                         data-week="Wk"
                         data-day="Day"
                         data-hour="Hrs"
                         data-minute="Min"
                         data-second="Sec"></div>
                </div>
            </div>
        @endif
    </div>
    <div class="tt-description">
        <div class="tt-row">
            <ul class="tt-add-info">
                <li>
                    @for($i=0; $i < sizeof($categories); $i++)
                        @php
                            $linkCategory['urlCategory'] = "{$categories[$i]['slug']}.{$categories[$i]['id']}";
                        @endphp
                        <a href="{{ route('client.shop.category_page', $linkCategory) }}">
                            {{ $categories[$i]['name'] }}
                        </a>
                        {{ ($i < sizeof($categories) - 1) ? "," : "" }}
                    @endfor
                </li>
            </ul>
            @if($countdown !== null)
                <div class="tt-rating">
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                </div>
            @endif
        </div>
        <h2 class="tt-title bb-product-title"><a href="{{ route('client.product.detail', $linkProduct) }}">{{ ucwords($product['name']) }}</a></h2>
        <div class="tt-price">
            @if($product['sale_price'] !== null && $product['sale_price'] > 0)
            <span class="new-price">{{ number_format($product['sale_price'], 0, ",", ".") }} đ</span>
            <span class="old-price">{{ number_format($product['price'], 0, ",", ".") }} đ</span>
            @else
                <span class="new-price">{{ number_format($product['price'], 0, ",", ".") }} đ</span>
            @endif
        </div>
        @if(sizeof($options) > 0)
            <div class="tt-option-block">
                <ul class="tt-options-swatch">
                    <li><a class="options-color tt-color-bg-01" href="#"></a></li>
                    <li><a class="options-color tt-color-bg-02" href="#"></a></li>
                </ul>
            </div>
        @endif
        <div class="tt-product-inside-hover">
            <div class="tt-row-btn">
                <span onclick="addToCart({{ $product['id'] }})" class="tt-btn-addtocart thumbprod-button-bg add-to-cart-animation text-uppercase">{{ trans('shop.add_to_cart') }}</span>
            </div>
            <div class="tt-row-btn">
                <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                <a href="#" class="tt-btn-wishlist"></a>
                <a href="#" class="tt-btn-compare"></a>
            </div>
        </div>
    </div>
</div>

