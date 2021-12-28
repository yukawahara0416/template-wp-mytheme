<?php

/**
 * 前後の記事をナビゲーション
 * 例）　前の記事　次の記事
 */

function _navigation_post() {
?>
  <nav class="PageBute EntryBute">

    <!-- 前の記事 -->
    <?php if (get_previous_post()) : ?>

      <div class="Left">
        <?php previous_post_link('%link', '<i class="fas fa-chevron-left"></i>'); ?>
      </div>

    <?php else : ?>

      <div></div>

    <?php endif; ?>

    <!-- 次の記事 -->
    <?php if (get_next_post()) : ?>

      <div class="Right">
        <?php next_post_link('%link', '<i class="fas fa-chevron-right"></i>'); ?>
      </div>

    <?php else : ?>

      <div></div>

    <?php endif; ?>

  </nav>
<?php
}
?>

<?php
/**
 * 前後の月をナビゲーション
 * 例）　前月　今月　次月
 */

function navigation_month() {
  echo '<nav>';

  // 年月を取得
  global $wp_query;
  $target_day = $wp_query->query['year'] . '-' . $wp_query->query['monthnum'] . '-01';
  $previous_month = date("Y/m", strtotime($target_day . "-1 month"));
  $this_month = date("Y/m", strtotime($target_day));
  $next_month = date("Y/m", strtotime($target_day . "+1 month"));

  // スラッグを取得
  if (array_key_exists('category_name', $wp_query->query)) {
    $slug = $wp_query->query['category_name'];
  } elseif (array_key_exists('post_type', $wp_query->query)) {
    $slug = $wp_query->query['post_type'];
  } else {
    $slug = null;
  }

  echo '<a href="' . implode("", array(esc_url(home_url('/' . $slug . '/')), $previous_month, '/')) . '">前月</a>';
  echo '<a href="' . implode("", array(esc_url(home_url('/' . $slug . '/')), $this_month, '/')) . '" class="Current">今月</a>';
  echo '<a href="' . implode("", array(esc_url(home_url('/' . $slug . '/')), $next_month, '/')) . '">次月</a>';

  echo '</nav>';
}
