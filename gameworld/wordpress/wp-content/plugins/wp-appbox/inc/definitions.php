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
define( 'WPAPPBOX_PLUGIN_VERSION', '3.4.8' );
define( 'WPAPPBOX_DB_VERSION', '1.0.2' );
define( 'WPAPPBOX_PREFIX', 'wpAppbox_' );
define( 'WPAPPBOX_AFFILIATE_APPLE', '11ltUj' );
define( 'WPAPPBOX_AFFILIATE_AMAZON', 'wpappbox-21' );
define( 'WPAPPBOX_AFFILIATE_MICROSOFT', '2795219' );
define( 'WPAPPBOX_AFFILIATE_MICROSOFT_PROGRAM', '213688' );

define( 'WPAPPBOX_DISABLE_CACHE', ( get_option('wpAppbox_disableCache') ? true : false ) ); 

define( 'WPAPPBOX_CACHINGTIME', ( get_option('wpAppbox_cacheTime') != '' ? get_option('wpAppbox_cacheTime') : $wpAppbox_optionsDefault['cacheTime'] ) ); 

define( 'WPAPPBOX_PLUGIN_BASE_DIR', basename( dirname( dirname( __FILE__ ) ) ) );
define( 'WPAPPBOX_CACHE_DIR', WP_CONTENT_DIR.'/cache/wpappbox/' );

			
/**
* Zuweisung Store-ID => Store-Bezeichnung
*/
global $wpAppbox_storeNames;	
$wpAppbox_storeNames = array(	
	'amazonapps' => 'Amazon Apps',
	'appstore' => '(Mac) App Store',
	'chromewebstore' => 'Chrome Web Store',
	'firefoxaddon' => 'Firefox Erweiterungen',
	'firefoxmarketplace' => 'Firefox Marketplace',
	'goodoldgames' => 'Good Old Games (GOG.com)',
	'googleplay' => 'Google Play Apps',
	'operaaddons' => 'Opera Add-ons',
	'steam' => 'Steam',
	'windowsstore' => 'Windows Store',
	'wordpress' => 'WordPress Plugins',
	'xda' => 'XDA Labs'
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
	'cacheTime' => intval( '600' ),
	'disableAutoCache' => false,
	'disableCache' => false,
	'imageCache' => false,
	'nofollow' => true,
	'targetBlank' => true,
	'showRating' => intval( '1' ),
	'colorfulIcons' => false,
	'showReload' => true,
	'downloadCaption' => __('Download', 'wp-appbox'),
	'disableCSS' => false,
	'disableFonts' => false,
	'disableDefer' => false,
	'eOnlyAuthors' => false,
	'eOutput' => false,
	'eImageApple' => false,
	'iTunesGeo' => true,
	'curlTimeout' => intval( '5' ),
	'userAffiliate' => false,
	'affiliateApple' => false,
	'affiliateAppleID' => '',
	'affiliateAmazon' => false,
	'affiliateAmazonID' => '',
	'affiliateMicrosoft' => false,
	'affiliateMicrosoftID' => '',
	'affiliateMicrosoftProgram' => '',
	'defaultStyle' => intval( '1' ),
	'defaultButton' => intval( '0' ),
	'sslAppleImages' => false,
	'autoLinks' => false
);


?>