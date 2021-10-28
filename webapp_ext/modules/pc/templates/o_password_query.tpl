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
		<!-- ********************************** -->
		<!-- ******ここから：パスワード確認****** -->
		<h2>パスワード再発行</h2>
		({ext_include file="inc_alert_box.tpl"})({* エラーメッセージコンテナ *})
		({t_form m=pc a=do_o_password_query})
		<p class="post-footer">登録したメールアドレスと、秘密の質問・答えを入力してください。<br>登録したものと一致すると、パスワードが登録アドレス宛に送信されます。</p>
		
		<img src="./skin/dummy.gif" class="v_spacer_l">
		
		<p class="green">メールアドレス&raquo;&nbsp;&nbsp;&nbsp;
		<input type="text" class="text" name="pc_address" value=""></p>
		<p class="line"></p>
		<p class="green">秘密の質問&raquo;&nbsp;&nbsp;&nbsp;
		<select name="c_password_query_id">
		<option value="" selected="selected">選択してください</option>
		({foreach from=$c_password_query_list key=key item=item})
		<option value="({$key})">({$item})</option>
		({/foreach})
		</select></p>
		<p class="line"></p>
		<p class="green">秘密の答え&raquo;&nbsp;&nbsp;&nbsp;
		<input type="text" class="text" name="c_password_query_answer" value=""></p>
		<p class="line"></p>
		<p class="textright">
		<input class="button" type="submit" value="　送　信　"></p>
	</div>
	
	({ext_include file="inc_footer.tpl"})
	
</div>
</body>
</html>
