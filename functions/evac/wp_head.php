<?php

/**
 * canonicalを返します。
 * ページネーションがある場合は、ページ情報を追記して返します。
 */

remove_action('wp_head', 'rel_canonical');

add_action('wp_head', 'add_canonical');
function add_canonical()
{
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


/**
 * head内の余計なタグを削除します。
 */

remove_action('wp_head', 'wp_generator'); // <meta>WPのバージョン
remove_action('wp_head', 'rsd_link'); // ブログ編集ツールからの投稿
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writerからの投稿
remove_action('wp_head', 'wp_shortlink_wp_head'); // 短縮URL
remove_action('wp_head', 'feed_links_extra'); // RSSフィードのURLの削除

add_action('init', 'disable_emojis'); // 絵文字関連
function disable_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  // add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
function remove_dns_prefetch($hints, $relation_type)
{
  if ('dns-prefetch' === $relation_type) {
    return array_diff(wp_dependencies_unique_hosts(), $hints);
  }
  return $hints;
}
