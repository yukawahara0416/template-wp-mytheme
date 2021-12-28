<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body>
  <header>
    <?php get_template_part(('template-parts/header/header')); ?>
  </header>

  <section>
    <h1><?php get_date_title(); ?>のおしらせ⼀覧</h1>

    <div>
      <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('template-parts/content/content-excerpt'); ?>
        <?php endwhile; ?>

        <?php pagination($wp_query->max_num_pages, get_query_var('paged')); ?>

      <?php else : ?>
        <?php get_template_part('template-parts/content/content-none'); ?>

      <?php endif; ?>
    </div>

    <?php navigation_month(); ?>
  </section>

  <footer>
    <?php get_template_part('template-parts/footer/footer'); ?>
  </footer>

  <?php get_footer(); ?>

</body>

</html>