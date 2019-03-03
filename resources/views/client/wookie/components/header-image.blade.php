<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 15:21
 */
$imgBackground = '/storage/general/background/header-image.jpg';
$classHeaderImage = isset($classHeaderImage) ? $classHeaderImage : "header-image-medium";
?>
<div class="tt-promo-fullwidth header-image-parallax-custom" style="background-image: url({{ $imgBackground }})">
    <div class="tt-description">
        <div class="tt-description-wrapper header-image-medium">
            <div class="tt-title-small">
                <h1 class="tt-title-subpages noborder text-uppercase header-image-title-custom">{{ $headerImage }}</h1>
            </div>
        </div>
    </div>
</div>
