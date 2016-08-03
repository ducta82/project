<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WC_Points_Rewards_Admin {

	/** @var string settings page ID */
	private $page_id;

	/** @var array points & rewards manage/actions tabs */
	private $tabs;

	/** @var string settings page tab ID */
	private $settings_tab_id = 'points';

	/* @var \WC_Points_Rewards_Manage_Points_List_Table the manage points list table object */
	private $manage_points_list_table;

	/* @var \WC_Points_Rewards_Points_Log_List_Table The points log list table object */
	private $points_log_list_table;


	/**
	 * Setup admin class
	 *
	 * @since 1.0
	 */
	public function __construct() {

		$this->tabs = array(
			'manage'  => __( 'Manage Points', 'wc_advanced_points' ),
			'log' => __( 'Points Log', 'wc_advanced_points' ),
			'level' => __( 'Group Level', 'wc_advanced_points' ),
			'email' => __( 'Email', 'wc_advanced_points' ),			
		);

		/** General admin hooks */

		// Load WC styles / scripts
		add_filter( 'woocommerce_screen_ids', array( $this, 'load_wc_scripts' ) );

		// add 'Points & Rewards' link under WooCommerce menu
		add_action( 'admin_menu', array( $this, 'add_menu_link' ) );

		// manage points / points log list table settings
		add_action( 'in_admin_header',   array( $this, 'load_list_tables' ) );
		add_filter( 'set-screen-option', array( $this, 'set_list_table_options' ), 10, 3 );
		add_filter( 'manage_woocommerce_page_wc_points_rewards_columns', array( $this, 'manage_columns' ) );

		// warn that points won't be able to be redeemed if coupons are disabled
		add_action( 'admin_notices', array( $this, 'verify_coupons_enabled' ) );

		/** WC settings hooks */

		// add 'Points & Rewards' tab to WooCommerce settings
		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_tab'  ), 50 );

		// show settings
		add_action( 'woocommerce_settings_tabs_' . $this->settings_tab_id, array( $this, 'render_settings' ) );

		// save settings
		add_action( 'woocommerce_update_options_' . $this->settings_tab_id, array( $this, 'save_settings' ) );

		// Add a custom field types
		add_action( 'woocommerce_admin_field_conversion_ratio', array( $this, 'render_conversion_ratio_field' ) );
		add_action( 'woocommerce_admin_field_singular_plural',  array( $this, 'render_singular_plural_field' ) );

		// save custom field types
		add_action( 'woocommerce_update_option_conversion_ratio', array( $this, 'save_conversion_ratio_field' ) );
		add_action( 'woocommerce_update_option_singular_plural',  array( $this, 'save_singular_plural_field' ) );

		/** Order hooks */

		// Add the points earned/redeemed for a discount to the edit order page
		add_action( 'woocommerce_admin_order_totals_after_shipping', array( $this, 'render_points_earned_redeemed_info' ) );

		/** Coupon hooks */

		// Add coupon points modifier field
		add_action( 'woocommerce_coupon_options', array( $this, 'render_coupon_points_modifier_field' ) );

		// Save coupon points modifier field
		add_action( 'woocommerce_process_shop_coupon_meta', array( $this, 'save_coupon_points_modifier_field' ) );

		// Sync variation prices
		add_action( 'woocommerce_variable_product_sync', array( $this, 'variable_product_sync' ), 10, 2 );
			add_action('wp_ajax_update_unic',array( $this, 'update_unic'));
	add_action('wp_ajax_nopriv_update_unic', array( $this,'update_unic'));
	}


	/**
	 * Verify that coupouns are enabled and render an annoying warning in the
	 * admin if they are not
	 *
	 * @since 1.0
	 */
	public function verify_coupons_enabled() {

		$coupons_enabled = get_option( 'woocommerce_enable_coupons' ) == 'no' ? false : true;

		if ( ! $coupons_enabled ) {
			$message = sprintf(
				__( 'WooCommerce Points and Rewards requires coupons to be %senabled%s in order to function properly and allow customers to redeem points during checkout.', 'wc_advanced_points' ),
				'<a href="' . admin_url('admin.php?page=wc-settings&tab=checkout') . '">',
				'</a>'
			);

			echo '<div class="error"><p>' . $message . '</p></div>';
		}
	}


	/**
	 * Add settings/export screen ID to the list of pages for WC to load its JS on
	 *
	 * @since 1.0
	 * @param array $screen_ids
	 * @return array
	 */
	public function load_wc_scripts( $screen_ids ) {
		$wc_screen_id = sanitize_title( __( 'WooCommerce', 'woocommerce' ) );

		// sub-menu page
		$screen_ids[] = $wc_screen_id . '_page_wc_points_rewards';

		// add/edit product category page
		$screen_ids[] = 'edit-product_cat';

		return $screen_ids;
	}


	/** 'Points & Rewards' sub-menu methods ******************************************************/


	/**
	 * Add 'Points & Rewards' sub-menu link under 'WooCommerce' top level menu
	 *
	 * @since 1.0
	 */
	public function add_menu_link() {

		$this->page_id = add_submenu_page(
			'woocommerce',
			__( 'Points & Rewards', 'wc_advanced_points' ),
			__( 'Points & Rewards', 'wc_advanced_points' ),
			'manage_woocommerce',
			'wc_points_rewards',
			array( $this, 'show_sub_menu_page' )
		);

		// add the Manage Points/Points log list table Screen Options
		add_action( 'load-' . $this->page_id, array( $this, 'add_list_table_options' ) );
	}


	/**
	 * Save our list table options
	 *
	 * @since 1.0
	 * @param string $status unknown
	 * @param string $option the option name
	 * @param mixed $value the option value
	 * @return mixed
	 */
	public function set_list_table_options( $status, $option, $value ) {
		if ( 'wc_points_rewards_manage_points_customers_per_page' == $option || 'wc_points_rewards_points_log_per_page' == $option )
			return $value;

		return $status;
	}


	/**
	 * Add list table Screen Options
	 *
	 * @since 1.0
	 */
	public function add_list_table_options() {

		if ( isset( $_GET['tab'] ) && 'log' === $_GET['tab'] ) {
			$args = array(
				'label' => __( 'Points Log', 'wc_advanced_points' ),
				'default' => 20,
				'option' => 'wc_points_rewards_points_log_per_page',
			);
		} else {
			$args = array(
				'label' => __( 'Manage Points', 'wc_advanced_points' ),
				'default' => 20,
				'option' => 'wc_points_rewards_manage_points_customers_per_page',
			);
		}

		add_screen_option( 'per_page', $args );
	}

	public function load_list_tables() {

		if ( isset( $_GET['page'] ) && 'wc_points_rewards' == $_GET['page'] ) {
			if ( isset( $_GET['tab'] ) && 'log' == $_GET['tab'] )
				$this->get_points_log_list_table();
			else
				$this->get_manage_points_list_table();
		}
	}

	public function manage_columns( $columns ) {
		if ( isset( $_GET['page'] ) && 'wc_points_rewards' == $_GET['page'] ) {
			if ( isset( $_GET['tab'] ) && 'log' == $_GET['tab'] )
				$columns = apply_filters( 'manage_woocommerce_page_wc_points_rewards_points_log_columns', $columns );
			else
				$columns = apply_filters( 'manage_woocommerce_page_wc_points_rewards_manage_points_columns', $columns );
		}

		return $columns;
	}


	public function show_sub_menu_page() {

		$current_tab = ( empty( $_GET['tab'] ) ) ? 'manage' : urldecode( $_GET['tab'] );

		?>
		<div class="wrap woocommerce">
			<div id="icon-woocommerce" class="icon32-woocommerce-users icon32"><br /></div>
			<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">

			<?php

				// display tabs
				foreach ( $this->tabs as $tab_id => $tab_title ) {

					$class = ( $tab_id == $current_tab ) ? 'nav-tab nav-tab-active' : 'nav-tab';
					$url   = add_query_arg( 'tab', $tab_id, admin_url( 'admin.php?page=wc_points_rewards' ) );

					printf( '<a href="%s" class="%s">%s</a>', $url, $class, $tab_title );
				}

			?> </h2> <?php


			// display tab content, default to 'Manage' tab
			if ( 'log' === $current_tab )
				$this->show_log_tab();
			elseif( 'manage' === $current_tab )
				$this->show_manage_tab();
			elseif( 'level' === $current_tab )
				$this->show_level_tab();
			elseif( 'email' === $current_tab )
				$this->email_tab();		
		?></div> <?php
	}


	private function show_level_tab() {
		global $wc_points_rewards;

		echo '<h2>' . __( 'Manage Group Level', 'wc_advanced_points' ) . '</h2>';

		echo '<input type="hidden" name="page" value="' . esc_attr( $_REQUEST['page'] ) . '" />';

		require( $wc_points_rewards->get_plugin_path() . '/classes/class-wc-point-level-table.php' );
	}	

	private function email_tab() {
		global $wc_points_rewards;

		echo '<h2>' . __( 'Manage Email Template', 'wc_advanced_points' ) . '</h2>';

		echo '<input type="hidden" name="page" value="' . esc_attr( $_REQUEST['page'] ) . '" />';

		require( $wc_points_rewards->get_plugin_path() . '/classes/class-wc-point-email.php' );
	}

	private function show_manage_tab() {

		// setup 'Manage Points' list table and prepare the data
		$manage_table = $this->get_manage_points_list_table();
		$manage_table->prepare_items();

		?><form method="get" id="mainform" action="" enctype="multipart/form-data"><?php

		// title/search result string
		echo '<h2>' . __( 'Manage Customer Points', 'wc_advanced_points' ) . '</h2>';

		// display any action messages
		$manage_table->render_messages();

		echo '<input type="hidden" name="page" value="' . esc_attr( $_REQUEST['page'] ) . '" />';

		// display the list table
		$manage_table->display();
		?>
		<script type="text/javascript">
			jQuery(document).ready(function(e) {
				jQuery('.pw_cart_submit').click(function(){
					var user_id=jQuery(this).attr("data-id");
					var value=jQuery("#"+user_id+"_value").val();
					
					jQuery('.pw_cart_submit').val('<?php _e('Loading...','pw_wc_flash_sale');?>');
					jQuery('.pw_cart_submit').prop('disabled', true);
					jQuery.ajax ({
						type: "POST",
						url: ajaxurl,
						data:   "points_balance="+value+"&user_id="+user_id+ "&action=update_unic",
						success: function(data) {
							jQuery('.pw_cart_submit').prop('disabled', false);
							location.reload(); 
						}
					});	
				});
			});
		</script>
		
		</form><?php
	}

	
	public function update_unic()
	{
		//print_r($_POST);
		$points_balance=$_POST['points_balance'];
		$user_id=$_POST['user_id'];
		if ( WC_Points_Rewards_Manager::set_points_balance( $user_id, $points_balance, 'admin-adjustment' ) )
		{
		}
		wp_die();
	}

	private function show_log_tab() {
		$log_table = $this->get_points_log_list_table();
		$log_table->prepare_items();

		?><form method="get" id="mainform" action="" enctype="multipart/form-data"><?php

		// title/search result string
		echo '<h2>' . __( 'Points Log', 'wc_points_rewards' ) . '</h2>';

		echo '<input type="hidden" name="page" value="' . esc_attr( $_REQUEST['page'] ) . '" />';
		echo '<input type="hidden" name="tab" value="' . esc_attr( $_REQUEST['tab'] ) . '" />';

		// display the list table
		$log_table->display();
		?></form><?php
	}

	private function get_manage_points_list_table() {
		global $wc_points_rewards;

		if ( ! is_object( $this->manage_points_list_table ) ) {

			$class_name = apply_filters( 'wc_points_rewards_manage_points_list_table_class_name', 'WC_Points_Rewards_Manage_Points_List_Table' );

			require( $wc_points_rewards->get_plugin_path() . '/classes/class-wc-points-rewards-manage-points-list-table.php' );

			$this->manage_points_list_table = new $class_name();
		}

		return $this->manage_points_list_table;
	}

	private function get_points_log_list_table() {
		global $wc_points_rewards;

		if ( ! is_object( $this->points_log_list_table ) ) {

			$class_name = apply_filters( 'wc_points_rewards_points_log_list_table_class_name', 'WC_Points_Rewards_Points_Log_List_Table' );

			require( $wc_points_rewards->get_plugin_path() . '/classes/class-wc-points-rewards-points-log-list-table.php' );

			$this->points_log_list_table = new $class_name();
		}

		return $this->points_log_list_table;
	}

	public function add_settings_tab( $settings_tabs ) {

		$settings_tabs[ $this->settings_tab_id ] = __( 'Points', 'wc_advanced_points' );

		return $settings_tabs;
	}

	public function render_settings() {
		global $woocommerce;

		woocommerce_admin_fields( $this->get_set() );

		$confirm_message = __( 'Are you sure you want to apply points to all previous orders that have not already had points generated? This cannot be reversed! Note that this can take some time in shops with a large number of orders, if an error occurs, simply Apply Points again to continue the process.', 'wc_advanced_points' );

		$js = "
			// confirm admin wants to apply points to all previous orders
			$( '#wc_points_rewards_apply_points_to_previous_orders' ).click( function( e ) {
				if ( ! confirm( '" . esc_js( $confirm_message ) . "' ) ) {
					e.preventDefault();
				}
			} );
		";

		if ( function_exists( 'wc_enqueue_js' ) ) {
			wc_enqueue_js( $js );
		} else {
			$woocommerce->add_inline_js( $js );
		}
	}

	public function save_settings() 
	{
		woocommerce_update_options( $this->get_set() );
	}

	public static function get_set() {

		$settings = array(

			array(
				'title' => __( 'Points Settings', 'wc_advanced_points' ),
				'type'  => 'title',
				'id'    => 'wc_points_rewards_points_settings_start'
			),

			// earn points conversion
			array(
				'title'    => __( 'Earn Points Conversion Rate', 'wc_advanced_points' ),
				'desc_tip' => __( 'Set the number of points awarded based on the product price.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_earn_points_ratio',
				'default'  => '1:1',
				'type'     => 'conversion_ratio'
			),

			// earn points conversion
		/*	array(
				'title'    => __( 'Earn Points Rounding Mode', 'wc_advanced_points' ),
				'desc_tip' => __( 'Set how points should be rounded.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_earn_points_rounding',
				'default'  => 'round',
				'options'  => array(
					'round' => 'Round to nearest integer',
					'floor' => 'Always round down',
					'ceil'  => 'Always round up',
				),
				'type'     => 'select'
			)*/

			// redeem points conversion
			array(
				'title'    => __( 'Redemption Conversion Rate', 'wc_advanced_points' ),
				'desc_tip' => __( 'Set the value of points redeemed for a discount.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_redeem_points_ratio',
				'default'  => '100:1',
				'type'     => 'conversion_ratio'
			),

			// redeem points conversion
			array(
				'title'    => __( 'Partial Redemption', 'wc_advanced_points' ),
				'desc'     => __( 'Enable partial redemption', 'wc_advanced_points' ),
				'desc_tip' => __( 'Lets users enter how many points they wish to redeem during cart/checkout.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_partial_redemption_enabled',
				'default'  => 'no',
				'type'     => 'checkbox'
			),

			// maximum points discount available
		/*	array(
				'title'    => __( 'Maximum Points Discount', 'wc_advanced_points' ),
				'desc_tip' => __( 'Set the maximum product discount allowed for the cart when redeeming points. Use either a fixed monetary amount or a percentage based on the product price. Leave blank to disable.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_cart_max_discount',
				'default'  => '',
				'type'     => 'text',
			),

			// maximum points discount available
			array(
				'title'    => __( 'Maximum Product Points Discount', 'wc_advanced_points' ),
				'desc_tip' => __( 'Set the maximum product discount allowed when redeeming points per-product. Use either a fixed monetary amount or a percentage based on the product price. Leave blank to disable. This can be overridden at the category and product level.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_max_discount',
				'default'  => '',
				'type'     => 'text',
			),

			// points label
			array(
				'title'    => __( 'Points Label', 'wc_advanced_points' ),
				'desc_tip' => __( 'The label used to refer to points on the frontend, singular and plural.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_points_label',
				'default'  => sprintf( '%s:%s', __( 'Point', 'wc_advanced_points' ), __( 'Points', 'wc_advanced_points' ) ),
				'type'     => 'singular_plural',
			),
*/
			// earn points conversion
			array(
				'title'    => __( 'Point Message Type', 'wc_advanced_points' ),
				'desc_tip' => '',
				'id'       => 'wc_points_rewards_message_type',
				'default'  => 'text',
				'options'  => array(
					'text' => 'Text',
					'graphical_1' => 'Graphical 1',
					'graphical_2'  => 'Graphical 2',
					'graphical_3'  => 'Graphical 3',					
				),
				'type'     => 'select'
			),
			
			array(
				'title'    => __( 'Level Message Type', 'wc_advanced_points' ),
				'desc_tip' => '',
				'id'       => 'wc_points_level_message_type',
				'default'  => 'text',
				'options'  => array(
					'text' => 'Text',
					'graphical_1' => 'Graphical 1',
					'graphical_2'  => 'Graphical 2',
					'graphical_3'  => 'Graphical 3',					
				),
				'type'     => 'select'
			),			
			// redeem points conversion
			array(
				'title'    => __( 'Earn Point For birthday', 'wc_advanced_points' ),
				'desc'     => __( 'Yes,Please', 'wc_advanced_points' ),
				'desc_tip' => __( 'Enable/Disable user earn point for birthday.', 'wc_advanced_points' ),
				'id'       => 'wc_points_birthday',
				'default'  => 'no',
				'type'     => 'checkbox'
			),			

		/*	array(
				'title'    => __( 'Coupon Applying tax.', 'wc_advanced_points' ),
				'desc_tip' => '',
				'id'       => 'wc_points_applying_tax',
				'default'  => 'text',
				'options'  => array(
					'before' => 'Before',
					'after' => 'After',				
				),
				'type'     => 'select'
			),
			*/
			// maximum points discount available
			array(
				'title'    => __( 'point For birthday', 'wc_advanced_points' ),
				'desc_tip' => __( 'Enter point amount for birthday.', 'wc_advanced_points' ),
				'id'       => 'wc_points_birthday_value',
				'default'  => '',
				'type'     => 'text',
			),

			// redeem points conversion
			array(
				'title'    => __( 'Earn Point For marriage', 'wc_advanced_points' ),
				'desc'     => __( 'Yes,Please', 'wc_advanced_points' ),
				'desc_tip' => __( 'Enable/Disable user earn point for marriage date.', 'wc_advanced_points' ),
				'id'       => 'wc_points_marriage',
				'default'  => 'no',
				'type'     => 'checkbox'
			),			

			// maximum points discount available
			array(
				'title'    => __( 'point For marriage', 'wc_advanced_points' ),
				'desc_tip' => __( 'Enter point amount for marriage', 'wc_advanced_points' ),
				'id'       => 'wc_points_marriage_value',
				'default'  => '',
				'type'     => 'text',
			),
			
			array(
				'title'    => __( 'Points for account signup', 'wc_advanced_points' ),
				'desc_tip' => __( 'Enter the amount of points earned when a customer signs up for an account.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_account_signup_points',
				'default'  => '',
				'type'     => 'text',
			),
			array(
				'title'    => __( 'Mail Time', 'wc_advanced_points' ),
				'desc_tip' => __( 'Enter number of time of days', 'wc_advanced_points' ),
				'id'       => 'wc_points_mail_time',
				'default'  => '',
				'type'     => 'text',
			),			
			
			array( 'type' => 'sectionend', 'id' => 'wc_points_rewards_points_settings_end' ),

			array(
				'title' => __( 'Message Customizaton', 'wc_advanced_points' ),
				'desc'  => sprintf( __( 'Customize Your Message', 'wc_advanced_points' ), '<code>', '</code>' ),
				'type'  => 'title',
				'id'    => 'wc_points_rewards_messages_start'
			),

			array(
				'title'    => __( 'Single Product Page Level Message', 'wc_advanced_points' ),
				'desc_tip' => __( 'Add an optional message to the single product page below the price. Customize the message using {points} and {points_label}. Limited HTML is allowed. Leave blank to disable.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_single_product_level_message',
				'css'      => 'min-width: 400px;',
				'default'  => sprintf( __( 'Purchase this product now and earn %s!', 'wc_advanced_points' ), '<strong>{discount}</strong> off' ),
				'type'     => 'textarea',
			),
			
			// single product page message
			array(
				'title'    => __( 'Single Product Page', 'wc_advanced_points' ),
				'desc_tip' => __( 'Add an optional message to the single product page below the price. Customize the message using {points} and {points_label}. Limited HTML is allowed. Leave blank to disable.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_single_product_message',
				'css'      => 'min-width: 400px;',
				'default'  => sprintf( __( 'Purchase this product now and earn %s!', 'wc_advanced_points' ), '<strong>{points}</strong> {points_label}' ),
				'type'     => 'textarea',
			),

			// earn points cart/checkout page message
			array(
				'title'    => __( 'Earn Points Cart/Checkout Page', 'wc_advanced_points' ),
				'desc_tip' => __( 'Displayed on the cart and checkout page when points are earned. Customize the message using {points} and {points_label}. Limited HTML is allowed.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_earn_points_message',
				'css'      => 'min-width: 400px;',
				'default'  => sprintf( __( 'Complete your order and earn %s for a discount on a future purchase', 'wc_advanced_points' ), '<strong>{points}</strong> {points_label}' ),
				'type'     => 'textarea',
			),

			// redeem points cart/checkout page message
			array(
				'title'    => __( 'Redeem Points Cart/Checkout Page', 'wc_advanced_points' ),
				'desc_tip' => __( 'Displayed on the cart and checkout page when points are available for redemption. Customize the message using {points}, {points_value}, and {points_label}. Limited HTML is allowed.', 'wc_advanced_points' ),
				'id'       => 'wc_points_rewards_redeem_points_message',
				'css'      => 'min-width: 400px;',
				'default'  => sprintf( __( 'Use %s for a %s discount on this order!', 'wc_advanced_points' ), '<strong>{points}</strong> {points_label}', '<strong>{points_value}</strong>' ),
				'type'     => 'textarea',
			),

			array( 'type' => 'sectionend', 'id' => 'wc_points_rewards_messages_end' ),


			array( 'type' => 'sectionend', 'id' => 'wc_points_rewards_earn_points_for_actions_settings_end' ),

		/*	array(
				'type'  => 'title',
				'title' => __( 'Actions', 'wc_advanced_points' ),
				'id'    => 'wc_points_rewards_points_actions_start',
			),
			*/


			array( 'type' => 'sectionend', 'id' => 'wc_points_rewards_points_actions_end' ),

		);

		$integration_settings = apply_filters( 'wc_points_rewards_action_settings', array() );

		if ( $integration_settings ) {

			// set defaults
			foreach ( array_keys( $integration_settings ) as $key ) {
				if ( ! isset( $integration_settings[ $key ]['css'] ) )  $integration_settings[ $key ]['css']  = 'max-width: 50px;';
				if ( ! isset( $integration_settings[ $key ]['type'] ) ) $integration_settings[ $key ]['type'] = 'text';
			}

			// find the start of the Points Earned for Actions settings to splice into
			$index = -1;
			foreach ( $settings as $index => $setting ) {
				if ( isset( $setting['id'] ) && 'wc_points_rewards_earn_points_for_actions_settings_start' == $setting['id'] )
					break;
			}

			array_splice( $settings, $index + 1, 0, $integration_settings );
		}

		return apply_filters( 'wc_points_rewards_settings', $settings );
	}


	/**
	 * Render the Earn Points/Redeem Points conversion ratio section
	 *
	 * @since 1.0
	 * @param array $field associative array of field parameters
	 */
	public function render_conversion_ratio_field( $field ) {
		global $woocommerce;

		if ( isset( $field['title'] ) && isset( $field['id'] ) ) :

			$ratio = get_option( $field['id'], $field['default'] );

			list( $points, $monetary_value ) = explode( ':', $ratio );

			?>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for=""><?php echo wp_kses_post( $field['title'] ); ?></label>
						<img class="help_tip" data-tip="<?php echo esc_attr( $field['desc_tip'] ); ?>" src="<?php echo esc_url( $woocommerce->plugin_url() . '/assets/images/help.png' ); ?>" height="16" width="16" />
					</th>
					<td class="forminp forminp-text">
						<fieldset>
							<input name="<?php echo esc_attr( $field['id'] . '_points' ); ?>" id="<?php echo esc_attr( $field['id'] . '_points' ); ?>" type="text" style="max-width: 50px;" value="<?php echo esc_attr( $points ); ?>" />&nbsp;<?php _e( 'Points', 'wc_advanced_points' ); ?>
							<span>&nbsp;&#61;&nbsp;</span>&nbsp;<?php echo get_woocommerce_currency_symbol(); ?>
							<input name="<?php echo esc_attr( $field['id'] . '_monetary_value' ); ?>" id="<?php echo esc_attr( $field['id'] . '_monetary_value' ); ?>" type="text" style="max-width: 50px;" value="<?php echo esc_attr( $monetary_value ); ?>" />
						</fieldset>
					</td>
				</tr>
			<?php

		endif;
	}

	public function render_singular_plural_field( $field ) {
		global $woocommerce;

		if ( isset( $field['title'] ) && isset( $field['id'] ) ) :

			$value = get_option( $field['id'], $field['default'] );

			list( $singular, $plural ) = explode( ':', $value );

			?>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for=""><?php echo wp_kses_post( $field['title'] ); ?></label>
						<img class="help_tip" data-tip="<?php echo esc_attr( $field['desc_tip'] ); ?>" src="<?php echo esc_url( $woocommerce->plugin_url() . '/assets/images/help.png' ); ?>" height="16" width="16" />
					</th>
					<td class="forminp forminp-text">
						<fieldset>
							<input name="<?php echo esc_attr( $field['id'] . '_singular' ); ?>" id="<?php echo esc_attr( $field['id'] . '_singular' ); ?>" type="text" style="max-width: 50px;" value="<?php echo esc_attr( $singular ); ?>" />
							<input name="<?php echo esc_attr( $field['id'] . '_plural' ); ?>" id="<?php echo esc_attr( $field['id'] . '_plural' ); ?>" type="text" style="max-width: 50px;" value="<?php echo esc_attr( $plural ); ?>" />
						</fieldset>
					</td>
				</tr>
			<?php

		endif;
	}

	public function save_conversion_ratio_field( $field ) {

		if ( isset( $_POST[ $field['id'] . '_points' ] ) && ! empty( $_POST[ $field['id'] . '_monetary_value' ] ) )
			update_option( $field['id'], $_POST[ $field['id'] . '_points' ]. ':' . $_POST[ $field['id'] . '_monetary_value' ] );
	}


	/**
	 * Save the singular-plural text fields
	 *
	 * @since 0.1
	 * @param array $field
	 */
	public function save_singular_plural_field( $field ) {

		if ( ! empty( $_POST[ $field['id'] . '_singular' ] ) && ! empty( $_POST[ $field['id'] . '_plural' ] ) )
			update_option( $field['id'], $_POST[ $field['id'] . '_singular' ]. ':' . $_POST[ $field['id'] . '_plural' ] );
	}

	/**
	 * Handles any points & rewards setting page actions.  The only available
	 * action is to apply points to previous orders, useful when the plugin
	 * is first installed
	 *
	 * @since 1.0
	 */
	public function handle_settings_actions() {

		global $wc_points_rewards;

		$current_tab     = ( empty( $_GET['tab'] ) )         ? null : sanitize_text_field( urldecode( $_GET['tab'] ) );
		//$current_action  = ( empty( $_REQUEST['action'] ) )  ? null : sanitize_text_field( urldecode( $_REQUEST['action'] ) );

	}


	/**
	 * Render the points earned / redeemed on the Edit Order totals section
	 *
	 * @since 1.0
	 * @param int $order_id the WC_Order ID
	 */
	public function render_points_earned_redeemed_info( $order_id ) {

		$points_earned   = get_post_meta( $order_id, '_wc_points_earned', true );
		$points_redeemed = get_post_meta( $order_id, '_wc_points_redeemed', true );

		?>
			<h4><?php _e( 'Points', 'wc_advanced_points' ); ?></h4>
			<ul class="totals">
				<li class="left">
					<label><?php _e( 'Earned:', 'wc_advanced_points' ); ?></label>
					<input type="number" disabled="disabled" id="_wc_points_earned" name="_wc_points_earned" placeholder="<?php _e( 'None', 'wc_advanced_points' ); ?>" value="<?php if ( ! empty( $points_earned ) ) echo esc_attr( $points_earned ); ?>" class="first" />
				</li>
				<li class="right">
					<label><?php _e( 'Redeemed:', 'wc_advanced_points' ); ?></label>
					<input type="number" disabled="disabled" id="_wc_points_redeemed" name="_wc_points_redeemed" placeholder="<?php _e( 'None', 'wc_advanced_points' ); ?>" value="<?php if ( ! empty( $points_redeemed ) ) echo esc_attr( $points_redeemed ); ?>" class="first" />
				</li>
			</ul>
			<div class="clear"></div>
		<?php
	}

	public function render_coupon_points_modifier_field() {

		// Unique URL
		woocommerce_wp_text_input(
			array(
				'id'          => '_wc_points_modifier',
				'label'       => __( 'Points Modifier', 'wc_advanced_points' ),
				'description' => __( 'Enter a percentage which modifies how points are earned when this coupon is applied. For example, enter 200% to double the amount of points typically earned when the coupon is applied.', 'wc_advanced_points' ),
				'desc_tip'    => true,
			)
		);
	}

	public function save_coupon_points_modifier_field( $post_id ) {

		if ( ! empty( $_POST['_wc_points_modifier'] ) )
			update_post_meta( $post_id, '_wc_points_modifier', stripslashes( $_POST['_wc_points_modifier'] ) );
		else
			delete_post_meta( $post_id, '_wc_points_modifier' );

	}

	/**
	 * Go through variations and store the max points
	 */
	public function variable_product_sync( $variation_id, $children ) {
		$wc_max_points_earned = '';
		foreach ( $children as $child ) {
			$earned = get_post_meta( $child, '_wc_points_earned', true );
			if ( $earned !== '' && $earned > $wc_max_points_earned ) {
				$wc_max_points_earned = $earned;
			}
		}
		update_post_meta( $variation_id, '_wc_max_points_earned', $wc_max_points_earned );
	}


} // end \WC_Points_Rewards_Admin class
