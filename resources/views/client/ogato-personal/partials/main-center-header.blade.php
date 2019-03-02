<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 15:10
 */
?>
<header id="header" class="site_header section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="entry_header">
                    <h1 class="mb-20">{{ $blogSettings['blog_hi_sentence'] }}</h1>
                    <div class="author_avatar mb-20">
                        <div class="avatar">
                            <img src="{{ asset($blogSettings['blog_avatar_author']) }}" alt="">
                        </div>
                        <span class="author-url">
                            <i class="fas fa-share-alt open"></i>
                            <i class="fas fa-times " style="display: none"></i>
                        </span>
                    </div>
                    <br />
                    <div class="scoial-icon mb-20">
                        <a href="#0"><span><i class="fab fa-facebook-f"></i></span></a>
                    </div>
                    <div class="main-introduce-header">
                        <p>{{ $blogSettings['blog_introduce_author'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
