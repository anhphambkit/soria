<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/11/18
 * Time: 14:08
 */

$classWrap = isset($classWrap) ? $classWrap : 'wrapper-file-upload';
$title = isset($title) ? $title : 'Upload Files';
$idWrap = isset($idWrap) ? $idWrap : '';
$headerAction = isset($headerAction) ? $headerAction : 'Add files';
$name = isset($name) ? $name : 'files';
$attributes = isset($attributes) ? $attributes : [];
$isMultiple = isset($isMultiple) ? $isMultiple : true;
?>
<div class="file-upload-component {{ $classWrap }}"
     @if(isset($idWrap))
        id="{{ $idWrap }}"
     @endif
>
    <div class="header-default-custom">{{ $title }}</div>
    <div id="{{ $idCardUpload }}" class="card panel bb-widget-attachments">
        <div class="card-block">
            <div class="bb-header">{{ $headerAction }}</div>

            <div id="{{ $idDropZoneArea }}" class="bb-upload-block">
                <span class="bb-icon la la-cloud-upload"></span>
                <span class="bb-text">Drag &amp; drop files here</span>
                <span class="bb-upload-btn">
                    <span class="bb-btn-separator">or</span>
                    <button class="btn btn-primary bb-btn-file">
                        <span class="la la-cloud-upload bb-icon"></span>
                        <span class="bb-text">Choose file</span>
                        <input id="{{ $idBtnUpload }}" class="bb-btn-file-input" data-plugin="bb-file-upload" type="file"
                            name="{{$name}}[]" data-url="{{ $urlUpload }}"
                            @foreach($attributes as $key => $val)
                                {{ $key. '='. $val. ' ' }}
                            @endforeach
                        >
                    </button>
                </span>
            </div>

            <div class="bb-uploading-files-container">
                <div class="bb-header">Uploading images</div>

                <div class="bb-uploading-files"></div>
            </div>

            <div class="bb-header">Uploaded images</div>
            <div class="bb-files">
                <ul>
                </ul>
            </div>
        </div>
    </div>
</div>
