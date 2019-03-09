<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 10:38
 */
?>
<div id="shipping-area" class="method-area">
    @foreach($shippingMethods as $shippingMethod)
        <div class="shipping-item">
            @component('components.elements.field')
                @slot('title', $shippingMethod->value)
                @slot('value', $shippingMethod->id)
                @slot('name', 'shipping_method')
                @slot('id', $shippingMethod->slug)
                @slot('required', true)
                @slot('type', 'radio-single')
                @slot('class', 'shipping-method')
                @slot('checked', true)
                @slot('jsValidate', false)
            @endcomponent
        </div>
    @endforeach
</div>