<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/22/18
 * Time: 10:51
 */

$categories = (isset($categories)) ? $categories : [];
$isModal = (isset($isModal)) ? $isModal : false;
$isUpdateMode = (isset($isUpdateMode)) ? $isUpdateMode : false;
$idForm = (isset($idForm)) ? $idForm : 'form-crud-item';
$suffixEdit = ($isUpdateMode) ? '-edit' : '';
?>
<form role="form" id="{{ $idForm }}">
    <div class="form-group row">
        <div class="col-md-6 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.name'))
                @slot('name', 'name')
                @slot('id', "name".$suffixEdit)
                @slot('class', 'post_name')
                @slot('attributes', [ 'data-type' => 'source-slug'])
                @slot('required', true)
            @endcomponent
        </div>
        <div class="col-md-6 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.slug'))
                @slot('name', 'slug')
                @slot('id', "slug".$suffixEdit)
                @slot('class', 'post_slug')
                @slot('attributes', [ 'data-type' => 'slug'])
                @slot('required', true)
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.sku'))
                @slot('name', 'sku')
                @slot('id', "sku".$suffixEdit)
                @slot('class', 'post_sku')
                @slot('required', true)
            @endcomponent
        </div>
        <div class="col-md-6 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('category.category_parent'))
                @slot('name', 'category_id')
                @slot('id', "category_id".$suffixEdit)
                @slot('type', 'dropdown')
                <?php
                //                $dropdown[0] = trans('category.default_select_parent_category');
                $dropdown = [];
                foreach ($categories as $category) {
                    $dropdown[$category->id] = $category->name;
                }
                ?>
                @slot('values', $dropdown)
                @slot('attributes', [ 'multiple' => 'multiple', 'data-plugin' => 'select2'])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.short_desc'))
                @slot('name', 'desc')
                @slot('id', "desc".$suffixEdit)
                @slot('type', 'editor')
                @slot('attributes', [ 'data-plugin' => 'ckeditor'])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.long_desc'))
                @slot('name', 'long_desc')
                @slot('id', "long_desc".$suffixEdit)
                @slot('rows', 10)
                @slot('type', 'editor')
                @slot('attributes', [ 'data-plugin' => 'ckeditor'])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.price'))
                @slot('name', 'price')
                @slot('id', "price".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0' ])
            @endcomponent
        </div>
        <div class="col-md-3">
            @component('components.elements.field')
                @slot('title', trans('post.sale_price'))
                @slot('name', 'sale_price')
                @slot('id', "sale_price".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0' ])
            @endcomponent
        </div>
        <div class="col-md-3">
            @component('components.elements.field')
                @slot('title', trans('post.in_stock'))
                @slot('name', 'in_stock')
                @slot('id', "in_stock".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0' ])
            @endcomponent
        </div>
        <div class="col-md-3">
            @component('components.elements.field')
                @slot('title', trans('post.rating'))
                @slot('name', 'rating')
                @slot('id', "rating".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.third-party.file-upload')
                @slot('title', trans('post.image_feature'))
                @slot('name', 'feature_images')
                @slot('idWrap', 'feature_images')
                @slot('idCardUpload', 'bb-widget-attachments-images-feature')
                @slot('idDropZoneArea', 'bb-file-upload-dropzone-images-feature')
                @slot('idBtnUpload', 'bb-file-upload-images-feature')
                @slot('urlUpload', '')
                @slot('attributes', [ 'data-wrap-plugin' => '#bb-widget-attachments-images-feature', 'data-name-file-item' => 'imgFeatures' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.third-party.file-upload')
                @slot('title', trans('post.image_gallery'))
                @slot('name', 'gallery_images')
                @slot('idWrap', 'gallery_images')
                @slot('idCardUpload', 'bb-widget-attachments-images-gallery')
                @slot('idDropZoneArea', 'bb-file-upload-dropzone-images-gallery')
                @slot('idBtnUpload', 'bb-file-upload-images-gallery')
                @slot('urlUpload', '')
                @slot('attributes', [ 'data-wrap-plugin' => '#bb-widget-attachments-images-gallery', 'data-name-file-item' => 'imgGalleries' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.publish'))
                @slot('id', "is_publish".$suffixEdit)
                @slot('name', "is_publish")
                @slot('type', 'checkbox')
                @slot('checked', false)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => "fasle" ])
            @endcomponent
        </div>
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.feature'))
                @slot('id', "is_feature".$suffixEdit)
                @slot('name', 'is_feature')
                @slot('type', 'checkbox')
                @slot('checked', false)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => false ])
            @endcomponent
        </div>
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.best_seller'))
                @slot('id', "is_best_seller".$suffixEdit)
                @slot('name', 'is_best_seller')
                @slot('type', 'checkbox')
                @slot('checked', false)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => false ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.free_ship'))
                @slot('id', "is_free_ship".$suffixEdit)
                @slot('name', 'is_free_ship')
                @slot('type', 'checkbox')
                @slot('checked', false)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => false ])
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('components.elements.field')
                @slot('title', trans('post.manage_stock'))
                @slot('name', 'manager_stock')
                @slot('id', "manager_stock".$suffixEdit)
                @slot('type', 'checkbox')
                @slot('checked', true)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => true ])
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('components.elements.field')
                @slot('title', trans('post.allow_order'))
                @slot('name', 'allow_order')
                @slot('id', "allow_order".$suffixEdit)
                @slot('type', 'checkbox')
                @slot('checked', true)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => true ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row action-group">
        <div class="col-12 text-right">
            @component('components.elements.button')
                @slot('control', 'submit')
                @if($isUpdateMode)
                    @slot('id', 'update-post')
                    @slot('label', trans('generals.update'))
                    @slot('attributes', [ 'data-btn-action' => 'edit' ])
                @else
                    @slot('id', 'submit-new-post')
                    @slot('label', trans('generals.create'))
                @endif
                @if($isModal)
                    @slot('attributes', [ 'data-btn-action' => 'edit', 'data-control' => 'cancel', 'data-dismiss' => "modal" ])
                @endif
            @endcomponent

            @component('components.elements.button')
                @slot('control', 'button')
                @if($isUpdateMode)
                    @slot('id', 'cancel-update-post')
                    @slot('attributes', [ 'data-btn-action' => 'edit' ])
                @else
                    @slot('id', 'cancel-new-post')
                @endif
                @if($isModal)
                    @slot('attributes', [ 'data-btn-action' => 'edit', 'data-control' => 'cancel', 'data-dismiss' => "modal" ])
                @endif
                @slot('label', trans('generals.cancel'))
            @endcomponent
        </div>
    </div>
</form>
