<?php
/*
 * 2014-07-06 現行SNSをベースに新規開発
 *            こちらのソースに印を入れていき、開発の状況を計る。
 *            コードは変更しない。
 */
require_once './log.php';
//debug('--START!--');

require_once './config.inc.php';
// ^^^^^ ここまで ^^^^^
require_once OPENPNE_WEBAPP_DIR . '/init.inc';

if (0):
ob_start();
if (isset($_SERVER['REMOTE_ADDR'])) echo ' ['.$_SERVER['REMOTE_ADDR'].']';
if (isset($_SERVER['HTTP_USER_AGENT'])) echo ' ['.$_SERVER['HTTP_USER_AGENT'].']';
$req = ob_get_contents();
ob_end_clean();
error_log($req);
endif;

debug('ADMIN_EMAIL='.ADMIN_EMAIL);

openpne_execute();

?>
