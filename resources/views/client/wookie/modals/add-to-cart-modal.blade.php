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
                        <i class="icon-f-68"></i> Added to cart successfully!
                    </div>
                    <a href="#" class="btn-link btn-close-popup">CONTINUE SHOPPING</a>
                    <a href="shopping_cart_02.html" class="btn-link">VIEW CART</a>
                    <a href="page404.html" class="btn-link">PROCEED TO CHECKOUT</a>
                </div>
                <div class="tt-modal-addtocart desctope">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="tt-modal-messages">
                                <i class="icon-f-68"></i> Added to cart successfully!
                            </div>
                            <div class="tt-modal-product">
                                <div class="tt-img">
                                    <img class="preview-product-feature" src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/product/product-07.jpg') }}" alt="">
                                </div>
                                <h2 class="tt-title"><a class="preview-product-title" href="product.html">Flared Shift Dress</a></h2>
                                <div class="tt-qty">
                                    QTY: <span class="preview-product-quantity">1</span>
                                </div>
                            </div>
                            <div class="tt-product-total">
                                <div class="tt-total">
                                    Price: <span class="tt-price preview-product-price">$324</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <a href="#" class="tt-cart-total">
                                There are <span class="modal-cart-info-total-items">1</span> items in your cart
                                <div class="tt-total">
                                    TOTAL: <span class="tt-price modal-cart-info-total-price">$324</span>
                                </div>
                            </a>
                            <a href="#" class="btn btn-border btn-close-popup">CONTINUE SHOPPING</a>
                            <a href="shopping_cart_02.html" class="btn btn-border">VIEW CART</a>
                            <a href="#" class="btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
