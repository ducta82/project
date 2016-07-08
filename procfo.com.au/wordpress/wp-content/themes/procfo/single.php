<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package procfo
 */

get_header(); ?>

<?php $img_bg = get_field('image_background_page','options' ); // get all the rows
if ( $img_bg ) : 
	$img_url = $img_bg ? $img_bg : '' ; 
endif; ?>
<section id="site-content" style="
	background: url('<?php echo $img_url?>') center center no-repeat;
	background-size: cover;">
	<div class="container-site-content container content">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );


		endwhile; // End of the loop.

		?>
<?php
get_sidebar();
?>
	</div>
</section>
<?php 
get_footer(); ?>
