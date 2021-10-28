({ext_include file="inc_header.tpl"})

<body>
<div id="wrap">
	<div id="header">
		<h1><a href="./">({$smarty.const.SNS_NAME})</a></h1>
		<p>本サイトは、昭和４６年度卒業寄居中学校同窓会のコミュニティサイトです。</p>
	</div>
	
	({ext_include file="inc_left_menu.tpl"})
	
	<div id="right">

		<div id="right_box">
			<!--サイドバー最新公開日記-->
			<h2 class="green">最新の公開日記</h2>
				<ul>    
					<!--公開日記ループ処理-->
					({foreach from=$diary_list item=item})
					<li><a href="({$item.url})" class="top">({$item.subject|t_body:'title'|t_truncate:"20"})</a></li>
					({/foreach})
					<!--公開日記ループ処理終わり-->
				</ul>
			<!--サイドバー最新公開日記終わり-->
		</div>
	
	<div id="right_bottom"></div>
	
	<img src="./skin/dummy.gif" class="v_spacer_l">
	
		<div id="right_box">
			<!--サイドバー最新公開トピック-->
			<h2 class="green">最新の公開トピック</h2>
				<ul>
					({foreach from=$topic_list item=item})
					<li><a href="({$item.url})" class="top">({$item.name|t_body:'title'|t_truncate:"16"})</a></li>
					({/foreach})
				</ul>
			<!--サイドバー最新公開トピック終わり-->
		</div>
	<div id="right_bottom"></div>
	
	<img src="./skin/dummy.gif" class="v_spacer_l">
	
({ext_include file="h_home_right_news.tpl"})
	
	<img src="./skin/dummy.gif" class="v_spacer_l">
	
	</div>
	
	<!-- メイン -->
	<div id="main">
		<h2>新着情報</h2>
		({foreach from=$topic_list item=item})
			<h3 class="green">({$item.name|t_body:'title'})</h3>
			<p>({$item.body|bbcode2del|t_body:'body'|nl2br})</p>
		({/foreach})
		<h2>新着日記</h2>
			<!--新着日記のループ-->
			({foreach from=$diary_list item=item})
			<p>Posted by <a href="#">({$item.c_member|t_body:'name'})</a></p>
			<h3 class="green">({$item.subject|t_body:'title'})</h3>
			<p>({$item.body|bbcode2del|t_truncate:"400"|t_body:'diary'})</p>
			<p class="post-footer"><a href="({$item.url})" class="readmore">Read more</a><span class="date">({$item.r_datetime})</span></p>
			<p class="line"></p>
			({/foreach})
			<!--新着日記のループここまで-->
	
	</div>
	<!-- メインここまで -->
	
	<!-- フッター -->
	({ext_include file="inc_footer.tpl"})
	<!-- フッターここまで -->
	
</div>
</body>
</html>
