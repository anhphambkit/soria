@{{#if total_items }}
    <div class="tt-cart-list">
        @{{#each products }}
        <div class="tt-item">
            <a href="@{{ urlProduct slug id }}">
                <div class="tt-item-img">
                    <img src="@{{ featureProduct medias }}" data-src="@{{ featureProduct medias }}" alt="">
                </div>
                <div class="tt-item-descriptions">
                    <h2 class="tt-title">@{{ name }}</h2>
                    <div class="tt-quantity">
                        <span class="cart-header-quantity">@{{ quantity }}</span>&nbsp;x
                    </div>
                    <div class="tt-price cart-header-price">@{{ formatCurrency price }}</div>
                </div>
            </a>
            {{--<div class="tt-item-close">--}}
                {{--<a href="#" class="tt-btn-close"></a>--}}
            {{--</div>--}}
        </div>
        @{{/each}}
    </div>
    <div class="tt-cart-total-row">
        <div class="tt-cart-total-title">SUBTOTAL:</div>
        <div class="tt-cart-total-price cart-header-sub-price">@{{ formatCurrency total_price }}</div>
    </div>
    <div class="tt-cart-btn">
        <div class="tt-item">
            <a href="#" class="btn">PROCEED TO CHECKOUT</a>
        </div>
        <div class="tt-item">
            <a href="shopping_cart_02.html" class="btn-link-02 tt-hidden-mobile">View Cart</a>
            <a href="shopping_cart_02.html" class="btn btn-border tt-hidden-desctope">VIEW CART</a>
        </div>
    </div>
@{{else}}
    <!-- layout emty cart -->
    <a href="#" class="tt-cart-empty">
        <i class="icon-f-39"></i>
        <p>No Products in the Cart</p>
    </a>
@{{/if}}