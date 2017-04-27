<?php
/*
Plugin Name: WP-Appbox
Version: 4.0.13
Plugin URI: https://tchgdns.de/wp-appbox-app-badge-fuer-google-play-mac-app-store-windows-store-windows-phone-store-co/
Description: "WP-Appbox" ermöglicht es, via Shortcode schnell und einfach App-Details von Apps aus einer Reihe an App Stores in Artikeln oder Seiten anzuzeigen.
Author: Marcel Schmilgeit
Author URI: https://tchgdns.de
Text Domain: wp-appbox
Domain Path: /lang
*/


/*
Copyright (C)  2012-2016 Marcel Schmilgeit

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

/* PHP-Fehlerausgabe deaktivieren */
//error_reporting( E_ALL );
//


/**
* Ein paar Variablen
*/
$wpAppboxFirstShortcode = true;
load_plugin_textdomain( 'wp-appbox', false, basename( dirname( __FILE__ ) ) . '/lang/' );


/**
* Includierung benötigter Scripte und Dateien
*/
include_once( "inc/definitions.php" );
include_once( "inc/appboxdb.php" );
include_once( "inc/imagecache.class.php" );
include_once( "inc/getstoreurls.class.php" );
if ( is_admin() ) {
	include_once( "admin/admin.php" );
	include_once( "admin/user-profiles.php" );
	if ( isset( $_GET['page'] ) && $_GET['page'] == 'wp-appbox' ) {
		switch ( isset( $_GET['tab'] ) ) {
			case 'storeurls':
			case 'advanced':
				include_once( "inc/getstoreurls.class.php" );
				break;
			case 'cache-list':
				include_once( "inc/getappinfo.class.php" );
				include_once( "inc/createoutput.class.php" );
				break;
		}
	}
}
if ( !is_admin() ) {
	include_once( "inc/getappinfo.class.php" );
	include_once( "inc/createattributs.class.php" );
	include_once( "inc/createoutput.class.php" );
}
if ( !defined('ABSPATH') ) {
	require_once('./wp-load.php');
}
require_once( ABSPATH . "wp-includes/pluggable.php" );


/**
* Ausgabe diverser Fehlerchen ;-)
*/
function print_me( $message ) {
	if ( is_user_logged_in() )
		print_r( $message . '<br />' );
}


/**
* Cron Schedules für den Cache-Cronjob festlegen und Cron registrieren
*
* @since   4.0.0
* @change  4.0.9
*
* @param 	ka		$schedules		ka
* @return 	ka		$schedules		ka
*/

function wpAppbox_cronSchedules( $schedules ) {
	global $wpAppbox_optionsDefault;
	$cronIntervall = intval( get_option( 'wpAppbox_cronIntervall' ) );
	if ( !is_int( $cronIntervall ) || 0 == $cronIntervall )
		$cronIntervall = $wpAppbox_optionsDefault['cronIntervall'];
    $schedules["wp_appbox_cache"] = array(
	    'interval' => $cronIntervall * 60,
	    'display' => sprintf( __( 'Every %1$s minutes', 'wp-appbox' ), $cronIntervall )
    );
    return( $schedules );
}

function wpAppbox_setupCronCache() {
	if ( wp_get_schedule('wpAppbox_cacheCron' ) )
		wp_clear_scheduled_hook( 'wpAppbox_cacheCron' );
	if ( 'cronjob' == get_option( 'wpAppbox_cacheMode' ) )
		wp_schedule_event( time(), 'wp_appbox_cache', 'wpAppbox_cacheCron' );
}

if ( 'cronjob' == get_option( 'wpAppbox_cacheMode' ) ) {
	add_filter( 'cron_schedules', 'wpAppbox_cronSchedules' );
	add_action( 'wpAppbox_cacheCron', 'wpAppbox_cacheCron' );
}


/**
* Prüfen ob der Nutzer Autor (min. User-Level 2) ist
*
* @since   2.0.0
* @change  4.0.9
*
* @return  boolean  true/false  TRUE when author
*/

function wpAppbox_isUserAuthor() {
	if ( current_user_can( 'editor' ) || current_user_can( 'author' ) || current_user_can( 'administrator' ) ) 
		return( true );
	else
		return( false );
}


/**
* Prüfen ob der Nutzer Admin (min. User-Level 9) ist
*
* @since   2.0.0
* @change  4.0.9
*
* @return  boolean  true/false  TRUE when admin
*/

function wpAppbox_isUserAdmin() {
	if ( current_user_can( 'administrator' ) )
		return( true );
	else
		return( false );
}


/**
* Ausgabe der Fehlermeldungen
*
* @since   2.0.0
* @change  4.0.9
*
* @param   string  $output  Fehlermeldung [optional]
* @print   error message
*/

function wpAppbox_errorOutput( $output = "" ) {
	if ( !wpAppbox_isUserAdmin() ) return;
	switch( get_option( "wpAppbox_eOutput" ) ):
		case 'output':
			print_r( "<pre>$output</pre>" );
			break;
		case 'errorlog':
			error_log( $output );
			break;
		case 'output+errorlog':
			print_r( "<pre>$output</pre>" );
			error_log( $output );
		break;
	endswitch;
}


/**
* Prüfen ob "?wpappbox_reload_cache" angehangen
*
* @since   2.0.0
* @change  4.0.7
*
* @return  boolean  true/false  TRUE when $_GET[]
*/

function wpAppbox_forceNewCache( $cacheID ) {
	if ( !wpAppbox_isUserAuthor() ) return( false );
	if ( ( isset( $_GET["wpappbox_reload_cache"] ) ) || ( isset( $_GET["action"] ) && $_GET["action"] === 'wpappbox_reload_cache' ) ):
		if ( !isset( $_GET["app_cache_id"] ) ):
			return( false );
		elseif ( $_GET["app_cache_id"] === $cacheID ):
			return( true );
		endif;
	endif;
}


/**
* Einlesen des Templates
*
* @since   2.0.0
* @change  4.0.5
*
* @param   string   $styleName      Verwendeter Stil
* @param   boolean  $themeTemplate  Deprecated [optional]
* @return  string   $tpl            Ausgabe des Banners
*/

