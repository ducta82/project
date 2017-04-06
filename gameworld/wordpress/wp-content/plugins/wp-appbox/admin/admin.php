<?php


if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! is_admin() ) die;


/* Variablen für das Backend definieren */
define( 'WPAPPBOX_URL_PAYPAL', 'https://www.paypal.me/marcelismus' ); 
define( 'WPAPPBOX_URL_AMAZON', 'http://www.amazon.de/gp/registry/wishlist/1FC2DA2J8SZW7?tag=tchgdns-21' . WPAPPBOX_AFFILIATE_AMAZON );


/**
* Registrierung der Einstellungen des Plugins
*
* @since   1.0.0
* @change  3.2.0
*/

function wpAppbox_pageInit() {
	$settings_page = add_options_page( WPAPPBOX_PLUGIN_NAME . ' Einstellungen', WPAPPBOX_PLUGIN_NAME, 'manage_options', 'wp-appbox', 'wpAppbox_options_page' );
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
	if ( $_GET['tab'] === 'cachelist' ) {
		$args = array(
			'label' => __('Apps', 'wp-appbox'),
		  	'default' => 50,
		 	'option' => 'apps_per_page'
		);
		add_screen_option( 'per_page', $args) ;
	}
	if ( 'Y' == $_POST["wp-appbox-settings-submit"] ) {
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
* @change  3.2.3
*/

function wpAppbox_saveSettings() {
	global $wpAppbox_storeNames, $wpAppbox_optionsDefault;
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
			break;
		case 'cache':
			update_option( 'wpAppbox_disableCache', $_POST['wpAppbox_disableCache'] );
			update_option( 'wpAppbox_cacheTime', ( trim( $_POST['wpAppbox_cacheTime'] ) != '' ? intval( $_POST['wpAppbox_cacheTime'] ) : $wpAppbox_optionsDefault['cacheTime'] ) );
			//update_option( 'wpAppbox_imageCache', $_POST['wpAppbox_imageCache'] );
			update_option( 'wpAppbox_disableAutoCache', $_POST['wpAppbox_disableAutoCache'] );
			update_option( 'wpAppbox_cachePlugin', $_POST['wpAppbox_cachePlugin'] );
	   		break;
    	case 'advanced':
	    	update_option( 'wpAppbox_curlTimeout', ( trim( $_POST['wpAppbox_curlTimeout'] ) != '' ? intval( $_POST['wpAppbox_curlTimeout'] ) : $wpAppbox_optionsDefault['curlTimeout'] ) );
	    	update_option( 'wpAppbox_disableDefer', $_POST['wpAppbox_disableDefer'] );
    		update_option( 'wpAppbox_disableCSS', $_POST['wpAppbox_disableCSS'] );
    		update_option( 'wpAppbox_disableFonts', $_POST['wpAppbox_disableFonts'] );
    		update_option( 'wpAppbox_eOnlyAuthors', $_POST['wpAppbox_eOnlyAuthors'] );
    		update_option( 'wpAppbox_eOutput', $_POST['wpAppbox_eOutput'] );
    		update_option( 'wpAppbox_eImageApple', $_POST['wpAppbox_eImageApple'] );
    		if ( ( $_POST['wpAppbox_sslAppleImages'] == true ) && ( $_POST['wpAppbox_sslAppleImagesVerify'] == true ) ) {
    			update_option( 'wpAppbox_sslAppleImages', $_POST['wpAppbox_sslAppleImages'] );
    		} else {
    			update_option( 'wpAppbox_sslAppleImages', false );
    		}
    		if ( ( $_POST['wpAppbox_autoLinks'] == true ) && ( $_POST['wpAppbox_autoLinksVerify'] == true ) ) {
    			update_option( 'wpAppbox_autoLinks', $_POST['wpAppbox_autoLinks'] );
    		} else {
    			update_option( 'wpAppbox_autoLinks', false );
    		}
    		update_option( 'wpAppbox_amaAPIuse', $_POST['wpAppbox_amaAPIuse'], 'no' );
    		update_option( 'wpAppbox_amaAPIsecretKey', base64_encode( strip_tags( trim( $_POST['wpAppbox_amaAPIsecretKey'] ) ) ), 'no' );
	    	update_option( 'wpAppbox_amaAPIpublicKey', strip_tags( trim( $_POST['wpAppbox_amaAPIpublicKey'] ) ), 'no' );
	    	update_option( 'wpAppbox_affiliateAmazonID', strip_tags( trim( $_POST['wpAppbox_affiliateAmazonID'] ) ), 'no' );
	    	update_option( 'wpAppbox_amaAPIregion', $_POST['wpAppbox_amaAPIregion'], 'no' );
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
	<script>
		function disableInput(toDisable, theStatus) {
			var status = document.getElementById("wpAppbox_"+theStatus).checked;
			var input = document.getElementById("wpAppbox_"+toDisable);
			input.disabled = status;
		}
		function activateInput(toDisable, theStatus) {
			var status = document.getElementById("wpAppbox_"+theStatus).checked;
			var input = document.getElementById("wpAppbox_"+toDisable);
			input.disabled = !status;
		}
		function hideElementByClass(toHide, theStatus) {
			var status = document.getElementById("wpAppbox_"+theStatus).checked;
			var hideit = document.getElementsByClassName(toHide);
			var i;
			for (i = 0; i < hideit.length; i++) {
			    if(status == false) hideit[i].style.display = 'none';
			    else hideit[i].style.display = '';
			}
		}
	</script>
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
			if(wpAppbox_clearCache()) echo('<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>'.__('The cache was successfully cleared.', 'wp-appbox').'</strong></p></div>');
			else echo('<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>'.__('The cache can not be emptied or there are no apps in the cache.', 'wp-appbox').'</strong></p></div>');
		} ?>
		<div class="widget" style="margin:15px 0;"><p style="margin:10px;">
			<a href="https://twitter.com/Marcelismus" target="_blank"><?php esc_html_e('Follow me on Twitter', 'wp-appbox'); ?></a> | <a href="<?php echo( ( get_locale() == 'de_DE' ) ? 'https://tchgdns.de/wp-appbox-app-badge-fuer-google-play-mac-app-store-windows-store-windows-phone-store-co/' : 'https://translate.google.de/translate?hl=de&sl=de&tl=en&u=https%3A%2F%2Ftchgdns.de%2Fwp-appbox-app-badge-fuer-google-play-mac-app-store-windows-store-windows-phone-store-co%2F' ); ?>" target="_blank"><?php esc_html_e('Visit the Plugin plage', 'wp-appbox'); ?></a> | <a href="http://wordpress.org/extend/plugins/wp-appbox/" target="_blank"><?php esc_html_e('Plugin at WordPress Directory', 'wp-appbox'); ?></a> | <a href="http://wordpress.org/plugins/wp-appbox/changelog/" target="_blank"><?php esc_html_e('Changelog', 'wp-appbox'); ?></a>
			<?php if ( !WPAPPBOX_DISABLE_CACHE ) { ?><a href="/wp-admin/options-general.php?page=wp-appbox&tab=<?php echo( $_GET['tab'] ); ?>&clearcache" onClick="return confirm('<?php esc_html_e('Are you sure that the cache should be cleared? All data must be reloaded from the server of the operator.', 'wp-appbox'); ?>')" style="float:right;"><?php esc_html_e('Clear cache', 'wp-appbox'); ?></a><?php } ?>
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