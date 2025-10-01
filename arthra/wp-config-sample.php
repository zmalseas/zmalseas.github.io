<?php
/**
 * WordPress Configuration για Nerally Blog
 * 
 * ΣΗΜΑΝΤΙΚΟ: Αυτό είναι ένα template αρχείο. Πριν τη χρήση:
 * 1. Αντικαταστήστε τις βάσεις δεδομένων και κωδικούς
 * 2. Δημιουργήστε unique authentication keys
 * 3. Ρυθμίστε τα paths σύμφωνα με το hosting environment
 */

// ** Ρυθμίσεις MySQL - Λάβετε αυτές τις πληροφορίες από τον hosting provider ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nerally_blog' );

/** Database username */
define( 'DB_USER', 'nerally_user' );

/** Database password */
define( 'DB_PASSWORD', 'STRONG_PASSWORD_HERE' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 * 
 * Αλλάξτε αυτά στα δικά σας unique phrases!
 * Μπορείτε να δημιουργήσετε τα κλειδιά από το: https://api.wordpress.org/secret-key/1.1/salt/
 */
define( 'AUTH_KEY',         'βάλτε το unique phrase σας εδώ' );
define( 'SECURE_AUTH_KEY',  'βάλτε το unique phrase σας εδώ' );
define( 'LOGGED_IN_KEY',    'βάλτε το unique phrase σας εδώ' );
define( 'NONCE_KEY',        'βάλτε το unique phrase σας εδώ' );
define( 'AUTH_SALT',        'βάλτε το unique phrase σας εδώ' );
define( 'SECURE_AUTH_SALT', 'βάλτε το unique phrase σας εδώ' );
define( 'LOGGED_IN_SALT',   'βάλτε το unique phrase σας εδώ' );
define( 'NONCE_SALT',       'βάλτε το unique phrase σας εδώ' );

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_arthra_';

/**
 * For developers: WordPress debugging mode.
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

/**
 * Custom WordPress Settings για Nerally Integration
 */

// Custom content directory
define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content' );
define( 'WP_CONTENT_URL', 'https://nerally.gr/arthra/wp-content' );

// Disable file editing από το admin
define( 'DISALLOW_FILE_EDIT', true );

// Increase memory limit
define( 'WP_MEMORY_LIMIT', '256M' );

// Auto updates
define( 'WP_AUTO_UPDATE_CORE', true );

// Security settings
define( 'FORCE_SSL_ADMIN', true );

// Caching
define( 'WP_CACHE', true );

/**
 * Integration με Nerally Main Site
 */

// Shared resources path
define( 'NERALLY_MAIN_SITE_PATH', dirname(__FILE__) . '/..' );
define( 'NERALLY_MAIN_SITE_URL', 'https://nerally.gr' );

// SEO Settings
define( 'WPSEO_PRIMARY_CATEGORY', true );

/**
 * Custom constants για theme
 */
define( 'NERALLY_THEME_VERSION', '1.0.0' );
define( 'NERALLY_BRAND_COLOR', '#00e5ff' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
?>