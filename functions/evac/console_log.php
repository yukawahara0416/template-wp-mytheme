<?php

/**
 * phpからconsole.logを使用できます。
 * 使用例：　<?php console_log($data); ?>
 *
 * @param $data コンソールに表示したい任意のデータ。
 */

function console_log($data)
{
  echo '<script>';
  echo 'console.log(' . json_encode($data) . ')';
  echo '</script>';
}
