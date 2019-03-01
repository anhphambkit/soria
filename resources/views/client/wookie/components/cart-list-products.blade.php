<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/17/19
 * Time: 11:26
 */
?>
<div class="tt-shopcart-table tt-list-overview-products">
    <div class="over-list">
        <span class="number-items">
            Order ({{ $totalItems }} products)
        </span>
        <span class="edit-cart-btn">
             <a href="{{ route('client.shop.cart') }}" class="btn btn-info btn-small edit-cart-button">
                <i class="far fa-edit icon-edit-custom"></i>
                <span class="title-edit-cart-btn">
                    {{ trans('generals.edit') }}
                </span>
             </a>
        </span>
    </div>
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
                            <span>
                                {{ $product['quantity'] }} x
                            </span>
                            <span class="cart-table-price-product">
                                {{ number_format($product['sale_price'], 0, ",", ".") }} đ
                            </span>
                        </div>
                    @else
                        <div class="tt-price">
                            <span>
                                {{ $product['quantity'] }} x
                            </span>
                            <span class="cart-table-price-product">
                                {{ number_format($product['price'], 0, ",", ".") }} đ
                            </span>
                        </div>
                    @endif
                </td>
                <td>
                    <div class="tt-price subtotal cart-table-subtotal-product">
                        {{ number_format($price*$product['quantity'], 0, ",", ".") }} đ
                    </div>
                </td>
            </tr>
        @endforeach
            <tr class="row-total">
                <td>

                </td>
                <td>
                    <span class="title-total-list">
                        SUBTOTAL:
                    </span>
                </td>
                <td>
                    <div class="tt-price cart-table-total-price">
                        {{ number_format($totalPrice, 0, ",", ".") }} đ
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
