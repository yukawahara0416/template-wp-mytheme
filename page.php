<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body>
  <header>
    <?php get_template_part(('template-parts/header/header')); ?>
  </header>

  <?php while (have_posts()) : the_post(); ?>

    <?php remove_filter('the_content', 'wpautop'); ?>
    <?php the_content(); ?>

  <?php endwhile; ?>

  <footer>
    <?php get_template_part('template-parts/footer/footer'); ?>
  </footer>

  <?php get_footer(); ?>

</body>

</html>