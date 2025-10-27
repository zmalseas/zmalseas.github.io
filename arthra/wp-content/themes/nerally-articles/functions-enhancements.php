/**
 * Nerally Theme - Article Enhancements
 * Add to your theme's functions.php
 * 
 * Features:
 * - Back to Top button
 * - Back to Articles button
 * - Related Articles widget
 * - Custom Author Box with links
 * - Smart Filters (Category/Author cooperative)
 */

// ============================================
// 1. BACK TO TOP & NAVIGATION BUTTONS
// ============================================

add_action('wp_footer', 'nerally_navigation_buttons');
function nerally_navigation_buttons() {
    if (!is_single()) {
        return;
    }
    ?>
    <!-- Back to Top Button -->
    <button id="nerally-back-to-top" aria-label="Επιστροφή στην κορυφή">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 4l-8 8h5v8h6v-8h5z"/>
        </svg>
    </button>
    
    <!-- Back to Articles Button -->
    <a href="<?php echo esc_url(home_url('/arthra')); ?>" id="nerally-back-to-articles" aria-label="Επιστροφή στα άρθρα">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
        </svg>
    </a>
    <?php
}

// Enqueue navigation scripts
add_action('wp_enqueue_scripts', 'nerally_enqueue_navigation_scripts');
function nerally_enqueue_navigation_scripts() {
    if (!is_single()) {
        return;
    }
    
    // Add inline CSS for navigation buttons
    wp_add_inline_style('nerally-theme', '
        #nerally-back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #0066cc;
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        #nerally-back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        #nerally-back-to-top:hover {
            background: #0052a3;
            transform: translateY(-3px);
        }
        
        #nerally-back-to-top svg {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }
        
        #nerally-back-to-articles {
            position: fixed;
            bottom: 90px;
            left: 30px;
            width: 50px;
            height: 50px;
            background: #333;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        
        #nerally-back-to-articles:hover {
            background: #555;
            transform: translateX(-3px);
        }
        
        #nerally-back-to-articles svg {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }
    ');
    
    wp_add_inline_script('jquery', '
        (function($) {
            $(document).ready(function() {
                const $backToTop = $("#nerally-back-to-top");
                
                $(window).on("scroll", function() {
                    if ($(this).scrollTop() > 300) {
                        $backToTop.addClass("visible");
                    } else {
                        $backToTop.removeClass("visible");
                    }
                });
                
                $backToTop.on("click", function(e) {
                    e.preventDefault();
                    $("html, body").animate({ scrollTop: 0 }, 800);
                });
            });
        })(jQuery);
    ');
}

// ============================================
// 2. RELATED ARTICLES WIDGET
// ============================================

add_filter('the_content', 'nerally_add_related_articles', 999);
function nerally_add_related_articles($content) {
    if (!is_single()) {
        return $content;
    }
    
    global $post;
    
    // Get related posts by category
    $categories = wp_get_post_categories($post->ID, array('fields' => 'ids'));
    
    if (empty($categories)) {
        return $content;
    }
    
    $related_args = array(
        'category__in' => $categories,
        'post__not_in' => array($post->ID),
        'posts_per_page' => 3,
        'orderby' => 'rand'
    );
    
    $related_query = new WP_Query($related_args);
    
    if (!$related_query->have_posts()) {
        return $content;
    }
    
    ob_start();
    ?>
    <div id="nerally-related-articles">
        <h3>Δείτε Επίσης</h3>
        <div class="related-articles-grid">
            <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="related-article-item">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="related-article-thumb">
                    <?php else: ?>
                        <div class="related-article-thumb"></div>
                    <?php endif; ?>
                    <div class="related-article-content">
                        <h4 class="related-article-title"><?php the_title(); ?></h4>
                        <p class="related-article-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <div class="related-article-meta">
                            <?php echo get_the_date(); ?>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
    <?php
    wp_reset_postdata();
    $related_content = ob_get_clean();
    
    return $content . $related_content;
}

// ============================================
// 3. CUSTOM AUTHOR BOX WITH EXTERNAL LINKS
// ============================================

add_filter('the_content', 'nerally_custom_author_box', 1000);
function nerally_custom_author_box($content) {
    if (!is_single()) {
        return $content;
    }
    
    $author_box = '
    <div class="author-bio-box" style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 12px; padding: 24px; margin: 40px 0;">
        <div style="display: flex; align-items: center; gap: 16px;">
            <div style="flex-shrink: 0;">
                ' . get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'author-avatar')) . '
            </div>
            <div style="flex: 1;">
                <h3 style="margin: 0 0 8px 0; font-size: 18px;">' . get_the_author() . '</h3>
                <p style="margin: 0 0 12px 0; color: #6b7280; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">ΣΥΝΤΑΚΤΗΣ ΑΡΘΡΟΥ</p>
                <p style="margin: 0 0 16px 0; color: #374151; line-height: 1.6;">' . get_the_author_meta('description') . '</p>
                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="' . esc_url(home_url('/epikoinonia/contact')) . '" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: #ffffff; border: 1px solid #d1d5db; border-radius: 6px; color: #374151; text-decoration: none; font-size: 14px; transition: all 0.2s;">
                        📧 Επικοινωνία
                    </a>
                    <a href="' . esc_url(home_url('/arthra')) . '" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: #ffffff; border: 1px solid #d1d5db; border-radius: 6px; color: #374151; text-decoration: none; font-size: 14px; transition: all 0.2s;">
                        📚 Περισσότερα άρθρα
                    </a>
                </div>
            </div>
        </div>
    </div>';
    
    return $content . $author_box;
}

