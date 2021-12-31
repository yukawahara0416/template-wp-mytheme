<?php

/**
 * head内のタグを制御します
 */

add_action('wp_enqueue_scripts', function () {
  // WP標準のjQueryを読み込まない
  wp_deregister_script('jquery');
  // ブロックエディタ関連
  wp_deregister_style('wp-block-library');
  wp_deregister_style('wp-block-library-theme');
  // アイコンフォント
  // wp_deregister_style('dashicons');
  // アドミンバー
  // wp_deregister_style('admin-bar');
});

// 外部ドメインの先行読み込み機能「DNSプリフェッチ」
add_filter('wp_resource_hints', function ($hints, $relation_type) {
  if ('dns-prefetch' === $relation_type) {
    return array_diff(wp_dependencies_unique_hosts(), $hints);
  }
  return $hints;
}, 10, 2);

// URLの正規化に必要なrel=”canonical”
remove_action('wp_head', 'rel_canonical');
add_action(
  'wp_head',
  function () {
    $canonical = esc_url(home_url());

    if (is_home() || is_front_page()) $canonical = esc_url(home_url());
    if (is_category()) $canonical = get_category_link(get_query_var('cat'));
    if (is_tag()) $canonical = get_tag_link(get_queried_object()->term_id);
    if (is_tax()) $canonical = get_term_link(get_queried_object()->term_id);
    if (is_search()) $canonical = get_search_link();
    if (is_page() || is_single()) $canonical = get_permalink();

    global $paged;
    global $page;
    if ($paged >= 2 || $page >= 2) $canonical .= 'page/' . max($paged, $page) . '/';

    echo '<link rel="canonical" href="' . $canonical . '">' . "\n";
  }
);

// 短縮URL
remove_action('wp_head', 'wp_shortlink_wp_head');

// RSSフィードを出力するタグ
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

// Really Simple Discoveryへのリンクを出力するタグ
// 外部ブログ投稿ツールを使用する場合はコメントアウト
remove_action('wp_head', 'rsd_link');

// Windows Live Writerを出力するタグ
// Windows Live Writerを使用する場合はコメントアウト
remove_action('wp_head', 'wlwmanifest_link');

// indexページへのリンク
remove_action('wp_head', 'index_rel_link');

// 分割ページへのリンク
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);

// 前後ページへのリンク
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// WPバージョンを出力するタグ
remove_action('wp_head', 'wp_generator');

// 絵文字関連JS/CSS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
add_filter('emoji_svg_url', '__return_false');

// 埋め込み機能
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// recentcommentsインラインスタイル削除
function remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');

// ファビコンを非表示
add_action('do_faviconico', function () {
  exit;
});
