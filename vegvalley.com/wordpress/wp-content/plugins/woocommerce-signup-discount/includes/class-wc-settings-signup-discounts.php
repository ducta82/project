<?php
/**
 * WooCommerce Signup Discount Settings
 *
 * @author 		Magnigenie
 * @category 	Admin
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (  class_exists( 'WC_Settings_Page' ) ) :

/**
 * WC_Settings_Accounts
 */
class WC_Settings_Signup_Discount extends WC_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'signup_discount';
		$this->label = __( 'Signup Discount', 'wc_signup_discount' );
		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
		add_action( 'woocommerce_settings_' . $this->id, array( $this, 'output' ) );
		add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) );
		add_action( 'admin_footer', array( $this, 'wcsd_add_scripts') );
		add_action( 'woocommerce_admin_field_wcsd_wpeditor', array( $this, 'wcsd_display_editor' ) );
		add_action( 'woocommerce_update_option_wcsd_wpeditor', array( $this, 'wcsd_save_editor_val' ) );
		add_action( 'woocommerce_admin_field_wcsd_uploader', array( $this, 'wcsd_display_uploader' ) );
		add_action( 'woocommerce_admin_field_wcsd_search_products', array( $this, 'wcsd_search_products' ) );
		add_action( 'woocommerce_admin_field_wcsd_exclude_products', array( $this, 'wcsd_exclude_products' ) );
	}
	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {

		$wcsd_products = get_option( 'wcsd_products' );
		$products = array();
		if ( is_array( $wcsd_products ) ) {
			foreach ( $wcsd_products as $product_id ) {
				$product = wc_get_product( $product_id );
				$products[$product_id] = wp_kses_post( $product->get_formatted_name() );
			}
		}
		$wcsd_exclude_products = get_option( 'wcsd_exclude_products' );
		$products_exclude = array();
		if ( is_array( $wcsd_exclude_products ) ) {
			foreach ( $wcsd_exclude_products as $product_id ) {
				$product = wc_get_product( $product_id );
				$products_exclude[$product_id] = wp_kses_post( $product->get_formatted_name() );
			}
		}
		$categories = get_terms( 'product_cat', 'orderby=name&hide_empty=0' );
		$cats = array();
		if ( $categories ) foreach ( $categories as $cat ) $cats[$cat->term_id] = esc_html( $cat->name );
		return apply_filters( 'woocommerce_' . $this->id . '_settings', array(

			array(	'title' => __( 'Signup Discount Settings', 'wc_signup_discount' ), 'type' => 'title','desc' => '', 'id' => 'signup_discount_title' ),
                array(
					'title' 			=> __( 'Enable', 'wc_signup_discount' ),
					'desc' 			=> __( 'Enable discount for new user registration.', 'wc_signup_discount' ),
					'type' 				=> 'checkbox',
					'id'				=> 'wcsd_enabled',
					'default' 			=> 'no'											
				),
                array(
					'title' 			=> __( 'Restrict Email', 'wc_signup_discount' ),
					'desc' 			=> __( 'Allow discount if the purchase is made for the same email id user registered on the site.', 'wc_signup_discount' ),
					'type' 				=> 'checkbox',
					'id'				=> 'wcsd_restrict',
					'default' 			=> 'yes'											
				),
				array(
					'title' 	=> __( "Discount Type", 'wc_signup_discount' ),
					'type' 		=> 'select',
					'id'		=> 'wcsd_dis_type',
					'options' 	=> wc_get_coupon_types(),
					'default' 	=> 'percent'
				),
				array(
					'title' 	=> __( "Coupon Prefix", 'wc_signup_discount' ),
					'type' 		=> 'text',
					'id'		=> 'wcsd_prefix',
					'default' 	=> 'XR'
				),
				array(
					'title' 	  => __( 'Disable email', 'wc_signup_discount' ),
					'desc' 		  => __( 'Disable email sending feature', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_disable_email',
					'type' 		  => 'checkbox',
					'default'	  => 'no',
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Discount Amount', 'wc_signup_discount' ),
					'desc' 		  => __( 'Enter a coupon discount amount', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_amount',
					'type' 		  => 'text',
					'default'	  => '5',
					'desc_tip'	  =>  true
				),
                array(
					'title' 			=> __( 'Allow free shipping', 'wc_signup_discount' ),
					'desc' 			=> __( 'Check this box if the coupon grants free shipping. The <a href="'.admin_url('admin.php?page=wc-settings&amp;tab=shipping&amp;section=WC_Shipping_Free_Shipping').'">free shipping method</a> must be enabled with the "must use coupon" setting.', 'wc_signup_discount' ),
					'type' 				=> 'checkbox',
					'id'				=> 'wcsd_shipping',
					'default' 			=> 'no'										
				),
                array(
					'title' 			=> __( 'Exclude on sale items', 'wc_signup_discount' ),
					'desc' 			=> __( 'Check this box if the coupon should not apply to items on sale. Per-item coupons will only work if the item is not on sale. Per-cart coupons will only work if there are no sale items in the cart.', 'wc_signup_discount' ),
					'type' 				=> 'checkbox',
					'id'				=> 'wcsd_sale',
					'default' 			=> 'no'										
				),
				array(
					'title' 	  => __( 'Products', 'wc_signup_discount' ),
					'desc' 		  => __( 'Products which need to be in the cart to use this coupon or, for "Product Discounts", which products are discounted.', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_products',
					'type'    => 'wcsd_search_products',
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Exclude products', 'wc_signup_discount' ),
					'desc' 		  => __( 'Products which must not be in the cart to use this coupon or, for "Product Discounts", which products are not discounted.', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_exclude_products',
					'type'    => 'wcsd_exclude_products',
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Categories', 'wc_signup_discount' ),
					'desc' 		  => __( 'A product must be in this category for the coupon to remain valid or, for "Product Discounts", products in these categories will be discounted.', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_categories',
					'type' 		  => 'multiselect',
					'class'		  => 'chosen_select',
					'css'		  => 'width:300px',
					'default'	  => '',
					'options'     => $cats,
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Exclude Categories', 'wc_signup_discount' ),
					'desc' 		  => __( 'Product must not be in this category for the coupon to remain valid or, for "Product Discounts", products in these categories will not be discounted.', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_exclude_categories',
					'type' 		  => 'multiselect',
					'class'		  => 'chosen_select',
					'css'		  => 'width:300px',
					'default'	  => '',
					'options'     => $cats,
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Coupon Validity (in days)', 'wc_signup_discount' ),
					'desc' 		  => __( 'Enter number of days the coupon will active from the date of registration of the user. Leave blank for no limit.', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_days',
					'type' 		  => 'number',
					'css'		  => 'width:100px',
					'default'	  => '',
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Minimum Purchase', 'wc_signup_discount' ),
					'desc' 		  => __( 'Minimum purchase subtotal in order to be able to use the coupon. Leave blank for no limit', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_min_purchase',
					'type' 		  => 'text',
					'default'	  => '',
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Maximum Purchase', 'wc_signup_discount' ),
					'desc' 		  => __( 'Maximum purchase subtotal in order to be able to use the coupon. Leave blank for no limit', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_max_purchase',
					'type' 		  => 'text',
					'default'	  => '',
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Email From Name', 'wc_signup_discount' ),
					'desc' 		  => __( 'Enter the name which will appear on the emails.', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_email_name',
					'type' 		  => 'text',
					'css'		  => 'width:300px',
					'default'	  => get_bloginfo('name'),
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'From Email', 'wc_signup_discount' ),
					'desc' 		  => __( 'Enter the email from which the emails will be sent.', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_email_id',
					'type' 		  => 'text',
					'css'		  => 'width:300px',
					'default'	  => get_bloginfo('admin_email'),
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Email Subject', 'wc_signup_discount' ),
					'desc' 		  => __( 'This will be email subject for the emails that will be sent to the users.', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_email_sub',
					'type' 		  => 'text',
					'css'		  => 'width:100%',
					'default'	  => 'Congrats, {USERNAME} you got a discount for registering on our site',
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Email Body', 'wc_signup_discount' ),
					'desc' 		  => __( 'Email content will be sent to the users when they register on the site. <a href="#" id="wcsd-help">Click here</a> to see the list of variables you can use for <b>Email body and Email subject.</b>', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_email',
					'type' 		  => 'wcsd_wpeditor',
					'default'	  => '<p>Hi {USERNAME},</p><p>Thanks for registering on our website. As a registration bonus we present you with a 5% of discount on all your orders. The coupon code to redeem the discount is <h3>{COUPONCODE}</h3></p><p>The coupon will expire on {COUPONEXPIRY} so make sure to get the benefits while you still have time.</p><p>Regards</p>',
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Enable Popup', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_popup',
					'type' 		  => 'checkbox',
					'desc' 		  => __( 'Display signup offer in popup', 'wc_signup_discount' ),
					'default'	  => 'yes',
					'desc_tip'	  =>  false
				),				
				array(
					'title' 	  => __( 'Popup Background Image', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_pop_bg',
					'type' 		  => 'wcsd_uploader',
					'default'	  => plugins_url( 'assets/wcsd.jpg', WCSD_FILE ),
					'desc_tip'	  =>  true
				),				
				array(
					'title' 	  => __( 'Popup Background Color', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_pop_bgcolor',
					'type' 		  => 'color',
					'default'	  => '',
					'css' => 'width: 125px;',
					'desc_tip'	  =>  true
				),
				array(
					'title' 	  => __( 'Popup Height (px)', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_popup_height',
					'type' 		  => 'number',
					'css' => 'width: 125px;',
					'default'	  => '250',
					'desc' 		  => __( 'Enter a height for the popup. Put 0 for auto height', 'wc_signup_discount' ),
					'desc_tip'	  =>  false
				),
				array(
					'title' 	  => __( 'Popup Width (px)', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_popup_width',
					'type' 		  => 'number',
					'css' => 'width: 125px;',
					'default'	  => '540',
					'desc' 		  => __( 'Enter a width for the popup. Put 0 for auto width', 'wc_signup_discount' ),
					'desc_tip'	  =>  false
				),
				array(
					'title' 	  => __( 'Popup Content Width (px)', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_content_width',
					'type' 		  => 'number',
					'css' => 'width: 125px;',
					'default'	  => '200',
					'desc' 		  => __( 'Enter a width for the popup content. ', 'wc_signup_discount' ),
					'desc_tip'	  =>  false
				),
				array(
					'title' 	  => __( 'Popup Content Top Position (px)', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_content_top',
					'type' 		  => 'number',
					'css' => 'width: 125px;',
					'default'	  => '0',
					'desc' 		  => __( 'Enter number of pixel for the popup content from the top. ', 'wc_signup_discount' ),
					'desc_tip'	  =>  false
				),
				array(
					'title' 	  => __( 'Popup Content Left Position (px)', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_content_left',
					'type' 		  => 'number',
					'css' => 'width: 125px;',
					'default'	  => '40',
					'desc' 		  => __( 'Enter number of pixel for the popup content from the left. ', 'wc_signup_discount' ),
					'desc_tip'	  =>  false
				),																											
				array(
					'title' 	=> __( "Popup Animation effect", 'wc_signup_discount' ),
					'type' 		=> 'select',
					'id'		=> 'wcsd_popup_animation',
          'options' => array(
          	'fadein' => __( 'Fade In', 'wc_signup_discount' ),
          	'slide' => __( 'Slide', 'wc_signup_discount' ),
          	'newspaper' => __( 'Newspaper', 'wc_signup_discount' ),
          	'fall' => __( 'Fall', 'wc_signup_discount' ),
          	'slidefall' => __( 'Slidefall', 'wc_signup_discount' ),
          	'blur' => __( 'Blur', 'wc_signup_discount' ),
          	'flip' => __( 'Flip', 'wc_signup_discount' ),
          	'sign' => __( 'Sign', 'wc_signup_discount' ),
          	'slit' => __( 'Slit', 'wc_signup_discount' ),
          	'rotate' => __( 'Rotate', 'wc_signup_discount' ),
          	'corner' => __( 'Corner', 'wc_signup_discount' ),
          	'slidetogether' => __( 'Slide together', 'wc_signup_discount' ),
          	'scale' => __( 'Scale', 'wc_signup_discount' ),
          	'door' => __( 'Door', 'wc_signup_discount' ),
          	'push' => __( 'Push', 'wc_signup_discount' ),
          	'contentscale' => __( 'Content scale', 'wc_signup_discount' ),
          	),
					'default' 	=> 'fadein'
				),

				array(
					'title' 	  => __( 'Popup Text', 'wc_signup_discount' ),
					'desc' 		  => __( 'Popup text will be shown when a new user visits the site', 'wc_signup_discount' ),
					'id' 		  => 'wcsd_popup_text',
					'type' 		  => 'wcsd_wpeditor',
					'default'	  => '<h1 style="text-align: center;"><span style="color: #ffffff;">Get 5% Off now!</span></h1>
													<h5 style="text-align: center;"><span style="color: #ffffff;">Register now and get free coupon code.</span></h5>
													<h5 style="text-align: center;"><span style="color: #8B1C1A;">&nbsp;<a style="color: #8B1C1A;" href="/my-account">Register Now</a></span></h5>',
					'desc_tip'	  =>  true
				),				

				array( 'type' => 'sectionend', 'id' => 'simple_wcsd_options'),

		)); // End pages settings
	}

	/**
	* Output wordpress editor for email body condent.
	*
	* @param array $value array of settings variables.
	* @return null displays the editor. 
	*
	*/
	public function wcsd_display_editor( $value ) {
		$option_value = WC_Admin_Settings::get_option( $value['id'], $value['default'] ); ?>
		<tr valign="top">
			<th scope="row" class="titledesc">
				<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
			</th>
			<td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
				<?php echo $value['desc']; ?>
				<?php wp_editor( $option_value, esc_attr( $value['id'] ) ); ?>
			</td>
		</tr>
	<?php
	}

	/**
	* Saves the content fpr wp_editor.
	*
	* @return null saves the value of the option. 
	*
	*/
	public function wcsd_save_editor_val( $value ) {
		$email_text = $_POST[$value['id']];
		update_option( $value['id'], $email_text  );
	}

	/**
	* Output wordpress file uploader.
	*
	* @param array $value array of settings variables.
	* @return null displays the editor. 
	*
	*/
	public function wcsd_display_uploader( $value ) {
		$option_value = WC_Admin_Settings::get_option( $value['id'], $value['default'] ); ?>
		<tr valign="top">
			<th scope="row" class="titledesc">
				<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
			</th>
			<td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
				<div class="uploader">
					<input value="<?php echo $option_value; ?>" id="<?php echo esc_attr( $value['id'] ); ?>" name="<?php echo esc_attr( $value['id'] ); ?>" type="text" />
					<input id="wcsd_button" class="button" type="button" value="Upload" />
					<div class="wcsd_image">
						<?php if($option_value != '') { 
							echo '<img src="'.$option_value.'" style="width: 100px;" alt="">';
							} ?>
					</div>
				</div>
			</td>
		</tr>

	<?php
	}

	/**
	* Product ids
	*/
	public function wcsd_search_products() {
		?>
		<tr valign="top" class="search-products">
			<th><?php _e( 'Products', 'woocommerce' ); ?></th>
			<td>
				<input type="hidden" class="wcsd wc-product-search" data-multiple="true" style="width: 50%;" name="wcsd_products" data-placeholder="<?php esc_attr_e( 'Search for a product&hellip;', 'woocommerce' ); ?>" data-action="wcsd_ajax_products" data-selected="<?php
					$product_ids = array_filter( array_map( 'absint', explode( ',', get_option( 'wcsd_products' ) ) ) );
					$json_ids    = array();

					foreach ( $product_ids as $product_id ) {
						$product = wc_get_product( $product_id );
						if ( is_object( $product ) ) {
							$json_ids[ $product_id ] = wp_kses_post( $product->get_formatted_name() );
						}
					}
					echo esc_attr( json_encode( $json_ids ) );
				?>" value="<?php echo implode( ',', array_keys( $json_ids ) ); ?>" /> 
			</td>
		</tr>

	<?php
	}

	/**
	* Exclude Product Ids
	*/
	public function wcsd_exclude_products() {
		?>
		<tr valign="top" class="search-products">
			<th><?php _e( 'Exclude Products', 'woocommerce' ); ?></th>
			<td>
				<input type="hidden" class="wcsd wc-product-search" data-multiple="true" style="width: 50%;" name="wcsd_exclude_products" data-placeholder="<?php esc_attr_e( 'Search for a product&hellip;', 'woocommerce' ); ?>" data-action="wcsd_ajax_products" data-selected="<?php
					$product_ids = array_filter( array_map( 'absint', explode( ',', get_option( 'wcsd_exclude_products' ) ) ) );
					$json_ids    = array();

					foreach ( $product_ids as $product_id ) {
						$product = wc_get_product( $product_id );
						if ( is_object( $product ) ) {
							$json_ids[ $product_id ] = wp_kses_post( $product->get_formatted_name() );
						}
					}

					echo esc_attr( json_encode( $json_ids ) );
				?>" value="<?php echo implode( ',', array_keys( $json_ids ) ); ?>" /> 
			</td>
		</tr>


	<?php
	}


	/**
	* Add the required js needed for the plugin to display the list of products using ajax.
	*
	* @return null outputs the scripts on the footer. 
	*
	*/
	public function wcsd_add_scripts() { 
		wp_enqueue_script( 'ajax-chosen' );
		wp_enqueue_script( 'chosen' );
	?>
		<script type="text/javascript">
			jQuery(function($){
				jQuery('#wcsd-help').click(function(){
					jQuery('#contextual-help-link').click();
				});
				jQuery('#tab-panel-wcsd_help input').click(function(){ 
					jQuery(this).select(); 
				});
				// Ajax product search box
					$( ':input.wccd.wc-product-search' ).filter( ':not(.enhanced)' ).each( function() {
					var select2_args = {
						allowClear:  $( this ).data( 'allow_clear' ) ? true : false,
						placeholder: $( this ).data( 'placeholder' ),
						minimumInputLength: $( this ).data( 'minimum_input_length' ) ? $( this ).data( 'minimum_input_length' ) : '3',
						escapeMarkup: function( m ) {
							return m;
						},
						ajax: {
							url:            '<?php echo admin_url('admin-ajax.php'); ?>',
							dataType:    'json',
							quietMillis: 250,
							data: function( term ) {
								return {
									term:     term,
									action:   'wccd_ajax_products',
									security: '<?php echo wp_create_nonce( "wccd-search-products" ); ?>',
									exclude:  $( this ).data( 'exclude' ),
									include:  $( this ).data( 'include' ),
									limit:    $( this ).data( 'limit' )
								};
							},
							results: function( data ) {
								var terms = [];
								if ( data ) {
									$.each( data, function( id, text ) {
										terms.push( { id: id, text: text } );
									});
								}
								return {
									results: terms
								};
							},
							cache: true
						}
					};

					if ( $( this ).data( 'multiple' ) === true ) {
						select2_args.multiple = true;
						select2_args.initSelection = function( element, callback ) {
							var data     = $.parseJSON( element.attr( 'data-selected' ) );
							var selected = [];

							$( element.val().split( ',' ) ).each( function( i, val ) {
								selected.push({
									id: val,
									text: data[ val ]
								});
							});
							return callback( selected );
						};
						select2_args.formatSelection = function( data ) {
							return '<div class="selected-option" data-id="' + data.id + '">' + data.text + '</div>';
						};
					} else {
						select2_args.multiple = false;
						select2_args.initSelection = function( element, callback ) {
							var data = {
								id: element.val(),
								text: element.attr( 'data-selected' )
							};
							return callback( data );
						};
					}

					select2_args = $.extend( select2_args, wccd_getEnhancedSelectFormatString() );

					$( this ).select2( select2_args ).addClass( 'enhanced' );
				});

				// Image uploader js
				var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
				 
					jQuery('#wcsd_button').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = jQuery(this);
						var input_file = button.parent().find('input[type="text"]');
						_custom_media = true;
						wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								input_file.val(attachment.url);
								button.parent().find('.wcsd_image').html('<img src="'+attachment.url+'" width="100px;">');
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
 
				jQuery('.add_media').on('click', function(){
					_custom_media = false;
				});				
			});
		</script>
	<?php
	}

}
return new WC_Settings_Signup_Discount();

endif;



