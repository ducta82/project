<?php
/**
 * Template Name: Temp Contact
 */
get_header();?>
<?php while (have_posts()):the_post()?>
<div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
    <div class="container-fuild">
   		<div class="contact_banner">           
       		<div class="contact_text_banner">
       			<h1>Contact us</h1>    			
       		</div>       		                      
   		</div><!-- End home_banner-->
   		<div class="contact_content">
   			<div class="wrap_content">
   				<div class="main-contact">
		   			<div class="left-contact">
		   				<h3>Write for us</h3>
		   				<p>If you know how to spot a real and fake product. Write for us! You will be paid to do so!</p>
		   				<a href="http://realvsfakeguide.onegovn.com/write-for-us/" class="btn_write_for_us">Write for us</a>
		   			</div>
		   			<div class="right_contact">
		   				<h3>Let's get together</h3>
		   				<div class="form_contact">
		   					<div class="post_comments_view">
		   						<?php the_content(); ?>
		   														   						
		   					</div>
		   				</div>
		   				
		   			</div>
	   			</div>
   			</div>
   			<div class="subcribe subcribe-page">          
	        <div class="wrap_content">
	            <span>SUBSCRIBE TO NEW LETTERS</span>
	           <?php es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>
	        </div>
	        </div>    	  			
   		</div>  	
   		
   		
    </div>

<?php endwhile;?>
<?php get_footer();?>