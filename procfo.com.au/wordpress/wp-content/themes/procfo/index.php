<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
		global $wp_query;
		$args = array_merge( $wp_query->query_vars, array( 'posts_per_page' => '1', 'page_id'=>203 , 'post_type'=>'page') );
		$my_post = query_posts( $args );
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

<?php
get_sidebar();
?>
	</div>
</section>
<?php 
get_footer(); ?>