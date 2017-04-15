<?php

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! is_admin() ) die;

/* Variablen für das Backend definieren */
define( 'WPAPPBOX_URL_PAYPAL', 'https://www.paypal.me/marcelismus' ); 
define( 'WPAPPBOX_URL_AMAZON', 'http://www.amazon.de/gp/registry/wishlist/1FC2DA2J8SZW7?tag=' . WPAPPBOX_AFFILIATE_AMAZON );


/**
* Registrierung der Einstellungen des Plugins
*
* @since   1.0.0
* @change  3.2.0
*/

function wpAppbox_pageInit() {
	$settings_page = add_options_page( WPAPPBOX_PLUGIN_NAME . ' ' . __('settings', 'wp-appbox') , WPAPPBOX_PLUGIN_NAME, 'manage_options', 'wp-appbox', 'wpAppbox_options_page' );
	add_action( "load-{$settings_page}", 'wpAppbox_loadSettingsPage' );
}


/**
* Initalisierung der Adminseite [deprecated]
*
* @since   1.0.0
* @change  3.2.0
*/

function wpAppbox_adminInit() {
}


/**
* Benachrichtigung im Admin-Panel anzeigen
*
* @since   4.0.0
*/

function wpAppbox_showAdminNotification() {
	if ( '4.0.1' != get_option( 'wpAppbox_notifyLastV' ) ):
		?>
		<div class="notice notice-success is-dismissible">
			<p>
				🎉🎊 <strong><?php printf( esc_html__( 'WP-Appbox %1$s is here!', 'wp-appbox' ), WPAPPBOX_PLUGIN_VERSION ); ?> </strong>
				<?php printf( wp_kses( __( '<a href="%s" target="_blank">See here</a> what is new.', 'wp-appbox' ), array(  'a' => array( 'href' => array(), 'target' => array( '_blank') ) ) ), esc_url( ( get_locale() == 'de_DE' ) ? 'https://tchgdns.de/wp-appbox-4-0-0/' : 'https://translate.google.de/translate?hl=de&sl=de&tl=en&u=https%3A%2F%2Ftchgdns.de%2Fwp-appbox-4-0-0-co%2F' ) ); ?>
				<?php printf( wp_kses( __( 'Did it help? If you like this plugin and find it useful, please <a href="%s" target="_blank">consider to rate</a> this plugin.', 'wp-appbox' ), array(  'a' => array( 'href' => array(), 'target' => array( '_blank') ) ) ), esc_url( 'https://wordpress.org/support/plugin/wp-appbox/reviews/' ) ); ?> :-)
			</p>
		</div>
		<?php
		update_option( 'wpAppbox_notifyLastV', WPAPPBOX_PLUGIN_VERSION );
	endif;
}
add_action( 'admin_notices', 'wpAppbox_showAdminNotification' );


/**
* Anzeige der Apps im Cache im Dashboard-Glance-Widget
*
* @since   3.4.0
* @change  n/a
*/

function wpAppbox_counterInDashboard( $items = array() ) {
	if ( ! current_user_can('manage_options') ) {
		return( $items );
	}
	$countCachedApps = wpAppbox_countCachedApps();
	if ( $countCachedApps > 0 ) {
		echo( '<style>#dashboard_right_now .wp-appbox a:before { content: "\f108" !important; }</style>' );
		echo( '<li class="page-count wp-appbox"><a href="options-general.php?page=wp-appbox&amp;tab=cache-list">' . $countCachedApps . ' ' . _n( 'app in cache', 'apps in cache', $countCachedApps, 'wp-appbox' ) . '</a></li>' );
	}	
	//return( $items );
}
add_filter( 'dashboard_glance_items', 'wpAppbox_counterInDashboard', 10, 1 );


/**
* Ersetzt HTTP und HTTPS durch //
*
* @since   3.0.2
* @change  3.2.2
*
* @param   string  $currentTab  Aktuell ausgewählter Tab [optional]
*
* @output  HTML-Ausgabe der Tableiste Tableiste
*/

