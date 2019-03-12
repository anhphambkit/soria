<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 16:37
 */
?>
<div class="modal fade"  id="modalAddToCartProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-addtocart mobile">
                    <div class="tt-modal-messages">
                        <i class="icon-f-68"></i> {{ trans('shop.added_to_cart_successfully') }}
                    </div>
                    <a href="#" class="btn-link btn-close-popup">{{ trans('shop.continue_shopping') }}</a>
                    <a href="{{ route('client.shop.cart') }}" class="btn-link">{{ trans('shop.view_cart') }}</a>
                    <a href="{{ route('client.shop.checkout_shipping') }}" class="btn-link">{{ trans('shop.proceed_to_checkout') }}</a>
                </div>
                <div class="tt-modal-addtocart desctope">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="tt-modal-messages custom-line-height">
                                <i class="icon-f-68"></i> {{ trans('shop.added_to_cart_successfully') }}
                            </div>
                            <div class="tt-modal-product">
                                <div class="tt-img">
                                    <img class="preview-product-feature" src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/product/product-07.jpg') }}" alt="add-to-cart">
                                </div>
                                <h2 class="tt-title"><a class="preview-product-title custom-line-height" href="#">Flared Shift Dress</a></h2>
                                <div class="tt-qty">
                                    {{ trans('shop.quantity') }}: <span class="preview-product-quantity">1</span>
                                </div>
                            </div>
                            <div class="tt-product-total">
                                <div class="tt-total">
                                    {{ trans('shop.price') }}: <span class="tt-price preview-product-price">$324</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <a href="#" class="tt-cart-total">
                                {{ trans('shop.there_are') }} <span class="modal-cart-info-total-items">1</span> {{ trans('shop.items_in_your_cart') }}
                                <div class="tt-total">
                                    {{ trans('shop.total') }}: <span class="tt-price modal-cart-info-total-price">$324</span>
                                </div>
                            </a>
                            <a href="#" class="text-uppercase btn btn-border btn-close-popup">{{ trans('shop.continue_shopping') }}</a>
                            <a href="{{ route('client.shop.cart') }}" class="text-uppercase btn btn-border">{{ trans('shop.view_cart') }}</a>
                            <a href="{{ route('client.shop.checkout_shipping') }}" class="text-uppercase btn">{{ trans('shop.proceed_to_checkout') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
