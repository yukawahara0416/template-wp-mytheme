<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body>
  <header>
    <?php get_template_part(('template-parts/header/header')); ?>
  </header>

  <?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post() ?>
      <?php get_template_part('template-parts/content/content'); ?>
    <?php endwhile; ?>

  <?php else : ?>

    <?php get_template_part('template-parts/content/content-none'); ?>

  <?php endif; ?>

  <footer>
    <?php get_template_part('template-parts/footer/footer'); ?>
  </footer>

  <?php get_footer(); ?>

</body>

</html>