function wpAppbox_createTabs( $currentTab = 'info' ) {
	if ( isset($_GET['tab'] ) ) {
		$currentTab = $_GET['tab'];
	}
    $tabs = array(	
   		'info' => array( 'name' => __('Info', 'wp-appbox'), 'dashicon' => 'heart' ),
   		'output' => array( 'name' => __('Output', 'wp-appbox'), 'dashicon' => 'analytics' ), 
   		'cache' => array( 'name' => __('Cache', 'wp-appbox'), 'dashicon' => 'dashboard' ),  
   		'affiliate' => array( 'name' => __('Affiliate IDs', 'wp-appbox'), 'dashicon' => 'chart-line' ),  
   		'buttons' => array( 'name' => __('Editor-Buttons', 'wp-appbox'), 'dashicon' => 'editor-kitchensink' ), 
   		'storeurls' => array( 'name' => __('Store-URLs', 'wp-appbox'), 'dashicon' => 'admin-links' ), 
   		'advanced' => array( 'name' => __('Advanced', 'wp-appbox'), 'dashicon' => 'admin-tools' ),  
   		'help' => array( 'name' => __('Help', 'wp-appbox'), 'dashicon' => 'editor-help' )
    	);
    echo( '<h2 class="nav-tab-wrapper">' );
    foreach ( $tabs as $tab => $properties ) {
    	if ( 'cache-list' == $currentTab ) $currentTab = 'cache';
        $class = ( $tab == $currentTab ) ? ' nav-tab-active' : '';
        $dashicon = $properties['dashicon'];
        $name = $properties['name'];
        echo( "<a class='nav-tab$class dashicons-before dashicons-$dashicon' href='?page=wp-appbox&tab=$tab'> $name</a>" );
    }
    echo( '</h2>' );
}


/**
* Optionsseiten laden
*
* @since   1.0.0
* @change  3.2.0
*/

function wpAppbox_loadSettingsPage() {
	if ( isset( $_GET['tab'] ) && 'cachelist' == $_GET['tab'] ) {
		$args = array(
			'label' => __('Apps', 'wp-appbox'),
		  	'default' => 50,
		 	'option' => 'apps_per_page'
		);
		add_screen_option( 'per_page', $args) ;
	}
	if ( isset( $_POST["wp-appbox-settings-submit"]) && 'Y' == $_POST["wp-appbox-settings-submit"] ) {
		check_admin_referer( "wp-appbox-setting-page" );
		wpAppbox_saveSettings();
		$url_parameters = isset( $_GET['tab'] ) ? 'updated=true&tab=' . $_GET['tab'] : 'updated=true';
		wp_redirect( admin_url( "options-general.php?page=wp-appbox&$url_parameters" ) );
		exit;
	}
}


/**
* Anzahl der Einträge pro Seite in der Cache-Tabelle
*
* @since   2.0.0
* @change  3.2.0
*
* @param   string  $status   Status [WordPress]
* @param   string  $option   Angefragte Optionskey
* @param   string  $value    Angefragter Optionswert
* @return  string  $theURL   Umgewandelter App-Link
*/

function wpAppbox_setScreenOptions( $status, $option, $value ) {
	if ( 'apps_per_page' == $option ) {
  		return( $value );
  	}
}
add_filter( 'set-screen-option', 'wpAppbox_setScreenOptions', 10, 3 );


/**
* Einstellungen in "wp_options" speichern
*
* @since   1.0.0
* @change  4.0.0
*/

