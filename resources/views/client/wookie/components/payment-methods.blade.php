<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 11:25
 */
?>
<div id="payment-area" class="method-area">
    <div class="payment-item">
        @component('components.elements.field')
            @slot('title', trans('address-form.cod'))
            @slot('name', 'payment_method')
            @slot('id', 'payment-basic')
            @slot('required', true)
            @slot('type', 'radio-single')
            @slot('class', 'payment-method')
            @slot('checked', true)
            @slot('jsValidate', false)
        @endcomponent
    </div>
</div>