function wpAppbox_loadTemplate( $styleName, $themeTemplate = false ) {
	ob_start();
	if ( file_exists( get_template_directory() . "/wpappbox-$styleName.php" ) ):
		include( get_template_directory()."/wpappbox-$styleName.php" );
	elseif ( file_exists( get_template_directory() . "/wpappbox/$styleName.php" ) ):
		include( get_template_directory()."/wpappbox/$styleName.php" );
	elseif ( file_exists( plugin_dir_path( __FILE__ ) . "tpl/$styleName.php" ) ):
		include( "tpl/$styleName.php" );
	else:
		return( false );
	endif;
	$tpl = ob_get_contents();
	ob_end_clean();
	return( $tpl );
}


/**
* Löscht den Seiten-Cache eines Cache-Plugins
*
* @since   4.0.0
* @change  4.0.7
*
* @param   string    $postID       ID des Posts
*/

function wpAppbox_clearCachePlugin( $postID = '') {
	global $post;
	if ( !isset( $post ) ) return( false );
	$postID = $post->ID;
	if ( false == get_option( 'wpappbox_cachePlugin' ) || !is_single() || !isset( $postID ) || '' == $postID ) return;
	switch ( get_option( 'wpappbox_cachePlugin' ) ):
		case 'cachify':
			if ( has_action( 'cachify_remove_post_cache' ) ) {
				do_action( 'cachify_remove_post_cache', $postID );
			}
			break;
		case 'w3-total-cache':
			if ( function_exists( 'w3tc_pgcache_flush_post' ) ) {
				w3tc_pgcache_flush_post( $postID );
			}
		case 'wp-super-cache':
			if ( function_exists( 'wp_cache_post_change' ) ) {
				$GLOBALS["super_cache_enabled"] = 1;
				wp_cache_post_change( $postID );
			}
			break;
		case 'wp-rocket':
			if ( function_exists( 'rocket_clean_post' ) ) {
				rocket_clean_post( $postID );
			}
			break;
		case 'wp-fastest-cache':
			if ( isset( $GLOBALS['wp_fastest_cache'] ) && method_exists( $GLOBALS['wp_fastest_cache'], 'singleDeleteCache' ) ) {
				$GLOBALS['wp_fastest_cache']->singleDeleteCache( false, $postID );
			}
			break;
		case 'zencache':
			if ( isset( $GLOBALS['zencache'] ) && method_exists( $GLOBALS['zencache'], 'auto_clear_post_cache' ) ) {
				$GLOBALS['zencache']->auto_clear_post_cache( $postID );
			}
			break;
		case 'cache-enabler':
			if ( has_action( 'ce_clear_post_cache' ) ) {
				do_action( 'ce_clear_post_cache', $postID );
			}
			break;
	endswitch;
}


/**
* Prüfen ob Versionsnummer älter oder neuer
*
* @since   3.1.6
* @change  3.2.1
*
* @param   string   $this_ver   Zu prüfende Versionsnummer
* @param   string   $com_ver    Versionsnummer in der Datenbank
* @return  boolean  true/false  TRUE when $this_ver neuer
*/

function wpAppbox_checkOlderVersion( $this_ver = '', $comp_ver = '' ) {
	if ( $this_ver == '' ) $this_ver = WPAPPBOX_PLUGIN_VERSION;
	if ( $comp_ver == '' ) $comp_ver = get_option( 'wpAppbox_pluginVersion' );
	$this_ver = str_pad( str_replace( ".", "", $this_ver ), 5, '0', STR_PAD_RIGHT );
	$comp_ver = str_pad( str_replace( ".", "", $comp_ver ), 5, '0', STR_PAD_RIGHT );
	if ( $this_ver > $comp_ver ) {
		return( true );
	}
}


/**
* Appbox-Banner erstellen und ausgeben
*
* @since   2.0.0
* @change  4.0.7
*
* @param   string  $appboxAttributs  Attribute des Shortcodes
* @param   string  $content          Inhalte des Shortcodes [deprecated]
* @return  string  $output           Ausgabe des Banners
*/

function wpAppbox_createAppbox( $appboxAttributs, $content ) {
	if ( is_admin() ) return( false );
	global $wpAppboxFirstShortcode;
	$runtimeStart = microtime( true );
	wpAppbox_errorOutput( "//=================================================" );
	$attr = new wpAppbox_CreateAttributs;
	$attr = $attr->devideAttributs( $appboxAttributs );
	wpAppbox_errorOutput( "APP-ID: ".$attr['appid'] );
	$output = new wpAppbox_CreateOutput;
	$output = $output->theOutput( $attr );
	if ( $wpAppboxFirstShortcode ):
		if ( !get_option('wpAppbox_disableDefer') ):
			wpAppbox_RegisterStyle();
			wpAppbox_loadFonts();
		endif;
		$wpAppboxFirstShortcode = false;
	endif;
	$runtimeEnd = microtime( true );
	$runetimeResult = $runtimeEnd - $runtimeStart;
	wpAppbox_errorOutput( "function: wpAppbox_createAppbox() ---> Runtime: $runetimeResult seconds\n" );
	wpAppbox_errorOutput( "//=================================================\n\n" );
	return( $output );
}


/**
* Store-URLs automatisch erkennen und umwandeln
*
* @since   3.3.0
* @change  3.4.8
*
* @param   string  $appboxAttributs  Attribute des Shortcodes
*/

