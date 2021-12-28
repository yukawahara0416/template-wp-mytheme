<article>
  <header>
    <?php if (is_singular()) : ?>
      <h1><?php the_title(); ?></h1>
    <?php else : ?>
      <h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
    <?php endif; ?>
  </header>

  <?php $img = _get_eyecatch_with_default(); ?>

  <div style="background-image: url('<?php echo $img[0]; ?>')"></div>
  <img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>">

  <div>
    <?php the_content(); ?>
  </div>

  <footer></footer>
</article>
