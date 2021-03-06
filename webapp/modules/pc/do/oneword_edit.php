<?php

/* ========================================================================
 *
 * @license This source file is subject to version 3.01 of the PHP license,
 *              that is available at http://www.php.net/license/3_01.txt
 *              If you did not receive a copy of the PHP license and are unable
 *              to obtain it through the world-wide-web, please send a note to
 *              license@php.net so we can mail you a copy immediately.
 *
 * @category   Application of MyNETS
 * @project    OpenPNE UsagiProject 2006-2007
 * @package    MyNETS
 * @author     UsagiProject <info@usagi.mynets.jp>
 * @copyright  2006-2007 UsagiProject <author member ad http://usagi.mynets.jp/member.html>
 * @version    MyNETS,v 1.0.0
 * @since      File available since Release 1.0.0 Nighty
 * @chengelog  [2007/02/17] Ver1.1.0Nighty package
 * ========================================================================
 */

require_once OPENPNE_WEBAPP_DIR . "/components/one_word.class.php";

class pc_do_oneword_edit extends OpenPNE_Action
{

    function execute($requests)
    {
        $uid     = $GLOBALS['AUTH']->uid();
        $id_to = $requests['id_to'];
        $oneword = $requests['value'];
        $moji_pattern = '/&(?:amp;|)#x([0-9A-F][0-9A-F][0-9A-F][0-9A-F]);/i';
        $moji_num = preg_match_all($moji_pattern, $oneword, $out);
        $count   = mb_strlen($oneword, mb_internal_encoding()) - $moji_num * 8 + $moji_num;
        //if ($count > 36 || $count < 1) {
        if ($count > 100 || $count < 1) {
            header("HTTP/1.0 406 Not Acceptable");
            return false;
        }
        $word = new OneWord();
        $word->setUid($uid);
        $word->setId_to($id_to);
        $word->set($oneword);
        $word->add();
        
        $oneword = preg_replace_callback($moji_pattern, array($this, 'smarty_modifier_t_moji_callback'), $oneword);
        
        if($oneword){
            echo $oneword;
        } else {
            echo "・・・・・・";
        }
    }
    
    function smarty_modifier_t_moji_callback($matches) {
        $moji_file = sprintf('/moji/x_%s.gif',strtolower($matches[1]));
        if( is_readable("./img" . $moji_file) ) {
            return sprintf("<img src=\"img%s\" alt=\"絵文字\">",$moji_file);
        } else {
            return $matches[0];
        }
    }
}

?>
