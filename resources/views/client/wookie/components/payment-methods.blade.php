<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 11:25
 */
?>
<div id="payment-area" class="method-area">
    @foreach($paymentMethods as $paymentMethod)
        <div class="payment-item">
            @component('components.elements.field')
                @slot('title', $paymentMethod->value)
                @slot('value', $paymentMethod->id)
                @slot('name', 'payment_method')
                @slot('id', $paymentMethod->slug)
                @slot('required', true)
                @slot('type', 'radio-single')
                @slot('class', 'payment-method')
                @slot('checked', true)
                @slot('jsValidate', false)
            @endcomponent
        </div>
    @endforeach
</div>
