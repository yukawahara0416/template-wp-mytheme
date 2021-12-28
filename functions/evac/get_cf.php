<?php

/**
 * カスタムフィールドの値を返します。
 * 引数で指定されたカスタムフィールドの値を返します。
 * 引数に何も指定されない場合は、カスタムフィールド全体を連想配列で返します。
 *
 * @param string $field カスタムフィールド名
 * @return string|integer|array カスタムフィールドの値、グループの場合は連想配列
 */

function _get_cf($field = '')
{
  // return get_post_meta(get_the_ID(), 'cf_name', true); // 値で返す
  // return get_post_meta(get_the_ID(), 'cf_name', true); // 配列で返す
  // return SCF::get('cf_name'); // グループの場合連想配列で返す
  return get_post_meta(get_the_ID(), "{$field}", true);
}

/**
 * HTMLタグと改行を削除した１行のテキストを返します。
 *
 * @param string $text テキスト（HTMLタグ、改行を含んでいても可）
 * @return string $text 整形された１行テキスト
 */

function _remove_extra_from_text($text)
{
  $text = strip_tags($text, '除外したいタグ'); // htmlタグを削除
  $text = str_replace(array("\r\n", "\r", "\n"), '', $text); // 改行コードを削除
  return $text;
}
