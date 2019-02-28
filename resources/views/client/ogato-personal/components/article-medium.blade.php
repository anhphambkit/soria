<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/28/19
 * Time: 20:25
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
<div class="col-lg-4">
    <div class="related_posts_item">
        <a href="{{ route('client.post.detail', $domain) }}" class="post_card_thumbnail post-card-thumbnail-custom">
            <img src="{{ asset($featureImage) }}" alt="">
        </a>
        <div class="post_card_body">
            <h3 class="post_card_title">
                <a href="{{ route('client.post.detail', $domain) }}">{{ $title }}</a>
            </h3>

            <div class="post_card_meta">
                <span class="cat_links">
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
                </span>
                <span class="posted_on">
                    <a href="#">{{ $createdAt }}</a>
                </span>
            </div>
        </div>
    </div>
</div>
