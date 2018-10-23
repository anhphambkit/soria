<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 10/23/18
 * Time: 19:35
 */
$title = isset($title) ? $title : env('APP_NAME');
$class = isset($class) ? $class : '';
$isLargeModal = isset($isLargeModal) ? $isLargeModal : true;
?>
<div id="{{ $id }}" class="modal fade modal-custom {{ $class }}">
    <div class="modal-dialog @if($isLargeModal) modal-lg @endif">
        <div class="modal-content">
            <div class="modal-header">
                @section('modal-header')
                    <h5 class="modal-title">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                @show
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