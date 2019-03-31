<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/17/19
 * Time: 11:26
 */
$isCheckout = isset($isCheckout) ? $isCheckout : false;
?>
<div class="tt-shopcart-table tt-list-overview-products">
    <div class="over-list">
        <span class="number-items">
            {{ trans('shop.order') }} ({{ $totalItems }} {{ trans('shop.product') }})
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
            if (sizeof($medias) > 0)
                $featureImage = reset($medias);

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
                        <img src="{{ asset($featureImage['path_org']) }}" data-src="{{ asset($featureImage['path_org']) }}" alt="{{ $featureImage['filename'] }}">
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
            @if(isset($shippingFee))
                <tr class="row-total">
                    <td>

                    </td>
                    <td>
                        <span class="title-total-list">
                            {{ trans('shop.shipping_fee') }}:
                        </span>
                    </td>
                    <td>
                        <div class="tt-price subtotal shipping-fee">
                            {{ number_format($shippingFee, 0, ",", ".") }} đ
                        </div>
                    </td>
                </tr>
            @endif
            <tr class="row-total">
                <td>

                </td>
                <td>
                    <span class="title-total-list">
                        {{ ($isCheckout) ? trans('shop.grand_total') : trans('shop.sub_total') }}:
                    </span>
                </td>
                <td>
                    <div class="tt-price cart-table-total-price">
                        {{ number_format($totalPrice + (!empty($shippingFee) ? $shippingFee : 0), 0, ",", ".") }} đ
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
