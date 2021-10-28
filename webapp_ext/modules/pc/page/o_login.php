<?php
/* ========================================================================
 *
 * @license This source file is subject to version 3.01 of the PHP license,
 *              that is available at http://www.php.net/license/3_01.txt
 *              If you did not receive a copy of the PHP license and are unable
 *              to obtain it through the world-wide-web, please send a note to
 *              license@php.net so we can mail you a copy immediately.
 *
 * @category   MyNETS
 * @project    UsagiProject 2006-2008
 * @package    Login
 * @author     kuniharu tsujioka <author@example.com>
 * @author     UsagiProject <info@usagi.mynets.jp>
 * @copyright  kuniharu tsujioka
 * @copyright  2006-2008 UsagiProject <author member ad  http://usagi.mynets.jp/member.html>
 * @version    1.2.0Nighty
 * @chengelog
 * ========================================================================
 */
//require_once OPENPNE_WEBAPP_DIR ."/modules/diary/lib/action.php";
require_once OPENPNE_WEBAPP_DIR ."/components/login.class.php";

class pc_page_o_login extends OpenPNE_Action
{
    /**
     * 認証を行わない
     */
    function isSecure()
    {
        return false;
    }
    /**
     * [[機能説明]]
     *
     * @access  public
     */
    function execute($requests)
    {
        //=======================================
        //request parameters get
        //=======================================
        //ここでリクエストパラメータを取得する

        $login_params = $requests['login_params'];
        //if (isset($login_params)) {
        //	error_log($login_params);
        //}

        //=======================================
        //logic block
        //=======================================
        //ここでビジネスロジックを記述する
        if (LOGIN_URL_PC && !DISPLAY_LOGIN) {
            client_redirect_absolute(LOGIN_URL_PC);
        }

        //外部公開日記を取得する
        $openData = new Login_View();
        $diary_list = $openData->getOpenDiary();
        $commu_list = $openData->getOpenCommu();
        $topic_list = $openData->getOpenTopic();
        $event_list = $openData->getOpenEvent();
        $css        = $openData->getCustumCss();

        //print_r($css);
        //exit;
        //=======================================
        //template assign block
        //=======================================
        //ここでテンプレートへ変数をセットする
        //$this->set('[[パラメータ名]]', [[セットするパラメータ変数]]);
        $this->set('diary_list', $diary_list);
        $this->set('commu_list', $commu_list);
        $this->set('topic_list', $topic_list);
        $this->set('event_list', $event_list);

        return 'success';

    }
}
?>
