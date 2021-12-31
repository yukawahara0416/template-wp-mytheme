<?php

/**
 * 本番環境かテスト環境かを環境変数で判定します。
 * htaccessで以下のように環境変数をセットしてください。
 * # テスト環境
 * # SetEnv APP_ENV 'develop'
 * # 本番環境
 * # SetEnv APP_ENV 'production'
 *
 * @param string $env 環境変数APP_ENVの値（developならテスト環境、productionなら本番環境）
 * @return boolean 一致すればtrue、一致しなければfalseを返します
 */

function _is_env($env) {
  return $env == getenv('APP_ENV');
}
