({$inc_ktai_header|smarty:nodefaults})

<center>部活動作成</center>
<hr>
({t_form m=ktai a=do_h_com_add_insert_c_commu})
<input type="hidden" name="ksid" value="({$PHPSESSID})">
ｶﾃｺﾞﾘ<br>
<select name="c_commu_category_id">
({foreach from=$c_commu_category_list item=c_commu_category})
<option value="({$c_commu_category.c_commu_category_id})">({$c_commu_category.name})
({/foreach})
</select><br>
部活動名<br>
<input type="text" name="name" value=""><br>
説明文<br>
<textarea name="info"></textarea><br>
参加・公開<br>
<input type="radio" name="public_flag" value="public" checked>誰でも参加可能、掲示板は全員に公開<br>
<input type="radio" name="public_flag" value="auth_public">参加には部長の承認が必要、掲示板は全員に公開<br>
<input type="radio" name="public_flag" value="auth_commu_member">参加には部長の承認が必要、掲示板は部員にのみ公開<br>
<input type="submit" value="送信">
</form>

<hr>

({$inc_ktai_footer|smarty:nodefaults})