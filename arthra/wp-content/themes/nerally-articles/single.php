<?php get_header(); ?>
<section class="blog-container">
  <article class="single-wrap">
    <?php if (has_post_thumbnail()): ?>
      <div class="single-hero-image">
        <?php the_post_thumbnail('article-hero', ['class' => 'hero-image']); ?>
      </div>
    <?php endif; ?>
    
    <div class="single-header">
      <!-- Breadcrumbs -->
      <nav class="breadcrumbs">
        <a href="<?php echo home_url('/arthra/'); ?>">Άρθρα</a>
        <span class="breadcrumb-separator">›</span>
        <?php 
        $category = get_post_meta(get_the_ID(), '_nerally_category', true);
        if ($category): ?>
          <span class="breadcrumb-category"><?php echo esc_html($category); ?></span>
          <span class="breadcrumb-separator">›</span>
        <?php endif; ?>
        <span class="breadcrumb-current"><?php echo wp_trim_words(get_the_title(), 6, '...'); ?></span>
      </nav>
      
      <?php 
      // Get custom meta fields
      $subcategory = get_post_meta(get_the_ID(), '_nerally_subcategory', true);
      $author_tag = get_post_meta(get_the_ID(), '_nerally_author_tag', true);
      
      // Calculate reading time
      $content = get_post_field('post_content', get_the_ID());
      $word_count = str_word_count(strip_tags($content));
      $reading_time = ceil($word_count / 200); // 200 words per minute
      ?>
      
      <?php if ($category || $subcategory || $author_tag): ?>
        <div class="single-tags">
          <?php if ($category): ?>
            <span class="single-tag category"><?php echo esc_html($category); ?></span>
          <?php endif; ?>
          <?php if ($subcategory): ?>
            <span class="single-tag subcategory"><?php echo esc_html($subcategory); ?></span>
          <?php endif; ?>
          <?php if ($author_tag): ?>
            <span class="single-tag author">Συντάκτης: <?php echo esc_html($author_tag); ?></span>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      
      <h1 class="single-title"><?php the_title(); ?></h1>
      <div class="single-meta">
        <span class="post-date">📅 <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></span>
        <span class="reading-time">⏱️ <?php echo $reading_time; ?> λεπτά ανάγνωσης</span>
        <span class="word-count">📄 <?php echo number_format($word_count); ?> λέξεις</span>
      </div>
      
      <!-- Social Sharing -->
      <div class="social-share">
        <span class="share-label">Μοιράσου:</span>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" target="_blank" class="share-btn facebook" aria-label="Μοιράσου στο Facebook">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
          </svg>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_the_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-btn twitter" aria-label="Μοιράσου στο Twitter">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
          </svg>
        </a>
        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank" class="share-btn linkedin" aria-label="Μοιράσου στο LinkedIn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
          </svg>
        </a>
        <button onclick="copyToClipboard('<?php echo get_the_permalink(); ?>')" class="share-btn copy" aria-label="Αντιγραφή συνδέσμου">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
            <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"></path>
          </svg>
        </button>
      </div>
    </div>
    
    <div class="single-content"><?php the_content(); ?></div>
    
    <!-- Author Card -->
    <div class="author-card">
      <div class="author-info">
        <div class="author-avatar">
          <?php 
          $author_tag = get_post_meta(get_the_ID(), '_nerally_author_tag', true);
          if ($author_tag): 
            // Get first letter for avatar
            $first_letter = strtoupper(substr($author_tag, 0, 1));
          ?>
            <div class="author-initial"><?php echo $first_letter; ?></div>
          <?php else: ?>
            <div class="author-initial">N</div>
          <?php endif; ?>
        </div>
        <div class="author-details">
          <h3 class="author-name"><?php echo $author_tag ? esc_html($author_tag) : 'Nerally Team'; ?></h3>
          <p class="author-title">Συντάκτης άρθρου</p>
          <p class="author-bio">Μέλος της ομάδας Nerally με εξειδίκευση σε φορολογικά και οικονομικά θέματα.</p>
          <div class="author-social">
            <a href="mailto:info@nerally.gr" class="author-link">✉️ Επικοινωνία</a>
            <a href="/" class="author-link">🌐 Περισσότερα άρθρα</a>
          </div>
        </div>
      </div>
    </div>
    
    <?php if (get_the_tags()): ?>
      <div class="single-taxonomy">
        <div class="wp-tags">
          <strong>Ετικέτες:</strong> <?php the_tags('', ', ', ''); ?>
        </div>
      </div>
    <?php endif; ?>
  </article>
</section>
<?php get_footer(); ?>
