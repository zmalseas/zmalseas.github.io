<?php
/**
 * Single post template for articles
 * Displays individual blog posts/articles
 */

get_header(); ?>

<div class="blog-container">
    
    <?php while (have_posts()) : the_post(); ?>
        
        <article class="single-article">
            
            <!-- Article Header -->
            <header class="article-header">
                <h1><?php the_title(); ?></h1>
                
                <div class="article-meta-full">
                    <div class="meta-item">
                        <span>📅</span>
                        <span><?php echo get_the_date('d M Y'); ?></span>
                    </div>
                    
                    <div class="meta-item">
                        <span>👤</span>
                        <span><?php the_author(); ?></span>
                    </div>
                    
                    <?php 
                    $reading_time = get_post_meta(get_the_ID(), '_nerally_reading_time', true);
                    if ($reading_time) : ?>
                        <div class="meta-item">
                            <span>⏱️</span>
                            <span><?php echo esc_html($reading_time); ?> λεπτά ανάγνωσης</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php 
                    $categories = get_the_terms(get_the_ID(), 'article_category');
                    if ($categories && !is_wp_error($categories)) : ?>
                        <div class="meta-item">
                            <span>🏷️</span>
                            <span><?php echo esc_html($categories[0]->name); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php 
                    $difficulty = get_the_terms(get_the_ID(), 'difficulty');
                    if ($difficulty && !is_wp_error($difficulty)) : ?>
                        <div class="meta-item">
                            <span>📊</span>
                            <span><?php echo esc_html($difficulty[0]->name); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'article-featured')); ?>" 
                             alt="<?php echo esc_attr(get_the_title()); ?>" 
                             class="article-featured-img">
                    </div>
                <?php endif; ?>
            </header>
            
            <!-- Article Content -->
            <div class="content-wrapper">
                <div class="article-content">
                    <?php the_content(); ?>
                </div>
                
                <!-- Article Tags -->
                <?php 
                $tags = get_the_tags();
                if ($tags) : ?>
                    <div class="article-tags">
                        <h4>Ετικέτες:</h4>
                        <div class="tag-list">
                            <?php foreach ($tags as $tag) : ?>
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag-link">
                                    #<?php echo esc_html($tag->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Share Buttons -->
                <div class="article-share">
                    <h4>Μοιραστείτε αυτό το άρθρο:</h4>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                           target="_blank" 
                           class="share-btn facebook">
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                           target="_blank" 
                           class="share-btn twitter">
                            Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                           target="_blank" 
                           class="share-btn linkedin">
                            LinkedIn
                        </a>
                        <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" 
                           class="share-btn email">
                            Email
                        </a>
                    </div>
                </div>
                
                <!-- Navigation to Previous/Next Posts -->
                <nav class="post-navigation">
                    <div class="nav-links">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>
                        
                        <?php if ($prev_post) : ?>
                            <div class="nav-previous">
                                <a href="<?php echo esc_url(get_permalink($prev_post)); ?>">
                                    <span class="nav-subtitle">← Προηγούμενο άρθρο</span>
                                    <span class="nav-title"><?php echo esc_html(get_the_title($prev_post)); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($next_post) : ?>
                            <div class="nav-next">
                                <a href="<?php echo esc_url(get_permalink($next_post)); ?>">
                                    <span class="nav-subtitle">Επόμενο άρθρο →</span>
                                    <span class="nav-title"><?php echo esc_html(get_the_title($next_post)); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </nav>
                
                <!-- Related Articles -->
                <?php
                $related_posts = get_posts(array(
                    'post_type' => get_post_type(),
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'article_category',
                            'field' => 'term_id',
                            'terms' => wp_get_post_terms(get_the_ID(), 'article_category', array('fields' => 'ids'))
                        )
                    )
                ));
                
                if ($related_posts) : ?>
                    <section class="related-articles">
                        <h3>Σχετικά άρθρα</h3>
                        <div class="related-grid">
                            <?php foreach ($related_posts as $post) : setup_postdata($post); ?>
                                <article class="related-article">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'article-thumbnail')); ?>" 
                                             alt="<?php echo esc_attr(get_the_title()); ?>" 
                                             class="related-thumbnail">
                                    <?php endif; ?>
                                    <div class="related-content">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                                        <span class="related-date"><?php echo get_the_date('d M Y'); ?></span>
                                    </div>
                                </article>
                            <?php endforeach; wp_reset_postdata(); ?>
                        </div>
                    </section>
                <?php endif; ?>
                
                <!-- Comments -->
                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="comments-section">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
                
            </div>
            
        </article>
        
    <?php endwhile; ?>
    
</div>

<style>
/* Additional styles for single article page */
.featured-image {
    margin: 2rem 0;
    text-align: center;
}

.article-featured-img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.article-tags {
    margin: 3rem 0;
    padding: 2rem;
    background: var(--blog-bg-light);
    border-radius: 12px;
}

.tag-list {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    margin-top: 1rem;
}

.tag-link {
    background: white;
    color: var(--blog-accent);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.9rem;
    border: 1px solid var(--blog-accent);
    transition: all 0.3s ease;
}

.tag-link:hover {
    background: var(--blog-accent);
    color: white;
}

.article-share {
    margin: 3rem 0;
    text-align: center;
}

.share-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-top: 1rem;
    flex-wrap: wrap;
}

.share-btn {
    background: var(--blog-accent);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.share-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.share-btn.facebook { background: #1877f2; }
.share-btn.twitter { background: #1da1f2; }
.share-btn.linkedin { background: #0077b5; }
.share-btn.email { background: #666; }

.post-navigation {
    margin: 3rem 0;
    border-top: 2px solid var(--blog-border);
    border-bottom: 2px solid var(--blog-border);
    padding: 2rem 0;
}

.nav-links {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.nav-previous,
.nav-next {
    padding: 1rem;
    background: var(--blog-bg-light);
    border-radius: 8px;
}

.nav-previous a,
.nav-next a {
    text-decoration: none;
    color: var(--blog-text);
    display: block;
}

.nav-subtitle {
    font-size: 0.9rem;
    color: var(--blog-muted);
    display: block;
    margin-bottom: 0.5rem;
}

.nav-title {
    font-weight: 600;
    line-height: 1.3;
}

.nav-next {
    text-align: right;
}

.related-articles {
    margin: 4rem 0;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.related-article {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border: 1px solid var(--blog-border);
}

.related-thumbnail {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.related-content {
    padding: 1.5rem;
}

.related-content h4 {
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.related-content h4 a {
    color: var(--blog-text);
    text-decoration: none;
}

.related-content h4 a:hover {
    color: var(--blog-accent);
}

.related-date {
    color: var(--blog-muted);
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .nav-links {
        grid-template-columns: 1fr;
    }
    
    .nav-next {
        text-align: left;
    }
    
    .share-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .share-btn {
        width: 200px;
        text-align: center;
    }
}
</style>

<?php get_footer(); ?>