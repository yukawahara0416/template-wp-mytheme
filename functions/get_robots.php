<?php

/**
 * robotsを返します。
 * Googleにインデックス化してほしくないページタイプを任意に指定しています。
 *
 * @return string 返したいrobots情報です。
 */

function _get_robots()
{
  if (is_tag() || is_date() || is_year() || is_author() || is_search() || is_404()) {
    return 'noindex,follow';
  } else {
    return 'index,follow';
  }
}
