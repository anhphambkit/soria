<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/3/19
 * Time: 17:17
 */
?>
<div class="add-to-cart-success-alert">
        <span class="close close-alert-add-to-cart-success" onclick="closeAddToCartSuccessAlert()">
           <i class="far fa-times-circle"></i>
        </span>
    <p class="text add-to-cart-success-text">
        <i class="fas fa-check-circle icon-green-custom"></i>
        {{ trans('shop.added_to_cart_successfully') }}
    </p>
    <a href="{{ route('client.shop.cart') }}" class="btn text-uppercase">{{ trans('shop.view_cart_and_check_out') }}</a>
</div>
