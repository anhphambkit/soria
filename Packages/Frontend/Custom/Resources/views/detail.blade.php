<?php Debugbar::addMeasure('now', LARAVEL_START, microtime(true)); ?>
@extends('frontend.custom::layouts.frontend')
@section('content')
    <?php $isSaleOff = $p->sale_price < $p->price && $p->sale_value > 0 && !empty($p->sale_type) ?>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="breadcrumbs">
            <p><a href="#">Home</a> <i class="icons icon-right-dir"></i> <a href="#">Computers &amp; Tablets</a> <i class="icons icon-right-dir"></i> Product Name</p>
        </div>
    </div>
    <!-- Main Content -->
    <section class="main-content col-lg-9 col-md-9 col-sm-9">


        <div id="product-single">

            <!-- Product -->
            <div class="product-single">

                <div class="row">

                    <!-- Product Images Carousel -->
                    <div class="col-lg-5 col-md-5 col-sm-5 product-single-image">

                        <div id="product-slider">
                            <ul class="slides">
                                <li>
                                    <img class="cloud-zoom" src="{{ asset('storage/'. $p->thumbImg()->path_org) }}" data-large="{{ asset('storage/'. $p->thumbImg()->path_org) }}" alt="" />
                                    <a class="fullscreen-button" href="{{ asset('storage/'. $p->thumbImg()->path_org) }}">
                                        <div class="product-fullscreen">
                                            <i class="icons icon-resize-full-1"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php $relatedImgs = $p->relatedImg(); ?>
                        @if(!empty($relatedImgs->count()))
                        <div id="product-carousel">
                            <ul class="slides">
                                @foreach($relatedImgs as $img)
                                <li>
                                    <a class="fancybox" rel="product-images" href="{{ asset('storage/'. $img->path_medium) }}"></a>
                                    <img src="{{ asset('storage/'. $img->path_medium) }}" data-large="{{ asset('storage/'. $img->path_org) }}" alt=""/>
                                </li>
                                @endforeach
                            </ul>
                            <div class="product-arrows">
                                <div class="left-arrow">
                                    <i class="icons icon-left-dir"></i>
                                </div>
                                <div class="right-arrow">
                                    <i class="icons icon-right-dir"></i>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- /Product Images Carousel -->


                    <div class="col-lg-7 col-md-7 col-sm-7 product-single-info">

                        <h2>{{ $p->name }}</h2>
                        <div class="rating-box">
                            <div class="rating readonly-rating" data-score="{{ $p->rating }}"></div>
                        </div>
                        <table>
                            <?php $brand = $p->brand(); ?>
                            @if(!empty($brand))
                            <tr>
                                <td>Manufacturer</td>
                                <td>{{ $brand->name }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Availability</td>
                                <td><span class="green">in stock</span> 20 items</td>
                            </tr>
                            <tr>
                                <td>Product code</td>
                                <td>{{ $p->sku }}</td>
                            </tr>
                        </table>

                        <span class="price">
                            @if($isSaleOff)
                            <del>{{ number_format($p->price) }}</del>
                            @endif
                                {{ number_format($p->sale_price) }} đ
                        </span>

                        <table class="product-actions-single">
                            <tr>
                                <td>Quantity:</td>
                                <td>
                                    <div class="numeric-input">
                                        <input type="text" value="1" id="qty">
                                        <span class="arrow-up"><i class="icons icon-up-dir"></i></span>
                                        <span class="arrow-down"><i class="icons icon-down-dir"></i></span>
                                    </div>
                                    <a href="#" onclick="addItemToCart({{ $p->getKey() }}, $('#qty').val());return false;">
                                        <span class="add-to-cart">
                                            <span class="action-wrapper">
                                                <i class="icons icon-basket-2"></i>
                                                <span class="action-name">Add to cart</span>
                                            </span >
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <div class="social-share">
                            <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" style="border:none; overflow:hidden; height:21px; width:100px;"></iframe>

                            <iframe
                                    src="https://platform.twitter.com/widgets/tweet_button.html"
                                    style="width:100px; height:20px;"></iframe>

                            <!-- Place this tag where you want the +1 button to render. -->
                            <div class="g-plusone" data-size="medium"></div>

                            <!-- Place this tag after the last +1 button tag. -->
                            <script type="text/javascript">
                                (function() {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                    po.src = 'https://apis.google.com/js/platform.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                })();
                            </script>


                            <a href="//www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.flickr.com%2Fphotos%2Fkentbrew%2F6851755809%2F&media=http%3A%2F%2Ftest.ratkosolar.com%2Fhomeshop%2F15-blog_post.html&description=Next%20stop%3A%20Pinterest" data-pin-do="buttonPin" data-pin-config="beside" class="pinterest"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>
                            <!-- Please call pinit.js only once per page -->
                            <script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>

                        </div>

                    </div>

                </div>

            </div>
            <!-- /Product -->
            <!-- Product Tabs -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="tabs">
                        <div class="tab-heading">
                            <a href="#tab1" class="button big">Description</a>
                        </div>
                        <div class="page-content tab-content">
                            <div id="tab1">
                                {!! $p->long_desc  !!}
                                <p class="tags home-green"><strong>Tags:</strong> <a href="#" class="tag-item">digital camera</a>
                                    <a href="#" class="tag-item">lorem</a>
                                    <a href="#" class="tag-item">gps</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Tabs -->

        </div>


        <div class="products-row row">
            @component('frontend.custom::components.slider')
            @slot('products', $prodServices->getRelatedProduct($p, config('frontend.limit-related-products')))
            @slot('title', 'Related Products')
            @endcomponent
        </div>
    </section>
    <aside class="sidebar right-sidebar col-lg-3 col-md-3 col-sm-3">
        @component('frontend.custom::components.widgets.categories')
        @endcomponent
        @component('frontend.custom::components.widgets.random-products-slider')
        @endcomponent
        @component('frontend.custom::components.widgets.bestseller')
        @endcomponent

        <!-- Tag Cloud -->
        <div class="row sidebar-box green">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="sidebar-box-heading">
                    <i class="icons icon-tag-6"></i>
                    <h4>Tags Cloud</h4>
                </div>

                <div class="sidebar-box-content sidebar-padding-box">
                    <a href="#" class="tag-item">digital camera</a>
                    <a href="#" class="tag-item">lorem</a>
                    <a href="#" class="tag-item">gps</a>
                    <a href="#" class="tag-item">headphones</a>
                    <a href="#" class="tag-item">ipsum</a>
                    <a href="#" class="tag-item">laptop</a>
                    <a href="#" class="tag-item">smartphone</a>
                    <a href="#" class="tag-item">tv</a>
                </div>

            </div>

        </div>
        <!-- /Tag Cloud -->
    </aside>
    <!-- /Sidebar -->

    @component('frontend.custom::components.widgets.banner')
    @endcomponent
@endsection

@section('scripts')
@endsection
