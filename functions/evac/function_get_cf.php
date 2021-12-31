<?php

/**
 * カスタムフィールドの値を返します。
 * 引数で指定されたカスタムフィールドの値を返します。
 * 引数に何も指定されない場合は、カスタムフィールド全体を連想配列で返します。
 *
 * @param string $field カスタムフィールド名
 * @return string|integer|array カスタムフィールドの値、グループの場合は連想配列
 */

function _get_cf($field = '') {
  // return get_post_meta(get_the_ID(), 'cf_name', true); // 値で返す
  // return get_post_meta(get_the_ID(), 'cf_name', true); // 配列で返す
  // return SCF::get('cf_name'); // グループの場合連想配列で返す
  return get_post_meta(get_the_ID(), "{$field}", true);
}
