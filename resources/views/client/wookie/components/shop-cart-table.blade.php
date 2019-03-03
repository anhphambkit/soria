<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/27/19
 * Time: 22:25
 */
?>
<div class="tt-shopcart-table">
    <table>
        <tbody>
        @foreach($products as $product)
            <?php
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

                if($product['sale_price'] !== null && $product['sale_price'] > 0) {
                    $price = $product['sale_price'];
                }
                else {
                    $price = $product['price'];
                }
            ?>
            <tr class="row-product" data-product-id="{{ $product['id'] }}">
                <td>
                    <a href="#" class="tt-btn-close btn-remove-product-in-cart"></a>
                </td>
                <td>
                    <div class="tt-product-img">
                        <img src="{{ asset($featureImage) }}" data-src="{{ asset($featureImage) }}" alt="">
                    </div>
                </td>
                <td>
                    <h2 class="tt-title">
                        <a href="{{ route('client.product.detail', $linkProduct) }}">{{ $product['name'] }}</a>
                    </h2>
                    @if($product['sale_price'] !== null && $product['sale_price'] > 0)
                        <div class="tt-price">
                            Price:
                            <span class="cart-table-price-product">
                                {{ number_format($product['sale_price'], 0, ",", ".") }} đ
                            </span>
                        </div>
                    @else
                        <div class="tt-price">
                            Price:
                            <span class="cart-table-price-product">
                                {{ number_format($product['price'], 0, ",", ".") }} đ
                            </span>
                        </div>
                    @endif
                </td>
                <td>
                    <div class="detach-quantity-desctope">
                        <div class="tt-input-counter style-01">
                            <span class="minus-btn"></span>
                            <input type="text" class="input-quantity-product cart-page" value="{{ $product['quantity'] }}" size="9999">
                            <span class="plus-btn"></span>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="tt-price subtotal cart-table-subtotal-product">
                        {{ number_format($price*$product['quantity'], 0, ",", ".") }} đ
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="tt-shopcart-btn">
        <div class="col-left">
            <a class="btn-link" href="#"><i class="icon-e-19"></i>{{ trans('shop.continue_shopping') }}</a>
        </div>
    </div>
</div>
