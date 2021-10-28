	<div id="left">
		<div class="login">
			<h2 class="green">MemberLogin</h2>
				<form action="./" method="post" name="login" id="login">
				<input type="hidden" name="m" value="pc" />
				<input type="hidden" name="a" value="do_o_login" />
				<input type="hidden" name="login_params" value="" />
				<input type="hidden" name="target_script" value="" />
				<p>
				<label>UserID</label>
				<input name="username" tabindex="1" value="" type="text" />
				<label>Password</label>
				<input name="password" tabindex="2" value="" type="password" />
				<br /><br />
				<input type="checkbox" tabindex="3" name="is_save" id="is_save" value="1" class="check" />
				<br />
				次回から自動的にログイン<br />
				<input class="button" type="submit" value="Login" /><br />
				</p>
				</form>
				<a href="({t_url m=pc a=page_o_password_query})"><p class="textright">パスワードを忘れた方 &raquo;</p></a>
		</div>
	
			<ul class="menu">
				<li><a class="current" href="./">SNS Home</a></li>
({if 0})                
				<li>({if !$smarty.const.IS_CLOSED_SNS && (($smarty.const.OPENPNE_REGIST_FROM) & ($smarty.const.OPENPNE_REGIST_FROM_PC))})<a href="({t_url m=pc a=page_o_public_invite})" id="button_new_regist">新規登録</a>({/if})</li>
({/if})
				<li><a href="./?m=diary">公開日記</a></li>
({if 0})                

				<li><a href="#">LINK</a></li>
				<li><a href="#">LINK</a></li>
				<li><a href="#">LINK</a></li>
({/if})
			</ul>
		<div id="left_banner">
			({if $side_banner_html_before || $side_banner_html_after || $inc_side_banner})
				({**********************************})
				({**ここから：サイドコンテンツ領域**})
				({**********************************})
				({strip})
				({if $side_banner_html_before || $side_banner_html_after})
				({if $before_after == 'before'})
				({$side_banner_html_before|smarty:nodefaults})
				({else})
				({$side_banner_html_after|smarty:nodefaults})
				({/if})
				({else})
				({if $inc_side_banner.a_href})
				({if $PHPSESSID})
				<a href="({t_url m=pc a=do_h_click_banner})&amp;target_c_banner_id=({$inc_side_banner.c_banner_id})&amp;sessid=({$PHPSESSID})" target="_blank">
				({else})
				<a href="({t_url m=pc a=do_o_click_banner})&amp;target_c_banner_id=({$inc_side_banner.c_banner_id})" target="_blank">
				({/if})
				<img src="({t_img_url filename=$inc_side_banner.image_filename})"></a>
				({else})
				<img src="({t_img_url filename=$inc_side_banner.image_filename})">
				({/if})
				({/if})
				({/strip})
				({**********************************})
				({**ここまで：サイドコンテンツ領域**})
				({**********************************})
			({/if})
		</div>
	</div>
