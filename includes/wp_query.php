<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
  'post_type' => get_query_var('post_type'),
  'post_status' => 'publish',
  // CFでソート
  'meta_key' => '',
  'orderby' => 'meta_value',
  'order' => 'DESC',
  'posts_per_page' => 10,
  'paged' => $paged,
  // 複数の条件
  'meta_query' => array(
    'relation' => 'OR',
    array(
      'relation' => 'AND',
      array(
        'key' => '',
        'value' => '',
        'compare' => '>=',
        'type' => 'DATE'
      ),
      array(
        'key' => '',
        'value' => '',
        'compare' => '<=',
        'type' => 'DATE'
      )
    ),
    array(
      'relation' => 'AND',
      array(
        'key' => '',
        'value' => '',
        'compare' => '>=',
        'type' => 'DATE'
      ),
      array(
        'key' => '',
        'value' => '',
        'compare' => '<=',
        'type' => 'DATE'
      )
    )
  )
);

$query = new WP_Query($args);

$MaxNumPages = $query->max_num_pages;

if ($query->have_posts()) :
  while ($query->have_posts()) : $query->the_post();
    get_template_part('template-parts/content/content-excerpt');
  endwhile;

  pagination($MaxNumPages, $paged);

else :
  get_template_part('template-parts/content/content-none');
endif;
wp_reset_postdata();
