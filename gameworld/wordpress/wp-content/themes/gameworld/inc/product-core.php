<?php
/**
 * Base code user in product page
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gameworld
 */
/*
* Hiển thị nút share ở trang chi tiết sản phẩm
*/
if(!function_exists('share_button')){
	function share_button(){
		
		?>
			<div class="sharing">
                    <div class="addthis_toolbox addthis_default_style">
                        <a class="addthis_button_email"></a>
                        <a class="addthis_button_print"></a>
                        <a class="addthis_button_facebook"></a>
                        <a class="addthis_button_twitter"></a>
                        <a class="addthis_button_pinterest_share"></a>
                        <a class="addthis_button_compact"></a>
                        <a class="addthis_counter addthis_bubble_style"></a></div>
                    </div>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58e25a78ab099727"></script> 
		<?php
		}
}
add_action('product_share', 'share_button', 1);

