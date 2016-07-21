<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WC_Points_Rewards_Product {

	public function __construct() {

		// add single product message immediately after product excerpt
		add_action( 'woocommerce_single_product_summary', array( $this, 'render_product_message' ) );

		// add variation message before the price is displayed
		add_action( 'woocommerce_single_product_summary', array( $this, 'add_variation_message_to_product_summary' ), 15 );

		// add the points message just before the variation price.
		add_filter( 'woocommerce_variation_price_html', array( $this, 'render_variation_message' ), 10, 2 );
		add_filter( 'woocommerce_variation_sale_price_html', array( $this, 'render_variation_message' ), 10, 2 );

		// delete transients
		add_action( 'woocommerce_delete_product_transients', array( $this, 'delete_transients' ) );
		//Add meta end product
		add_action( 'woocommerce_product_meta_end', array( $this,'pw_woocommerc_show_brand' )) ;		
	}

	public function pw_woocommerc_show_brand() {
		if ( !is_user_logged_in() ) 	
			return;
		global $post;
		$product_id= $post->ID;
		if ( is_singular( 'product' ) )
		{
			$points_total = (int)get_user_meta( get_current_user_id() , 'wc_points_level_user',true);
			
			$matched_products = get_posts(
				array(
					'post_type'  => 'level',
					'numberposts' 	=> -1,
					'post_status' 	=> 'publish',
					'fields' 		=> 'ids',								
					'no_found_rows' => true,
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
				)
			);
			$discunt='';
			if(count($matched_products)>0)
			{
				foreach($matched_products as $pr)
				{
					$pw_level_name=get_post_meta($pr,'level_name',true);
					$pw_level_discount_type=get_post_meta($pr,'level_discount_type',true);
					$level_discount = get_post_meta( $pr , 'level_discount', true );
					$level_discount_applyto=get_post_meta($pr,'level_discount_applyto',true);
					if($pw_level_discount_type=="pw_level_product_category" || $pw_level_discount_type=="pw_level_product_tag" )
					{
						if($pw_level_discount_type=="pw_level_product_category")
							$terms = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));
						else
							$terms = wp_get_post_terms($product_id, 'product_tag', array('fields' => 'ids'));
						$result = array_intersect($level_discount_applyto, $terms);
						if(count($result)==0)					
							return;
					}
					elseif($pw_level_discount_type=="pw_level_product")
					{
						if (!in_array($product_id, $level_discount_applyto))
							return;
					}
					if ( false !== strpos( $level_discount, '%' ) )
						$discunt=str_replace( '{discount}', $level_discount , get_option("wc_points_rewards_single_product_level_message") );
					else
						$discunt=str_replace( '{discount}', $level_discount .get_woocommerce_currency_symbol(), get_option("wc_points_rewards_single_product_level_message") );
					//?Show Message
					if(get_option( 'wc_points_level_message_type' )=="graphical_1"){
						$message='<div class="point-cnt point-style1">
									<div class="number-cnt">
										<div class="number-txt">'.$pw_level_name.'</div>
										<div class="number-desc">'.__('Level','wc_advanced_points').'</div>
									</div>
									<div class="desc-cnt">'.$discunt.'</div>
								</div>';
					}
					elseif(get_option( 'wc_points_level_message_type' )=="graphical_2"){
						
						$message='<div class="point-cnt point-style2 ">
									<div class="number-txt">'.$pw_level_name.'</div>
									<div class="number-desc-cnt">
										<div class="number-desc">'.__('Level','wc_advanced_points').'</div>            
										<div class="desc-cnt">'.$discunt.'</div>
									</div>
								</div>';			
					}
					elseif(get_option( 'wc_points_level_message_type' )=="graphical_3"){
						
						$message='
								<div class="point-cnt point-style3">
									<div class="number-cnt">
										<div class="number-txt">'.$pw_level_name.'</div>
										
									</div>
									<div class="desc-cnt">
										<div class="number-desc">'.__('Level','wc_advanced_points').'</div>
										'.$discunt.'
									</div>
								</div>		
						';			
					}		
					else{
						$message="<div class='woocommerce-info'>".__("Level : ","wc_advanced_points"). $pw_level_name."<br/>".$discunt."</div>";
					}
					echo $message;
				break;
				}
			}
		}			
	}	
