<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 20:52
 */
$author = isset($author) ? $author : "Admin";
?>
<header class="site_header_image cover-bg" data-image-src="{{ asset('assets/client/ogato-personal/app-assets/img/header-image.jpg') }}"  data-overlay="5">
    <div class="container">
        <div class="post-categories">
            @for($i=0; $i < sizeof($categories); $i++)
                <a href="#">{{ $categories[$i]['name'] }}</a>
                @if($i < sizeof($categories) - 1)
                    ,
                @endif
            @endfor
        </div>
        <h1 class="entry_title">{{ $title }}</h1>
        <div class="post-subtitle-container">
            <div class="post-date">{{ $createdDate }}</div>
            <div class="post-author"><a href="#">{{ $author }}</a></div>
        </div>
    </div>
</header>
