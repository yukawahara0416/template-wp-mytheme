<?php

/**
 * タイトル文字数制限
 * @param integer $limit 表示させる文字数。引数を指定しない場合は20
 */

function show_limit_title($limit = 20)
{
  global $post;
  $title = mb_substr(strip_tags(apply_filters('the_title', $post->post_title)), 0, 120);

  if (mb_strlen($title) > $limit) {
    $title = mb_substr($title, 0, $limit);
    $show_title = $title . '･･･';
  } else {
    $show_title = $title;
  }

  echo $show_title;
}
