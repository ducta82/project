<?php get_header(); ?>	
        <div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
        <div class="container-fuild">
            <div class="wrap_content">
    		
   		<div class="main_content">
   			<div class="wrap_content">
   				<div class="left_content">   					   					
											
					<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>											 							    					   					
   					<div class="fashion_post_content">
   						<div class="post_thumbnail">	   						
	   						<a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
   						</div>
   						<div class="fashion_text">
   							<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
   							<div class="guild_item_author">
                               <a>by <?php the_author(); ?></a>
                               <a><?php the_time('F jS, Y') ?></a>
                               <a><?php the_category(', ') ?></a>
                               <a><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></a>
                               
                             </div>			
		   					<p><?php the_excerpt(); ?></p>   					   											 							 	
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
  					<?php endif;?>	
  					<!-- Phan trang -->
  					<div class="pagination_page">
						<?php wplift_pagination(); ?>
					</div>
   					
   				</div>
   				<div id="secondary" class="right_content" role="complementary">
            	<div class="search">
	    				<div class="search-form-head">
                 <form action="<?php echo home_url( '/' ); ?>" method="get" class="search-form">
                    <div class="input-group seach-header">
                        <input name="s" value="<?php the_search_query(); ?>" class="search-field" type="search" placeholder="search..." class="form-seach-header">
                        <input type="hidden" name="post_type" value="post" />
                        <input type="hidden" name="post_type" value="page" />
                    </div>
                  </form>
              </div>      
	    			</div>
                    <div class="fashion_news_recent_post">
	    				<h3>resent post</h3>
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
