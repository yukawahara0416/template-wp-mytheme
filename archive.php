<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<<<<<<< HEAD
<body>
  <header>
    <?php get_template_part(('template-parts/header/header')); ?>
  </header>
=======
<body <?php body_class(); ?>>

  <?php get_template_part(('template-parts/header/header')); ?>
>>>>>>> origin/master

  <section>
    <h1><?php the_archive_title(); ?>一覧</h1>
    <div><?php the_archive_description(); ?></div>
    <div><?php post_type_archive_title(); ?></div>

    <div>
      <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('template-parts/content/content-excerpt', get_post_type()); ?>
        <?php endwhile; ?>

        <?php pagination($wp_query->max_num_pages, get_query_var('paged')); ?>

      <?php else : ?>
        <?php get_template_part('template-parts/content/content-none'); ?>

      <?php endif; ?>
    </div>
  </section>

<<<<<<< HEAD
  <footer>
    <?php get_template_part('template-parts/footer/footer'); ?>
  </footer>
=======
  <?php get_template_part('template-parts/footer/footer'); ?>
>>>>>>> origin/master

  <?php get_footer(); ?>

</body>

<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> origin/master
