<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 21:19
 */
$title = isset($title) ? $title : "TRENDING";
$description = isset($description) ? $description : null;
?>
<div class="tt-block-title">
    <h1 class="tt-title text-uppercase">
        {{ $title }}
    </h1>
    @if($description !== null)
        <div class="tt-description">
            {{ $description }}
        </div>
    @endif
</div>
