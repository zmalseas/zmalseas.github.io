<?php
// Nerally Articles Theme setup and assets

if (!defined('ABSPATH')) { exit; }

add_action('after_setup_theme', function(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
  
  // Add custom image sizes for article featured images
  add_image_size('article-hero', 1200, 600, true); // Hero image for articles
  add_image_size('article-thumbnail', 400, 250, true); // Thumbnail for listings
});

// Add custom meta fields for articles
add_action('add_meta_boxes', function(){
  add_meta_box(
    'nerally_article_meta',
    'Πληροφορίες Άρθρου',
    'nerally_article_meta_callback',
    'post',
    'normal',
    'high'
  );
});

function nerally_article_meta_callback($post) {
  wp_nonce_field('nerally_article_meta_nonce', 'nerally_article_meta_nonce_field');
  
  $category = get_post_meta($post->ID, '_nerally_category', true);
  $subcategory = get_post_meta($post->ID, '_nerally_subcategory', true);
  $author_tag = get_post_meta($post->ID, '_nerally_author_tag', true);
  
  echo '<table class="form-table">';
  echo '<tr><th><label for="nerally_category">Κατηγορία:</label></th>';
  echo '<td><select name="nerally_category" id="nerally_category">';
  echo '<option value="">Επιλέξτε κατηγορία</option>';
  $categories = ['Οικονομικά', 'Φορολογία', 'Νομοθεσία', 'Τεχνολογία', 'Επιχειρήσεις'];
  foreach($categories as $cat) {
    $selected = ($category == $cat) ? 'selected' : '';
    echo '<option value="' . esc_attr($cat) . '" ' . $selected . '>' . esc_html($cat) . '</option>';
  }
  echo '</select></td></tr>';
  
  echo '<tr><th><label for="nerally_subcategory">Υποκατηγορία:</label></th>';
  echo '<td><input type="text" name="nerally_subcategory" id="nerally_subcategory" value="' . esc_attr($subcategory) . '" class="regular-text" /></td></tr>';
  
  echo '<tr><th><label for="nerally_author_tag">Συντάκτης:</label></th>';
  echo '<td><input type="text" name="nerally_author_tag" id="nerally_author_tag" value="' . esc_attr($author_tag) . '" class="regular-text" /></td></tr>';
  echo '</table>';
}

