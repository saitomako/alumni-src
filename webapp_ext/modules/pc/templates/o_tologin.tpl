({ext_include file="inc_header.tpl"})

<body>
<div id="wrap">
	<div id="header">
		<h1><a href="#">({$smarty.const.SNS_NAME})</a></h1>
		<p><strong>サブタイトル</strong></p>
	</div>
	
	({ext_include file="inc_left_menu.tpl"})
	
	<div id="right">
({ext_include file="h_home_right_side.tpl"})

	<img src="./skin/dummy.gif" class="v_spacer_l">

({ext_include file="h_home_right_news.tpl"})

	</div>
	
	<!-- メイン -->
	<div id="main">
		<div class="content_footer" align="center">
		({ext_include file="inc_alert_box.tpl"})({* エラーメッセージコンテナ *})
		<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;
		<a href="({$login_url})">ログインページへ</a>
		</div>
	</div>
	
	<!-- フッター -->
	({ext_include file="inc_footer.tpl"})
	<!-- フッターここまで -->
	
</div>
</body>
</html>
