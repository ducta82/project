<?php
/**
 * Template Name: Temp Write For Us
 */
get_header();?>
<?php while (have_posts()):the_post()?>
<div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
    <div class="container-fuild">
   		<div class="page_banner" style="background: url(<?php echo get_field('page_bg'); ?>) no-repeat scroll 0% 0%;">           
		       		<div class="page_text_banner">
		       			<h1><?php echo get_field('page_title')?></h1>    			
		       		</div>		       		                     
		</div><!-- End _banner--> 
		<div class="write_for_us_content">  			
   		<div class="main-contact">
   			<div class="wrap_content">
		   			<div class="write_for_us_text">
		   				<h3>Write for us! You will be paid to do so!</h3>
		   				<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>		   				
		   			</div>
		   			<div class="write_for_us_form">		   						   				
		   				<!--<div class="write_for_us-icon-name">
		   					<img class="icon-name" src="<?php echo get_template_directory_uri();?>/images/contact-icon-name.png">
		   					<input type="text" class="form_write_for_us_name" placeholder="Your name">
		   					</div>
		   					<div class="write_for_us-icon-mail">
		   						<img class="icon-mail" src="<?php echo get_template_directory_uri();?>/images/contact-icon-mail.png">
		   						<input type="text" class="form_write_for_us_mail" placeholder="Your email">
		   					</div>
		   					<div class="write_for_us-icon-phone">
		   						<img class="icon-phone" src="<?php echo get_template_directory_uri();?>/images/contact-icon-phone.png">
		   						<input type="text" class="form_write_for_us_phone" placeholder="Phone number">
		   					</div>
		   					<textarea rows="" cols="" placeholder="Write here"></textarea>
		   					<div class="btn_bottom">
		   						<a class="btn_send_write_for_us" href="#">Send</a>
		   					</div>	
		   				-->	
		   					<?php the_content(); ?>	   
		   					<?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>						   				
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
</div>

<?php endwhile;?>
<?php get_footer();?>