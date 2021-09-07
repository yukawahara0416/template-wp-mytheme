  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0">
  <meta name="robots" content="<?php echo _get_robots(); ?>">
  <meta name="description" content="<?php echo _get_meta('description', 100); ?>">
  <meta name="keywords" content="">

  <?php get_template_part('template-parts/header/ogp'); ?>

  <?php wp_head(); ?>
