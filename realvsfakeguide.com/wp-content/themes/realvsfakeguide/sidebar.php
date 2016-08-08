<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="right_content" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    				
</div><!-- #right-sidebar -->
