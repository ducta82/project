<?php
/**
 * Template Name: Temp Home
 */
get_header();?>
<?php 
  $banner_text = get_field('banner_text');
  $banner_title = get_field('banner_title');
  global $wp_query;
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
          <?php 
            $arg = array(
                'post_type'=>'post',
                'posts_per_page'=>-1
              );
            $the_query = get_posts($arg);
          ?>  
          <?php if($the_query):?>             
            <div class="slider1">
          <?php                 
            foreach ($the_query as $value) {
              $url = wp_get_attachment_url( get_post_thumbnail_id($value->ID) ) ? wp_get_attachment_url( get_post_thumbnail_id($value->ID) ) : get_bloginfo('template_url').'/images/link-2.jpg';
              ?>
                <div class="slide">
                  <a href="<?php echo get_permalink($value->ID); ?>">
                    <img src="<?php echo $url; ?>" >
                    <span class="bx-caption"><span><?php echo $value->post_title; ?></span></span>
                  </a>      
                </div>   
              <?php } ?>              
            </div>
            <?php endif;?>  
          </div>             
        </div><!-- End home_slider -->
      <div class="home_guild">
         <div class="wrap_content">       
          <div class="guild_title">
            <h2>real and face guild</h2>
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
                  if(have_posts()){
                    while ( have_posts()) {
                      the_post();
                      ?>
                        <div class="guild_item_1"> 
                           <a href="<?php the_permalink(); ?>" class="thubmail-link" style="background:url(<?php the_post_thumbnail_url();?>) center center no-repeat; background-size:cover;" title="<?php the_title_attribute(); ?>">
                              <?php //the_post_thumbnail('custom-size',array('class'=>'thumb_guild_item_1')); ?>
                          </a>
                          <div class="guild_item_author">
                            <?php
                                $url = get_permalink();
                                $socialCounts = new socialNetworkShareCount(array(
                                    'url' => $url,
                                    'facebook' => true,
                                    /*'twitter' => true,*/
                                    'pinterest' => true,
                                    'linkedin' => true,
                                    'google' => true
                                ));
                                $total = json_decode($socialCounts->getShareCounts());   
                            ?>
                             <a>by <?php the_author(); ?></a>
                             <a><?php echo $value->name?></a>
                             <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                             <a><?php echo $total->total.' share';?></a>
                          </div>
                          <div class="guild_item_1_content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title_max_charlength(50);?></a></h3>
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
          <h2>Lastest news</h2>
          <img alt="" src="<?php echo get_template_directory_uri();?>/images/Rectangle5.png">
        </div>
        <div class="lastest_news_wrap"> 
        <?php 
          $arg = array(
            'post_type'=>'post',
            'posts_per_page'=> 4
            );
          $wp_query = new WP_Query( $arg );
        if(have_posts()) : $i = 1; while (have_posts() && $i <= 4) : the_post();?>  
                            
                <div class="lastest_item">
                    <div class="item relative">
                        <div class="thumbnail">
                            <a href="<?php the_permalink();?>">
                            <span class="thumb" style="background: url('<?php the_post_thumbnail_url();?>') center center no-repeat; background-size:cover;"></span>
                            </a>
                        </div>
                        <div class="content">
                            <div class="_content">
                                <div class="cell">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                    <div class="line"></div>
                                    <p class="date">
                                      <?php the_time('jS F, Y'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>
              <?php $i++; endwhile;?>
              <?php endif;?>                                                                                        
            </div>
      </div>
      
      <div class="tips_and_tricks">
        <div class="tips_and_tricks_title">
          <h2>tips and tricks</h2>
          <img src="<?php echo get_template_directory_uri();?>/images/Rectangle5.png">
        </div>
        <div class="wrap_content">
          <div class="tips_and_tricks_content">
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
            <span>SUBSCRIBE TO NEW LETTERS</span>
           <?php es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>
        </div>
        </div>
      </div>
    </div>
<?php get_footer();?>