<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 10/23/18
 * Time: 23:08
 */
?>

@component('components.modals.modal-view-edit')
    @slot('id', 'modal-edit-post-category')
    @slot('title', trans('category.header_edit_category'))
    @slot('hasViewEditMode', true)
    @slot('modalBody')
        @include('backend.modern-admin.forms.posts.create-new-post-category-form',
            [
                'isModal' => true,
                'isUpdateMode' => true,
                'idForm' => 'edit-post-category'
            ])
    @endslot
@endcomponent
