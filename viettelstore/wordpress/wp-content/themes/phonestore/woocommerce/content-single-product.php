<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-xs-12 detail-info">
			<div class="row">
				<div class="col-lg-5">
					<div class="row">
	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
					</div>
				</div>	
	<div class="col-lg-7">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 produce-info">
		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10 );
			remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10 );
			remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40 );
			remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20 );
			add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',60 );
			do_action( 'woocommerce_single_product_summary' );
		?>
			</div>
			<?php giftSingleProduct(); ?>
		</div>
	</div><!-- .summary -->
			</div>
		</div>	
	</div>
	<div class="row">
<div style="position: relative; display: block;" id="wptoolbar">
        <div id="toolbar" class="toolbar scroll-to-fixed-fixed" style="z-index: 1000; position: fixed; top: 0px; display: block; margin-left: 0px; width: 70px; left: 16.5px;">
            <div onclick="view_block(1);" id="step11" class="active">
                <div class="icon" style="top: 15px; left: -5px;"><i class="icons step"></i></div>
                <div class="text" style="top: 15px; left: 15px;">Đặc điểm nổi bật</div>
            </div>
            <div onclick="view_block(2);" id="step12" class="">
                <div class="icon" style="top: 15px; left: -5px;"><i class="icons step"></i></div>
                <div class="text" style="top: 15px; left: 15px;">Thông số kỹ thuật</div>
                <div class="line "></div>
            </div>
            <div onclick=" view_block(3); " id="step13" class="">
                <div class="icon" style="top: 15px; left: -5px;"><i class="icons step"></i></div>
                <div class="text" style="top: 15px; left: 15px;">
                    Tin tức liên quan
                    <!--(11)-->
                </div>
                <div class="line"></div>
            </div>
            <div onclick="view_block(6);" id="step17" class="">
                <div class="icon" style="top: 15px; left: -5px;"><i class="icons step"></i></div>
                <div class="text" style="top: 15px; left: 15px;">
                    Hình ảnh thực tế
                    <!--(11)-->
                </div>
                <div class="line"></div>
            </div>
            <div onclick="view_block(4);" id="step14" class="">
                <div class="icon" style="top: 15px; left: -5px;"><i class="icons step"></i></div>
                <div class="text" style="top: 15px; left: 15px;">So sánh sản phẩm</div>
                <div class="line"></div>
            </div>
            <div onclick="view_block(5);" id="step15" class="">
                <div class="icon" style="top: 15px; left: -5px;"><i class="icons step"></i></div>
                <div class="text" style="top: 15px; left: 15px;">Bình luận (353)</div>
                <div class="line"></div>
            </div>
        </div>
    </div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked afer_related_products - 18
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />
	<?php $tabs = apply_filters( 'woocommerce_product_tabs', array() );?>
		<div class="row">
		<?php foreach ( $tabs as $key => $tab ) : 
			if($key == 'reviews'){
				?>
				<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ); ?>
				</div>
			<?php } endforeach; ?>
		</div>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->
<?php do_action( 'woocommerce_after_single_product' ); ?>