// Save custom meta fields
add_action('save_post', function($post_id){
  if (!isset($_POST['nerally_article_meta_nonce_field']) || 
      !wp_verify_nonce($_POST['nerally_article_meta_nonce_field'], 'nerally_article_meta_nonce')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;
  
  if (isset($_POST['nerally_category'])) {
    update_post_meta($post_id, '_nerally_category', sanitize_text_field($_POST['nerally_category']));
  }
  if (isset($_POST['nerally_subcategory'])) {
    update_post_meta($post_id, '_nerally_subcategory', sanitize_text_field($_POST['nerally_subcategory']));
  }
  if (isset($_POST['nerally_author_tag'])) {
    update_post_meta($post_id, '_nerally_author_tag', sanitize_text_field($_POST['nerally_author_tag']));
  }
});

add_action('wp_enqueue_scripts', function(){
  // Build absolute-origin URLs to avoid WordPress prefixing with /arthra/
  $scheme = is_ssl() ? 'https://' : 'http://';
  $origin = $scheme . ($_SERVER['HTTP_HOST'] ?? '');

  wp_enqueue_style('nerally-google-inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', [], null);
  wp_enqueue_style('nerally-main', $origin . '/main.css', [], null);
  // Explicitly enqueue critical layout CSS in case @import is restricted
  wp_enqueue_style('nerally-base', $origin . '/css/base.css', ['nerally-main'], null);
  wp_enqueue_style('nerally-header-css', $origin . '/css/header.css', ['nerally-base'], null);
  wp_enqueue_style('nerally-overlay-css', $origin . '/css/overlay.css', ['nerally-base'], null);
  wp_enqueue_style('nerally-footer-css', $origin . '/css/footer.css', ['nerally-base'], null);
  wp_enqueue_style('nerally-components', $origin . '/css/components.css', ['nerally-base'], null);
  wp_enqueue_style('nerally-cookie', $origin . '/css/cookie-consent.css', ['nerally-main'], null);
  
  // Optional: Only load legal-modal if it exists
  // wp_enqueue_style('nerally-legal', $origin . '/css/legal-modal.css', ['nerally-main'], null);

  // Theme CSS
  wp_enqueue_style('nerally-theme', get_stylesheet_uri(), ['nerally-main'], wp_get_theme()->get('Version'));

  // Site JS
  // Optional: Only load legal-modal if it exists
  // wp_enqueue_script('nerally-legal-js', $origin . '/js/legal-modal.js', [], null, true);
  wp_enqueue_script('nerally-cookie-js', $origin . '/js/cookie-consent.js', [], null, true);
  wp_enqueue_script('nerally-navigation', $origin . '/js/navigation.js', [], null, true);
  wp_enqueue_script('nerally-app', $origin . '/app.js', [], null, true);
  wp_enqueue_script('nerally-chat', $origin . '/js/chat-widget.js', [], null, true);

  // Provide public runtime config (reCAPTCHA site key) before chat script
  $siteKey = getenv('RECAPTCHA_SITE');
  if (empty($siteKey) && defined('RECAPTCHA_SITE_KEY')) { $siteKey = RECAPTCHA_SITE_KEY; }
  if (empty($siteKey)) { $siteKey = get_option('nerally_recaptcha_site', ''); }
  if (!empty($siteKey)) {
    $inline = "window.SITE_CONFIG=window.SITE_CONFIG||{};window.SITE_CONFIG.RECAPTCHA_SITE='" . esc_js($siteKey) . "';";
    wp_add_inline_script('nerally-chat', $inline, 'before');
  }
});

// AJAX handler for filter options
add_action('wp_ajax_get_filter_options', 'get_filter_options');
add_action('wp_ajax_nopriv_get_filter_options', 'get_filter_options');

function get_filter_options() {
  global $wpdb;
  
  // Get all unique subcategories
  $subcategories = $wpdb->get_col("
    SELECT DISTINCT meta_value 
    FROM {$wpdb->postmeta} 
    WHERE meta_key = '_nerally_subcategory' 
    AND meta_value != '' 
    ORDER BY meta_value
  ");
  
  // Get all unique authors
  $authors = $wpdb->get_col("
    SELECT DISTINCT meta_value 
    FROM {$wpdb->postmeta} 
    WHERE meta_key = '_nerally_author_tag' 
    AND meta_value != '' 
    ORDER BY meta_value
  ");
  
  wp_send_json_success(array(
    'subcategories' => $subcategories,
    'authors' => $authors
  ));
}

// AJAX handler for carousel articles
add_action('wp_ajax_get_carousel_articles', 'get_carousel_articles');
add_action('wp_ajax_nopriv_get_carousel_articles', 'get_carousel_articles');

function get_carousel_articles() {
  $type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : 'hot';
  
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 8,
    'post_status' => 'publish'
  );
  
  // Different queries based on type
  switch($type) {
    case 'hot':
      // Hot posts - popular or trending (based on views, comments, or specific tags)
      $args['meta_query'] = array(
        'relation' => 'OR',
        array(
          'key' => '_nerally_category',
          'value' => 'Φορολογία',
          'compare' => '='
        ),
        array(
          'key' => '_nerally_subcategory', 
          'value' => 'Επίκαιρα',
          'compare' => '='
        )
      );
      $args['orderby'] = 'date';
      $args['order'] = 'DESC';
      break;
      
    case 'latest':
      // Most recent posts - no specific category filter
      $args['orderby'] = 'date';
      $args['order'] = 'DESC';
      break;
      
    case 'important':
      // Important posts - specific important categories only
      $args['meta_query'] = array(
        'relation' => 'OR',
        array(
          'key' => '_nerally_category',
          'value' => 'Σημαντικά',
          'compare' => '='
        ),
        array(
          'key' => '_nerally_subcategory',
          'value' => 'Νομοθεσία',
          'compare' => '='
        ),
        array(
          'key' => '_nerally_category',
          'value' => 'Οικονομικά',
          'compare' => '='
        )
      );
      $args['orderby'] = 'date';
      $args['order'] = 'DESC';
      break;
  }
  
  $query = new WP_Query($args);
  $articles = array();
  
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      
      $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'article-thumbnail');
      $category = get_post_meta(get_the_ID(), '_nerally_category', true);
      
      // Smart fallback images based on category
      if (!$thumbnail) {
        switch($category) {
          case 'Φορολογία':
            $thumbnail = '/images/ForosEisodimatos.webp';
            break;
          case 'Οικονομικά':
            $thumbnail = '/images/Foros_enoikiwn_enhanced.webp';
            break;
          case 'Σημαντικά':
            $thumbnail = '/images/Hero2_enhanced.webp';
            break;
          default:
            $thumbnail = '/images/Hero1_enhanced.webp';
        }
      }
      
      $subcategory = get_post_meta(get_the_ID(), '_nerally_subcategory', true);
      
      $articles[] = array(
        'title' => get_the_title(),
        'permalink' => get_permalink(),
        'thumbnail' => $thumbnail,
        'date' => get_the_date('j M Y'),
        'excerpt' => wp_trim_words(get_the_excerpt(), 12, '...'),
        'category' => $category,
        'subcategory' => $subcategory
      );
    }
    wp_reset_postdata();
  }
  
  wp_send_json_success($articles);
}

