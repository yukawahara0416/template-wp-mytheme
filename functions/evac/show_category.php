<?php

/**
 * その記事のカテゴリーを表示させる
 * @param string $term 返されるオブジェクトのメンバー変数
 * https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/get_the_category#Return_Values
 * @param boolean $link リンクの有無
 * @param string $delimiter 区切り文字
 */

function show_category($term = 'name', $html = true, $link = false, $delimiter = null)
{
  $cats = get_the_category();
  $tmp = $cats;

  if (!$cats) {
    return false;
  }

  foreach ($cats as $cat) {
    $cat_id = $cat->term_id;
    $cat_link = get_category_link($cat_id);

    // 出力部分
    if (!$html) {
      return $cat->$term;
      break;
    }

    if ($link) {
      echo '<div><a href="' . $cat_link . '">' . $cat->$term . '</a></div>';
    } else {
      echo '<div>' . $cat->$term . '</div>';
    }
    if ($delimiter && next($tmp)) {
      echo $delimiter;
    }
  }
}
