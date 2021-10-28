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
		({ext_include file="inc_alert_box.tpl"})({* エラーメッセージコンテナ *})
		<h2 class="highlighted">ご登録ありがとうございました。</h2>
			<div style="padding:10px 30px;">
				<p class="post-footer">入力されたメールアドレス宛に ({$smarty.const.SNS_NAME}) の招待状を送信しました。<br>招待状に記載されたURLから登録をおこなってください。 </p>
				</form>
			</div>
	</div>
	
	({ext_include file="inc_footer.tpl"})
	
</div>
</body>
</html>
