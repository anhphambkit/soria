<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 15:23
 */
$typeArticle = isset($typeArticle) ? $typeArticle : '';
$medias = isset($medias) ? $medias : [];
//dd($categories);
$categories = isset($categories) ? $categories : [];
$avatar_link = isset($avatar_link) ? $avatar_link : "assets/client/ogato-personal/app-assets/img/authors/1.jpg";
$username = isset($username) ? $username : "Admin";
$featureImage = "assets/client/ogato-personal/app-assets/img/posts/p2.jpg";
$secondaryImage = "assets/client/ogato-personal/app-assets/img/posts/p2sm.jpg";
if (sizeof($medias) > 0)
    $featureImage = reset($medias)['path_org'];

if (sizeof($medias) > 1)
    $secondaryImage = end($medias)['path_org'];

switch ($typeArticle) {
    case 'gallery':
        $classArticle = '';
        $classBodyArticle = 'post_body_gallery';
        break;
    case 'video':
        $classArticle = 'post_video';
        $classBodyArticle = '';
        break;
    case 'audio':
        $classArticle = 'ogato-post-audio';
        $classBodyArticle = '';
        break;
    case 'slide':
        $classArticle = '';
        $classBodyArticle = 'post_body_gallery';
        break;
    default:
        $classArticle = '';
        $classBodyArticle = 'post_body_gallery';
        break;
}
?>
<!-- post banner -->
<article class="post {{ $classArticle }}">
    @if($typeArticle === 'gallery')
        <div class="post_banner post_banner_gallery">
            <div class="gallery_image_1">
                <a href="#">
                    <img src="{{ asset($featureImage) }}" alt="">
                </a>
            </div>

            <div class="gallery_image_2">
                <img src="{{ asset($secondaryImage) }}" alt="">
                <a href="#">

                </a>
            </div>
        </div>
    @elseif($typeArticle === 'video')
        <div class="post_banner">
            <div class="gallery_image_1" data-overlay='1'>
                <img src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p3.jpg') }}" alt="">

                <a class="vid" href="https://vimeo.com/127203262">
                    <div class="play-button">
                        <svg class="play-circles" viewBox="0 0 152 152">
                            <circle class="play-circle-01" fill="none" stroke="#fff"
                                    stroke-width="3" stroke-dasharray="343 343" cx="76" cy="76" r="72.7" />
                            <circle class="play-circle-02" fill="none" stroke="#fff"
                                    stroke-width="3" stroke-dasharray="309 309" cx="76" cy="76" r="65.5" />
                        </svg>
                    </div>
                    <div class="play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                </a>
            </div>
        </div>
    @elseif($typeArticle === 'audio')
        <div class="post_banner">
            <iframe allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/533305992&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
        </div>
    @elseif($typeArticle === 'slide')
        <div class="post_banner post_banner_gallery_cur">
            <div class="owl-carousel owl-theme">
               @foreach($medias as $item)
                    <div class="item">
                        <div class="gallery_image_1">
                            <a href="#">
                                <img src="{{ asset($item['path_org']) }}" alt="{{ $item['filename'] }}">
                            </a>
                        </div>
                    </div>
               @endforeach
            </div>
        </div>
    @else
        <div class="gallery_image_1">
            <a href="#">
                <img src="{{ asset($featureImage) }}" alt="">
            </a>
        </div>
    @endif
    <div class="post_body {{ $classBodyArticle }}">
        <div class="post_meta">
            <span class="post_meta_item post_author">
                <a href="#">
                    <span class="post_author_img">
                        <img src="{{ asset($avatar_link) }}" alt="">
                    </span>
                    <span class="post_author_info">by : {{ $username }} </span>
                </a>
            </span>

            <a href="#">
                <span class="post_meta_item post_cat">
                    @for($i=0; $i < sizeof($categories); $i++)
                        {{ $categories[$i]['name'] }}
                        @if($i < sizeof($categories) - 1)
                            ,
                        @endif
                    @endfor
                </span>
            </a>

            <a href="#">
                <span class="post_meta_item meta_item_date">{{ $created_at }}</span>
            </a>
        </div>

        <div class="post_header">
            <h3><a href="#">{{ $name }}</a></h3>
        </div>

        <div class="post_info_wrapper">
            {!! $desc !!}
        </div>

        <div class="post_bottom_meta">
            <div class="half_width">
                <span class="meta meta_comment">
                    <a href="#"><span class="jam jam-message"></span> 3 Comments</a>
                </span>

                <div class="post_more">
                    <a href="#">
                        <span class="icon1">Load More</span>
                        <span class="icon2 jam jam-arrow-right"></span>
                    </a>
                </div>
            </div>

            <div class="half_width">
                <div class="socials-wrap">
                    <div class="socials-icon"><i class="fa fa-share-alt" aria-hidden="true"></i>
                    </div>
                    <div class="socials-text">Post share</div>
                    <ul class="socials">
                        <li><a href="#" target="_blank"><span class="jam jam-facebook"></span></a></li>
                        <li><a href="#" target="_blank"><span class="jam jam-twitter"></span></a></li>
                        <li><a href="#" target="_blank"><span class="jam jam-google-plus"></span></a></li>
                        <li><a href="#" target="_blank"><span class="jam jam-pinterest"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article>
<!-- End post banner -->
