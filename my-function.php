/*****************custom discount cart**************/

//Discount price first register
add_filter('woocommerce_cart_calculate_fees', 'Custom_price_new_customer');
/**
 * @param  $price   
 * @return $price
 */
function Custom_price_new_customer() {
	global $woocommerce;
    if (!is_user_logged_in()) return $price;
    $int = Check_user();
    $qty = $woocommerce->cart->get_cart_contents_count();
    //check if user has't order discount price
    
    if( $int<1 ) {    	
	 	$total_disc = 5;
	    WC()->cart->add_fee( 'Discount for new customer', -$total_disc );
    }
    return $price;
}
function Check_user(){
	$user = wp_get_current_user();
	$int = wc_get_customer_order_count( $user->ID );
	return $int;
}