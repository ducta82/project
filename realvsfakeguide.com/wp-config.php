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
define('DB_NAME', 'realvsfakeguide');

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
define('AUTH_KEY',         '44eCKpItfoa ~tw%n]-5*~zV<TS&]1XZOH+Q=tL)PIC<vi}ddT48c$wNNE<[MfI%');
define('SECURE_AUTH_KEY',  '=-!I6YhJSD?I|WYaI.f9`|$uacn%927^`#EzT&wFv/#;cr{|tg$}7Dkz[{|Vr11P');
define('LOGGED_IN_KEY',    'W8O1J)Cp89<]pYCa&}%U9~)7.%(Q_#F`|~AT3~b>TVTj}>fC.!V[P?=#%B.H5Aj7');
define('NONCE_KEY',        '!aozb}<^Ur-g(iS&v|lXj.YNe}_Exo2V8cf9it-3AnhLzuoD0 <OlrPE7vARZwk6');
define('AUTH_SALT',        'aEH!!!vLn|;%w27Z&H>lZ;s+Y,0xEe+Z;Xm-|IXV!F}fU-Ba2<{>A]g7Gnz;5IZC');
define('SECURE_AUTH_SALT', 'd9h%rG7?S#~izJ 3sgmGIZEp:*X5tktI u-K)YLf(2$gwdC>MDIT*=zdMy2+;/.t');
define('LOGGED_IN_SALT',   '8ix^Is88|x@LD9o-ZO9[l8r||Xq(~h;wv[|}t-1wK<. -BmOgJT/=(#WiEFsCi` ');
define('NONCE_SALT',       'rhf(gaUR,Re)p+b:bC.&.D)504Gd!!Nk0j{~[,{Q;c)nT_izl9|eD,hZM[,qqMF[');

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
