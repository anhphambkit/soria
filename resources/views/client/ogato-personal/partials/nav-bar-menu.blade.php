<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 15:14
 */
$isSinglePost = isset($isSinglePost) ? $isSinglePost : true;
$classNavBarMenuCustom = isset($classNavBarMenuCustom) ? $classNavBarMenuCustom : '';

if ($isSinglePost) {
    $classHeaderNavBarSection = 'header-overlay text-center';
    $classNavBarSection = '';

}
else {
    $classHeaderNavBarSection = 'text-center';
    $classNavBarSection = 'nav-overlay';
}
$classHeaderNavBarSection .= $classNavBarMenuCustom;
?>
<div class="header-controller {{ $classHeaderNavBarSection }}">
    <div class="container">
        <nav id="nav" class="navbar navbar-expand-lg {{ $classNavBarSection }}">
            @section('logo-header')
                <a class="navbar-brand" href="{{ route('client.page.home') }}">
                    <img src="{{ asset($blogSettings['blog_logo_primary']) }}" alt="{{ $blogSettings['website_name'] }}" class="logo-1">
                </a>
            @show

            <div class="collapse navbar-collapse ">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('client.blog.home') }}" class="nav-link">{{ trans('breadcrumbs.home') }}</a>
                    </li>

                    @foreach($blogCategories as $blogCategory)
                        @php
                            $linkCategory['urlCategory'] = "{$blogCategory->slug}.{$blogCategory->id}";
                        @endphp
                        <li class="nav-item">
                            <a href="{{ route('client.blog.category_page', $linkCategory) }}" class="nav-link">{{ $blogCategory->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="search_trigger">
                <a class="nav-search search-trigger" href="#"><span class="jam jam-search"></span></a>

                <button class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>
    </div>
</div>

<div class="search-wrap">
    <div class="search-inner">
        <div class="search-cell">
            <form method="get">
                <div class="search-field-holder">
                    <input type="search" class="form-control main-search-input" placeholder="search">
                </div>
            </form>
        </div>
        <span class="icon-close jam jam-close open" id="search-close"></span>
    </div>

</div>