function wpAppbox_saveSettings() {
	global $wpAppbox_storeNames, $wpAppbox_optionsDefault;
	$tab = 'info';
	if ( isset( $_GET['tab'] ) ) {
		$tab = $_GET['tab'];
	}
	switch ( $tab ) {
		case 'output':
	    	update_option( 'wpAppbox_downloadCaption', (trim( $_POST['wpAppbox_downloadCaption'] ) != '' ? $_POST['wpAppbox_downloadCaption'] : $wpAppbox_optionsDefault['downloadCaption'] ) );
			update_option( 'wpAppbox_nofollow', $_POST['wpAppbox_nofollow'] );
			update_option( 'wpAppbox_targetBlank', $_POST['wpAppbox_targetBlank'] );
			update_option( 'wpAppbox_showRating', intval( $_POST['wpAppbox_showRating'] ) );
			update_option( 'wpAppbox_colorfulIcons', $_POST['wpAppbox_colorfulIcons'] );
			update_option( 'wpAppbox_defaultStyle', intval( $_POST['wpAppbox_defaultStyle'] ) );	 
			update_option( 'wpAppbox_replaceAppIcons', $_POST['wpAppbox_replaceAppIcons'] );	   		
			break;
		case 'cache':
			if ( TRUE == get_option('wpAppbox_blockMissing') && FALSE == $_POST['wpAppbox_blockMissing'] ) {
				global $wpdb;
				$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE ('%_wpAppbox_blockQuery%')" );
			}
			update_option( 'wpAppbox_cacheTime', ( '' != intval( $_POST['wpAppbox_cacheTime'] ) ? intval( $_POST['wpAppbox_cacheTime'] ) : $wpAppbox_optionsDefault['cacheTime'] ) );
			update_option( 'wpAppbox_blockMissing', $_POST['wpAppbox_blockMissing'] );
			update_option( 'wpAppbox_blockMissingTime', ( '' != intval( $_POST['wpAppbox_blockMissingTime'] ) ? intval( $_POST['wpAppbox_blockMissingTime'] ) : $wpAppbox_optionsDefault['blockMissingTime'] ) );
			update_option( 'wpAppbox_cacheMode', $_POST['wpAppbox_cacheMode'] );
			update_option( 'wpAppbox_cronIntervall', ( '' != intval( $_POST['wpAppbox_cronIntervall'] ) ? intval( $_POST['wpAppbox_cronIntervall'] ) : $wpAppbox_optionsDefault['cronIntervall'] ) );
			update_option( 'wpAppbox_cronCount', ( '' != intval( $_POST['wpAppbox_cronCount'] ) ? intval( $_POST['wpAppbox_cronCount'] ) : $wpAppbox_optionsDefault['cronCount'] ) );
			update_option( 'wpAppbox_cachePlugin', $_POST['wpAppbox_cachePlugin'] );
			$imageCacheWAS = get_option( 'wpAppbox_imgCache' );
			update_option( 'wpAppbox_imgCache', false );
			if ( isset( $_POST['wpAppbox_imgCache'] ) && $_POST['wpAppbox_imgCache'] ) {
				if ( wpAppbox_imageCache::checkImageCache() ) update_option( 'wpAppbox_imgCache', $_POST['wpAppbox_imgCache'] );
				else set_transient( 'wpAppbox_imgCacheBlocked', true, 12 * HOUR_IN_SECONDS );
			}
			if ( $imageCacheWAS && !get_option( 'wpAppbox_imgCache' ) ) {
				$delete = wpAppbox_imageCache::deleteImageCache( true );
			}
			update_option( 'wpAppbox_imgCacheMode', $_POST['wpAppbox_imgCacheMode'] );
			update_option( 'wpAppbox_imgCacheDelay', $_POST['wpAppbox_imgCacheDelay'] );
			update_option( 'wpAppbox_imgCacheDelayTime', ( '' != intval( $_POST['wpAppbox_imgCacheDelayTime'] ) ? intval( $_POST['wpAppbox_imgCacheDelayTime'] ) : $wpAppbox_optionsDefault['imgCacheDelayTime'] ) );
			wpAppbox_setupCronCache();
	   		break;
    	case 'advanced':
	    	update_option( 'wpAppbox_amaAPIuse', $_POST['wpAppbox_amaAPIuse'], 'no' );
	    	update_option( 'wpAppbox_amaAPIsecretKey', base64_encode( strip_tags( trim( $_POST['wpAppbox_amaAPIsecretKey'] ) ) ), 'no' );
	    	update_option( 'wpAppbox_amaAPIpublicKey', strip_tags( trim( $_POST['wpAppbox_amaAPIpublicKey'] ) ), 'no' );
	    	update_option( 'wpAppbox_affiliateAmazonID', strip_tags( trim( $_POST['wpAppbox_affiliateAmazonID'] ) ), 'no' );
	    	update_option( 'wpAppbox_amaAPIregion', $_POST['wpAppbox_amaAPIregion'], 'no' );
	    	update_option( 'wpAppbox_autoLinks', $_POST['wpAppbox_autoLinks'] );
	    	update_option( 'wpAppbox_anonymizeLinks', $_POST['wpAppbox_anonymizeLinks'] );
	    	update_option( 'wpAppbox_disableDefer', $_POST['wpAppbox_disableDefer'] );
	    	update_option( 'wpAppbox_disableCSS', $_POST['wpAppbox_disableCSS'] );
	    	update_option( 'wpAppbox_disableFonts', $_POST['wpAppbox_disableFonts'] );
	    	update_option( 'wpAppbox_curlTimeout', ( '' != intval( $_POST['wpAppbox_curlTimeout'] ) ? intval( $_POST['wpAppbox_curlTimeout'] ) : $wpAppbox_optionsDefault['curlTimeout'] ) );
    		update_option( 'wpAppbox_eOnlyAuthors', $_POST['wpAppbox_eOnlyAuthors'] );
    		update_option( 'wpAppbox_eOutput', $_POST['wpAppbox_eOutput'] );
    		update_option( 'wpAppbox_eImageApple', $_POST['wpAppbox_eImageApple'] );
	    	if ( ( $_POST['wpAppbox_sslAppleImages'] == true ) && ( $_POST['wpAppbox_sslAppleImagesVerify'] == true ) ) {
	    		update_option( 'wpAppbox_sslAppleImages', $_POST['wpAppbox_sslAppleImages'] );
	    	} else {
	    		update_option( 'wpAppbox_sslAppleImages', false );
	    	}
	    	if ( ( $_POST['wpAppbox_cacheCronjob'] == true ) && ( $_POST['wpAppbox_cacheCronjobVerify'] == true ) ) {
	    		update_option( 'wpAppbox_cacheCronjob', $_POST['wpAppbox_cacheCronjob'] );
	    	} else {
	    		update_option( 'wpAppbox_cacheCronjob', false );
	    		update_option( 'wpAppbox_cacheMode', 'manually' );
	    	}
	    	wpAppbox_setupCronCache();
	   		break;
	   	case 'buttons':
	   		update_option( 'wpAppbox_defaultButton', intval( $_POST['wpAppbox_defaultButton'] ) );
	   		foreach ( $wpAppbox_storeNames as $storeID => $storeName ) {
			   	$key_buttonAppbox = "wpAppbox_buttonAppbox_$storeID";
				update_option( $key_buttonAppbox, $_POST[$key_buttonAppbox] );
			   	$key_buttonWYSIWYG = "wpAppbox_buttonWYSIWYG_$storeID";
				update_option( $key_buttonWYSIWYG, $_POST[$key_buttonWYSIWYG] );
			   	$key_buttonHTML = "wpAppbox_buttonHTML_$storeID";
				update_option( $key_buttonHTML, $_POST[$key_buttonHTML] );
			   	$key_buttonHidden = "wpAppbox_buttonHidden_$storeID";
				update_option( $key_buttonHidden, $_POST[$key_buttonHidden] );
	   		}
	   		break;
	   	case 'storeurls':
	   		foreach ( $wpAppbox_storeNames as $storeID => $storeName ) {
		   		$key_storeURL = "wpAppbox_storeURL_$storeID";
		   		update_option( $key_storeURL, intval( $_POST[$key_storeURL] ) );
		   		if ( '0' == $_POST[$key_storeURL] ) {
		   			$key_storeURL_URL = "wpAppbox_storeURL_URL_$storeID";
		   			update_option( $key_storeURL_URL, trim( $_POST[$key_storeURL_URL] ) );
		   		}
	   		}
	   		update_option( 'wpAppbox_iTunesGeo', $_POST['wpAppbox_iTunesGeo'], 'no' );
	   		break;
		case 'affiliate':
			update_option( 'wpAppbox_userAffiliate', $_POST['wpAppbox_userAffiliate'], 'no' );
			update_option( 'wpAppbox_affiliateApple', $_POST['wpAppbox_affiliateApple'], 'no' );
			update_option( 'wpAppbox_affiliateAppleID', Trim( $_POST['wpAppbox_affiliateAppleID'] ), 'no' );
			if ( '' == trim( $_POST['wpAppbox_affiliateAppleID'] ) ) update_option( 'wpAppbox_affiliateApple', false, 'no' );
			update_option( 'wpAppbox_affiliateAmazon', $_POST['wpAppbox_affiliateAmazon'], 'no' );
			update_option( 'wpAppbox_affiliateAmazonID', Trim( $_POST['wpAppbox_affiliateAmazonID'] ), 'no' );
			if ( '' == trim( $_POST['wpAppbox_affiliateAmazonID'] ) ) update_option( 'wpAppbox_affiliateAmazon', false, 'no' );
			update_option( 'wpAppbox_affiliateMicrosoft', $_POST['wpAppbox_affiliateMicrosoft'], 'no' );
			update_option( 'wpAppbox_affiliateMicrosoftProgram', $_POST['wpAppbox_affiliateMicrosoftProgram'], 'no' );
			update_option( 'wpAppbox_affiliateMicrosoftID', Trim( $_POST['wpAppbox_affiliateMicrosoftID'], 'no' ) );
			if ( '' == trim( $_POST['wpAppbox_affiliateMicrosoftID'] ) ) update_option( 'wpAppbox_affiliateMicrosoft', false, 'no' );
		break;
	}
	update_option( 'wpAppbox_pluginVersion', WPAPPBOX_PLUGIN_VERSION );
}