// AJAX handler for live search
add_action('wp_ajax_live_search', 'handle_live_search');
add_action('wp_ajax_nopriv_live_search', 'handle_live_search');

function handle_live_search() {
  $query = isset($_GET['query']) ? sanitize_text_field($_GET['query']) : '';
  
  if (strlen($query) < 2) {
    wp_send_json_success(array());
    return;
  }
  
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 8,
    'post_status' => 'publish',
    's' => $query,
    'orderby' => 'relevance'
  );
  
  $search_query = new WP_Query($args);
  $results = array();
  
  if ($search_query->have_posts()) {
    while ($search_query->have_posts()) {
      $search_query->the_post();
      
      $results[] = array(
        'title' => get_the_title(),
        'permalink' => get_permalink(),
        'excerpt' => wp_trim_words(get_the_excerpt(), 15, '...')
      );
    }
    wp_reset_postdata();
  }
  
  wp_send_json_success($results);
}

// Tiny settings field in Settings > General to store the reCAPTCHA site key (public)
add_action('admin_init', function(){
  register_setting('general', 'nerally_recaptcha_site', ['type'=>'string','sanitize_callback'=>'sanitize_text_field']);
  add_settings_field(
    'nerally_recaptcha_site',
    'reCAPTCHA Site Key',
    function(){
      $val = esc_attr(get_option('nerally_recaptcha_site', ''));
      echo '<input type="text" name="nerally_recaptcha_site" value="'.$val.'" class="regular-text" placeholder="6Lc...your_site_key..." />';
      echo '<p class="description">Δώσε το δημόσιο reCAPTCHA v3 site key. Μπορείς εναλλακτικά να ορίσεις το RECAPTCHA_SITE_KEY στο wp-config.php ή RECAPTCHA_SITE στο περιβάλλον.</p>';
    },
    'general'
  );
});

// Include navigation buttons (back to top, back to articles)
if (file_exists(get_template_directory() . '/functions-navigation.php')) {
    require_once get_template_directory() . '/functions-navigation.php';
}

// Fix page title for archive pages
add_filter('pre_get_document_title', function($title) {
    // Check if we're on the articles page
    if (is_home() || is_post_type_archive('post') || is_archive()) {
        return 'Άρθρα | Nerally';
    }
    // Check for /arthra/ path
    $current_url = $_SERVER['REQUEST_URI'] ?? '';
    if (strpos($current_url, '/arthra') !== false) {
        return 'Άρθρα | Nerally';
    }
    return $title;
}, 999); // High priority to override other filters

// Also fix with wp_title filter for older themes
add_filter('wp_title', function($title, $sep) {
    if (is_home() || is_post_type_archive('post') || is_archive()) {
        return 'Άρθρα ' . $sep . ' Nerally';
    }
    $current_url = $_SERVER['REQUEST_URI'] ?? '';
    if (strpos($current_url, '/arthra') !== false) {
        return 'Άρθρα ' . $sep . ' Nerally';
    }
    return $title;
}, 999, 2);


