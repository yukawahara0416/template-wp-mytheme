<section>
  <header>
    <h1>
      NOT FOUND<br>
      条件に一致する記事はありません。
    </h1>
  </header>

  <div>
    <?php if (is_home() && current_user_can('publish_posts')) : ?>

      <!-- // 記事の投稿を促す処理 -->

    <?php elseif (is_search()) : ?>

      <p>
        申し訳ありませんが、キーワードに一致する記事はありません。<br>
        お手数ですが、ほかのキーワードで再度検索してください。
      </p>

    <?php else : ?>

      <p>
        お探しの記事が見つかりませんでした。<br>
        お手数ですが、いくつかのキーワードで検索してください。
      </p>

      <?php get_search_form(); ?>

    <?php endif; ?>
  </div>
</section>
