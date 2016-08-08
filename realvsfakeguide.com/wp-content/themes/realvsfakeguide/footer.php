<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package realvsfaceguild
 */

?>

	</div><!-- #content -->	
<footer>
   <?php
      if( have_rows('social','options')):
      $rows = get_field('social','options' ); // get all the rows
      $first_row = $rows[0]; // get the first row
      $facebook = $first_row['facebook'] ? $first_row['facebook'] : '#' ; 
      $twitter = $first_row['twitter'] ? $first_row['twitter'] : '#' ; 
      $googlesplus = $first_row['googlesplus'] ? $first_row['googlesplus'] : '#' ; 
      $printerset = $first_row['printerset'] ? $first_row['printerset'] : '#' ;
      endif;
   ?>
   	<div class="footer_wrap">
   			<div class="footer_links">
   				<a href="#">About Us</a> <a href="#">Privacy Policy</a> <a href="#">Disclaimer</a> <a href="#">Contact Us</a> 
   			</div>
   			<div class="footer_social">
   				<a href="<?php echo $facebook;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/1420802158_facebook-2.png"></a>
   				<a href="<?php echo $twitter;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/1420802158_twitter-2.png"></a>
   				<a href="<?php echo $googlesplus;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/1420802158_googlesplus-2.png"></a>
   				<a href="<?php echo $printerset;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/1420802158_printerset-2.png"></a>
   			</div>
   			<p class="copyright">Copyright &copy; 2016 <a href="#">realvsfakeguide.com</a>. All rights reserved.</p>			
   		</div>
   	</footer>	
<?php wp_footer(); ?>
</body>
</html>
