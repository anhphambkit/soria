<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 20:55
 */
?>
<section class="related_posts section-padding">
    <div class="container">
        <div class="row">
            <h4 class="col-12 title text-center mb-50">
                <span>{{ trans('blog.related_post') }}</span>
            </h4>
            @foreach($randomPosts as $randomPost)
                @component('client.ogato-personal.components.article-medium')
                    @slot('medias', $randomPost->medias)
                    @slot('categories', $randomPost->categories)
                    @slot('avatarLink', $randomPost->avatar_link)
                    @slot('createdAt', $randomPost->created_at)
                    @slot('title', $randomPost->name)
                    @slot('linkPost', $randomPost->slug . "." . $randomPost->id)
                    @slot('author', $randomPost->author)
                @endcomponent
            @endforeach
        </div>
    </div>
</section>
