<?php

/**
 * 現在のカテゴリかどうかチェックして、任意の文字列を返します
 * @param string $type 取得方法を選択します（singleならget_the_categoryで取得し、archiveならglobalから取得します）
 * @param string $term カテゴリ名
 * @return string $str 返したい文字列（指定がない場合は'On'を返します）
 */

function _is_current_term($type = 'single', $term, $str = 'On') {
  if ($type == 'single') {
    // カテゴリ名を配列化します
    $array = array_column(get_the_category(), 'slug');
    // 配列内にカテゴリ名が存在するかチェックします
    if (in_array($term, $array)) {
      echo $str;
    } else {
      return false;
    }
  }

  if ($type == 'archive') {
    global $wp_query;
    if ($term == $wp_query->query['category_name']) {
      echo $str;
    } else {
      return false;
    }
  }
};
