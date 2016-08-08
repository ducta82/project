<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vegvalley
 */

?>

</section><!--end main-->
	<footer id="site-footer">
		<section class="container content">
			<div class="box-top-footer">
				<?php
					if( have_rows('footer_social','options')):
					$rows = get_field('footer_social','options' ); // get all the rows
					$first_row = $rows[0]; // get the first row
					$facebook_url = $first_row['facebook_url'] ? $first_row['facebook_url'] : '' ; 
					$twitter_url = $first_row['twitter_url'] ? $first_row['twitter_url'] : '' ; 
					$google_plus = $first_row['google_plus'] ? $first_row['google_plus'] : '' ; 
					endif;
				?>	
				<ul class="social">
					<li><a href="<?php echo $facebook_url;?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo $twitter_url;?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo $google_plus;?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				</ul>
				<img src="<?php echo bloginfo('template_url');?>/images/logo-footer.png" alt="" class="logo-footer img-responsive">
				<!-- <div class="menu-footer">
					<ul>
						<li><a href="#">PEPTIDE</a></li>
						<li><a href="#">OTHER PRODUCTS</a></li>
						<li><a href="#">TERMS & CONDITIONS</a></li>
						<li><a href="#">CONTACT US</a></li>
					</ul>
				</div> -->
				<?php
						   /**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
							$args = array(
								'theme_location' => 'footer',
								'menu' => '',
								'container' => 'div',
								'container_class' => 'menu-footer',
								'menu_class' => '',
								'before' => '',
								'after' => '',
								'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
								'walker' => ''
							);
						
							wp_nav_menu( $args );
					?>
			</div>
			<?php
				if( have_rows('footer_info','options')):
				$rows = get_field('footer_info','options' ); // get all the rows
				$first_row = $rows[0]; // get the first row
				$phone_number = $first_row['phone_number'] ? $first_row['phone_number'] : '' ; 
				$address = $first_row['address'] ? $first_row['address'] : '' ; 
				$email_footer = $first_row['email_footer'] ? $first_row['email_footer'] : '' ; 
				endif;
			?>
			<div class="info-footer">
				<div class="info-footer-item">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<p><?php echo $phone_number;?></p>
				</div>
				<div class="info-footer-item">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<p style="width: 70%;text-align: center;margin: 0 auto;"><?php echo $address;?></p>
				</div>
				<div class="info-footer-item">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<p><?php echo $email_footer;?></p>
				</div>
			</div>
			<div class="copy-right">
				<span><?php _e('©2014 by Veg Valley. All right reserved.','vegvalley')?></span>
			</div>
		</section>
	</footer>
	</div>

	<!-- jQuery -->
	<script type="text/javascript"> 
	
	</script>

	<?php wp_footer(); ?>
	</body>
	</html>