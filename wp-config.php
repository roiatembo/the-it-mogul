<?php
/**
 * The base configuration for WordPress.
 *
 * This file uses the Symfony DotEnv component to load environment variables
 * and populate the configuration constants. It follows a Bedrock-style
 * architecture: WordPress core is installed into /wp, and all environment
 * specific configuration lives in the (git-ignored) .env file.
 *
 * @link https://symfony.com/doc/current/components/dotenv.html
 *
 * @package ItMogul
 */

declare( strict_types=1 );

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/wp-content/vendor/autoload.php';

/**
 * Load environment configuration.
 */
$dotenv = new Dotenv();
$dotenv->load( __DIR__ . '/.env' );

/**
 * Site config.
 */
define( 'PROJECT_NAME', $_ENV['PROJECT_NAME'] );
define( 'WP_HOME', $_ENV['WP_HOME'] );
define( 'WP_SITEURL', $_ENV['WP_HOME'] );

define( 'WP_CONTENT_URL', $_ENV['WP_HOME'] . '/wp-content' );
define( 'WP_CONTENT_DIR', __DIR__ . '/wp-content' );

define( 'WP_ENVIRONMENT_TYPE', $_ENV['WP_ENVIRONMENT_TYPE'] );

// Include core built-in themes too.
// phpcs:disable WordPress.WP.GlobalVariablesOverride.Prohibited
if ( empty( $GLOBALS['wp_theme_directories'] ) ) {
	$GLOBALS['wp_theme_directories'] = [];
}

// Register theme directory.
$GLOBALS['wp_theme_directories'][] = __DIR__ . '/wp-content/themes';
// phpcs:enable WordPress.WP.GlobalVariablesOverride.Prohibited

/**
 * DB config.
 */
define( 'DB_NAME', $_ENV['DB_NAME'] );
define( 'DB_USER', $_ENV['DB_USER'] );
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );
define( 'DB_COLLATE', $_ENV['DB_COLLATE'] );

define( 'DB_HOST', ! empty( $_ENV['DB_HOST'] ) ? $_ENV['DB_HOST'] : 'localhost' );
define( 'DB_CHARSET', ! empty( $_ENV['DB_CHARSET'] ) ? $_ENV['DB_CHARSET'] : 'utf8' );

$table_prefix = ! empty( $_ENV['DB_TABLE_PREFIX'] ) ? $_ENV['DB_TABLE_PREFIX'] : 'wp_'; //phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited,VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable

/**
 * Authentication unique keys and salts.
 *
 * These are loaded from the environment and must never be committed to Git.
 * Generate them at https://api.wordpress.org/secret-key/1.1/salt/
 */
define( 'AUTH_KEY', $_ENV['AUTH_KEY'] );
define( 'SECURE_AUTH_KEY', $_ENV['SECURE_AUTH_KEY'] );
define( 'LOGGED_IN_KEY', $_ENV['LOGGED_IN_KEY'] );
define( 'NONCE_KEY', $_ENV['NONCE_KEY'] );
define( 'AUTH_SALT', $_ENV['AUTH_SALT'] );
define( 'SECURE_AUTH_SALT', $_ENV['SECURE_AUTH_SALT'] );
define( 'LOGGED_IN_SALT', $_ENV['LOGGED_IN_SALT'] );
define( 'NONCE_SALT', $_ENV['NONCE_SALT'] );

/**
 * Debugging mode.
 */
define( 'WP_DEBUG', isset( $_ENV['WP_DEBUG'] ) ? filter_var( $_ENV['WP_DEBUG'], FILTER_VALIDATE_BOOLEAN ) : false );
define( 'WP_DEBUG_DISPLAY', isset( $_ENV['WP_DEBUG_DISPLAY'] ) ? filter_var( $_ENV['WP_DEBUG_DISPLAY'], FILTER_VALIDATE_BOOLEAN ) : false );
define( 'WP_DEBUG_LOG', isset( $_ENV['WP_DEBUG_LOG'] ) ? filter_var( $_ENV['WP_DEBUG_LOG'], FILTER_VALIDATE_BOOLEAN ) : false );
define( 'SCRIPT_DEBUG', isset( $_ENV['SCRIPT_DEBUG'] ) ? filter_var( $_ENV['SCRIPT_DEBUG'], FILTER_VALIDATE_BOOLEAN ) : false );

// Suppress deprecation notices in development (they are often from third-party plugins).
if ( WP_DEBUG && WP_ENVIRONMENT_TYPE === 'local' ) {
	error_reporting( E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED );
}

define( 'DISALLOW_FILE_EDIT', ! empty( $_ENV['DISALLOW_FILE_EDIT'] ) ? filter_var( $_ENV['DISALLOW_FILE_EDIT'], FILTER_VALIDATE_BOOLEAN ) : true );

// Enable cache by default.
define( 'WP_CACHE', ! empty( $_ENV['WP_CACHE'] ) ? filter_var( $_ENV['WP_CACHE'], FILTER_VALIDATE_BOOLEAN ) : false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/wp/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
