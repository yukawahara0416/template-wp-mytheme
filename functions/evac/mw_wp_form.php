<?php

// MW WP Form のkey番号
$key = '';

// MW WP Form バリデーションエラー
add_filter('mwform_error_message_mw-wp-form-' . $hoge, 'my_error_message', 10, 3);
function my_error_message($error, $key, $rule) {
  if ($rule === 'required') {
    return 'お問い合わせ項目を選択してください。';
  }
  if ($rule === 'noempty') {
    if ($key === 'email') return 'メールアドレスを記入してください。';
    if ($key === 'message') return 'メッセージを記入してください。';
  }
  if ($rule === 'katakana') {
    return 'カタカナで記入してください';
  }
  if ($rule === 'E-mail') {
    return 'メールアドレスの形式ではありません';
  }
  if ($rule === 'Tel') {
    return '電話番号の形式ではありません';
  }
  if ($rule === 'eq') {
    return 'Emailアドレスが同じではありません';
  }

  return $error;
}

// MW WP Form バリデーションルール
// ラジオボックス「ビジネス / BUSINESS」選択時は「会社名」を必須とする
add_filter('mwform_validation_mw-wp-form' . $key, 'my_validation_rule', 10, 2);
function my_validation_rule($Validation, $data) {

  if ($data) {
    if ($data['checkbox01'] === 'ビジネス / BUSINESS') {
      $Validation->set_rule('mail_Company', 'noEmpty', array(
        'message' => '入力されていません。'
      ));
    }
  }

  return $Validation;
}
