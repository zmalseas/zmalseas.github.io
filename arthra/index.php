<?php
/**
 * WordPress Index File για Nerally Blog
 * 
 * Φορτώνει το WordPress framework και εμφανίζει την αντίστοιχη template
 */

/** Loads the WordPress Environment and Template */
define('WP_USE_THEMES', true);
require dirname(__FILE__) . '/wp-blog-header.php';
?>