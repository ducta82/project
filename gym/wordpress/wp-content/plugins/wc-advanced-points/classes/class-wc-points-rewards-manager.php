<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WC_Points_Rewards_Manager {

	public static $found_users;
	public static function event_type_description( $event_type, $event = null ) {

		global $wc_points_rewards;

		$event_description = '';

		$points_label = $wc_points_rewards->get_points_label( $event ? $event->points : null );

		switch ( $event_type ) {
			case 'admin-adjustment': $event_description = sprintf( __( '%s adjusted by "admin"',          'wc_advanced_points' ), $points_label ); break;
			case 'birthday': $event_description = sprintf( __( '%s for birthday',          'wc_advanced_points' ), $points_label ); break;			
			case 'marriage': $event_description = sprintf( __( '%s for marriage',          'wc_advanced_points' ), $points_label ); break;			
			case 'order-placed':     $event_description = sprintf( __( '%s earned for purchase',          'wc_advanced_points' ), $points_label ); break;
			case 'order-cancelled':  $event_description = sprintf( __( '%s adjusted for cancelled order', 'wc_advanced_points' ), $points_label ); break;
			case 'order-redeem':     $event_description = sprintf( __( '%s redeemed towards purchase',    'wc_advanced_points' ), $points_label ); break;
		}

		// allow other plugins to define their own event types/descriptions
		return apply_filters( 'wc_points_rewards_event_description', $event_description, $event_type, $event );
	}

	public static function set_points_balance( $user_id, $points_balance, $event_type ) {

		global $wc_points_rewards, $wpdb;

		$points_change = 0;

		// ensure the user exists
		$user = get_userdata( $user_id );
		if ( false === $user ) return false;

		$points_balance = apply_filters( 'wc_points_rewards_set_points_balance', $points_balance, $user_id, $event_type );

		// get any existing points records
		// OK: the one drawback to the current algorithm would be the case of a positive point differnce and the most recent record(s) being
		//     zero, with some older non-zero records, the positive point difference would be applied older records than strictly necessary
		//     could be revisited when/if expiring points are implemented
		$query = "SELECT * FROM {$wc_points_rewards->user_points_db_tablename} WHERE user_id = %d AND points_balance != 0 ORDER BY date ASC";
		$points = $wpdb->get_results( $wpdb->prepare( $query, $user_id ) );

		// no non-zero records, so create a new one
		if ( empty( $points ) && 0 != $points_balance ) {

			$points_change = $points_balance;

			$wpdb->insert(
				$wc_points_rewards->user_points_db_tablename,
				array(
					'user_id'        => $user_id,
					'points'         => $points_balance,
					'points_balance' => $points_balance,
					'date'           => current_time( 'mysql', 1 ),
				),
				array(
					'%d',
					'%d',
					'%d',
					'%s',
				)
			);

		} elseif ( count( $points ) > 0 ) {  // existing non-zero points records

			$total_points_balance = 0;

			// total up the existing points balance
			foreach ( $points as $_points ) {
				$total_points_balance += $_points->points_balance;
			}

			if ( $total_points_balance != $points_balance ) {

				// get the difference (the amount required to make the users points balance equal to the new balance)
				$points_change = $points_difference = $points_balance - $total_points_balance;

				// the goal is to get each existing record as close to zero as possible, oldest to newest
				foreach ( $points as $index => &$_points ) {

					if ( $_points->points_balance < 0 && $points_difference > 0 ) {

						$_points->points_balance += $points_difference;

						if ( $_points->points_balance <= 0 || count( $points ) - 1 == $index ) {
							// used up all of points_difference, or reached the newest user points record which therefore receives the remaining balance
							$points_difference = 0;
							break;
						} else {
							// still have more points balance to distribute
							$points_difference = $_points->points_balance;
							$_points->points_balance = 0;
						}

					} elseif ( $_points->points_balance > 0 && $points_difference < 0 ) {

						$_points->points_balance += $points_difference;

						if ( $_points->points_balance >= 0 || count( $points ) - 1 == $index ) {
							// used up all of points_difference, or reached the newest user points record which therefore receives the remaining balance
							$points_difference = 0;
							break;
						} else {
							// still have more points balance to distribute
							$points_difference = $_points->points_balance;
							$_points->points_balance = 0;
						}

					} elseif ( count( $points ) - 1 == $index && 0 != $points_difference ) {
						// if we made it here, assign all remaining points to the final record and we're done
						$_points->points_balance += $points_difference;
						$points_difference = 0;
					}
				}

				// update any affected rows
				for ( $i = 0; $i <= $index; $i++ ) {
					$wpdb->update(
						$wc_points_rewards->user_points_db_tablename,
						array(
							'points_balance' => $points[ $i ]->points_balance,
						),
						array(
							'id' => $points[ $i ]->id,
						),
						array( '%d' ),
						array( '%d' )
					);
				}
			}
		}

		// always make sure the user points balance meta is up to date
		update_user_meta( $user_id, 'wc_points_balance', $points_balance );

		// if there was a points change, log it
		if ( $points_change ) {

			$args = array(
				'user_id'    => $user_id,
				'points'     => $points_change,
				'event_type' => $event_type,
			);

		//total Points
		$points_total = (int)get_user_meta( $user_id, 'wc_points_level_user',true);
		update_user_meta( $user_id, 'wc_points_level_user', ($points_total + $points_change) );
		
			// log the event
			WC_Points_Rewards_Points_Log::add_log_entry( $args );

			do_action( 'wc_points_rewards_after_set_points_balance', $user_id, $points_balance );
		}

		// for now always return success
		return true;
	}

	public static function increase_points( $user_id, $points, $event_type, $data = null, $order_id = null ) {

		global $wc_points_rewards, $wpdb;

		// ensure the user exists
		$user = get_userdata( $user_id );
		if ( false === $user ) return false;

		$points = apply_filters( 'wc_points_rewards_increase_points', $points, $user_id, $event_type, $data, $order_id );

		$_data = array(
			'user_id'        => $user_id,
			'points'         => $points,
			'points_balance' => $points,
			'date'           => current_time( 'mysql', 1 ),
		);

		$format = array(
			'%d',
			'%d',
			'%d',
			'%s',
		);

		if ( $order_id ) {
			$_data['order_id'] = $order_id;
			$format[] = '%d';
		}

		// create the new user points record
		$success = $wpdb->insert(
			$wc_points_rewards->user_points_db_tablename,
			$_data,
			$format
		);

		// failed to insert the user points record
		if ( 1 != $success ) return false;

		// required log parameters
		$args = array(
			'user_id'        => $user_id,
			'points'         => $points,
			'event_type'     => $event_type,
			'user_points_id' => $wpdb->insert_id,
		);

		// optional associated order
		if ( $order_id )
			$args['order_id'] = $order_id;

		// optional associated data
		if ( $data )
			$args['data'] = $data;

		// log the event
		WC_Points_Rewards_Points_Log::add_log_entry( $args );

		// update the current points balance user meta
		
		$points_balance = (int) get_user_meta( $user_id, 'wc_points_balance' );
		update_user_meta( $user_id, 'wc_points_balance', $points_balance + $points );
		//total Points
		$points_total = (int)get_user_meta( $user_id, 'wc_points_level_user',true);
		update_user_meta( $user_id, 'wc_points_level_user', ($points_total + $points) );
		
		do_action( 'wc_points_rewards_after_increase_points', $user_id, $points, $event_type, $data, $order_id );

		// success
		return true;
	}

	public static function decrease_points( $user_id, $points, $event_type, $data = null, $order_id = null ) {

		global $wc_points_rewards, $wpdb;

		// ensure the user exists
		$user = get_userdata( $user_id );
		if ( false === $user ) return false;

		$points = apply_filters( 'wc_points_rewards_decrease_points', $points, $user_id, $event_type, $data, $order_id );

		// get any existing points records
		$query = "SELECT * FROM {$wc_points_rewards->user_points_db_tablename} WHERE user_id = %d and points_balance != 0 ORDER BY date ASC";
		$user_points = $wpdb->get_results( $wpdb->prepare( $query, $user_id ) );

		// no non-zero records, so create a new one
		if ( empty( $user_points ) ) {

			$_data = array(
				'user_id'        => $user_id,
				'points'         => -$points,
				'points_balance' => -$points,
				'date'           => current_time( 'mysql', 1 ),
			);

			$format = array(
				'%d',
				'%d',
				'%d',
				'%s',
			);

			if ( $order_id ) {
				$_data['order_id'] = $order_id;
				$format[] = '%d';
			}

			// create the negative-balance user points record
			$wpdb->insert(
				$wc_points_rewards->user_points_db_tablename,
				$_data,
				$format
			);

		} elseif ( count( $user_points ) > 0 ) {  // existing non-zero points records

			$points_difference = -$points;

			// the goal is to get each existing record as close to zero as possible, oldest to newest
			foreach ( $user_points as $index => &$_points ) {

				if ( $_points->points_balance > 0 && $points_difference < 0 ) {

					$_points->points_balance += $points_difference;

					if ( $_points->points_balance >= 0 || count( $user_points ) - 1 == $index ) {
						// used up all of points_difference, or reached the newest user points record which therefore receives the remaining balance
						$points_difference = 0;
						break;
					} else {
						// still have more points balance to distribute
						$points_difference = $_points->points_balance;
						$_points->points_balance = 0;
					}

				} elseif ( count( $user_points ) - 1 == $index && 0 != $points_difference ) {
					// if we made it here, assign all remaining points to the final record and we're done
					$_points->points_balance += $points_difference;
					$points_difference = 0;
				}
			}

			// update any affected rows
			for ( $i = 0; $i <= $index; $i++ ) {
				$wpdb->update(
					$wc_points_rewards->user_points_db_tablename,
					array(
						'points_balance' => $user_points[ $i ]->points_balance,
					),
					array(
						'id' => $user_points[ $i ]->id,
					),
					array( '%d' ),
					array( '%d' )
				);
			}
		}

		// update the current points balance user meta
		$points_balance = (int) get_user_meta( $user_id, 'wc_points_balance' );
		update_user_meta( $user_id, 'wc_points_balance', $points_balance - $points );

		// log the points change
		$args = array(
			'user_id'    => $user_id,
			'points'     => -$points,
			'event_type' => $event_type,
		);

		// optional associated order
		if ( $order_id )
			$args['order_id'] = $order_id;

		// optional associated data
		if ( $data )
			$args['data'] = $data;

		// log the event
		WC_Points_Rewards_Points_Log::add_log_entry( $args );

		do_action( 'wc_points_rewards_after_reduce_points', $user_id, $points_balance );

		// always return true for now
		return true;
	}

	public static function delete_user_points( $user_id ) {

		global $wc_points_rewards, $wpdb;

		$wpdb->delete( $wc_points_rewards->user_points_db_tablename, array( 'user_id' => $user_id ) );
	}

	public static function get_users_points( $user_id ) {

		global $wc_points_rewards, $wpdb;

		$points_balance = 0;

		$query = "SELECT * FROM {$wc_points_rewards->user_points_db_tablename} WHERE user_id = %d AND points_balance != 0";
		$points = $wpdb->get_results( $wpdb->prepare( $query, $user_id ) );

		// total up the existing points balance
		foreach ( $points as $_points ) {
			$points_balance += $_points->points_balance;
		}

		return apply_filters( 'wc_points_rewards_user_points_balance', $points_balance, $user_id );
	}


	public static function get_users_points_value( $user_id ) {

		return self::calculate_points_value( self::get_users_points( $user_id ) );
	}

	public static function get_all_users_points( $args ) {

		if ( ! isset( $args['fields'] ) ) $args['fields'] = 'ID';
		$args['meta_key'] = 'wc_points_balance';

		// perform the user query, altering the orderby as needed when ordering by user points
		if ( 'points' === $args['orderby'] ) add_action( 'pre_user_query', array( __CLASS__, 'order_user_by_points' ) );
		$wp_user_query = new WP_User_Query( $args );
		if ( 'points' === $args['orderby'] ) remove_action( 'pre_user_query', array( __CLASS__, 'order_user_by_points' ) );

		// record the total result set (for pagination purposes)
		if ( isset( $args['count_total'] ) && $args['count_total'] ) self::$found_users = $wp_user_query->get_total();

		$results = array();

		// build the expected user points records
		foreach ( $wp_user_query->get_results() as $user_id ) {
			$result = new stdClass();
			$result->user_id        = $user_id;
			$result->points_balance = self::get_users_points( $user_id );

			$results[] = $result;
		}

		return $results;
	}

	public static function order_user_by_points( $wp_user_query ) {
		global $wpdb;

		// determine the sort order
		if ( 'ASC' == $wp_user_query->query_vars['order'] )
			$order = 'ASC';
		else
			$order = 'DESC';

		// we're making the (I think safe) assumption that the points balance meta_value is part of wp_usermeta
		$orderby = $wpdb->usermeta . '.meta_value+0';

		$wp_user_query->query_orderby = "ORDER BY $orderby $order";
	}

	public static function get_found_user_points() {
		return self::$found_users;
	}

	public static function calculate_points( $amount ) {

		list( $points, $monetary_value ) = explode( ':', get_option( 'wc_points_rewards_earn_points_ratio', '' ) );

		if ( ! $points )
			return 0;

		switch ( get_option( 'wc_points_rewards_earn_points_rounding' ) ) {
			case 'ceil' :
				return ceil( $amount * ( $points / $monetary_value ) );
			break;
			case 'floor' :
				return floor( $amount * ( $points / $monetary_value ) );
			break;
			default :
				return round( $amount * ( $points / $monetary_value ) );
			break;
		}
	}


	public static function calculate_points_value( $amount ) {

		list( $points, $monetary_value ) = explode( ':', get_option( 'wc_points_rewards_redeem_points_ratio', '' ) );

		return number_format( $amount * ( $monetary_value / $points ), 2, '.', '' );
	}


	public static function calculate_points_for_discount( $discount_amount ) {

		list( $points, $monetary_value ) = explode( ':', get_option( 'wc_points_rewards_redeem_points_ratio', '' ) );

		return ceil( $discount_amount * ( $points / $monetary_value ) );
	}


} // end \WC_Points_Rewards_Manager class
