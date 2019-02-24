<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 10:38
 */
?>
<div id="shipping-area" class="method-area">
    <div class="shipping-item">
        @component('components.elements.field')
            @slot('title', trans('address-form.standard_shipping'))
            @slot('name', 'shipping_method')
            @slot('id', 'shipping-basic')
            @slot('required', true)
            @slot('type', 'radio-single')
            @slot('class', 'shipping-method')
            @slot('checked', true)
            @slot('jsValidate', false)
        @endcomponent
    </div>
</div>