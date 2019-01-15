<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/22/18
 * Time: 10:51
 */

$categories = (isset($categories)) ? $categories : [];
$postTypes = (isset($postTypes)) ? $postTypes : [];
$postTypeCurrent = (isset($postTypeId)) ? ((sizeof($postTypes) > 0) ? $postTypes->where('id', '=', $postTypeId)->first() : null) : ((sizeof($postTypes) > 0) ? $postTypes->first() : null);
$isModal = (isset($isModal)) ? $isModal : false;
$isUpdateMode = (isset($isUpdateMode)) ? $isUpdateMode : false;
$suffixEdit = ($isUpdateMode) ? '-edit' : '';
$idForm = (isset($idForm)) ? $idForm : 'form-crud-item';
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
        <div class="col-md-6 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.post_type'))
                @slot('name', 'type_article')
                @slot('id', "type_article".$suffixEdit)
                @slot('type', 'dropdown')
                <?php
                //                $dropdownPostTypes[0] = trans('category.default_select_parent_category');
                $dropdownPostTypes = [];
                foreach ($postTypes as $postType) {
                    $dropdownPostTypes[$postType->id] = $postType->value;
                }
                ?>
                @slot('values', $dropdownPostTypes)
                @slot('attributes', ['data-plugin' => 'select2'])
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
                @slot('rows', 20)
                @slot('attributes', [ 'data-plugin' => 'ckeditor'])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.content'))
                @slot('name', 'content')
                @slot('id', "content".$suffixEdit)
                @slot('rows', 20)
                @slot('type', 'editor')
                @slot('attributes', [ 'data-plugin' => 'ckeditor'])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            @component('components.elements.field')
                @slot('title', trans('post.viewed'))
                @slot('name', 'view')
                @slot('id', "view".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0' ])
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('components.elements.field')
                @slot('title', trans('post.rating'))
                @slot('name', 'rating')
                @slot('id', "rating".$suffixEdit)
                @slot('type', 'number')
                @slot('attributes', [ 'min' => '0', 'max' => '5' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('post.meta_title'))
                @slot('id', 'meta_title'.$suffixEdit)
                @slot('name', 'meta_title')
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('post.meta_keyword'))
                @slot('name', 'meta_keywords')
                @slot('id', 'meta_keywords'.$suffixEdit)
                @slot('class', 'meta_keywords')
                @slot('required', true)
            @endcomponent

        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            @component('components.elements.field')
                @slot('title', trans('post.meta_desc'))
                @slot('id', 'meta_description'.$suffixEdit)
                @slot('name', 'meta_description')
            @endcomponent
        </div>
    </div>
    <div class="form-group row image-feature-upload {{ ($postTypeCurrent->value === "Gallery" || $postTypeCurrent->value === "Slide" || $postTypeCurrent->value === "Normal") ? '' : 'd-none' }}">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.third-party.file-upload')
                @slot('title', trans('post.image_feature'))
                @slot('isMultiple', false)
                @slot('headerAction', "Add a file")
                @slot('name', 'image_feature')
                @slot('fileNameItem', 'imgFeature')
                @slot('idWrap', 'image_feature'.$suffixEdit)
                @slot('idCardUpload', 'bb-widget-attachments-images-feature'.$suffixEdit)
                @slot('idDropZoneArea', 'bb-file-upload-dropzone-images-feature'.$suffixEdit)
                @slot('idBtnUpload', 'bb-file-upload-images-feature'.$suffixEdit)
                @slot('urlUpload', route('admin_ajax.post.media.image_feature', $domain))
                @slot('attributes', [ 'data-wrap-plugin' => '#bb-widget-attachments-images-feature'.$suffixEdit, 'data-name-file-item' => 'imgFeature' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row image-secondary-upload {{ ($postTypeCurrent->value === "Gallery") ? '' : 'd-none' }}">
        <div class="col-md-12">
            @component('components.third-party.file-upload')
                @slot('title', trans('post.image_secondary'))
                @slot('isMultiple', false)
                @slot('headerAction', "Add a file")
                @slot('name', 'image_secondary')
                @slot('idWrap', 'image_secondary'.$suffixEdit)
                @slot('fileNameItem', 'imgSecondary')
                @slot('idCardUpload', 'bb-widget-attachments-image-secondary'.$suffixEdit)
                @slot('idDropZoneArea', 'bb-file-upload-dropzone-image-secondary'.$suffixEdit)
                @slot('idBtnUpload', 'bb-file-upload-image-secondary'.$suffixEdit)
                @slot('urlUpload', route('admin_ajax.post.media.image_secondary', $domain))
                @slot('attributes', [ 'data-wrap-plugin' => '#bb-widget-attachments-image-secondary'.$suffixEdit, 'data-name-file-item' => 'imgSecondary' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row image-slides-upload {{ ($postTypeCurrent->value === "Slide") ? '' : 'd-none' }}">
        <div class="col-md-12">
            @component('components.third-party.file-upload')
                @slot('title', trans('post.image_slide'))
                @slot('name', 'image_slide')
                @slot('idWrap', 'image_slide'.$suffixEdit)
                @slot('fileNameItem', 'imgSlides')
                @slot('idCardUpload', 'bb-widget-attachments-image-slide'.$suffixEdit)
                @slot('idDropZoneArea', 'bb-file-upload-dropzone-image-slide'.$suffixEdit)
                @slot('idBtnUpload', 'bb-file-upload-image-slide'.$suffixEdit)
                @slot('urlUpload', route('admin_ajax.post.media.image_slide', $domain))
                @slot('attributes', [ 'data-wrap-plugin' => '#bb-widget-attachments-image-slide'.$suffixEdit, 'data-name-file-item' => 'imgSlides' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row media-feature-upload {{ ($postTypeCurrent->value === "Audio" || $postTypeCurrent->value === "Video") ? '' : 'd-none' }}">
        <div class="col-md-12">
            @component('components.third-party.file-upload')
                @slot('title', trans('post.media_feature'))
                @slot('isMultiple', false)
                @slot('headerAction', "Add a media (video or audio)")
                @slot('name', 'media_feature')
                @slot('fileNameItem', 'mediaFeature')
                @slot('idWrap', 'media_feature'.$suffixEdit)
                @slot('idCardUpload', 'bb-widget-attachments-media-feature'.$suffixEdit)
                @slot('idDropZoneArea', 'bb-file-upload-dropzone-media-feature'.$suffixEdit)
                @slot('idBtnUpload', 'bb-file-upload-media-feature'.$suffixEdit)
                @slot('urlUpload', route('admin_ajax.post.media.media_feature', $domain))
                @slot('attributes', [ 'data-wrap-plugin' => '#bb-widget-attachments-media-feature'.$suffixEdit, 'data-name-file-item' => 'mediaFeature' ])
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
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => "false" ])
            @endcomponent
        </div>
        <div class="col-md-4 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('post.show_at_homepage'))
                @slot('id', "at_homepage".$suffixEdit)
                @slot('name', 'at_homepage')
                @slot('type', 'checkbox')
                @slot('checked', false)
                @slot('attributes', [ 'data-plugin' => 'switchery', 'data-default' => "false" ])
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
