<?php
/**
 * Template Name: blog page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
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
endif; 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
	'post_type' => 'post',
	 'paged'	=> $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => 'blog',
		),
	),
);
query_posts($args);
?>
<section id="site-content" style="
	background: url('<?php echo $img_url?>') center center no-repeat;
	background-size: cover;">
	<div class="container-site-content container content">

		<?php
		if ( have_posts() ) : ?>
		<div class="article-content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="box-post-content">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			wp_corenavi_table();
			wp_reset_postdata();

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
