<?php
/*
*	template name: Peptide page
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			$arg = array(
				'page_id'=>149
				);
			$the_query = new WP_Query($arg);
			while ( $the_query->have_posts() ) : $the_query->the_post();			
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<div class="head-page">
							<div class="content container">
								<small class="rule left"></small>
								<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
								<small class="rule right"></small>
								<?php the_breadcrumb(); ?>
							</div>
						</div>
					</header><!-- .entry-header -->
					<div class="entry-content peptide">
						<?php
							the_content();
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
			<?php endwhile; // End of the loop.
			wp_reset_postdata();
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();