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
	<section class="tab-site">
		<div role="tabpanel">
			<!-- Nav tabs -->
			<?php
				$args = array(
					'post_type' => 'function',
					'order'=>'DESC'
				);
				$query = query_posts($args);
			?>
			<section class="site-tabpanel">
				<h3 class="site-top-caption">FUNCTION</h3>
				<h2>FUNCTIONS of VEG VALLEY</h2>
				<ul class="nav nav-tabs" role="tablist">
					<?php if(have_posts()) :
						$i = 1; $j = 1;
						while (have_posts()) {
							the_post();
							$href = '#tab'.$i.'';
							$title = get_the_title();
							$active = $i == 1 ? 'active' : '';
							$tab = sprintf('<li class="%1$s"><a href="%2$s" aria-controls="tab" role="tab" data-toggle="tab">%3$s</a></li>',$active,$href,$title);
							echo $tab;
							$i++;
						}

					?>				
				</ul>
			</section>
			<!-- Tab panes -->
			<div class="tab-content">
				<?php 
						while (have_posts()) {
							the_post();
							$href = 'tab'.$j.'';
							$img = get_the_post_thumbnail_url();
							$active = $j == 1 ? 'active' : '';
							
							$tab = sprintf('<div " class="tab-pane %1$s" id="%2$s" style="
						    background: url(%3$s) center center no-repeat;
						    background-size: cover;">
									<img src="%3$s" class="img-responsive" alt="Image">
								</div>',$active,$href,$img);
							echo $tab;
							$j++;
						}
					?>
			</div>
			<?php endif;?>
		</div>

	</section><!--end tab-site-->
	<section class="wc-products">
		<div class="head-block">
			<h3 class="site-top-caption">PRODUCTS</h3>
			<h2>FEATURE PRODUCTS</h2>
		</div>
		     <!-- <?php  
		     				    $args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'product_cat' => 'hoodies' );
		     
		     				    $loop = new WP_Query( $args );
		     
		     				    while ( $loop->have_posts() ) : $loop->the_post(); 
		     				    global $product; 
		     
		     				 echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
		     				    endwhile; 
		     
		     
		     				    wp_reset_query(); 
		     
		     				?> -->
		<div class="content container">
			<div class="box-product-wrap">
				<?php
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => 6
						);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
				?>
				</div><!--/box-product-wrap-->
		</div><!--end content-->
		<a href="#" class="view-all">see all product</a>
	</section><!--end wc-products-->

<?php
get_sidebar();
get_footer();
