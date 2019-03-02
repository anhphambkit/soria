<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/19/19
 * Time: 22:32
 */
?>
<div class="tt-product-single-aside">
    <div class="tt-services-aside">
        @foreach($mainServices as $mainService)
            <a href="#" class="tt-services-block">
                <div class="tt-col-icon">
                    <i class="{{ $mainService->icon }}"></i>
                </div>
                <div class="tt-col-description">
                    <h4 class="tt-title">{{ $mainService->title }}</h4>
                    <div class="desc-service">
                        {!! $mainService->desc !!}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