/**
* Erzeugung und Ausgabe der Optionsseiten
*
* @since   1.0.0
* @change  3.2.3
*
* @output  HTML-Ausgabe der Optionsseiten
*/

function wpAppbox_options_page() {
	global $wpAppbox_storeNames, $wpAppbox_styleNames, $wpAppbox_storeStyles, $wpAppbox_storeURL_languages, $wpAppbox_storeURL, $wpAppbox_storeURL_noLanguages, $wpAppbox_amaAPIregions;
	if ( isset( $_GET['clearcache'] ) ) {
		$tab = 'cache'; 
	}
	?>
	<div class="wrap">
		<style>
			hr {
				margin-top: 10px !important;
				margin-bottom: 30px !important;
			}
			.wpa-error {
			}
			.wpa-infobox {
				display: block;
				background: #fff;
				border-left: 4px solid #fff;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				margin: 20px 0 25px 0;
				padding: 10px 16px
			}
			.wpa-infobox.wpa-notice {
				border-left: 4px solid #ffba00;
			}
			.wpa-infobox.wpa-error {
				color: #b94a48;
				border-left-color: #dc3232
			}
			.wpa-infobox + h3 {
				padding-top: 8px;
			} 
			.wpa-infobox + .form-table {
				margin-top: -10px !important;
			} 
			.dashicons, .dashicons-before:before {
				line-height: 1.1 !important;
			}
		</style>
		<div id="icon-options-general" class="icon32">
			<br>
		</div>
		<h2><?php echo WPAPPBOX_PLUGIN_NAME; ?> (Version <?php echo WPAPPBOX_PLUGIN_VERSION; ?>)</h2>
		
		<?php if ( isset($_GET['clearcache'] ) ) {
			if( wpAppbox_clearCache() ) echo( '<div id="setting-error-settings_updated" class="updated settings-error is-dismissible"><p><strong>'.__( 'The cache was successfully cleared.', 'wp-appbox' ).'</strong></p></div>' );
			else echo( '<div id="setting-error-settings_updated" class="updated settings-error is-dismissible"><p><strong>'.__( 'The cache can not be emptied or there are no apps in the cache.', 'wp-appbox' ).'</strong></p></div>' );
		} ?>
		
		<?php if ( isset($_GET['clearimgcache'] ) ) {
			if( wpAppbox_imageCache::deleteImageCache() ) echo( '<div id="setting-error-settings_updated" class="updated settings-error is-dismissible"><p><strong>'.__( 'The image cache was successfully cleared.', 'wp-appbox' ).'</strong></p></div>' );
			else echo( '<div id="setting-error-settings_updated" class="updated settings-error is-dismissible"><p><strong>'.__( 'The image cache can not be emptied.', 'wp-appbox' ).'</strong></p></div>' );
		} ?>
		
		<?php if ( !wpAppbox_imageCache::checkImageCache() && ( get_option('wpAppbox_imgCache') || get_transient( 'wpAppbox_imgCacheBlocked' ) ) ): ?>
			<div class="notice notice-error is-dismissible">
				<p><span style="font-weight:bold;"><?php _e('Image cache is not active'); ?>: </span><?php echo( wpAppbox_imageCache::checkImageCache( true ) ); ?></p>
			</div>
			<?php delete_transient( 'wpAppbox_imgCacheBlocked' ); ?>
		<?php endif; ?>
		
		<?php  if( !wpAppbox_checkAmazonAPI() && get_option( 'wpAppbox_amaAPIuse' ) ) { ?>
			<div class="notice notice-error is-dismissible amaAPItr" <?php if( true != get_option( 'wpAppbox_amaAPIuse' ) ) { ?> style="display:none;"<?php } ?>>
				<p><strong>Amazon Product Advertising API: </strong><?php esc_html_e('Your public key, secret key or affiliate ID seems not correct. Please check or retry (maybe its just a server error).', 'wp-appbox'); ?> ;-)</p>
			</div>
		<?php } ?>
		
		<div class="widget" style="margin:15px 0;"><p style="margin:10px;">
			<a href="https://twitter.com/Marcelismus" target="_blank"><?php esc_html_e('Follow me on Twitter', 'wp-appbox'); ?></a> | <a href="<?php echo( ( get_locale() == 'de_DE' ) ? 'https://tchgdns.de/wp-appbox-app-badge-fuer-google-play-mac-app-store-windows-store-windows-phone-store-co/' : 'https://translate.google.de/translate?hl=de&sl=de&tl=en&u=https%3A%2F%2Ftchgdns.de%2Fwp-appbox-app-badge-fuer-google-play-mac-app-store-windows-store-windows-phone-store-co%2F' ); ?>" target="_blank"><?php esc_html_e('Visit the Plugin plage', 'wp-appbox'); ?></a> | <a href="http://wordpress.org/extend/plugins/wp-appbox/" target="_blank"><?php esc_html_e('Plugin at WordPress Directory', 'wp-appbox'); ?></a> | <a href="http://wordpress.org/plugins/wp-appbox/changelog/" target="_blank"><?php esc_html_e('Changelog', 'wp-appbox'); ?></a>
		</p></div>
		<div style="float: right;">
			<a href="<?php echo( WPAPPBOX_URL_PAYPAL ); ?>" class="button-primary" target="_blank" style="font-size: 12px; padding: 5px 6px; line-height: 13px !important; height: auto !important; margin-right: 6px; margin-top: 13px;"><?php esc_html_e('PayPal-Donation', 'wp-appbox'); ?></a>
			<a href="<?php echo( WPAPPBOX_URL_AMAZON ); ?>" class="button-primary" target="_blank" style="font-size: 12px; padding: 5px 6px; line-height: 13px !important; height: auto !important; margin-top: 13px;"><?php esc_html_e('Amazon Wishlist', 'wp-appbox'); ?></a>
		</div>
		<?php wpAppbox_createTabs(); ?>
		<form method="post" action="<?php admin_url( 'options-general.php?page=wp-appbox' ); ?>">
		<?php wp_nonce_field( "wp-appbox-setting-page" ); ?>
		<?php
			$tab = 'info';
			if ( isset( $_GET['tab'] ) ) {
				$tab = $_GET['tab'];
			}
			if ( isset( $tab ) ) {
				include_once( "admin-$tab.php" );
			} else {
				include_once( "admin-info.php" );
			}
		?>
		
		<?php if ( ( 'help' != $tab ) && ( 'info' != $tab ) && ( 'cache-list' != $tab ) ) { ?>
			<p class="submit" style="clear: both;">
			  	<input type="submit" name="Submit" class="button-primary" value="<?php esc_html_e('Save changes', 'wp-appbox'); ?>" />
				<input type="hidden" name="wp-appbox-settings-submit" value="Y" />
		   </p>
		<?php } ?>
		
	</form>
	</div>
<?php } ?>