<?php
/**
 * Theme Name: Nerally Blog Theme
 * Description: Custom WordPress theme για το blog section του Nerally website
 * Version: 1.0.0
 * Author: Nerally Team
 * Text Domain: nerally
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function nerally_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));
    
    // Add custom image sizes
    add_image_size('article-thumbnail', 400, 250, true);
    add_image_size('article-featured', 800, 400, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'nerally'),
        'footer' => __('Footer Navigation', 'nerally')
    ));
}
add_action('after_setup_theme', 'nerally_theme_setup');

// Enqueue styles and scripts
function nerally_theme_scripts() {
    // Main site CSS (shared)
    wp_enqueue_style('nerally-main', get_template_directory_uri() . '/../../css/main.css');
    wp_enqueue_style('nerally-components', get_template_directory_uri() . '/../../css/components.css');
    wp_enqueue_style('nerally-legal-modal', get_template_directory_uri() . '/../../css/legal-modal.css');
    
    // Theme specific CSS
    wp_enqueue_style('nerally-theme', get_stylesheet_uri());
    wp_enqueue_style('nerally-blog', get_template_directory_uri() . '/css/blog.css');
    
    // Scripts
    wp_enqueue_script('nerally-main', get_template_directory_uri() . '/../../app.js', array(), '1.0.0', true);
    wp_enqueue_script('nerally-legal-modal', get_template_directory_uri() . '/../../js/legal-modal.js', array(), '1.0.0', true);
    
    // WordPress default scripts
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'nerally_theme_scripts');

// Custom post types
function nerally_custom_post_types() {
    // Articles Post Type
    register_post_type('article', array(
        'labels' => array(
            'name' => 'Άρθρα',
            'singular_name' => 'Άρθρο',
            'add_new' => 'Προσθήκη Άρθρου',
            'add_new_item' => 'Προσθήκη Νέου Άρθρου',
            'edit_item' => 'Επεξεργασία Άρθρου',
            'new_item' => 'Νέο Άρθρο',
            'view_item' => 'Προβολή Άρθρου',
            'search_items' => 'Αναζήτηση Άρθρων',
            'not_found' => 'Δεν βρέθηκαν άρθρα',
            'not_found_in_trash' => 'Δεν βρέθηκαν άρθρα στον κάδο'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-admin-post',
        'show_in_rest' => true
    ));
    
    // Guides Post Type
    register_post_type('guide', array(
        'labels' => array(
            'name' => 'Οδηγοί',
            'singular_name' => 'Οδηγός',
            'add_new' => 'Προσθήκη Οδηγού',
            'add_new_item' => 'Προσθήκη Νέου Οδηγού',
            'edit_item' => 'Επεξεργασία Οδηγού',
            'new_item' => 'Νέος Οδηγός',
            'view_item' => 'Προβολή Οδηγού',
            'search_items' => 'Αναζήτηση Οδηγών',
            'not_found' => 'Δεν βρέθηκαν οδηγοί',
            'not_found_in_trash' => 'Δεν βρέθηκαν οδηγοί στον κάδο'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-book',
        'show_in_rest' => true
    ));
}
add_action('init', 'nerally_custom_post_types');

// Custom taxonomies
function nerally_custom_taxonomies() {
    // Categories
    register_taxonomy('article_category', array('article', 'guide'), array(
        'labels' => array(
            'name' => 'Κατηγορίες',
            'singular_name' => 'Κατηγορία',
            'search_items' => 'Αναζήτηση Κατηγοριών',
            'all_items' => 'Όλες οι Κατηγορίες',
            'parent_item' => 'Γονική Κατηγορία',
            'parent_item_colon' => 'Γονική Κατηγορία:',
            'edit_item' => 'Επεξεργασία Κατηγορίας',
            'update_item' => 'Ενημέρωση Κατηγορίας',
            'add_new_item' => 'Προσθήκη Νέας Κατηγορίας',
            'new_item_name' => 'Όνομα Νέας Κατηγορίας',
            'menu_name' => 'Κατηγορίες'
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'category'),
        'show_in_rest' => true
    ));
    
    // Difficulty Level
    register_taxonomy('difficulty', array('article', 'guide'), array(
        'labels' => array(
            'name' => 'Επίπεδο Δυσκολίας',
            'singular_name' => 'Επίπεδο',
            'menu_name' => 'Επίπεδο Δυσκολίας'
        ),
        'hierarchical' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'difficulty'),
        'show_in_rest' => true
    ));
}
add_action('init', 'nerally_custom_taxonomies');

// Add custom meta boxes
function nerally_add_meta_boxes() {
    add_meta_box(
        'nerally-seo',
        'SEO Settings',
        'nerally_seo_meta_box_callback',
        array('article', 'guide'),
        'normal',
        'high'
    );
    
    add_meta_box(
        'nerally-reading-time',
        'Reading Time',
        'nerally_reading_time_meta_box_callback',
        array('article', 'guide'),
        'side'
    );
}
add_action('add_meta_boxes', 'nerally_add_meta_boxes');

// SEO Meta Box Callback
function nerally_seo_meta_box_callback($post) {
    wp_nonce_field('nerally_save_meta_box_data', 'nerally_meta_box_nonce');
    
    $seo_title = get_post_meta($post->ID, '_nerally_seo_title', true);
    $seo_description = get_post_meta($post->ID, '_nerally_seo_description', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="nerally_seo_title">SEO Title:</label></th>';
    echo '<td><input type="text" id="nerally_seo_title" name="nerally_seo_title" value="' . esc_attr($seo_title) . '" size="50" /></td></tr>';
    echo '<tr><th><label for="nerally_seo_description">SEO Description:</label></th>';
    echo '<td><textarea id="nerally_seo_description" name="nerally_seo_description" rows="3" cols="50">' . esc_textarea($seo_description) . '</textarea></td></tr>';
    echo '</table>';
}

// Reading Time Meta Box Callback
function nerally_reading_time_meta_box_callback($post) {
    $reading_time = get_post_meta($post->ID, '_nerally_reading_time', true);
    echo '<label for="nerally_reading_time">Χρόνος ανάγνωσης (λεπτά):</label>';
    echo '<input type="number" id="nerally_reading_time" name="nerally_reading_time" value="' . esc_attr($reading_time) . '" size="3" />';
}

// Save custom meta box data
function nerally_save_meta_box_data($post_id) {
    if (!isset($_POST['nerally_meta_box_nonce']) || !wp_verify_nonce($_POST['nerally_meta_box_nonce'], 'nerally_save_meta_box_data')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['nerally_seo_title'])) {
        update_post_meta($post_id, '_nerally_seo_title', sanitize_text_field($_POST['nerally_seo_title']));
    }
    
    if (isset($_POST['nerally_seo_description'])) {
        update_post_meta($post_id, '_nerally_seo_description', sanitize_textarea_field($_POST['nerally_seo_description']));
    }
    
    if (isset($_POST['nerally_reading_time'])) {
        update_post_meta($post_id, '_nerally_reading_time', intval($_POST['nerally_reading_time']));
    }
}
add_action('save_post', 'nerally_save_meta_box_data');

// Custom excerpt length
function nerally_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'nerally_excerpt_length');

// Custom excerpt more
function nerally_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'nerally_excerpt_more');

// Add Nerally branding to admin
function nerally_admin_styles() {
    echo '<style>
        #wpadminbar { background: linear-gradient(135deg, #00e5ff 0%, #ff6b6b 100%) !important; }
        .wp-admin #adminmenu { background: #1a1a1a; }
    </style>';
}
add_action('admin_head', 'nerally_admin_styles');

// Create default categories on theme activation
function nerally_create_default_terms() {
    $categories = array(
        'Φορολογία' => 'Άρθρα σχετικά με φορολογικά θέματα',
        'Λογιστική' => 'Λογιστικές πρακτικές και οδηγίες',
        'Κυβερνοασφάλεια' => 'Ασφάλεια και προστασία δεδομένων',
        'Επιχορηγήσεις' => 'Πληροφορίες για επιχορηγήσεις',
        'Νομοθεσία' => 'Νομικά και κανονιστικά θέματα'
    );
    
    foreach ($categories as $name => $description) {
        if (!term_exists($name, 'article_category')) {
            wp_insert_term($name, 'article_category', array(
                'description' => $description
            ));
        }
    }
    
    $difficulties = array('Αρχάριο', 'Ενδιάμεσο', 'Προχωρημένο');
    foreach ($difficulties as $difficulty) {
        if (!term_exists($difficulty, 'difficulty')) {
            wp_insert_term($difficulty, 'difficulty');
        }
    }
}
add_action('after_switch_theme', 'nerally_create_default_terms');
?>