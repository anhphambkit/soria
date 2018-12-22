<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 10/23/18
 * Time: 23:08
 */
?>

@component('components.modals.modal-view-edit')
    @slot('id', 'modal-edit-product-category')
    @slot('classModalCustom', 'modal-full-screen')
    @slot('title', trans('category.header_edit_category'))
    @slot('hasViewEditMode', true)
    @slot('modalBody')
        @include('backend.modern-admin.forms.products.create-new-product-category-form',
            [
                'isModal' => true,
                'isUpdateMode' => true,
                'idForm' => 'edit-product-category'
            ])
    @endslot
@endcomponent
