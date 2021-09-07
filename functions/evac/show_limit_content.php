<?php

/**
 * 本文文字数制限
 * @param integer $limit 表示させる文字数。引数を指定しない場合は25
 */

function show_limit_content($limit = 25)
{
  global $post;
  $content = mb_substr(strip_tags(apply_filters('the_content', $post->post_content)), 0, 120);

  if (mb_strlen($content) > $limit) {
    $content = mb_substr($content, 0, $limit);
    $show_content = $content . ' ...';
  } else {
    $show_content = $content;
  }

  echo $show_content;
}
