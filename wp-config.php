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
define( 'DB_NAME', 'ai' );

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
define( 'AUTH_KEY',         '}1>6 ,WPx_pje.V1`!1[c0H S|1Of.bBo~zh}anu:Dpp+Slv~)o1s>^,=fkN{HA@' );
define( 'SECURE_AUTH_KEY',  'F(sR?E}mdk`%n#!o_JyBkJTao*p95F36!%[JW~e}j?f()-1?zOxz^Bf+uu5egT3>' );
define( 'LOGGED_IN_KEY',    '>tbEQ0I-vmC/~toG;%alPY*9cO3-U+V5Sy,GNpkm6>yL#KpRsCBYlKI-]h zRhXZ' );
define( 'NONCE_KEY',        '7&Ppv;iHw>$.3]NG@5g_NH_+~0cJ@;;.U#kuZ3/}G.u_GsQO7CP`,UrfEOCW;Z o' );
define( 'AUTH_SALT',        '7K_#c|A&GA5&5eja{A/A!#Z:<;n@Ir.W!|io$oxYa)H&20ZHT7>N~``tt~=_mYVe' );
define( 'SECURE_AUTH_SALT', '?&&Si1zyO?jLV=9TL>oOVSnO@MVMu{Kf{vS`(S&phw!f.D,K8uyF)YgSK/8&sB-S' );
define( 'LOGGED_IN_SALT',   'LoA64LVv@8{&$$t[R!3eBO:Ya:{MJ*9#$p+9x8x4~rKjtNmdlt#d:v,0H=|M0:+t' );
define( 'NONCE_SALT',       ']g/k3CVtp }u*S%g2sUZnYT&]By1J;ix)c~#i#f$3)(Oz-|>D@+fee`DNcg0t@Pj' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_5';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
