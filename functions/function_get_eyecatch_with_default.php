<?php

/**
 * アイキャッチ画像データを配列で返します。
 * アイキャッチ画像が設定されていない場合は、標準画像を配列で返します。
 *
 * @param string|array $size 画像サイズ（thumbnail,medium,large,full,[100,100]）デフォルトはlarge
 * @return array $img アイキャッチ画像もしくは標準画像データ
 *                   [0] => url
 *                   以下、has_post_thumbnailがtrueの場合のみ
 *                   [1] => width
 *                   [2] => height
 *                   [3] => 真偽値: リサイズされいている場合は true、元のサイズの場合は false
 */

function _get_eyecatch_with_default($size = 'large')
{
  if (has_post_thumbnail()) :
    $id = get_post_thumbnail_id();
    $img = wp_get_attachment_image_src($id, $size);
  else :
    $img = [_get_source_url('/img/default_150x150.png')];
  endif;

  return $img;
}
