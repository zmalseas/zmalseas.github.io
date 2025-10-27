<?php 
get_header(); 

// Handle filtering
$meta_query = array('relation' => 'AND');

if (isset($_GET['filter_category']) && !empty($_GET['filter_category'])) {
  $meta_query[] = array(
    'key' => '_nerally_category',
    'value' => sanitize_text_field($_GET['filter_category']),
    'compare' => '='
  );
}

if (isset($_GET['filter_subcategory']) && !empty($_GET['filter_subcategory'])) {
  $meta_query[] = array(
    'key' => '_nerally_subcategory',
    'value' => sanitize_text_field($_GET['filter_subcategory']),
    'compare' => '='
  );
}

if (isset($_GET['filter_author']) && !empty($_GET['filter_author'])) {
  $meta_query[] = array(
    'key' => '_nerally_author_tag',
    'value' => sanitize_text_field($_GET['filter_author']),
    'compare' => '='
  );
}

// Custom query if filters are applied
if (count($meta_query) > 1) {
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $filtered_query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $paged,
    'meta_query' => $meta_query
  ));
  $wp_query = $filtered_query; // Replace global query
}
?>

<section class="blog-container">
  <div class="posts-grid">
    <?php if (have_posts()): while (have_posts()): the_post(); 
      // Get custom meta fields
      $category = get_post_meta(get_the_ID(), '_nerally_category', true);
      $subcategory = get_post_meta(get_the_ID(), '_nerally_subcategory', true);
      $author_tag = get_post_meta(get_the_ID(), '_nerally_author_tag', true);
    ?>
      <article class="post-card">
        <a href="<?php the_permalink(); ?>">
          <div class="post-body">
            <div class="post-tags">
              <?php if ($category): ?>
                <span class="post-tag category <?php echo esc_attr(strtolower($category)); ?>"><?php echo esc_html($category); ?></span>
              <?php endif; ?>
              <?php if ($subcategory): ?>
                <span class="post-tag subcategory <?php echo esc_attr(strtolower($subcategory)); ?>"><?php echo esc_html($subcategory); ?></span>
              <?php endif; ?>
            </div>
            <div class="post-thumb-container">
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('article-thumbnail', ['class' => 'post-thumb']); ?>
              <?php else: ?>
                <img class="post-thumb" src="/images/Hero1_enhanced.webp" alt="" />
              <?php endif; ?>
              <div class="post-thumb-overlay"></div>
            </div>
            <div class="post-content-wrapper">
              <h2 class="post-title"><?php the_title(); ?></h2>
              <div class="post-meta">
                <?php echo get_the_date('d M Y'); ?>
                <?php if ($author_tag): ?>
                   - <?php echo esc_html(strtoupper($author_tag)); ?>
                <?php endif; ?>
              </div>
              <p class="post-excerpt"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 20, '…' ) ); ?></p>
            </div>
            <button class="read-more-btn">
              Διαβάστε περισσότερα 
              <span class="read-more-arrow">→</span>
            </button>
          </div>
        </a>
      </article>
    <?php endwhile; else: ?>
      <div class="no-posts">
        <h3>Δεν βρέθηκαν άρθρα</h3>
        <p>Δεν υπάρχουν άρθρα που να ταιριάζουν με τα επιλεγμένα φίλτρα.</p>
        <a href="<?php echo home_url('/arthra/'); ?>" class="reset-filters">Εμφάνιση όλων των άρθρων</a>
      </div>
    <?php endif; ?>
  </div>
  <nav class="pagination"><?php the_posts_pagination(); ?></nav>
</section>

<script>
// Populate filter dropdowns with existing values
document.addEventListener('DOMContentLoaded', function() {
  // Get all unique subcategories and authors via AJAX
  fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=get_filter_options')
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Populate subcategories
        const subcategorySelect = document.getElementById('subcategory-filter');
        data.data.subcategories.forEach(subcategory => {
          const option = document.createElement('option');
          option.value = subcategory;
          option.textContent = subcategory;
          subcategorySelect.appendChild(option);
        });
        
        // Populate authors
        const authorSelect = document.getElementById('author-filter');
        data.data.authors.forEach(author => {
          const option = document.createElement('option');
          option.value = author;
          option.textContent = author;
          authorSelect.appendChild(option);
        });
        
        // Set current values
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('filter_subcategory')) {
          subcategorySelect.value = urlParams.get('filter_subcategory');
        }
        if (urlParams.has('filter_author')) {
          authorSelect.value = urlParams.get('filter_author');
        }
      }
    });
});
</script>
<?php get_footer(); ?>
