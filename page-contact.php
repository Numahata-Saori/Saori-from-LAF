<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>

  <?php

// 記事の文章
the_content();

?>

  <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>

<!-- https://cotodama.co/contact-form-7_css/ -->
