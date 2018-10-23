<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 10/23/18
 * Time: 19:41
 */
?>
@section('modal-body')
    @include('backend.modern-admin.forms.products.create-new-product-category-form',
            [
                'categories' => $categories,
                'isModal' => true,
                'idForm' => 'form-create-new-category'
            ])
@stop

@component('components.modals.modal')
    @slot('id', 'modal-create-product-category')
    @slot('title', trans('category.header_create_new_category'))
@endcomponent
