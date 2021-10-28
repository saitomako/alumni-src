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
		<h2>ヘルプ</h2>
		({if $c_siteadmin != ""})
			<p class="post-footer">({$c_siteadmin|smarty:nodefaults})</p>
			<p class="line"></p>
		({else})
			<p class="post-footer">ヘルプは、ただいま準備中です。</p>
			<p class="line"></p>
		({/if})
	</div>
	
	<!-- フッター -->
	({ext_include file="inc_footer.tpl"})
	<!-- フッターここまで -->
	
</div>
</body>
</html>
