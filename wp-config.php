<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'javarista');

/** MySQL database username */
define('DB_USER', 'art405');

/** MySQL database password */
define('DB_PASSWORD', 'javascript00admi');

/** MySQL hostname */
define('DB_HOST', 'javarista.ch2jxgpolnlr.us-west-2.rds.amazonaws.com');

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
define('AUTH_KEY',         '--<QI}ckc.(]5(AfUX8~qb/71yX.efv.+9+lzFal>Zy|UtP$|ju8?hvRw5jRr_z~');
define('SECURE_AUTH_KEY',  'l;mlfsJ+RQIn0U{apEDMf,Tye4DB&?D&J)I:>LT9L(dIn|#x/vx+F;_;!kKafKv?');
define('LOGGED_IN_KEY',    'un6NbboDaE+F$YN@M3AH[R+)Q7!%fOmU%#td/ktQog7ew)~R~ o5Kk@NFGiu}$t$');
define('NONCE_KEY',        '3{+}iikpnNk.<n5[*a,zmATEqOisoq~9dsrGo<s[MTNK@hYZ#Ih:-F^k#g9DjWTi');
define('AUTH_SALT',        'ffVra`kasp81I2:B-rd=QWDy=Xw]=kvgvO7*US~6|5 qr|@.HAmWGl+zR-Y,qcJ`');
define('SECURE_AUTH_SALT', '%F04{/:Ryo_mB RYrmhL{RL*p)SrVmwf}.1fYYS,iWjx#<Wl[+F+mW7+BIVs-Ycd');
define('LOGGED_IN_SALT',   '3Y*(9[5-:=.-=A}p-%Z6-g9GI-FDTnet*.9AAp18RSshSB1k1uEBu=PDzA.a~P$.');
define('NONCE_SALT',       ')?z}0c&(-PFspvf9gD~30Yeev+AW(nW+<cgy`V(-Y&DhR&FJ+@wAczl4p|,v|$q{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
