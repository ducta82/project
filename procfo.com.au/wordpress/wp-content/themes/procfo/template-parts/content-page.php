<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package procfo
 */
$id = get_the_id();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-content'); ?>>
	<div class="box-post-content">
		<header class="entry-header">
			<!-- <?php the_title( '<h2 class="title-post">', '</h2>' ); ?> -->
		</header><!-- .entry-header -->

		<div class="post-content">
			<?php
				the_content();
			?>
		</div><!-- .entry-content -->
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