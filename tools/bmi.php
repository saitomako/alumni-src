<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=SHIFT_JIS">
<?php
    $TITLE='肥満度計算';
    print "<title>$TITLE</title>";
?>
</head>


<?php

function bmi_index($L, $H, $TITLE){

  $height = $L/100 * 1.0;  //メートル単位の身長
  $hevy = $H * 1.0;
  $best = $height*$height*22.0;  //BMI法の標準体重計算式

  $diet = $height*$height*25.0;  //BMI法のそろっとダイエット

  $BMI = $hevy/($height*$height);

  $himando=(($BMI-22.0)*1000/22.0)/10;

    //有効桁数の調整
    $best = round($best,1);
    $diet = round($diet,1);
    $BMI = round($BMI,1);
    $himando = round($himando,1);

    $BG='#EEFFFF';
    $mess = "メッセージ";
    if ($BMI < 18.5) { $mess = "低体重(痩せています)"; $BG='#DDDDFF';}
    else {
        if ($BMI <= 25.0) { $mess = "普通"; $BG='#FFFFFF'; }
        else {
            if ($BMI <= 30.0) { $mess = "肥満度１"; $BG='#FFEEDD'; }
            else {
                if ($BMI <= 35.0) { $mess = "肥満度２"; $BG='#FFEE77';}
                else {
                    if ($BMI <= 40.0) { $mess = "肥満度３"; $BG='#FFEE33';}
                    else {
                         $mess = "肥満度４"; $BG='#FF4433';
                    }
                }
            }
        }
    }
    
            
    print '<body bgcolor="'.$BG.'">';
    print "<h1>$TITLE</h1>";
    print '<hr>';
    print "身長: ${L}cm<br>\n";
    print "体重: ${H}kg<br>\n";
    print '<br>';
    print "BMI: " . $BMI."<br>\n";;
    print "肥満度: ${himando}%<br>\n";
    print "判定: $mess です。<br>\n";
    print '<br>';
    print "標準(理想)体重: " . $best . "kg<br>\n";
    print "体重が". $diet . "kgを超えたら肥満判定になります。気をつけましょう。<br>\n";
    $cal25 = $best * 25; $cal25 = round($cal25);
    $cal30 = $best * 30; $cal30 = round($cal30);
    print "<hr>";
    print "標準体重から計算した1日の必要摂取カロリー:".$cal25."～".$cal30."kcal。";
    print "以下かなりアバウトですが、<br>";
    print "■食品のカロリー(単位kcal)<br>";
    print "ハンバーガー1個:250/牛丼(並森):530～700";
    print "/コンビニのり弁:760/おにぎり1個:160～200";
    print "/かっぱえびせん1袋:437<br>";
    print "■消費カロリー(1時間、体重60kg、単位kcal)<br>";
    print "徒歩（普通):200/腹筋:480/縄跳び:500<br>";
    print "*体脂肪1kg分の体重を減らすには約7000kcal必要とか。";
    print "<hr>";
    print "お帰りは携帯の[戻る]ﾎﾞﾀﾝで";
}

?>



<?php
if ($_POST['l']=='') {
    print '<body bgcolor="#FFEEDD">';
    print "<h1>$TITLE</h1>";
    print '<hr>';
    print 'BMIによる肥満度計算。<br>';
    print '半角数字で身長(cm)・体重(kg)を入力してください。<br>';
    print '<hr>';
    print '<form name="f" action="bmi.php" method="post">';
    //print '&nbsp;身長 <input type="text" size="3" maxlength="3" name="l" istyle="4" format="N" mode="numeric">cm<br>';
    //print '&nbsp;体重 <input type="text" size="3" maxlength="3" name="h" istyle="4" format="N" mode="numeric">Kg<br>';
    print '&nbsp;身長 <input type="text" size="3" maxlength="3" name="l" istyle="4" mode="numeric">cm<br>';
    print '&nbsp;体重 <input type="text" size="3" maxlength="3" name="h" istyle="4" mode="numeric">Kg<br>';
    // print '&nbsp;性別 <select name="sex"><option value="1">男</option><option value="2">女</option></select>';
    print "<br>";
    print '<input type="submit" value="計算">';
    //print ' (<a href="help.php">説明</a>)';
    print '</form>';
    //print '<hr>';
    //print '提供: <a href="http://noriko.sub.jp/">Fujita</a> & <a href="http://oi21.com/">oi21</a>';
    //print '<hr>他計算:';
    //print '<a href="http://oi21.com/cgi_lib/warikan/warikan.cgi">割り勘計算</a>';
    //print ' / <a href="http://oi21.com/cgi_lib/fukai/index.php">不快指数計算</a>';
    //print ' / <a href="http://oi21.com/cgi_lib/nagasa/index.php">長さ変換</a>';
} else {
    $BG='#E6FFFB';
    $L = $_POST['l'];
    $H = $_POST['h'];
    // $SEX = $_POST['sex'];

    if(($L >= 80) && ($L <= 300) && ($H <= 500) && ($H >= 10)){
        $BG=bmi_index($L, $H, $TITLE);
        
    }else{
        print '<body bgcolor="'.$BG.'">';
        print "<h1>$TITLE</h1>";
        print '<hr>';
        print "入力された数値が不正です。"    ;
    }
    print "<hr>";
    print '<a href="bmi.php">再計算</a>';
    //print ' (<a href="help.php">説明</a>)';
}
?>


</body>
</html>
