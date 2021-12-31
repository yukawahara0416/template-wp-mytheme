<?php

/**
 * JavaScript、CSSをインクルードします。
 *
 * wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
 * 例）wp_enqueue_script('', _get_source_url(''), [], '1.0.1', true);
 * wp_enqueue_style($handle, $src, $deps, $ver, $media);
 * 例）wp_enqueue_style('', _get_source_url(''), [], '1.0.1', 'all');
 * 
 * @param string $handle スクリプト名（自由）
 * @param string $src	ファイルのURL
 * @param array  $deps 依存するスクリプト名　例）array('jquery')
 * @param string $ver	バージョン名（自由） 例）'1.0.1'
 * @param bool   $in_footer	スクリプトの読込位置 false(default):</head>直前、true:</body>直前
 * @param string $media 例）'all'、'screen'、'handheld'、'print'
 */

add_action('wp_enqueue_scripts', 'my_enqueue_style_script');
function my_enqueue_style_script() {
  // <head>直前で読み込むCSSファイル

  // <head>直前で読み込むJSファイル ＊$depsには['jquery']と設定することでjQueryのあとに読み込めます
  // wp_enqueue_script('main', _get_source_url('/js/main.js'), ['jquery'], '1.0.1', false);

  // </body>直前で読み込むCSSファイル

  // </body>直前で読み込むJSファイル

}
