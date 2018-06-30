<!-- Carousel Heading -->
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="carousel-heading">
        <h4>Product Brands</h4>
        <div class="carousel-arrows">
            <i class="icons icon-left-dir"></i>
            <i class="icons icon-right-dir"></i>
        </div>
    </div>

</div>
<!-- /Carousel Heading -->
<!-- Carousel -->
<div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">
    <div class="owl-carousel" data-max-items="{{ config('frontend.limit-brands') }}">
        @foreach($brandServices->all() as $b)
        <?php $logo = $b->logo()->first(); ?>
            @if(!empty($logo))
            <div>
                <div class="product">
                    <a href="#"><img src="{{ asset('storage/'.$logo->path_medium) }}" alt="{{ $b->name }}"></a>
                </div>
            </div>
            @endif
        @endforeach
    </div>

</div>
<!-- /Carousel -->