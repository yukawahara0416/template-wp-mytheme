<?php

// アイキャッチ画像機能を開放
add_theme_support('post-thumbnails');

// アイキャッチ画像の表示方法を指定（リサイズ）
set_post_thumbnail_size(960, 640);

// srcset属性とsizes属性を非表示
add_filter('wp_calculate_image_srcset_meta', '__return_null');

// the_post_thumbnailが生成するimgタグへ任意の属性を入れない
add_filter('post_thumbnail_html', function ($html) {
  // $html = preg_replace('/(width)="\d*"\s/', '', $html);
  $html = preg_replace('/(height)="\d*"\s/', '', $html);
  $html = preg_replace('/ alt=".*\w+"/', ' alt="' . get_the_title() . '"', $html);
  $html = preg_replace('/class=".*\w+"\s/', '', $html);
  return $html;
});
