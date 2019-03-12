<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 20:38
 */
$typeBanner = isset($typeBanner) ? $typeBanner : 'titleBot';
$classBanner = isset($classBanner) ? $classBanner : 'col-sm-6 col-md-6';
?>
@switch($typeBanner)
    @case("titleBot")
        <div class="{{ $classBanner }}">
            <div class="tt-promo02">
                <a href="#">
                    <img src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/promo/index-promo-img-04.jpg') }}" alt="alternate">
                </a>
                <div class="tt-description text-center">
                    <a href="#" class="tt-title">
                        <div class="tt-title-small"><span class="tt-base-color">Clearance Sales</span></div>
                        <div class="tt-title-large">GET UP TO 50% OFF</div>
                    </a>
                    <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit</p>
                </div>
            </div>
        </div>
        @break
    @case("titleInBox")
        <div class="{{ $classBanner }}">
            <a href="listing-left-column.html" class="tt-promo-box hover-type-2">
                <img src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/custom/listing_promo_img_04.jpg') }}" alt="alternate">
                <div class="tt-description">
                    <div class="tt-description-wrapper">
                        <div class="tt-background"></div>
                        <div class="tt-title-small">NEW IN:</div>
                        <div class="tt-title-large">CLOTHING</div>
                        <p>Nail your new-season fashion goals with party prepped dresses</p>
                        <span class="btn-underline">SHOP NOW!</span>
                    </div>
                </div>
            </a>
        </div>
        @break
@endswitch