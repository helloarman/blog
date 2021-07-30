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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'git_blog' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_-wQ ?.Om<MypnIW]4J7wSd(vz;d6u@Te&w5j{vcPsxVZlmMMrK}C?yQ|ClG@|eF' );
define( 'SECURE_AUTH_KEY',  'u:=bk?&PaL7fr=#SzhW ODb^;%j&Bq(Qh%j(h3*-qF]Z>=~Q}oZ 2Aj+Pd=Kf7!@' );
define( 'LOGGED_IN_KEY',    '#N_q]A8TE,ZPqG6P]kByo`U);+i<5$8E<&C+I7e LpnP;XZaIe#O[Q+]Pul1.R<b' );
define( 'NONCE_KEY',        '45Eye0Yg}RsU3v}*-L3{OP5F ( /_[3$[U*oV/)5E$0{<KdZjX3-R3;)6QW`]unt' );
define( 'AUTH_SALT',        'nB,(>Cl=<[xC~x:[C,[@S9*-.dXlm|5Zg_-;#^B@1{WL/3=e}?&5W8n+nnYPm+IK' );
define( 'SECURE_AUTH_SALT', 'ZMaT7XkR^`6>I#3N0<Yw+U6Kg<C;y#{i`_Br J@;&;6VlE&r>nXQtv8;Em!/ODAy' );
define( 'LOGGED_IN_SALT',   'D^G |((~T[6wG1B$mM.6`;1zEmYO1m[da;F}[FWuOVv&-T$Ai6q )o!nvtRk_|9@' );
define( 'NONCE_SALT',       '*I(Xc]8FK`5V(6&$o(7(Z{]PBO-3`zK`3z{BJ}Ml3]0V2JsQ^?>p8aM(H |Rm+Y3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
