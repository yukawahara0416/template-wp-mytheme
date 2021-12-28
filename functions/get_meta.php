<?php

/**
 * メタ情報を取得します。
 * 個別ページで本文が存在する場合、本文から指定の文字数を切り抜いて返します。
 *
 * @param string|null $keyword 取得したいOGP情報を指定します。指定しなければすべてのOGP情報が連想配列で返されます。
 * @param integer|null $limit 抜粋の文字数の上限を指定します。指定しなければ上限なし（全文表示）です。
 * @var string $description 抜粋文です。
 * @var string $title タイトルです。
 * @var array $ogp OGPに関係する情報を連想配列でまとめています。
 * @return array $ogp $keywordが指定されている場合は該当する情報を返します。指定されていなければ、OGP情報すべてが連想配列で返されます。
 */

function _get_meta($keyword = null, $limit = null)
{
  $ogp = [
    'title' => _get_title(),
    'description' => _get_description($limit),
    'type' => (is_single()) ? 'article' : 'website',
    'url' => 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    'image' => (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : _get_source_url('/img/og2021.jpg')
  ];

  return ($keyword) ? $ogp[$keyword] : $ogp;
}

/**
 * テンプレートに適したタイトルを返します。
 * プライベート関数_get_meta()内で使用しています。
 * @var string $title タイトルです。
 * @return string $title タイトルを返します。
 */

function _get_title()
{
  $title = get_bloginfo('name'); // デフォルトのタイトル

  // 個別ページ・固定ページ・アーカイブページの場合は、「タイトル | サイト名」で表示します
  if (is_singular() || is_page() || is_archive()) {
    $title = wp_title('|', false, 'right') . $title;
  }

  return $title;
}


/**
 * テンプレートに適したキャッチフレーズを返します。文字数制限を指定することもできます。
 * プライベート関数_get_meta()内で使用しています。
 * @param string|integer|null $limit 文字数の上限を指定します。指定しなければnullとなり上限なし＝全文表示となります。
 * @var string $description キャッチフレーズです。
 * @return string $description キャッチフレーズを返します。
 */

function _get_description($limit)
{
  global $post;
  $description = get_bloginfo('description'); // デフォルトのキャッチフレーズ

  // 個別ページかつ本文がある場合は、本文をキャッチフレーズとして使用します
  if (is_single() && !empty($post->post_content)) {
    $description = apply_filters('the_content', $post->post_content);
    $description = strip_tags($description); // htmlタグを削除
    $description = str_replace(array("\r\n", "\r", "\n"), '', $description); // 改行コードを削除
  }

  // 最大文字数の指定があり、かつ、抜粋が最大文字数より多い場合
  if ($limit && strlen($description) > $limit) {
    $description = mb_substr($description, 0, $limit); // 文字数制限
    $description .= '...'; // 末尾に省略をしめす「...」を追加
  }

  return $description;
}
