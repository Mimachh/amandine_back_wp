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
define( 'DB_NAME', 'rzgf6652_wp110' );

/** Database username */
define( 'DB_USER', 'rzgf6652_wp110' );

/** Database password */
define( 'DB_PASSWORD', '4S2e.6O)p1' );

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
define( 'AUTH_KEY',         'szooa6iewfrs331wzqwcnjhmsnlfsporku6f8sra6kk50z7rgqvf8ic3geboji2v' );
define( 'SECURE_AUTH_KEY',  'hhngsvhkpqlrrtbgk6uurb1fxyidehn6zerbnjhb4xm4nd4dgmzun5fwvpcz3jfn' );
define( 'LOGGED_IN_KEY',    '6kldxuo0ywbntg5lwkfwyuawqsweqbjye7ajqmb6d5thptcefuw1ye21t2i7bycu' );
define( 'NONCE_KEY',        '56fnoxvzuvmywrblugzya8sjnnznufhvpjaz9qeoqyvszxaxvesklcxgejmobt9r' );
define( 'AUTH_SALT',        '6v93bqbdl6a9amzrlhjerrfzobwczcd5n0c6r0onn6nfrbxtfiplwurfsbjq6vza' );
define( 'SECURE_AUTH_SALT', 'sr1dvsrxv31hrwrghrwyeqikyt2jq5nxgoezkfrgpcmbplmwa1v5leqp9bvtlsdk' );
define( 'LOGGED_IN_SALT',   'xicjisfbee6ltsprhajsa2jkt95hc2nu0njjlcaog9eormcij5fefheiivhssft8' );
define( 'NONCE_SALT',       'lsbotcwsm3qo9jdo4hist07jcgenhufwed9loouh3ci4zvcyyd5ybo6ozmxfhcui' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpgk_';

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
