<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 22:27
 */
?>
{{--<div class="slider-revolution revolution-default">--}}
    {{--<div class="tp-banner-container">--}}
        {{--<div class="tp-banner revolution">--}}
            {{--<ul>--}}
                {{--<li data-thumb="{{ asset('storage/slider/4.png') }}" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">--}}
                    {{--<img src="{{ asset('storage/slider/4.png') }}"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >--}}
                {{--</li>--}}
                {{--<li data-thumb="{{ asset('storage/slider/combo_tri_mun.png') }}" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">--}}
                    {{--<img src="{{ asset('storage/slider/combo_tri_mun.png') }}"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >--}}
                {{--</li>--}}
                {{--<li data-thumb="{{ asset('storage/slider/combo_tri_nam.png') }}" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">--}}
                    {{--<img src="{{ asset('storage/slider/combo_tri_nam.png') }}"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >--}}
                {{--</li>--}}
                {{--<li data-thumb="{{ asset('storage/slider/nut_dang_ky.png') }}" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">--}}
                    {{--<img src="{{ asset('storage/slider/nut_dang_ky.png') }}"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="3000">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('storage/slider/4.png') }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('storage/slider/combo_tri_mun.png') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('storage/slider/combo_tri_nam.png') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('storage/slider/nut_dang_ky.png') }}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>