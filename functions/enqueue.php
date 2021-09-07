<?php

/**
 * JavaScript、CSSをインクルードします。
 *
 * wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
 * wp_enqueue_style($handle, $src, $deps, $ver, $media);
 * @param string $handle スクリプト名（自由）
 * @param string $src	ファイルのURL
 * @param array  $deps 依存するスクリプト名　例）array('jquery')
 * @param string $ver	バージョン名（自由） 例）'1.0.1'
 * @param bool   $in_footer	スクリプトの読込位置 false(default):</head>直前、true:</body>直前
 * @param string $media 例）'all'、'screen'、'handheld'、'print'
 */

add_action('wp_enqueue_scripts', 'my_enqueue_style_script');
function my_enqueue_style_script()
{
  wp_enqueue_script('main', _get_source_url('/js/main.js'), [], '1.0.1', true);

  // Bootstrap5 GRIDのみ
  // wp_enqueue_script('bootstrap', _get_source_url('/css/vendors/bootstrap-grid.min.css'), [], '1.0.1', true);

  // wp_enqueue_style('thumbnail', _get_source_url('/css/thumbnail.css')), [], '1.0.1', 'all'); // thumbnailをCSSだけでトリミング
  // if (is_archive()) {
  //   wp_enqueue_style('pagination', _get_source_url('/css/pagination.css')), [], '1.0.1', 'all'); // ページャ
  // }
  // if (is_singular()) {
  //   wp_enqueue_style('navigation', _get_source_url('/css/navigation.css')), [], '1.0.1', 'all'); // 前の記事・次の記事
  // }

}


/**
 * jQueryをWP標準からGoogle謹製に差し替えます。
 */

add_action('wp_enqueue_scripts', 'replacement_jquery');
function replacement_jquery()
{
  wp_deregister_script('jquery'); // WP標準のjQueryを解除
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', false, '3.4.1', false); // Google謹製のjQueryを読込
  wp_enqueue_script('jquery'); // jQueryを差し替え
}


/**
 * JavaScript、CSSを削除します。
 * wp_deregister_style($handle);
 * wp_deregister_script($handle);
 * @param string $handle スクリプト・スタイル名（-js/-cssを除いた文字列）
 */

add_action('wp_enqueue_scripts', 'remove_files');
function remove_files()
{
  // 任意のプラグインが有効の場合、WP標準のjQueryを使用します
  // include_once(ABSPATH . 'wp-admin/includes/plugin.php');
  // if (!is_plugin_active('query-monitor/query-monitor.php')) {
  //   wp_deregister_script('jquery'); // WP標準のjQueryを解除
  // }

  // wp_deregister_style('wp-block-library'); // ブロックエディタ
  // wp_deregister_style('wp-block-library-theme');
  // wp_deregister_style('dashicons'); // アイコンフォント
  // wp_deregister_style('admin-bar'); // admin-bar
}
