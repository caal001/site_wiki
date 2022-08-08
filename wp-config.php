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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'site_wiki' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'm;5k#.[scD)gC|Q&HWfUg/f$vt )% -kkQArM_[JL5~T(fITXIW*lemGqieZh:|n' );
define( 'SECURE_AUTH_KEY',  '1F`:W#,>K=FDg9EAiE_Cv=M.-Y52P0C(iSe&C>&]i$}_j@7X/Q=A`c,mPYn9!GOH' );
define( 'LOGGED_IN_KEY',    '^8ja4L6`q:qYQ^<)>^QxC#Szi[5EUl jBa``=&.p-,nC_|Eu3tRO_hJw:q#}a/i~' );
define( 'NONCE_KEY',        'NImLo#n97bkbl1CI18VQ0T^T/k)ut^:?QV[=-BOjNCCin[HLE.0<R1yyOFM4.|0g' );
define( 'AUTH_SALT',        '>:c-7+AQq;,DFCD+LkD<Z*L(Ne6L`~H?_;#}Y0frb4q)543fQ,pi}V$8hBZDQF8R' );
define( 'SECURE_AUTH_SALT', '!<OBF}BGJgFjFh!jM@f:fgbU{rE}5[>%D0mpp;%+WjD/}oE(IdvAtKP eoddk{PX' );
define( 'LOGGED_IN_SALT',   '`UBP}CX^U%~9Dm}`42T88h^u$g1/wwylB%kbVa,~*Ku<FaXpbn(dyrHR6iytK$,m' );
define( 'NONCE_SALT',       '@](cmF$wM@)Qk{X&hj.t{s #3$[pp Sj:x`:5y}=e]_;*$qT.!Bj*kTk[T)dftO#' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
