
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile of Saori from LAF</title>

  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">

  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<?php if (have_posts()) : //ループを実装する ?>
       <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
       <?php endwhile; ?>
     <?php endif; ?>
