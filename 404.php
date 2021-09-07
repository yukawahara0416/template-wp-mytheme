<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>

  <?php get_template_part(('template-parts/header/header')); ?>

  <h1 class="page-title">
    That page can't be found.<br>
    お探しのページは見つかりませんでした。
  </h1>

  <div class="page-content">
    <p>お手数ですが、いくつかのキーワードで検索してください。</p>
    <?php get_search_form(); ?>
  </div>

  <?php get_template_part('template-parts/footer/footer'); ?>

  <?php get_footer(); ?>

</body>

</html>
