<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WC_Points_Rewards_Product_Admin {

	public function __construct() {

	    add_action( 'woocommerce_process_product_meta_subscription',   array( $this, 'save_simple_product_fields' ) );

	    add_action( 'woocommerce_save_product_subscription_variation', array( $this, 'save_variable_product_fields' ) );

		add_action( 'woocommerce_product_options_general_product_data', array( $this, 'render_simple_product_fields' ) );

		add_action( 'woocommerce_process_product_meta_simple',   array( $this, 'save_simple_product_fields' ) );

		add_action( 'woocommerce_product_after_variable_attributes', array( $this, 'render_variable_product_fields' ), 15, 2 );

		add_action( 'woocommerce_save_product_variation', array( $this, 'save_variable_product_fields' ) );

		add_action( 'woocommerce_variable_product_bulk_edit_actions', array( $this, 'add_variable_product_bulk_edit_points_action' ) );

		add_action( 'woocommerce_product_bulk_edit_end', array( $this, 'add_points_field_bulk_edit' ) );

		add_action( 'woocommerce_product_bulk_edit_save', array( $this, 'save_points_field_bulk_edit' ) );

		add_action( 'product_cat_add_form_fields', array( $this, 'render_product_category_fields' ) );

		add_action( 'product_cat_edit_form_fields', array( $this, 'render_edit_product_category_fields' ) );

		add_action( 'create_product_cat', array( $this, 'save_product_category_points_field' ) );
		add_action( 'edited_product_cat', array( $this, 'save_product_category_points_field' ) );

		add_filter( 'manage_edit-product_cat_columns', array( $this, 'add_product_category_list_table_points_column_header' ) );

		add_filter( 'manage_product_cat_custom_column', array( $this, 'add_product_category_list_table_points_column' ), 10, 3 );
	}

	public function render_simple_product_fields() {

		woocommerce_wp_text_input( array(
				'id'            => '_wc_points_earned',
				'wrapper_class' => 'show_if_simple',
				'class'         => 'short',
				'label'         => __( 'Points Earned', 'wc_advanced_points' ),
				'description'   => __( 'Enter Number or %' ),
				'desc_tip'      => true,
				'type'          => 'text',
			)
		);
		
		echo '<span class="description">'.__('You can set point(s) by number or %. If you set % the point will be calculated based on x% of product price. For example suppose that you set 50%, the product price is $10 and you set "100 Points = $1" (Points settings - Earn Points Conversion Rate field) so the point for this product will be calculated through this formula: (50% * ( $10 ))*100 = 500 Points.','wc_advanced_points').'<br />'.__('But if you set point by number, this number will be used for earning point(s).','wc_advanced_points').'<br />'.__('<strong>Note : </strong> The point calculating order is 1- Product 2- Category 3- Global setting</span>','wc_advanced_points').'</span>';

		woocommerce_wp_checkbox(array(
			'id' => '_wc_point_disable',
			'wrapper_class' => 'show_if_simple show_if_variable',
			'label' => __( 'Point Disable', 'wc_advanced_points' ),
			'description' => __( 'Yes,Please', 'wc_advanced_points' ),
			)
		);			
	}


	public function save_simple_product_fields( $post_id ) {

		if ( '' !== $_POST['_wc_points_earned'] )
			update_post_meta( $post_id, '_wc_points_earned', stripslashes( $_POST['_wc_points_earned'] ) );
		else
			delete_post_meta( $post_id, '_wc_points_earned' );

		if ( isset($_POST['_wc_point_disable']) )
			update_post_meta( $post_id, '_wc_point_disable', stripslashes( $_POST['_wc_point_disable'] ) );
		else
			delete_post_meta( $post_id, '_wc_point_disable' );	
	}

	public function render_variable_product_fields( $loop, $variation_data ) {
		global $woocommerce;

		$points_earned = ( isset( $variation_data['_wc_points_earned'][0] ) ) ? $variation_data['_wc_points_earned'][0] : '';
		$max_discount  = ( isset( $variation_data['_wc_points_max_discount'][0] ) ) ? $variation_data['_wc_points_max_discount'][0] : '';

		$points_earned_description = __('You can set point(s) by number or %. If you set % the point will be calculated based on x% of product price. For example suppose that you set 50%, the product price is $10 and you set "100 Points = $1" (Points settings - Earn Points Conversion Rate field) so the point for this product will be calculated through this formula: (50% * ( $10 ))*100 = 500 Points.','wc_advanced_points').'<br />'.__('But if you set point by number, this number will be used for earning point(s).','wc_advanced_points').'<br />'.__('<strong>Note : </strong> The point calculating order is 1- Product 2- Category 3- Global setting</span>','wc_advanced_points');


		?>
			<tr>
				<td>
					<img style="float: right;" class="help_tip" data-tip="<?php echo esc_attr( $points_earned_description ); ?>" src="<?php echo esc_url( $woocommerce->plugin_url() . '/assets/images/help.png' ); ?>" height="16" width="16" />
					<label><?php _e( 'Points Earned', 'wc_advanced_points' ); ?></label>
					<input type="number" size="5" name="variable_points_earned[<?php echo esc_attr( $loop ); ?>]" value="<?php echo esc_attr( $points_earned ); ?>" step="any" min="0" placeholder="<?php _e( 'Variation Points Earned', 'wc_advanced_points' ); ?>" />
				</td>
		<?php
	}


	public function save_variable_product_fields( $variation_id ) {

		// find the index for the given variation ID and save the associated points earned
		$index = array_search( $variation_id, $_POST['variable_post_id'] );

		if ( false !== $index ) {

			// points earned
			if ( '' !== $_POST['variable_points_earned'][ $index ] )
				update_post_meta( $variation_id, '_wc_points_earned', stripslashes( $_POST['variable_points_earned'][ $index ] ) );
			else
				delete_post_meta( $variation_id, '_wc_points_earned' );

		}
	}


	public function add_variable_product_bulk_edit_points_action() {
		echo '<option value="variable_points_earned">' . __( 'Points Earned', 'wc_advanced_points' ) . '</option>';
	}


	public function add_points_field_bulk_edit() {
		?>
			<div class="inline-edit-group">
				<label class="alignleft">
					<span class="title"><?php _e( 'Points Earned', 'wc_advanced_points' ); ?></span>
						<span class="input-text-wrap">
							<select class="change_points_earned change_to" name="change_points_earned">
								<?php
								$options = array(
									''  => __( 'No Change', 'wc_advanced_points' ),
									'1' => __( 'Change to:', 'wc_advanced_points' ),
									'2' => __( 'Increase by (fixed amount or %):', 'wc_advanced_points' ),
									'3' => __( 'Decrease by (fixed amount or %):', 'wc_advanced_points' )
								);
								foreach ( $options as $key => $value ) {
									echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
								}
								?>
							</select>
						</span>
				</label>
				<label class="alignright">
					<input type="text" name="_wc_points_earned" class="text points_earned" placeholder="<?php _e( 'Enter Points Earned', 'wc_advanced_points' ); ?>" value="" />
				</label>
			</div>
		<?php
	}


	/**
	 * Save the 'Points Earned' bulk edit field
	 *
	 * @since 1.0
	 */
	public function save_points_field_bulk_edit( $product ) {

		if ( ! empty( $_REQUEST['change_points_earned'] ) ) {

			$option_selected                = absint( $_REQUEST['change_points_earned'] );
			$requested_points_earned_change = stripslashes( $_REQUEST['_wc_points_earned'] );
			$current_points_earned          = ( ! empty( $product->wc_points_earned ) ) ? $product->wc_points_earned : '';

			switch ( $option_selected ) {

				// change 'Points Earned' to fixed amount
				case 1 :
					$new_points_earned = $requested_points_earned_change;
					break;

				// increase 'Points Earned' by fixed amount/percentage
				case 2 :
					if ( false !== strpos( $requested_points_earned_change, '%' ) ) {
						$percent = str_replace( '%', '', $requested_points_earned_change ) / 100;
						$new_points_earned = $current_points_earned + ( $current_points_earned * $percent );
					} else {
						$new_points_earned = $current_points_earned + $requested_points_earned_change;
					}
					break;

				// decrease 'Points Earned' by fixed amount/percentage
				case 3 :
					if ( false !== strpos( $requested_points_earned_change, '%' ) ) {
						$percent = str_replace( '%', '', $requested_points_earned_change ) / 100;
						$new_points_earned = $current_points_earned - ( $current_points_earned * $percent );
					} else {
						$new_points_earned = $current_points_earned - $requested_points_earned_change;
					}
					break;
			}

			// update to new Points Earned if different than current Points Earned
			if ( ! empty( $new_points_earned ) && $new_points_earned != $current_points_earned )
				update_post_meta( $product->id, '_wc_points_earned', $new_points_earned );
		}
	}


	public function render_product_category_fields() {

		$this->get_product_category_fields_html();
	}


	public function render_edit_product_category_fields( $term ) {

		// get points earned / maximum points discount from product category meta
		$points_earned = get_woocommerce_term_meta( $term->term_id, '_wc_points_earned', true );

		$this->get_product_category_fields_html( $points_earned );

	}


	private function get_product_category_fields_html( $points = '') {
		global $woocommerce;

		$points_earned_description = __('Enter number or %','wc_advanced_points');

		?>
			<tr class="formfield">
				<th scope="row" valign="top"><label><?php _e( 'Points Earned', 'wc_advanced_points' ); ?></label></th>
				<td>
					<input type="text" name="_wc_points_earned" value="<?php echo esc_attr( $points ); ?>" step="any" min="0" placeholder="<?php _e( 'Category Points Earned', 'wc_advanced_points' ); ?>" />
                    
					<img class="help_tip" data-tip="<?php echo esc_attr( $points_earned_description ); ?>" src="<?php echo esc_url( $woocommerce->plugin_url() . '/assets/images/help.png' ); ?>" height="16" width="16" />
                    <br />
					<?php
                    	echo '<span class="description">'.__('You can set point(s) by number or %. If you set % the point will be calculated based on x% of product price. For example suppose that you set 50%, the product price is $10 and you set "100 Points = $1" (Points settings - Earn Points Conversion Rate field) so the point for this product will be calculated through this formula: (50% * ( $10 ))*100 = 500 Points.','wc_advanced_points').'<br />'.__('But if you set point by number, this number will be used for earning point(s).','wc_advanced_points').'<br />'.__('<strong>Note : </strong> The point calculating order is 1- Product 2- Category 3- Global setting</span>','wc_advanced_points').'</span>';

					?>
				</td>
			</tr>
		<?php
	}

	public function save_product_category_points_field( $term_id ) {

		// points earned
		if ( isset( $_POST['_wc_points_earned'] ) && '' !== $_POST['_wc_points_earned'] )
			update_woocommerce_term_meta( $term_id, '_wc_points_earned', $_POST['_wc_points_earned'] );
		else
			delete_woocommerce_term_meta( $term_id, '_wc_points_earned' );

		if ( isset($_POST['_wc_point_disable']) )
			update_post_meta( $post_id, '_wc_point_disable', stripslashes( $_POST['_wc_point_disable'] ) );
		else
			delete_post_meta( $post_id, '_wc_point_disable' );	
	}


	public function add_product_category_list_table_points_column_header( $columns ) {

		$new_columns = array();

		foreach ( $columns as $column_key => $column_title ) {

			$new_columns[ $column_key ] = $column_title;

			// add column header immediately after 'Slug'
			if ( 'slug' == $column_key )
				$new_columns['points_earned'] = __( 'Points Earned', 'wc_advanced_points' );
		}

		return $new_columns;
	}


	public function add_product_category_list_table_points_column( $columns, $column, $term_id ) {

		$points_earned = get_woocommerce_term_meta( $term_id, '_wc_points_earned' );

		if ( 'points_earned' == $column )
			echo ( '' !== $points_earned ) ? esc_html( $points_earned ) : '&mdash;';

		return $columns;
	}


} // end \WC_Points_Rewards_Admin class
