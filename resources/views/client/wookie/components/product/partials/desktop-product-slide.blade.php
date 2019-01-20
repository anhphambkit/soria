<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/19/19
 * Time: 22:31
 */
$productGalleryMedias = isset($productGalleryMedias) ? $productGalleryMedias : [];
$productFeatureMedias = isset($productFeatureMedias) ? $productFeatureMedias : [];
$productFeatureMedia = (sizeof($productFeatureMedias) > 0) ? reset($productFeatureMedias) : reset($productFeatureMedias);
?>
<div class="tt-product-vertical-layout">
    <div class="tt-product-single-img">
        <div>
            <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
            <img class="zoom-product" src="{{ asset($productFeatureMedia['path_org']) }}" alt="{{ $productFeatureMedia['filename'] }}" data-zoom-image="{{ asset($productFeatureMedia['path_org']) }}">
        </div>
    </div>
    <div class="tt-product-single-carousel-vertical">
        <ul id="smallGallery" class="tt-slick-button-vertical  slick-animated-show-js">
            @foreach($productGalleryMedias as $galleryMedia)
                <li>
                    @switch($galleryMedia['type'])
                        @case("images")
                            <a class="zoomGalleryActive" href="#" data-image="{{ asset($galleryMedia['path_org']) }}" data-zoom-image="{{ asset($galleryMedia['path_org']) }}">
                                <img src="{{ asset($galleryMedia['path_org']) }}" alt="{{ asset($galleryMedia['filename']) }}" />
                            </a>
                            @break
                        @case("audios")
                            @break
                        @case("videos")
                            {{--<div class="video-link-product" data-toggle="modal" data-type="youtube" data-target="#modalVideoProduct" data-value="http://www.youtube.com/embed/GhyKqj_P2E4">--}}
                                {{--<img src="images/product/product-small-empty.png" alt="">--}}
                                {{--<div>--}}
                                    {{--<i class="icon-f-32"></i>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            @break
                        @case("documents")
                            @break
                        @case("iframes")
                            {{--<div class="embed-responsive embed-responsive-16by9">--}}
                                {{--<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/GhyKqj_P2E4" allowfullscreen></iframe>--}}
                            {{--</div>--}}
                            @break
                    @endswitch
                </li>
            @endforeach
        </ul>
    </div>
</div>
