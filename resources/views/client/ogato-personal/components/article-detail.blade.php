<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 21:49
 */
$typePost = isset($typePost) ? $typePost : '';
?>
<article>
    <div class="entry_header_small">
        <div class="row">
            <div class="col-lg-12">
                <div class="entry_header">
                    <h1 class="entry_title">Integer Maecenas Eget Viverra</h1>

                    @if($typePost === 'image')
                        <div class="post_media mb-50">
                            <a href="#">
                                <img src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/demo-image-1.jpg') }}" alt="">
                            </a>
                            <figcaption>Travel and change of place impart new vigor to the
                                mind. </figcaption>
                        </div>
                    @elseif($typePost === 'audio')
                        <div class="post_media audio  mb-50">
                            <iframe allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/533305992&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>

                            <figcaption>Travel and change of place impart new vigor to the
                                mind. </figcaption>
                        </div>
                    @elseif($typePost === 'video')
                        <div class="post_media post_media_video  mb-50">
                            <a href="#">
                                <img src="{{ asset('assets/client/ogato-personal/app-assets/img/posts/p4.jpg') }}" alt="">
                            </a>
                            <a class="vid" href="https://vimeo.com/127203262">
                                <div class="play-button">
                                    <svg class="play-circles" viewBox="0 0 152 152">
                                        <circle class="play-circle-01" fill="none" stroke="#fff"
                                                stroke-width="3" stroke-dasharray="343 343" cx="76"
                                                cy="76" r="72.7" />
                                        <circle class="play-circle-02" fill="none" stroke="#fff"
                                                stroke-width="3" stroke-dasharray="309 309" cx="76"
                                                cy="76" r="65.5" />
                                    </svg>
                                </div>
                                <div class="play-btn">
                                    <i class="fas fa-play"></i>
                                </div>
                            </a>
                            <figcaption>Travel and change of place impart new vigor to the
                                mind. </figcaption>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-12 content-article">
                <p class="post_excerpt">Producing creative, fresh projects is the key
                    to standing out.<a href="#">voluptatem</a> Unique side projects are
                    the best place to innovate, but balancing commercially and
                    creatively lucrative work is tricky. So, this article looks at how
                    to make side projects work and why they’re worthwhile, drawing on
                    lessons learned from our development of the ux ompanion app.</p>

                <blockquote class="mb-30">
                    <p>At vero eos et accusamus et iusto odio dignissimos duci
                        Curabitur accumsan, arcu ac volu tpat laoreet, elit orci
                        pulvinar massa, quis ullamcorper purus Curabitur accumsan, arcu
                        ac volutpat laoreet, elit orci pulvinar assa, quis ullamcorper</p>
                </blockquote>

                <p class="post_excerpt">Producing creative, fresh projects is the key
                    to standing out.<a href="#">voluptatem</a> Unique side projects are
                    the best place to innovate, but balancing commercially and
                    creatively lucrative work is tricky. So, this article looks at how
                    to make side projects work and why they’re worthwhile, drawing on
                    lessons learned from our development of the ux ompanion app.</p>
            </div>

            <div class="col-lg-12 bottom-article">
                <div class="tagcloud clearfix">
                    <a href="#">creative</a>
                    <a href="#" rel="tag">image</a>
                </div>

                <div class="post_bottom_meta">
                    <div class="half_width">
                        <ul class="post_meta">
                            <li>
                                <span class="author">
                                    <img src="{{ asset('assets/client/ogato-personal/app-assets/img/authors/1.jpg') }}" class="avatar" alt="">By
                                    <a href="#">admin</a>
                                </span>
                            </li>
                            <li>
                                <span class="date">
                                    <a href="#">6 September, 2018</a>
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div class="half_width">
                        <div class="socials-wrap">
                            <div class="socials-icon">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </div>
                            <div class="socials-text">Share Post</div>
                            <ul class="socials">
                                <li><a href="#" target="_blank"><span class="jam jam-facebook"></span></a></li>
                                <li><a href="#" target="_blank"><span class="jam jam-twitter"></span></a></li>
                                <li><a href="#" target="_blank"><span class="jam jam-google-plus"></span></a></li>
                                <li><a href="#" target="_blank"><span class="jam jam-pinterest"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
