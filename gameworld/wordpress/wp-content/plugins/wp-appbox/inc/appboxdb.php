<?php 


/**
* Prüft ob Apps im Cache vorhanden sind
*
* @since   3.2.3
*/

function wpAppbox_cacheHasApps() {
	global $wpdb;
	$wpdb->get_results( "SELECT * FROM " . wpAppbox_databaseName() );
	if ( '0' != $wpdb->num_rows ) {
		return( true );
	}
}


/**
* Anzahl der Apps im Cache zurückgeben
*
* @since   3.2.3
*
* @param   boolean  $onlyDeprecated   Nur veraltete Apps zählen? (optional)
* @return  integer  $countApps        Anzahl der Apps
*/

function wpAppbox_countCachedApps( $onlyDeprecated = false ) {
	global $wpdb;
	if ( $onlyDeprecated ) {
		$countApps = $wpdb->get_var( "SELECT COUNT(*) FROM " . wpAppbox_databaseName() . " WHERE deprecated = 1" );
	} else {
		$countApps = $wpdb->get_var( "SELECT COUNT(*) FROM " . wpAppbox_databaseName() );
	}
	return( $countApps );
}


/**
* Name der Datenbank herausfinden
*
* @since   3.2.2
*
* @return  string  $dbName  Name der verwendeten Datenbank
*/

function wpAppbox_databaseName() {
	global $wpdb;
	$dbName = $wpdb->prefix . 'appbox';
	return( $dbName );
}


/**
* Prüfen ob Tabelle "wp_appbox" existiert
*
* @since   3.2.0
*
* @return  boolean  true/false  TRUE when exists
*/

function wpAppbox_tableExists() {
	global $wpdb;
	if( $wpdb->get_var( "SHOW TABLES LIKE '" . wpAppbox_databaseName() . "'" ) != wpAppbox_databaseName() ) {
		return( false );
	} else {
		return( true );
	}
}


/**
* Erstelle Tabelle in der Datenbank
*
* @since   3.2.0
* @change  3.2.3
*/

function wpAppbox_createTable() {
	global $wpdb;
	if ( get_option('wpAppbox_dbVersion') != WPAPPBOX_DB_VERSION || !wpAppbox_tableExists() ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE " . wpAppbox_databaseName() . " (
				id VARCHAR(32) PRIMARY KEY NOT NULL,
				app_id VARCHAR(100) NOT NULL,
				app_url VARCHAR(255) NOT NULL,
				app_icon VARCHAR(255) NOT NULL,
				app_title VARCHAR(255) NOT NULL,
				app_description VARCHAR(5000) NOT NULL,
				app_author VARCHAR(100) NOT NULL,
				app_author_url VARCHAR(255) NULL,
				app_price VARCHAR(10) NOT NULL,
				app_has_iap INT(1) DEFAULT '0',
				app_rating INT(2) DEFAULT '-1',
				app_screenshots TEXT NOT NULL,
				app_extend VARCHAR(255),
				store_name VARCHAR(30) NOT NULL,
				store_name_css VARCHAR(20) NOT NULL,
				appbox_version VARCHAR(8) NOT NULL,
				created BIGINT(20) NOT NULL,
				fallback INT(1) DEFAULT '0',
				deprecated INT(1) DEFAULT '0',
				UNIQUE KEY id (id)
				) $charset_collate;";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		if ( $wpdb->last_error ) {
			wpAppbox_errorOutput( "function: wpAppbox_createTable() ---> $wpdb->last_error" );
		} else {
			update_option( 'wpAppbox_dbVersion', WPAPPBOX_DB_VERSION );
		}
	}
}


/**
* Löscht die Tabelle "wp_appbox" bei Deinstallation
*
* @since   3.2.0
*
* @return  boolean   true/false     TRUE when deleted
* @output  function  errorOutput()  Fehlermeldung
*/

function wpAppbox_deleteTable() {
	global $wpdb;
	if ( wpAppbox_tableExists() ) {
		$sql = "DROP TABLE " . wpAppbox_databaseName();
		$wpdb->query( $sql );
		if( $wpdb->last_error ) {
			wpAppbox_errorOutput( "function: wpAppbox_deleteTable() ---> $wpdb->last_error" );
		} else { 
			return( true );
		}
	}
}


/**
* Räumt den App-Cache auf
*
* @since   3.2.0
*
* @return  boolean  true/false  TRUE when cleaned
* @output  function  errorOutput()  Fehlermeldung
*/

function wpAppbox_cleanCache() {
	global $wpdb;
	if ( !get_option('wpAppbox_disableAutoCache') ) {
		$timeNow = time(); 
		$timeExpires = WPAPPBOX_CACHINGTIME * 60;
		$sql = "DELETE FROM " . wpAppbox_databaseName() . " WHERE (created + $timeExpires) < $timeNow";
		$wpdb->query( $sql );
		if ( $wpdb->last_error ) {
			wpAppbox_errorOutput( "function: wpAppbox_cleanCache() ---> $wpdb->last_error" );
		} else { 
			return( true );
		}
	}
}


