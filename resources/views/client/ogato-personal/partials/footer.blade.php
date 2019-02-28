<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/18/18
 * Time: 15:54
 */
?>
<footer class="footer">
    <div class="footer_bottom section-padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <a href="#" class="footer_logo">
                        <img src="{{ asset($blogSettings['blog_logo_light_secondary']) }}" alt="{{ $blogSettings['website_name'] }}">
                    </a>

                    <div class="box_scoial_icon">
                        <div class="scoial-icon">
                            <a href="{{ $blogSettings['blog_facebook'] }}">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>

                        </div>
                    </div>

                    <div class="newsletter">
                        <h4>Sign up for our weekly newsletter</h4>

                        <div>
                            <form action="#" method="post">
                                <div class="newsletter_info"></div>
                                <input placeholder="Your Email Address" type="text" class="email">
                                <button class="btn" type="submit" name="submit">Sign Up</button>
                            </form>
                        </div>
                    </div>

                    <div class="to_top">
                        <a href="#header"></a>
                        <div class="icon-circle"></div>
                        <div id="to-top">
                            <i class="fas fa-angle-up"></i>
                        </div>
                    </div>

                    <div class="disclaimer">
                        <p>{!! $blogSettings['blog_signature'] !!}</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</footer>
