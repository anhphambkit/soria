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
$suffixEdit = ($isUpdateMode) ? '-edit' : '';
?>
<form role="form" id="{{ $idForm }}">
    <div class="form-group row">
        <div class="col-md-6 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('product.name'))
                @slot('name', 'name')
                @slot('id', "name".$suffixEdit)
                @slot('class', 'product_name')
                @slot('attributes', [ 'data-type' => 'source-slug'])
                @slot('required', true)
            @endcomponent
        </div>
        <div class="col-md-6 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('product.slug'))
                @slot('name', 'slug')
                @slot('id', "slug".$suffixEdit)
                @slot('class', 'product_slug')
                @slot('attributes', [ 'data-type' => 'slug'])
                @slot('required', true)
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('product.sku'))
                @slot('name', 'sku')
                @slot('id', "sku".$suffixEdit)
                @slot('class', 'product_sku')
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
                @slot('title', trans('product.short_desc'))
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
                @slot('title', trans('product.long_desc'))
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
                @slot('title', trans('product.price'))
                @slot('name', 'price')
                @slot('id', "price".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0' ])
            @endcomponent
        </div>
        <div class="col-md-3">
            @component('components.elements.field')
                @slot('title', trans('product.sale_price'))
                @slot('name', 'sale_price')
                @slot('id', "sale_price".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0' ])
            @endcomponent
        </div>
        <div class="col-md-3">
            @component('components.elements.field')
                @slot('title', trans('product.in_stock'))
                @slot('name', 'in_stock')
                @slot('id', "in_stock".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0' ])
            @endcomponent
        </div>
        <div class="col-md-3">
            @component('components.elements.field')
                @slot('title', trans('product.rating'))
                @slot('name', 'rating')
                @slot('id', "rating".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('product.meta_title'))
                @slot('id', 'meta_title'.$suffixEdit)
                @slot('name', 'meta_title')
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('product.meta_keyword'))
                @slot('name', 'meta_keywords')
                @slot('id', 'meta_keywords'.$suffixEdit)
            @endcomponent

        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('product.meta_desc'))
                @slot('id', 'meta_description'.$suffixEdit)
                @slot('name', 'meta_description')
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.third-party.file-upload')
                @slot('title', trans('product.image_feature'))
                @slot('name', 'feature_images')
                @slot('idWrap', 'feature_images'.$suffixEdit)
                @slot('idCardUpload', 'bb-widget-attachments-images-feature'.$suffixEdit)
                @slot('idDropZoneArea', 'bb-file-upload-dropzone-images-feature'.$suffixEdit)
                @slot('idBtnUpload', 'bb-file-upload-images-feature'.$suffixEdit)
                @slot('urlUpload', route('admin_ajax.media_product.image_feature', $domain))
                @slot('attributes', [ 'data-wrap-plugin' => '#bb-widget-attachments-images-feature'.$suffixEdit, 'data-name-file-item' => 'imgFeatures' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.third-party.file-upload')
                @slot('title', trans('product.image_gallery'))
                @slot('name', 'gallery_images')
                @slot('idWrap', 'gallery_images'.$suffixEdit)
                @slot('idCardUpload', 'bb-widget-attachments-images-gallery'.$suffixEdit)
                @slot('idDropZoneArea', 'bb-file-upload-dropzone-images-gallery'.$suffixEdit)
                @slot('idBtnUpload', 'bb-file-upload-images-gallery'.$suffixEdit)
                @slot('urlUpload', route('admin_ajax.media_product.image_gallery', $domain))
                @slot('attributes', [ 'data-wrap-plugin' => '#bb-widget-attachments-images-gallery'.$suffixEdit, 'data-name-file-item' => 'imgGalleries' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('product.publish'))
                @slot('id', "is_publish".$suffixEdit)
                @slot('name', "is_publish")
                @slot('type', 'checkbox')
                @slot('checked', false)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => "fasle" ])
            @endcomponent
        </div>
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('product.feature'))
                @slot('id', "is_feature".$suffixEdit)
                @slot('name', 'is_feature')
                @slot('type', 'checkbox')
                @slot('checked', false)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => false ])
            @endcomponent
        </div>
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('product.best_seller'))
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
                @slot('title', trans('product.free_ship'))
                @slot('id', "is_free_ship".$suffixEdit)
                @slot('name', 'is_free_ship')
                @slot('type', 'checkbox')
                @slot('checked', false)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => false ])
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('components.elements.field')
                @slot('title', trans('product.manage_stock'))
                @slot('name', 'manager_stock')
                @slot('id', "manager_stock".$suffixEdit)
                @slot('type', 'checkbox')
                @slot('checked', true)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => true ])
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('components.elements.field')
                @slot('title', trans('product.allow_order'))
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
                    @slot('id', 'update-product')
                    @slot('label', trans('generals.update'))
                    @slot('attributes', [ 'data-btn-action' => 'edit' ])
                @else
                    @slot('id', 'submit-new-product')
                    @slot('label', trans('generals.create'))
                @endif
                @if($isModal)
                    @slot('attributes', [ 'data-btn-action' => 'edit', 'data-control' => 'cancel', 'data-dismiss' => "modal" ])
                @endif
            @endcomponent

            @component('components.elements.button')
                @slot('control', 'button')
                @if($isUpdateMode)
                    @slot('id', 'cancel-update-product')
                    @slot('attributes', [ 'data-btn-action' => 'edit' ])
                @else
                    @slot('id', 'cancel-new-product')
                @endif
                @if($isModal)
                    @slot('attributes', [ 'data-btn-action' => 'edit', 'data-control' => 'cancel', 'data-dismiss' => "modal" ])
                @endif
                @slot('label', trans('generals.cancel'))
            @endcomponent
        </div>
    </div>
</form>
