({ext_include file="inc_header.tpl"})

<body>
<div id="wrap">
	<div id="header">
		<h1><a href="#">({$smarty.const.SNS_NAME})</a></h1>
		<p></p>
	</div>

({ext_include file="inc_left_menu.tpl"})

	<div id="right">
({ext_include file="h_home_right_side.tpl"})

	<img src="./skin/dummy.gif" class="v_spacer_l">

({ext_include file="h_home_right_news.tpl"})

	</div>

    <!-- メイン -->
    <div id="main">
        <h2  class="highlighted">新規登録</h2>
        ({ext_include file="inc_alert_box.tpl"})({* エラーメッセージコンテナ *})
        ({t_form m=pc a=do_o_public_invite})
        ({if $smarty.const.MYNETS_USE_CAPTCHA})
            <p class="post-footer align-right">メールアドレスと確認キーワードを入力してください。
        ({else})
            <p class="post-footer align-right">メールアドレスを入力してください。
        ({/if})
        <br>入力されたメールアドレス宛に ({$smarty.const.SNS_NAME}) の招待状が送信されます。</p>

        <img src="./skin/dummy.gif" class="v_spacer_l">

        <p class="green">
        メールアドレス&raquo;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="text" name="pc_address" value="" size="40"></p>
        <p class="green">メールアドレス(確認)&raquo;&nbsp;&nbsp;
        <input type="text" class="text" name="pc_address2" value="" size="40"></p>
        ({if $smarty.const.MYNETS_USE_CAPTCHA})
        <p class="green">確認キーワード</p>
        <img src="./cap.php?rand=({math equation="rand(0,9999)"})">
        <br>
        <p class="red">※上に表示されているキーワードをご記入下さい。<br>
        <input name="captcha" size="30"></p>
        ({/if})
        <p class="textright"><input type="submit" class="button" value="　送　信　"></p>

        <img src="./skin/dummy.gif" class="v_spacer_l">

    </div>

        <!-- フッター -->
        ({ext_include file="inc_footer.tpl"})
        <!-- フッターここまで -->

</div>
</body>
</html>