function wpAppbox_autoDetectLinks( $content ) {

	//Links zum App Store
	$pattern = array(	'/^(?:<p>)?http.?:\/\/.*?itunes.apple.com\/(?:.*?\/)?app\/(?:.*?\/)?id([0-9]{1,45}).*?(?:<\/p>)?$/m',
						'/^(?:<p>)?http.?:\/\/.*?itunes.apple.com\/WebObjects\/MZStore\.woa\/wa\/viewSoftware\?id=([0-9]{1,45}).*?(?:<\/p>)?$/m'
					);
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox appstore ' . $appID . ']' );
	}, $content );
	
	
	//Links zum Play Store
	$pattern = '/^(?:<p>)?http.?:\/\/play\.google\.com\/store\/apps\/details\?id=(.*?)(?:\&.*?)?(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox googleplay ' . $appID . ']' );
	}, $content );
	
	//Links zum Windows Store
	$pattern = '/^(?:<p>)?http.?:\/\/www\.microsoft\.com\/.*?\/store\/(?:apps|p)\/.*?\/(.*?)(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox windowsstore ' . $appID . ']' );
	}, $content );
	
	//Links zum Firefox Marketplace
	$pattern = '/^(?:<p>)?http.?:\/\/marketplace\.firefox\.com\/app\/(.*?)(?:\/)?(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox firefoxmarketplace ' . $appID . ']' );
	}, $content );
	
	//Links zu Amazon-Apps
	$pattern = array(	'/^(?:<p>)?http.?:\/\/www\.amazon\.*(?:.*?)\/dp\/([A-Za-z0-9]*)(?:.*)(?:<\/p>)?$/m',
						'/^(?:<p>)?http.?:\/\/www\.amazon\.*(?:.*?)\/exec\/obidos\/ASIN\/([A-Za-z0-9]*)(?:.*)(?:<\/p>)?$/m'
					);
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox amazonapps ' . $appID . ']' );
	}, $content );
	
	//Links zu Firefox-Addons
	$pattern = '/^(?:<p>)?http.?:\/\/addons\.mozilla\.org\/.*?\/firefox\/addon\/(.*?)(?:\/)?(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox firefoxaddon ' . $appID . ']' );
	}, $content );
	
	//Links zum Chrome Web Store
	$pattern = '/^(?:<p>)?http.?:\/\/chrome\.google\.com\/webstore\/detail\/.*?\/(.*?)(?:\?.*?)?(?:\&.*?)?(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox chromewebstore ' . $appID . ']' );
	}, $content );
	
	//Links zu WordPress Plugins
	$pattern = '/^(?:<p>)?http.?:\/\/(?:www\.)?wordpress\.org\/plugins\/([A-Za-z0-9-]*)(?:.*)?(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox wordpress ' . $appID . ']' );
	}, $content );
	
	//Links zu Games von GOG.com
	$pattern = '/^(?:<p>)?http.?:\/\/(?:www\.)?gog\.com\/game\/([A-Za-z0-9-_]*)(?:.*)?(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox goodoldgames ' . $appID . ']' );
	}, $content );
	
	//Links zu Games von Steam
	$pattern = '/^(?:<p>)?http.?:\/\/store\.steampowered\.com\/app\/([A-Za-z0-9-_]*)(?:.*)?(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox steam ' . $appID . ']' );
	}, $content );
	
	//Links zu Opera Addons
	$pattern = '/^(?:<p>)?http.?:\/\/addons\.opera\.com\/(?:.*\/)?extensions\/details\/([A-Za-z0-9-_]*)(?:.*)?(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox operaaddons ' . $appID . ']' );
	}, $content );
	
	//Links zu den XDA Labs
	$pattern = '/^(?:<p>)?http.?:\/\/labs\.xda-developers\.com\/store\/app\/(.*?)(?:\&.*?)?(?:<\/p>)?$/m';
	$content = preg_replace_callback( $pattern, function ( $matches ) {
		$appID = Trim($matches[1]);
		return( '[appbox xda ' . $appID . ']' );
	}, $content );
	
	//Post-Content zurückgegen
	return( $content );
}
if ( get_option('wpAppbox_autoLinks') ) add_filter( 'the_content', 'wpAppbox_autoDetectLinks', 0 );


/**
* Benötigte Update-Funktionen durchführen
*
* @since   3.1.6
* @change  4.0.10
*/

if ( is_admin() ) wpAppbox_UpdateAction();

