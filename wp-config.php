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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '=>SjkK-TAh?UUd-P7g&]H[td;t=PvIGH(AS2<x1(aT0B#NV^pEE``hD3FH]$07~[' );
define( 'SECURE_AUTH_KEY',   'T1ru[{phk8<pOKM|_EZ}.z^:d-qo[D!?)R{0KX(bwdD;`J<qImw~Bs0CZnw3)r79' );
define( 'LOGGED_IN_KEY',     '[YZZ< ba0yaka4(=a<A()%/daze?;m_7{_@ehQsJIm]*Ifnca>!V9T-@EHB:vZo2' );
define( 'NONCE_KEY',         'pU|5?][I vCDEA/NG(NBhpYcEq`$GjB6GWG^p|@!F>AKc5_No9$3?(6QcSYpqvAI' );
define( 'AUTH_SALT',         '7Jm{B?mDy%M7RTzq3!K?q81~$6b/&q@S|p]]c^c_K)l1p(N/XP`kxbQff#jPKp|_' );
define( 'SECURE_AUTH_SALT',  'Ht%((D3r$lHEg`W?(f(4 <Rk((tjyLbdpZ+[g>QZnOgAjG1ZuWy)k2Zuk;XFso9?' );
define( 'LOGGED_IN_SALT',    'SBY3)U^V.Bf8/$K<syl6l(uzns+q_@lbIa>vbGml)C3!HMGR$CX/mR],=(u$A{kn' );
define( 'NONCE_SALT',        'z:+N)X+EodT_(^[Kyb<S81(dFe>4 H$0.m~T=25oL^6[ikxNu(l]7d;aR~1{^SX?' );
define( 'WP_CACHE_KEY_SALT', 'KZ{Qa >b[t>K2c7W)8K&jTSm!lDlyc?t;DT-Ww#i16E!e*2^iH xwcu}l`V_qRza' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
