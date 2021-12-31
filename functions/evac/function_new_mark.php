<?php

/**
 * 最新記事にNEWマークを付与
 * @param integer $days New!を表示させる日数。引数を指定しない場合は7。
 */

function _new_mark($days = 7) {
  $post_time = get_the_time('U');
  $last = time() - ($days * 24 * 60 * 60);
  if ($post_time > $last) {
    echo '<div><img src="' . _get_source_url('/img/Common/New@2x.png') . '" alt="NEW"></div>';
  }
}

/**
 * 最新の投稿◯件目まではNEWマークを付与
 * @param object $query WP_Queryオブジェクト
 * @param integer $posts New!を表示させる件数。引数を指定しない場合は4。
 */

function set_new_posts_ago($query, $posts = 4) {
  if ($query->current_post < $posts) {
    echo '<div><img src="' . _get_source_url('/img/Common/New@2x.png') . '" alt="NEW"></div>';
  }
}
