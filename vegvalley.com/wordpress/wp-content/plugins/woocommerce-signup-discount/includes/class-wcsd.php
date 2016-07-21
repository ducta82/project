<?php

class WC_Signup_Discount {

    /**
     * Bootstraps the class and hooks required actions & filters.
     *
     */
    public function __construct() {

        //Check if woocommerce plugin is installed.
        add_action( 'admin_notices', array( $this, 'check_required_plugins' ) );

        //Add setting link for the admin settings
        add_filter( "plugin_action_links_".WCSD_BASE, array( $this, 'wcsd_settings_link' ) );

        //Add backend settings
        add_filter( 'woocommerce_get_settings_pages', array( $this, 'wcsd_settings_class' ) );

        //Add help tab for displaying the use for the variables in email
        add_action( "current_screen", array( $this, 'add_tabs' ), 50 );

        
        if( get_option( 'wcsd_popup' ) == 'yes' ){
            //Add css and js files for the popup
            add_action( 'wp_enqueue_scripts',  array( $this, 'wcsd_enque_scripts' ) );
            //show popup in the store frontend
            add_action( 'wp_footer', array( $this, 'wcsd_display_popup') );
        }


        //Send coupon to the registered users
        if ( get_option( 'wcsd_enabled' ) == 'yes' ) {
            
            if( get_option('wcsd_restrict') == 'yes')
                add_filter('woocommerce_coupon_is_valid', array($this,'validate_coupon'), 10, 2);
            
            add_action( 'user_register', array( $this, 'wcsd_send_coupons' ) );
        }
        add_action( 'admin_enqueue_scripts',  array( $this, 'wcsd_enque_admin_scripts' ) );
        add_action( 'wp_ajax_wcsd_ajax_products', array( $this, 'wcsd_ajax_products' ) );

    }
     public function wcsd_enque_admin_scripts() {
      if( is_admin() ) {
        wp_enqueue_style( 'select2-style', plugins_url( 'assets/css/select2.css', WCSD_FILE ) );
        wp_enqueue_script( 'wcsd-enhanced-select', plugins_url( 'assets/js/select2.min.js', WCSD_FILE ) , array( 'jquery' ), '1.0.0', true );
      }

      wp_localize_script( 'wcsd-enhanced-select', 'wcsd_enhanced_select_params', array(
        'i18n_matches_1'            => _x( 'One result is available, press enter to select it.', 'enhanced select', 'woocommerce' ),
        'i18n_matches_n'            => _x( '%qty% results are available, use up and down arrow keys to navigate.', 'enhanced select', 'woocommerce' ),
        'i18n_no_matches'           => _x( 'No matches found', 'enhanced select', 'woocommerce' ),
        'i18n_ajax_error'           => _x( 'Loading failed', 'enhanced select', 'woocommerce' ),
        'i18n_input_too_short_1'    => _x( 'Please enter 1 or more characters', 'enhanced select', 'woocommerce' ),
        'i18n_input_too_short_n'    => _x( 'Please enter %qty% or more characters', 'enhanced select', 'woocommerce' ),
        'i18n_input_too_long_1'     => _x( 'Please delete 1 character', 'enhanced select', 'woocommerce' ),
        'i18n_input_too_long_n'     => _x( 'Please delete %qty% characters', 'enhanced select', 'woocommerce' ),
        'i18n_selection_too_long_1' => _x( 'You can only select 1 item', 'enhanced select', 'woocommerce' ),
        'i18n_selection_too_long_n' => _x( 'You can only select %qty% items', 'enhanced select', 'woocommerce' ),
        'i18n_load_more'            => _x( 'Loading more results&hellip;', 'enhanced select', 'woocommerce' ),
        'i18n_searching'            => _x( 'Searching&hellip;', 'enhanced select', 'woocommerce' ),
      ) );      
     }    