function wpAppbox_UpdateAction() {
	if ( wpAppbox_checkOlderVersion( '4.0.10' ) )
		delete_option( 'wpAppbox_iTunesGeo' );
	if ( wpAppbox_checkOlderVersion( '4.0.9' ) )
		wpAppbox_autoLanguageStoreURLs();
	if ( wpAppbox_checkOlderVersion( '4.0.7' ) ) {
		if ( get_option('wpAppbox_sslAppleImages') )
			update_option( 'wpAppbox_forceSSL', true, 'no' );
		else
			update_option( 'wpAppbox_forceSSL', false, 'no' );
		delete_option( 'wpAppbox_sslAppleImages' );
		delete_option( 'wpAppbox_eImageApple' );
	}
	if ( wpAppbox_checkOlderVersion( '4.0.0' ) ) {
		global $wpdb; 
		$whereQuery =  "option_name = 'wpAppbox_pluginVersion'";
		$whereQuery .= " OR option_name = 'wpAppbox_cacheTime'";
		$whereQuery .= " OR option_name = 'wpAppbox_disableDefer'";
		$whereQuery .= " OR option_name = 'wpAppbox_dbVersion'";
		$whereQuery .= " OR option_name = 'wpAppbox_pluginVersion'";
		$wpdb->query( "UPDATE $wpdb->options SET autoload = 'yes' WHERE $whereQuery" );
		delete_option( 'wpAppbox_disableAutoCache' );
		delete_option( 'wpAppbox_disableCache' );
		delete_option( 'wpAppbox_showReload' );
		delete_option( 'wpAppbox_imageCache' );
		delete_option( 'wpAppbox_imageCacheMode' );
		if ( true == get_option('wpAppbox_eOutput') )
			update_option( 'wpAppbox_eOutput', 'output', 'no' );
		wpAppbox_setOptions();
		wpAppbox_createTable();
	}
	if ( wpAppbox_checkOlderVersion( '3.4.8' ) )
		delete_option( 'wpAppbox_showWatchIcon' );
	/* Wenn vorherige Version älter als 3.4.0 */ 
	if ( wpAppbox_checkOlderVersion( '3.4.0' ) ) {
		if ( true == get_option('wpAppbox_affiliateAppleDev') ):
			update_option( 'wpAppbox_affiliateAppleID', '', 'no' );
			update_option( 'wpAppbox_affiliateApple', false, 'no' );
		elseif ( '' == get_option('wpAppbox_affiliateApple') ):
			update_option( 'wpAppbox_affiliateAppleID', '', 'no' );
			update_option( 'wpAppbox_affiliateApple', false, 'no' );
		else:
			$oldID = get_option('wpAppbox_affiliateApple');
			update_option( 'wpAppbox_affiliateAppleID', $oldID, 'no' );
			update_option( 'wpAppbox_affiliateApple', true, 'no' );
		endif;
		delete_option( 'wpAppbox_affiliateAppleDev' );
		if ( true == get_option('wpAppbox_affiliateAmazonDev') ):
			update_option( 'wpAppbox_affiliateAmazonID', '', 'no' );
			update_option( 'wpAppbox_affiliateAmazon', false, 'no' );
		elseif ( '' == get_option('wpAppbox_affiliateAmazon') ):
			update_option( 'wpAppbox_affiliateAmazonID', '', 'no' );
			update_option( 'wpAppbox_affiliateAmazon', false, 'no' );
		else:
			$oldID = get_option('wpAppbox_affiliateAmazon');
			update_option( 'wpAppbox_affiliateAmazonID', $oldID, 'no' );
			update_option( 'wpAppbox_affiliateAmazon', true, 'no' );
		endif;
		delete_option( 'wpAppbox_affiliateAmazonDev' );		
		if ( true == get_option('wpAppbox_affiliateMicrosoftDev') ):
			update_option( 'wpAppbox_affiliateMicrosoftID', '', 'no' );
			update_option( 'wpAppbox_affiliateMicrosoftProgram', '', 'no' );
			update_option( 'wpAppbox_affiliateMicrosoft', false, 'no' );
		elseif ( ( '' == get_option('wpAppbox_affiliateMicrosoftProgram') ) || ( '' == get_option('wpAppbox_affiliateMicrosoft') ) ):
			update_option( 'wpAppbox_affiliateMicrosoftID', '', 'no' );
			update_option( 'wpAppbox_affiliateMicrosoftProgram', '', 'no' );
			update_option( 'wpAppbox_affiliateMicrosoft', false, 'no' );
		else:
			$oldID = get_option('wpAppbox_affiliateMicrosoft');
			update_option( 'wpAppbox_affiliateMicrosoftID', $oldID, 'no' );
			update_option( 'wpAppbox_affiliateMicrosoft', true, 'no' );
		endif;
		delete_option( 'wpAppbox_affiliateMicrosoftDev' );
	}
	/* Wenn vorherige Version älter als 3.3.0 */ 
	if ( wpAppbox_checkOlderVersion( '3.3.0' ) ) {
		wpAppbox_setOptions();
		global $wpdb;
		$wpdb->query( "UPDATE $wpdb->options SET autoload = 'no' WHERE option_name LIKE 'wpAppbox_%'" );
	}
	/* Wenn vorherige Version älter als 3.2.12 */ 
	if ( wpAppbox_checkOlderVersion( '3.2.12' ) )
		wpAppbox_setOptions();
	/* Wenn vorherige Version älter als 3.2.3 */ 
	if ( wpAppbox_checkOlderVersion( '3.2.3' ) ) {
		global $wpdb;
		$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'wpAppbox_defaultStyle_%'" );
	}
	/* Wenn vorherige Version älter als 3.2.0 */ 
	if ( wpAppbox_checkOlderVersion( '3.2.0' ) ) {
		wpAppbox_setOptions();
		wpAppbox_createTable();
		wpAppbox_transformTransients();
	}
	/* Wenn vorherige Version älter als 3.1.8 */ 
	if ( wpAppbox_checkOlderVersion( '3.1.8' ) )
		wpAppbox_updateOptions();
	/* Grundsätzlich nach Update zu prüfen */ 
	if ( get_option('wpAppbox_dbVersion') != WPAPPBOX_DB_VERSION )
		wpAppbox_createTable();
	/* Neue Versionsnummer in die Datenbank schreiben */ 
	update_option( "wpAppbox_pluginVersion", WPAPPBOX_PLUGIN_VERSION );
}


/**
* Neue Optionen in wp_options einfügen
*
* @since   3.1.6
* @change  4.0.9
*/

function wpAppbox_setOptions() {
	global $wpAppbox_optionsDefault, $wpAppbox_storeNames;
	foreach ( $wpAppbox_optionsDefault as $key => $value ):
		$key = 'wpAppbox_'.$key;
		if ( false === get_option( $key ) ) update_option( $key, $value, 'no' );
	endforeach;
	foreach ( $wpAppbox_storeNames as $storeID => $storeName ):
		$key_buttonAppbox = "wpAppbox_buttonAppbox_$storeID";
		$key_buttonWYSIWYG = "wpAppbox_buttonWYSIWYG_$storeID";
		$key_buttonHTML = "wpAppbox_buttonHTML_$storeID";
		$key_buttonHidden = "wpAppbox_buttonHidden_$storeID";
		$key_storeURL = "wpAppbox_storeURL_$storeID";
		$key_storeURL_URL = "wpAppbox_storeURL_URL_$storeID";
		if ( false === get_option( $key_buttonWYSIWYG ) ) update_option( $key_buttonWYSIWYG, true, 'no' );
		if ( false === get_option( $key_buttonHTML ) ) update_option( $key_buttonHTML, true, 'no' );
		if ( false === get_option( $key_storeURL ) ) update_option( $key_storeURL, intval( "1" ), 'no' );
		if ( false === get_option( $key_storeURL_URL ) ) update_option( $key_storeURL_URL, "", 'no' );
	endforeach;
	update_option( "wpAppbox_pluginVersion", WPAPPBOX_PLUGIN_VERSION );
}


/**
* Automatische Erkennung der Sprache bei Neuinstallation
*
* @since  4.0.9
*/

function wpAppbox_autoLanguageStoreURLs() {
	if ( false !== get_option( 'wpAppbox_pluginVersion' ) ) return;
	global $wpAppbox_storeNames, $wpAppbox_storeURL_languages, $wpAppbox_storeURL_noLanguages, $wpAppbox_storeURL;
	foreach ( $wpAppbox_storeNames as $storeID => $storeName ):
		if ( in_array( $storeID, $wpAppbox_storeURL_noLanguages ) ) continue;
		if ( false !== get_option( $key_storeURL ) ) continue;
		$key_storeURL = "wpAppbox_storeURL_$storeID";
		$blogLanguage = get_bloginfo( 'language' );
		foreach( $wpAppbox_storeURL_languages as $languageID => $languageNameCode ):
			if ( strtolower( $languageNameCode['code'] ) == strtolower( $blogLanguage ) ) $languageCode = $languageID;
		endforeach;
		if ( !empty( $wpAppbox_storeURL[$storeID][$languageCode] ) ) update_option( $key_storeURL, intval( $languageCode ), 'no' );
	endforeach;
}


/**
* Prüft ob die Daten für die Amazon-API korrekt sind
*
* @since   3.4.0
* @change  4.0.9
*
* @return  boolean  true/false  TRUE when valid
*/

