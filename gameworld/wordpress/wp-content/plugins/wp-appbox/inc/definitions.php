<?php


/* Für das shice Tabellen-Prefix von WordPress */
/**
* Link-Umwandlung für das Amazon PartnerNet
*/
global $wpdb;


/**
* Ein paar Definitionen #YOLO
*/
define( 'WPAPPBOX_PLUGIN_NAME', 'WP-Appbox' ); 
define( 'WPAPPBOX_PLUGIN_VERSION', '4.0.1' );
define( 'WPAPPBOX_DB_VERSION', '1.0.3' );
define( 'WPAPPBOX_PREFIX', 'wpAppbox_' );
define( 'WPAPPBOX_AFFILIATE_APPLE', '11ltUj' );
define( 'WPAPPBOX_AFFILIATE_AMAZON', 'wpappbox-21' );
define( 'WPAPPBOX_AFFILIATE_MICROSOFT', '2795219' );
define( 'WPAPPBOX_AFFILIATE_MICROSOFT_PROGRAM', '213688' );

define( 'WPAPPBOX_CACHINGTIME', ( get_option('wpAppbox_cacheTime') != '' ? get_option('wpAppbox_cacheTime') : $wpAppbox_optionsDefault['cacheTime'] ) ); 
define( 'WPAPPBOX_BLOCKMISSINGTIME', ( get_option('wpAppbox_blockMissingTime') != '' ? get_option('wpAppbox_blockMissingTime') : $wpAppbox_optionsDefault['blockMissingTime'] ) ); 

define( 'WPAPPBOX_PLUGIN_BASE_DIR', basename( dirname( __FILE__ ) ) ); // Ornder wp-content/plugins/wp-appbox/
define( 'WPAPPBOX_PLUGIN_BASE_DOMAIN', get_site_url() . '/' . basename( dirname( __FILE__ ) ) ); // http://domain.de/wp-content/...
define( 'WPAPPBOX_PLUGIN_PATH', plugin_dir_path( __FILE__ ) ); // Server-Path
define( 'WPAPPBOX_CACHE_PATH', WP_CONTENT_DIR . '/cache/wp-appbox/' );
define( 'WPAPPBOX_CACHE_DIR', content_url() . '/cache/wp-appbox/' );

			
/**
* Zuweisung Store-ID => Store-Bezeichnung
*/
global $wpAppbox_storeNames;	
$wpAppbox_storeNames = array(	
	'amazonapps' => __( 'Amazon Apps', 'wp-appbox' ),
	'appstore' => __( '(Mac) App Store', 'wp-appbox' ),
	'chromewebstore' => __( 'Chrome Web Store', 'wp-appbox' ),
	'firefoxaddon' => __( 'Firefox Add-ons', 'wp-appbox' ),
	'firefoxmarketplace' => __( 'Firefox Marketplace', 'wp-appbox' ),
	'goodoldgames' => __( 'GOG.com', 'wp-appbox' ),
	'googleplay' => __( 'Google Play Apps', 'wp-appbox' ),
	'operaaddons' => __( 'Opera Add-ons', 'wp-appbox' ),
	'steam' => __( 'Steam', 'wp-appbox' ),
	'windowsstore' => __( 'Windows Store', 'wp-appbox' ),
	'wordpress' => __( 'WordPress Plugins', 'wp-appbox' ),
	'xda' => __( 'XDA Labs', 'wp-appbox' )
);
					
						
/**
* Zuweisung Style-ID => Style-Name...
*/							
global $wpAppbox_styleNames;
$wpAppbox_styleNames = array(
	'0' => 'standard',
	'1' => 'simple',
	'2' => 'compact',
	'3' => 'screenshots',
	'4' => 'screenshots-only'
);
			
			
/**
* ...denn nicht alle Stores können alle Styles anzeigen. FU Chrome Web Store -.-
*/					
global $wpAppbox_storeStyles;
$wpAppbox_storeStyles = array(	
	'amazonapps' => array( 1, 2, 3, 4 ),
	'appstore' => array( 1, 2, 3, 4 ),
	'chromewebstore' => array( 1, 2, 3, 4 ),
	'firefoxaddon' => array( 1, 2, 3, 4 ),
	'firefoxmarketplace' => array( 1, 2, 3, 4 ),
	'goodoldgames' => array( 1, 2, 3, 4 ),
	'googleplay' => array( 1, 2, 3, 4 ),
	'operaaddons' => array( 1, 2, 3, 4 ),
	'steam' => array( 1, 2, 3, 4 ),
	'windowsstore' => array( 1, 2, 3, 4 ),
	'wordpress' => array( 1, 2, 3, 4 ),
	'xda' => array( 1, 2, 3, 4 )
);


