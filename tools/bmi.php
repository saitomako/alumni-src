<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=SHIFT_JIS">
<?php
    $TITLE='�얞�x�v�Z';
    print "<title>$TITLE</title>";
?>
</head>


<?php

function bmi_index($L, $H, $TITLE){

  $height = $L/100 * 1.0;  //���[�g���P�ʂ̐g��
  $hevy = $H * 1.0;
  $best = $height*$height*22.0;  //BMI�@�̕W���̏d�v�Z��

  $diet = $height*$height*25.0;  //BMI�@�̂�����ƃ_�C�G�b�g

  $BMI = $hevy/($height*$height);

  $himando=(($BMI-22.0)*1000/22.0)/10;

    //�L�������̒���
    $best = round($best,1);
    $diet = round($diet,1);
    $BMI = round($BMI,1);
    $himando = round($himando,1);

    $BG='#EEFFFF';
    $mess = "���b�Z�[�W";
    if ($BMI < 18.5) { $mess = "��̏d(�����Ă��܂�)"; $BG='#DDDDFF';}
    else {
        if ($BMI <= 25.0) { $mess = "����"; $BG='#FFFFFF'; }
        else {
            if ($BMI <= 30.0) { $mess = "�얞�x�P"; $BG='#FFEEDD'; }
            else {
                if ($BMI <= 35.0) { $mess = "�얞�x�Q"; $BG='#FFEE77';}
                else {
                    if ($BMI <= 40.0) { $mess = "�얞�x�R"; $BG='#FFEE33';}
                    else {
                         $mess = "�얞�x�S"; $BG='#FF4433';
                    }
                }
            }
        }
    }
    
            
    print '<body bgcolor="'.$BG.'">';
    print "<h1>$TITLE</h1>";
    print '<hr>';
    print "�g��: ${L}cm<br>\n";
    print "�̏d: ${H}kg<br>\n";
    print '<br>';
    print "BMI: " . $BMI."<br>\n";;
    print "�얞�x: ${himando}%<br>\n";
    print "����: $mess �ł��B<br>\n";
    print '<br>';
    print "�W��(���z)�̏d: " . $best . "kg<br>\n";
    print "�̏d��". $diet . "kg�𒴂�����얞����ɂȂ�܂��B�C�����܂��傤�B<br>\n";
    $cal25 = $best * 25; $cal25 = round($cal25);
    $cal30 = $best * 30; $cal30 = round($cal30);
    print "<hr>";
    print "�W���̏d����v�Z����1���̕K�v�ێ�J�����[:".$cal25."�`".$cal30."kcal�B";
    print "�ȉ����Ȃ�A�o�E�g�ł����A<br>";
    print "���H�i�̃J�����[(�P��kcal)<br>";
    print "�n���o�[�K�[1��:250/����(���X):530�`700";
    print "/�R���r�j�̂��:760/���ɂ���1��:160�`200";
    print "/�����ς��т���1��:437<br>";
    print "������J�����[(1���ԁA�̏d60kg�A�P��kcal)<br>";
    print "�k���i����):200/����:480/�꒵��:500<br>";
    print "*�̎��b1kg���̑̏d�����炷�ɂ͖�7000kcal�K�v�Ƃ��B";
    print "<hr>";
    print "���A��͌g�т�[�߂�]���݂�";
}

?>



<?php
if ($_POST['l']=='') {
    print '<body bgcolor="#FFEEDD">';
    print "<h1>$TITLE</h1>";
    print '<hr>';
    print 'BMI�ɂ��얞�x�v�Z�B<br>';
    print '���p�����Őg��(cm)�E�̏d(kg)����͂��Ă��������B<br>';
    print '<hr>';
    print '<form name="f" action="bmi.php" method="post">';
    //print '&nbsp;�g�� <input type="text" size="3" maxlength="3" name="l" istyle="4" format="N" mode="numeric">cm<br>';
    //print '&nbsp;�̏d <input type="text" size="3" maxlength="3" name="h" istyle="4" format="N" mode="numeric">Kg<br>';
    print '&nbsp;�g�� <input type="text" size="3" maxlength="3" name="l" istyle="4" mode="numeric">cm<br>';
    print '&nbsp;�̏d <input type="text" size="3" maxlength="3" name="h" istyle="4" mode="numeric">Kg<br>';
    // print '&nbsp;���� <select name="sex"><option value="1">�j</option><option value="2">��</option></select>';
    print "<br>";
    print '<input type="submit" value="�v�Z">';
    //print ' (<a href="help.php">����</a>)';
    print '</form>';
    //print '<hr>';
    //print '��: <a href="http://noriko.sub.jp/">Fujita</a> & <a href="http://oi21.com/">oi21</a>';
    //print '<hr>���v�Z:';
    //print '<a href="http://oi21.com/cgi_lib/warikan/warikan.cgi">���芨�v�Z</a>';
    //print ' / <a href="http://oi21.com/cgi_lib/fukai/index.php">�s���w���v�Z</a>';
    //print ' / <a href="http://oi21.com/cgi_lib/nagasa/index.php">�����ϊ�</a>';
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
        print "���͂��ꂽ���l���s���ł��B"    ;
    }
    print "<hr>";
    print '<a href="bmi.php">�Čv�Z</a>';
    //print ' (<a href="help.php">����</a>)';
}
?>


</body>
</html>
