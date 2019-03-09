<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/9/19
 * Time: 16:41
 */
?>
<div class="card">
    <div class="card-content">
        <div class="media align-items-stretch">
            <div class="p-2 text-center {{ $bgCustom }} bg-darken-2 rounded-left">
                <i class="{{ $icon }}"></i>
            </div>
            <div class="p-2 {{ $bgCustom }} text-white media-body rounded-right">
                {{ $content }}
            </div>
        </div>
    </div>
</div>
