<?php
    $title = isset($title) ? $title : env('APP_NAME');
    $class = isset($class) ? $class : '';
?>
<div id="{{ $id }}" class="modal-demo {{ $class }}">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>×</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">{{ $title }}</h4>
    <div class="custom-modal-text">
        {!! $content !!}
    </div>
</div>