<?php $maxItem = isset($maxItem) ? $maxItem : 3 ?>
@if(!isset($withoutTitle) || $withoutTitle == false)
    <!-- Carousel Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="carousel-heading">
            <h4>{{ $title }}</h4>
            <div class="carousel-arrows">
                <i class="icons icon-left-dir"></i>
                <i class="icons icon-right-dir"></i>
            </div>
        </div>

    </div>
    <!-- /Carousel Heading -->
@endif
<!-- Carousel -->
<div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">

    <div class="owl-carousel" data-max-items="{{ $maxItem }}">
    @foreach($products as $p)
        @if(empty($p->thumbImg()))
            @continue
        @endif
        <!-- Slide -->
            <div>
                <!-- Carousel Item -->
                <div class="product">

                    <div class="product-image">
                        <?php $isSaleOff = $p->sale_price < $p->price && $p->sale_value > 0 && !empty($p->sale_type) ?>
                        @if($isSaleOff)
                        <span class="product-tag">Sale</span>
                        @endif
                        <img src="{{ asset('storage/'. $p->thumbImg()->path_org) }}" alt="{{ $p->name }}">
                        <a href="{{ route('frontend.product.detail', $p->slug) }}" class="product-hover">
                            <i class="icons icon-eye-1"></i> Quick View
                        </a>
                    </div>

                    <div class="product-info">
                        <h5><a href="{{ route('frontend.product.detail', $p->slug) }}">{{ $p->name }}</a></h5>
                        @if($isSaleOff)
                        <del>{{ number_format($p->price) }}</del>
                        @endif
                        <span class="price">{{ number_format($p->sale_price) }} đ</span>

                        <div class="rating readonly-rating" data-score="{{ $p->rating ? $p->rating : 1 }}"></div>
                    </div>

                    <div class="product-actions">
                        <span class="add-to-cart" onclick="addItemToCart({{$p->getKey()}}, 1)">
                            <span class="action-wrapper">
                                <i class="icons icon-basket-2"></i>
                                <span class="action-name">Add to cart</span>
                            </span>
                        </span>
                    </div>

                </div>
                <!-- /Carousel Item -->
            </div>
            <!-- /Slide -->
        @endforeach

    </div>
</div>
<!-- /Carousel -->