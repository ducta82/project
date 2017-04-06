<?php
/**
 * The template for displaying all single product
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gameworld
 */
    
get_header(); ?>

	<div id="content-wrapper-parent">
    <div id="content-wrapper">
      <div id="content" class="container clearfix">
        <div class="group_breadcrumb">
          <div id="breadcrumb" class="row breadcrumb">
            <div class="col-md-24">
              <a href="./index.html" class="homepage-link" title="Back to the frontpage">Home</a>
              <i class="angle-right">&gt;</i>
              <a href="./collection.html" title="">XBOX 360</a>
              <i class="angle-right">&gt;</i>
              <span class="page-title">Curabitur mattis tellus rutrum enim facilisis</span>
            </div>
          </div>
        </div>
        <section class="row content">
          <?php get_sidebar();?>
          <!--col-main-->
          <div id="col-main" class="product-page col-content col-md-19">
            <div itemscope="" itemtype="http://schema.org/Product">
              <meta itemprop="url" content="/products/curabitur-mattis-tellus-rutrum-enim-facilisis">
              <div id="product" class="content row clearfix">
              <?php
                  while ( have_posts() ) : the_post();

                      the_content();

                  endwhile; // End of the loop.
                ?>
                
              </div>
            </div>
            
            <section class="rel-container clearfix">
              <div class="sb-title">
                <h4 class="content-title">Related Products</h4>
              </div>
              <div id="prod-related-wrapper">
                <div id="prod-related" class="clearfix">
                  <div class="element not-animated" data-animate="bounceIn" data-delay="0">
                    <form action="/cart/add" method="post" enctype="multipart/form-data">
                      <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                          <a href="./product.html" class="hoverBorder">
                            <span class="hoverBorderWrapper">
                              <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_152x216.png" class="image-fly img-responsive" alt="Cras in nunc non ipsum duo  cursus ultrices">
                            </span>
                            <div class="product-ajax-cart hidden-phone">
                              <span class="overlay_mask"></span>
                              <div data-href="./ajax/_product-qs.html" data-target="#quick-shop-modal" class="btn btn-3 quick_shop" data-toggle="modal">
                                Quickshop
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                          <div class="group_info">
                            <a class="title-5" href="./product.html">Cras in nunc non ipsum duo cursus ultrices</a>
                            <br>
                            <a class="col-title" href="./collection.html">
                              XBOX 360
                            </a>
                            <p class="hidden-list">
                              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius...
                            </p>
                            <div class="product-price">
                              <span class="price">
                                <span class="money">€59.00</span>
                              </span>
                            </div>
                            <div class="hide clearfix">
                              <select name="id">
                                <option selected="selected" value="455695565">martial - €59.00</option>
                                <option value="502624265">animation - €65.00</option>
                              </select>
                            </div>
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn add-to-cart" data-parent=".parent-fly" type="button" name="add">Add to Cart</button>
                          </div>
                        </li>
                      </ul>
                    </form>
                  </div>
                  <div class="element not-animated" data-animate="bounceIn" data-delay="400">
                    <form action="/cart/add" method="post" enctype="multipart/form-data">
                      <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                          <a href="./product.html" class="hoverBorder">
                            <span class="hoverBorderWrapper">
                              <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_152x216.png" class="image-fly img-responsive" alt="Curabitur sollicitudin">
                            </span>
                            <div class="product-ajax-cart hidden-phone">
                              <span class="overlay_mask"></span>
                              <div data-href="./ajax/_product-qs.html" data-target="#quick-shop-modal" class="btn btn-3 quick_shop" data-toggle="modal">
                                Quickshop
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                          <div class="group_info">
                            <a class="title-5" href="./product.html">Curabitur sollicitudin</a>
                            <br>
                            <a class="col-title" href="./collection.html">
                              XBOX 360
                            </a>
                            <p class="hidden-list">
                              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius...
                            </p>
                            <div class="product-price">
                              <span class="price">
                                <span class="money">€59.00</span>
                              </span>
                            </div>
                            <div class="hide clearfix">
                              <select name="id">
                                <option selected="selected" value="455695597">animation - €59.00</option>
                              </select>
                            </div>
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn add-to-cart" data-parent=".parent-fly" type="button" name="add">Add to Cart</button>
                          </div>
                        </li>
                      </ul>
                    </form>
                  </div>
                  <div class="element not-animated" data-animate="bounceIn" data-delay="600">
                    <form action="/cart/add" method="post" enctype="multipart/form-data">
                      <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                          <a href="./product.html" class="hoverBorder">
                            <span class="hoverBorderWrapper">
                              <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_152x216.png" class="image-fly img-responsive" alt="Nam at lectus eget mi vista  hendrerit tincidunt">
                            </span>
                            <div class="product-ajax-cart hidden-phone">
                              <span class="overlay_mask"></span>
                              <div data-href="./ajax/_product-qs.html" data-target="#quick-shop-modal" class="btn btn-3 quick_shop" data-toggle="modal">
                                Quickshop
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                          <div class="group_info">
                            <a class="title-5" href="./product.html">Nam at lectus eget mi vista hendrerit tincidunt</a>
                            <br>
                            <a class="col-title" href="./collection.html">
                              XBOX 360
                            </a>
                            <p class="hidden-list">
                              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius...
                            </p>
                            <div class="product-price">
                              <span class="price">
                                <span class="money">€59.00</span>
                              </span>
                            </div>
                            <div class="hide clearfix">
                              <select name="id">
                                <option selected="selected" value="455695573">action - €59.00</option>
                              </select>
                            </div>
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn add-to-cart" data-parent=".parent-fly" type="button" name="add">Add to Cart</button>
                          </div>
                        </li>
                      </ul>
                    </form>
                  </div>
                  <div class="element not-animated" data-animate="bounceIn" data-delay="800">
                    <form action="/cart/add" method="post" enctype="multipart/form-data">
                      <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                          <a href="./product.html" class="hoverBorder">
                            <span class="hoverBorderWrapper">
                              <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_152x216.png" class="image-fly img-responsive" alt="Pellentesque habitant morbi  tristique senectus">
                            </span>
                            <div class="product-ajax-cart hidden-phone">
                              <span class="overlay_mask"></span>
                              <div data-href="./ajax/_product-qs.html" data-target="#quick-shop-modal" class="btn btn-3 quick_shop" data-toggle="modal">
                                Quickshop
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                          <div class="group_info">
                            <a class="title-5" href="./product.html">Pellentesque habitant morbi tristique senectus</a>
                            <br>
                            <a class="col-title" href="./collection.html">
                              XBOX 360
                            </a>
                            <p class="hidden-list">
                              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius...
                            </p>
                            <div class="product-price">
                              <span class="price">
                                <span class="money">€59.00</span>
                              </span>
                            </div>
                            <div class="hide clearfix">
                              <select name="id">
                                <option selected="selected" value="455695585">action - €59.00</option>
                                <option value="502628309">horror - €65.00</option>
                              </select>
                            </div>
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn add-to-cart" data-parent=".parent-fly" type="button" name="add">Add to Cart</button>
                          </div>
                        </li>
                      </ul>
                    </form>
                  </div>
                  <div class="element not-animated" data-animate="bounceIn" data-delay="1000">
                    <form action="/cart/add" method="post" enctype="multipart/form-data">
                      <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                          <a href="./product.html" class="hoverBorder">
                            <span class="hoverBorderWrapper">
                              <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_152x216.png" class="image-fly img-responsive" alt="Suspendisse sed libero consequat">
                            </span>
                            <div class="product-ajax-cart hidden-phone">
                              <span class="overlay_mask"></span>
                              <div data-href="./ajax/_product-qs.html" data-target="#quick-shop-modal" class="btn btn-3 quick_shop" data-toggle="modal">
                                Quickshop
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                          <div class="group_info">
                            <a class="title-5" href="./product.html">Suspendisse sed libero consequat</a>
                            <br>
                            <a class="col-title" href="/collection.html">
                              XBOX 360
                            </a>
                            <p class="hidden-list">
                              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius...
                            </p>
                            <div class="product-price">
                              <span class="price">
                                <span class="money">€59.00</span>
                              </span>
                            </div>
                            <div class="hide clearfix">
                              <select name="id">
                                <option selected="selected" value="455709309">animation - €59.00</option>
                              </select>
                            </div>
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn add-to-cart" data-parent=".parent-fly" type="button" name="add">Add to Cart</button>
                          </div>
                        </li>
                      </ul>
                    </form>
                  </div>
                  <div class="element not-animated" data-animate="bounceIn" data-delay="1200">
                    <form action="/cart/add" method="post" enctype="multipart/form-data">
                      <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                          <a href="./product.html" class="hoverBorder">
                            <span class="hoverBorderWrapper">
                              <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_152x216.png" class="image-fly img-responsive" alt="Suspendisse sed libero consequat">
                            </span>
                            <div class="product-ajax-cart hidden-phone">
                              <span class="overlay_mask"></span>
                              <div data-href="./ajax/_product-qs.html" data-target="#quick-shop-modal" class="btn btn-3 quick_shop" data-toggle="modal">
                                Quickshop
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                          <div class="group_info">
                            <a class="title-5" href="./product.html">Suspendisse sed libero consequat</a>
                            <br>
                            <a class="col-title" href="./collection.html">
                              XBOX 360
                            </a>
                            <p class="hidden-list">
                              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius...
                            </p>
                            <div class="product-price">
                              <span class="price">
                                <span class="money">€59.00</span>
                              </span>
                            </div>
                            <div class="hide clearfix">
                              <select name="id">
                                <option selected="selected" value="455709193">martial - €59.00</option>
                                <option value="502629429">action - €69.00</option>
                              </select>
                            </div>
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn add-to-cart" data-parent=".parent-fly" type="button" name="add">Add to Cart</button>
                          </div>
                        </li>
                      </ul>
                    </form>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <!--end-col-main-->
        </section>
      </div>
    </div>
  </div>
  
  <div id="bottom">
    <div class="container">
      <div id="bottom-content" class="row">
        <div class="clearfix">
          <div id="widget-partners">
            <div class="widget-wrapper text-center">
              <div id="partners-container" class="clearfix">
                <div id="partners" class="clearfix">
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="150">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="300">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="450">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="600">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="750">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="900">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="1050">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="1200">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="1350">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                  <div class="logo not-animated text-center" data-animate="bounceIn" data-delay="1500">
                    <a class="animated" href="./collection.html">
                      <img class="pulse" src="<?php echo get_template_directory_uri();?>/screen/demos/demo_brand.png" alt="">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  
<?php
//get_sidebar();
get_footer();
