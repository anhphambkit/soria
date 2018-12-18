<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 15:23
 */
$typeArticle = empty($typeArticle) ? '' : $typeArticle;

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
                    <img src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p2.jpg') }}" alt="">
                </a>
            </div>

            <div class="gallery_image_2">
                <img src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p2sm.jpg') }}" alt="">
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
                <div class="item">
                    <div class="gallery_image_1">
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p4.jpg') }}" alt="">
                        </a>
                    </div>
                </div>

                <div class="item">
                    <div class="gallery_image_1">
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p5.jpg') }}" alt="">
                        </a>
                    </div>
                </div>

                <div class="item">
                    <div class="gallery_image_1">
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p6.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="gallery_image_1">
            <a href="#">
                <img src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p1.jpg') }}" alt="">
            </a>
        </div>
    @endif
    <div class="post_body {{ $classBodyArticle }}">
        <div class="post_meta">
            <span class="post_meta_item post_author">
                <a href="#">
                    <span class="post_author_img">
                        <img src="{{ asset('assets/client/ogato-personal/app-assets/img/authors/1.jpg') }}" alt="">
                    </span>
                    <span class="post_author_info">by : ogato </span>
                </a>
            </span>

            <a href="#">
                <span class="post_meta_item post_cat">life</span>
            </a>

            <a href="#">
                <span class="post_meta_item meta_item_date">February 27, 2018</span>
            </a>
        </div>

        <div class="post_header">
            <h3><a href="#">Makeup Primers for Everyday Wear</a></h3>
        </div>

        <div class="post_info_wrapper">
            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis
                bibendum auctor, nisi elit consequat ipsum, nec sagittis jmnibh id elit.
                Duis
                sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan
                ipsum
                velit. Nam nec tellus ale oplodio tincidunt auctor a ornare odio. Sed non
                mauris
                vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad
                litora
                orquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
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
