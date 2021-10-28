<?php
/**
 * Copyright (C) 2005-2006 The OpenPNE Project
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
// modified 20061029 info AT itsup DOT net http://www.itsup.net/
// bin/mail.php (ver.2.4.2)を元に修整しています。

chdir(dirname(__FILE__));
require_once './config.inc.php';
require_once OPENPNE_WEBAPP_DIR . '/init.inc';

//m_debug_log(OPENPNE_WEBAPP_DIR);

// エラー出力を抑制
ini_set('display_errors', false);
//ini_set('display_errors', true);
@ob_start();

/**
 * ライブラリ読み込み
 */
require_once 'Log.php';
//require_once 'PNE/KtaiMail.php';//2.2.10用
require_once 'OpenPNE/KtaiMail.php'; //2.4.2用
require_once 'mail/sns.php';


//@@@@@20061020----------------------------------->
// 標準入力からメールデータの読み込み
//$stdin = fopen('php://stdin', 'rb');
//$raw_mail = '';
//do {
//    $data = fread($stdin, 8192);
//    if(strlen($data) == 0) {
//        break;
//    }
//    $raw_mail .= $data;
//} while(true);
//fclose($stdin);


require "chkmail_ini.php";//@@@@@ADD
// コマンドー送信！！
function _sendcmd($sock,$cmd) {
    fputs($sock, $cmd."\r\n");
    $buf = fgets($sock, 512);
    if(substr($buf, 0, 3) == '+OK') {
        return $buf;
    } else {
        die("$cmd => $buf");
    }
    return false;
}
$sock = fsockopen($_MS_host, 110, $err, $errno, 10) or die("サーバーに接続できません");
$buf = fgets($sock, 512);
if(substr($buf, 0, 3) != '+OK') die($buf);
$buf = _sendcmd($sock, "USER $_MS_user");
$buf = _sendcmd($sock, "PASS $_MS_pass");
$data = _sendcmd($sock, "STAT");//STAT -件数とサイズ取得 +OK 8 1234
sscanf($data, '+OK %d %d', $num, $size);

$raw_mail = '';
//メールがない時
if ($num == "0") {
    $buf = _sendcmd($sock, "QUIT"); //バイバイ
    fclose($sock);
    echo "ないとき<br />";
    exit;
// メールがある時
}else{
    echo "あるとき<br />";
    $mail_array=array();
   	// ----- $num件のメールを読み込んだ後削除する
   	for($i=1;$i<=$num;$i++) {
        $raw_mail = '';//1通分のデータを初期化
        $line = _sendcmd($sock, "RETR $i");//RETR n -n番目取得（ヘッダ含）
        while (!ereg("^\.\r\n",$line)) {//EOFの.まで読む
            $line = fgets($sock,512);
            $raw_mail.= $line;
        }
        $mail_array[]=$raw_mail;//1通分読み込んだら配列に追加
        $data = _sendcmd($sock, "DELE $i");//DELE n n番目削除
    }
    $buf = _sendcmd($sock, "QUIT"); //バイバイ
    fclose($sock);

}//end メールがある時の処理
//@@@@@<-----------------------------------

// メールの処理 1通ずつ処理する
foreach($mail_array as $a_mail){
    m_process_mail($a_mail);
}

//@@@@@ デバッグ用ログ保存以下は 安定版 2.4.2 と同じ内容になっています。
//@@@@@ 違うバージョンで使用する場合は　mail.phpより適切な内容を
//@@@@@ コピーしてください。
// デバッグ用ログ保存
m_debug_log(ob_get_contents(), PEAR_LOG_DEBUG);

while (@ob_end_clean());


/**
 * メール処理
 */
function m_process_mail($raw_mail)
{
    $options['from_encoding']    = MAIL_FROM_ENCODING;
    $options['to_encoding']      = 'UTF-8';
    $options['img_tmp_dir']      = OPENPNE_VAR_DIR . '/tmp';
    $options['img_max_filesize'] = IMAGE_MAX_FILESIZE * 1024;
    $options['trim_doublebyte_space'] = OPENPNE_TRIM_DOUBLEBYTE_SPACE;

    $decoder =& new OpenPNE_KtaiMail($options);
    $decoder->decode($raw_mail);

    $from = $decoder->get_from();
    $to   = $decoder->get_to();

    if (!db_common_is_mailaddress($from) || !db_common_is_mailaddress($to)) {
        m_debug_log('mail.php::m_process_mail() ERROR code 3');
        return false;
    }

    list($to_user, $to_host) = explode("@", $to, 2);

    // check prefix
    if (MAIL_ADDRESS_PREFIX) {
        if (strpos($to_user, MAIL_ADDRESS_PREFIX) !== 0) {
            m_debug_log('mail.php::m_process_mail() missing prefix');
            return false;
        }
        $to_user = substr($to_user, strlen(MAIL_ADDRESS_PREFIX));
    }

    if ($to_host === MAIL_SERVER_DOMAIN) {
        $mail_sns =& new mail_sns($decoder);
        if (!$mail_sns->main()) {
            m_debug_log('mail.php::m_process_mail() ERROR code 1');
            return false;
        }
    } else {
        m_debug_log('mail.php::m_process_mail() ERROR code 2');
        return false;
    }

    return true;
}

/**
 * デバッグ用ログ保存
 */
function m_debug_log($msg, $priority =  PEAR_LOG_WARNING)
{
    if (!MAIL_DEBUG_LOG) return;

    $log_path = OPENPNE_VAR_DIR . '/log/mail.log';
    $file =& Log::singleton('file', $log_path, 'MAIL');

    mb_convert_encoding($msg, 'JIS', 'auto');
    $file->log($msg, $priority);
}

?>
