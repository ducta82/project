<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php is_archive() ? post_class('item ProductList3Col_item') : post_class('item col-lg-2 col-md-3 col-sm-3 col-xs-3'); ?>>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	if(is_archive()){
		remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10 );	
	}
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	remove_action( 'woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
	add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',1);
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_price',5 );
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5 );
	remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10 );
	if(is_archive()){
	add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_product_link_open',15 );
	add_action('woocommerce_after_shop_loop_item_title','after_woocommerce_template_loop_product_link_open',20 );
	}
	
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10 );
	if(is_single()){
		add_action('woocommerce_after_shop_loop_item','after_woocommerce_template_loop_product_link_open',20 );
	}
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
	<div class="order">đặt ngay</div>
</div>
