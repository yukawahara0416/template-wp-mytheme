<?php

/**
 * HTMLタグと改行を削除した１行のテキストを返します。
 *
 * @param string $text テキスト（HTMLタグ、改行を含んでいても可）
 * @return string $text 整形された１行テキスト
 */

function _remove_tag_newline($text) {
  $text = strip_tags($text, '除外したいタグ'); // htmlタグを削除
  $text = str_replace(array("\r\n", "\r", "\n"), '', $text); // 改行コードを削除
  return $text;
}
