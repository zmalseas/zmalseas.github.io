<?php
/**
 * Plugin Name: Nerally Table of Contents
 * Plugin URI: https://nerally.gr
 * Description: Floating Table of Contents navigation για άρθρα με auto-detection των headings. Clean & focused - μόνο TOC functionality.
 * Version: 1.0.0
 * Author: Nerally
 * Author URI: https://nerally.gr
 * License: GPL v2 or later
 * Text Domain: nerally-toc
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Nerally_Table_Of_Contents {
    
    private static $instance = null;
    
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        // Add settings page
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        
        // Frontend functionality
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_filter('the_content', array($this, 'add_toc_to_content'), 10);
        add_filter('body_class', array($this, 'add_body_class'));
        
        // AJAX endpoint for TOC generation
        add_action('wp_ajax_generate_toc', array($this, 'ajax_generate_toc'));
        add_action('wp_ajax_nopriv_generate_toc', array($this, 'ajax_generate_toc'));
    }
    
    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        add_options_page(
            'Nerally TOC Settings',
            'Table of Contents',
            'manage_options',
            'nerally-toc-settings',
            array($this, 'settings_page')
        );
    }
    
    /**
     * Register settings
     */
    public function register_settings() {
        register_setting('nerally_toc_settings', 'nerally_toc_enabled');
        register_setting('nerally_toc_settings', 'nerally_toc_full_width');
        register_setting('nerally_toc_settings', 'nerally_toc_min_headings');
        register_setting('nerally_toc_settings', 'nerally_toc_heading_levels');
        register_setting('nerally_toc_settings', 'nerally_toc_position');
    }
    
    /**
     * Settings page
     */
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('nerally_toc_settings');
                do_settings_sections('nerally_toc_settings');
                ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">Ενεργοποίηση TOC</th>
                        <td>
                            <input type="checkbox" name="nerally_toc_enabled" value="1" <?php checked(get_option('nerally_toc_enabled'), 1); ?>>
                            <label>Ενεργοποίηση Table of Contents σε άρθρα</label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Full-Width Layout</th>
                        <td>
                            <input type="checkbox" name="nerally_toc_full_width" value="1" <?php checked(get_option('nerally_toc_full_width'), 1); ?>>
                            <label>Εμφάνιση άρθρων σε full-width (χωρίς sidebar)</label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Ελάχιστα Headings</th>
                        <td>
                            <input type="number" name="nerally_toc_min_headings" value="<?php echo esc_attr(get_option('nerally_toc_min_headings', 3)); ?>" min="1" max="10">
                            <p class="description">Ελάχιστος αριθμός headings για εμφάνιση TOC</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Επίπεδα Headings</th>
                        <td>
                            <label><input type="checkbox" name="nerally_toc_heading_levels[]" value="h2" <?php echo in_array('h2', (array)get_option('nerally_toc_heading_levels', ['h2', 'h3'])) ? 'checked' : ''; ?>> H2</label><br>
                            <label><input type="checkbox" name="nerally_toc_heading_levels[]" value="h3" <?php echo in_array('h3', (array)get_option('nerally_toc_heading_levels', ['h2', 'h3'])) ? 'checked' : ''; ?>> H3</label><br>
                            <label><input type="checkbox" name="nerally_toc_heading_levels[]" value="h4" <?php echo in_array('h4', (array)get_option('nerally_toc_heading_levels', ['h2', 'h3'])) ? 'checked' : ''; ?>> H4</label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Θέση TOC</th>
                        <td>
                            <select name="nerally_toc_position">
                                <option value="right" <?php selected(get_option('nerally_toc_position', 'right'), 'right'); ?>>Δεξιά (δίπλα από scrollbar)</option>
                                <option value="left" <?php selected(get_option('nerally_toc_position', 'right'), 'left'); ?>>Αριστερά</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
    
    /**
     * Enqueue scripts and styles
     */
    public function enqueue_scripts() {
        if (!is_single() || !get_option('nerally_toc_enabled')) {
            return;
        }
        
        wp_enqueue_style(
            'nerally-toc-style',
            plugin_dir_url(__FILE__) . 'assets/toc-style.css',
            array(),
            '1.0.0'
        );
        
        wp_enqueue_script(
            'nerally-toc-script',
            plugin_dir_url(__FILE__) . 'assets/toc-script.js',
            array('jquery'),
            '1.0.0',
            true
        );
        
        wp_localize_script('nerally-toc-script', 'nerallyTOC', array(
            'position' => get_option('nerally_toc_position', 'right'),
            'headingLevels' => get_option('nerally_toc_heading_levels', ['h2', 'h3'])
        ));
    }
    
    /**
     * Add TOC to content
     */
    public function add_toc_to_content($content) {
        // Default to enabled if option not set
        $enabled = get_option('nerally_toc_enabled');
        if ($enabled === false) {
            $enabled = true; // Default to enabled
        }
        
        if (!is_single() || !$enabled) {
            return $content;
        }
        
        // Extract headings
        $headings = $this->extract_headings($content);
        $min_headings = get_option('nerally_toc_min_headings', 3);
        
        if (count($headings) < $min_headings) {
            return $content;
        }
        
        // Add IDs to headings
        $content = $this->add_heading_ids($content, $headings);
        
        return $content;
    }
    
    /**
     * Extract headings from content
     */
    private function extract_headings($content) {
        $headings = array();
        $levels = get_option('nerally_toc_heading_levels', ['h2', 'h3']);
        $pattern = '/<(' . implode('|', $levels) . ')[^>]*>(.*?)<\/\1>/i';
        
        if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $headings[] = array(
                    'level' => strtolower($match[1]),
                    'text' => strip_tags($match[2]),
                    'id' => sanitize_title($match[2])
                );
            }
        }
        
        return $headings;
    }
    
    /**
     * Add IDs to headings
     */
    private function add_heading_ids($content, $headings) {
        foreach ($headings as $heading) {
            // Match the heading tag with any content inside (including HTML tags)
            // Pattern matches: <h2>, <h2 class="...">, etc.
            $pattern = '/<' . $heading['level'] . '(\s[^>]*)?>(.*?)<\/' . $heading['level'] . '>/is';
            
            // Use a callback to check if this is the right heading
            $heading_text = $heading['text'];
            $heading_id = $heading['id'];
            
            $content = preg_replace_callback($pattern, function($matches) use ($heading_text, $heading_id, $heading) {
                // Strip tags from the matched content to compare
                $matched_text = strip_tags($matches[2]);
                
                if (trim($matched_text) === trim($heading_text)) {
                    // Check if ID already exists
                    if (!empty($matches[1]) && strpos($matches[1], 'id=') !== false) {
                        return $matches[0]; // Already has an ID, skip
                    }
                    
                    // Add the ID attribute
                    $attributes = !empty($matches[1]) ? $matches[1] : '';
                    return '<' . $heading['level'] . $attributes . ' id="' . $heading_id . '">' . $matches[2] . '</' . $heading['level'] . '>';
                }
                
                return $matches[0]; // Not the right heading, return unchanged
            }, $content, 1); // Replace only the first match
        }
        
        return $content;
    }
    
    /**
     * Add body class for full-width layout
     */
    public function add_body_class($classes) {
        if (is_single() && get_option('nerally_toc_full_width')) {
            $classes[] = 'nerally-toc-full-width';
        }
        return $classes;
    }
    
    /**
     * AJAX: Generate TOC
     */
    public function ajax_generate_toc() {
        check_ajax_referer('nerally_toc_nonce', 'nonce');
        
        $post_id = intval($_POST['post_id']);
        $post = get_post($post_id);
        
        if (!$post) {
            wp_send_json_error('Post not found');
        }
        
        $headings = $this->extract_headings($post->post_content);
        wp_send_json_success($headings);
    }
}

