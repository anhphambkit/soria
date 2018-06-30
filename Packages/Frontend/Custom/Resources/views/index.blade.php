@extends('frontend.custom::layouts.frontend')
@section('content')
    <?php $config = $configServices->get(); ?>
    <!-- Main Content -->
    <section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">

        <section class="slider">
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <ul>
                        @foreach($slider->images() as $img)
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('storage/'. $img->media->path_org) }}"  alt="{{ $img->title }}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                            <div class="tp-caption skewfromrightshort fadeout"
                                 data-x="40"
                                 data-y="60"
                                 data-speed="500"
                                 data-start="1200"
                                 data-easing="Power4.easeOut"><h2><strong>{{ $img->title }}</strong></h2>
                            </div>
                            <div class="tp-caption skewfromrightshort fadeout"
                                 data-x="40"
                                 data-y="140"
                                 data-speed="500"
                                 data-start="1200"
                                 data-easing="Power4.easeOut"><h3>{{ $img->desc }}</h3>
                            </div>
                            <div class="tp-caption skewfromrightshort fadeout"
                                 data-x="40"
                                 data-y="300"
                                 data-speed="500"
                                 data-start="1200"
                                 data-easing="Power4.easeOut"><a class="button big red" href="#{{ $img->link }}">Buy Now</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <div class="products-row row">
            @component('frontend.custom::components.slider')
            @slot('products', $prodServices->filter(['status'   => 'P', 'is_feature' => true ])->orderBy('created_at', 'desc')->take(config('frontend.home.limit-feature-products'))->get())
            @slot('title', 'Feature Products')
            @endcomponent
        </div>
        <!-- /Featured Products -->


        <!-- New Collection -->
        <div class="products-row row">
            @component('frontend.custom::components.slider')
            @slot('products', $prodServices->filter(['status'   => 'P'])->orderBy('created_at', 'desc')->take(config('frontend.home.limit-feature-products'))->get())
            @slot('title', 'New Products')
            @endcomponent
        </div>
        <!-- /New Collection -->
        <!-- Random Products -->
        <div class="products-row row">
            @component('frontend.custom::components.slider')
            @slot('products', $prodServices->filter(['status'   => 'P'])->inRandomOrder()->take(config('frontend.home.limit-random-products'))->get())
            @slot('title', 'Random Products')
            @endcomponent
        </div>
        <!-- /Random Products -->


        <!-- Product Brands -->
        <div class="products-row row">
            @component('frontend.custom::components.widgets.product-brands')
            @endcomponent
        </div>
    </section>
    <!-- /Main Content -->
    <!-- Sidebar -->
    <aside class="sidebar col-lg-3 col-md-3 col-sm-3  col-lg-pull-9 col-md-pull-9 col-sm-pull-9">

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


        <!-- Specials -->
        <div class="row products-row sidebar-box orange">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <!-- Carousel Heading -->
                <div class="carousel-heading no-margin">

                    <h4><i class="icons icon-magic"></i> Specials</h4>
                    <div class="carousel-arrows">
                        <i class="icons icon-left-dir"></i>
                        <i class="icons icon-right-dir"></i>
                    </div>

                </div>
                <!-- /Carousel Heading -->

            </div>

            @component('frontend.custom::components.slider')
            @slot('products', $prodServices->filter(['status'   => 'P', 'is_best_seller' => true])->orderBy('created_at', 'desc')->take(config('frontend.home.limit-feature-products'))->get())
            @slot('title', 'Products')
            @slot('withoutTitle', true)
            @slot('maxItem', 1)
            @endcomponent


        </div>
        <!-- /Specials -->


    </aside>
    <!-- /Sidebar -->

    <!-- News -->
    <div class="products-row col-md-12">

        <!-- Carousel Heading -->
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="carousel-heading">
                <h4>Latest news &amp; Reviews</h4>
                <div class="carousel-arrows">
                    <i class="icons icon-left-dir"></i>
                    <i class="icons icon-right-dir"></i>
                </div>
            </div>

        </div>
        <!-- /Carousel Heading -->


        <!-- Carousel -->
        <div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">

            <div class="owl-carousel" data-max-items="2">

                <!-- Slide -->
                <div>
                    <!-- Carousel Item -->
                    <article class="news">

                        <div class="news-background">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 news-thumbnail">
                                    <a href="#"><img src="{{ asset('assets/vendors/img/news/sample1.jpg') }}" alt="News1"></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 news-content">
                                    <h5><a href="blog_post.html">Lorem Ipsum</a></h5>
                                    <span class="date"><i class="icons icon-clock-1"></i> 23 April, 2012</span>
                                    <p>Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh.</p>
                                </div>
                            </div>

                        </div>

                    </article>
                    <!-- /Carousel Item -->
                </div>
                <!-- /Slide -->


                <!-- Slide -->
                <div>

                    <!-- Carousel Item -->
                    <article class="news">

                        <div class="news-background">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 news-thumbnail">
                                    <a href="#"><img src="{{ asset('assets/vendors/img/news/sample2.jpg') }}" alt="News1"></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 news-content">
                                    <h5><a href="blog_post.html">Lorem Ipsum</a></h5>
                                    <span class="date"><i class="icons icon-clock-1"></i> 23 April, 2012</span>
                                    <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae. Suspendisse sollicitudin.</p>
                                </div>
                            </div>

                        </div>

                    </article>
                    <!-- /Carousel Item -->

                </div>
                <!-- /Slide -->



                <!-- Slide -->
                <div>

                    <!-- Carousel Item -->
                    <article class="news">

                        <div class="news-background">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 news-thumbnail">
                                    <a href="#"><img src="{{ asset('assets/vendors/img/news/sample2.jpg') }}" alt="News1"></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 news-content">
                                    <h5><a href="blog_post.html">Lorem Ipsum</a></h5>
                                    <span class="date"><i class="icons icon-clock-1"></i> 23 April, 2012</span>
                                    <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae. Suspendisse sollicitudin.</p>
                                </div>
                            </div>

                        </div>

                    </article>
                    <!-- /Carousel Item -->

                </div>
                <!-- /Slide -->




                <!-- Slide -->
                <div>

                    <!-- Carousel Item -->
                    <article class="news">

                        <div class="news-background">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 news-thumbnail">
                                    <a href="#"><img src="{{ asset('assets/vendors/img/news/sample2.jpg') }}" alt="News1"></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 news-content">
                                    <h5><a href="blog_post.html">Lorem Ipsum</a></h5>
                                    <span class="date"><i class="icons icon-clock-1"></i> 23 April, 2012</span>
                                    <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae. Suspendisse sollicitudin.</p>
                                </div>
                            </div>

                        </div>

                    </article>
                    <!-- /Carousel Item -->

                </div>
                <!-- /Slide -->




                <!-- Slide -->
                <div>

                    <!-- Carousel Item -->
                    <article class="news">

                        <div class="news-background">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 news-thumbnail">
                                    <a href="#"><img src="{{ asset('assets/vendors/img/news/sample2.jpg') }}" alt="News1"></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 news-content">
                                    <h5><a href="blog_post.html">Lorem Ipsum</a></h5>
                                    <span class="date"><i class="icons icon-clock-1"></i> 23 April, 2012</span>
                                    <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae. Suspendisse sollicitudin.</p>
                                </div>
                            </div>

                        </div>

                    </article>
                    <!-- /Carousel Item -->

                </div>
                <!-- /Slide -->


            </div>

        </div>
        <!-- /Carousel -->

    </div>
    <!-- /News -->

    @component('frontend.custom::components.widgets.banner')
    @endcomponent
@endsection

@section('scripts')
@endsection