<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package phonestore
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<td class="left">
	<div class="wapper" id="filter_lst">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</td>
