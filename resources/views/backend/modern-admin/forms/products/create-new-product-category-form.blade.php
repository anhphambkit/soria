<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 10/23/18
 * data-control="cancel" data-dismiss="modal"
 * Time: 19:55
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
                @slot('title', trans('category.name'))
                @slot('name', 'name')
                @slot('id', 'name')
                @slot('class', 'category_name')
                @slot('attributes', [ 'data-type' => 'source-slug'])
                @slot('required', true)
            @endcomponent
        </div>
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('category.slug'))
                @slot('name', 'slug')
                @slot('id', 'slug')
                @slot('class', 'category_slug')
                @slot('attributes', [ 'data-type' => 'slug'])
                @slot('required', true)
            @endcomponent
        </div>
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('category.category_parent'))
                @slot('name', 'parent_id')
                @slot('id', 'parent_id')
                @slot('type', 'dropdown')
                <?php
                    $dropdown[0] = trans('category.default_select_parent_category');
                    foreach ($categories as $category) {
                        $dropdown[$category->id] = $category->name;
                    }
                ?>
                @slot('values', $dropdown)
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('category.desc'))
                @slot('name', 'desc')
                @slot('id', 'desc')
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('category.order'))
                @slot('type', 'number')
                @slot('name', 'order')
                @slot('id', 'order')
                @slot('attributes', ['step' => 1, 'min' => "1"])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('category.meta_title'))
                @slot('id', 'meta_title')
                @slot('name', 'meta_title')
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('category.meta_keyword'))
                @slot('name', 'meta_keywords')
                @slot('id', 'meta_keywords')
            @endcomponent

        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('category.meta_desc'))
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
                    @slot('id', 'update-product-category')
                    @slot('label', trans('generals.update'))
                @else
                    @slot('id', 'submit-new-product-category')
                    @slot('label', trans('generals.create'))
                @endif
            @endcomponent

            @component('components.elements.button')
                @slot('control', 'button')
                @if($isUpdateMode)
                    @slot('id', 'cancel-update-product-category')
                @else
                    @slot('id', 'cancel-new-product-category')
                @endif
                @if($isModal)
                    @slot('attributes', ['data-control' => 'cancel', 'data-dismiss' => "modal"])
                @endif
                @slot('label', trans('generals.cancel'))
            @endcomponent
        </div>
    </div>
</form>
