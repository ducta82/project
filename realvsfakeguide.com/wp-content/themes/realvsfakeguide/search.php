<?php get_header(); ?>  



        <div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
        <div class="container-fuild">
            <div class="wrap_content">
            <div class="main_content">
        <div class="wrap_content">
          <div class="left_content">                        
          <?php if ( have_posts() ) : ?>            
          <?php while ( have_posts() ) : the_post(); ?>                                                             
            <div class="fashion_post_content">
              <div class="post_thumbnail">                
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
              </div>
              <div class="fashion_text">
                <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                <div class="guild_item_author">
                             <?php
                    $url = get_permalink();
                                  $socialCounts = new socialNetworkShareCount(array(
                                      'url' => $url,
                                      'facebook' => true,
                                      'twitter' => true,
                                      'pinterest' => true,
                                      'linkedin' => true,
                                      'google' => true
                                  ));
                                  $total = json_decode($socialCounts->getShareCounts());
                  ?>
                               <a>by <?php the_author(); ?></a>
                               <?php the_category(', '); ?>
                               <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                               <a><?php echo $total->total.' share';?></a>
                             </div>     
                <p><?php the_excerpt_max_charlength(300);  ?></p>                                             
                <div class="guild_item_action">               
                  <a href="<?php the_permalink();?>" class="btn_readmore_guild_item">read more</a>
                  <div class="guild_item_action_social">
                    <p>
                    <span>Share:</span>
                      <a href="<?php echo get_field('share_face'); ?>"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-face.png"></a>
                      <a href="<?php echo get_field('share_twitter'); ?>"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-twi.png"></a>
                      <a href="<?php echo get_field('share_googleplus'); ?>"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-goo.png"></a>
                      <a href="<?php echo get_field('share_pinterest'); ?>"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-pri.png"></a>
                    </p>  
                  </div>                
                </div>
              </div>
            </div>
            <?php endwhile; ?>  
          <?php else:?>
            <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

              <p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'procfo' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

            <?php elseif ( is_search() ) : ?>

              <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'procfo' ); ?></p>
              <?php else : ?>

              <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'procfo' ); ?></p>
              <?php endif; ?>
          <?php endif;?>
            <!-- Phan trang -->
            <div class="pagination_page">
            <?php wplift_pagination(); ?>
          </div>
            <div id="pbd-alp-load-posts">                                   
              <p>Load<a href="#" id="load_more" class="btn_load_more_post"><i class="fa fa-chevron-down" ></i></a>More</p>
            </div>
          </div>
          <div id="secondary" class="right_content" role="complementary">
                <div class="search">
             <div class="search">
                <div class="search-form-head">
                   <form action="<?php echo home_url( '/' ); ?>" method="get" class="search-form">
                            <div class="input-group seach-header">
                                <input name="s" value="<?php the_search_query(); ?>" class="search-field" type="search" placeholder="Search" class="form-seach-header">
                    <input type="hidden" name="post_type" value="post" />
                    <input type="hidden" name="post_type" value="page" />
                    <button type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                </div>    
              </div>
              
            </div>
                    <div class="fashion_news_recent_post">
              <h3>resent post</h3>
              <div class="resent_post_item1">               
                            <?php query_posts('showposts=5'); ?>
                            <ul>
                            <?php while (have_posts()) : the_post(); ?>
                                <li>
                                      <?php the_post_thumbnail(); ?>
                                    <span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
                                </li>
                            <?php endwhile;?>
                            </ul>
              </div>
              
            </div>   
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>              
            <div class="btn_right_sidebar">                   
              <a href="#" class="btn_become_a_contributor">Become a Contributor</a>
            </div>
              </div><!-- #right-sidebar -->
        </div>
      </div><!-- End about_real_and_face-->
            
    </div>
</div>
<?php get_footer();?>