/*	public function pw_woocommerc_show_brand() {
		global $post;
		$product_id= $post->ID;
		if ( is_singular( 'product' ) )
		{
			$points_total = (int)get_user_meta( get_current_user_id() , 'wc_points_level_user',true);
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
			$query = new WP_Query( $args );
			$discunt='';
			if ( $query->have_posts() ) 
			{
				$query->the_post();	
				$pw_level_name=get_post_meta(get_the_ID(),'level_name',true);
				$pw_level_discount_type=get_post_meta(get_the_ID(),'level_discount_type',true);
				$level_discount = get_post_meta( get_the_ID() , 'level_discount', true );
				$level_discount_applyto=get_post_meta(get_the_ID(),'level_discount_applyto',true);
				
				if($pw_level_discount_type=="pw_level_product_category" || $pw_level_discount_type=="pw_level_product_tag" )
				{
					if($pw_level_discount_type=="pw_level_product_category")
						$terms = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));
					else
						$terms = wp_get_post_terms($product_id, 'product_tag', array('fields' => 'ids'));
					$result = array_intersect($level_discount_applyto, $terms);
					if(count($result)==0)					
					{
						wp_reset_query();
						return;
					}
				}
				elseif($pw_level_discount_type=="pw_level_product")
				{
					if (!in_array($product_id, $level_discount_applyto))
					{
						wp_reset_query();
						return;
					}
				}
				if ( false !== strpos( $level_discount, '%' ) )
					$discunt=str_replace( '{discount}', $level_discount , get_option("wc_points_rewards_single_product_level_message") );
				else
					$discunt=str_replace( '{discount}', $level_discount .get_woocommerce_currency_symbol(), get_option("wc_points_rewards_single_product_level_message") );
				//ُShow Message
				if(get_option( 'wc_points_level_message_type' )=="graphical_1"){
					$message='<div class="point-cnt point-style1">
								<div class="number-cnt">
									<div class="number-txt">'.$pw_level_name.'</div>
									<div class="number-desc">'.__('Level','wc_advanced_points').'</div>
								</div>
								<div class="desc-cnt">'.$discunt.'</div>
							</div>';
				}
				elseif(get_option( 'wc_points_level_message_type' )=="graphical_2"){
					
					$message='<div class="point-cnt point-style2 ">
								<div class="number-txt">'.$pw_level_name.'</div>
								<div class="number-desc-cnt">
									<div class="number-desc">'.__('Level','wc_advanced_points').'</div>            
									<div class="desc-cnt">'.$discunt.'</div>
								</div>
							</div>';			
				}
				elseif(get_option( 'wc_points_level_message_type' )=="graphical_3"){
					
					$message='
							<div class="point-cnt point-style3">
								<div class="number-cnt">
									<div class="number-txt">'.$pw_level_name.'</div>
									
								</div>
								<div class="desc-cnt">
									<div class="number-desc">'.__('Level','wc_advanced_points').'</div>
									'.$discunt.'
								</div>
							</div>		
					';			
				}		
				else{
					$message="<div class='woocommerce-info'>".__("Level : ","wc_advanced_points"). $pw_level_name."<br/>".$discunt."</div>";
				}
				echo $message;
			}
			wp_reset_query();
		}
	}
*/
	public function render_product_message() {
		global $product;

		// only display on single product page
		if ( ! is_product() )
			return;
			
		if(isset( $product->wc_point_disable ) )
			return true;
			
		$points_earned = self::get_points_earned_for_product_purchase( $product );
		
		if(get_option( 'wc_points_rewards_message_type' )=="graphical_1"){
			$message='<div class="point-cnt point-style1">
						<div class="number-cnt">
							<div class="number-txt">'.$points_earned.'</div>
							<div class="number-desc">'.__('Point','wc_advanced_points').'</div>
						</div>
						<div class="desc-cnt">'.__('By purchasing this product','wc_advanced_points').'</div>
					</div>
			';
		}
		elseif(get_option( 'wc_points_rewards_message_type' )=="graphical_2"){
			
			$message='
					<div class="point-cnt point-style2 ">
						<div class="number-txt">'.$points_earned.'</div>
						<div class="number-desc-cnt">
							<div class="number-desc">'.__('Point','wc_advanced_points').'</div>            
							<div class="desc-cnt">'.__('By purchasing this product','wc_advanced_points').'</div>
						</div>
					</div>			
			';			
		}
		elseif(get_option( 'wc_points_rewards_message_type' )=="graphical_3"){
			
			$message='
					<div class="point-cnt point-style3">
						<div class="number-cnt">
							<div class="number-txt">'.$points_earned.'</div>
							
						</div>
						<div class="desc-cnt">
							<div class="number-desc">'.__('Point','wc_advanced_points').'</div>
							'.__('By purchasing this product','wc_advanced_points').'
						</div>
					</div>		
			';			
		}		
		else{
			$message = get_option( 'wc_points_rewards_single_product_message' );
			// replace message variables
			$message = $this->replace_message_variables( $message, $product );
		}		
		// bail if none available
		if ( ! $message || ! $points_earned ) {
			return;
		}




		echo apply_filters( 'wc_points_rewards_single_product_message', $message );
	}

	public function add_variation_message_to_product_summary( ) {
		global $product;

		// make sure the product has variations (otherwise it's probably a simple product)
		if ( method_exists( $product, 'get_available_variations' ) ) {
			// get variations
			$variations = $product->get_available_variations();

			// find the variation with the most points
			$points = $this->get_highest_points_variation( $variations, $product->post->ID );

			$message = '';
			// if we have a points value let's create a message; other wise don't print anything
			if ( $points ) {
				$message = $this->create_variation_message_to_product_summary( $points );
			}

			echo $message;
		}
	}


	public function get_highest_points_variation( $variations, $product_id ) {

		// get transient name
		$transient_name = $this->transient_highest_point_variation( $product_id );

		// see if we already have this data saved
		$points = get_transient( $transient_name );

		// if we don't have anything saved we'll have to figure it out
		if( $points === false ) {
		// if (true) {
			// find the variation with the most points
			$highest = array( 'key' => 0, 'points' => 0 );
			foreach ( $variations as $key => $variation ) {
				// get points
				$points = self::get_points_earned_for_product_purchase( $variation['variation_id'] );

				// if this is the highest points value save it
				if ( $points > $highest['points'] ) {
					$highest = array ( 'key' => $key, 'points' => $points );
				}
			}

			$points = $highest['points'];

			// save this for future use
			set_transient( $transient_name, $points, YEAR_IN_SECONDS );
		}

		return $points;
	}


	public function create_variation_message_to_product_summary( $points ) {
		// write the message
		$message = sprintf(
			__( 'Earn up to <strong>%d</strong> points.', 'wc_advanced_points' ),
			$points
		);

		// wrap it
		$message = "<p class='points'>" . $message . "</p>";

		return $message;
	}

	public function render_variation_message( $price_html, $product ) {
		if(!isset( $product->wc_point_disable ) ){
			if ( ! is_product() ) {
				return $price_html;
			}

			$message = get_option( 'wc_points_rewards_single_product_message' );

			$points_earned = self::get_points_earned_for_product_purchase( $product );

			// bail if none available
			if ( ! $message || ! $points_earned ) {
				return $price_html;
			}

			// replace message variables
			$price_html = $this->replace_message_variables( $message, $product ) . $price_html;

			return $price_html;
		}
	}


	private function replace_message_variables( $message, $product ) {

		global $wc_points_rewards;

		$points_earned = self::get_points_earned_for_product_purchase( $product );

		if ( method_exists( $product, 'get_variation_price' ) && $product->min_variation_price != $product->max_variation_price ) {
			return '';
		}

		// points earned
		$message = str_replace( '{points}', number_format_i18n( $points_earned ), $message );

		// points label
		$message = str_replace( '{points_label}', $wc_points_rewards->get_points_label( $points_earned ), $message );
		if ( method_exists( $product, 'get_variation_price' ) ) {
			$message = '
					<div class="woocommerce-info">
						<span class="wc-points-rewards-product-variation-message">' . $message . '</span>
					</div>';
		} else {
			$message = '
					<div class="woocommerce-info">
						<span class="wc-points-rewards-product-message">' . $message . '</span>
					</div>';
		}
		return $message;
	}


	public static function get_points_earned_for_product_purchase( $product ) {
	
		if(isset( $product->wc_point_disable ) )
			return ;
		// if we don't have a product object let's try to make one (hopefully they gave us the ID)
		if ( ! is_object( $product ) ) {
			$product = get_product( $product );
		}

		// check if earned points are set at product-level
		$points = self::get_product_points( $product );

		if ( is_numeric( $points ) ) {
			return $points;
		}

		// check if earned points are set at category-level
		$points = self::get_category_points( $product );

		if ( is_numeric( $points ) ) {
			return $points;
		}

		// otherwise, show the default points set for the price of the product
		return WC_Points_Rewards_Manager::calculate_points( $product->get_price() );
	}

	private static function get_product_points( $product ) {

		if ( empty( $product->variation_id ) ) {

			// simple or variable product, for variable product return the maximum possible points earned
			if ( method_exists( $product, 'get_variation_price' ) ) {
				$points = ( isset( $product->wc_max_points_earned ) ) ? $product->wc_max_points_earned : '';
			} else {
				$points = ( isset( $product->wc_points_earned ) ) ? $product->wc_points_earned : '';
			}

		} else {

			// variation product
			$points = ( isset( $product->product_custom_fields['_wc_points_earned'][0] ) ) ? $product->product_custom_fields['_wc_points_earned'][0] : '';

			// if points aren't set at variation level, use them if they're set at the product level
			if ( '' === $points ) {
				$points = ( isset( $product->parent->wc_points_earned ) ) ? $product->parent->wc_points_earned : '';
			}
		}

		// if a percentage modifier is set, adjust the points for the product by the percentage
		if ( false !== strpos( $points, '%' ) ) {
			$points = self::calculate_points_multiplier( $points, $product );
		}

		return $points;
	}


	private static function get_category_points( $product ) {

		$category_ids = woocommerce_get_product_terms( $product->id, 'product_cat', 'ids' );

		$category_points = '';

		foreach ( $category_ids as $category_id ) {

			$points = get_woocommerce_term_meta( $category_id, '_wc_points_earned', true );

			// if a percentage modifier is set, adjust the default points earned for the category by the percentage
			if ( false !== strpos( $points, '%' ) )
				$points = self::calculate_points_multiplier( $points, $product );

			if ( ! is_numeric( $points ) )
				continue;

			// in the case of a product being assigned to multiple categories with differing points earned, we want to return the biggest one
			if ( $points >= (int) $category_points )
				$category_points = $points;
		}

		return $category_points;
	}

	private static function calculate_points_multiplier( $percentage, $product ) {

		$percentage = str_replace( '%', '', $percentage ) / 100;

		return $percentage * WC_Points_Rewards_Manager::calculate_points( $product->get_price() );
	}


	public static function get_maximum_points_discount_for_product( $product ) {

		if ( ! is_object( $product ) )
			$product = get_product( $product );

		// check if max discount is set at product-level
		$max_discount = self::get_product_max_discount( $product );

		if ( is_numeric( $max_discount ) )
			return $max_discount;

		// check if max discount is are set at category-level
		$max_discount = self::get_category_max_discount( $product );

		if ( is_numeric( $max_discount ) )
			return $max_discount;

		// limit the discount available by the global maximum discount if set
		$max_discount = get_option( 'wc_points_rewards_max_discount' );

		// if the global max discount is a percentage, calculate it by multiplying the percentage by the product price
		if ( false !== strpos( $max_discount, '%' ) )
			$max_discount = self::calculate_discount_modifier( $max_discount, $product );

		if ( is_numeric( $max_discount ) )
			return $max_discount;

		// otherwise, there is no maximum discount set
		return '';
	}


	private static function get_product_max_discount( $product ) {

		if ( empty( $product->variation_id ) ) {

			// simple product
			$max_discount = ( isset( $product->wc_points_max_discount ) ) ? $product->wc_points_max_discount : '';

		} else {
			// variable product
			$max_discount = ( isset( $product->product_custom_fields['_wc_points_max_discount'][0] ) ) ? $product->product_custom_fields['_wc_points_max_discount'][0] : '';
		}

		// if a percentage modifier is set, set the maximum discount using the price of the product
		if ( false !== strpos( $max_discount, '%' ) )
			$max_discount = self::calculate_discount_modifier( $max_discount, $product );

		return $max_discount;
	}

	private static function get_category_max_discount( $product ) {

		$category_ids = woocommerce_get_product_terms( $product->id, 'product_cat', 'ids' );

		$category_max_discount = '';

		foreach ( $category_ids as $category_id ) {

			$max_discount = get_woocommerce_term_meta( $category_id, '_wc_points_max_discount', true );

			// if a percentage modifier is set, set the maximum discount using the price of the product
			if ( false !== strpos( $max_discount, '%' ) )
				$max_discount = self::calculate_discount_modifier( $max_discount, $product );

			// get the minimum discount if the product belongs to multiple categories with differing maximum discounts
			if ( ! is_numeric( $category_max_discount ) || $max_discount < $category_max_discount )
				$category_max_discount = $max_discount;
		}

		return $category_max_discount;
	}

	private static function calculate_discount_modifier( $percentage, $product ) {

		$percentage = str_replace( '%', '', $percentage ) / 100;

		return $percentage * $product->get_price();
	}

	public function transient_highest_point_variation( $product_id ) {
		return 'wc_points_rewards_highest_point_variation_' . $product_id;
	}


	public function delete_transients( $product_id ) {
		delete_transient( $this->transient_highest_point_variation( $product_id ) );
	}


} // end \WC_Points_Rewards_Product class
