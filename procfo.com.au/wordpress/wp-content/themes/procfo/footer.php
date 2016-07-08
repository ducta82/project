<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package procfo
 */

?>
<footer id="site-footer">
	<div id="footer-content" class="content">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 footer_left">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<h3 class="title-item-footer">ProCFO:</h3>
				<?php    /**
					* Displays a navigation menu
					* @param array $args Arguments
					*/
					$args = array(
						'theme_location' => 'footer_menu1',
						'container' => 'nav',
						'container_class' => 'nav-footer',
						'menu_class' => '',
						'menu_id' => '',
						'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
					);
				
					wp_nav_menu( $args );?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<h3 class="title-item-footer">Services:</h3>
				<?php    /**
					* Displays a navigation menu
					* @param array $args Arguments
					*/
					$args = array(
						'theme_location' => 'footer_menu2',
						'container' => 'nav',
						'container_class' => 'nav-footer',
						'menu_class' => '',
						'menu_id' => '',
						'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
					);
				
					wp_nav_menu( $args );?>
				<?php
					if( have_rows('icon_services','options') || have_rows('footer_contact_info','options')):
					$rows = get_field('icon_services','options' ); // get all the rows
					$rows2 = get_field('footer_contact_info','options' ); // get all the rows
					$first_row = $rows[0]; // get the first row
					$first_row_2 = $rows2[0]; // get the first row
					$icon_services_1 = $first_row['icon_services_1'] ? $first_row['icon_services_1'] : '' ; 
					$link_icon_services_1 = $first_row['link_icon_services_1'] ? $first_row['link_icon_services_1'] : '' ; 
					$icon_services_2 = $first_row['icon_services_2'] ? $first_row['icon_services_2'] : '' ; 
					$link_icon_services_2 = $first_row['link_icon_services_2'] ? $first_row['link_icon_services_2'] : '' ; 

					$tel = $first_row_2['tel'] ? $first_row_2['tel'] : '' ; 
					$text_tel = $first_row_2['text_tel'] ? $first_row_2['text_tel'] : 'tel:' ; 
					$email = $first_row_2['email'] ? $first_row_2['email'] : '' ; 
					$text_email = $first_row_2['text_email'] ? $first_row_2['text_email'] : 'email:' ; 
					$form_online = $first_row_2['form_online'] ? $first_row_2['form_online'] : '' ; 
					$po_box	 = $first_row_2['po_box'] ? $first_row_2['po_box'] : '' ; 
					$perth_wa	 = $first_row_2['perth_wa'] ? $first_row_2['perth_wa'] : '' ; 
					endif;
				?>
				<ul class="footer-icon">
					<li><a href="<?php echo $link_icon_services_1;?>"><img src="<?php echo $icon_services_1;?>" alt=""></a></li>
					<li><a href="<?php echo $link_icon_services_2;?>"><img src="<?php echo $icon_services_2;?>" alt=""></a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<h3 class="title-item-footer">Contact:</h3>
				<div class="contact-footer">
					<ul>
						<li><p><?php echo $text_tel; ?><span> <a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a> </span></p> </li>
						<li><p><?php echo $text_email; ?><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p> </li>
						<li><?php echo $form_online; ?></li>
						<li><span><?php echo $po_box; ?></span></li>
						<li><span><?php echo $perth_wa; ?></span></li>
					</ul>
					<?php
						if( have_rows('images_social_icon','options')):
						$rows = get_field('images_social_icon','options' ); // get all the rows
						$first_row = $rows[0]; // get the first row
						$facebook_url = $first_row['img_facebook'] ? $first_row['img_facebook'] : '' ; 
						$facebook_url_hover = $first_row['img_facebook_hover'] ? $first_row['img_facebook_hover'] : '' ; 
						$google_plus_url = $first_row['img_gplus'] ? $first_row['img_gplus'] : '' ; 
						$google_plus_url_hover = $first_row['img_gplus_hover'] ? $first_row['img_gplus_hover'] : '' ;
						$img_linkedin_url = $first_row['img_linkedin'] ? $first_row['img_linkedin'] : '' ; 
						$img_linkedin_url_hover = $first_row['img_linkedin_hover'] ? $first_row['img_linkedin_hover'] : '' ;
						endif;
					?>
					<style type="text/css">
					.footer-social .fb{
						background: url('<?php echo $facebook_url;?>') top left no-repeat;
						background-size: cover;
					}
					.footer-social .fb:hover{
						background: url('<?php echo $facebook_url_hover;?>') top left no-repeat;
					}
					.footer-social .gplus{
						background: url('<?php echo $google_plus_url;?>') top left no-repeat;
						background-size: cover;
					}
					.footer-social .gplus:hover{
						background: url('<?php echo $google_plus_url_hover;?>') top left no-repeat;
					}
					.footer-social .in{
						background: url('<?php echo $img_linkedin_url;?>') top left no-repeat;
						background-size: cover;
					}
					.footer-social .in:hover{
						background: url('<?php echo $img_linkedin_url_hover;?>') top left no-repeat;
					}
					</style>
					<ul class="footer-social">
						<li><a class="fb" href=""></a></li>
						<li><a class="gplus" href=""></a></li>
						<li><a class="in" href=""></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 footer_right">
			<?php 
				if( have_rows('map_footer','options')):
				$rows = get_field('map_footer','options' ); // get all the rows
				$first_row = $rows[0]; // get the first row
				$map_url = $first_row['map_img'] ? $first_row['map_img'] : '' ; 
				$map_add = $first_row['map_address'] ? $first_row['map_address'] : '' ; 
				endif;
			?>
			<map>
				<img src="<?php echo $map_url;?>" alt="">
			</map>
			<p><?php echo $map_add;?></p>
		</div>
	</div>
</footer>
</div>
</section>
<?php wp_footer(); ?>

</body>
</html>
