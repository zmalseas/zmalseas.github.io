<?php get_header(); ?>
<section class="blog-container">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="single-wrap">
      <h1 class="single-title"><?php the_title(); ?></h1>
      <div class="single-content"><?php the_content(); ?></div>
    </article>
  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
