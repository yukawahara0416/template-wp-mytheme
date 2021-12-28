<?php

/**
 * 「/category/」を「/」に置換して表示をなくす
 * プラグイン No Category Base (WPML)が不要になります
 */

add_filter('user_trailingslashit', 'remcat_function');
function remcat_function($link)
{
  return str_replace("/category/", "/", $link);
}

add_action('init', 'remcat_flush_rules');
function remcat_flush_rules()
{
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}

add_filter('generate_rewrite_rules', 'remcat_rewrite');
function remcat_rewrite($wp_rewrite)
{
  $new_rules = array('(.+)/page/(.+)/?' => 'index.php?category_name=' . $wp_rewrite->preg_index(1) . '&paged=' . $wp_rewrite->preg_index(2));
  $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
