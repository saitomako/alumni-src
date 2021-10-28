<?php
require_once("log.php");
$addr = $_SERVER['REMOTE_ADDR'];
$host = gethostbyaddr($addr);
$ua = $_SERVER['HTTP_USER_AGENT'];
$p1 = strpos($host, "sitmnt01.ap.so-net.ne.jp");
$p2 = strpos($ua, "bingbot");
$p3 = strpos($host, "google");
$p4 = strpos($ua, "MJ12bot");
$p5 = strpos($ua, "robot");

if ($p1 === false && $p2 === false && $p3 === false && $p4 === false && $p5 === false) {
    debug("ADDR:$addr($host) $ua");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>寄居中学校 同窓会コミュニティ</title>
</head>
<body>
<h4>寄居中学校同窓会サイトご利用のみなさまへ</h4>
<div style="background:#efefef;padding:5px 10px;border:1px dotted #333;">
<p style="color:red;font-weight:bold;">5/24 サーバー・エラーで同窓会サイトが使えなくなりました。</p>
</div>

<p>そして本日(5/29)、そのエラーの詳細を調査しました。<br>調査の結果、このシステムで同窓会サイトを続行していくことは難しい、との結論に至りました。<br>
その理由を一言で言えば、古くなったシステムが現サーバーのバージョンに対応できなくなったということです。</p>

<p>そこで、今後どうするかということですが、当面は、以前トライアルとしてテストしていたPEOPLEというサービスを利用していこうと思います。<br>PEOPLEは、しばらく放置していましたが、まだ利用できるようです。</p>
<p>以前登録した方も、そのまま使えるようです。<br>また、登録していない方は、お手数ですが登録の上ご利用ください。<br>※登録の際は、info@prtls.jp からメールを受信できるようにしておく必要があります。</p>

<ul>
    <li><a href="http://sns.prtls.jp/yoriichu/login.html">寄居中学校S46同窓会</a><br>(携帯（ガラケー）の方は<a href="http://msns.prtls.jp/yoriichu/login.html">こちらから</a>)</li>
</li>
</ul>
<br>

<p>なお、和倉会旅行の行程表のページは以下から閲覧可能です。</p>
<ul>
<li><a href="http://alumni.yorii-chu.org/wakura/" target="_blank">和倉会旅行行程表</a></li>
</ul>

<br>
<?php if(0):?>
<hr>
<p>今回連絡用として借りた掲示板へのリンクも一応残しておきます。<br>
・<a href="http://bbs.cyber-mode.jp/?id=s46ychu" rel="nofollow">S46寄居中同窓会連絡用掲示板</a></p>
<?php endif;?>
<hr>
<p style="text-align:right;">寄居中学校 同窓会コミュニティ 管理人</p>
</body>
</html>
