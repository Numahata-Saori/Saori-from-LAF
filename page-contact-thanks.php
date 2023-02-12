<?php get_header(); ?>

<div class="contact-thanks wow animate__animated wow animate__animated">
<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>

  <?php
  // 記事の文章
  the_content();
  ?>

  <?php endwhile; ?>
<?php endif; ?>
</div>

<?php get_footer(); ?>
