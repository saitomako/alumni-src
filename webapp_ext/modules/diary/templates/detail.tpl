({ext_include file="inc_header.tpl"})
<body>
<div id="wrap">
	<div id="header">
		<h1>({$target_member.nickname|t_body:'title'})さんの公開日記</h1>
                 <p>({$target_diary.subject|t_body:'title'})
	</div>

({ext_include file="inc_left_menu.tpl"})
	<div id="right">
               <div id="right_box">
 <!-- ******************************* -->
<!-- ******ここから：カレンダー****** -->
<!-- *ここから：カレンダー＞内容* -->
({*ここから：header*})
<!-- ここから：カレンダータイトル -->

<h2 class="green">
({strip})
({if $ym.prev_month})
<span class="b_b">
<a href="({t_url m=diary a=page_home})
    &amp;year=({$ym.prev_year})
    &amp;month=({$ym.prev_month})">
＜
</a>
</span>
({/if})

({$date_val.month})月のカレンダー

({if $ym.next_month})
<span class="b_b">
<a href="({t_url m=diary a=page_home})
    &amp;year=({$ym.next_year})
    &amp;month=({$ym.next_month})">
＞
</a>
</span>
({/if})
({/strip})
</h2>

<!-- ここまで：カレンダータイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:149px;margin:0px auto;">
({****************})
<tr>
<td style="width:149px;" class="bg_10" colspan="13"><img src="./skin/dummy.gif" style="width:149px;height:1px;" class="dummy"></td>
</tr>
({****************})
<tr>
<td class="bg_09 s_ss padding_ss" align="right"><span class="c_02 s_ss">日</span></td>
<td style="width:1px;" class="bg_10"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_09 s_ss padding_ss" align="right">月</td>
<td style="width:1px;" class="bg_10"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_09 s_ss padding_ss" align="right">火</td>
<td style="width:1px;" class="bg_10"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_09 s_ss padding_ss" align="right">水</td>
<td style="width:1px;" class="bg_10"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_09 s_ss padding_ss" align="right">木</td>
<td style="width:1px;" class="bg_10"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_09 s_ss padding_ss" align="right">金</td>
<td style="width:1px;" class="bg_10"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_09 s_ss padding_ss" align="right"><span class="c_03 s_ss">土</span></td>
</tr>
({****************})
<tr>
<td style="width:149px;" class="bg_10" colspan="13"><img src="./skin/dummy.gif" style="width:149px;height:1px;" class="dummy"></td>
</tr>
({****************})
({foreach from=$calendar item=week})
<tr>
({foreach from=$week item=item name="calendar_days"})
<td style="width:({if $smarty.foreach.calendar_days.iteration%7 == 0 || $smarty.foreach.calendar_days.iteration%7 == 1})21({else})20({/if})px;height:18px;" valign="middle" align="right" class="bg_02 s_ss padding_ss">
({if $item.day})
({if $item.is_diary})
<a href="({t_url m=diary a=page_home})&amp;year=({$date_val.year})&amp;month=({$date_val.month})&amp;day=({$item.day})" class="s_ss">({$item.day})</a>
({else})
({$item.day})
({/if})
({else})
&nbsp;({/if})
</td>
({if $smarty.foreach.calendar_days.iteration%7 != 0})
<td style="width:1px;" class="bg_10"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/if})
({/foreach})
</tr>
({****************})
<tr>
<td style="width:149px;" class="bg_10" colspan="13"><img src="./skin/dummy.gif" style="width:149px;height:1px;" class="dummy"></td>
</tr>
({****************})
({/foreach})
</table>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：カレンダー＞＞内容* -->
</td>
<td class="bg_10"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>

</table>
<!-- ******ここまで：カレンダー****** -->
<!-- ****************************** -->
              </div>
<div id="right_bottom"></div>

<img src="./skin/dummy.gif" class="v_spacer_l">

               <div id="right_box">

