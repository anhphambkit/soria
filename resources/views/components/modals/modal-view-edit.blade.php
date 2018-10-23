<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 9/4/18
 * Time: 17:40
 */
$classIcon = isset($classIcon) ? $classIcon : 'la la-edit ks-icon';
$idModal = isset($idModal) ? $idModal : '';
$classModal = isset($classModal) ? $classModal : '';
$title = isset($title) ? $title : env('APP_NAME');
$isLargeModal = isset($isLargeModal) ? $isLargeModal : true;
$hasViewEditMode = isset($hasViewEditMode) ? $hasViewEditMode : false;
?>
<div @if(isset($idModal)) id="{{ $idModal }}" @endif class="modal fade modal-custom {{ $classModal }} @if($hasViewEditMode) modal-edit-custom @endif">
    <div class="modal-dialog @if($isLargeModal) modal-lg @endif">
        <div class="modal-content">
            <div class="modal-header">
                @section('modal-header')
                    <h5 class="modal-title">{{ $title }}</h5>
                    <div class="float-right btn-modal-actions">
                        @if($hasViewEditMode)
                            <span @if(isset($idBtnSwitch)) id="{{ $idBtnSwitch }}" @endif data-action="switch-mode" data-next-edit-mode="true" class="btn-switch-mode {{ $classIcon }}"></span>
                        @endif
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -13px !important;">
                            <span aria-hidden="true" class="la la-close"></span>
                        </button>
                    </div>
                @stop
            </div>
            <div class="modal-body">
                @section('modal-body')
                @show
            </div>
            <div class="modal-footer d-none">
                @section('modal-footer')
                @show
            </div>
        </div>
    </div>
</div>

