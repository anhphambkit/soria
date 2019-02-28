<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 16:05
 */
$isSinglePost = isset($isSinglePost) ? $isSinglePost : true;
$classContentPageCustom = isset($classContentPageCustom) ? $classContentPageCustom : '';

if ($isSinglePost) {
    $classContentSection = 'main_p main_p_v_2';

}
else {
    $classContentSection = '';
}
$classContentSection .= $classContentPageCustom;
$hasSidebar = isset($hasSidebar) ? $hasSidebar : true;
?>
<div id="content_full" class="section-padding {{ $classContentSection }}">
    <div class="container">
        <div class="row sticky-container @if(!$hasSidebar) justify-content-center @endif">
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
            @if($hasSidebar)
                <div class="col-lg-4">
                    @include('client.ogato-personal.partials.sidebar-page')
                </div>
            @endif
            <!-- End Side Bar -->
        </div>
    </div>
    @if($isSinglePost)
        @include('client.ogato-personal.partials.post-pagination')
        @yield('related-posts')
    @else

    @endif
</div>
