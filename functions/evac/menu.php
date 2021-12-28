<?php
// admin_barを全部非表示
// add_filter('show_admin_bar', '__return_false');

/**
 * admin_barの各項目を個別で非表示にします
 * 表示したい項目があればコメントアウトしてください
 */

add_action('admin_bar_menu', 'my_remove_adminbar_menu', 201);
function my_remove_adminbar_menu($wp_admin_bar) {
  // var_dump($wp_admin_bar); // 調査用
  $wp_admin_bar->remove_menu('wp-logo');      // WPロゴ
  // $wp_admin_bar->remove_menu('site-name');    // サイト名
  $wp_admin_bar->remove_menu('view-site');    // サイト名 -> サイトを表示
  $wp_admin_bar->remove_menu('dashboard');    // サイト名 -> ダッシュボード (公開側)
  $wp_admin_bar->remove_menu('themes');       // サイト名 -> テーマ (公開側)
  $wp_admin_bar->remove_menu('customize');    // サイト名 -> カスタマイズ (公開側)
  $wp_admin_bar->remove_menu('menus');        // サイト名 -> メニュー
  $wp_admin_bar->remove_menu('comments');     // コメント
  $wp_admin_bar->remove_menu('updates');      // 更新
  $wp_admin_bar->remove_menu('view');         // 投稿を表示
  $wp_admin_bar->remove_menu('new-content');  // 新規
  $wp_admin_bar->remove_menu('new-post');     // 新規 -> 投稿
  $wp_admin_bar->remove_menu('new-media');    // 新規 -> メディア
  $wp_admin_bar->remove_menu('new-link');     // 新規 -> リンク
  $wp_admin_bar->remove_menu('new-page');     // 新規 -> 固定ページ
  $wp_admin_bar->remove_node('edit');         // 固定ページを編集
  $wp_admin_bar->remove_menu('new-user');     // 新規 -> ユーザー
  // $wp_admin_bar->remove_menu('my-account');   // マイアカウント
  // $wp_admin_bar->remove_menu('user-info');    // マイアカウント -> プロフィール
  // $wp_admin_bar->remove_menu('edit-profile'); // マイアカウント -> プロフィール編集
  // $wp_admin_bar->remove_menu('logout');       // マイアカウント -> ログアウト
  $wp_admin_bar->remove_menu('search');       // 検索 (公開側)
  $wp_admin_bar->remove_node('autoptimize'); // Autoptimize
  // $wp_admin_bar->remove_node('all-in-one-seo-pack'); // プラグイン All in One SEO Pack
}

// 管理画面の更新通知を非表示
add_action('admin_init', function () {
  remove_action('admin_notices', 'update_nag', 3);
});

// 外観＞メニューをサポート
add_action('init', function () {
  // メニューをサポート
  register_nav_menus([
    'global_nav' => 'グローバルナビゲーション',
  ]);
});
