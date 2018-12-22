<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 10/23/18
 * Time: 19:41
 */
?>
@component('components.modals.modal')
    @slot('id', 'modal-create-product-category')
    @slot('classModalCustom', 'modal-full-screen')
    @slot('title', trans('category.header_create_new_category'))
    @slot('modalBody')
        @include('backend.modern-admin.forms.products.create-new-product-category-form',
                [
                    'isModal' => true,
                    'idForm' => 'form-create-new-category'
                ])
    @endslot
@endcomponent
