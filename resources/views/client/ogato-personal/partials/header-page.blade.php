<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 20:52
 */
$author = isset($author) ? $author : config('setting.default_admin');
$headerImage = isset($headerImage) ? $headerImage : 'storage/general/background/header-image.jpg';
$isCategoryPage = isset($isCategoryPage) ? $isCategoryPage : false;
?>
<header class="bb-site-header-custom site_header_image cover-bg" data-image-src="{{ asset($headerImage) }}"  data-overlay="5">
    <div class="container">
        @if(!$isCategoryPage)
            <div class="post-categories">
                @for($i=0; $i < sizeof($categories); $i++)
                    @php
                        $linkCategory = "{$categories[$i]['slug']}.{$categories[$i]['id']}";
                        $domainForCategory = $domain;
                        unset($domainForCategory['urlPost']);
                        $domainForCategory['urlCategory'] = $linkCategory;
                    @endphp
                    <a href="{{ route('client.blog.category_page', $domainForCategory) }}">
                        {{ $categories[$i]['name'] }}@if($i < sizeof($categories) - 1),@endif
                    </a>
                @endfor
            </div>
        @else
            <div class="post-categories">
                {{ trans('category.category_name') }}
            </div>
        @endif
        <h1 class="entry_title">{{ $title }}</h1>
        @if(!$isCategoryPage)
            <div class="post-subtitle-container">
                <div class="post-date">{{ date("d/m/Y", strtotime($createdDate)) }}</div>
                <div class="post-author"><a href="#">{{ $author }}</a></div>
            </div>
        @endif
    </div>
</header>
