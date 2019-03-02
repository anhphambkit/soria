<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 15:20
 */
?>
<div id="sidebar" class="sidebar light-sidebar">
    <div class="sidebar__inner">
        <div class="sidbar_w">
            <div class="widget_area area_about">
                <div class="about">
                    <h3 class="widget_title">
                        <span>{{ trans('blog.about_me') }}</span>
                    </h3>
                    <img src="{{ asset($blogSettings['blog_avatar_author']) }}" alt="">
                    <div class="short-description-author">
                        {!! $blogSettings['blog_short_about'] !!}
                    </div>
                </div>
            </div>

            <div class="widget_area recent_posts">
                <h3 class="widget_title">
                    <span>{{ trans('blog.new_posts') }}</span>
                </h3>

                @foreach($blogNewPosts as $blogNewPost)
                    @component('client.ogato-personal.components.article-small-view')
                        @slot('medias', $blogNewPost->medias)
                        @slot('categories', $blogNewPost->categories)
                        @slot('avatarLink', $blogNewPost->avatar_link)
                        @slot('title', $blogNewPost->name)
                        @slot('linkPost', $blogNewPost->slug . "." . $blogNewPost->id)
                        @slot('author', $blogNewPost->author)
                    @endcomponent
                @endforeach

            </div>

            <div class="widget_area social_icons_area">
                <h3 class="widget_title">
                    <span>{{ trans('blog.add_friend_with_me', [ 'author' => $blogSettings['blog_name_author'] ]) }}</span>
                </h3>

                <div class="scoial-icon">
                    <a href="{{ $blogSettings['blog_facebook'] }}"><span><i class="fab fa-facebook-f"></i></span></a>
                </div>
            </div>

            <div class="widget_area widget_newslleter">
                <h3 class="widget_title">
                    <span>{{ trans('blog.newsletter_sign_up') }}</span>
                </h3>

                <form action="#" method="post">
                    <input placeholder="{{ trans('generals.your_email_address') }}" type="text">
                    <button class="btn" type="submit" name="submit">{{ trans('generals.sign_up') }}</button>
                </form>
            </div>
        </div>
    </div>

</div>
