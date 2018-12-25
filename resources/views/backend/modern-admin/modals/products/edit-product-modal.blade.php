<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/14/18
 * Time: 21:56
 */
?>
@component('components.modals.modal-view-edit')
    @slot('id', 'modal-edit-product')
    @slot('classModalCustom', 'modal-full-screen')
    @slot('title', trans('category.header_edit_category'))
    @slot('hasViewEditMode', true)
    @slot('modalBody')
        @include('backend.modern-admin.forms.products.create-new-product-form',
            [
                'isModal' => true,
                'isUpdateMode' => true,
                'idForm' => 'edit-product'
            ])
    @endslot
@endcomponent
