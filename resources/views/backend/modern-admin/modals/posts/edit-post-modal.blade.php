<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/22/18
 * Time: 10:49
 */
?>
@component('components.modals.modal-view-edit')
    @slot('id', 'modal-edit-post')
    @slot('classModalCustom', 'modal-full-screen')
    @slot('title', trans('category.header_edit_category'))
    @slot('hasViewEditMode', true)
    @slot('modalBody')
        @include('backend.modern-admin.forms.posts.create-new-post-form',
            [
                'isModal' => true,
                'isUpdateMode' => true,
                'idForm' => 'edit-post'
            ])
    @endslot
@endcomponent