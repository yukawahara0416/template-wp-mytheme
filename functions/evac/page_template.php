<?php

add_filter('page_template_hierarchy', 'my_page_templates'); // 固定ページ命名規則をカスタマイズ　例）page-map__yuugu.php,　page-map__yuugu__hoge.php
function my_page_templates($templates)
{
  global $wp_query;

  $template = get_page_template_slug();
  $pagename = $wp_query->query['pagename'];

  if ($pagename && !$template) {
    $pagename = str_replace('/', '__', $pagename);
    $decoded = urldecode($pagename);

    if ($decoded == $pagename) {
      array_unshift($templates, "page-{$pagename}.php");
    }
  }

  return $templates;
}
