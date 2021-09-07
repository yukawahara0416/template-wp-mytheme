<?php

/**
 * リソースファイルの参照先を返します。
 * ここで切り替えることで参照先を一括変換することができます。
 * 使用例：　<?php echo _get_source_url('/img/1920x1280.jpg'); ?>
 *
 * @param string $dir 参照先URL移行のディレクトリ情報です。
 * @return string 参照先URLを返します。
 */

function _get_source_url($dir)
{
  // public_html直下の場合
  return esc_url(home_url($dir));

  // 親テーマの場合
  // return esc_url(get_template_directory_uri() . $dir);

  // 子テーマの場合
  // return esc_url(get_stylesheet_directory_uri() . $dir);

  // プラグイン「My Snow Monkey」を使用しているの場合
  // return esc_url(MY_SNOW_MONKEY_URL . $dir);
}
