<?php
/**
 * Main index template for Nerally WordPress theme
 * Displays blog posts and articles
 */

get_header(); ?>

<div class="blog-container">
    
    <!-- Blog Header -->
    <div class="blog-header">
        <h1><?php bloginfo('name'); ?></h1>
        <p class="subtitle">
            <?php 
            $description = get_bloginfo('description', 'display');
            echo $description ? $description : 'Χρήσιμες πληροφορίες και συμβουλές για την επιχείρησή σας';
            ?>
        </p>
    </div>
    
    <main class="main-content">
        
        <!-- Search and Filters -->
        <div class="search-filters">
            <form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" 
                       class="search-input" 
                       name="s" 
                       placeholder="Αναζήτηση άρθρων..." 
                       value="<?php echo get_search_query(); ?>">
                <button type="submit" class="search-button">Αναζήτηση</button>
            </form>
            
            <!-- Category Filters -->
            <div class="filter-tags">
                <a href="<?php echo esc_url(home_url('/')); ?>" 
                   class="filter-tag <?php echo !is_category() ? 'active' : ''; ?>">
                    Όλα
                </a>
                <?php
                $categories = get_categories(array(
                    'hide_empty' => true
                ));
                
                if (!empty($categories)) {
                    foreach ($categories as $category) {
                        $active = (is_category($category->slug)) ? 'active' : '';
                        echo '<a href="' . esc_url(get_category_link($category)) . '" class="filter-tag ' . $active . '">';
                        echo esc_html($category->name);
                        echo '</a>';
                    }
                }
                ?>
            </div>
        </div>
        
        <?php if (have_posts()) : ?>
            
            <!-- Articles Grid -->
            <div class="articles-grid">
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article class="article-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'article-thumbnail')); ?>" 
                                 alt="<?php echo esc_attr(get_the_title()); ?>" 
                                 class="article-thumbnail">
                        <?php endif; ?>
                        
                        <div class="article-content">
                            <div class="article-meta">
                                <?php 
                                $categories = get_the_category();
                                if ($categories) {
                                    echo '<span class="article-category">' . esc_html($categories[0]->name) . '</span>';
                                }
                                ?>
                                <span class="article-date"><?php echo get_the_date('d M Y'); ?></span>
                            </div>
                            
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            
                            <p><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                            
                            <?php 
                            // Απλός υπολογισμός χρόνου ανάγνωσης βάσει λέξεων
                            $word_count = str_word_count(strip_tags(get_the_content()));
                            $reading_time = ceil($word_count / 200); // 200 λέξεις ανά λεπτό
                            if ($reading_time > 0) {
                                echo '<div class="article-reading-time">⏱️ ' . $reading_time . ' λεπτά ανάγνωσης</div>';
                            }
                            ?>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                Διαβάστε περισσότερα →
                            </a>
                        </div>
                    </article>
                    
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'prev_text' => '← Προηγούμενα',
                    'next_text' => 'Επόμενα →',
                    'type' => 'list'
                ));
                ?>
            </div>
            
        <?php else : ?>
            
            <!-- No Posts Found -->
            <div class="no-posts">
                <h2>Δεν βρέθηκαν άρθρα</h2>
                <?php if (is_search()) : ?>
                    <p>Δεν βρέθηκαν αποτελέσματα για: <strong><?php echo get_search_query(); ?></strong></p>
                    <p>Δοκιμάστε διαφορετικούς όρους αναζήτησης ή περιηγηθείτε στις κατηγορίες.</p>
                <?php else : ?>
                    <p>Δεν υπάρχουν δημοσιευμένα άρθρα αυτή τη στιγμή.</p>
                <?php endif; ?>
            </div>
            
        <?php endif; ?>
        
    </main>
    
</div>

<?php get_footer(); ?>