    /**
    *
    * Add necessary js and css files for the popup
    *
    */
    public function wcsd_enque_scripts() {

      if( !is_user_logged_in() && get_option( 'wcsd_enabled' ) == 'yes' ) {

        wp_enqueue_style( 'wcsd-custombox-stylesheet', plugins_url( 'assets/css/custombox.css', WCSD_FILE ));
        wp_enqueue_script( 'wcsd-custombox-script', plugins_url( 'assets/js/custombox.min.js', WCSD_FILE ) , array( 'jquery' ), '1.0.0', true);
        wp_enqueue_script( 'wcsd-legacy-js', plugins_url( 'assets/js/legacy.min.js', WCSD_FILE ) , array( 'jquery' ), '1.0.0', true);
        wp_enqueue_script('custom-script', plugins_url( 'assets/js/custom.js', WCSD_FILE ), array( 'jquery', 'wcsd-custombox-script' ), '1.0.0', true );
        wp_localize_script('custom-script', 'wcsd', array('effect' => get_option('wcsd_popup_animation')));
        
      }
    }

    public function wcsd_ajax_products() {
        global $wpdb;
        $post_types = array( 'product' );
        ob_start();

        if ( empty( $term ) ) {
            $term = wc_clean( stripslashes( $_GET['term'] ) );
        } else {
            $term = wc_clean( $term );
        }

        if ( empty( $term ) ) {
            die();
        }

        $like_term = '%' . $wpdb->esc_like( $term ) . '%';

        if ( is_numeric( $term ) ) {
            $query = $wpdb->prepare( "
                SELECT ID FROM {$wpdb->posts} posts LEFT JOIN {$wpdb->postmeta} postmeta ON posts.ID = postmeta.post_id
                WHERE posts.post_status = 'publish'
                AND (
                    posts.post_parent = %s
                    OR posts.ID = %s
                    OR posts.post_title LIKE %s
                    OR (
                        postmeta.meta_key = '_sku' AND postmeta.meta_value LIKE %s
                    )
                )
            ", $term, $term, $term, $like_term );
        } else {
            $query = $wpdb->prepare( "
                SELECT ID FROM {$wpdb->posts} posts LEFT JOIN {$wpdb->postmeta} postmeta ON posts.ID = postmeta.post_id
                WHERE posts.post_status = 'publish'
                AND (
                    posts.post_title LIKE %s
                    or posts.post_content LIKE %s
                    OR (
                        postmeta.meta_key = '_sku' AND postmeta.meta_value LIKE %s
                    )
                )
            ", $like_term, $like_term, $like_term );
        }

        $query .= " AND posts.post_type IN ('" . implode( "','", array_map( 'esc_sql', $post_types ) ) . "')";

        if ( ! empty( $_GET['exclude'] ) ) {
            $query .= " AND posts.ID NOT IN (" . implode( ',', array_map( 'intval', explode( ',', $_GET['exclude'] ) ) ) . ")";
        }

        if ( ! empty( $_GET['include'] ) ) {
            $query .= " AND posts.ID IN (" . implode( ',', array_map( 'intval', explode( ',', $_GET['include'] ) ) ) . ")";
        }

        if ( ! empty( $_GET['limit'] ) ) {
            $query .= " LIMIT " . intval( $_GET['limit'] );
        }

        $posts          = array_unique( $wpdb->get_col( $query ) );
        $found_products = array();

        if ( ! empty( $posts ) ) {
            foreach ( $posts as $post ) {
                $product = wc_get_product( $post );

                if ( ! current_user_can( 'read_product', $post ) ) {
                    continue;
                }

                if ( ! $product || ( $product->is_type( 'variation' ) && empty( $product->parent ) ) ) {
                    continue;
                }

                $found_products[ $post ] = rawurldecode( $product->get_formatted_name() );
            }
        }
        
        wp_send_json( $found_products );
    }


    /**
    *
    * Check if woocommerce is installed and activated and if not
    * activated then deactivate woocommerce signup discount.
    *
    */
    public function check_required_plugins() {

        //Check if woocommerce is installed and activated
        if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>

            <div id="message" class="error">
                <p>WooCommerce Signup Discount requires <a href="http://www.woothemes.com/woocommerce/" target="_blank">WooCommerce</a> to be activated in order to work. Please install and activate <a href="<?php echo admin_url('/plugin-install.php?tab=search&amp;type=term&amp;s=WooCommerce'); ?>" target="">WooCommerce</a> first.</p>
            </div>

            <?php
            deactivate_plugins( '/woocommerce-signup-discount/woocommerce-signup-discount.php' );
        }

    }

    /**
     * Add new link for the settings under plugin links
     *
     * @param array   $links an array of existing links.
     * @return array of links  along with signup discount settings link.
     *
     */
    public function wcsd_settings_link($links) {
        $settings_link = '<a href="'.admin_url('admin.php?page=wc-settings&tab=signup_discount').'">Settings</a>'; 
        array_unshift( $links, $settings_link ); 
        return $links; 
    }

    /**
     * Add new admin setting page for woocommerce signup discount settings.
     *
     * @param array   $settings an array of existing setting pages.
     * @return array of setting pages along with signup discount settings page.
     *
     */
    public function wcsd_settings_class( $settings ) {
        $settings[] = include 'class-wc-settings-signup-discounts.php';
        return $settings;
    }


    public function wcsd_display_popup() { 
      if( !is_user_logged_in() ):
        $height = get_option( 'wcsd_popup_height' ) == 0 ? 'auto' : get_option( 'wcsd_popup_height' ) . 'px';
        $width = get_option( 'wcsd_popup_width' ) == 0 ? 'auto' : get_option( 'wcsd_popup_width' ) . 'px';
        $bg = get_option( 'wcsd_pop_bg' ) ==  '' ? get_option('wcsd_pop_bgcolor') : 'url(' . get_option( 'wcsd_pop_bg' ) . ')';
        $content_width = get_option('wcsd_content_width') . 'px';
        $top_pixel = get_option('wcsd_content_top') . 'px';
        $left_pixel = get_option('wcsd_content_left') . 'px';
      ?>
      <style>
        #wcsd_modal {
          height: <?php echo $height; ?>;
          max-width: <?php echo $width; ?> !important;
          background:  <?php echo $bg; ?>;
        }
        .wcsd_content {
          width: <?php echo $width; ?>;
        }
        .wcsd_text {
          width: <?php echo $content_width; ?>;
          top: <?php echo $top_pixel; ?>;
          left: <?php echo $left_pixel; ?>;
        }        
      </style>
      <div id="wcsd_modal">
        <button type="button" class="close" onclick="Custombox.close();">
          <span>&times;</span>
        </button>
        <div class="wcsd_content">
          <div class="wcsd_text">
            <?php echo wpautop( stripslashes( get_option('wcsd_popup_text') ) ); ?>
          </div>
        </div>
      </div>
    <?php 
      endif;
    }

