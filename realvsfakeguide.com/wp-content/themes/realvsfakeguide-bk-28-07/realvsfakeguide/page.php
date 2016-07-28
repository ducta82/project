<?php get_header(); ?>	
        <div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
        <div class="container-fuild">
        	<div class="page_banner" style="background: url(<?php echo get_field('page_bg'); ?>) no-repeat scroll 0% 0%;">           
		       		<div class="page_text_banner">
		       			<h1><?php echo get_field('page_title')?></h1>    			
		       		</div>		       		                     
		   	</div><!-- End _banner-->
            
            <div class="main_content">
	   			<div class="wrap_content">	
	   			 	<div class="content_page">				   
		   				<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
				
							// Include the page content template.
							the_content();
				
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}			
							// End of the loop.
						endwhile;
						?>
					</div>  
	   			</div>
	   		<div class="subcribe">					
	 			<div class="wrap_content">
	 				
		  			<span>SUBSCRIBE TO NEW LETTERS</span>
		  			
		  	<input type="text" placeholder="Enter your email"> 		
		  			<a href="#" class="btn_subscribe">Subscribe</a> 
	 			</div>
   			</div>	
   		</div>
   		  		
    </div>

<?php get_footer();?>
