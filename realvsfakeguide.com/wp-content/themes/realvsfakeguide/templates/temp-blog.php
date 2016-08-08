<?php get_header(); ?>	
        <div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
        <div class="container-fuild">
            <div class="wrap_content">
    		
   		<div class="main_content">
   			<div class="wrap_content">
   				<div class="left_content">   					
          <div class="box-post-content">  
					<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>											 							    					   					
   					<div class="fashion_post_content">
              <div class="post_thumbnail" style="background:url(<?php the_post_thumbnail_url(); ?>)center center no-repeat;background-size:cover;">               
                <a href="<?php the_permalink();?>"><?php //the_post_thumbnail();?></a>
              </div>
              <div class="fashion_text">
                <h4><a href="<?php the_permalink();?>"><?php the_title_max_charlength(50); ?></a></h4>
                <div class="guild_item_author">
                  <?php
                    $url = get_permalink();
                                  $socialCounts = new socialNetworkShareCount(array(
                                      'url' => $url,
                                      'facebook' => true,/*
                                      'twitter' => true,*/
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
                <p><?php the_excerpt_max_charlength(200);  ?></p>                                                     
                <div class="guild_item_action">               
                  <a href="<?php the_permalink();?>" class="btn_readmore_guild_item">read more</a>
                  <?php echo ButtonShare();?>               
                </div>
              </div>
            </div>
  					<?php endwhile; ?>
  					<?php endif;?>	
            </div>
  					<!-- Phan trang -->
  					<div id="pbd-alp-load-posts">                                  
              <p>Load<a href="#" id="load_more" class="btn_load_more_post" cat ="<?php echo get_cat_ID( single_cat_title("",false) );?>" max-page= "<?php echo $wp_query->max_num_pages;?>"><i class="fa fa-chevron-down" ></i></a>More</p>
            </div>
   					
   				</div>
   				<div id="secondary" class="right_content" role="complementary">
	            	<div class="search">
	    				<?php get_search_form(); ?>	
	    				
	    			</div>
                    <div class="fashion_news_recent_post">
	    				<h3>Recent post</h3>
	    				<div class="resent_post_item1">	    					
                            <?php query_posts('showposts=6'); ?>
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
   		</div><!-- End _real_and_face-->
    </div>

<?php get_footer();?>