// ============================================
// 4. SMART FILTERS (AJAX)
// ============================================

// AJAX handler for smart filters
add_action('wp_ajax_nerally_smart_filter', 'nerally_smart_filter_handler');
add_action('wp_ajax_nopriv_nerally_smart_filter', 'nerally_smart_filter_handler');

function nerally_smart_filter_handler() {
    check_ajax_referer('nerally_filter_nonce', 'nonce');
    
    $filter_type = isset($_POST['filter_type']) ? sanitize_text_field($_POST['filter_type']) : '';
    $selected_value = isset($_POST['selected_value']) ? sanitize_text_field($_POST['selected_value']) : '';
    
    $response = array();
    
    switch ($filter_type) {
        case 'category':
            $response['subcategories'] = nerally_get_subcategories_for_category($selected_value);
            $response['authors'] = nerally_get_authors_for_category($selected_value);
            break;
            
        case 'author':
            $response['categories'] = nerally_get_categories_for_author($selected_value);
            $response['subcategories'] = nerally_get_subcategories_for_author($selected_value);
            break;
            
        case 'subcategory':
            $term = get_term($selected_value, 'category');
            if ($term && $term->parent) {
                $response['category'] = $term->parent;
            }
            $response['authors'] = nerally_get_authors_for_category($selected_value);
            break;
    }
    
    wp_send_json_success($response);
}

// Helper functions for smart filters
function nerally_get_subcategories_for_category($category_id) {
    if (empty($category_id)) return array();
    
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

function nerally_get_authors_for_category($category_id) {
    if (empty($category_id)) return array();
    
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

function nerally_get_categories_for_author($author_id) {
    if (empty($author_id)) return array();
    
    $args = array(
        'author' => $author_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids'
    );
    
    $posts = get_posts($args);
    if (empty($posts)) return array();
    
    $categories = wp_get_object_terms($posts, 'category', array('parent' => 0));
    
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

function nerally_get_subcategories_for_author($author_id) {
    if (empty($author_id)) return array();
    
    $args = array(
        'author' => $author_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids'
    );
    
    $posts = get_posts($args);
    if (empty($posts)) return array();
    
    $categories = wp_get_object_terms($posts, 'category', array('parent__not_in' => array(0)));
    
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

// Enqueue smart filters script
add_action('wp_enqueue_scripts', 'nerally_enqueue_smart_filters');
function nerally_enqueue_smart_filters() {
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
}

// ============================================
// 5. THEME STYLES FOR NEW FEATURES
// ============================================

add_action('wp_head', 'nerally_theme_enhancements_css');
function nerally_theme_enhancements_css() {
    ?>
    <style>
    /* Back to Top Button */
    #nerally-back-to-top {
        position: fixed;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        width: 48px;
        height: 48px;
        background: rgba(255, 255, 255, 0.95);
        border: none;
        border-radius: 50%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 9998;
    }
    #nerally-back-to-top.visible {
        opacity: 1;
        visibility: visible;
    }
    #nerally-back-to-top:hover {
        transform: translateX(-50%) translateY(-4px);
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
    }
    #nerally-back-to-top svg {
        width: 24px;
        height: 24px;
        fill: #374151;
    }
    
    /* Back to Articles Button */
    #nerally-back-to-articles {
        position: fixed;
        top: 120px;
        left: 20px;
        width: 48px;
        height: 48px;
        background: rgba(255, 255, 255, 0.95);
        border: none;
        border-radius: 50%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 9998;
    }
    #nerally-back-to-articles:hover {
        transform: translateX(-4px);
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
    }
    #nerally-back-to-articles svg {
        width: 24px;
        height: 24px;
        fill: #374151;
    }
    
    /* Related Articles */
    #nerally-related-articles {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 24px;
        margin: 40px 0;
    }
    #nerally-related-articles h3 {
        font-size: 18px;
        margin: 0 0 16px 0;
        padding-bottom: 12px;
        border-bottom: 2px solid #e5e7eb;
    }
    .related-articles-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 16px;
    }
    .related-article-item {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .related-article-item:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }
    .related-article-thumb {
        width: 100%;
        height: 150px;
        object-fit: cover;
        background: #f3f4f6;
    }
    .related-article-content {
        padding: 12px;
    }
    .related-article-title {
        font-size: 14px;
        font-weight: 600;
        color: #1f2937;
        margin: 0 0 8px 0;
    }
    .related-article-excerpt {
        font-size: 13px;
        color: #6b7280;
        margin: 0;
    }
    </style>
    <?php
}
