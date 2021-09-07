<?php

/**
 * ページネーション出力関数
 * url https://wemo.tech/978
 * @param float $pages 全ページ数 $MaxNumPages = $query->max_num_pages;
 * @param integer $paged 現在のページ $paged = get_query_var('paged') ? get_query_var('paged') : 1;
 * @param integer $range 左右に何ページ表示するか。引数を指定しない場合は2。
 * @param boolean $show_only 1ページしかない時に表示するかどうか。引数を指定しない場合は表示しない。
 */

function pagination($pages, $paged, $range = 99, $show_only = true)
{
  $pages = (int) $pages;    // 明示的にint型へ
  $paged = $paged ?: 1;       // get_query_var('paged')をそのまま投げても大丈夫なように

  //表示テキスト
  $text_before  = '<img src="' . _get_source_url('/img/Common/Arrow-Left@2x.png') . '">';
  $text_next    = '<img src="' . _get_source_url('/img/Common/Arrow@2x.png') . '">';

  // １ページのみで表示設定が true の時
  if ($show_only && $pages === 1) {
    echo '<a></a><ul><li><a class="Current">1</a></li></ul><a></a>';
    return;
  }

  // １ページのみで表示設定が false の時
  if ($pages === 1) return;

  // ２ページ以上の時
  if ($pages !== 1) {
    // 「前へ」 の表示
    if ($paged > 1) {
      echo '<a href="', get_pagenum_link($paged - 1), '" class="Btn">', $text_before, '</a>';
    } else {
      echo '<a></a>';
    }

    // ページ番号を表示
    echo '<ul>';
    for ($i = 1; $i <= $pages; $i++) {
      if ($i <= $paged + $range && $i >= $paged - $range) {
        if ($paged === $i) {
          echo '<li><a class="Current">', $i, '</a></li>';
        } else {
          echo '<li><a href="', get_pagenum_link($i), '">', $i, '</a></li>';
        }
      }
    }
    echo '</ul>';

    // 「次へ」 の表示
    if ($paged < $pages) {
      echo '<a href="', get_pagenum_link($paged + 1), '" class="Btn">', $text_next, '</a>';
    } else {
      echo '<a></a>';
    }
    echo '</div>';
  }
}
