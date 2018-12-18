<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 16:05
 */
$isSinglePost = isset($isSinglePost) ? $isSinglePost : true;
$classCustom = isset($classCustom) ? $classCustom : '';

if ($isSinglePost) {
    $classContentSection = 'main_p main_p_v_2';

}
else {
    $classContentSection = '';
}
$classContentSection .= $classCustom;
?>
<div id="content_full" class="section-padding {{ $classContentSection }}">
    <div class="container">
        <div class="row sticky-container">
            <div class="col-lg-8 content">
                @if($isSinglePost)
                    <div class="p_content">
                        @yield('content-page')
                    </div>
                @else
                    <div id="content" class="latest-posts">
                        @yield('content-page')
                    </div>
                @endif
            </div>

            <!-- Side Bar -->
            <div class="col-lg-4">
                @include('client.ogato-personal.partials.sidebar-page')
            </div>
            <!-- End Side Bar -->
        </div>
    </div>
    @if($isSinglePost)
        @include('client.ogato-personal.partials.post-pagination')
        @yield('related-posts')
    @else

    @endif
</div>
