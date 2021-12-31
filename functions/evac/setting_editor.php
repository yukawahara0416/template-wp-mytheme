<?php

add_filter('use_block_editor_for_post', '__return_false', 10); // Classicエディター

add_post_type_support('page', 'excerpt'); // 固定ページに抜粋欄を表示

add_action('init', 'remove_post_support'); // 投稿画面から不要な機能を削除する
function remove_post_support()
{
  // remove_post_type_support('','title');           // タイトル
  // remove_post_type_support('page', 'editor');     // 本文
  // remove_post_type_support('','author');          // 作成者
  // remove_post_type_support('','thumbnail');       // アイキャッチ画像
  // remove_post_type_support('','excerpt');         // 抜粋
  // remove_post_type_support('','trackbacks');      // トラックバック
  // remove_post_type_support('','custom-fields');   // カスタムフィールド
  // remove_post_type_support('','comments');        // コメント
  // remove_post_type_support('','revisions');       // リビジョン
  // remove_post_type_support('','page-attributes'); // 表示順
  // remove_post_type_support('','post-formats');    // 投稿フォーマット
}

/**
 * 自動整形の<p>タグを消す
 */

remove_filter('term_description', 'wpautop'); // 投稿タイプを指定せず消す

add_filter('the_content', 'wpautop_filter', 9); // 投稿タイプを指定して消す
function wpautop_filter($content)
{
  global $post;
  $remove_filter = false;

  $arr_types = array('page'); //自動整形を無効にする投稿タイプを記述 ＝固定ページ
  $post_type = get_post_type($post->ID);
  if (in_array($post_type, $arr_types)) {
    $remove_filter = true;
  }

  if ($remove_filter) {
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
  }

  return $content;
}

/**
 * 投稿画面に説明文を追加
 */

add_filter('admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction($content)
{
  return $content .= '
    <p class="description">
      推奨サイズ：1920px × 1280px
    </p>';
}
