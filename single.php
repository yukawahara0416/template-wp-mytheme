<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body>
  <header>
    <?php get_template_part(('template-parts/header/header')); ?>
  </header>

  <article>
    <h1><?php the_title(); ?></h1>

    <?php _show_category($term = 'slug', $html = true, $link = false); ?>

    <?php $img = _get_eyecatch_with_default(); ?>

    <div style="background-image: url('<?php echo $img[0]; ?>')"></div>
    <img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>">

    <section>
      <div>投稿日：<?php the_time('Y.n.j (D)'); ?></div>

      <section><?php the_content(); ?></section>

      <?php if (function_exists('_navigation_post')) _navigation_post(); ?>
    </section>
  </article>

  <footer>
    <?php get_template_part('template-parts/footer/footer'); ?>
  </footer>

  <?php get_footer(); ?>

</body>

</html>