function wpAppbox_checkAmazonAPI() {
	if ( true != get_option( 'wpAppbox_amaAPIuse' ) ) return( false );
	$amaRegion = get_option( 'wpAppbox_amaAPIregion' );
	$amaSecretKey = base64_decode( get_option( 'wpAppbox_amaAPIsecretKey' ) );
	$params["AWSAccessKeyId"]   = get_option( 'wpAppbox_amaAPIpublicKey' );
	$params["AssociateTag"]     = get_option( 'wpAppbox_affiliateAmazonID' );
	$params["Service"]          = 'AWSECommerceService';
	$params["Operation"]     	= 'ItemLookup';
	$params["Timestamp"]        = gmdate( "Y-m-d\TH:i:s\Z" );
	$params["Version"]          = "2013-08-01";
	ksort( $params );
	$canonicalizedQuery = array();
	foreach ( $params as $param => $value ):
		$param = str_replace( "%7E", "~", rawurlencode( $param ) );
		$value = str_replace( "%7E", "~", rawurlencode( $value ) );
		$canonicalizedQuery[] = $param . "=" . $value;
	endforeach;
	$canonicalizedQuery = implode( "&", $canonicalizedQuery );
	$stringToSign = "GET\necs.amazonaws.$amaRegion\n/onca/xml\n" . $canonicalizedQuery;
	$amaSignature = base64_encode( hash_hmac( "sha256", $stringToSign, $amaSecretKey, true ) );
	$amaSignature = str_replace( "%7E", "~", rawurlencode( $amaSignature ) );
	$amaRequest = "http://ecs.amazonaws.$amaRegion/onca/xml?" . $canonicalizedQuery . "&Signature=" . $amaSignature;
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $amaRequest );
	curl_setopt( $ch, CURLOPT_HEADER, false );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_TIMEOUT, 3 );
	$amaResult = curl_exec( $ch );
	curl_close( $ch );
	if ( $amaResult != str_replace( 'InvalidClientTokenId', '', $amaResult ) ) return( false );
	if ( $amaResult != str_replace( 'SignatureDoesNotMatch', '', $amaResult ) ) return( false );
	return( true );
}



/**
* Alte Optionen übernehmen [deprecated] (für ältere Versionen ==> bis 3.1.6)
*
* @since   3.1.6
* @change  3.2.1
* @remove  >3.1.x
*/

function wpAppbox_updateOptions() {
	if ( get_option("wpAppbox") !== false ) {
		$oldSettings = get_option( "wpAppbox" );
		if ( !empty( $oldSettings ) ) {
			global $wpAppbox_optionsDefault, $wpAppbox_storeNames;
			if ( $oldSettings['wpAppbox_datacachetime'] != '' ) update_option( 'wpAppbox_cacheTime', $oldSettings['wpAppbox_datacachetime'], 'no' );
			if ( $oldSettings['wpAppbox_nofollow'] != ('' || false) ) update_option( 'wpAppbox_nofollow', $oldSettings['wpAppbox_nofollow'], 'no' );
			if ( $oldSettings['wpAppbox_blank'] != ('' || false) ) update_option( 'wpAppbox_targetBlank', $oldSettings['wpAppbox_blank'], 'no' );
			if ( $oldSettings['wpAppbox_showrating'] != ('' || false) ) update_option( 'wpAppbox_showRating', $oldSettings['wpAppbox_showrating'], 'no' );
			if ( $oldSettings['wpAppbox_colorful'] != ('' || false) ) update_option( 'wpAppbox_colorfulIcons', $oldSettings['wpAppbox_colorful'], 'no' );
			if ( $oldSettings['wpAppbox_show_reload_link'] != ('' || false) ) update_option( 'wpAppbox_showReload', $oldSettings['wpAppbox_show_reload_link'], 'no' );
			if ( $oldSettings['wpAppbox_downloadtext'] != '' ) update_option( 'wpAppbox_downloadCaption', $oldSettings['wpAppbox_downloadtext'], 'no' );
			if ( $oldSettings['wpAppbox_useownsheet'] != ('' || false) ) update_option( 'wpAppbox_disableCSS', $oldSettings['wpAppbox_useownsheet'], 'no' );
			if ( $oldSettings['wpAppbox_avoid_loadfonts'] != ('' || false) ) update_option( 'wpAppbox_disableFonts', $oldSettings['wpAppbox_avoid_loadfonts'], 'no' );
			if ( $oldSettings['wpAppbox_error_onlyforauthor'] != ('' || false) ) update_option( 'wpAppbox_eOnlyAuthors', $oldSettings['wpAppbox_error_onlyforauthor'], 'no' );
			if ( $oldSettings['wpAppbox_error_erroroutput'] != ('' || false) ) update_option( 'wpAppbox_eOutput', $oldSettings['wpAppbox_error_erroroutput'], 'no' );
			if ( $oldSettings['wpAppbox_curl_timeout'] != '' ) update_option( 'wpAppbox_curlTimeout', $oldSettings['wpAppbox_curl_timeout'], 'no' );
			if ( $oldSettings['wpAppbox_user_affiliateids'] != ('' || false) ) update_option( 'wpAppbox_userAffiliate', $oldSettings['wpAppbox_user_affiliateids'], 'no' );
			if ( $oldSettings['wpAppbox_affid'] != '' ) update_option( 'wpAppbox_affiliateApple', $oldSettings['wpAppbox_affid'], 'no' );
			if ( $oldSettings['wpAppbox_affid_sponsored'] != ('' || false) ) update_option( 'wpAppbox_affiliateAppleDev', $oldSettings['wpAppbox_affid_sponsored'], 'no' );
			if ( $oldSettings['wpAppbox_affid_amazonpartnernet'] != '' ) update_option( 'wpAppbox_affiliateAmazon', $oldSettings['wpAppbox_affid_amazonpartnernet'], 'no' );
			if ( $oldSettings['wpAppbox_affid_amazonpartnernet_sponsored'] != ('' || false) ) update_option( 'wpAppbox_affiliateAmazonDev', $oldSettings['wpAppbox_affid_amazonpartnernet_sponsored'], 'no' );
			if ( $oldSettings['wpAppbox_view_default'] != '' ) update_option( 'wpAppbox_defaultStyle', $oldSettings['wpAppbox_view_default'], 'no' );
			if ( $oldSettings['wpAppbox_button_default'] != '' ) update_option( 'wpAppbox_defaultButton', $oldSettings['wpAppbox_button_default'], 'no' );
			foreach ( $wpAppbox_storeNames as $storeID => $storeName ) {
				$key_defaultStyle = "wpAppbox_defaultStyle_$storeID";
				$key_buttonAppbox = "wpAppbox_buttonAppbox_$storeID";
				$key_buttonWYSIWYG = "wpAppbox_buttonWYSIWYG_$storeID";
				$key_buttonHTML = "wpAppbox_buttonHTML_$storeID";
				$key_buttonHidden = "wpAppbox_buttonHidden_$storeID";
				$key_storeURL = "wpAppbox_storeURL_$storeID";
				$key_storeURL_URL = "wpAppbox_storeURL_URL_$storeID";
				if ( $oldSettings['wpAppbox_view_'.$storeID] != '' ) update_option( $key_defaultStyle, intval( $oldSettings["wpAppbox_view_$storeID"] ), 'no' );
				if ( $oldSettings['wpAppbox_button_appbox_'.$storeID] != ('' || false) ) update_option( $key_buttonAppbox, $oldSettings["wpAppbox_button_appbox_$storeID"], 'no' );
				if ( $oldSettings['wpAppbox_button_alone_'.$storeID] != ('' || false) ) update_option( $key_buttonWYSIWYG, $oldSettings["wpAppbox_button_alone_$storeID"], 'no' );
				if ( $oldSettings['wpAppbox_button_html_'.$storeID] != ('' || false) ) update_option( $key_buttonHTML, $oldSettings["wpAppbox_button_html_$storeID"], 'no' );
				if ( $oldSettings['wpAppbox_button_hidden_'.$storeID] != ('' || false) ) update_option( $key_buttonHidden, $oldSettings["wpAppbox_button_hidden_$storeID"], 'no' );
				if ( $oldSettings['wpAppbox_storeurl_'.$storeID] != ('' || false) ) update_option( $key_storeURL, intval( $oldSettings["wpAppbox_storeurl_$storeID"] ), 'no' );
				if ( $oldSettings['wpAppbox_storeurl_url'.$storeID] != ('' || false) ) update_option( $key_storeURL_URL, $oldSettings["wpAppbox_storeurl_url$storeID"], 'no' );
			}
			update_option('wpAppbox_pluginVersion', WPAPPBOX_PLUGIN_VERSION, 'no');
			delete_option('wpAppbox'); //Für ältere Versionen ==> bis 3.1.6
		}
	}
}


