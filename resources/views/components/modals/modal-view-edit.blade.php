<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 9/4/18
 * Time: 17:40
 */
$classIcon = isset($classIcon) ? $classIcon : 'la la-edit ks-icon';
$id = isset($id) ? $id : '';
$classModal = isset($classModal) ? $classModal : '';
$modalBody = isset($modalBody) ? $modalBody : '';
$modalFooter = isset($modalFooter) ? $modalFooter : '';
$title = isset($title) ? $title : env('APP_NAME');
$isLargeModal = isset($isLargeModal) ? $isLargeModal : true;
$hasViewEditMode = isset($hasViewEditMode) ? $hasViewEditMode : false;
$classModalCustom = isset($classModalCustom) ? $classModalCustom : '';
$dataKeyboard = isset($dataKeyboard) ? $dataKeyboard : "false";
$dataBackdrop = isset($dataBackdrop) ? $dataBackdrop : "static";
?>
<div @if(isset($id)) id="{{ $id }}" @endif class="modal fade modal-custom {{ $classModal }} @if($hasViewEditMode) modal-edit-custom @endif" data-backdrop="{{ $dataBackdrop }}"  data-keyboard="{{ $dataKeyboard }}">
    <div class="modal-dialog @if($isLargeModal) modal-lg @endif {{ $classModalCustom }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <div class="float-right btn-modal-actions">
                    @if($hasViewEditMode)
                        <span @if(isset($idBtnSwitch)) id="{{ $idBtnSwitch }}" @endif data-action="switch-mode" data-next-edit-mode="true" class="btn-switch-mode {{ $classIcon }}"></span>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -13px !important;">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                {{ $modalBody }}
            </div>
            <div class="modal-footer d-none">
                {{ $modalFooter }}
            </div>
        </div>
    </div>
</div>

