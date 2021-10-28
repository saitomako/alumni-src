<?php
/*
 * 2014-07-07 現行SNSをベースに新規開発開始
 *            こちらのソースに印を入れていき、開発の状況を計る。
 *            基本的にこちらのコードは変更しない。
 */

define('OPENPNE_DIR', realpath(dirname(__FILE__) . '/./'));
if (!@include_once(OPENPNE_DIR . '/conf/config.php')) {
    $install_path = "http://".$_SERVER['HTTP_HOST']. dirname(htmlspecialchars($_SERVER['PHP_SELF']))."/install/";
    $install_path = str_replace("//install/","/install/",$install_path);
    header("location: ".$install_path);
}

// $db_prefixの設定
if (!defined('MYNETS_PREFIX_NAME')) {
    define('MYNETS_PREFIX_NAME','');
}

?>
