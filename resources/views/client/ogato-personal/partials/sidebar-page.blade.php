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
                        <span>About Me</span>
                    </h3>
                    <img src="{{ asset('assets/client/ogato-personal/app-assets/img/authors/1.jpg') }}" alt="">
                    <p>Schlitz knausgad occupy master clnse normcore health goth. Coloring book
                        i
                        street, art umami pok biosel brunch cloud bread.</p>
                    <img src="{{ asset('assets/client/ogato-personal/app-assets/img/sign-about-1.png') }}" class="sign-about" alt="">
                </div>
            </div>

            <div class="widget_area recent_posts">
                <h3 class="widget_title">
                    <span>Recent Posts</span>
                </h3>

                <article class="recent_post">
                    <div class="post-media">
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/1-min.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="post_info">
                        <p>
                            <a href="#">Hairstyles</a>
                        </p>
                        <h5>
                            <a href="#">6 Hairstyle Ideas for Instant Refresh Look</a>
                        </h5>
                    </div>
                </article>

                <article class="recent_post">
                    <div class="post-media">
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/2-min.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="post_info">
                        <p>
                            <a href="#">Hairstyles</a>
                        </p>
                        <h5>
                            <a href="#">6 Hairstyle Ideas for Instant Refresh Look</a>
                        </h5>
                    </div>
                </article>

                <article class="recent_post">
                    <div class="post-media">
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/3-min.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="post_info">
                        <p>
                            <a href="#">Hairstyles</a>
                        </p>
                        <h5>
                            <a href="#">6 Hairstyle Ideas for Instant Refresh Look</a>
                        </h5>
                    </div>
                </article>

            </div>

            <div class="widget_area social_icons_area">
                <h3 class="widget_title">
                    <span>Follow Me</span>
                </h3>

                <div class="scoial-icon">
                    <a href="#0"><span><i class="fab fa-facebook-f"></i></span></a>
                    <a href="#0"><span><i class="fab fa-twitter"></i></span></a>
                    <a href="#0"><span><i class="fab fa-linkedin-in"></i></span></a>
                    <a href="#0"><span><i class="fab fa-instagram"></i></span></a>
                    <a href="#0"><span><i class="fab fa-behance"></i></span></a>
                </div>
            </div>

            <div class="widget_area instagram_feed">
                <h3 class="widget_title">
                    <span>instagram</span>
                </h3>

                <ul class="instagram_pics">
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/instagram/1.jpg') }}" alt="">
                            <div class="instagram-overlay">
                                <div class="instagram-meta">
                                    <div>
                                                                <span class="instagram-likes"><i class="fas fa-heart"></i>
                                                                    1</span>
                                        <span class="instagram-comments"><i class="far fa-comments"></i>
                                                                    3</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/instagram/2.jpg') }}" alt="">
                            <div class="instagram-overlay">
                                <div class="instagram-meta">
                                    <div>
                                                                <span class="instagram-likes"><i class="fas fa-heart"></i>
                                                                    1</span>
                                        <span class="instagram-comments"><i class="far fa-comments"></i>
                                                                    3</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/instagram/3.jpg') }}" alt="">
                            <div class="instagram-overlay">
                                <div class="instagram-meta">
                                    <div>
                                                                <span class="instagram-likes"><i class="fas fa-heart"></i>
                                                                    1</span>
                                        <span class="instagram-comments"><i class="far fa-comments"></i>
                                                                    3</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/client/ogato-personal/app-assets/img/instagram/4.jpg') }}" alt="">
                            <div class="instagram-overlay">
                                <div class="instagram-meta">
                                    <div>
                                                                <span class="instagram-likes"><i class="fas fa-heart"></i>
                                                                    1</span>
                                        <span class="instagram-comments"><i class="far fa-comments"></i>
                                                                    3</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="widget_area widget_newslleter">
                <h3 class="widget_title">
                    <span>Subscribe</span>
                </h3>

                <form action="#" method="post">
                    <input placeholder="Your Email Address" type="text">
                    <button class="btn" type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

</div>
