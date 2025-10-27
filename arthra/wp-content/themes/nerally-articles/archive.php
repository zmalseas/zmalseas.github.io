<?php get_header(); ?>
<section class="blog-container">
  <header class="blog-header">
    <h1 class="blog-title"><?php the_archive_title(); ?></h1>
    <form class="blog-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <label class="screen-reader-text" for="s">Αναζήτηση για:</label>
      <input type="search" id="s" class="search-field" placeholder="Αναζήτηση άρθρων…" value="<?php echo get_search_query(); ?>" name="s" />
      <button type="submit" class="search-submit">Αναζήτηση</button>
    </form>
  </header>
  <div class="posts-grid">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <article class="post-card">
        <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('large', ['class' => 'post-thumb']); ?>
          <?php else: ?>
            <img class="post-thumb" src="<?php echo esc_url( home_url('/images/Hero2_enhanced.webp') ); ?>" alt="" />
          <?php endif; ?>
          <div class="post-body">
            <h2 class="post-title"><?php the_title(); ?></h2>
            <div class="post-meta"><?php echo get_the_date(); ?></div>
            <p class="post-excerpt"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 24, '…' ) ); ?></p>
          </div>
        </a>
      </article>
    <?php endwhile; else: ?>
      <p>Δεν υπάρχουν αποτελέσματα.</p>
    <?php endif; ?>
  </div>
  <nav class="pagination"><?php the_posts_pagination(); ?></nav>
</section>
<?php get_footer(); ?>
