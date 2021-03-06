<?php
/**
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 *
 * @category
 * @package    Auth Class
 * @author     KUNIHARU Tsujioka <kunitsuji@gmail.com>
 * @copyright  Copyright (c) 2008 KUNIHARU Tsujioka <kunitsuji@gmail.com>
 * @copyright  Copyright (c) 2006-2008 Usagi Project (URL:http://usagi.mynets.jp)
 * @license    New BSD License
 */

/**
 * 絵文字関連の関数を設置
 *
 */

/**
 * 絵文字の数を数える
 * @param str 文字列
 * @return int 絵文字の数
 * @access public
 */
if (! function_exists('PictLen'))
{
    function PictLen($str)
    {
        $moji_pattern = '/&(?:amp;|)#x([0-9A-F][0-9A-F][0-9A-F][0-9A-F]);/i';
        $count = preg_match_all($moji_pattern,$str,$emoji);
        $moji_pattern = '/\x1b\x24(\C\C)\x0f/';
        $counts       = preg_match_all($moji_pattern,$str,$emojis);
        return $count + $counts;
    }
}
/**
 * 絵文字を取り除く
 * @param str 文字列
 * @return int 絵文字の数
 * @access public
 */
if (! function_exists('PictDel'))
{
    function PictDel($str)
    {
        $moji_pattern = '/&(?:amp;|)#x([0-9A-F][0-9A-F][0-9A-F][0-9A-F]);/i';
        $str          = preg_replace($moji_pattern,'', $str);
        $moji_pattern = '/\x1b\x24(\C\C)\x0f/';
        $str          = preg_replace($moji_pattern, '', $str);
        return $str;
    }
}
?>