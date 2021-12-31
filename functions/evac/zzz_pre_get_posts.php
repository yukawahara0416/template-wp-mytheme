<?php

/**
 * メインループを書き換え
 */

add_action('pre_get_posts', 'set_pre_get_posts');
function set_pre_get_posts($query)
{
  if (is_admin() || !$query->is_main_query()) { // おまじない
    return;
  }

  if ($query->is_archive()) {
    $query->set('posts_per_page', '10');
    return;
  }

  if ($query->is_search()) {
    $query->set('posts_per_page', '10');
    return;
  }
}
