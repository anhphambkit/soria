<!-- Carousel -->
<div class="row sidebar-box">
    <div class="col-lg-12 col-md-12 col-sm-12 sidebar-carousel">
        <!-- Slider -->
        <section class="sidebar-slider">
            <div class="sidebar-flexslider">
                <ul class="slides">
                    @foreach($prodServices->filter(['status' => 'P'])->inRandomOrder()->take(config('frontend.limit-random'))->get() as $p)
                        @if(empty($p->thumbImg()))
                            @continue
                        @endif
                    <li>
                        <a href="{{ route('frontend.product.detail', $p->slug) }}"><img src="{{ asset('storage/'. $p->thumbImg()->path_medium) }}" alt="{{ $p->name }}"/></a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="slider-nav"></div>
        </section>
        <!-- /Slider -->
    </div>
</div>
<!-- /Carousel -->