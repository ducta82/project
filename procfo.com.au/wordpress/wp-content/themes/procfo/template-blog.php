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
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="box-post-content">
			<?php
			/* Start the Loop */
			while ( $query->have_posts() ) : $query->the_post();
			
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
				<section>
			<h3 class="title_related_posts">Our Services:</h3>
				<?php 
				$args = array(
					'order' => 'asc',
					'orderby' => 'rand',
					'exclude' => array($id),
					'posts_per_page'   => 3,
					'post_type' => 'page',
					'post_status' => 'publish'
				); 
				$pages = get_posts($args); 
				echo '<nav class="related_posts">';
				 foreach ( $pages as $page ) {
					echo '<li><a href="'.get_page_link( $page->ID ).'">'. $page->post_title .'</a></li>';
				  }
				?>
					</nav>
				</section>
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
