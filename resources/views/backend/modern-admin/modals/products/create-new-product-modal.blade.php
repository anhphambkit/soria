<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 07:07
 */
?>
@component('components.modals.modal')
    @slot('id', 'modal-create-product')
    @slot('isLargeModal', true)
    @slot('title', trans('product.header_create_new_product'))
    @slot('modalBody')
        @include('backend.modern-admin.forms.products.create-new-product-form',
                [
                    'isModal' => true,
                    'idForm' => 'form-create-new-product'
                ])
    @endslot
@endcomponent
