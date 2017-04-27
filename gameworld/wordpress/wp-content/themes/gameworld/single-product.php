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
                      $id = $post->ID;
                      $cats = get_the_terms( $id, 'cat-product' );
                      if(isset($cats)){
                      foreach ($cats as $cat) {
                        $cat_ids[] .= $cat->term_id;
                      }}
                    the_content();
                  endwhile; // End of the loop.
                  wp_reset_query();
                ?>
              </div>
            </div>
            
            <section class="rel-container clearfix">
              <div class="sb-title">
                <h4 class="content-title">Related Products</h4>
              </div>
              <div id="prod-related-wrapper">
                <div id="prod-related" class="clearfix">
                <?php
                    $args = array(
                            'post__not_in' => array($id),
                            'posts_per_page'=>-1,
                            'post_type' => 'product',
                            'orderby' => 'rand',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'cat-product',
                                    'field'    => 'term_id',
                                    'terms'    => $cat_ids,
                                ),
                            ),
                            ); 
                    $my_query = new WP_Query($args);
                    global $is_related;
                      $is_related = 0;
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post();
                      $is_related = 10;
                      get_template_part( 'template-parts/content', 'archiveproduct' );
                    endwhile;
                      $is_related = 0;
                    }
                    wp_reset_postdata();
                  ?>
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
