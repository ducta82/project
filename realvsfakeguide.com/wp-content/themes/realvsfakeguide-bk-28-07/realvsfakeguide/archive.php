<?php get_header(); ?>	
        <div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
        <div class="container-fuild">
            <div class="wrap_content">
            <div class="main_content">
   			<div class="wrap_content">
   				<div class="left_content">   					   					
											
					<?php while ( have_posts() ) : the_post(); ?>											 							    					   					
   					<div class="fashion_post_content">
   						<div class="post_thumbnail">	   						
	   						<a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
   						</div>
   						<div class="fashion_text">
   							<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
   							<div class="guild_item_author">
                               <a>by <?php the_author(); ?></a>
                               <a><?php the_time('F jS, Y') ?></a>
                               <a><?php the_category(', ') ?>.</a>
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
  					<!-- Phan trang -->
  					<div class="page_navi">
  					<?php if(paginate_links()!='') {?>
						<div class="quatrang">
							<?php
							global $wp_query;
							$big = 999999999;
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'prev_text'    => __('<= Prev'),
								'next_text'    => __('Next =>'),
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages
								) );
						    ?>
						</div>
					<?php } ?>	
					</div>
   					<div id="pbd-alp-load-posts">     						                  
   						<p>Load<a href="#" id="load_more" class="btn_load_more_post"><i class="fa fa-chevron-down" ></i></a>More</p>
   					</div>
   				</div>
   				<div id="secondary" class="right_content" role="complementary">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
					
					<div class="btn_right_sidebar">				   					
	    				<a href="#" class="btn_become_a_contributor">Become a Contributor</a>
	    			</div>
   				</div><!-- #right-sidebar -->
   			</div>
   		</div><!-- End about_real_and_face-->
   		  		
    </div>

<?php get_footer();?>
