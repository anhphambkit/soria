<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/13/19
 * Time: 16:34
 */
?>
<footer>
    <div class="tt-footer-default tt-color-scheme-02">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="tt-newsletter-layout-01">
                        <div class="tt-newsletter">
                            <div class="tt-mobile-collapse">
                                <h4 class="tt-collapse-title">
                                    BE IN TOUCH WITH US:
                                </h4>
                                <div class="tt-collapse-content">
                                    <form id="newsletterform" class="form-inline form-default" method="post" novalidate="novalidate" action="#">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="{{ trans('generals.your_email_address') }}">
                                            <button type="submit" class="btn">JOIN US</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto">
                    <ul class="tt-social-icon">
                        <li><a class="icon-g-64" target="_blank" href="http://www.facebook.com/"></a></li>
                        <li><a class="icon-h-58" target="_blank" href="http://www.facebook.com/"></a></li>
                        <li><a class="icon-g-66" target="_blank" href="http://www.twitter.com/"></a></li>
                        <li><a class="icon-g-67" target="_blank" href="http://www.google.com/"></a></li>
                        <li><a class="icon-g-70" target="_blank" href="https://instagram.com/"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="tt-footer-col tt-color-scheme-01">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-2 col-xl-4">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            PRODUCT CATEGORIES
                        </h4>
                        <div class="tt-collapse-content">
                            <ul class="tt-list">
                                @foreach($shopCategories as $shopCategory)
                                    <li>
                                        <a href="#">{{ $shopCategory->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            CONTACTS
                        </h4>
                        <div class="tt-collapse-content">
                            <address>
                                {{--<p><span>Address: </span>{{ $shopSettings['shop_address'] }}</p>--}}
                                <p><span>Phone: </span>{{ $shopSettings['shop_phone'] }}</p>
                                <p><span>E-mail: </span> <a href="mailto:{{ $shopSettings['shop_email'] }}">{{ $shopSettings['shop_email'] }}</a></p>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="tt-newsletter">
                        <div class="tt-mobile-collapse">
                            <h4 class="tt-collapse-title">
                                {{ trans('generals.newsletter_sign_up') }}
                            </h4>
                            <div class="tt-collapse-content">
                                <form id="newsletterform" class="form-inline form-default" method="post" novalidate="novalidate" action="#">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="{{ trans('generals.your_email_address') }}">
                                        <button type="submit" class="btn">JOIN US</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <ul class="tt-social-icon">
                        <li><a class="icon-g-64" target="_blank" href="{{ $shopSettings['shop_facebook'] }}"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="tt-footer-custom">
        <div class="container">
            <div class="tt-row">
                <div class="tt-col-left">
                    <div class="tt-col-item tt-logo-col">
                        <!-- logo -->
                        <a class="tt-logo tt-logo-alignment" href="index.html">
                            <img src="{{ asset('assets/client/wookie/app-assets/images/skin-lingerie/logo.png') }}" alt="">
                        </a>
                        <!-- /logo -->
                    </div>
                    <div class="tt-col-item">
                        <!-- copyright -->
                        <div class="tt-box-copyright">
                            {!! $shopSettings['shop_signature'] !!}
                        </div>
                        <!-- /copyright -->
                    </div>
                </div>
                <div class="tt-col-right">
                    <div class="tt-col-item">
                        <!-- payment-list -->
                        <ul class="tt-payment-list">
                            <li><a href="page404.html"><span class="icon-Stripe"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span>
                                    </span></a></li>
                            <li><a href="page404.html"> <span class="icon-paypal-2">
                                    <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>
                                    </span></a></li>
                            <li><a href="page404.html"><span class="icon-visa">
                                    <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span></a></li>
                            <li><a href="page404.html"><span class="icon-mastercard">
                                    <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span>
                                    </span></a></li>
                            <li><a href="page404.html"><span class="icon-discover">
                                    <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span>
                                    </span></a></li>
                            <li><a href="page404.html"><span class="icon-american-express">
                                    <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span>
                                    </span></a></li>
                        </ul>
                        <!-- /payment-list -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
