<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package procfo
 */

get_header(); ?>
<?php 
$id = get_the_id();
$img_bg = get_field('image_background_page','options' ); // get all the rows
$page_img = get_field('img_back_ground',$id);
if ( $page_img ) : 
	$img_url = $page_img ? $page_img : '' ; 
else:
	$img_url = $img_bg ? $img_bg : '' ; 
endif; ?>
<section id="site-content" style="
	background: url('<?php echo $img_url?>') center center no-repeat;
	background-size: cover;">
	<div class="container-site-content container content">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				
			endwhile; // End of the loop.
			?>
<?php
get_sidebar();
?>
	</div>
</section>
<?php 
get_footer(); ?>