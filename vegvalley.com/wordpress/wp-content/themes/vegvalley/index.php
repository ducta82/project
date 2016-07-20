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
 * @package vegvalley
 */

get_header(); ?>

	<section class="site-info">
		<?php 
			$arg = array(
				'page_id'=>115,
				'post_type'=>'page'
				);
			query_posts($arg);
			if ( have_posts() ) : the_post();?>

		<div class="content container">
			<archive class="box-site-info">
				<header class="info-header">
					<img src="<?php the_post_thumbnail_url();?>" alt="">
					<h2><?php the_title();?></h2>
				</header>
				<div class="info-content">
					<?php the_excerpt();?>
				</div>
			<a class="btn-site-info" href="<?php the_permalink();?>">Read more</a>
			</archive>
		</div>
		<?php endif;?>
	</section><!--end site-info-->
	<?php echo do_shortcode('[vegvalley_function_block]');?>
	<section class="wc-products">
		<div class="head-block">
			<h3 class="site-top-caption">PRODUCTS</h3>
			<h2>FEATURE PRODUCTS</h2>
		</div>
		     
		<div class="content container">
			<div class="box-product-wrap">
				<?php
				global $wp_query;
				//$paged = ( get_query_var( 'paged' ) )? get_query_var( 'paged' ) : 1;
					$args = array(
						'post_type' => 'product',
						'meta_key'     => '_featured',
        				'meta_value'   => 'yes',
        				'meta_compare' => '=',
            			'post_status' => 'publish'
						);
					query_posts( $args );
					$query = new WP_Query( $args );
					if ( have_posts() ) {
						while ( have_posts() ) : the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
					} else {
						echo '<p class="not-found">'.__( 'No products found' ).'</p>';
					}
					?>
			</div><!--/box-product-wrap-->
		</div><!--end content-->
		<!-- <a href="#" class="view-all">see all product</a> -->
		<input type="submit" class="view-all" paged ="<?php echo $query->max_num_pages;?>" name="update_cart" value="see all product">
	</section><!--end wc-products-->
<?php
get_sidebar();
get_footer();
