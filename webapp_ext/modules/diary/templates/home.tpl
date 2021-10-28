({ext_include file="inc_header.tpl"})
<body>
<div id="wrap">
    <div id="header">
		<h1><a href="./">({$smarty.const.SNS_NAME})</a></h1>
                 <p>公開日記</p>
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
({********************************})
({**ここから：メインコンテンツ（右）**})
({********************************})
              </div>
<div id="right_bottom"></div>

	</div>

            <!-- メイン -->
    <div id="main">

({if $target_diary_list})
<!-- ***************************** -->
<!-- ******ここから：日記一覧****** -->
<h2>新着日記一覧</h2>
({if !$all})
({$date_val.year})年({$date_val.month})月({if $date_val.day})({$date_val.day})日({/if})
({/if})
({if $is_prev})
<a href="({t_url m=diary a=page_home})&amp;direc=-1&amp;page=({$page})">前を表示</a>
({/if})
({$page*$page_size-$page_size+1})件～
({if $page_size > $diary_list_count})
({$diary_list_count+$page*$page_size-$page_size})
({else})
({$page*$page_size})
({/if})
件を表示
({if $is_next})
<a href="({t_url m=diary a=page_home})&amp;direc=1&amp;page=({$page})">次を表示</a>
({/if})

({**/if**})
({foreach from=$target_diary_list item=item})
<h1><a href="({t_url m=diary a=page_list})&amp;target_c_member_id=({$item.c_member_id})">({$item.nickname|t_body:'name'})</a></h1>
<h3 class="green"><a href="({t_url m=diary a=page_detail})&amp;target_c_diary_id=({$item.c_diary_id})">({$item.subject|t_body:'title'})</a></h3>



({if $item.image_filename_1})
<a href="({t_img_url filename=$item.image_filename_1})" target="_blank">
<img src="({t_img_url filename=$item.image_filename_1 w=120 h=120})"></a>
({/if})
({if $item.image_filename_2})
<a href="({t_img_url filename=$item.image_filename_2})" target="_blank">
<img src="({t_img_url filename=$item.image_filename_2 w=120 h=120})"></a>
({/if})
({if $item.image_filename_3})
<a href="({t_img_url filename=$item.image_filename_3})" target="_blank">
<img src="({t_img_url filename=$item.image_filename_3 w=120 h=120})"></a>
({/if})
({if $item.image_filename_1||$item.image_filename_2||$item.image_filename_3})
<br>
({/if})

({$item.body|t_truncate:"400"|t_body:'title'})

                    <p class="post-footer align-right">
                        <a href="({t_url m=diary a=page_detail})&amp;target_c_diary_id=({$item.c_diary_id})" class="readmore">Read more</a>
                        <span class="date">({$item.r_datetime})</span></p>
                    <p class="line"></p>
({/foreach})
({if $diary_list_count >= $page_size })

({if $is_prev})
<a href="({t_url m=diary a=page_home})&amp;direc=-1&amp;page=({$page})">前を表示</a>
({/if})
({$page*$page_size-$page_size+1})件～
({if $page_size > $diary_list_count})
({$diary_list_count+$page*$page_size-$page_size})
({else})
({$page*$page_size})
({/if})
件を表示
({if $is_next})
<a href="({t_url m=diary a=page_home})&amp;direc=1&amp;page=({$page})">次を表示</a>
({/if})

({/if})
({/if})


({********************************})
({**ここまで：メインコンテンツ（右）**})
({********************************})
({*END:container*})
 	</div>

            <!-- フッター -->
({ext_include file="inc_footer.tpl"})
            <!-- フッターここまで -->

</div>
</body>
</html>