/**
* WP-Appbox-Button zum WYSIWYG-Editor hinzufügen
*
* @since   3.2.10
* @change  4.0.9
*
* @return  void
*/

function wpAppbox_addCombinedButton() {
	global $wpAppbox_storeNames;
	$defaultOption = get_option( 'wpAppbox_defaultButton' );
	$combinedButton = array();
	$combinedButtonNames = array();
	$combinedButtonIDs = array();
	foreach ( $wpAppbox_storeNames as $storeID => $storeName ):
		if ( ( '1' == $defaultOption ) || get_option( 'wpAppbox_buttonAppbox_' . $storeID ) ):
			$combinedButtonNames[] = $storeName;
			$combinedButtonIDs[] = $storeID;
		endif;
	endforeach;
	if ( !empty( $combinedButtonNames) && !empty( $combinedButtonIDs ) ):
		$combinedButton['names'] = $combinedButtonNames;
		$combinedButton['ids'] = $combinedButtonIDs;
		?>
		<script type="text/javascript">
			var wpappbox_combined_button = <?php echo( json_encode( $combinedButton ) ); ?>;
		</script>
		<?php 
	endif;
}


/**
* Buttons zum WYSIWYG-Editor hinzufügen
*
* @since   2.0.0
* @change  4.0.9
*
* @param   array  $buttons  Buttons [WordPress]
* @return  array  $buttons  Buttons [WordPress]
*/

