<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/12/19
 * Time: 14:27
 */
?>
@extends('client.wookie.master')

@section('keywords')
@endsection

@section('desc')
@endsection

@section('metas')
@endsection

@section('title')
    Shop
@endsection

@section('fonts')
@endsection

@section('core-scripts')
@endsection

@section('theme-css')
@endsection

@section('plugin-css')
@endsection

@section('page-css')
@endsection

@section('styles')
@endsection

{{--content page must define before section content--}}
@section('content-page')
    <div class="container-indent nomargin">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-sm-12">
                    <div class="tt-promo-fullwidth">
                        <img src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/promo/index-promo-img-01.jpg') }}" alt="">
                        <div class="tt-description">
                            <div class="tt-description-wrapper">
                                <div class="tt-title-small"><span class="tt-base-color">Limited Time!</span></div>
                                <div class="tt-title-large">ALL BRAS<br>3 FOR 2</div>
                                <p>New Dream Angles Bra Colections</p>
                                <a href="listing-collection.html" class="btn btn-xl">SHOP NOW!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container">
            <div class="row tt-layout-promo-box">
                <div class="col-sm-6 col-md-6">
                    <div class="tt-promo02">
                        <a href="#"><img src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/promo/index-promo-img-03.jpg') }}" alt=""></a>
                        <div class="tt-description text-center">
                            <a href="#" class="tt-title">
                                <div class="tt-title-small"><span class="tt-base-color">Find Your</span></div>
                                <div class="tt-title-large">Perfect style &amp; Fit</div>
                            </a>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="tt-promo02">
                        <a href="#"><img src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/promo/index-promo-img-04.jpg') }}" alt=""></a>
                        <div class="tt-description text-center">
                            <a href="#" class="tt-title">
                                <div class="tt-title-small"><span class="tt-base-color">Clearance Sales</span></div>
                                <div class="tt-title-large">GET UP TO 50% OFF</div>
                            </a>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <div class="tt-block-title">
                <h1 class="tt-title">TRENDING</h1>
                <div class="tt-description">TOP VIEW IN THIS WEEK</div>
            </div>
            <div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-layout-product-item slick-animated-show-js">
                <div class="col-2 col-md-4 col-lg-3">
                    <div class="tt-product thumbprod-center">
                        <div class="tt-image-box">
                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                            <a href="product.html">
                                <span class="tt-img"><img src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/product/product-04.jpg') }}" alt=""></span>
                                <span class="tt-label-location">
                                            <span class="tt-label-new">New</span>
                                        </span>
                            </a>
                        </div>
                        <div class="tt-description">
                            <div class="tt-row">
                                <ul class="tt-add-info">
                                    <li><a href="#">T-SHIRTS</a></li>
                                </ul>
                                <div class="tt-rating">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                </div>
                            </div>
                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                            <div class="tt-price">
                                <span class="new-price">$14</span>
                                <span class="old-price">$24</span>
                            </div>
                            <div class="tt-option-block">
                                <ul class="tt-options-swatch">
                                    <li><a class="options-color tt-color-bg-01" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-02" href="#"></a></li>
                                </ul>
                            </div>
                            <div class="tt-product-inside-hover">
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                </div>
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                    <a href="#" class="tt-btn-wishlist"></a>
                                    <a href="#" class="tt-btn-compare"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 col-md-4 col-lg-3">
                    <div class="tt-product thumbprod-center">
                        <div class="tt-image-box">
                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                            <a href="product.html">
                                <span class="tt-img"><img src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/product/product-06.jpg') }}" alt=""></span>
                            </a>
                        </div>
                        <div class="tt-description">
                            <div class="tt-row">
                                <ul class="tt-add-info">
                                    <li><a href="#">T-SHIRTS</a></li>
                                </ul>
                                <div class="tt-rating">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                </div>
                            </div>
                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                            <div class="tt-price">
                                $124
                            </div>
                            <div class="tt-product-inside-hover">
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                </div>
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                    <a href="#" class="tt-btn-wishlist"></a>
                                    <a href="#" class="tt-btn-compare"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 col-md-4 col-lg-3">
                    <div class="tt-product thumbprod-center">
                        <div class="tt-image-box">
                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                            <a href="product.html">
                                <span class="tt-img"><img src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/product/product-05.jpg') }}" alt=""></span>
                            </a>
                        </div>
                        <div class="tt-description">
                            <div class="tt-row">
                                <ul class="tt-add-info">
                                    <li><a href="#">T-SHIRTS</a></li>
                                </ul>
                            </div>
                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                            <div class="tt-price">
                                $12
                            </div>
                            <div class="tt-product-inside-hover">
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                </div>
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                    <a href="#" class="tt-btn-wishlist"></a>
                                    <a href="#" class="tt-btn-compare"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 col-md-4 col-lg-3">
                    <div class="tt-product thumbprod-center">
                        <div class="tt-image-box">
                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                            <a href="product.html">
                                <span class="tt-img"><img src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/product/product-07.jpg') }}" alt=""></span>
                                <span class="tt-label-location">
                                            <span class="tt-label-sale">Sale 15%</span>
                                        </span>
                            </a>
                        </div>
                        <div class="tt-description">
                            <div class="tt-row">
                                <ul class="tt-add-info">
                                    <li><a href="#">T-SHIRTS</a></li>
                                </ul>
                                <div class="tt-rating">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-half"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                            <div class="tt-price">
                                $78
                            </div>
                            <div class="tt-product-inside-hover">
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                </div>
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                    <a href="#" class="tt-btn-wishlist"></a>
                                    <a href="#" class="tt-btn-compare"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 col-md-4 col-lg-3">
                    <div class="tt-product thumbprod-center">
                        <div class="tt-image-box">
                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                            <a href="product.html">
                                <span class="tt-img"><img src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/product/product-08.jpg') }}" alt=""></span>
                            </a>
                        </div>
                        <div class="tt-description">
                            <div class="tt-row">
                                <ul class="tt-add-info">
                                    <li><a href="#">T-SHIRTS</a></li>
                                </ul>
                            </div>
                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                            <div class="tt-price">
                                $12
                            </div>
                            <div class="tt-product-inside-hover">
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                </div>
                                <div class="tt-row-btn">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                    <a href="#" class="tt-btn-wishlist"></a>
                                    <a href="#" class="tt-btn-compare"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container">
            <div class="row tt-layout-promo-box">
                <div class="col-sm-6 col-md-4">
                    <div class="tt-promo02">
                        <a href="#"><img src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/promo/index-promo-img-06.jpg') }}" alt=""></a>
                        <div class="tt-description text-center">
                            <a href="#" class="tt-title">
                                <div class="tt-title-small"><span class="tt-base-color">Limited Time!</span></div>
                                <div class="tt-title-large">ALL BRAS BUY 2,<br> GET 1 FREE</div>
                            </a>
                            <p>Conse ctetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="tt-promo02">
                        <a href="#"><img src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/promo/index-promo-img-07.jpg') }}" alt=""></a>
                        <div class="tt-description text-center">
                            <a href="#" class="tt-title">
                                <div class="tt-title-small"><span class="tt-base-color">Babydolls</span></div>
                                <div class="tt-title-large">GET UP TO<br> 20% OFF</div>
                            </a>
                            <p>Conse ctetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="tt-promo02">
                        <a href="#"><img src="{{ asset('assets/client/wookie/app-assets/images/loader.svg') }}" data-src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/promo/index-promo-img-08.jpg') }}" alt=""></a>
                        <div class="tt-description text-center">
                            <a href="#" class="tt-title">
                                <div class="tt-title-small"><span class="tt-base-color">New &amp; Now</span></div>
                                <div class="tt-title-large">FRESH FAVES FOR<br> THE SEASON AHEAD</div>
                            </a>
                            <p>Conse ctetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container-fluid">
            <div class="tt-block-title">
                <h2 class="tt-title"><a target="_blank" href="https://www.instagram.com/wokieeshoplingerie/">@ FOLLOW</a> US ON</h2>
                <div class="tt-description">INSTAGRAM</div>
            </div>
            <div class="row">
                <div id="instafeed" class="instafeed-fluid"
                     data-accessToken="8629862660.1440d4e.d5d949aa75454b1f9a0c81c0848d48bd"
                     data-clientId="1440d4e491ab4ef7bc061657eb389ef2"
                     data-userId="8629862660"
                     data-limitImg="6">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('core-footer-scripts')
@endsection

@section('theme-scripts')
@endsection

@section('plugin-scripts')
@endsection

@section('page-scripts')
@endsection



