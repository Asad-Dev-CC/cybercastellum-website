<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'stage-cybercastellum' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`BBv;ZkQ0KkVIrO1jSU@_aBdJ8X.W t2X!nDX1]W^6Eo/.)OQkSXa{S%q7tV0s1+' );
define( 'SECURE_AUTH_KEY',  'SD4Wbh`=v.?yu(W3Jr3_mC8)_;MK<2Y}a*Ro44kv!,=XOlafZi:IHn2#{#D*+pC.' );
define( 'LOGGED_IN_KEY',    '<{4Pk{)p{)${sP<*HClG{S#-P40OWWPH>CUMAdEES9jWi:>feK(QSCzK>uDqOQWX' );
define( 'NONCE_KEY',        'y1?m,^$*-.Zec,75+*yT9`>>>wtZXv?&u]v-99xmc(2*GznX( QJ#y:l]zT*Ft5M' );
define( 'AUTH_SALT',        '=qfURXzhw<6^>GS+UUN-A)E[W0?l`Wn;Ou^MMQ@mq3J2GB%-LA5#%J}L<y}wF&=n' );
define( 'SECURE_AUTH_SALT', '3SQ^LA:K=Sz92m9R{dW_]v%W<?P=8z1}V NGF3zyhrc.0a>!D^YvB[pDmcC`x@,?' );
define( 'LOGGED_IN_SALT',   '(d#QL6QSCnyoCcU]MxJ-I:I;aD>PIxD]U)P+12&[,nJ7EsY7g^W}ZE)7nqt85_b%' );
define( 'NONCE_SALT',       'Fm-a?{BiKrT%.>@:i8zy.RzLzqnID9+El1L+5y:6w:(c*M+>YSX:)AOmT+0NVC_6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
