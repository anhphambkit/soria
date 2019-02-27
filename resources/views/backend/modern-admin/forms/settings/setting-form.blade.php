<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/26/19
 * Time: 21:38
 */
$idForm = (isset($idForm)) ? $idForm : 'form-crud-item';
?>
<form role="form" id="{{ $idForm }}" class="setting-form">
    @foreach($blogSettings as $titleType => $blogSetting)
        <div class="form-group row row-setting-group">
            <div class="col-md-12 row-title-setting-group">
                <h5 class="title-setting">{{ strtoupper(str_replace("_", " ", $titleType)) }}</h5>
            </div>
            @foreach($blogSetting as $setting)
                <div class="col-md-4 form-custom-validate-js setting-custom">
                    @switch($setting->type_data)
                        @case(\App\Packages\SystemGeneral\Constants\SettingConfig::TEXT_TYPE_DATA)
                            @component('components.elements.field')
                                @slot('title', $setting->name)
                                @slot('name', $setting->slug)
                                @slot('id', $setting->slug)
                                @slot('value', $setting->value)
                                @slot('class', "field-setting " . $setting->slug)
                                @slot('required', true)
                            @endcomponent
                            @break

                        @case(\App\Packages\SystemGeneral\Constants\SettingConfig::IMAGE_TYPE_DATA)
                            @component('components.third-party.file-upload')
                                @slot('title', $setting->name)
                                @slot('name', $setting->slug)
                                @slot('idWrap', 'media_setting_'.$setting->slug)
                                @slot('idCardUpload', 'bb-widget-attachments-media-settings-'.$setting->slug)
                                @slot('idDropZoneArea', 'bb-file-upload-dropzone-media-settings-'.$setting->slug)
                                @slot('idBtnUpload', 'bb-file-upload-media-settings-'.$setting->slug)
                                @slot('urlUpload', route('admin_ajax.media_product.image_feature', $domain))
                                @slot('attributes', [ 'data-wrap-plugin' => '#bb-widget-attachments-media-settings-'.$setting->slug, 'data-name-file-item' => 'media-settings-'.$setting->slug ])
                            @endcomponent
                            @break

                        @case(\App\Packages\SystemGeneral\Constants\SettingConfig::BOOLEAN_TYPE_DATA)
                            "BOOL"
                            @break
                    @endswitch
                </div>
            @endforeach
        </div>
    @endforeach
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
    </div>
    <div class="form-group row action-group">
        <div class="col-12 text-right">
            @component('components.elements.button')
                @slot('control', 'submit')
                @slot('id', 'update-product-category')
                @slot('label', trans('generals.update'))
                @slot('attributes', [ 'data-btn-action' => 'edit' ])
            @endcomponent

            @component('components.elements.button')
                @slot('control', 'button')
                @slot('id', 'cancel-update-product-category')
                @slot('attributes', [ 'data-btn-action' => 'edit' ])
                @slot('label', trans('generals.cancel'))
            @endcomponent
        </div>
    </div>
</form>
