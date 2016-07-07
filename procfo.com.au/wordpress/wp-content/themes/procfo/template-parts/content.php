<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package procfo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-content'); ?>>
	<div class="box-post-content">
		<header class="entry-header">
			<?php 
			if(!is_home()){
				the_title( '<h2 class="title-post">', '</h2>' ); 
			}
			?>
		</header><!-- .entry-header -->

		<div class="post-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'procfo' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			?>
		</div><!-- .entry-content -->
	</div>	
</article><!-- #post-## -->
