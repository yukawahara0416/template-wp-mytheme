<?php

/**
 * 投稿の記事一覧にカラムを追加します。
 * 追加したカラムでソートも行うことができます。
 */

// カラムを表示します
add_filter('manage_posts_columns', function ($columns) {
  // カラムの最後に追加されます
  $columns['thumbnail'] = 'アイキャッチ画像';
  // カラムの順番を変更する場合
  // $columns = [
  //   'cb' => '<input type="checkbox">',
  //   'title' => 'タイトル',
  //   'thumbnail' => 'サムネイル',
  //   'author' => '投稿者',
  //   'categories' => 'カテゴリー',
  //   'tags' => 'タグ',
  //   'comments' => 'コメント',
  //   'date' => '日付'
  // ];
  return $columns;
});

// カラムに内容を表示します
add_action('manage_posts_custom_column', function ($column_name, $post_id) {
  if ($column_name == 'thumbnail') {
    $thumb_img = get_the_post_thumbnail($post_id, 'thumbnail');
    // 値がなければ「-」と表示します
    echo $thumb_img ?: '-';
  }
}, 10, 2);

// ソートできるようにします
add_filter("manage_edit-post_sortable_columns", function ($columns) {
  $columns['thumbnail'] = 'thumbnail';
  return $columns;
});


/**
 * カスタム投稿タイプの記事一覧にカラムを追加します。
 * 追加したカラムでソートも行うことができます。
 *
 * @var string カスタム投稿タイプ名
 */

$post_type = 'book';

// カラムを追加します
add_filter("manage_edit-{$post_type}_columns", function ($columns) {
  // カラムの最後に追加されます
  $columns['menu_order'] = '順序';
  // カラムの順番を変更する場合
  // $columns = [
  //   'cb' => '<input type="checkbox">',
  //   'title' => 'タイトル',
  //   'menu_order' => '順序',
  //   'author' => '投稿者',
  //   'categories' => 'カテゴリー',
  //   'tags' => 'タグ',
  //   'comments' => 'コメント',
  //   'date' => '日付'
  // ];
  return $columns;
});

// カラムに内容を表示します
add_action("manage_{$post_type}_posts_custom_column", function ($column_name, $post_id) {
  if ($column_name == 'menu_order') {
    echo get_post_field('menu_order', $post_id);
  }
}, 10, 2);

// ソートできるようにします
add_filter("manage_edit-{$post_type}_sortable_columns", function ($columns) {
  $columns['menu_order'] = 'menu_order';
  return $columns;
});
