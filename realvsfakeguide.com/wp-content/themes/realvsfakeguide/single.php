<?php get_header(); ?>	
        <div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
        <div class="container-fuild">
        	<?php
       	$categories = get_the_category( $post->ID );
       	$cat_id = $categories[0]->term_id; 
		$imgcat = get_field( "image_category",'category_'.$cat_id);
		?>	
			<div class="image_category" style="background:url('<?php echo $imgcat;?>') center center no-repeat;background-size:cover;">           
	       		<div class="fashion_news_text_banner">
	       			<h1><?php echo $categories[0]->cat_name; ?></h1>    			
	       		</div>
	       		<div class="subcribe">
	   					<div class="wrap_content">
		   					<span>SUBSCRIBE TO NEW LETTERS</span> 
	       					<?php es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>
	   					</div>
	   			</div>                      
	   		</div><!-- End home_banner-->
            <div class="wrap_content">
            <div class="main_content">
	            <div class="left_content">
	            <?php if(have_posts()) : while(have_posts()) : the_post();?>
	    			<div class="post_content_view">
   						<?php the_post_thumbnail(); ?>
   						<div class="text_full">
   							<h1 class="title-post"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
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
                               <a><?php the_time('F j, Y'); ?></a>
                               <?php the_category(', '); ?>
                               <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                               <a><?php echo $total->total.' share';?></a>
                             </div>				
		   					
		   					<?php the_content();?>
		   					<div class="guild_item_action">		   						
		   						<?php echo ButtonShare();?>						
		   					</div>		   							   					  					
   						</div>
   					</div>
   					<div class="post_comments_view">
		   					<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>									   						
		   			</div>		 
	            </div>
	            <?php endwhile; ?>
	            <?php endif; ?>
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
                            <?php query_posts('showposts=6'); ?>
                            <ul>
                            <?php while (have_posts()) : the_post(); ?>
                                <li>
                                    	<?php the_post_thumbnail('thumbnail'); ?>
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
        </div>
	</div>

<?php get_footer(); ?>
