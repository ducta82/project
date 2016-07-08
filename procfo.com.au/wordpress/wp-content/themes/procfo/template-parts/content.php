<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package procfo
 */
if(is_single()){
	$id = get_the_id();
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
		<?php the_post_navigation(array(
            'prev_text'                  => __( '%title' ),
            'next_text'                  => __( '%title' ),
            'taxonomy'                   => __( 'category' ),
            'excluded_terms'             => $id,
            'screen_reader_text' => __( 'Continue Reading :','procfo' ),
        )); ?>
	</div>	
</article><!-- #post-## -->
<?php
}else{
	?>
	<div class="item-post">
		<header class="entry-header">
			<?php the_title( '<h2 class="title-post"><a href="'.get_permalink().'" title="">', '</a></h2>' ); ?>
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php procfo_posted_on(); ?>
			</div><!-- .entry-meta -->
			<div class="post-thumbnail">
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<img style="max-width:100%;height:auto;floal:left;" src="<?php the_post_thumbnail_url('full'); ?>"/>
					</a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="post-content">
			<?php
				$my_excerpt = get_the_excerpt();
				if ( '' != $my_excerpt ) {
					echo '<p>';
					echo mb_strimwidth($my_excerpt, 0, 277, '...').'<a class="read-more" href="'. esc_url( get_permalink() ) .'">Read more</a>';
					echo '</p>';
				}
				else{
				echo '<a href="'.esc_url( get_permalink() ).'">'.__("Read more...","justresidential-com-au").'</a>';
				}
			?>
		</div><!-- .entry-content -->
	</div>
	<?php
}