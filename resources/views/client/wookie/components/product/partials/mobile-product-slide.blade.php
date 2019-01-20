<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/19/19
 * Time: 22:29
 */
$productGalleryMedias = isset($productGalleryMedias) ? $productGalleryMedias : [];
$productFeatureMedias = isset($productFeatureMedias) ? $productFeatureMedias : [];
?>
<div class="tt-mobile-product-layout visible-xs">
    <div class="tt-mobile-product-slider arrow-location-center slick-animated-show-js">
        @foreach($productGalleryMedias as $galleryMedia)
            <div>
                @switch($galleryMedia['type'])
                    @case("images")
                        <img src="{{ asset($galleryMedia['path_org']) }}" alt="{{ asset($galleryMedia['filename']) }}" />
                        @break
                    @case("audios")
                        @break
                    @case("videos")
                        {{--<div class="tt-video-block">--}}
                            {{--<a href="#" class="link-video"></a>--}}
                            {{--<video class="movie" src="video/video.mp4" poster="video/video_img.jpg"></video>--}}
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
            </div>
        @endforeach
    </div>
</div>
