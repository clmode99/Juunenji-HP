<!-- メールフォームからの入力値をチェックするプログラム
参考サイト：https://www.webdesignleaves.com/pr/php/php_contact_form_02.php -->
<?php

// エスケープ処理
function Escape($var) {
	// 配列の場合は、それぞれの要素について再帰で処理を呼び出す
	if(is_array($var)) {
		return array_map('Escape', $var);
	}

	return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
}

// 入力値に不正なデータがないかチェック
function CheckInput($var) {
	// 配列の場合は再帰
	if(is_array($var)) {
		return array_map('CheckInput', $var);
	}

	// NULLチェック
	if(preg_match('/\0/', $var)) {
		die('不正な入力です');
	}
	// エンコードチェック
	if(!mb_check_encoding($var, 'UTF-8')) {
		die('不正な入力です');
	}
	// 改行、タブ文字以外の制御文字チェック
	if(preg_match('/\A[\r\n\t[:^cntrl:]]*\z/u', $var)) {
		die('不正な入力です');
	}

	return $var;
}

?>