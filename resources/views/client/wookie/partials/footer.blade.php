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
                                <h4 class="tt-collapse-title text-uppercase">
                                    {{ trans('generals.promotion_sign_up') }}
                                </h4>
                                <div class="tt-collapse-content">
                                    <form id="newsletterform" class="form-inline form-default" method="post" novalidate="novalidate" action="#">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="{{ trans('generals.your_email_address') }}">
                                            <button type="submit" class="btn">{{ trans('generals.join_us') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="tt-social-icon flex-start-custom">
                        <li>
                            <a target="_blank" href="{{ $shopSettings['shop_facebook'] }}">
                                <i class="fab fa-facebook-square custom-icon-socials"></i>
                            </a>
                        </li>
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
                        <h4 class="tt-collapse-title text-uppercase">
                            {{ trans('breadcrumbs.product_categories') }}
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
                        <h4 class="tt-collapse-title text-uppercase">
                            {{ trans('generals.contact') }}
                        </h4>
                        <div class="tt-collapse-content">
                            <address>
                                {{--<p><span>Address: </span>{{ $shopSettings['shop_address'] }}</p>--}}
                                <p><span>{{ trans('generals.phone') }}: </span>{{ $shopSettings['shop_phone'] }}</p>
                                <p><span>{{ trans('generals.email') }}: </span> <a href="mailto:{{ $shopSettings['shop_email'] }}">{{ $shopSettings['shop_email'] }}</a></p>
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
                                        <button type="submit" class="btn">{{ trans('generals.join_us') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                        <a class="tt-logo tt-logo-alignment" href="{{ route('client.page.home') }}">
                            <img src="{{ asset($shopSettings['shop_logo_primary']) }}" alt="{{ $shopSettings['website_name'] }}">
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
            </div>
        </div>
    </div>
</footer>
