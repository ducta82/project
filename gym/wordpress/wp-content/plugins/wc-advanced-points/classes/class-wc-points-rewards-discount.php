<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC_Points_Rewards_Discount {

	public function __construct() {
		add_filter( 'woocommerce_get_shop_coupon_data', array( $this, 'get_discount_data' ), 10, 2 );
		add_filter( 'woocommerce_coupon_message', array( $this, 'get_discount_applied_message' ), 10, 3 );
		add_filter( 'woocommerce_coupon_get_discount_amount', array( $this, 'get_discount_amount' ), 10, 5 );
	}
	public function get_discount_data( $data, $code ) {
		if ( strtolower( $code ) != $this->get_discount_code() ) {
			return $data;
		}
		$data = array(
			'id'                         => true,
			'type'                       => 'fixed_cart',
			'amount'                     => 0,
			'coupon_amount'              => 0, // 2.2
			'individual_use'             => 'no',
			'product_ids'                => '',
			'exclude_product_ids'        => '',
			'usage_limit'                => '',
			'usage_count'                => '',
			'expiry_date'                => '',
			'apply_before_tax'           => 'yes',
			'free_shipping'              => 'no',
			'product_categories'         => array(),
			'exclude_product_categories' => array(),
			'exclude_sale_items'         => 'no',
			'minimum_amount'             => '',
			'maximum_amount'             => '',
			'customer_email'             => ''
		);

		return $data;
	}
	public function get_discount_amount( $discount, $discounting_amount, $cart_item, $single, $coupon ) {
		if ( strtolower( $coupon->code ) != $this->get_discount_code() ) {
			return $discount;
		}

		$discount_percent = 0;

		if ( WC()->cart->subtotal_ex_tax ) {
			$discount_percent = ( $cart_item['data']->get_price_excluding_tax() * $cart_item['quantity'] ) / WC()->cart->subtotal_ex_tax;
		}

		$total_discount = WC_Points_Rewards_Cart_Checkout::get_discount_for_redeeming_points( true );
		$total_discount = min( ( $total_discount * $discount_percent ) / $cart_item['quantity'], $discounting_amount );

		return $total_discount;
	}

	public function get_discount_applied_message( $message, $message_code, $coupon ) {
		if ( $message_code === WC_Coupon::WC_COUPON_SUCCESS && $coupon->code === $this->get_discount_code() ) {
			return __( 'Discount Applied Successfully', 'woocommerce-points-and-rewards' );
		} else {
			return $message;
		}
	}
	public static function generate_discount_code() {
		$discount_code = sprintf( 'wc_points_redemption_%s_%s', get_current_user_id(), date( 'Y_m_d_h_i', current_time( 'timestamp' ) ) );
		WC()->session->set( 'wc_points_rewards_discount_code', $discount_code );
		return $discount_code;
	}
	public static function get_discount_code() {
		if ( WC()->session !== null ) {
			return WC()->session->get( 'wc_points_rewards_discount_code' );
		}
	}
}
