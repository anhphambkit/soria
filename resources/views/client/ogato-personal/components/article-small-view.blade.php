<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/28/19
 * Time: 19:51
 */
$domain['urlPost'] = $linkPost;
$medias = isset($medias) ? $medias : [];
$categories = isset($categories) ? $categories : [];
$avatarLink = isset($avatarLink) ? $avatarLink : $blogSettings['blog_avatar_author'];
$author = $blogSettings['blog_name_author'];
$featureImage = "assets/client/ogato-personal/app-assets/img/posts/p2.jpg";
if (sizeof($medias) > 0)
    $featureImage = reset($medias)['path_org'];
?>
<article class="recent_post">
    <div class="post-media">
        <a href="{{ route('client.post.detail', $domain) }}" class="post-thumbnail-smaill-custom">
            <img src="{{ asset($featureImage) }}" alt="">
        </a>
    </div>
    <div class="post_info">
        <p>
            @for($i=0; $i < sizeof($categories); $i++)
                <a href="#">
                    {{ $categories[$i]['name'] }}
                </a>
                @if($i < sizeof($categories) - 1)
                    ,
                @endif
            @endfor
        </p>
        <h5>
            <a href="{{ route('client.post.detail', $domain) }}">{{ $title }}</a>
        </h5>
    </div>
</article>
