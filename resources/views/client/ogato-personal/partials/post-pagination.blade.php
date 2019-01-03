<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 20:53
 */
$previous = [
    'titlePost' => $post['prev']['slug'] . "." . $post['prev']['id']
];
$next = [
    'titlePost' => $post['next']['slug'] . "." . $post['next']['id']
];
?>
<div class="post_navigation_area">
    <div class="container">
        <nav class="navigation post-navigation">
            <div class="nav-links">
                <div class="nav-previous">
                    @if($post['prev']['name'])
                        <a href="{{ route('client.post.detail', array_merge($previous, $domain)) }}">
                            <span class="meta-nav">Previous post</span>
                            <h5 class="post-title">{{ $post['prev']['name'] }}</h5>
                        </a>
                        <i class="jam jam-angle-left"></i>
                    @endif
                </div>
                <div class="nav-next">
                    @if($post['next']['name'])
                        <a href="{{ route('client.post.detail', array_merge($next, $domain)) }}">
                            <span class="meta-nav">Next post</span>
                            <h5 class="post-title">{{ $post['next']['name'] }}</h5>
                        </a>
                        <i class="jam jam-angle-right"></i>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>
