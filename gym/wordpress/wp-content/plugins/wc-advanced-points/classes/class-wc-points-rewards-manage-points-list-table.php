<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WP_List_Table' ) )
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class WC_Points_Rewards_Manage_Points_List_Table extends WP_List_Table {
	public function __construct() {

		parent::__construct(
			array(
				'singular' => __( 'Point', 'wc_advanced_points' ),
				'plural'   => __( 'Points', 'wc_advanced_points' ),
				'ajax'     => false,
				'screen'   => 'woocommerce_page_wc_points_rewards_manage_points',
			)
		);
	}

	public function get_bulk_actions() {

		$actions = array(
			'update' => __( 'Update', 'wc_advanced_points' ),
		);

		return $actions;
	}

	public function get_columns() {

		$columns = array(
			'cb'       => '<input type="checkbox" />',
			'customer' => __( 'Customer', 'wc_advanced_points' ),
			'points'   => __( 'Points', 'wc_advanced_points' ),
			'total'   => __( 'Total Point ( For Level )', 'wc_advanced_points' ),
			'update'   => __( 'Update', 'wc_advanced_points' ),
		);

		return $columns;
	}

	public function get_sortable_columns() {

		// really the only thing that makes sense to sort is the points column
		return array(
			'points' => array( 'points', false ),  // false because the inital sort direction is DESC so we want the first column click to sort ASC
		);
	}

	public function column_cb( $row ) {
		return '<input type="checkbox" name="user_id[]" value="' . $row->user_id . '" />';
	}

	public function column_default( $user_points, $column_name ) {

		switch ( $column_name ) {

			case 'customer':

				$customer_email = null;
				if ( $user_points->user_id ) {
					$customer_email = get_user_meta( $user_points->user_id, 'billing_email', true );
				}

				if ( $customer_email ) {

					$column_content = sprintf( '<a href="%s">%s</a>', get_edit_user_link( $user_points->user_id ), $customer_email );

				} else {

					$user = get_user_by( 'id', $user_points->user_id );

					$column_content = sprintf( '<a href="%s">%s</a>', get_edit_user_link( $user_points->user_id ), ( $user ) ? $user->user_login : __( 'Unknown', 'wc_advanced_points' ) );
				}

			break;

			case 'points':
				$column_content = $user_points->points_balance;
			break;
			
			case 'total':
				$column_content = (int)get_user_meta( $user_points->user_id , 'wc_points_level_user',true);
			break;

			case 'update':
				$column_content = '<input id="'.$user_points->user_id.'_value"  type="text" class="points_balance" name="points_balance" value="' . $user_points->points_balance . '" />
				<input class="pw_cart_submit" type="button" value="Update" data-id="'.$user_points->user_id.'">' ;
			break;

			default:
				$column_content = '';
			break;
		}

		return $column_content;
	}

	public function current_action() {


	}

	public function process_actions() {
		global $wc_points_rewards;

		// get the current action (if any)
		$action = $this->current_action();

		// get the set of users to operate on
		$user_ids = isset( $_REQUEST['user_id'] ) ? array_map( 'absint', (array) $_REQUEST['user_id'] ): array();

		// no action, or invalid action
		if ( false === $action || empty( $user_ids ) || ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'wc_points_rewards_update' ) && ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'bulk-points' ) ) ) {
			return;
		}

		$success_count = $error_count = 0;

		// process the users
		foreach ( $user_ids as $user_id ) {

			// perform the action
			switch ( $action ) {
				case 'update':
					if ( WC_Points_Rewards_Manager::set_points_balance( $user_id, $_REQUEST['points_balance'][ $user_id ], 'admin-adjustment' ) ) {
						$success_count++;
					} else {
						$error_count++;
					}
				break;
			}
		}

		// build the result message(s)
		switch ( $action ) {
			case 'update':
				if ( $success_count > 0 ) {
					$wc_points_rewards->admin_message_handler->add_message( sprintf( _n( '%d customer updated.', '%s customers updated.', $success_count, 'wc_points_rewards' ), $success_count ) );
				}
				if ( $error_count > 0 ) {
					$wc_points_rewards->admin_message_handler->add_message( sprintf( _n( '%d customer could not be updated.', '%s customers could not be updated.', $error_count, 'wc_points_rewards' ), $error_count ) );
				}
			break;
		}
	}


	/**
	 * Output any messages from the bulk action handling
	 *
	 * @since 1.0
	 */
	public function render_messages() {
		global $wc_points_rewards;

		if ( $wc_points_rewards->admin_message_handler->message_count() > 0 ) {
			echo '<div id="moderated" class="updated"><ul><li><strong>' . implode( '</strong></li><li><strong>', $wc_points_rewards->admin_message_handler->get_messages() ) . '</strong></li></ul></div>';
		}
	}


	/**
	 * Gets the current orderby, defaulting to 'user_id' if none is selected
	 *
	 * @since 1.0
	 */
	private function get_current_orderby() {

		$orderby = ( isset( $_GET['orderby'] ) ) ? $_GET['orderby'] : null;

		// order by points or default of user ID
		switch ( $orderby ) {
			case 'points': return 'points';
			default: return 'ID';
		}
	}


	/**
	 * Gets the current orderby, defaulting to 'DESC' if none is selected
	 *
	 * @since 1.0
	 */
	private function get_current_order() {
		return isset( $_GET['order'] ) ? $_GET['order'] : 'DESC';
	}


	/**
	 * Prepare the list of user points items for display
	 *
	 * @see WP_List_Table::prepare_items()
	 * @since 1.0
	 */
	public function prepare_items() {

		$this->process_actions();

		$per_page = $this->get_items_per_page( 'wc_points_rewards_manage_points_users_per_page' );

		$args = array(
			'orderby'     => $this->get_current_orderby(),
			'order'       => $this->get_current_order(),
			'offset'      => ( $this->get_pagenum() - 1 ) * $per_page,
			'number'      => $per_page,
			'count_total' => true,
		);

		// Filter: by customer
		$args = $this->add_filter_args( $args );

		$this->items = WC_Points_Rewards_Manager::get_all_users_points( $args );

		$this->set_pagination_args(
			array(
				'total_items' => WC_Points_Rewards_Manager::get_found_user_points(),
				'per_page'    => $per_page,
				'total_pages' => ceil( WC_Points_Rewards_Manager::get_found_user_points() / $per_page ),
			)
		);
	}
	
	private function add_filter_args( $args ) {
		global $wpdb;

		// filter by customer
		if ( isset( $_GET['_customer_user'] ) && $_GET['_customer_user'] > 0 ) {
			$userdata = get_userdata( $_GET['_customer_user'] );
			$args['search'] = $userdata->user_login;
		}

		return $args;
	}

	public function no_items() {
		if ( isset( $_REQUEST['s'] ) ) : ?>
			<p><?php _e( 'No user points found', 'wc_advanced_points' ); ?></p>
		<?php else : ?>
			<p><?php _e( 'User points will appear here for you to view and manage once you have customers.', 'wc_advanced_points' ); ?></p>
		<?php endif;
	}


	public function extra_tablenav( $which ) {
	}


} // end \WC_Pre_Orders_List_Table class