    /**
     * Hook our function to send the emails to users when they register
     *
     * @param int $user_id database ID for the newly registered user.
     *
     */
    public function wcsd_send_coupons( $user_id ) {
        $user = get_user_by( 'id', $user_id );
        $prefix =get_option( 'wcsd_prefix' );
        if( $prefix == '' )
            $prefix = 'XR';
        $code = $prefix . $user_id;
        $type = get_option( 'wcsd_dis_type' );
        $amount = get_option( 'wcsd_amount' );
        $product_ids = get_option( 'wcsd_products' );
        $allowed_products = '';
        $excluded_products = '';
        if ( is_array( $product_ids ) ) {
            foreach ( $product_ids as $product_id ) {
                $product = wc_get_product( $product_id );
                $allowed_products .= '<a href="'.$product->get_permalink().'">'.$product->get_title().'</a>,';
            }
            $allowed_products = rtrim( $allowed_products, ',' );
            $product_ids = implode( ',', $product_ids );
        }

        $exclude_product_ids = get_option( 'wcsd_exclude_products' );
        if ( is_array( $exclude_product_ids ) ) {
            foreach ( $exclude_product_ids as $product_id ) {
                $product = wc_get_product( $product_id );
                $excluded_products .= '<a href="'.$product->get_permalink().'">'.$product->get_title().'</a>,';
            }
            $excluded_products = rtrim( $excluded_products, ',' );
            $exclude_product_ids = implode( ',', $exclude_product_ids );
        }


        $product_categories = get_option( 'wcsd_categories' );
        $allowed_cats = '';
        $excluded_cats = '';
        if ( is_array( $product_categories ) ) {
            foreach ( $product_categories as $cat_id ) {
                $cat = get_term_by( 'id', $cat_id, 'product_cat' );
                $allowed_cats .= '<a href="'.get_term_link( $cat->slug, 'product_cat' ).'">'.$cat->name.'</a>,';
            }
            $allowed_cats = rtrim( $allowed_cats, ',' );
        }
        else
            $product_categories = array();


        $exclude_product_categories = get_option( 'wcsd_exclude_categories' );
        if ( is_array( $exclude_product_categories ) ) {
            foreach ( $exclude_product_categories as $cat_id ) {
                $cat = get_term_by( 'id', $cat_id, 'product_cat' );
                $excluded_cats .= '<a href="'.get_term_link( $cat->slug, 'product_cat' ).'">'.$cat->name.'</a>,';
            }
            $excluded_cats = rtrim( $excluded_cats, ',' );
        }
        else
            $exclude_product_categories = array();

        $days = get_option( 'wcsd_days' );
        $date = '';
        $expire = '';
        if ( $days ) {
            $date = date( 'Y-m-d', strtotime( '+'.$days.' days' ) );
            $expire = date( 'jS F Y', strtotime( '+'.$days.' days' ) );
        }
        $free_shipping = get_option( 'wcsd_shipping' );
        $exclude_sale_items = get_option( 'wcsd_sale' );
        $minimum_amount = get_option( 'wcsd_min_purchase' );
        $maximum_amount = get_option( 'wcsd_max_purchase' );
        $customer_email = '';
        if ( get_option( 'wcsd_restrict' ) == 'yes' )
            $customer_email = $user->user_email;

        //Add a new coupon when user registers
        $coupon = array(
            'post_title' => $code,
            'post_content' => $user->first_name . ' ' . $user->last_name,
            'post_excerpt' => $user->first_name . ' ' . $user->last_name,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type'     => 'shop_coupon'
        );
        $coupon_id = wp_insert_post( $coupon );

        //Add coupon meta data
        update_post_meta( $coupon_id, 'discount_type', $type );
        update_post_meta( $coupon_id, 'coupon_amount', $amount );
        update_post_meta( $coupon_id, 'individual_use', 'yes' );
        update_post_meta( $coupon_id, 'product_ids', $product_ids );
        update_post_meta( $coupon_id, 'exclude_product_ids', $exclude_product_ids );
        update_post_meta( $coupon_id, 'usage_limit', '1' );
        update_post_meta( $coupon_id, 'usage_limit_per_user', '1' );
        update_post_meta( $coupon_id, 'limit_usage_to_x_items', '' );
        update_post_meta( $coupon_id, 'expiry_date', $date );
        update_post_meta( $coupon_id, 'apply_before_tax', 'no' );
        update_post_meta( $coupon_id, 'free_shipping', $free_shipping );
        update_post_meta( $coupon_id, 'exclude_sale_items', $exclude_sale_items );
        update_post_meta( $coupon_id, 'product_categories', $product_categories );
        update_post_meta( $coupon_id, 'exclude_product_categories', $exclude_product_categories );
        update_post_meta( $coupon_id, 'minimum_amount', $minimum_amount );
        update_post_meta( $coupon_id, 'maximum_amount', $maximum_amount );
        update_post_meta( $coupon_id, 'customer_email', $customer_email );

        $search = array( '{USERNAME}', '{COUPONCODE}', '{COUPONEXPIRY}', '{ALLOWEDCATEGORIES}', '{EXCLUDEDCATEGORIES}', '{ALLOWEDPRODUCTS}', '{EXCLUDEDPRODUCTS}' );
        $replace = array( $user->user_login, $code, $expire, $allowed_cats, $excluded_cats, $allowed_products, $excluded_products );
        $subject = str_replace( $search, $replace, get_option( 'wcsd_email_sub' ) );
        $body = str_replace( $search, $replace, get_option( 'wcsd_email' ) );

        add_filter( 'wp_mail_content_type', array( $this, 'mail_content_type' ) );
        add_filter( 'wp_mail_from', array( $this, 'mail_from' ) );
        add_filter( 'wp_mail_from_name', array( $this, 'mail_from_name' ) );

        $mail = get_option( 'wcsd_disable_email' );
        
        if( $mail != 'yes' ){
            wp_mail( $user->user_email, $subject, wpautop( $body ) );
            wp_mail( $admin_mail, $subject, wpautop( $body ) );
        }

        remove_filter( 'wp_mail_content_type', array( $this, 'mail_content_type' ) );
        remove_filter( 'wp_mail_from', array( $this, 'mail_from' ) );
        remove_filter( 'wp_mail_from_name', array( $this, 'mail_from_name' ) );
    }

