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
            <a class="navbar-brand" href="#">
                <img src="{{ asset($blogSettings['blog_logo_primary']) }}" alt="{{ $blogSettings['website_name'] }}" class="logo-1">
            </a>

            <div class="collapse navbar-collapse ">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a href="#" class="nav-link dropdown-toggle">Home</a>
                    </li>

                    @foreach($blogCategories as $blogCategory)
                        <li class="dropdown nav-item">
                            <a href="#" class="nav-link dropdown-toggle">{{ $blogCategory->name }}</a>
                        </li>
                    @endforeach


                    <li class="dropdown nav-item">
                        <a href="#" class="nav-link dropdown-toggle">Life Style</a>
                    </li>
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
