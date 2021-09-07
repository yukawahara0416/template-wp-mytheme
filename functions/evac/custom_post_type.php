<?php

/**
 * カスタム投稿タイプを追加します。
 * カスタム投稿タイプでタクソノミーを使用可能にします。
 *
 * @var string $post_type カスタム投稿タイプ名
 * @var string $name_cpt 管理画面で表示するタイプ名（単数形）
 * @var array $labels_cpt 管理画面での表示を指定
 * @var array|string $args_cpt カスタム投稿タイプの属性を連想配列または文字列で指定
 * @var string $tax_type タクソノミー名
 * @var string $name_tax 管理画面で表示するタクソノミー名（単数形）
 * @var array|string $args_tax タクソノミーの属性を連想配列または文字列で指定
 */

add_action('init', function () {
  $post_type = 'book';
  $name_cpt = 'Book';

  // $labels_cpt = [
  //   'name'               => "{$name}s",
  //   'singular_name'      => $name,
  //   'add_new'            => '新規追加',
  //   'add_new_item'       => "新規 {$name} を追加",
  //   'edit_item'          => "{$name} を編集",
  //   'new_item'           => "新規 {$name}",
  //   'all_items'          => "{$name}s 一覧",
  //   'view_item'          => "View {$name}",
  //   'search_items'       => "Search {$name}s",
  //   'not_found'          => "{$name} が見つかりません",
  //   'not_found_in_trash' => "ゴミ箱に {$name} が見つかりません",
  //   'parent_item_colon'  => '',
  //   'menu_name'          => "{$name}s"
  // ];

  $args_cpt = [
    'label'              => $name_cpt,
    // 'labels'             => $labels_cpt,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => ['slug' => $post_type],
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-admin-post',
    'supports'           => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'page-attributes']
  ];

  // カスタム投稿タイプを登録します
  register_post_type($post_type, $args_cpt);

  $tax_type = 'genre';
  $name_tax = 'ジャンル';

  $args_tax = [
    'label'              => $name_tax,
    'show_in_rest'       => true,
    'hierarchical'       => true
  ];

  // カテゴリーを使用可能にします
  register_taxonomy($tax_type, $post_type, $args_tax);
});