    /**
    *
    * Set default email from address set from the admin.
    *
    * @return string $from_email email address from which the email should be sent.
    *
    */
    public function mail_from() {
        $from_email = get_option( 'wcsd_email_id' );
        return $from_email;
    }

    /**
    *
    * Set default email from name set from the admin.
    *
    * @return string $from_name name  from which the email should be sent.
    *
    */
    public function mail_from_name() {
        $from_name = get_option( 'wcsd_email_name' );
        return $from_name;
    }

    /**
    *
    * Set email content type
    *
    * @return string content type for the email to be sent.
    *
    */
    public function mail_content_type() {
        return "text/html";
    }

  /**
    *
    * Our own custom method to verify the coupon for specific email address
    * as the one with woocommerce core doesn't work always.
    *
    * @param $valid boolean validation status.
    * @param $item list of values for the submitted coupon
    *
    * @return boolean status for coupon validation.
    *
    */
    public function validate_coupon( $valid, $item ) {
        if( is_array( $item->customer_email ) ) {
            if( !is_user_logged_in() ){
                add_filter('woocommerce_coupon_error', array($this,'custom_error'), 10, 3);
                return false;
            }
            else {
                global $current_user;
                get_currentuserinfo();
                if( $item->customer_email[0] != '' && $item->customer_email[0] != $current_user->user_email ){
                    add_filter('woocommerce_coupon_error', array($this,'custom_error'), 10, 3);
                    return false;
                }
            }
        }
        return $valid;
    }

