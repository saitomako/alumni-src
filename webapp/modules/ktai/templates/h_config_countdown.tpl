({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">ｶｳﾝﾄﾀﾞｳﾝ･ﾀｲﾏｰ設定</font></center>
<hr>
ここで指定した年齢の誕生日までの日数をﾏｲﾎｰﾑに表示します。<br>
<br>
({t_form m=ktai a=do_h_config_countdown_update})
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="text" name="countdown" value="({$c_member.countdown})" size="3" maxlength="3">歳の誕生日までの日数を表示する<br>(0を指定した場合は、表示しない)<br>
<input type="submit" value="変更"><br>
</form>
<hr>
<a href="({t_url m=ktai a=page_h_config})&amp;({$tail})">設定変更</a><br>

({$inc_ktai_footer|smarty:nodefaults})
