<?php

/**
 * 不要なページをリダイレクトさせる
 */

// 404.phpへリダイレクトさせる場合
add_filter('parse_query', function ($query) {
  if (is_attachment() || is_author()) {
    $query->set_404();
    status_header(404);
    nocache_headers();
  }
});


// front-page.phpへリダイレクトさせる場合
// add_action('template_redirect', function () {
//   if (is_attachment() || is_author()) {
//     nocache_headers();
//     wp_safe_redirect(esc_url(home_url()));
//     exit;
//   }
// });
