<?php

	add_action( 'woocommerce_loaded', 'woocommerce_loaded' );
	function woocommerce_loaded() {
		if ( version_compare( WOOCOMMERCE_VERSION, "2.1.0" ) >= 0 ) {
			add_filter( 'woocommerce_cart_item_price','on_display_cart_item_price_html', 10, 2 );
		} else {
			add_filter( 'woocommerce_cart_item_price_html', 'on_display_cart_item_price_html' , 10, 2 );
		}
	}

	function on_display_cart_item_price_html( $html, $cart_item ) {
			if (isset($cart_item['discounts'])) {
				$_product = $cart_item['data'];
			
			if (function_exists('get_product')) {
				$price_adjusted = get_option('woocommerce_tax_display_cart') == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();
				$price_base = $cart_item['discounts']['display_price'];
			} else {
				if (get_option('woocommerce_display_cart_prices_excluding_tax') == 'yes') :
					$price_adjusted = $cart_item['data']->get_price_excluding_tax();
					$price_base = $cart_item['discounts']['display_price'];
				else :
					$price_adjusted = $cart_item['data']->get_price();
					$price_base = $cart_item['discounts']['display_price'];
				endif;
			}
				if (!empty($price_adjusted) || $price_adjusted === 0) {
					if (apply_filters('wc_dynamic_pricing_use_discount_format', true)) {
						$html = '<del>' . WC_point_Pricing_Compatibility::wc_price($price_base) . '</del><ins> ' . WC_point_Pricing_Compatibility::wc_price($price_adjusted) . '</ins>';
					} else {
						$html = '<span class="amount">' . WC_point_Pricing_Compatibility::wc_price($price_adjusted). '</span>';
					}
				}
			}
			return $html;
	}	
	
	function sort_by_price($cart_item_a, $cart_item_b) {
		return $cart_item_a['data']->get_price() > $cart_item_b['data']->get_price();
	}
	function on_cart_loaded_from_session( $cart ) {
		global $woocommerce;

		$sorted_cart = array();
		if ( sizeof( $cart->cart_contents ) > 0 ) {
			foreach ( $cart->cart_contents as $cart_item_key => $values ) {
				$sorted_cart[$cart_item_key] = $values;
			}
		}

		//Sort the cart so that the lowest priced item is discounted when using block rules.
		@uasort( $sorted_cart, 'sort_by_price' );
		adjust_cart( $sorted_cart );
	}
	add_action( 'woocommerce_cart_loaded_from_session', 'on_cart_loaded_from_session', 99, 1 );

	function calculate_discount_modifier( $percentage, $price ) {
		$percentage = str_replace( '%', '', $percentage ) / 100;

		return $percentage * $price;
	}
	
	function adjust_cart( $cart ) {

		global $woocommerce,$wpdb;

		if ( ! is_user_logged_in())
			return;	
		$points_total = (int)get_user_meta( get_current_user_id() , 'wc_points_level_user',true);
	//	if($points_total>=0)
//		{
			$args = array(
				'post_type'  => 'level',
				'meta_query' => array(
					array(
						'key'     => 'level_range_from',
						'value'   => $points_total,
						'type'    => 'numeric',	
						'compare' => '<=',
					),
					array(
						'key' => 'level_range_to',
						'value'   => $points_total,
						'type'    => 'numeric',
						'compare' => '>',
					),
				),
			);
			$pw_level_discount_type='';
			
			$query = new WP_Query( $args );	
		//	echo $query->max_num_pages;
		//	echo $query->request;
			if ( $query->have_posts() ) {			
				$query->the_post();	
				$level_discount = get_post_meta( get_the_ID() , 'level_discount', true );
				//$level_additional_point = get_post_meta( get_the_ID() , 'level_additional_point', true );
				$pw_level_discount_type=get_post_meta(get_the_ID(),'level_discount_type',true);
			//	if($pw_level_discount_type=="pw_level_product_category")
			//	{
					$level_discount_applyto=get_post_meta(get_the_ID(),'level_discount_applyto',true);
			//	}
			}
	//	}
		$num_decimals = apply_filters( 'woocommerce_wc_pricing_get_decimals', (int) get_option( 'woocommerce_price_num_decimals' ) );
		foreach ( $cart as $cart_item_key => $cart_item ) {
			$price_adjusted=false;
			if($pw_level_discount_type=="all")
			{
				//$original_price=get_price_to_discount( $cart_item, $cart_item_key );		
				$original_price=$cart_item['data']->price;				
				if ( false !== strpos( $level_discount, '%' ) )
				{
					$max_discount = calculate_discount_modifier( $level_discount, $original_price );
					$result = round( floatval( $original_price ) - ( floatval( $max_discount  )), (int) $num_decimals );
				}
				else
					$result=$original_price-$level_discount;
				$price_adjusted=$result;
				$module="simple_category";
				$applied_rule_set_id="set_12";
				if ( $price_adjusted !== false && floatval( $original_price ) != floatval( $price_adjusted ) ) {
					apply_cart_item_adjustment( $cart_item_key, $original_price, $price_adjusted, $module, $applied_rule_set_id );
				}
			}
			elseif($pw_level_discount_type=="pw_level_product_category")
			{
				//Get Category Product
				$terms = wp_get_post_terms($cart_item['product_id'], 'product_cat', array('fields' => 'ids'));
				//Check if category is level
				$result = array_intersect($level_discount_applyto, $terms);
				if(count($result)!=0)
				{
					//$original_price=get_price_to_discount( $cart_item, $cart_item_key );		
					$original_price=$cart_item['data']->price;
					if ( false !== strpos( $level_discount, '%' ) )
					{
						$max_discount = calculate_discount_modifier( $level_discount, $original_price );
						$result = round( floatval( $original_price ) - ( floatval( $max_discount  )), (int) $num_decimals );
					}
					else
						$result=$original_price-$level_discount;
					$price_adjusted=$result;
					$module="simple_category";
					$applied_rule_set_id="set_12";
					if ( $price_adjusted !== false && floatval( $original_price ) != floatval( $price_adjusted ) ) {
						apply_cart_item_adjustment( $cart_item_key, $original_price, $price_adjusted, $module, $applied_rule_set_id );
					}
				}
			}
			elseif($pw_level_discount_type=="pw_level_product_tag")
			{
				//Get Category Product
				$terms = wp_get_post_terms($cart_item['product_id'], 'product_tag', array('fields' => 'ids'));
				//Check if category is level
				$result = array_intersect($level_discount_applyto, $terms);
				if(count($result)!=0)
				{
					//$original_price=get_price_to_discount( $cart_item, $cart_item_key );		
					$original_price=$cart_item['data']->price;
					if ( false !== strpos( $level_discount, '%' ) )
					{
						$max_discount = calculate_discount_modifier( $level_discount, $original_price );
						$result = round( floatval( $original_price ) - ( floatval( $max_discount  )), (int) $num_decimals );
					}
					else
						$result=$original_price-$level_discount;
					$price_adjusted=$result;
					$module="simple_category";
					$applied_rule_set_id="set_12";
					if ( $price_adjusted !== false && floatval( $original_price ) != floatval( $price_adjusted ) ) {
						apply_cart_item_adjustment( $cart_item_key, $original_price, $price_adjusted, $module, $applied_rule_set_id );
					}
				}
			}
			elseif($pw_level_discount_type=="pw_level_product")
			{
				if (in_array($cart_item['product_id'], $level_discount_applyto))
				{
					//$original_price=get_price_to_discount( $cart_item, $cart_item_key );
					$original_price=$cart_item['data']->price;
					if ( false !== strpos( $level_discount, '%' ) )
					{
						$max_discount = calculate_discount_modifier( $level_discount, $original_price );
						$result = round( floatval( $original_price ) - ( floatval( $max_discount  )), (int) $num_decimals );
					}
					else
						$result=$original_price-$level_discount;
					$price_adjusted=$result;
					$module="simple_category";
					$applied_rule_set_id="set_12";
					if ( $price_adjusted !== false && floatval( $original_price ) != floatval( $price_adjusted ) ) {
						apply_cart_item_adjustment( $cart_item_key, $original_price, $price_adjusted, $module, $applied_rule_set_id );
					}
				}
			}			
		}
	}

	function apply_cart_item_adjustment( $cart_item_key, $original_price, $adjusted_price, $module, $set_id ) {
		global $woocommerce;
		$adjusted_price = apply_filters( 'wc_dynamic_pricing_apply_cart_item_adjustment', $adjusted_price, $cart_item_key, $original_price, $module );

		if ( isset( $woocommerce->cart->cart_contents[$cart_item_key] ) ) {
			$_product = $woocommerce->cart->cart_contents[$cart_item_key]['data'];
			$display_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

			$woocommerce->cart->cart_contents[$cart_item_key]['data']->price = $adjusted_price;

			if ( !isset( $woocommerce->cart->cart_contents[$cart_item_key]['discounts'] ) ) {

				$discount_data = array(
				    'by' => array($module),
				    'set_id' => $set_id,
				    'price_base' => $original_price,
				    'display_price' => $display_price,
				    'price_adjusted' => $adjusted_price,
				    'applied_discounts' => array(array('by' => $module, 'set_id' => $set_id, 'price_base' => $original_price, 'price_adjusted' => $adjusted_price))
				);
				$woocommerce->cart->cart_contents[$cart_item_key]['discounts'] = $discount_data;
			} else {

				$existing = $woocommerce->cart->cart_contents[$cart_item_key]['discounts'];

				$discount_data = array(
				    'by' => $existing['by'],
				    'set_id' => $set_id,
				    'price_base' => $original_price,
				    'display_price' => $existing['display_price'],
				    'price_adjusted' => $adjusted_price
				);

				$woocommerce->cart->cart_contents[$cart_item_key]['discounts'] = $discount_data;

				$history = array('by' => $existing['by'], 'set_id' => $existing['set_id'], 'price_base' => $existing['price_base'], 'price_adjusted' => $existing['price_adjusted']);
				array_push( $woocommerce->cart->cart_contents[$cart_item_key]['discounts']['by'], $module );
				$woocommerce->cart->cart_contents[$cart_item_key]['discounts']['applied_discounts'][] = $history;
			}
		}

		do_action( 'woocommerce_dynamic_pricing_apply_cartitem_adjustment', $cart_item_key, $original_price, $adjusted_price, $module, $set_id );
	}

	function get_price_to_discount($cart_item, $cart_item_key) {
		global $woocommerce;

		$result = false;
		
		$filter_cart_item = $cart_item;
		if (isset($woocommerce->cart->cart_contents[$cart_item_key])) {
			$filter_cart_item  = $woocommerce->cart->cart_contents[$cart_item_key];
			
			if (isset($woocommerce->cart->cart_contents[$cart_item_key]['discounts'])) {
				if (is_cumulative($cart_item, $cart_item_key)) {
					$result = $woocommerce->cart->cart_contents[$cart_item_key]['discounts']['price_adjusted'];
				} else {
					$result = $woocommerce->cart->cart_contents[$cart_item_key]['discounts']['price_base'];
				}
			} else {
				$result = $woocommerce->cart->cart_contents[$cart_item_key]['data']->get_price();
			}
		}

		return apply_filters('woocommerce_dynamic_pricing_get_price_to_discount', $result, $filter_cart_item, $cart_item_key);
	}

	function is_cumulative($cart_item, $cart_item_key, $default = false) {
		global $woocommerce;
		//Check to make sure the item has not already been discounted by this module.  This could happen if update_totals is called more than once in the cart. 
		if (isset($woocommerce->cart->cart_contents[$cart_item_key]['discounts'])) {
			if (in_array($woocommerce->module_id, $woocommerce->cart->cart_contents[$cart_item_key]['discounts']['by'])) {
				return false;
			} elseif (count(array_intersect(array('simple_category', 'simple_membership'), $woocommerce->cart->cart_contents[$cart_item_key]['discounts']['by'])) > 0) {
				return true;
			}
		} else {
			return apply_filters('woocommerce_dynamic_pricing_is_cumulative', $default, $this->module_id, $cart_item, $cart_item_key);
		}
	}
?>