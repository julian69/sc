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
define('DB_NAME', 'salecaravana');

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
define('AUTH_KEY',         'S-QV$/e1xF|fi(eSP+a0rw_|AwG-pkF1Cge=/w8cpg:]hb)[S4g{oDt tN&=o9+b');
define('SECURE_AUTH_KEY',  'g?9yu+EEeoB#TdM*k/]Flh_Qw0hlJP>XTcB#J[f7DjVM-7g9~2D.HNpBbvDa||Z3');
define('LOGGED_IN_KEY',    'tO}6-QuI4xIG ;{pk#mb%hkGPC&=S1{J:&qsjBT?Tn#ga>$0x-LR+3LL7+?e>xmf');
define('NONCE_KEY',        'DPUt;d[WYCPY@V^e@Z+aLr`eGMO&%<>nE >igjS97F ;&[ZIJET802ScaX6%F$GA');
define('AUTH_SALT',        '~b+Efn~9+MI-ssdiSt6|m[;QfW1QrVStv)y|7VQmk Q|S;#nY`4w|Qiu5n0Gf]z*');
define('SECURE_AUTH_SALT', '7^<f0Q)6ur9sM0&_GM)-U45-q$8iV{V!8hH_nHZWl%&(X[3fIW(;b{$xP-UBmf x');
define('LOGGED_IN_SALT',   '+}3d}0t5uN_0+3y8  vQmM&yy~JLR~LvyP#KWPd.[#S@v+I/~sBfo~3>*TJ=e.Lf');
define('NONCE_SALT',       '0qZTp+,/59|=d,8al5+NH}T: ,EkYKd,3.FMJ0}}RD(mFIEXZsSFajo|-@/mIKDJ');

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
