<?php

// <title>タグを自動出力します
add_theme_support('title-tag');

/**
 * <title>タグを任意の形式で出力したい場合はこちらを編集します
 * @param array $title['title'] タイトル
 * @param array $title['page'] 分割されている場合のページ番号
 * @param array $title['tagline'] フロントページの場合のキャッチフレーズ
 * @param array $title['site'] フロントページでない場合のサイト名
 */

add_filter('document_title_parts', 'custom_title_output');
function custom_title_output($title)
{
  // if (is_post_type_archive('xo_event')) {
  //   $title['title'] = 'イベント / カレンダー';
  // }

  // トップページではキャッチフレーズを非表示
  if (is_home() || is_front_page()) {
    unset($title['tagline']);
  }

  return $title;
}

// 区切り線を追加します
add_filter('document_title_separator', 'change_title_separator');
function change_title_separator($sep)
{
  $sep = '|';
  return $sep;
}
