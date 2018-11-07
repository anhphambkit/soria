<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 07:06
 */
$categories = (isset($categories)) ? $categories : [];
$isModal = (isset($isModal)) ? $isModal : false;
$isUpdateMode = (isset($isUpdateMode)) ? $isUpdateMode : false;
$idForm = (isset($idForm)) ? $idForm : 'form-crud-item';
?>
<form role="form" id="{{ $idForm }}">
    <div class="form-group row">
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('product.name'))
                @slot('name', 'name')
                @slot('id', 'name')
                @slot('class', 'product_name')
                @slot('attributes', [ 'data-type' => 'source-slug'])
                @slot('required', true)
            @endcomponent
        </div>
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('product.slug'))
                @slot('name', 'slug')
                @slot('id', 'slug')
                @slot('class', 'product_slug')
                @slot('attributes', [ 'data-type' => 'slug'])
                @slot('required', true)
            @endcomponent
        </div>
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('product.sku'))
                @slot('name', 'sku')
                @slot('id', 'sku')
                @slot('class', 'product_sku')
                @slot('required', true)
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('product.desc'))
                @slot('name', 'desc')
                @slot('id', 'desc')
                @slot('type', 'editor')
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('product.long_desc'))
                @slot('name', 'long_desc')
                @slot('id', 'long_desc')
                @slot('type', 'editor')
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('product.meta_title'))
                @slot('id', 'meta_title')
                @slot('name', 'meta_title')
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('product.meta_keyword'))
                @slot('name', 'meta_keywords')
                @slot('id', 'meta_keywords')
            @endcomponent

        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('product.meta_desc'))
                @slot('id', 'meta_description')
                @slot('name', 'meta_description')
            @endcomponent
        </div>
    </div>
    <div class="form-group row action-group">
        <div class="col-12 text-right">
            @component('components.elements.button')
                @slot('control', 'submit')
                @if($isUpdateMode)
                    @slot('id', 'update-product-product')
                    @slot('label', trans('generals.update'))
                @else
                    @slot('id', 'submit-new-product-product')
                    @slot('label', trans('generals.create'))
                @endif
            @endcomponent

            @component('components.elements.button')
                @slot('control', 'button')
                @if($isUpdateMode)
                    @slot('id', 'cancel-update-product-product')
                @else
                    @slot('id', 'cancel-new-product-product')
                @endif
                @if($isModal)
                    @slot('attributes', ['data-control' => 'cancel', 'data-dismiss' => "modal"])
                @endif
                @slot('label', trans('generals.cancel'))
            @endcomponent
        </div>
    </div>
</form>
