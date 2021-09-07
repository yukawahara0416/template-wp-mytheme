<?php

/**
 * the_archive_title()から余計な文言を削除
 */

add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_date()) {
    $title = get_the_time('Y年 n月');
  } elseif (is_post_type_archive()) {
    $title = esc_html(get_post_type_object(get_post_type())->label);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_tax()) {
    $title = single_term_title('', false);
  } elseif (is_404()) {
    $title = '404 Not Found';
  } else {
  }
  return $title;
});

function get_date_title()
{
  global $wp_query;
  $date = null;
  if (array_key_exists('year', $wp_query->query)) {
    $date .= get_query_var('year') . '年';
  }
  if (array_key_exists('monthnum', $wp_query->query)) {
    $date .= get_query_var('monthnum') . '月';
  }
  if (array_key_exists('day', $wp_query->query)) {
    $date .= get_query_var('day') . '日';
  }

  echo $date;
}
