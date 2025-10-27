/**
 * Nerally Smart Filters - Cooperative Category/Author Filtering
 * Add to functions.php or create separate plugin
 */

// AJAX handler for smart filters
add_action('wp_ajax_nerally_smart_filter', 'nerally_smart_filter_handler');
add_action('wp_ajax_nopriv_nerally_smart_filter', 'nerally_smart_filter_handler');

function nerally_smart_filter_handler() {
    check_ajax_referer('nerally_filter_nonce', 'nonce');
    
    $filter_type = sanitize_text_field($_POST['filter_type'] ?? '');
    $selected_value = sanitize_text_field($_POST['selected_value'] ?? '');
    
    $response = array();
    
    switch ($filter_type) {
        case 'category':
            // Get subcategories for selected category
            $response['subcategories'] = get_subcategories_for_category($selected_value);
            // Get authors who wrote in this category
            $response['authors'] = get_authors_for_category($selected_value);
            break;
            
        case 'author':
            // Get categories this author has written in
            $response['categories'] = get_categories_for_author($selected_value);
            // Get subcategories based on author's categories
            $response['subcategories'] = get_subcategories_for_author($selected_value);
            break;
            
        case 'subcategory':
            // Get parent category
            $term = get_term($selected_value, 'category');
            if ($term && $term->parent) {
                $response['category'] = $term->parent;
            }
            // Get authors for this subcategory
            $response['authors'] = get_authors_for_category($selected_value);
            break;
    }
    
    wp_send_json_success($response);
}

function get_subcategories_for_category($category_id) {
    if (empty($category_id)) {
        return array();
    }
    
    $subcategories = get_categories(array(
        'parent' => $category_id,
        'hide_empty' => true
    ));
    
    $result = array();
    foreach ($subcategories as $subcat) {
        $result[] = array(
            'id' => $subcat->term_id,
            'name' => $subcat->name,
            'count' => $subcat->count
        );
    }
    
    return $result;
}

function get_authors_for_category($category_id) {
    if (empty($category_id)) {
        return array();
    }
    
    global $wpdb;
    
    $query = $wpdb->prepare("
        SELECT DISTINCT p.post_author, u.display_name
        FROM {$wpdb->posts} p
        INNER JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
        INNER JOIN {$wpdb->users} u ON p.post_author = u.ID
        WHERE tr.term_taxonomy_id = %d
        AND p.post_status = 'publish'
        AND p.post_type = 'post'
    ", $category_id);
    
    $authors = $wpdb->get_results($query);
    
    $result = array();
    foreach ($authors as $author) {
        $result[] = array(
            'id' => $author->post_author,
            'name' => $author->display_name,
            'count' => count_user_posts($author->post_author, 'post', true)
        );
    }
    
    return $result;
}

function get_categories_for_author($author_id) {
    if (empty($author_id)) {
        return array();
    }
    
    $args = array(
        'author' => $author_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids'
    );
    
    $posts = get_posts($args);
    
    if (empty($posts)) {
        return array();
    }
    
    $categories = wp_get_object_terms($posts, 'category', array(
        'parent' => 0 // Only top-level categories
    ));
    
    $result = array();
    foreach ($categories as $category) {
        $result[] = array(
            'id' => $category->term_id,
            'name' => $category->name,
            'count' => $category->count
        );
    }
    
    return $result;
}

function get_subcategories_for_author($author_id) {
    if (empty($author_id)) {
        return array();
    }
    
    $args = array(
        'author' => $author_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids'
    );
    
    $posts = get_posts($args);
    
    if (empty($posts)) {
        return array();
    }
    
    $categories = wp_get_object_terms($posts, 'category', array(
        'parent__not_in' => array(0) // Only subcategories
    ));
    
    $result = array();
    foreach ($categories as $category) {
        $result[] = array(
            'id' => $category->term_id,
            'name' => $category->name,
            'count' => $category->count
        );
    }
    
    return $result;
}

// Enqueue filter scripts on archive pages
add_action('wp_enqueue_scripts', function() {
    if (!is_archive() && !is_home()) {
        return;
    }
    
    wp_enqueue_script(
        'nerally-smart-filters',
        get_template_directory_uri() . '/js/smart-filters.js',
        array('jquery'),
        '1.0.0',
        true
    );
    
    wp_localize_script('nerally-smart-filters', 'nerallyFilters', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('nerally_filter_nonce')
    ));
});
