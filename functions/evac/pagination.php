<?php

/**
 * ページネーション出力関数
 * url https://wemo.tech/978
 * @param float $pages 全ページ数 $MaxNumPages = $query->max_num_pages;
 * @param integer $paged 現在のページ $paged = get_query_var('paged') ? get_query_var('paged') : 1;
 * @param integer $range 左右に何ページ表示するか。引数を指定しない場合は2。
 * @param boolean $show_only 1ページしかない時に表示するかどうか。引数を指定しない場合は表示しない。
 */

function pagination($pages, $paged, $range = 99, $show_only = true) {
  $pages = (int) $pages;    // 明示的にint型へ
  $paged = $paged ?: 1;       // get_query_var('paged')をそのまま投げても大丈夫なように
?>

  <!-- 1ページしかない時はページネーションを表示しない -->
  <?php if ($show_only === false && $pages === 1) {
    return;
  } ?>

  <!-- 1ページしかない時でもページネーションを表示する -->
  <?php if ($show_only === true && $pages === 1) : ?>

    <ul>
      <li><a class="Current">1</a></li>
    </ul>

    <?php return; ?>
  <?php endif; ?>


  <!-- 「前へ」ボタンを表示する -->
  <?php if ($pages > 1 && $paged > 1) : ?>

    <div class="Left">
      <a href="<?php echo get_pagenum_link($paged - 1); ?>">
        <i class="fas fa-chevron-left"></i>
      </a>
    </div>

  <?php endif; ?>

  <!-- ページ番号を表示する -->
  <ul>

    <?php
    for ($i = 1; $i <= $pages; $i++) :
      if ($i <= $paged + $range && $i >= $paged - $range) :
        if ($paged === $i) :
    ?>
          <!-- 現在のページ -->
          <li><a class="Current"><?php echo $i; ?></a></li>

        <?php else : ?>

          <!-- ほかのページ -->
          <li><a href="<?php echo get_pagenum_link($i); ?>"><?php echo $i; ?></a></li>

    <?php
        endif;
      endif;
    endfor; ?>

  </ul>

  <!-- 「次へ」ボタンを表示する -->
  <?php if ($paged < $pages) : ?>

    <div class="Right"><a href="<?php echo get_pagenum_link($paged + 1); ?>"><i class="fas fa-chevron-right"></i></a></div>

  <?php endif; ?>

<?php } ?>