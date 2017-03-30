<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gameworld
 */

?>
<footer id="footer">
    <div class="container">
      <div id="footer-content">
        <div class="row widget-blog" id="widget-blog">
          <div class="widget-header f_title text-center">
            <h4>From our Blog</h4>
            <span>Quisque justo turpis, sodales sit amet consectetur <span>-</span></span>
            <a href="./blog.html"> GO TO BLOG</a>
          </div>
          <div class="wrap_item">
            <div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="0">
              <div class="group">
                <a href="./blog.html"><img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_340x150.png" alt=""></a>
                <h5 class="title"><a href="./blog.html" title="">Curabitur sagittis odio quis erat elementum nec dictum est consectetur</a></h5>
                <span class="line"></span>
                <p class="desc">Pellentesque ultricies ante sit amet felis mollis erat dictum mauris orci urna, accumsan vitae convallis quis mattis nec mi nunc (GameSpot) Lorem ipsum dolor sit amet, consectetur adipiscing elit vestibulum...</p>
                <span class="date">Written on Thursday , 19 December 2013 03 : 08 AM </span>
              </div>
            </div>
            <div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="300">
              <div class="group">
                <a href="./blog.html"><img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_340x150.png" alt=""></a>
                <h5 class="title"><a href="./blog.html" title="">Aliquam a mauris tellus a dapibus ipsum</a></h5>
                <span class="line"></span>
                <p class="desc">Pellentesque ultricies ante sit amet felis mollis erat dictum mauris orci urna, accumsan vitae convallis quis mattis nec mi nunc (GameSpot) Lorem ipsum dolor sit amet, consectetur adipiscing elit vestibulum...</p>
                <span class="date">Written on Thursday , 19 December 2013 03 : 08 AM </span>
              </div>
            </div>
            <div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="600">
              <div class="group">
                <a href="./blog.html"><img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_video_340x150.png" alt=""></a>
                <h5 class="title"><a href="./blog.html" title="">Donec tempor justo sit amet libero auctor quis interdum</a></h5>
                <span class="line"></span>
                <p class="desc">Pellentesque ultricies ante sit amet felis mollis erat dictum mauris orci urna, accumsan vitae convallis quis mattis nec mi nunc (GameSpot) Lorem ipsum dolor sit amet, consectetur adipiscing elit vestibulum...</p>
                <span class="date">Written on Thursday , 19 December 2013 03 : 07 AM </span>
              </div>
            </div>
          </div>
        </div>
        <div class="footer_bottom row">
          <div class="footer-content-middle clearfix">
            <div class="col-md-8">
              <div class="group wrap_linklist">
                <div class="col-md-12 widget-linklist not-animated" id="widget-linklist1" data-animate="fadeInLeft" data-delay="200">
                  <h5>Company</h5>
                  <ul class="list-unstyled list-styled">
                    <li class="list-unstyled">
                      <a href="./about-us.html">About us</a>
                    </li>
                    <li class="list-unstyled">
                      <a href="./blog.html">Blog</a>
                    </li>
                    <li class="list-unstyled">
                      <a href="./collection.html">Our partners</a>
                    </li>
                    <li class="list-unstyled">
                      <a href="./contact-us.html">Work with us</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-12 widget-linklist not-animated" id="widget-linklist2" data-animate="fadeInUp" data-delay="400">
                  <h5>Assistance</h5>
                  <ul class="list-unstyled list-styled">
                    <li>
                      <a href="./contact-us.html">Contact us</a>
                    </li>
                    <li>
                      <a href="./product.html">FAQs</a>
                    </li>
                    <li>
                      <a href="./collection.html">Shipping information</a>
                    </li>
                    <li>
                      <a href="./contact-us.html">Have a question? ask us</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div id="widget-location" class="col-md-8 not-animated" data-animate="fadeInUp" data-delay="600">
              <div class="group">
                <h5>
                  Store location
                </h5>
                <ul class="list-unstyled list-styled contact_us">
                  <li class="address">
                    <span class="address_span">1234 Fake address name <span>,</span></span>
                    <span class="address_span"> Fake city name <span>,</span></span>
                    <span class="address_span"> Country 01234 </span>
                  </li>
                  <li class="support">
                    <span>(000) 123 456 7890</span>
                    <span>/</span>
                    <a href="mailto:info@yourdomain.com">info@yourdomain.com</a>
                  </li>
                </ul>
              </div>
            </div>
            <div id="newsletter" class="col-md-8 not-animated" data-animate="fadeInRight" data-delay="800">
              <div class="group">
                <h5>
                  Sign up for our newsletter
                </h5>
                <div class="mail_action">
                  <form action="./index.html" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                    <input type="email" placeholder="" name="EMAIL" id="email-input">
                    <button class="btooltip" title="" type="submit" data-original-title="Subscribe">Subscribe</button>
                  </form>
                </div>
                <div class="footer_social_icons">
                  <div class="unpadding">
                    <ul class="list-inline social_icons animated">
                      <li class="social_title">
                        Follow
                      </li>
                      <li><a target="_blank" href="#" class="btooltip swing" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                      <li><a target="_blank" href="#" class="btooltip swing" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tumblr"><i class="fa fa-tumblr-square"></i></a></li>
                      <li><a target="_blank" href="#" class="btooltip swing" data-toggle="tooltip" data-placement="top" title="" data-original-title="Flickr"><i class="fa fa-flickr"></i></a></li>
                      <li><a target="_blank" href="#" class="btooltip swing" data-toggle="tooltip" data-placement="top" title="" data-original-title="RSS"><i class="fa fa-rss-square"></i></a></li>
                      <li><a target="_blank" href="#" class="btooltip swing" data-toggle="tooltip" data-placement="top" title="" data-original-title="Vimeo"><i class="fa fa-vimeo-square"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer_categories not-animated" data-animate="fadeInUp" data-delay="300">
            <ul class="list-inline">
              <li><h5>Categories</h5></li>
              <li>
                <a href="./collection.html">3DS</a>
                <span>|</span>
              </li>
              <li>
                <a href="./collection.html">Gears and Gadgets</a>
                <span>|</span>
              </li>
              <li>
                <a href="./collection.html">PC</a>
                <span>|</span>
              </li>
              <li>
                <a href="./collection.html">PlayStation 3</a>
                <span>|</span>
              </li>
              <li>
                <a href="./collection.html">PSP</a>
                <span>|</span>
              </li>
              <li>
                <a href="./collection.html">Wii</a>
                <span>|</span>
              </li>
              <li>
                <a href="./collection.html">XBOX 360</a>
              </li>
            </ul>
          </div>
          <div class="wrap_bot">
            <div class="footer_bot_info col-md-12">
              <div>Suspendisse convallis lacus commodo augue imperdiet tincidunt duis fermentum congue.</div>
              <div class="copyright">© 2014 <a href="./index.html">HTML Game Store Theme</a>. All Rights Reserved.<br>Designed by <a href="http://designshopify.com" title="">DesignShopify</a></div>
            </div>
            <div id="widget-payment" class="col-md-12">
              <ul id="payments" class="list-inline animated">
                <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="" data-original-title="Visa"><a href="javascript:" class="icons visa"></a></li>
                <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mastercard"><a href="javascript:" class="icons mastercard"></a></li>
                <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="" data-original-title="American Express"><a href="javascript:" class="icons amex"></a></li>
                <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="" data-original-title="Paypal"><a href="javascript:" class="icons paypal"></a></li>
                <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="" data-original-title="Moneybookers"><a href="javascript:" class="icons moneybookers"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
  <div class="modal fade" id="quick-shop-modal"></div>
  <script src="<?php echo get_template_directory_uri();?>/assets/javascripts/bootstrap.min.3x.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/javascripts/cs.global.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/javascripts/owl.carousel.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/javascripts/jquery.responsive-slider.min.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/javascripts/jquery.imagesloaded.min.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/javascripts/application.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/javascripts/cs.script.js" type="text/javascript"></script>

<?php wp_footer(); ?>
</body>
</html>