<?php

/**
 * robotsを返します。
 * Googleにインデックス化してほしくないページタイプを任意に指定しています。
 *
 * @return string 返したいrobots情報です。
 */


function _get_robots() {
  // トップページ、投稿ページ、固定ページ、カスタム投稿タイプ、カテゴリー1ページ目、タグ1ページ目、ターム1ページ目を想定しています
  if (is_front_page() || (is_singular() && !is_page('gutenberg')) || (is_archive() && !is_paged()) || (is_post_type_archive() && !is_paged())) {
    return 'index,follow';
  } else {
    // インデックスは拒否するが、リンクはたどらせます
    return 'noindex,follow';
  }
}

// function _get_robots() {
//   if (is_tag() || is_date() || is_year() || is_author() || is_search() || is_404()) {
//     // インデックスは拒否するが、リンクはたどらせる
//     return 'noindex,follow';
//   } else {
//     return 'index,follow';
//   }
// }
