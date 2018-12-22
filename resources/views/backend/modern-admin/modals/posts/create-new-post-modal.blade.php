<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/22/18
 * Time: 10:49
 */
?>
@component('components.modals.modal')
    @slot('id', 'modal-create-post')
    @slot('classModalCustom', 'modal-full-screen')
    @slot('isLargeModal', true)
    @slot('title', trans('post.header_create_new_post'))
    @slot('modalBody')
        @include('backend.modern-admin.forms.posts.create-new-post-form',
                [
                    'isModal' => true,
                    'idForm' => 'form-create-new-post'
                ])
    @endslot
@endcomponent