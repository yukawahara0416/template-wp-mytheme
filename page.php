<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>

  <?php get_template_part(('template-parts/header/header')); ?>

  <?php while (have_posts()) : the_post(); ?>

    <?php the_content(); ?>

  <?php endwhile; ?>

  <?php get_template_part('template-parts/footer/footer'); ?>

  <?php get_footer(); ?>

</body>

</html>