    /**
    *
    * Custom error message for coupon validation.
    *
    * @param string $err default error message.
    * @param string $errcode error code for the error
    * @param array of values for the applied coupon
    *
    * @return string error message.
    *
    */
    public function custom_error( $err, $errcode, $val ) {
        if( !is_user_logged_in() )
            return __( 'Please login to apply this coupon.', 'wc_signup_discount' );
        else
            return __( 'This coupon is assigned to some other user, Please verify !', 'wc_signup_discount' );
    }

    /**
     * Add Contextual help tab
     */
    public function add_tabs() {
        $screen = get_current_screen();

        if ( $screen->id != 'woocommerce_page_wc-settings' )
            return;

        $screen->add_help_tab( array(
                'id'        => 'wcsd_help',
                'title'     => __( 'Signup Discount ', 'woocommerce' ),
                'content'   =>

                '<p>' . __( 'Thanks for purchasing the plugin. Please find the list of variables you can use for email body and email subject.', 'woocommerce' ) . '</p>' .

                '<table class="widefat">
                    <tr>
                        <th>Variable</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td><input readonly value="{USERNAME}"></td>
                        <td>Username of the user who will receive the discount code.</td>
                    </tr>
                    <tr>
                        <td><input readonly value="{COUPONCODE}"></td>
                        <td>The coupon code which the user will use to reedem his discount. Make sure you have added this in email content otherwise the user can\'t get the discount.</td>
                    </tr>
                    <tr>
                        <td><input readonly value="{COUPONEXPIRY}"></td>
                        <td>It will output the coupon expiry date if you have entered a value for coupon validity.</td>
                    </tr>
                    <tr>
                        <td><input readonly size="26" value="{ALLOWEDCATEGORIES}"></td>
                        <td>It will display the list of categories with their link on which the discount is applicable. Make sure you have selected some categories otherwise it will output nothing.</td>
                    </tr>
                    <tr>
                        <td><input readonly size="26" value="{EXCLUDEDCATEGORIES}"></td>
                        <td>It will display the list of categories with their link on which the discount is not applicable. Make sure you have selected some categories otherwise it will output nothing.</td>
                    </tr>
                    <tr>
                        <td><input readonly size="26" value="{ALLOWEDPRODUCTS}"></td>
                        <td>It will display the list of products with their link on which the discount is applicable. Make sure you have selected some products otherwise it will output nothing.</td>
                    </tr>
                    <tr>
                        <td><input readonly size="26" value="{EXCLUDEDPRODUCTS}"></td>
                        <td>It will display the list of products with their link on which the discount is not applicable. Make sure you have selected some products otherwise it will output nothing.</td>
                    </tr>
                </table>'

            ) );
    }

}