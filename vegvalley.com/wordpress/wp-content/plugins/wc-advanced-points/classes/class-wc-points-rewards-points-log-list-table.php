<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WP_List_Table' ) )
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class WC_Points_Rewards_Points_Log_List_Table extends WP_List_Table {

	public function __construct() {

		parent::__construct(
			array(
				'singular' => __( 'Point', 'wc_advanced_points' ),
				'plural'   => __( 'Points', 'wc_advanced_points' ),
				'ajax'     => false,
				'screen'   => 'woocommerce_page_wc_points_rewards_points_log',
			)
		);
	}


	public function get_columns() {

		$columns = array(
			'customer' => __( 'Customer', 'wc_advanced_points' ),
			'points'   => __( 'Points', 'wc_advanced_points' ),
			'event'    => __( 'Event', 'wc_advanced_points' ),
			'date'     => __( 'Date', 'wc_advanced_points' ),
		);

		return $columns;
	}


	public function get_sortable_columns() {

		return array(
			'points' => array( 'points', false ),  // false because the inital sort direction is DESC so we want the first column click to sort ASC
			'date'   => array( 'date', false ),    // same logic as order_date
		);
	}


	public function column_default( $log_entry, $column_name ) {

		switch ( $column_name ) {

			case 'customer':

				$customer_email = null;
				if ( $log_entry->user_id ) {
					$customer_email = get_user_meta( $log_entry->user_id, 'billing_email', true );
				}

				if ( $customer_email ) {

					$column_content = sprintf( '<a href="%s">%s</a>', get_edit_user_link( $log_entry->user_id ), $customer_email );

				} else {

					$user = get_user_by( 'id', $log_entry->user_id );

					$column_content = sprintf( '<a href="%s">%s</a>', get_edit_user_link( $log_entry->user_id ), ( $user ) ? $user->user_login : __( 'Unknown', 'wc_points_rewards' ) );
				}

			break;

			case 'points':
				// add a '+' sign when needed
				$column_content = ( $log_entry->points > 0 ? '+' : '' ) . $log_entry->points;
			break;

			case 'event':
				$column_content = $log_entry->description;
			break;

			case 'date':
				$column_content =  '<abbr title="' . esc_attr( $log_entry->date_display ) . '">' . esc_html( $log_entry->date_display_human ) . '</abbr>';
			break;

			default:
				$column_content = '';
			break;
		}

		return $column_content;
	}


	/**
	 * Gets the current orderby, defaulting to 'date' if none is selected
	 */
	private function get_current_orderby() {
		return isset( $_GET['orderby'] ) ? $_GET['orderby'] : 'date';
	}


	/**
	 * Gets the current orderby, defaulting to 'DESC' if none is selected
	 */
	private function get_current_order() {
		return isset( $_GET['order'] ) ? $_GET['order'] : 'DESC';
	}


	/**
	 * Prepare the list of points history items for display
	 *
	 * @see WP_List_Table::prepare_items()
	 * @since 1.0
	 */
	public function prepare_items() {
		global $wc_points_rewards, $wpdb;
                        
		$per_page = $this->get_items_per_page( 'wc_points_rewards_points_log_events_per_page' );

		// main query args
		$args = array(
			'orderby' => array(
				'field' => $this->get_current_orderby(),
				'order' => $this->get_current_order(),
			),
			'per_page'         => $per_page,
			'paged'            => $this->get_pagenum(),
			'calc_found_rows' => true,
		);

		// Filter: points event log by customer, event type or event date
		$args = $this->add_filter_args( $args );

		// items as array
		$this->items = WC_Points_Rewards_Points_Log::get_points_log_entries( $args );

		// total number of items for pagination purposes
		$found_items = WC_Points_Rewards_Points_Log::$found_rows;

		$this->set_pagination_args(
			array(
				'total_items' => $found_items,
				'per_page'    => $per_page,
				'total_pages' => ceil( $found_items / $per_page ),
			)
		);
	}


	private function add_filter_args( $args ) {
		global $wpdb;

		// filter by customer user
		if ( isset( $_GET['_customer_user'] ) && $_GET['_customer_user'] > 0 ) {
			$args['user'] = $_GET['_customer_user'];
		}

		// filter by event type
		if ( isset( $_GET['_event_type'] ) && $_GET['_event_type'] ) {
			$args['event_type'] = $_GET['_event_type'];
		}

		// filter by event log date
		if ( isset( $_GET['date'] ) && $_GET['date'] ) {

			$year = substr( $_GET['date'], 0, 4 );
			$month = ltrim( substr( $_GET['date'], 4, 2 ), '0' );

			$args['where'][] = $wpdb->prepare( 'YEAR( date ) = %s AND MONTH( date ) = %s', $year, $month );
		}

		return $args;
	}


	public function no_items() {

		if ( isset( $_REQUEST['s'] ) ) : ?>
			<p><?php _e( 'No log entries found', 'wc_advanced_points' ); ?></p>
		<?php else : ?>
			<p><?php _e( 'Point log entries will appear here for you to view and manage.', 'wc_advanced_points' ); ?></p>
		<?php endif;
	}


	public function extra_tablenav( $which ) {
		global $woocommerce;

		if ( 'top' == $which ) {
			echo '<div class="alignleft actions">';

			// Customers, products
			?>
			<select id="dropdown_customers" name="_customer_user">
				<option value=""><?php _e( 'Show All Customers', 'wc_advanced_points' ) ?></option>
				<?php
					if ( ! empty( $_GET['_customer_user'] ) ) {
						$user = get_user_by( 'id', absint( $_GET['_customer_user'] ) );
						echo '<option value="' . absint( $user->ID ) . '" ';
						selected( 1, 1 );
						echo '>' . esc_html( $user->display_name ) . ' (#' . absint( $user->ID ) . ' &ndash; ' . esc_html( $user->user_email ) . ')</option>';
					}
				?>
			</select>

			<select id="dropdown_event_types" name="_event_type">
				<option value=""><?php _e( 'Show All Event Types', 'wc_advanced_points' ) ?></option>
				<?php
				foreach ( WC_Points_Rewards_Points_Log::get_event_types() as $event_type ) :
					echo '<option value="' . esc_attr( $event_type->type ) . '" ' .
						selected( $event_type->type, isset( $_GET['_event_type'] ) ? $_GET['_event_type'] : null, false ) .
						'>' . esc_html( sprintf( "%s (%d)", $event_type->name, $event_type->count ) ) . '</option>';
				endforeach;
				?>
			</select>
			<?php

			$this->render_dates_dropdown();

			submit_button( __( 'Filter' ), 'button', false, false, array( 'id' => 'post-query-submit' ) );
			echo '</div>';

			// javascript
			$js = "
				// Ajax Chosen Product Selectors
				$('select#dropdown_dates').css('width', '250px').chosen();

				$('select#dropdown_event_types').css('min-width', '190px').chosen();

				$('select#dropdown_customers').css('width', '250px').ajaxChosen({
					method:         'GET',
					url:            '" . admin_url( 'admin-ajax.php' ) . "',
					dataType:       'json',
					afterTypeDelay: 100,
					minTermLength:  1,
					data: {
						action:   'woocommerce_json_search_customers',
						security: '" . wp_create_nonce( "search-customers" ) . "',
						default:  '" . esc_js( __( 'Show All Customers', 'wc_advanced_points' ) ) . "'
					}
				}, function (data) {

					var terms = {};

					$.each(data, function (i, val) {
						terms[i] = val;
					});

					return terms;
				});
			";

			if ( function_exists( 'wc_enqueue_js' ) ) {
				wc_enqueue_js( $js );
			} else {
				$woocommerce->add_inline_js( $js );
			}
		}
	}

	private function render_dates_dropdown() {
		global $wpdb, $wp_locale, $wc_points_rewards;

		// Performance: we could always pull out the database order-by and sort in code to get rid of a 'filesort' from the query
		$months = $wpdb->get_results("
			SELECT DISTINCT YEAR( date ) AS year, MONTH( date ) AS month
			FROM {$wc_points_rewards->user_points_log_db_tablename}
			ORDER BY date DESC
		");

		$month_count = count( $months );

		if ( ! $month_count || ( 1 == $month_count && 0 == $months[0]->month ) )
			return;

		$date = isset( $_GET['date'] ) ? (int) $_GET['date'] : 0;
		?>
		<select id="dropdown_dates" name='date'>
			<option<?php selected( $date, 0 ); ?> value='0'><?php _e( 'Show all Event Dates', 'wc_advanced_points' ); ?></option>
			<?php
			foreach ( $months as $arc_row ) {
				if ( 0 == $arc_row->year )
					continue;

				$month = zeroise( $arc_row->month, 2 );
				$year = $arc_row->year;

				printf( "<option %s value='%s'>%s</option>\n",
					selected( $date, $year . $month, false ),
					esc_attr( $arc_row->year . $month ),
					sprintf( __( '%1$s %2$d', 'wc_advanced_points' ), $wp_locale->get_month( $month ), $year )
				);
			}
			?>
		</select>
		<?php
	}


}
