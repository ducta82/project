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
define('DB_NAME', 'vegvalley');

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
define('AUTH_KEY',         '(s6|j>+pX6RC_ =+%:[K x$CaHM/!nz6;Zc!I@nR$Eu(?qY-KlH:-bOv9@n21*AI');
define('SECURE_AUTH_KEY',  '^B-o>4pOakXe7`#plu=TgA!CIys3yYjo^fVNOFW-fE^ n[4?3jxrUuD81y>XIUh7');
define('LOGGED_IN_KEY',    '+-(j!iuoKk~[+uV?]T,`%GUj|Pk-n9ZpvE(%ym*d$_sn<vTY&sPP~kN8cmJ ~$J{');
define('NONCE_KEY',        '?xOn!o]swJhoswjsD8~[5#rx@2Xf@|PU%Vn j-&sxn<k%{R2@[!]-lTg/Uh7 IRH');
define('AUTH_SALT',        'm6Dd$I?]7n[Ax<ifb,!F+U}[UY=+h;fnmTV$:cidQ&>lQwOv>r]py apNP<vQXV>');
define('SECURE_AUTH_SALT', '2s|bZpm [`-s4GyX]B-bzSYm_HHA bQupVCUxEi@euXa]Q+wE_:x0P.+GMP2b5{k');
define('LOGGED_IN_SALT',   '3q&]pUi6|73-Xk+v+U5?y?8y{0rLs[-Ch@3/$OsC-{c:}he6]|v.pTu4KnhQd@Uc');
define('NONCE_SALT',       'C-ErrorL#DC LOBM_H5]6&:vH_9MC;|akN1+LUKFpg+ X<sAxYldRDl.J-2xnuCr');

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
