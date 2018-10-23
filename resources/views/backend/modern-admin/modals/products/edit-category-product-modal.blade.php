<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 10/23/18
 * Time: 23:08
 */
?>
@section('modal-body')
    @include('backend.modern-admin.forms.products.create-new-product-category-form',
            [
                'categories' => $categories,
                'isModal' => true,
                'isUpdateMode' => true,
                'idForm' => 'edit-product-category'
            ])
@stop

@component('components.modals.modal-view-edit')
    @slot('idModal', 'modal-edit-product-category')
    @slot('title', trans('category.header_create_new_category'))
    @slot('hasViewEditMode', true)
@endcomponent
