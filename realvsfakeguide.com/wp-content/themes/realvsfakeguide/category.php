<?php 
/**
* A Simple Category Template
*/

get_header();?>
<div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
 <!-- -  <div id="myModal" class="linhnguyen-modal">			
			<div class="bg_top">
				<p>Don't miss out</p>
			</div>
			<img class="icon-popup" src="images/icon-popup.png">
			<p>Write for RealvsFakeGuide and get paid</p>
			<div class="form_sign_up_popup">
				<input type="text" placeholder="Hey, What your email?">
				<img src="images/icon-mail-popup.png">
				<a href="#" class="btn_sign_up_popup">Sign me up</a>
			</div>			
		<a class="close-linhnguyen-modal">X</a>
	</div> 
 --> 	
<div class="container-fuild">
    	<?php if (is_category('fashion')) : ?>
				<div class="fashion_news_banner">           
		       		<div class="fashion_news_text_banner">
		       			<h1>Fashion </h1>    			
		       		</div>
		       		<div class="subcribe">
		   					<div class="wrap_content">
			   					<span>SUBSCRIBE TO NEW LETTERS</span> 
			   					<input type="text" placeholder="Enter your email">
			   					<a href="#" class="btn_subscribe">Subscribe</a>
		   					</div>
		   			</div>                      
		   		</div><!-- End home_banner-->
			<?php elseif (is_category('handbags')) : ?>
				<div class="fashion_news_banner">           
		       		<div class="fashion_news_text_banner">
		       			<h1>handbags</h1>    			
		       		</div>
		       		<div class="subcribe">
		   					<div class="wrap_content">
			   					<span>SUBSCRIBE TO NEW LETTERS</span> 
			   					<input type="text" placeholder="Enter your email">
			   					<a href="#" class="btn_subscribe">Subscribe</a>
		   					</div>
		   			</div>                      
		   		</div><!-- End home_banner-->
		   	<?php elseif (is_category('sunglasses')) : ?>
				<div class="fashion_news_banner">           
		       		<div class="fashion_news_text_banner">
		       			<h1>sunglasses</h1>    			
		       		</div>
		       		<div class="subcribe">
		   					<div class="wrap_content">
			   					<span>SUBSCRIBE TO NEW LETTERS</span> 
			   					<input type="text" placeholder="Enter your email">
			   					<a href="#" class="btn_subscribe">Subscribe</a>
		   					</div>
		   			</div>                      
		   		</div><!-- End home_banner-->	
			<?php else : (is_category($cat)) ?>
			<div class="fashion_news_banner">           
		       		<div class="fashion_news_text_banner">
		       			<h1><?php echo get_the_category_by_ID($cat); ?></h1>    			
		       		</div>
		       		<div class="subcribe">					
			 			<div class="wrap_content">
			 				
				  			<span>SUBSCRIBE TO NEW LETTERS</span>
				  			<?php es_subbox($desc = "", $group = "" ); ?> 
				  	<!-- <input type="text" placeholder="Enter your email"> 		
				  			<a href="#" class="btn_subscribe">Subscribe</a>  -->
			 			</div>
   			</div>                      
		   		</div><!-- End home_banner-->
			<?php endif; ?>
   		
   		
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
	    				<?php get_search_form(); ?>	
	    				
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
   		</div><!-- End _real_and_face-->
   		  		
    </div>

<?php get_footer();?>
