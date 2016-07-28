<?php
/**
 * Template Name: Temp Home
 */
get_header();?>
<?php 
  $banner_text = get_field('banner_text');
  $banner_title = get_field('banner_title');
  
?>
<div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
<!-- 
  <div id="myModal" class="linhnguyen-modal">     
      <div class="bg_top">
        <p>Don't miss out</p>
      </div>
      <img class="icon-popup" src="<?php echo get_template_directory_uri();?>/images/icon-popup.png">
      <p>Write for RealvsFakeGuide and get paid</p>
      <div class="form_sign_up_popup">
        <input type="text" placeholder="Hey, What your email?">
        <img src="<?php echo get_template_directory_uri();?>/images/icon-mail-popup.png">
        <a href="#" class="btn_sign_up_popup">Sign me up</a>
      </div>      
    <a class="close-linhnguyen-modal">X</a>
</div> 
 --> 
  <div class="container-fuild">
      <div class="home_banner">
        <div class="wrap-text">
              <div class="wrap_content">
              <div class="text_banner">
                <h3><?php echo $banner_title ?></h3>
              <p><?php echo $banner_text ?></p>
              </div>
              <div class="clear"></div>
              </div>
            </div>
      </div><!-- End home_banner-->
      
      <div class="home_slider">         
            <div class="wrap_content">  
            <?php if(have_rows('slider_post')):?>             
              <div class="slider1">
                  <?php                 
                while (have_rows('slider_post')):the_row('slider_post');
                $image = get_sub_field('image');
                $title = get_sub_field('text');
                $link = get_sub_field('link');            
            ?>            
                  <div class="slide">
                    <a href="<?php echo $link ?>">
                      <img src="<?php echo $image['url'] ?>" >
                      <span class="bx-caption"><span><?php echo $title?></span></span>
                    </a>      
                  </div>                                    
               
                  <?php endwhile; ?>
                  
              </div>
              <?php endif;?>  
            </div>             
            </div><!-- End home_slider -->
      
      <div class="home_guild">
         <div class="wrap_content">       
          <div class="guild_title">
            <h2><a href="http://realvsfakeguide.onegovn.com/category/fashion/">real and face guild</a></h2>
            <img alt="" src="<?php echo get_template_directory_uri();?>/images/Rectangle5.png">
          </div>
          <div class="guild_item_wrap">                                     
            <?php 
            $categories = get_categories( array(
                'orderby' => 'ID',
                'include'  =>array( 2,3,4 )
            ) );
              
            foreach ($categories as $value) {
              ?>
                <div class="guild_item">          
                  <div class="guild_item_btn1">
                    <a href="<?php echo get_category_link($value->term_id); ?>" class="btn_guild_item"><?php echo $value->name;?></a>
                  </div>  
                  <?php

                  global $wp_query;
                    $args = array(
                      'post_type' => 'post',
                      'posts_per_page'=>2,
                      'orderby'=> 'rand',
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'category',
                              'field'    => 'slug',
                              'terms'    => $value->slug,
                          ),
                      ),
                  );
                  $wp_query = new WP_Query( $args );
                  if($wp_query->have_posts()){
                    while ( $wp_query->have_posts()) {
                      $wp_query->the_post();
                      ?>
                        <div class="guild_item_1"> 
                           <a href="<?php the_permalink(); ?>" class="thubmail-link" style="background:url(<?php the_post_thumbnail_url();?>) center center no-repeat; background-size:cover;" title="<?php the_title_attribute(); ?>">
                              <?php the_post_thumbnail('post-thumbnail',array('class'=>'thumb_guild_item_1')); ?>
                          </a>
                          <div class="guild_item_author">
                            <?php
                               /* $url = get_permalink();
                                $socialCounts = new socialNetworkShareCount(array(
                                    'url' => $url,
                                    'facebook' => true,
                                    'twitter' => true,
                                    'pinterest' => true,
                                    'linkedin' => true,
                                    'google' => true
                                ));
                                $total = json_decode($socialCounts->getShareCounts());*/   
                            ?>
                             <a>by <?php the_author(); ?></a>
                             <a><?php echo $value->name?></a>
                             <a><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></a>
                             <a><?php echo /*$total->total.*/'0 share';?></a>
                          </div>
                          <div class="guild_item_1_content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <img alt="" src="<?php echo get_template_directory_uri();?>/images/Rectangle5.png">
                            <p><?php the_excerpt_max_charlength(187); ?></p>   
                          </div>  
                          <div class="guild_item_action">
                            <a href="<?php echo get_sub_field('guild_item_link2'); ?>" class="btn_readmore_guild_item">read more</a>
                            <?php echo ButtonShare();?>
                          </div>                       
                        </div><!--end guild_item_1--> 
                    <?php
                    }
                  }
                  ?>
                    </div><!--end guild_item--> 
                  <?php
               }
            ?>                                                            
          </div><!--end guild_item_wrap-->
        </div>  
      </div><!-- End home_guild -->
      
      <div class="bar_write_for_us">
        <div class="wrap_content">
          <div class="bar_write_for_us_text">
            <span><?php echo get_field('bar_write_for_us_title',6);?></span>
            </br></br><p><?php echo get_field('bar_write_for_us_text',6);?></p>
          </div>
          <a href="<?php echo get_field('bar_write_for_us_link',6);?>" class="btn_write_for_us">Write for us</a>
        </div>
      </div>
      
      <div class="lastest_news">
        <div class="lastest_news_title">
          <h2><a href="http://realvsfakeguide.onegovn.com/new/">Lastest news</a></h2>
          <img alt="" src="<?php echo get_template_directory_uri();?>/images/Rectangle5.png">
        </div>
        <div class="lastest_news_wrap"> 
        <?php if(have_rows('lastest_news')) : while (have_rows('lastest_news')) : the_row('lastest_news')?>  
                            
                <div class="lastest_item">
                    <div class="item relative">
                        <div class="thumbnail">
                            <a href="<?php echo get_sub_field('lastest_news_item_link');?>">
                            <span class="thumb" style="background-image: url('<?php echo get_sub_field('lastest_news_item_thumb');?> ');"></span>
                            </a>
                        </div>
                        <div class="content">
                            <div class="_content">
                                <div class="cell">
                                    <a href="<?php echo get_sub_field('lastest_news_item_link');?>"><?php echo get_sub_field('lastest_news_item_title');?></a>
                                    <div class="line"></div>
                                    <p class="date">
                                      <?php echo the_time('F jS, Y'); ?>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>
              <?php endwhile;?>
              <?php endif;?>                                                                                        
            </div>
      </div>
      
      <div class="tips_and_tricks">
        <div class="tips_and_tricks_title">
          <h2><a href="http://realvsfakeguide.onegovn.com/tip-and-trick/">tips and tricks</a></h2>
          <img src="<?php echo get_template_directory_uri();?>/images/Rectangle5.png">
        </div>
        <div class="tips_and_tricks_content">
          <div class="wrap_content">
          
            <div class="tips_and_tricks_item">
              <img src="<?php echo get_template_directory_uri();?>/images/verify.png">
              <p><a href="http://realvsfakeguide.onegovn.com/tip-and-trick/">VERIFY WITH THE SOURCE</a></p>
            </div>
            <div class="tips_and_tricks_item">
              <img src="<?php echo get_template_directory_uri();?>/images/request.png">
              <p><a href="http://realvsfakeguide.onegovn.com/tip-and-trick/">REQUEST FOR ACTUAL PHOTOS</a></p>
            </div>
            <div class="tips_and_tricks_item">
              <img src="<?php echo get_template_directory_uri();?>/images/price.png">
              <p><a href="http://realvsfakeguide.onegovn.com/tip-and-trick/">PRICE COMPARISON</a></p>
            </div>
            <div class="tips_and_tricks_item">
              <img src="<?php echo get_template_directory_uri();?>/images/barcode.png">
              <p><a href="http://realvsfakeguide.onegovn.com/tip-and-trick/">BAR CODES & TAG</a></p>
            </div>
            <div class="tips_and_tricks_item">
              <img src="<?php echo get_template_directory_uri();?>/images/location.png">
              <p><a href="http://realvsfakeguide.onegovn.com/tip-and-trick/">THE SELLER'S LOCATION</a></p>
            </div>
            <div class="tips_and_tricks_item">
              <img src="<?php echo get_template_directory_uri();?>/images/feedback.png">
              <p><a href="http://realvsfakeguide.onegovn.com/tip-and-trick/">FEEDBACK & FORUM</a></p>
            </div>
          </div>          
        </div>
        <div class="subcribe">          
        <div class="wrap_content">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <span>SUBSCRIBE TO NEW LETTERS</span>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
           <?php es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>
          </div>    
        </div>
        </div>
      </div>
    </div>
<?php get_footer();?>