/**
* Zuordnungen Program ID -> Country für das Microsoft Private Affiliate Program (wieso auch einfach?!)
*/							
global $wpAppbox_MicrosoftPrivateAffiliateProgramm;
$wpAppbox_MicrosoftPrivateAffiliateProgramm = array(
	__( 'Argentina', 'wp-appbox' ) => '231734',
	__( 'Australia', 'wp-appbox' ) => '227118',
	__( 'Austria', 'wp-appbox' ) => '228930',
	__( 'Belgium', 'wp-appbox' ) => '233819',
	__( 'Brazil', 'wp-appbox' ) => '211928',
	__( 'Canada', 'wp-appbox' ) => '235204',
	__( 'Chile', 'wp-appbox' ) => '231735',
	__( 'China', 'wp-appbox' ) => '235166',
	__( 'Columbia', 'wp-appbox' ) => '231736',
	__( 'Costa Rica', 'wp-appbox' ) => '235175',
	__( 'Czech Republic', 'wp-appbox' ) => '230670',
	__( 'Denmark', 'wp-appbox' ) => '231755',
	__( 'Estonia', 'wp-appbox' ) => '262284',
	__( 'Finland', 'wp-appbox' ) => '231757',
	__( 'France', 'wp-appbox' ) => '213961',
	__( 'Germany', 'wp-appbox' ) => '213688',
	__( 'Greece', 'wp-appbox' ) => '230665',
	__( 'Honk Kong', 'wp-appbox' ) => '231730',
	__( 'Hungary', 'wp-appbox' ) => '230666',
	__( 'India', 'wp-appbox' ) => '235158',
	__( 'Indonesia', 'wp-appbox' ) => '235155',
	__( 'Ireland', 'wp-appbox' ) => '231761',
	__( 'Israel', 'wp-appbox' ) => '233850',
	__( 'Italy', 'wp-appbox' ) => '193031',
	__( 'Japan', 'wp-appbox' ) => '239077',
	__( 'Kuwait', 'wp-appbox' ) => '235229',
	__( 'Luxembourg', 'wp-appbox' ) => '230671',
	__( 'Malaysia', 'wp-appbox' ) => '233864',
	__( 'Mexico', 'wp-appbox' ) => '230667',
	__( 'Netherlands', 'wp-appbox' ) => '213960',
	__( 'New Zealand', 'wp-appbox' ) => '227638',
	__( 'Norway', 'wp-appbox' ) => '193030',
	__( 'Peru', 'wp-appbox' ) => '235194',
	__( 'Philippines', 'wp-appbox' ) => '235162',
	__( 'Poland', 'wp-appbox' ) => '230596',
	__( 'Portugal', 'wp-appbox' ) => '230669',
	__( 'Republic of Korea', 'wp-appbox' ) => '225151',
	__( 'Russia', 'wp-appbox' ) => '230077',
	__( 'Saudi Arabia', 'wp-appbox' ) => '233859',
	__( 'Singapore', 'wp-appbox' ) => '230668',
	__( 'Slovakia', 'wp-appbox' ) => '235172',
	__( 'Spain', 'wp-appbox' ) => '213958',
	__( 'Sweden', 'wp-appbox' ) => '231759',
	__( 'Switzerland', 'wp-appbox' ) => '229203',
	__( 'Taiwan', 'wp-appbox' ) => '235161',
	__( 'Thailand', 'wp-appbox' ) => '233873',
	__( 'Turkey', 'wp-appbox' ) => '231733',
	__( 'South Africa', 'wp-appbox' ) => '233838',
	__( 'United Arab Emirates', 'wp-appbox' ) => '233856',
	__( 'United Kingdom', 'wp-appbox' ) => '263915',
	__( 'United States', 'wp-appbox' ) => '259740',
	__( 'Venezuela', 'wp-appbox' ) => '235201'

);
ksort( $wpAppbox_MicrosoftPrivateAffiliateProgramm );


/**
* Festlegen der Standard-Einstellungen
*/
global $wpAppbox_optionsDefault;
$wpAppbox_optionsDefault = array(
	'pluginVersion' => WPAPPBOX_PLUGIN_VERSION,
	'defaultStyle' => intval( '1' ),
	'colorfulIcons' => false,
	'showRating' => intval( '1' ),
	'downloadCaption' => __('Download', 'wp-appbox'),
	'nofollow' => true,
	'targetBlank' => true,
	'cacheTime' => intval( '720' ),
	'cacheMode' => 'all',
	'cronIntervall' => intval( '30' ),
	'cronCount' => intval( '5' ),
	'blockMissing' => true,
	'blockMissingTime' => intval( '60' ),
	'cachePlugin' => false,
	'imgCache' => false,
	'imgCacheMode' => 'appicon',
	'imgCacheDelay' => false,
	'imgCacheDelayTime' => intval( '8' ),
	'affiliateApple' => false,
	'affiliateAppleID' => '',
	'affiliateAmazon' => false,
	'affiliateAmazonID' => '',
	'affiliateMicrosoft' => false,
	'affiliateMicrosoftID' => '',
	'affiliateMicrosoftProgram' => '',
	'userAffiliate' => false,
	'defaultButton' => intval( '0' ),
	'iTunesGeo' => true,
	'autoLinks' => false,
	'anonymizeLinks' => false,
	'disableDefer' => false,
	'disableCSS' => false,
	'disableFonts' => false,
	'curlTimeout' => intval( '5' ),
	'eOnlyAuthors' => false,
	'eOutput' => false,
	'eImageApple' => false,
	'sslAppleImages' => false,
	'cacheCronjob' => false,
);


?>