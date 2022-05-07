<?php 

// Classicエディターを有効にする
// add_filter('use_block_editor_for_post', '__return_false', 10);

// ブロックエディタのフルスクリーンモードをはじめから解除します
// プラグイン「disable-block-editor-fullscreen-mode」の代用
add_action( 'enqueue_block_editor_assets','dbef_disable_editor_fullscreen_by_default' );
function dbef_disable_editor_fullscreen_by_default() {
	$script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
	wp_add_inline_script( 'wp-blocks', $script );
}

// 指定したブロックのみ使用可能にする
// プラグイン「Disable Gutenberg Blocks – Block Manager」の代用
// add_filter( 'allowed_block_types_all', 'my_plugin_allowed_block_types_all', 10, 2 );
// function my_plugin_allowed_block_types_all( $allowed_block_types, $block_editor_context ) {
// 	// 許可するブロックタイプ
// 	$allowed_block_types = array(
// 		'core/paragraph', // 段落
// 		'core/heading',   // 見出し
// 		'core/image',     // 画像
// 	);
// 	return $allowed_block_types;
// }

// 投稿画面から不要な項目を削除する
// 投稿の場合は第一引数を'post'、固定ページの場合は'page'とする
add_action( 'init', 'remove_post_support' );
function remove_post_support() {
  // remove_post_type_support('','title');           // タイトル
  // remove_post_type_support('', 'editor');         // 本文
  // remove_post_type_support( '', 'author' );              // 投稿者
  // remove_post_type_support( '', 'post-formats' );        // 投稿フォーマット
  // remove_post_type_support( '', 'revisions' );           // リビジョン
  // remove_post_type_support( '', 'thumbnail' );           // アイキャッチ
  // remove_post_type_support( '', 'excerpt' );             // 抜粋
  // remove_post_type_support( '', 'comments' );            // コメント
  // remove_post_type_support( '', 'trackbacks' );          // トラックバック
  // remove_post_type_support( '', 'custom-fields' );       // カスタムフィールド
  // remove_post_type_support('','page-attributes'); // 表示順
  // remove_post_type_support('','post-formats');    // 投稿フォーマット
  // unregister_taxonomy_for_object_type( 'category', 'post' ); // カテゴリー
  // unregister_taxonomy_for_object_type( 'post_tag', 'post' ); // タグ
}

// 投稿画面に必要な項目を追加する
// 投稿の場合は第一引数を'post'、固定ページの場合は'page'とする
add_action('init', 'add_post_support');
function add_post_support()
{
  // add_post_type_support('', 'excerpt'); // 抜粋欄
}

// 投稿画面に説明文を追加（Classicエディター）
// add_filter('admin_post_thumbnail_html', 'add_featured_image_instruction');
// function add_featured_image_instruction($content)
// {
//   return $content .= '
//     <p class="description">
//       推奨サイズ：1920px × 1280px
//     </p>';
// }

// 管理画面にJS/CSSファイルを読み込み
add_action( 'admin_enqueue_scripts', 'my_admin_enqueue_style_script' );
function my_admin_enqueue_style_script() {
  // wp_enqueue_script( 'my-plugin-js', _get_source_url('/js/test.js'), [ 'wp-dom', 'wp-element', 'wp-hooks' ], '1.0.1', true );
}

/**
 * 自動整形の<p>タグを消す
 */

remove_filter('term_description', 'wpautop'); // 投稿タイプを指定せず消す

add_filter('the_content', 'wpautop_filter', 9); // 投稿タイプを指定して消す
function wpautop_filter($content)
{
  global $post;
  $remove_filter = false;

  $arr_types = array('page'); //自動整形を無効にする投稿タイプを記述 ＝固定ページ
  $post_type = get_post_type($post->ID);
  if (in_array($post_type, $arr_types)) {
    $remove_filter = true;
  }

  if ($remove_filter) {
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
  }

  return $content;
}