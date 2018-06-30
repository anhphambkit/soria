<!DOCTYPE html>
<html>
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>HomeShop - HTML Template</title>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,900,700italic,500italic' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/flexslider.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/fontello.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/chosen.css') }}">

    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/ie.css') }}">
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="css/fontello-ie7.css">
    <![endif]-->

    <link rel="stylesheet" href="{{ asset('packages/frontend/assets/css/app.css') }}">
</head>


<body>

<!-- Container -->
<div class="container">

    <!-- Header -->
    <header class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Main Header -->
            <div id="main-header">

                <div class="row">

                    <div id="logo" class="col-lg-4 col-md-4 col-sm-4">
                        <a href="{{ asset('/') }}"><img src="{{ asset('assets/vendors/img/logo.png') }}" alt="Logo"></a>
                    </div>

                    <nav id="middle-navigation" class="col-lg-8 col-md-8 col-sm-8">
                        <ul class="pull-right">
                            <li class="orange"><a href="{{ route('frontend.cart.index') }}"><i class="icons icon-basket-2"></i>{{ $cartServices->count() }} Items</a>
                                <ul id="cart-dropdown" class="box-dropdown parent-arrow">
                                    <li>
                                        <div class="box-wrapper parent-border">
                                            <p>Recently added item(s)</p>

                                            <table class="cart-table">
                                                @foreach($cartServices->all() as $p)
                                                <?php $prod = $prodServices->get($p->id); ?>
                                                <tr>
                                                    <td>
                                                        @if(!empty($prod->thumbImg()))
                                                        <img src="{{ asset('storage/'. $prod->thumbImg()->path_medium) }}" alt="product">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <h6>{{ $p->name }}</h6>
                                                        <p>{{ $prod->sku }}</p>
                                                    </td>
                                                    <td>
                                                        <span class="quantity"><span class="light">{{ $p->qty }} x</span> {{ number_format($p->price) }}</span>
                                                        <a href="#" onclick="removeItemFromCart('{{ $p->rowId }}'); return false;" class="parent-color">Remove</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>

                                            <br class="clearfix">
                                        </div>

                                        <div class="footer">
                                            <table class="checkout-table pull-right">
                                                <tr>
                                                    <td class="align-right">Tax:</td>
                                                    <td>{{ $cartServices->tax() }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-right"><strong>Total:</strong></td>
                                                    <td><strong class="parent-color">{{ $cartServices->total() }}</strong></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="box-wrapper no-border">
                                            <a class="button pull-right parent-background" href="{{ route('frontend.cart.index') }}">Checkout</a>
                                            <a class="button pull-right" href="{{ route('frontend.cart.index') }}">View Cart</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>

                </div>

            </div>
            <!-- /Main Header -->


            <!-- Main Navigation -->
            <nav id="main-navigation" class="style1">
                <ul>

                    <li class="home-green current-item">
                        <a href="{{ url('/') }}">
                            <i class="icons icon-shop-1"></i>
                            <span class="nav-caption">Home</span>
                            <span class="nav-description">Variety of Layouts</span>
                        </a>
                    </li>

                    <li class="red">
                        <a href="category_v1.html">
                            <i class="icons icon-camera-7"></i>
                            <span class="nav-caption">Cameras</span>
                            <span class="nav-description">Photo & Video</span>
                        </a>

                        <ul class="wide-dropdown normalAniamtion">
                            @foreach(config('frontend.menu.camera.child') as $childCameraSlug)
                            <li>
                                <ul>
                                    <li>
                                        <span class="nav-caption">{{ $catServices->filter(['slug' => $childCameraSlug])->first()->name }}</span></li>
                                    <li><a href="#"><i class="icons icon-right-dir"></i> Digital SLR</a></li>
                                    <li><a href="#"><i class="icons icon-right-dir"></i> Point &amp; Shoot</a></li>
                                    <li><a href="#"><i class="icons icon-right-dir"></i> Spy, Miniature</a></li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>

                    </li>

                    <li class="blue">
                        <a href="category_v2.html">
                            <i class="icons icon-desktop-3"></i>
                            <span class="nav-caption">Computers</span>
                            <span class="nav-description">Laptops & Tablets</span>
                        </a>
                    </li>

                    <li class="orange">
                        <a href="category_v1.html">
                            <i class="icons icon-mobile-6"></i>
                            <span class="nav-caption">Cell phones</span>
                            <span class="nav-description">Phones & Accessories</span>
                        </a>
                    </li>

                    <li class="green">
                        <a href="blog.html">
                            <i class="icons icon-pencil-7"></i>
                            <span class="nav-caption">Blog</span>
                            <span class="nav-description">News & Reviews</span>
                        </a>
                    </li>

                    <li class="purple">
                        <a href="contact.html">
                            <i class="icons icon-location-7"></i>
                            <span class="nav-caption">Contact</span>
                            <span class="nav-description">Store Locations</span>
                        </a>
                    </li>

                    <li class="nav-search">
                        <i class="icons icon-search-1"></i>
                    </li>

                </ul>

                <div id="search-bar">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table id="search-bar-table">
                            <tr>
                                <td class="search-column-1">
                                    <p><span class="grey">Popular Searches:</span> <a href="#">accessories</a>, <a href="#">audio</a>, <a href="#">camera</a>, <a href="#">phone</a>, <a href="#">storage</a>, <a href="#">more</a></p>
                                    <input type="text" placeholder="Enter your keyword">
                                </td>
                                <td class="search-column-2">
                                    <p class="align-right"><a href="#">Advanced Search</a></p>
                                    <select class="chosen-select-search">
                                        <option>All Categories</option>
                                        <option>All Categories</option>
                                        <option>All Categories</option>
                                        <option>All Categories</option>
                                        <option>All Categories</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="search-button">
                        <input type="submit" value="">
                        <i class="icons icon-search-1"></i>
                    </div>
                </div>

            </nav>
            <!-- /Main Navigation -->

        </div>

    </header>
    <!-- /Header -->


    <!-- Content -->
    <div class="row content">
        @yield('content')
    </div>
    <!-- /Content -->








    <!-- Footer -->
    <footer id="footer" class="row">

        <!-- Upper Footer -->
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div id="upper-footer">

                <div class="row">

                    <!-- Social Media -->
                    <div class="col-lg-5 col-md-5 col-sm-5 social-media">
                        <h4>Stay Connected</h4>
                        <ul>
                            @if(!empty($config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_GOOGLE]))
                            <li class="social-googleplus tooltip-hover" data-toggle="tooltip" data-placement="top" title="Google+"><a href="{{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_GOOGLE] }}"></a></li>
                            @endif
                            @if(!empty($config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_FB]))
                            <li class="social-facebook tooltip-hover" data-toggle="tooltip" data-placement="top" title="Facebook"><a href="{{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_FB] }}"></a></li>
                            @endif

                            @if(!empty($config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_PINTEREST]))
                            <li class="social-pinterest tooltip-hover" data-toggle="tooltip" data-placement="top" title="Pinterest"><a href="{{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_PINTEREST] }}"></a></li>
                            @endif

                            @if(!empty($config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_TWITTER]))
                            <li class="social-twitter tooltip-hover" data-toggle="tooltip" data-placement="top" title="Twitter"><a href="{{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_TWITTER] }}"></a></li>
                            @endif

                            @if(!empty($config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_YOUTUBE]))
                            <li class="social-youtube tooltip-hover" data-toggle="tooltip" data-placement="top" title="Youtube"><a href="{{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_YOUTUBE] }}"></a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- /Social Media -->

                </div>

            </div>

        </div>
        <!-- /Upper Footer -->



        <!-- Main Footer -->
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div id="main-footer">

                <div class="row">

                    <!-- The Service -->
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <h4>The Service</h4>
                        <ul>
                            <li><a href="#"><i class="icons icon-right-dir"></i> My account</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Order history</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Vendor contact</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Shop page</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Categories</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Search results</a></li>
                        </ul>
                    </div>
                    <!-- /The Service -->


                    <!-- Like us on Facebook -->
                    <div class="col-lg-3 col-md-3 col-sm-6 facebook-iframe">
                        <h4>Like us on Facebook</h4>
                        <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FFacebookDevelopers&amp;width=270&amp;height=250&amp;colorscheme=light&amp;header=false&amp;show_faces=true&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:100%; height:290px;"></iframe>
                    </div>
                    <!-- /Like us on Facebook -->


                    <!-- Information -->
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="#"><i class="icons icon-right-dir"></i> About Us</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> New Collection</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Bestsellers</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Manufacturers</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Privacy Policy</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                    <!-- /Information -->


                    <!-- Contact Us -->
                    <div class="col-lg-3 col-md-3 col-sm-6 contact-footer-info">
                        <h4>Contact Us</h4>
                        <ul>
                            <li><i class="icons icon-location"></i> {{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD1] }}</li>
                            <li><i class="icons icon-phone"></i> {{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_FOUR_PHONE] }}</li>
                            <li><i class="icons icon-mail-alt"></i><a href="mailto:{{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL] }}"> {{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL] }}</a></li>
                            <li><i class="icons icon-skype"></i> {{ $config[\Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SKYPE] }}</li>
                        </ul>
                    </div>
                    <!-- /Contact Us -->

                </div>

            </div>

        </div>
        <!-- /Main Footer -->



        <!-- Lower Footer -->
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div id="lower-footer">

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p class="copyright">Copyright 2018 <a href="#">HomeShop</a>. All Rights Reserved.</p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <ul class="payment-list">
                            <li class="payment1"></li>
                            <li class="payment2"></li>
                            <li class="payment3"></li>
                            <li class="payment4"></li>
                            <li class="payment5"></li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
        <!-- /Lower Footer -->

    </footer>
    <!-- Footer -->


    <div id="back-to-top">
        <i class="icon-up-dir"></i>
    </div>

