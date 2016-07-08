<?php
/**
 * The template for displaying archive pages.
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
		if ( have_posts() ) : ?>
		<div class="article-content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="box-post-content">
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_pagination( array(
			    'mid_size' => 3,
			    'prev_text' => __( 'Back', 'procfo' ),
			    'next_text' => __( 'Next', 'procfo' ),
			    'screen_reader_text' => __('Navigation','procfo')
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		
				</div>	
			</article><!-- #post-## -->
		</div>
<?php
get_sidebar();
?>
	</div>
</section>
<?php 
get_footer(); ?>
