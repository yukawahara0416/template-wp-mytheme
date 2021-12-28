<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body>
  <header>
    <?php get_template_part(('template-parts/header/header')); ?>
  </header>

  <h1 class="page-title">
    That page can't be found.<br>
    お探しのページは見つかりませんでした。
  </h1>

  <div class="page-content">
    <p>お手数ですが、いくつかのキーワードで検索してください。</p>
    <?php get_search_form(); ?>
  </div>

  <footer>
    <?php get_template_part('template-parts/footer/footer'); ?>
  </footer>

  <?php get_footer(); ?>

</body>

</html>