</div>
<!-- Container -->



<!-- JavaScript -->
<script src="{{ asset('assets/vendors/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/js/jquery.raty.min.js') }}"></script>

<!-- Scroll Bar -->
<script src="{{ asset('assets/vendors/js/perfect-scrollbar.min.js') }}"></script>

<!-- Cloud Zoom -->
<script src="{{ asset('assets/vendors/js/zoomsl-3.0.min.js') }}"></script>

<!-- FancyBox -->
<script src="{{ asset('assets/vendors/js/jquery.fancybox.pack.js') }}"></script>

<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="{{ asset('assets/vendors/js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- FlexSlider -->
<script defer src="{{ asset('assets/vendors/js/flexslider.min.js') }}"></script>

<!-- IOS Slider -->
<script src = "{{ asset('assets/vendors/js/jquery.iosslider.min.js') }}"></script>

<!-- noUi Slider -->
<script src="{{ asset('assets/vendors/js/jquery.nouislider.min.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('assets/vendors/js/owl.carousel.min.js') }}"></script>

<!-- Cloud Zoom -->
<script src="{{ asset('assets/vendors/js/zoomsl-3.0.min.js') }}"></script>

<!-- SelectJS -->
<script src="{{ asset('assets/vendors/js/chosen.jquery.min.js') }}" type="text/javascript"></script>

<!-- Main JS -->
<script defer src="{{ asset('assets/vendors/js/bootstrap.min.js') }}"></script>
<script>
    var api = {
        cart: {
            add: '{{route('frontend.cart.add')}}',
            destroy: '{{route('frontend.cart.destroy')}}',
            update: '{{route('frontend.cart.update', '')}}',
            remove: '{{route('frontend.cart.remove', '')}}',
        }
    };
    $.ajaxSetup({headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
</script>
<script src="{{ asset('assets/vendors/js/main-script.js') }}"></script>
<script src="{{ asset('assets/vendors/js/twitter/jquery.tweet.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tinynav.min.js') }}"></script>
@yield('scripts')
</body>

</html>