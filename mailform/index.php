<?

// mailform.php release 3 Copyright 2006-2008 TAKEDA Hiroyuki
// http://captcha.jp/mailform/

// [基本仕様]
//
// PHPで書かれています
// UTF-8で書かれています
// http://captcha.jpのCAPTCHAサービスに対応しています
//
// [設置方法]
//
// PHPが実行可能なサーバで、以下のファイルを設置します。
// 括弧内の数字はパーミッションの値です。
//
// /public_html/（任意のディレクトリ）
//      |-- mailform.php (644 or 604)
//      |-- des_64.php(644 or 604)
//
// mailform.php
// スクリプト本体です。
//
// des_64.php
// DES暗号化ライブラリです。
//
// [履歴]
// 2008-11-04 release 3 64bit OSで動くPHPに対応
// 2006-10-10 release 2 DES暗号化、captcha4.phpを使うように変更
// 2006-07-06 release 1 作った
//

// --- 設定部 ------------------------------------------------------------------
// --- 必ず書き換える項目 ------------------------------------------------------
// --- メールの送信先 ----------------------------------------------------------
$mail_to = 'webmaster@yorii-chu.org';

// --- 必要に応じて書き換える項目 ----------------------------------------------
// 送信完了ページを別ページにリダイレクトする場合はURLを書いてください。
// このスクリプトで送信完了ページを出力する場合は空欄です（デフォルト 空欄）
$redirect = '';

// --- CAPTCHA関連  ------------------------------------------------------------
// captcha.jpによるロボットスパム防止を TRUE:使う FALSE:使わない
$captcha = TRUE;
// captcha.jpのアカウントID
$id = '4750';
// DESの秘密鍵
$key = '49745ec8cf03b';
// captchaの桁数
$captcha_length = 4;

// --- プログラム部 ------------------------------------------------------------
// --- 初期化 ------------------------------------------------------------------
$release = '3';
$footer = '<div align="center"><small><a href="http://captcha.jp/mailform/" target="_blank">mailform.php release ' . $release . '<br>&copy;2006-2008 TAKEDA Hiroyuki</a></small></div>';

$base = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$m = $n = 0;

// --- captcha.phpに渡す文字列をランダムに生成し、DESで暗号化してURLエンコード -
if ( $captcha ) {
	require( 'des_64.php' );
	$auth = '';
	$len = strlen( $base ) - 1;
	for ( $n = 0; $n < $captcha_length; $n ++ ) $auth .= substr( $base, rand( 0, $len ), 1 );
	$auth = urlencode( encrypt( $key, $auth ) );
}

// --- 送信 --------------------------------------------------------------------
if ( $_POST['act'] == 'send' ) {
	// --- エラー処理 ----------------------------------------------------------
	if ( $_POST['name'] == '' ) error( '名前が入力されていません' );
	if ( $_POST['email'] == '' ) error( 'メールアドレスが入力されていません' );
	if ( $_POST['keyword'] != '百歳' ) error( '合い言葉が間違っています。お送りした「記念誌」をご覧ください。' );
	//if ( $_POST['subject'] == '' ) error( '件名が入力されていません' );
	//if ( $_POST['body'] == '' ) error( '本文が入力されていません' );

	// --- CAPTCHA -------------------------------------------------------------
	if ( $captcha ) {
		$_POST['auth'] = trim( decrypt( $key, urldecode( $_POST['auth'] ) ) );
		if ( strtoupper( $_POST['charenge'] ) != strtoupper( $_POST['auth'] ) ) error( 'CAPTCHAテストに失敗しました' );
	}

	// --- 送信 ----------------------------------------------------------------
	$_POST['name'] = mb_convert_encoding( $_POST['name'], 'JIS', 'UTF-8' );
	$_POST['subject'] = mb_convert_encoding( '登録申請', 'JIS', 'UTF-8' );
	$_POST['body'] = mb_convert_encoding( $_POST['body'], 'JIS', 'UTF-8' );

	$_POST['subject'] = '=?iso-2022-jp?B?' . base64_encode( $_POST['subject'] ) . '?=';
	$headers = 'From: =?iso-2022-jp?B?' . base64_encode( $_POST['name'] ) . '?= <' . $_POST['email'] . ">";

	mail( $mail_to, $_POST['subject'], $_POST['body'], $headers, $parameter );

	// --- Ccも送信
	if ( $_POST['copy'] != '' ) mail( $_POST['email'], $_POST['subject'], $_POST['body'], $headers, $parameter );

	// --- 送信完了ページ ------------------------------------------------------
	if ( $redirect != '' ) {
		header( "Location: $redirect" );
		exit;
	} else { ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<title>送信しました</title>
</head>
<body>
<h1>送信しました</h1>
登録申請ありがとうございました。<br>
お名前を確認の上、「招待メール」をお送りします。
</body>
</html>
<?
		exit;
	}
}

// --- エラーメッセージ出力 ----------------------------------------------------
function error( $message ) { ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<title>エラーが発生しました</title>
</head>
<body>
<h1>エラーが発生しました</h1>
<?= $message ?><br>
<br>
ブラウザのバックボタンで戻り、もう一度実行してみてください。
</body>
</html>
<?
	exit;
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<title>★登録申請★</title>
</head>
<body>
<div align="center">
<table>
<form action="index.php" method="post">
<input type="hidden" name="act" value="send">
<tr><td bgcolor="#DEE3E7" colspan=2 align="center">★登録申請★（<font color="#CC0000">*</font>は必須項目です）</td></tr>
<tr><td bgcolor="#EEEEEE" nowrap>お名前<font color="#CC0000">*</font></td><td bgcolor="#EEEEEE"><input type=text name="name" size=36></td></tr>
<tr><td bgcolor="#EEEEEE" nowrap>E-Mail<font color="#CC0000">*</font></td><td bgcolor="#EEEEEE"><input type=text name="email" size=36></td></tr>
<tr><td bgcolor="#EEEEEE" nowrap>合い言葉<font color="#CC0000">*</font></td><td bgcolor="#EEEEEE"><input type=text name="keyword" size=36>(記念誌に書かれています)</td></tr>
<tr><td bgcolor="#EEEEEE" nowrap>ひとこと<font color="#CC0000">*</font></td><td bgcolor="#EEEEEE"><textarea rows=15 name="body" cols=56></textarea></td></tr>
<? if ( $captcha ) { // captcha.jpを使うなら ?>
<tr bgcolor="#EEEEEE">
	<td align="right">CAPTCHA</td>
	<td>
		<input type="hidden" name="auth" value="<?= $auth ?>">
		<a href="http://captcha.jp/"><img src="http://captcha.jp/captcha5.php?id=<?= $id ?>&auth=<?= $auth ?>&size=24&filter=no&time=<?= time() ?>" alt="CAPTCHA Image"></a>
		<input type="text" name="charenge" size=8 value="">
		画像の中の文字を入力してください（4文字）
		</td>
</tr>
<? } ?>
<tr>
	<td bgcolor="#EEEEEE" colspan="2" align="center">
		<input type=submit value="- 送信 -">
		<input type=reset value="リセット">
		<input type="checkbox" name="copy" value="on">送信内容のコピーをE-Mailで受信する
	</td>
</tr> 
</form>
</table>
</div>
<?= $footer ?>
</body>
</html>