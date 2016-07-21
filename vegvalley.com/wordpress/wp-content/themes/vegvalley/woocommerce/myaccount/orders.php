<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>
<?php
	global $WooCommerce; 
	$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
    'order-product-name'  => __( 'product', 'woocommerce' ),
    'order-product-price'  => __( 'price', 'woocommerce' ),
    'order-product-quantily'  => __( 'quatily', 'woocommerce' ),
    'order-total'   => __( 'Total', 'woocommerce' ),
    'order-date'    => __( 'Date', 'woocommerce' ),   
) );
?>
<?php if ( $has_orders ) : ?>

	<table class="woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
				<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
					<th class="<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php 
				$products = array();
			    $order_n = $customer_orders->orders;
				foreach ($order_n as  $value) {
					    	$items_n = $value->get_items();
					    	$date_n = date_i18n( get_option( 'date_format' ), strtotime( $value->order_date ) );
					    	foreach($items_n as $key => $item) {	
								/*if(isset($products[$item['product_id']])){
								   $products[$item['product_id']]['qty'] += $item['qty'];
								   $products[$item['product_id']]['total'] += $item['line_total'];
								}else{
*/								   $products[]/*[$item['product_id']]*/ = array(
								     'id'=>$item['product_id'],
								     'name'=>$item['name'],
								     'qty'=> $item['qty'],
								     'total'=> $item['line_total'],
								     'date'=> $date_n,
								     'price'=> ($item['line_total']/$item['qty']),
								     'order_item_id'=>$key
								   	);  
								//}
					    	}
					    }
					foreach ( $customer_orders->orders as $customer_order ) :
					    $order      = wc_get_order( $customer_order );
					    $item_count = $order->get_item_count();
					    $orders = new WC_Order( $order->id);//old
					    //$items = $orders->get_items();
					    /*for ($i=0; $i < $order_c ; $i++) { 
					    	$items = $orders->get_items();
					    	foreach($items as $key => $item) {
					        //print_r($item);
								if(isset($products[$item['product_id']])){
								   $products[$item['product_id']]['qty'] += $item['qty'];
								   $products[$item['product_id']]['total'] += $item['line_total'];
								}else{
								   $products[$item['product_id']] = array(
								     'id'=>$item['product_id'],
								     'name'=>$item['name'],
								     'qty'=> $item['qty'],
								     'total'=> $item['line_total']
								   	);  
								}
					    	}
					    }*/
					   
					endforeach;
				?>
				<tr class="order">
					<?php foreach ( $products as $product ) : ?>
					<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
						<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
													
							<?php elseif ( 'order-product-name' === $column_id ) : ?>
								<?php echo $product['name']; ?>
							
							<?php elseif ( 'order-product-price' === $column_id ) : ?>
								<?php echo wc_price(  $product['price'], $args = array() ); ?>

							<?php
								elseif('order-product-quantily' === $column_id ) :
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "order[{$order->id}][qty]",
										'input_value' => $product['qty'],
										'max_value'   => $product['qty'],
										'min_value'   => '0'
									), false );

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity );
							?>
							
							<?php elseif ( 'order-total' === $column_id ) :?>
								<?php echo sprintf( __( '%s', 'woocommerce' ),wc_price(  $product['total'], $args = array() ), $product['qty'] ); ?>

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo date( 'Y-m-d', strtotime( $product['date'] ) ); ?>" title="<?php echo esc_attr( strtotime( $product['date'] ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $product['date'] ) ); ?></time>

							<?php elseif ( 'order-status' === $column_id ) : ?>
								<?php echo wc_get_order_status_name( $order->get_status() ); ?>

							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php _e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( $current_page !== intval( $customer_orders->max_num_pages ) ) : ?>
				<a class="woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php _e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php _e( 'Go Shop', 'woocommerce' ) ?>
		</a>
		<?php _e( 'No order has been made yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
