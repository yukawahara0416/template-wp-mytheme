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
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <div>
          <a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
            <h3><?php the_excerpt(); ?></h3>
          </a>
        </div>
        <hr>
      <?php endwhile; ?>

      <!-- Pager -->
      <div class="clearfix">
        <?php
        $link = get_previous_posts_link('&larr; 新しい記事へ');
        if ($link) {
          $link = str_replace('<a', '<a class="btn btn-primary float-left"', $link);
          echo $link;
        }
        ?>
        <?php
        $link = get_next_posts_link('古い記事へ &rarr;');
        if ($link) {
          $link = str_replace('<a', '<a class="btn btn-primary float-right"', $link);
          echo $link;
        }
        ?>

      </div>
    <?php else : ?>
      <p>記事が見つかりませんでした</p>
    <?php endif; ?>
  </section>

  <section>
    <h2>おしらせ一覧</h2>
    <div>
      <?php
      $args = array(
        'post_type' => 'post',
        'category_name' => 'news',
        'post_status' => 'publish',
        'posts_per_page' => 4,
      );

      $query = new WP_Query($args);
      ?>

      <?php if ($query->have_posts()) : ?>

        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <?php get_template_part('template-parts/content/content-excerpt'); ?>
        <?php endwhile; ?>

      <?php else : ?>

        <?php get_template_part('template-parts/content/content-none'); ?>

      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <nav>
      <a href="<?php echo esc_url(home_url('/news')); ?>">おしらせ一覧</a>
    </nav>
  </section>

  <footer>
    <?php get_template_part('template-parts/footer/footer'); ?>
  </footer>

  <?php get_footer(); ?>

</body>

</html>