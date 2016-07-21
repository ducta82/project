<?php
/*
Plugin Name: Woocommerce Signup Discount
Plugin URI: http://magnigenie.com
Description: The plugin allows you to offer discounts to the newly registered users on your site.
Version: 1.5.4
Author: Magnigenie
Author URI: http://magnigenie.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// No direct file access
! defined( 'ABSPATH' ) AND exit;

define('WCSD_FILE', __FILE__);
define('WCSD_PATH', plugin_dir_path(__FILE__));
define('WCSD_BASE', plugin_basename(__FILE__));


require WCSD_PATH . '/includes/class-wcsd.php';

new WC_Signup_Discount();