<!-- ********************************** -->
<!-- ******ここから：最新日記****** -->
<h2 class="green">最新公開日記</h2>
<ul>
({foreach from=$new_diary_list item=item})
<li><a href="({t_url m=diary a=page_detail})&amp;target_c_diary_id=({$item.c_diary_id})">({$item.subject})</a></li>
({/foreach})
</ul>
<!-- ******ここまで：最新日記****** -->
<!-- ********************************** -->

               </div>
<div id="right_bottom"></div>

<img src="./skin/dummy.gif" class="v_spacer_l">

               <div id="right_box">
({if $date_list})

<!-- ********************************** -->
<!-- ******ここから：各月の日記一覧****** -->
<h2 class="green">各月の日記</h2>
<ul>
({foreach from=$date_list item=date})

<li><div><a href="({t_url m=diary a=page_home})&amp;year=({$date.year})&amp;month=({$date.month})">({$date.year})年({$date.month})月の一覧</a></div></li>

({/foreach})
</ul>
<!-- ******ここまで：各月の日記一覧****** -->
<!-- ********************************** -->

               </div>
<div id="right_bottom"></div>

<img src="./skin/dummy.gif" class="v_spacer_l">

               <div id="right_box">

({/if})

<!-- ********************************** -->
<!-- ******ここから：RSS****** -->
<h2 class="green">全体新着RSS</h2>
<a href="./?m=diary&amp;a=page_home_rss"><img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_3">RSS2.0</a><br>
<a href="./?m=diary&amp;a=page_home_rss_atom"><img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_3">Atom</a><br>
<!-- ******ここまで：RSS****** -->
<!-- ********************************** -->
<img src="./skin/dummy.gif" class="v_spacer_l">

({********************************})
({**ここまで：メインコンテンツ（左）**})
({********************************})

              </div>
<div id="right_bottom"></div>

	</div>

            <!-- メイン -->
    <div id="main">


({if $target_diary})
<!-- ***************************** -->
<!-- ******ここから：日記一覧****** -->
<h2><a href="({t_url m=diary a=page_list})&amp;target_c_member_id=({$target_member.c_member_id})">({$target_member.nickname|t_body:'title'})</a>さんの公開日記</h2>

<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->



<h3 class="green"><a href="({t_url m=diary a=page_detail})&amp;target_c_diary_id=({$target_diary.c_diary_id})">({$target_diary.subject|t_body:'title'})</a></h3>

({if $target_diary.image_filename_1})
<a href="({t_img_url filename=$target_diary.image_filename_1})" target="_blank">
<img src="({t_img_url filename=$target_diary.image_filename_1 w=120 h=120})"></a>
({/if})
({if $target_diary.image_filename_2})
<a href="({t_img_url filename=$target_diary.image_filename_2})" target="_blank">
<img src="({t_img_url filename=$target_diary.image_filename_2 w=120 h=120})"></a>
({/if})
({if $target_diary.image_filename_3})
<a href="({t_img_url filename=$target_diary.image_filename_3})" target="_blank">
<img src="({t_img_url filename=$target_diary.image_filename_3 w=120 h=120})"></a>
({/if})
({if $target_diary.image_filename_1||$target_diary.image_filename_2||$target_diary.image_filename_3})
<br>
({/if})

 <p class="post-footer">
({$target_diary.body|bbcode2html|t_body:'diary'})</p>
<div align="right">
<span class="date">({$target_diary.r_datetime|date_format:"%m月%d日 %H:%M"})</span>
</div>
<p class="line"></p>

<!-- ここまで：主内容＞＞日記表示 -->
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：日記一覧＞＞内容* -->
<!-- ******ここまで：日記一覧****** -->
<!-- ***************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">
({else})
該当する日記はありません。
({/if})

<a href="({t_url m=diary a=page_home})">公開日記トップへ</a>
<br>

({********************************})
({**ここまで：メインコンテンツ（右）**})
({********************************})
</td>
</tr>
</table>({*END:container*})
 	</div>

            <!-- フッター -->
({ext_include file="inc_footer.tpl"})
            <!-- フッターここまで -->

</div>
</body>
</html>
