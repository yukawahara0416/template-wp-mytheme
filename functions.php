<?php

/**
 * 各機能の呼び出し
 * 使用方法： phpファイルを移動することで有効無効を切り替えてください
 * 有効にする： ./functions/にPHPファイルを配置
 * 無効にする： ./functions/evac/にPHPファイルを配置
 */

$template_path = TEMPLATEPATH;
// プラグイン「My Snow Monkey」を使用している場合
// $template_path = MY_SNOW_MONKEY_PATH;

$paths = glob($template_path . '/functions/*.php');
foreach ( $paths as $path ) require $path;