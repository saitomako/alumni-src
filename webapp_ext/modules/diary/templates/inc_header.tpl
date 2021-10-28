<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<title>({$smarty.const.SNS_NAME})</title>
	({if $member})
		<link rel="alternate" type="application/atom+xml" title="RSS 2.0" href="./?m=diary&amp;a=page_member_rss&amp;target_c_member_id=({$member})" />
		<link rel="alternate" type="application/rss+xml" title="Atom" href="./?m=diary&amp;a=page_home_member_atom&amp;target_c_member_id=({$member})" />
	({else})
		<link rel="alternate" type="application/atom+xml" title="RSS 2.0" href="./?m=diary&amp;a=page_home_rss" />
		<link rel="alternate" type="application/rss+xml" title="Atom" href="./?m=diary&amp;a=page_home_rss_atom" />
	({/if})
	<link rel="alternate" type="application/rss+xml" title="sitemap" href="sitemap.xml" />
	<link rel="stylesheet" type="text/css" href="css/login.css" />
	<style type="text/css">
<!--

/*背景要素*/
.bg_02 { background-color: #({$bg_02}) ; }
.bg_09 { background-color: #C9C9C9 ; }
.bg_10 { background-color: #b0b0b0 ; }


.arrow_1 {
  width: 17px ;
  height: 14px ;
  background: url(({t_img_url_skin filename=icon_arrow_1})) 0% 100%  no-repeat ;
}
.icon_1 {
  width: 14px ;
  height: 14px ;
  background: url(({t_img_url_skin filename=icon_1})) 50% 70%  no-repeat ;
}
.icon_2 {
  width: 14px ;
  height: 14px ;
  background: url(({t_img_url_skin filename=icon_2})) 50% 70%  no-repeat ;
}
.icon_3 {
  width: 14px ;
  height: 14px ;
  background: url(({t_img_url_skin filename=icon_3})) 50% 70%  no-repeat ;
}

* { font-family: "ＭＳ Ｐゴシック", "ヒラギノ角ゴ Pro W3", Osaka, sans-serif ; }




-->
</style>
<script src="./js/usagi.js" type="text/javascript"></script>
({$inc_html_head|smarty:nodefaults})
</head>
