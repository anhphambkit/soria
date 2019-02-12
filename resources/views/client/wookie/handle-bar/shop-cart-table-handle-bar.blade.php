<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/28/19
 * Time: 23:48
 */
?>
@{{#if total_items }}
<div class="container-indent">
    <div class="container">
        <h1 class="tt-title-subpages noborder">SHOPPING CART</h1>
        <div class="row">
            <div class="col-sm-12 col-xl-8">
                <div class="tt-shopcart-table">
                    <table>
                        <tbody>
                        @{{#each products }}
                            <tr>
                                <td>
                                    <a href="#" class="tt-btn-close"></a>
                                </td>
                                <td>
                                    <div class="tt-product-img">
                                        <img src="@{{ featureProduct medias }}" data-src="@{{ featureProduct medias }}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h2 class="tt-title">
                                        <a href="#">@{{ name }}</a>
                                    </h2>
                                    <div class="tt-price">
                                        Price:
                                        <span class="cart-table-price-product">
                                            @{{ formatCurrency price }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="detach-quantity-desctope">
                                        <div class="tt-input-counter style-01">
                                            <span class="minus-btn"></span>
                                            <input class="input-quantity-product cart-page" type="text" value="@{{ quantity }}" size="9999" data-product-id="@{{ id }}">
                                            <span class="plus-btn"></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="tt-price subtotal cart-table-subtotal-product">
                                        @{{ formatCurrency price }} đ
                                    </div>
                                </td>
                            </tr>
                        @{{/each}}
                        </tbody>
                    </table>
                    <div class="tt-shopcart-btn">
                        <div class="col-left">
                            <a class="btn-link" href="#"><i class="icon-e-19"></i>CONTINUE SHOPPING</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4">
                <div class="tt-shopcart-wrapper">
                    <div class="tt-shopcart-box tt-boredr-large">
                        <table class="tt-shopcart-table01">
                            <tbody>
                            <tr>
                                <th>SUBTOTAL</th>
                                <td>@{{ formatCurrency total_price }}</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>GRAND TOTAL</th>
                                <td>@{{ formatCurrency total_price }}</td>
                            </tr>
                            </tfoot>
                        </table>
                        <a href="#" class="btn btn-lg"><span class="icon icon-check_circle"></span>PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@{{else}}
<!-- layout emty cart -->
<div class="container-indent nomargin">
    <div class="tt-empty-cart">
        <span class="tt-icon icon-f-39"></span>
        <h1 class="tt-title">SHOPPING CART IS EMPTY</h1>
        <p>You have no items in your shopping cart.</p>
        <a href="#" class="btn">CONTINUE SHOPPING</a>
    </div>
</div>
@{{/if}}
