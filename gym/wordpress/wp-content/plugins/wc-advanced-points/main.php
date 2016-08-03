<?php
/**
 * Plugin Name: Customer Club: Advanced WooCommerce Point System
 * Plugin URI: http://www.proword.net/Customer_Club/
 * Description: Advanced Point & Reward System for WooCommerce
 * Author: Proword
 * Author URI: http://www.proword.net
 * Version: 1.3
 * Text Domain: wc_advanced_points
 * Domain Path: /languages/
 */
/*
	20-07-2015	v1.3
		Fix :	Fatal error in class-wc-points-price.php on line 267
		Fix :	sveral discount in cart with any time refresh
		Fix :	fix bug in single product for show level
		Check Compatible in wc 2.3.x and wordpress 4.2.2 = check
		
	14-3-2015
		Fix : wp_reset_query(); in single product
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define ('PW_POINT_URL',plugins_url('', __FILE__));
$GLOBALS['wc_points_rewards'] = new WC_Points_Rewards();

class WC_Points_Rewards {

	const VERSION = '4433';
	private $plugin_path;
	private $plugin_url;
	private $logger;
	private $admin;
	private $product_admin;
	public $admin_message_handler;
	public $user_points_log_db_tablename;
	public $user_points_db_tablename;
	public $actions;
	public function __construct() {
		global $wpdb;
		$this->user_points_log_db_tablename = $wpdb->prefix . 'wc_points_rewards_user_points_log';
		$this->user_points_db_tablename     = $wpdb->prefix . 'wc_points_rewards_user_points';
		$this->includes();
		
		add_action( 'init', array( $this, 'load_translation' ) );
		add_action( 'init', array( $this, 'include_template_functions' ), 25 );

		add_action( 'user_register',  array( $this, 'refresh_user_points_balance' ) );
		add_action( 'profile_update', array( $this, 'refresh_user_points_balance' ) );
		add_action( 'delete_user',    array( $this, 'delete_user_points' ) );

		////////////////Register From//////////////////
		//1. Add a new form element...
		add_action( 'register_form', array( $this ,'myplugin_register_form' ));
		
		//2. Add validation. In this case, we make sure first_name is required.
		add_filter( 'registration_errors', array( $this ,'myplugin_registration_errors'), 10, 3 );	
		
		//3. Finally, save our extra registration user meta.
		add_action( 'user_register',array( $this , 'myplugin_user_register' ));
		add_action( 'show_user_profile',array( $this , 'yoursite_extra_user_profile_fields' ));
		add_action( 'edit_user_profile', array( $this ,'yoursite_extra_user_profile_fields' ));
				

		add_action( 'personal_options_update', array( $this ,'yoursite_save_extra_user_profile_fields' ));
		add_action( 'edit_user_profile_update', array( $this ,'yoursite_save_extra_user_profile_fields' ));
		
		
		if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
			$this->add_actions();
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'add_plugin_configure_link' ) );
			$this->install();
		} else {
			add_action( 'woocommerce_before_my_account', 'woocommerce_points_rewards_my_points' );
		}	
	}

	public function add_actions()
	 {
	  add_action( 'admin_head',array($this, 'eb_admin_add_scripts_point' )); 
	 }
	 
	 
	public function eb_admin_add_scripts_point(){
	  global $wc_points_rewards;
	  //FOR UPLOAD FILE IN TAXONOMY
	  wp_enqueue_media();
	  
	  ////////////////ADMIN STYLE///////////////////
	  wp_enqueue_style('pw-po-main-style',PW_POINT_URL.'/css/admin-css.css', array() , null);
	  
	  /////////////////////////CSS CHOSEN///////////////////////
	  wp_enqueue_style('pw-po-chosen-style',PW_POINT_URL.'/css/chosen/chosen.css', array() , null);
	  wp_enqueue_script( 'pw-po-chosen-script', PW_POINT_URL.'/js/chosen/chosen.jquery.min.js', array( 'jquery' ));
	 }	

	public function refresh_user_points_balance( $user_id ) {

		if ( ! user_can( $user_id, 'customer' ) ) return;
		update_user_meta( $user_id, 'wc_points_balance', WC_Points_Rewards_Manager::get_users_points( $user_id ) );
	}

	public function delete_user_points( $user_id ) {
		WC_Points_Rewards_Manager::delete_user_points( $user_id );
	}

	private function includes() {
	
		include 'classes/class-wc-point-pricing-compatibility.php';
		
		require( 'classes/class-wc-points-price.php' );
		
		require( 'classes/class-wc-points-rewards-product.php' );
		$this->product = new WC_Points_Rewards_Product();

		require( 'classes/class-wc-points-rewards-cart-checkout.php' );
		$this->cart = new WC_Points_Rewards_Cart_Checkout();

		require( 'classes/class-wc-points-rewards-order.php' );
		$this->order = new WC_Points_Rewards_Order();

		require( 'classes/class-wc-points-rewards-discount.php' );
		$this->discount = new WC_Points_Rewards_Discount();

		require( 'classes/class-wc-points-rewards-actions.php' );
		$this->actions = new WC_Points_Rewards_Actions();

		require( 'classes/class-wc-points-rewards-manager.php' );

		require( 'classes/class-wc-points-rewards-points-log.php' );

		if ( is_admin() )
			$this->admin_includes();
	}

	public function myplugin_register_form() {

		$first_name = ( ! empty( $_POST['birthday'] ) ) ? trim( $_POST['birthday'] ) : '';
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
			?>
			<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('.MyDate').datepicker({
						dateFormat : 'dd-mm-yy'
					});
				});
			</script>

			<p>
				<label for="birthday"><?php _e( 'Birthdate', 'wc_advanced_points' ) ?><br />
	 <input type="text" name="birthday" id="birthday" class="MyDate"
				value="<?php echo esc_attr( get_the_author_meta( 'birthday', $user->ID ) ); ?>" />			
			</p>
			<p>
				<label for="married"><?php _e( 'Marriage', 'wc_advanced_points' ) ?><br />
	 <input type="text" name="marriage_date" id="marriage_date" class="MyDate"
				value="<?php echo esc_attr( get_the_author_meta( 'marriage_date', $user->ID ) ); ?>" />			
			</p>
			<?php
		}


	   public function myplugin_registration_errors( $errors, $sanitized_user_login, $user_email ) {
			
			if ( empty( $_POST['birthday'] ) || ! empty( $_POST['birthday'] ) && trim( $_POST['birthday'] ) == '' ) {
				$errors->add( 'first_name_error', __( '<strong>ERROR</strong>: You must include a first name.', 'wc_advanced_points' ) );
			}
			
			if ( empty( $_POST['marriage_date'] ) || ! empty( $_POST['marriage_date'] ) && trim( $_POST['marriage_date'] ) == '' ) {
				$errors->add( 'first_name_error', __( '<strong>ERROR</strong>: You must include a first name.', 'wc_advanced_points' ) );
			}

			return $errors;
		}


	   public function myplugin_user_register( $user_id ) {
			if ( ! empty( $_POST['birthday'] ) ) {
				update_user_meta( $user_id, 'birthday', trim( $_POST['birthday'] ) );
			}
			
			if ( ! empty( $_POST['marriage_date'] ) ) {
				update_user_meta( $user_id, 'marriage_date', trim( $_POST['marriage_date'] ) );
			}
		}


	public function yoursite_extra_user_profile_fields( $user ) {
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
		//<input type="text" id="MyDate" name="MyDate" value=""/>
		if ( current_user_can( 'manage_options' ) ) {
		?>
			<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('.MyDate').datepicker({
						dateFormat : 'dd-mm-yy'
					});
				});
			</script>
		  <h3><?php _e("Extra profile information", "wc_advanced_points"); ?></h3>
		  <table class="form-table">
			<tr>
			  <th><label for="birthday"><?php _e("birthday","wc_advanced_points"); ?></label></th>
			  <td>
				<input type="text" name="birthday" id="birthday" class="MyDate"
					value="<?php echo esc_attr( get_the_author_meta( 'birthday', $user->ID ) ); ?>" /><br />
				<span class="description"><?php _e("Please enter your birthday.","wc_advanced_points"); ?></span>
			</td>
			</tr>

			<tr>
			  <th><label for="marriage_date"><?php _e("marriage","wc_advanced_points"); ?></label></th>
			  <td>
				<input type="text" name="marriage_date" id="marriage_date" class="MyDate"
					value="<?php echo esc_attr( get_the_author_meta( 'marriage_date', $user->ID ) ); ?>" /><br />
				<span class="description"><?php _e("Please enter your marriage.","wc_advanced_points"); ?></span>
			</td>
			</tr>
			
		  </table>
		<?php
		}
	}


	public function yoursite_save_extra_user_profile_fields( $user_id ) {
	  $saved = false;
	  if ( current_user_can( 'edit_user', $user_id ) ) {
		update_user_meta( $user_id, 'birthday', $_POST['birthday'] );
		update_user_meta( $user_id, 'marriage_date', $_POST['marriage_date'] );
		$saved = true;
	  }
	  return true;
	}

	
	
	private function admin_includes() {

		require( 'classes/class-wc-points-rewards-admin.php' );
		$this->admin = new WC_Points_Rewards_Admin();

		require( 'classes/class-wc-points-rewards-product-admin.php' );
		$this->product_admin = new WC_Points_Rewards_Product_Admin();

		require_once( 'classes/class-wp-admin-message-handler.php' );
		$this->admin_message_handler = new WP_Admin_Message_Handler();
		
		require_once( 'woo-includes/actions.php' );
		
	}

	public function load_translation() {
		load_plugin_textdomain( 'wc_advanced_points', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	public function include_template_functions() {
		wp_enqueue_style('pw-po-main-front-end',$this->get_plugin_url().'/css/front-end.css', array() , null);		
		include_once( 'woocommerce-points-and-rewards-template.php' );
	}

	public function add_plugin_configure_link( $actions ) {
		return ( array_merge( array( 'configure' => sprintf( '<a href="%s">%s</a>', admin_url( 'admin.php?page=wc-settings&tab=points' ), __( 'Configure', 'wc_advanced_points' ) ) ),
			$actions )
		);
	}

	public function get_points_label( $count ) {
		list( $singular, $plural ) = explode( ':', get_option( 'wc_points_rewards_points_label' ) );
		if ( 1 == $count ) return $singular;
		else return $plural;
	}

	public function get_plugin_path() {
		if ( $this->plugin_path )
			return $this->plugin_path;
		return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
	}

	public function get_plugin_url() {
		if ( $this->plugin_url )
			return $this->plugin_url;
		return $this->plugin_url = untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	public function log( $message ) {
		global $woocommerce;
			if ( ! is_object( $this->logger ) )
				$this->logger = $woocommerce->logger();
			$this->logger->add( 'points-rewards', $message );
	}

	private function install() {
		update_option("wc_points_rewards_earn_points_rounding","round");
		update_option("wc_points_rewards_points_label",sprintf( '%s:%s', __( 'Point', 'wc_advanced_points' ), __( 'Points', 'wc_advanced_points' ) ));
		$installed_version = get_option( 'wc_points_rewards_version' );
		if ( ! $installed_version ) {
			$offset           = (int) get_option( 'wc_points_rewards_install_offset', 0 );
			$records_per_page = 500;
			do {
				$user_ids = get_users( array( 'fields' => 'ID', 'offset' => $offset, 'number' => $records_per_page ) );
				if ( is_array( $user_ids ) ) {
					foreach ( $user_ids as $user_id ) {
						$wc_points_balance = get_user_meta( $user_id, 'wc_points_balance', true );
						if ( '' === $wc_points_balance ) {
							update_user_meta( $user_id, 'wc_points_balance', 0 );
							update_user_meta( $user_id, 'wc_points_level_user', 0 );
						}
					}
				}
				$offset += $records_per_page;
				update_option( 'wc_points_rewards_install_offset', $offset );

			} while ( count( $user_ids ) == $records_per_page );
			foreach ( WC_Points_Rewards_Admin::get_set() as $setting ) {

				if ( isset( $setting['default'] ) )
					add_option( $setting['id'], $setting['default'] );
			}
		}
		if ( -1 === version_compare( $installed_version, self::VERSION ) )
			$this->upgrade( $installed_version );
	}

	private function upgrade( $installed_version ) {
		$this->migrate( $installed_version );
		update_option( 'wc_points_rewards_version', self::VERSION );
	}

	private function migrate( $installed_version ) {
		global $wpdb;
		$wpdb->hide_errors();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$sql =
		"CREATE TABLE {$this->user_points_log_db_tablename} (
		  id bigint(20) NOT NULL AUTO_INCREMENT,
		  user_id bigint(20) NOT NULL,
		  points bigint(20) NOT NULL,
		  type varchar(255) DEFAULT NULL,
		  user_points_id bigint(20) DEFAULT NULL,
		  order_id bigint(20) DEFAULT NULL,
		  admin_user_id bigint(20) DEFAULT NULL,
		  data longtext DEFAULT NULL,
		  date datetime NOT NULL,
		  KEY idx_wc_points_rewards_user_points_log_date (date),
		  KEY idx_wc_points_rewards_user_points_log_type (type),
		  KEY idx_wc_points_rewards_user_points_log_points (points),
		  PRIMARY KEY  (id)
		) " . $this->get_db_collation();
		dbDelta( $sql );

		$sql =
		"CREATE TABLE {$this->user_points_db_tablename} (
		  id bigint(20) NOT NULL AUTO_INCREMENT,
		  user_id bigint(20) NOT NULL,
		  points bigint(20) NOT NULL,
		  points_balance bigint(20) NOT NULL,
		  order_id bigint(20) DEFAULT NULL,
		  date datetime NOT NULL,
		  KEY idx_wc_points_rewards_user_points_user_id_points_balance (user_id,points_balance),
		  PRIMARY KEY  (id)
		) " . $this->get_db_collation();
		dbDelta( $sql );
	}

	private function get_db_collation() {
		global $wpdb;

		$collate = '';
		if ( $wpdb->has_cap( 'collation' ) ) {
			if ( ! empty( $wpdb->charset ) ) $collate .= "DEFAULT CHARACTER SET {$wpdb->charset}";
			if ( ! empty( $wpdb->collate ) ) $collate .= " COLLATE {$wpdb->collate}";
		}

		return $collate;
	}
}

//End Class

//On plugin activation schedule our daily database backup 
register_activation_hook( __FILE__, 'wi_create_daily_backup_schedule_point' );
function wi_create_daily_backup_schedule_point(){
  //Use wp_next_scheduled to check if the event is already scheduled
	$times = wp_next_scheduled( 'wc_point_time_cron' );

	//If $timestamp == false schedule daily backups since it hasn't been done previously
	if( $times == false ){
		//Schedule the event for right now, then to repeat daily using the hook 'wi_create_daily_backup'
		wp_schedule_event( time(), 'schpoint', 'wc_point_time_cron' );
	}
	$timestamp = wp_next_scheduled( 'wi_create_daily_backupa' );
	if( $timestamp == false ){
		wp_schedule_event( time(), 'daily', 'wi_create_daily_backupa' );
	}  
}

add_filter( 'cron_schedules', 'wi_add_weekly_schedule_point' ); 
function wi_add_weekly_schedule_point( $schedules ) {
	$schedules['schpoint'] = array(
		'interval' => get_option('wc_points_mail_time') * 86400,
		'display' => __('Advanced Point', 'wc_advanced_points' )
	);
	$schedules['daily'] = array(
		'interval' => 1*86400,
		'display' => __( 'Advanced Point Daily', 'wc_advanced_points' )
	);	
	return $schedules;
}

//Hook our function , wi_create_backup(), into the action wi_create_daily_backup
add_action( 'wi_create_daily_backupa', 'wi_create_backup_point' );
function wi_create_backup_point(){
	if(get_option('wc_points_birthday')=="yes")
	{
		$dated=strtotime(date( 'Y-m-d', current_time( 'timestamp', 1 ) ));
		foreach (get_users() as $myuser) {	
			if(strtotime(get_the_author_meta( 'birthday', $myuser->ID ))==$dated)
			{
				$points=get_option('wc_points_birthday_value');
				if ( ! empty( $points ) )
					WC_Points_Rewards_Manager::increase_points( $myuser->ID, $points, 'birthday' );				
			}
		}
	}

	if(get_option('wc_points_marriage')=="yes")
	{
		$dated=strtotime(date( 'Y-m-d', current_time( 'timestamp', 1 ) ));
		foreach (get_users() as $myuser) {	
			if(strtotime(get_the_author_meta( 'marriage_date', $myuser->ID ))==$dated)
			{
				$points=get_option('wc_points_marriage_value');
				if ( ! empty( $points ) )
					WC_Points_Rewards_Manager::increase_points( $myuser->ID, $points, 'marriage' );				
			}
		}
	}
}

add_action('wc_point_time_cron','send_mail_point');
function send_mail_point(){
	global $wc_points_rewards,$woocommerce;	
	// New class mailer
	$mailer= $woocommerce->mailer();
	//Get Post Emial_template in custome post_type
	$args=array(
		'post_type'=>'email_template',
	);
	$loop = new WP_Query( $args );
	// Get Url Website
	$url = "<a href=" . site_url() . ">" . site_url() . "</a>";		
	while ( $loop->have_posts() ) : 
		$loop->the_post();
		$subject=get_post_meta(get_the_ID(),'email_subject',true);			
		$content =get_post_meta(get_the_ID(),'email_message',true);	
		foreach (get_users() as $users) {
			$points_balance=0;
			$user = get_userdata($users->ID);
			$touser = $user->user_email;
			$fname = $user->first_name;
			$lname = $user->last_name;	
			// Get User Point
			$upoint = WC_Points_Rewards_Manager::get_users_points( $users->ID );
			//Replace Text Email
			$content = str_replace('{sitelink}', $url,$content);
			$content = str_replace('{firstname}', $fname, $content);
			$content = str_replace('{lastname}', $lname, $content);
			$content = str_replace('{points}', $upoint, $content);
			$mailer->send( $touser, $subject, $content);
		}
	endwhile;
}