// Initialize plugin
Nerally_Table_Of_Contents::get_instance();

// Add TOC widget to footer
add_action('wp_footer', function() {
    if (!is_single() || !get_option('nerally_toc_enabled')) {
        return;
    }
    
    global $post;
    $toc_instance = Nerally_Table_Of_Contents::get_instance();
    $reflection = new ReflectionClass($toc_instance);
    $method = $reflection->getMethod('extract_headings');
    $method->setAccessible(true);
    $headings = $method->invoke($toc_instance, $post->post_content);
    
    $min_headings = get_option('nerally_toc_min_headings', 3);
    if (count($headings) < $min_headings) {
        return;
    }
    
    $position = get_option('nerally_toc_position', 'right');
    ?>
    <!-- Floating TOC Navigation -->
    <div id="nerally-toc-floating" class="nerally-toc-<?php echo esc_attr($position); ?>">
        <button id="nerally-toc-toggle" aria-label="Table of Contents" aria-expanded="false">
            <span class="toc-dots">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </span>
        </button>
        <div id="nerally-toc-panel" class="toc-panel">
            <div class="toc-header">Jump to:</div>
            <ul class="toc-list">
                <?php foreach ($headings as $heading): ?>
                    <li class="toc-item toc-<?php echo esc_attr($heading['level']); ?>">
                        <a href="#<?php echo esc_attr($heading['id']); ?>">
                            <?php echo esc_html($heading['text']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php
});

