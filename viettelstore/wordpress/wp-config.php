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
define('DB_NAME', 'phonestore');

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
define('AUTH_KEY',         '9^3b:a4>&,@AHz_& rrxP,N=VlHo%l&Gr=Y05N?cy,PcMvNkS>yy,G! Lqj|64|f');
define('SECURE_AUTH_KEY',  ',nzU=c3:k[W/U3jeQY)FmRxmAD@!|`?k7R9U`]-9K<;YbL2x3N#}7.Rl5lxH%XU-');
define('LOGGED_IN_KEY',    'm2y5&sDz2hige?RCae]3VPCJs83$>VM0k@i06b(!-AFI^{*l%v|(2qE$$JayC3>t');
define('NONCE_KEY',        '4P^$^r$W{YeWG,?}a4&nLH6s+CkDqnL vMj_-)TF@<Sx=yr_mpR$QKcy2Alwk{g_');
define('AUTH_SALT',        '@QN1O!<ei*TPM:^CIkD$d{W[o1D E2(Fj?@S}77X.Sv&gFIx#f?+(iQF2DiM0W17');
define('SECURE_AUTH_SALT', 'g,p%@A(8luPx>RrLuAGVL{g$1RoUK{*I ~>hct+JdP_Ql|C5j@`(x:T z<2508?y');
define('LOGGED_IN_SALT',   'j<s]Yg(icI=*{W=B^xCR2|{f//i+[H=4aou6iw* >c9s)Yt,-e$|k4/#E&u{o-Xt');
define('NONCE_SALT',       '/OYUjU#u47@f~NYT)1+/]R0.nO>ZjafsMT{-HDNU|,%R~A1OUyl__E|ZI!Fb(Tv$');

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