/**
* Löscht eine bestimmte App aus dem App-Cache
*
* @since   3.2.0
* @change  3.4.0
*
* @param   string    $appID      Cache-ID der App
* @return  boolean   true/false  TRUE when deleted
* @output  function  errorOutput()  Fehlermeldung
*/

function wpAppbox_clearAppCache( $cacheID ) {
	global $wpdb;
	$results = $wpdb->delete( wpAppbox_databaseName(), array( 'id' => $cacheID ) );
	if( $wpdb->last_error ) {
		wpAppbox_errorOutput( "function: wpAppbox_clearAppCache() ---> $wpdb->last_error" );
	} else {
		return( true );
	}	
}


/**
* Löscht den kompletten App-Cache
*
* @since   3.2.0
*
* @return  boolean  true/false  TRUE when cleared
* @output  function  errorOutput()  Fehlermeldung
*/

function wpAppbox_clearCache() {
	global $wpdb;
	$sql = "TRUNCATE TABLE " . wpAppbox_databaseName();
	$wpdb->query( $sql );
	if ( $wpdb->last_error ) {
		wpAppbox_errorOutput( "function: wpAppbox_clearCache() ---> $wpdb->last_error" );
	} else {
		return( true );
	}
}


/**
* Alte App-Daten aus der Transient-API übernehmen [deprecated]
*
* @since   3.2.0
* @remove  >3.2.x
*
* @output  function  errorOutput()  Fehlermeldung
*/

function wpAppbox_transformTransients() {
	global $wpdb;
	if ( wpAppbox_tableExists() ) {
		$sql = "SELECT option_name, option_value FROM " . $wpdb->prefix . "options WHERE option_name LIKE '_transient_wpAppbox_%'";
		$resultTransients = $wpdb->get_results( $sql );
		if ( $wpdb->last_error ) {
			wpAppbox_errorOutput( "function: wpAppbox_transformTransients() ---> $wpdb->last_error" );
		}
		if ( $resultTransients ) {
			foreach ( $resultTransients as $theTransient ) {
				$appData = array();
				$appInfosTransient = unserialize( $theTransient->option_value );
				$appInfos = $appInfosTransient['General']['0'];
				$appData['app_id'] = $appInfos->app_id;
				$appData['app_url'] = $appInfos->app_store_url;
				$appData['app_icon'] = $appInfos->app_icon;
				$appData['app_title'] = $appInfos->app_title;
				$appData['app_author'] = $appInfos->app_author;
				$appData['app_author_url'] = $appInfos->author_store_url;
				$appData['app_price'] = $appInfos->app_price;
				$appData['app_has_iap'] = $appInfos->app_has_iap;
				$appData['app_rating'] = $appInfos->app_rating;
				$appData['store_name'] = $appInfos->storename;
				$appData['store_name_css'] = $appInfos->storename_css;
				$appData['appbox_version'] = WPAPPBOX_PLUGIN_VERSION;
				$appData['fallback'] = $appInfos->fallback;
				$appData['created'] = time();
				$storeID = $appInfos->storename_css;
				if( 'macappstore' == $storeID ) $storeID = 'appstore';
				$appData['id'] = md5( "$appInfos->app_id-$storeID" );
				switch ( $storeID ) {
					case 'windowsstore':
						if ( $appInfos->icon_bg != '' ) {
							$appData['app_extend'] = $appInfos->icon_bg;
						}
						break;
				}
				$appScreenshots = array();
				switch ( $storeID ) {
					case 'appstore':
						foreach ( $appInfosTransient['ScreenShots']['iphone'] as $appShots ) {
							$appScreenshots['iphone'][] = $appShots->screen_shot;
						}
						foreach ( $appInfosTransient['ScreenShots']['ipad'] as $appShots ) {
							$appScreenshots['ipad'][] = $appShots->screen_shot;
						}
						foreach ( $appInfosTransient['ScreenShots']['watch'] as $appShots ) {
							$appScreenshots['watch'][] = $appShots->screen_shot;
						}
						break;
					case 'windowsstore':
						foreach ( $appInfosTransient['ScreenShots']['mobile'] as $appShots ) {
							$appScreenshots['mobile'][] = $appShots->screen_shot;
						}
						foreach ( $appInfosTransient['ScreenShots']['desktop'] as $appShots ) {
							$appScreenshots['desktop'][] = $appShots->screen_shot;
						}
						break;
					default:
						foreach ( $appInfosTransient['ScreenShots'] as $appShots ) {
							$appScreenshots[] = $appShots->screen_shot;
						}
						break;
				}
				$appData['app_screenshots'] = serialize( $appScreenshots );
				$wpdb->insert( wpAppbox_databaseName(), $appData );
				if ( $wpdb->last_error ) wpAppbox_errorOutput( "function: wpAppbox_transformTransients() ---> $wpdb->last_error" );
			}
		}
		$sql = "DELETE FROM " . $wpdb->prefix . "options WHERE option_name LIKE '_transient_wpAppbox_%'";
		$wpdb->query( $sql );
		$sql = "DELETE FROM " . $wpdb->prefix . "options WHERE option_name LIKE '_transient_timeout_wpAppbox_%'";
		$wpdb->query( $sql );
	} else {
		wpAppbox_createTable();
	}
}

?>