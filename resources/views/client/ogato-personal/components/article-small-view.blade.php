<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/28/19
 * Time: 19:51
 */
$urlPost['urlPost'] = $linkPost;
$medias = isset($medias) ? $medias : [];
$categories = isset($categories) ? $categories : [];
$avatarLink = isset($avatarLink) ? $avatarLink : $blogSettings['blog_avatar_author'];
$author = $blogSettings['blog_name_author'];
if (sizeof($medias) > 0)
    $featureImage = reset($medias);
?>
<article class="recent_post">
    <div class="post-media">
        <a href="{{ route('client.post.detail', $urlPost) }}" class="post-thumbnail-smaill-custom">
            <img src="{{ asset($featureImage['path_org']) }}" alt="{{ $featureImage['filename'] }}">
        </a>
    </div>
    <div class="post_info">
        <p>
            @for($i=0; $i < sizeof($categories); $i++)
                @php
                    $linkCategory['urlCategory'] = "{$categories[$i]['slug']}.{$categories[$i]['id']}";
                @endphp
                <a href="{{ route('client.blog.category_page', $linkCategory) }}">
                    {{ $categories[$i]['name'] }}@if($i < sizeof($categories) - 1),@endif
                </a>
            @endfor
        </p>
        <h5>
            <a href="{{ route('client.post.detail', $urlPost) }}">{{ $title }}</a>
        </h5>
    </div>
</article>
