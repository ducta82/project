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
define('DB_NAME', 'gameworld_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'J;akczSYb/l1>y0kyzochD,EqYAFawgNFcyQ_yZLtW.^vE4#{U)$IM*A[GOg0Yh(');
define('SECURE_AUTH_KEY',  'CXvx&&{91LJ@J]M#xJL*~h>SPak.}DQQX8Q-iU9QOzS.Mzl?s]tRZ$}T*X4/WAxi');
define('LOGGED_IN_KEY',    'VJOHn]aI~P1IE:BN1^r_KO(KymzpdO@&0]/RNQ$??%sl$&&gyd`v^I_m7fc:JAR_');
define('NONCE_KEY',        '#rUkX/7%URd&uVFF4kr-bN}X)~eQ9.|NWX:0D87&}!X]jl&w;*!i?T`@t|?F38G]');
define('AUTH_SALT',        'H{YQa;{e<)S5weh.pPxLQ=l^2m6aWaoV9Skqs)L(ChUS;93kgUXLD,pO0Pu^kO`(');
define('SECURE_AUTH_SALT', 'w]38;1,l*iClG$%<v)Do=i_eT2pBDBKwOkjD;1 :AE!}$|^(RDE@^VpPf`tBuu1m');
define('LOGGED_IN_SALT',   'P-m0:S-XRwM W]fkF!dyQ1/p9qZkzXSx(3U?+VS?XPjOyd^kOfWkXDo|Iw_eG5OS');
define('NONCE_SALT',       '*v`=2rGT4:H2rZ0j2B#!Z]/&|!Tu#*dpIu/HG7%61Y^e-({-vk>^.,:/P./BL><W');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
