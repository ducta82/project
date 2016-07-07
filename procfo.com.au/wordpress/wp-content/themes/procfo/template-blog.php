<?php
/**
 * Template Name: blog page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
<?php $img_bg = get_field('image_background_page','options' ); // get all the rows
if ( $img_bg ) : 
	$img_url = $img_bg ? $img_bg : '' ; 
endif; 
$args = array(
	'post_type' => 'post',
	'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => 'blog',
		),
	),
);
$query = new WP_Query( $args );
?>
<section id="site-content" style="
	background: url('<?php echo $img_url?>') center center no-repeat;
	background-size: cover;">
	<div class="container-site-content container content">

		<?php
		if ( $query->have_posts() ) : ?>
		<div class="article-content">

			<?php
			/* Start the Loop */
			while ( $query->have_posts() ) : $query->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="box-post-content">
						<header class="entry-header">
							<?php the_title( '<h2 class="title-post">', '</h2>' ); ?>
						</header><!-- .entry-header -->

						<div class="post-content">
							<?php
								the_content();
							?>
						</div><!-- .entry-content -->
						<section>
							<h3 class="title_related_posts">Our Services:</h3>
						<?php $args = array(
							'sort_order' => 'asc',
							'sort_column' => 'rand',
							'exclude' => $id,
							'number' => 3,
							'post_type' => 'page',
							'post_status' => 'publish'
						); 
						$pages = get_pages($args); 
						echo '<nav class="related_posts">';
						 foreach ( $pages as $page ) {
							echo '<li><a href="'.get_page_link( $page->ID ).'">'. $page->post_title .'</a></li>';
						  }
						?>
							</nav>
						</section>
					</div>	
				</article><!-- #post-## -->
				<?php

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>
<?php
get_sidebar();
?>
	</div>
</section>
<?php 
get_footer(); ?>
