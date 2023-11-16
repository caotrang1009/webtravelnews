<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webtravelnews' );

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
define( 'AUTH_KEY',         'mV[:$YsWE>o[7O5Rs*@0_dKHyFn)q1y*LJNj*V1zP|;a_|_EN<y~ZJkVRh/{x6Wp' );
define( 'SECURE_AUTH_KEY',  '11qVb}xAdX}7UuG(d3[2nPH6>F@{2GZ9tvE.lLZFqD{YfE)[24w9#:q7]XBRX>r(' );
define( 'LOGGED_IN_KEY',    '*BDr3]<Jygd~YQU%^UNGaM2(rIY(&SoE,rLBZhhM+.(GiGsdJysN$66Bwbm8$%o]' );
define( 'NONCE_KEY',        'UA.t}@G<EnGe0>`e$On>IP?gcRsfMbDh.N94Nj~;&R07AgGLAVo+u0@L<N2K#F^K' );
define( 'AUTH_SALT',        ' 4meUd]=C_fU^_9Gn+/l*Xs*(M!LRG$GlM3l5y~Wy=cO2Bj;@2N#z8HzV0|cF=_3' );
define( 'SECURE_AUTH_SALT', 'pT:lZ_%Qo!R-5+6lr2%E/D)raBe6*z*)^C;/nC#_^,$i#J2XC8V%|8&|}<EE<q!d' );
define( 'LOGGED_IN_SALT',   '3Q.<wfc$Cm##9)oaZOIed-8FjQ/d&H[du])Rhpq:]c(H(-Dqxrfe7p CN0Rg~/Z=' );
define( 'NONCE_SALT',       'z4C@]mBl<V=[q.n#s0Erzr60^R$qgmyVz;``Yx:Wd#-qVFl;@Dos1.UA~Ye;wMjU' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
