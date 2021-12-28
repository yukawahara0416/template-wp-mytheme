<article>
  <figure>
    <?php $img = []; ?>
    <?php if (function_exists('_get_eyecatch_with_default')) $img = _get_eyecatch_with_default(); ?>

    <div style="background-image: url('<?php echo $img[0]; ?>')"></div>
    <img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>">
  </figure>

  <header>
    <?php if (function_exists('show_category')) show_category(); ?>
    <h2><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  </header>

  <div>投稿日：<?php the_time('Y.n.j (D)'); ?></div>

  <div>現在日：<?php echo date_i18n("Y.m.d H:i:s (D)"); ?></div>

  <div>
    <?php if (function_exists('_show_limit_content')) _show_limit_content(25); ?>
  </div>

  <div>
    <?php if (function_exists('_set_new_days_ago')) _set_new_days_ago(7); ?>
  </div>

  <footer></footer>
</article>