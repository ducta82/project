<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'procfo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'n1xZaAc_^+L)MCU*-(K[$kVJlKqohRO3CyLp+By~#}[{Cx5fMdbBf$c@}R<7o?s+');
define('SECURE_AUTH_KEY',  'G w?f5bxzSL8:t?v/oRPm-+pyX0j@nnlLqoGM0_@pjf|-jl;W{SG.zS7dX3Jy6=!');
define('LOGGED_IN_KEY',    'CtP+6(4N$Q~D3C1L=;^JBys039I1e6@9z9 yuLUIO]6A``5V5v^F ~&I=o*QV1yS');
define('NONCE_KEY',        'ZY.k+63muk7UJTLYSS8YE;2k17` U?yEUQ@W,>0:kObK=[qWEn[aC-Y}cD8S8qPQ');
define('AUTH_SALT',        '46-%DCN;|F<.aDm|Qm44DR+a+gBn=[+-):*xa,|/GcvG*},g]c+S.|xaC!M7I|Q5');
define('SECURE_AUTH_SALT', 'Bye_ddd-M2yK}C32pPTuz(H)c3LZT26Efq}w|}AsJn;7c>w^~e] A7vcL3ardgs?');
define('LOGGED_IN_SALT',   'yYCG=uC,m>B3iiZcR}Hj}+tY8CVl*TpXee+&slD52E-)+1=8ft~=|r[C8jM2zU1{');
define('NONCE_SALT',       'LHX=UNtVNn&3JDuGF({U$`2v&Be-0TMH-dW+`{_s|_^/:>Qj;Ctaq!--2^ |8fHH');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
