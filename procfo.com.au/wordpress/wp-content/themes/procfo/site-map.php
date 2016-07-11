<?php
/**
 * Template Name: Site map
 *
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
endif; ?>
<section id="site-content" style="
	background: url('<?php echo $img_url?>') center center no-repeat;
	background-size: cover;">
	<div class="container-site-content container content">
		<h2 class="site-map">Site map</h2>
			<?php 
			$ids = get_all_page_ids();
			$exclude = array();
			foreach ($ids as $key => $value) {
				$postmeta = get_post_meta( $value, 'page_box_template', true );
				if($postmeta == 'notshow-in-sitemap'){
					$exclude[] = $value;
				}
			}
			$exclude_id = implode(',', $exclude);
			$pages = wp_list_pages(array('sort_column' => 'post_date', 'sort_order' => 'asc', 'exclude' => $exclude_id)); 
			?>

	</div>
</section>
<?php 
get_footer(); ?>