function wpAppbox_addButtonsWYSIWYG( $buttons ) {
	global $wpAppbox_storeNames;
	$defaultOption = get_option( 'wpAppbox_defaultButton' );
	/**
	* WP-Appbox-Button
	*/
	if ( $defaultOption == '1' || $defaultOption == '3' ):
		$combinedButton = array();
		$combinedButtonNames = array();
		$combinedButtonIDs = array();
		foreach ( $wpAppbox_storeNames as $storeID => $storeName ):
			if ( '1' == $defaultOption || get_option( 'wpAppbox_buttonAppbox_' . $storeID ) ):
				$combinedButtonNames[] = $storeName;
				$combinedButtonIDs[] = $storeID;
			endif;
		endforeach;
		if ( count( $combinedButtonNames ) == 1 && count( $combinedButtonIDs ) == 1 ):
			$forceSingle = $combinedButtonIDs[0];
		elseif ( !empty( $combinedButtonNames) && !empty( $combinedButtonIDs ) ):
			$combinedButton['names'] = $combinedButtonNames;
			$combinedButton['ids'] = $combinedButtonIDs;
			?>
			<script type="text/javascript">
				var wpappbox_combined_button = <?php echo( json_encode( $combinedButton ) ); ?>;
			</script>
			<?php 
		endif;
	endif;
	/**
	* Einfache Buttons
	*/
	if ( '0' == $defaultOption || '3' == $defaultOption ):
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'amazonapps' ) || get_option('wpAppbox_buttonWYSIWYG_amazonapps') )
			array_push( $buttons, 'separator', 'wpAppbox_AmazonAppsButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'appstore' ) || get_option('wpAppbox_buttonWYSIWYG_appstore') )
			array_push( $buttons, 'separator', 'wpAppbox_AppStoreButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'chromewebstore' ) || get_option('wpAppbox_buttonWYSIWYG_chromewebstore') )
			array_push( $buttons, 'separator', 'wpAppbox_ChromeWebStoreButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'firefoxaddon' ) || get_option('wpAppbox_buttonWYSIWYG_firefoxaddon') )
			array_push( $buttons, 'separator', 'wpAppbox_FirefoxAddonButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'firefoxmarketplace' ) || get_option('wpAppbox_buttonWYSIWYG_firefoxmarketplace') )
			array_push( $buttons, 'separator', 'wpAppbox_FirefoxMarketplaceButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'googleplay' ) || get_option('wpAppbox_buttonWYSIWYG_googleplay') )
			array_push( $buttons, 'separator', 'wpAppbox_GooglePlayButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'operaaddons' ) || get_option('wpAppbox_buttonWYSIWYG_operaaddons') )
			array_push( $buttons, 'separator', 'wpAppbox_OperaAddonsButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'steam' ) || get_option('wpAppbox_buttonWYSIWYG_steam') )
			array_push( $buttons, 'separator', 'wpAppbox_SteamButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'windowsstore' ) || get_option('wpAppbox_buttonWYSIWYG_windowsstore') )
			array_push( $buttons, 'separator', 'wpAppbox_WindowsStoreButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'wordpress' ) || get_option('wpAppbox_buttonWYSIWYG_wordpress') )
			array_push( $buttons, 'separator', 'wpAppbox_WordPressButton' );
		if ( '0' == $defaultOption || ( isset( $forceSingle ) && $forceSingle == 'xda' ) || get_option('wpAppbox_buttonWYSIWYG_xda') )
			array_push( $buttons, 'separator', 'wpAppbox_XDAButton' );
	endif;
	/**
	* WP-Appbox-Button anfügen
	*/
	if ( '1' == $defaultOption || '3' == $defaultOption ) 
		array_push( $buttons, 'separator', 'wpAppbox_AppboxButton' );
	return( $buttons );
}


/**
* Buttons zum HTML-Editor hinzufügen
*
* @since   2.0.0
* @change  4.0.9
*
* @echo    string   Ausgabe des Scripts innerhalb TinyMCE
*/

function wpAppbox_addButtonsHTML() {
	if ( !is_admin() ) return;
	global $wpAppbox_storeNames;
	$defaultOption = get_option('wpAppbox_defaultButton');
	if ( $defaultOption == '2' || !wp_script_is( 'quicktags' ) ) return;
	echo( "<script type=\"text/javascript\">" );
	foreach ( $wpAppbox_storeNames as $storeID => $storeName ):
		if ( get_option('wpAppbox_buttonHTML_' . $storeID) || $defaultOption == '0' ) echo( "QTags.addButton('htmlx_$storeID', 'Appbox: $storeID', '[appbox $storeID appid]', '', '', '$storeName');" );
	endforeach;
	echo( "</script>" );
}


/**
* Registrierung des Plugins
*
* @since   2.0.0
* @change  4.0.9
*
* @param   array  $plugin_array     Plugin-Array [WordPress]
* @return  array  $plugin_array     Plugin-Array [WordPress]
*/

function wpAppbox_register( $plugin_array ) {
	global $wpAppbox_storeNames;
	$option = get_option('wpAppbox_defaultButton');
	if ( '2' != $option ):
		foreach ( $wpAppbox_storeNames as $storeID => $storeName ):
			if ( get_option("wpAppbox_buttonAppbox_$storeID") ) $iscombined = true;
		endforeach;
		$plugin_array['wpAppbox_CombinedButton'] = plugins_url( "buttons/buttons.min.js", __FILE__ );
		$plugin_array["wpAppboxSingle"] = plugins_url( "buttons/buttons.min.js", __FILE__ );
		return( $plugin_array );
	endif;
}


/**
* "Einstellungen"-Link zur Plugin-Liste hinzufügen
*
* @since   2.0.0
* @change  4.0.9
*
* @param   array   $links  Array der eingetragenen Links [WordPress]
* @param   string  $file   Aufgerufene Datei [WordPress]
* @return  array   $links  Rückgabe der überarbeiteten Links [WordPress]
*/

function wpAppbox_addSettings( $links, $file ) {
	static $this_plugin;
	if ( !$this_plugin ) $this_plugin = plugin_basename( __FILE__ );
	if ( $file == $this_plugin ):
		$settings_link = '<a href="options-general.php?page=wp-appbox">' . esc_html__('Settings', 'wp-appbox') . '</a>';
		$links = array_merge( array( $settings_link ), $links );
	endif;
	return( $links );
}


/**
* Weitere Links zur Plugin-Beschreibung in der Liste hinzufügen
*
* @since   2.0.0
* @change  3.2.0
*
* @param   array   $links  Array der eingetragenen Links [WordPress]
* @param   string  $file   Aufgerufene Datei [WordPress]
* @return  array   $links  Rückgabe der überarbeiteten Links [WordPress]
*/

function wpAppbox_addLinks( $links, $file ) {
	static $this_plugin;
	if ( !$this_plugin ) {
		$this_plugin = plugin_basename( __FILE__ );
	}
	if ( $file == $this_plugin ) {
		$links = array();
		$links[] = 'Version '.WPAPPBOX_PLUGIN_VERSION;
		$links[] = '<a target="_blank" href="https://twitter.com/Marcelismus">' . esc_html__('Follow me on Twitter', 'wp-appbox') . '</a>';
		$links[] = '<a target="_blank" href="' . ( ( get_locale() == 'de_DE' ) ? 'https://tchgdns.de/wp-appbox-app-badge-fuer-google-play-mac-app-store-windows-store-windows-phone-store-co/' : 'https://translate.google.de/translate?hl=de&sl=de&tl=en&u=https%3A%2F%2Ftchgdns.de%2Fwp-appbox-app-badge-fuer-google-play-mac-app-store-windows-store-windows-phone-store-co%2F' ) . '">' . esc_html__('Plugin page', 'wp-appbox') . '</a>';
		$links[] = '<a target="_blank" href="http://wordpress.org/support/view/plugin-reviews/wp-appbox">' . esc_html__('Rate the plugin', 'wp-appbox') . '</a>';
		$links[] = '<a target="_blank" href="http://www.amazon.de/gp/registry/wishlist/1FC2DA2J8SZW7">' . esc_html__('My Amazon Wishlist', 'wp-appbox') . '</a>';
		$links[] = '<a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SH9AAS276RAS6">' . esc_html__('PayPal-Donation', 'wp-appbox') . '</a>';
	}
	return( $links );
}


/**
* Ausgabe von Fehlermeldungen
*
* @since   2.0.0
* @change  3.2.0
*
* @param   string  $message  Fehlermeldung
*/

function br_trigger_error( $message ) {
    if ( isset( $_GET['action'] ) && $_GET['action'] == 'error_scrape' ) {
        echo( "<strong>$message</strong>" );
        exit;
    } else {
    	trigger_error( $message, E_USER_ERROR );
    }
}


/**
* Aktivierung des Plugins
*
* @since   2.0.0
* @change  3.2.7
*/

function wpAppbox_activatePlugin( $network_wide ) {
	if ( version_compare( phpversion(), '5.3' ) == -1 ) br_trigger_error( esc_html__('To use this plugin requires at least PHP version 5.3 is required.', 'wp-appbox') );
	if ( !function_exists('curl_init') ) br_trigger_error( esc_html__('"cURL" is disabled on this server, but is required. Please enable this feature (or contact your hoster).', 'wp-appbox') ); 
	if ( !function_exists('curl_exec') ) br_trigger_error( esc_html__('"curl_exec" is disabled on this server, but is required. Please enable this feature (or contact your hoster).', 'wp-appbox') ); 
	if ( !function_exists('json_decode') ) br_trigger_error( esc_html__('"json_decode" is disabled on this server, but is required. Please enable this feature (or contact your hoster).', 'wp-appbox') );
	if ( function_exists( 'is_multisite' ) && is_multisite() && $network_wide ) {
		global $wpdb;
		$current_blog = $wpdb->blogid;
		$blogs = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
		foreach ( $blogs as $blog ):
			switch_to_blog( $blog );
			wpAppbox_activateActions();
		endforeach;
		switch_to_blog( $current_blog );
	} else wpAppbox_activateActions();
}


/**
* Aktivierung-Actions des Plugins
*
* @since  3.2.7
* @change 4.0.9
*/

function wpAppbox_activateActions() {
	wpAppbox_autoLanguageStoreURLs(); /* Standard-URLs für die Stores festlegen */
	wpAppbox_setOptions(); /* Standard-Einstellungen in wp_options schreiben */
	wpAppbox_createTable(); /* Tabelle für "WP-Appbox" erstellen */
	wpAppbox_setupCronCache();
}


/**
* Deinstallation des Plugins
*
* @since   2.0.0
* @change  4.0.9
*/

function wpAppbox_uninstallPlugin() {
    if ( function_exists( 'is_multisite' ) && is_multisite() ) {
        global $wpdb;
        $current_blog = $wpdb->blogid;
        $blogs = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
        foreach ( $blogs as $blog ):
        	switch_to_blog( $blog );
        	wpAppbox_uninstallActions();
        endforeach;
        switch_to_blog( $current_blog );
    } else wpAppbox_uninstallActions();
}


/**
* Deinstallation-Actions des Plugins
*
* @since  3.2.2
* @change 4.0.0
*/

function wpAppbox_uninstallActions() {
	global $wpdb;
	$wpdb->query( "DELETE FROM " . $wpdb->prefix . "options WHERE option_name LIKE 'wpAppbox_%';" );
	delete_option( "wpAppbox" ); //Für ältere Versionen ==> bis 3.1.6
	wp_clear_scheduled_hook( 'wpAppbox_cacheCron' );
	wpAppbox_deleteTable();
	$delete = wpAppbox_imageCache::deleteImageCache( true );
}


/**
* Deaktivierung des Plugins
*
* @since   4.0.0
*/

function wpAppbox_deactivatePlugin() {
    if ( function_exists( 'is_multisite' ) && is_multisite() ) {
        global $wpdb;
        $current_blog = $wpdb->blogid;
        $blogs = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
        foreach ( $blogs as $blog ) {
        	switch_to_blog( $blog );
        	wpAppbox_deactivateActions();
        }
        switch_to_blog( $current_blog );
    } else wpAppbox_deactivateActions();
}


/**
* Deaktivierungs-Actions des Plugins
*
* @since  4.0.0
*/

function wpAppbox_deactivateActions() {
	wp_clear_scheduled_hook( 'wpAppbox_cacheCron' );
}


/**
* Aktivierung für neue Multisite-Blogs nach Plugin-Aktivierung
*
* @since  3.2.7
*/

function wpAppbox_activateBlogMultisite( $blogID ) {
    global $wpdb;
    if ( is_plugin_active_for_network('wp-appbox/wp-appbox.php') ) {
		switch_to_blog( $blogID );
		my_plugin_activate();
		restore_current_blog();
    }
}
add_action( 'wpmu_new_blog', 'wpAppbox_activateBlogMultisite' );


/**
* Stylesheet des Plugins registrieren
*
* @since   2.0.0
* @change  3.2.0
*/

function wpAppbox_RegisterStyle() {
	if ( get_option('wpAppbox_disableCSS') == false ) {
		wp_register_style( 'wpappbox', plugins_url( 'css/styles.min.css', __FILE__ ), array(), WPAPPBOX_PLUGIN_VERSION, 'screen' );
		wp_enqueue_style( 'wpappbox' );
	}
}


/**
* Google Fonts für das Plugin registrieren
*
* @since   2.0.0
* @change  3.2.0
*/

function wpAppbox_loadFonts() {
	if ( get_option('wpAppbox_disableFonts') == false ) {
		wp_register_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,600' );
		wp_enqueue_style( 'open-sans' );
	}
}


/* Diverse Filter, Aktionen und Hooks registrieren */
add_filter( 'mce_external_plugins', "wpAppbox_register" );
add_filter( 'mce_buttons', 'wpAppbox_addButtonsWYSIWYG', 0 );
add_filter( 'plugin_action_links', 'wpAppbox_addSettings', 10, 2 );
add_filter( 'plugin_row_meta', 'wpAppbox_addLinks', 10, 2 );
add_action( 'plugins_loaded', 'wpAppbox_UpdateAction' );
add_action( 'admin_menu', 'wpAppbox_pageInit' );
add_action( 'admin_print_footer_scripts', 'wpAppbox_addButtonsHTML' );
register_activation_hook( __FILE__, 'wpAppbox_activatePlugin' );
register_deactivation_hook( __FILE__, 'wpAppbox_deactivatePlugin' );
register_uninstall_hook( __FILE__, 'wpAppbox_uninstallPlugin' );


/* Stylesheet und Font auf den normalen Weg laden */
if ( get_option('wpAppbox_disableDefer') ) {
	add_action( 'wp_enqueue_scripts', 'wpAppbox_RegisterStyle' );
	add_action( 'wp_print_styles', 'wpAppbox_loadFonts' );
}


/* DER Shortcode */ 
add_shortcode( 'appbox', 'wpAppbox_createAppbox' );


?>