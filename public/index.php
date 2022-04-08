<?php
// define — 名前を指定して定数を定義する ROOT_PTH
// str_replace 'public'を''置き換え
// $_SERVER["DOCUMENT_ROOT"] を取得すると、これはapacheに設定されているデフォルトのドキュメントルートとなる
define('ROOT_PATH',str_replace('public','',$_SERVER["DOCUMENT_ROOT"]));
// parse_url 引数に指定された文字列をURLとし、URLの構成要素ごとに分解して返す関数です。
// $_SERVER['REQUEST_URI'] でURI(ドメイン以下のパス)を取得
$parse = parse_url($_SERVER["REQUEST_URI"]);

if(mb_substr($parse['path'], -1) === '/') {
   $parse['path'] .= $_SERVER["SCRIPT_NAME"];
}
require_once(ROOT_PATH.'views'.$parse['path']);
