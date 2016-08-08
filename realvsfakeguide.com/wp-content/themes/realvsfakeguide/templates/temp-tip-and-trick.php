<?php
/**
 * Template Name: Temp tip and trick
 */
get_header();?>
<?php while (have_posts()):the_post()?>
<div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
    <div class="container-fuild">
   		<div class="tip_and_trick_banner">           
       		<div class="tip_and_trick_text_banner">
       			<h1>Tips & Tricks</h1>    			
       		</div>
       		<div class="subcribe">          
		        <div class="wrap_content">
		            <span><?php _e('SUBSCRIBE TO NEW LETTERS','realvsfaceguild')?></span>
		           <?php es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>
		        </div>
        	</div>                
   		</div><!-- End home_banner-->
   		
   		<div class="tip_and_trick_real_and_face">
   			<div class="wrap_content">
   				<div class="tip_and_trick_item">
					<div class="tip_and_trick_item_left">
						<div class="img_icon-tipatrick1">
							<img class="bg-icon-tipatrick" src="<?php echo get_template_directory_uri();?>/images/tip_and_trick_icon.png">	
						</div>										
						<div class="tip_and_trick_item_text_left">							
							<h3>Verify with the source</h3>
							<p>“The source can tell you a lot about the probability of an item being counterfeit, so it’s important check out their FAQs, about us section, and press pages. And make sure they offer an authenticity guarantee. If the shop or website doesn’t look and feel high-end, chances are it’s not—and chances are neither are the products.” – Graham Wetzbarger, Senior Director of Authentication at The Real Real
							</p>							
						</div>						
					</div>
					<div class="tip_and_trick_item_right">	
						<div class="img_icon-tipatrick">
							<img class="bg-icon-tipatrick" src="<?php echo get_template_directory_uri();?>/images/reques2t.png">	
						</div>				
						<div class="tip_and_trick_item_text_right">
							<h3>REQUEST FOR ACTUAL PHOTOS</h3>
							<p>“Don’t buy an item against a stock image. Make sure to request photos of the actual piece with the ability to view it up close and in detail.” –Graham Wetzbarger, Senior Director of Authentication at The Real Real
							</p>							
						</div>																
					</div>
					<div class="tip_and_trick_item_left">
						<div class="img_icon-tipatrick1">
							<img class="bg-icon-tipatrick" src="<?php echo get_template_directory_uri();?>/images/tip-price.png">	
						</div>								
						<div class="tip_and_trick_item_text_left">							
							<h3>PRICE COMPARISON</h3>
							<p>“Price compare the item against other sources. If the one you’re considering buying is priced considerably lower than similar items on other sites, that is a red flag.” –Graham Wetzbarger, Senior Director of Authentication at The Real Real
							</p>							
						</div>						
					</div>
					<div class="tip_and_trick_item_right">	
						<div class="img_icon-tipatrick">
							<img class="bg-icon-tipatrick" src="<?php echo get_template_directory_uri();?>/images/tip-tag.png">	
						</div>				
						<div class="tip_and_trick_item_text_right">
							<h3>BAR CODES AND TAGS</h3>
							<p>Whenever you look at close up pictures taken by the seller try and lookout for the tag and the bar code on the tag.  You can download apps such as “Bar code scanner” on your smartphone which will verify instantly via the Web for the items authenticity.
							</p>							
						</div>																
					</div>	
					<div class="tip_and_trick_item_left">
						<div class="img_icon-tipatrick1">
							<img class="bg-icon-tipatrick" src="<?php echo get_template_directory_uri();?>/images/tip-location.png">	
						</div>								
						<div class="tip_and_trick_item_text_left">							
							<h3>THE SELLER'S LOCATION</h3>
							<p>We are not saying labeling goods that are made in China as not being authentic. In fact many companies have factories manufacturing for them in across the globe. Lookout for the sellers location to be in a country where the items are retailed. Be careful of sellers located in countries where the products in question are not sold or where that country is notorious for making counterfeit items.
							</p>							
						</div>						
					</div>
					<div class="tip_and_trick_item_right">	
						<div class="img_icon-tipatrick">
							<img class="bg-icon-tipatrick" src="<?php echo get_template_directory_uri();?>/images/tip-feedback.png">	
						</div>				
						<div class="tip_and_trick_item_text_right">
							<h3>FEEDBACK AND FORUMS</h3>
							<p>Check out the sellers feedback especially in forums. If they don’t have many positive feedback then you better tread carefully. Be careful of sellers with a low little or no feedback or with a high percent of negative feedback and as always look through their feedback to see what other buyers had to say about them.
							</p>							
						</div>																
					</div>
						<div class="tip_and_trick_bottom_action">
				<a href="#" class="btn_tip_and_trick_bottom">Become a contributor</a>
			</div>																			
				</div>				
   			</div>
   				
   		</div><!-- End about_real_and_face-->
   		
   		
    </div>
<?php endwhile;?>
<?php get_footer();?>