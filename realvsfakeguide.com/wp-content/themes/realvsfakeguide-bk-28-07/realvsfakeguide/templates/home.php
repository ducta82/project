<?php
/**
 * Template Name: Temp Home
 */
get_header();?>
<?php 
  $banner_text = get_field('banner_text');
  $banner_title = get_field('banner_title');
  
?>
<?php while (have_posts()):the_post()?>
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
       					if(have_rows('blog_categories')):
       					while (have_rows('blog_categories')):the_row('blog_categories');
       					$cat = get_sub_field('category');   
       									
   					?> 
   					 
   					<div class="guild_item"> 					
	   					<div class="guild_item_btn1">
		   					<a href="<?php echo get_category_link($cat); ?>" class="btn_guild_item"><?php echo $cat->name?></a>
		   				</div>		   		     
		   				<div class="guild_item_1"> 
                             <img class="thumb_guild_item_1" src="<?php echo get_sub_field('guild_item_thumb'); ?>"> 
                             <div class="guild_item_author">
                               <a>by <?php the_author(); ?></a>
                               <a><?php echo $cat->name?></a>
                               <a><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></a>
                               
                             </div>
                             <div class="guild_item_1_content">
                                <h3><a href="<?php echo get_sub_field('guild_item_link'); ?>"><?php echo get_sub_field('guild_item_title'); ?></a></h3>
                                <img alt="" src="<?php echo get_template_directory_uri();?>/images/Rectangle5.png">
                                <p><?php echo get_sub_field('guild_item_content'); ?></p>	 
                             </div>  
                             <div class="guild_item_action">
                                <a href="<?php echo get_sub_field('guild_item_link'); ?>" class="btn_readmore_guild_item">read more</a>
                                <div class="guild_item_action_social">
                                <p>
                                <span>Share:</span> 
			   						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-face.png"></a>
			   						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-twi.png"></a>	
			   						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-goo.png"></a>	
			   						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-pri.png"></a>		
			   					</p>
                                </div>
                             </div>                                                                                  	                           
	   					</div>
	   					<div class="guild_item_1"> 
                             <img class="thumb_guild_item_1" src="<?php echo get_sub_field('guild_item_thumb2'); ?>"> 
                             <div class="guild_item_author">
                               <a>by <?php the_author(); ?></a>
                               <a><?php echo $cat->name?></a>
                               <a><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></a>
                               
                             </div>
                             <div class="guild_item_1_content">
                                <h3><a href="<?php echo get_sub_field('guild_item_link2'); ?>"><?php echo get_sub_field('guild_item_title2'); ?></a></h3>
                                <img alt="" src="<?php echo get_template_directory_uri();?>/images/Rectangle5.png">
                                <p><?php echo get_sub_field('guild_item_content2'); ?></p>	 
                             </div>  
                             <div class="guild_item_action">
                                <a href="<?php echo get_sub_field('guild_item_link2'); ?>" class="btn_readmore_guild_item">read more</a>
                                <div class="guild_item_action_social">
                                <p><span>Share: </span>
			   						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-face.png"></a>
			   						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-twi.png"></a>	
			   						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-goo.png"></a>	
			   						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-pri.png"></a>		
			   					</p>
                                </div>
                             </div>                                                                                  	                           
	   					</div>	   			
	   				</div> 
		   			<?php endwhile;?>
		   			<?php endif;?>			   						   				
	   						   			   			   						   					   				   			
	   			</div>
	   		</div>	
   		</div><!-- End home_guild -->
   		
   		<div class="bar_write_for_us">
   			<div class="wrap_content">
   				<div class="bar_write_for_us_text">
		   			<span><?php echo get_field('bar_write_for_us_title');?></span>
		   			</br></br><p><?php echo get_field('bar_write_for_us_text');?></p>
	   			</div>
	   			<a href="<?php echo get_field('bar_write_for_us_link');?>" class="btn_write_for_us">Write for us</a>
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
	 				
		  			<span>SUBSCRIBE TO NEW LETTERS</span>
		  			
		  			<input type="text" placeholder="Enter your email"> 		
		  			<a href="#" class="btn_subscribe">Subscribe</a> 
	 			</div>
   			</div>
   		</div>
   	</div>
<?php endwhile;?>
<?php get_footer();?>