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
				<ul class="social">
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				</ul>
				<img src="http://vegvalley.local/wp-content/uploads/2016/07/logo-footer.png" alt="" class="logo-footer img-responsive">
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
			<div class="info-footer">
				<div class="info-footer-item">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<p>+1 (302)-394-9289</p>
				</div>
				<div class="info-footer-item">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<p>501 Silverside Rd, Wilmington DE 19809, USA</p>
				</div>
				<div class="info-footer-item">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<p>info@vegvalley.com</p>
				</div>
			</div>	
			<div class="copy-right">
				<span>©2014 by Veg Valley. All right reserved.</span>
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