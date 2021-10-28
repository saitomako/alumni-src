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

/**
 * OpenPNE
 * @copyright 2005-2006 OpenPNE Project
 * @link      http://www.tejimaya.com/openpne.shtml
 *
 */

require_once OPENPNE_WEBAPP_DIR .'/components/mobile_get_id.class.php';
require_once OPENPNE_WEBAPP_DIR .'/components/one_word.class.php';

class ktai_page_o_backdoor extends OpenPNE_Action
{

    function isSecure()
    {
        return false;
    }

    function execute($requests)
    {
    	$guid = $_REQUEST['guid'];
    	$mobileid = new Usagi_Get_Mobile_Id();
    	//�h�R���̏ꍇ�AGUID�����ĉ��߂ă��O�C���y�[�W�ֈړ�����
    	if ($mobileid->getCarrier() == 'docomo' && !isset($guid)) {
    		$p = array('guid' => 'ON', 'login_params' => $requests['login_params']);
    		openpne_redirect('ktai', 'page_o_backdoor', $p);
    		exit;
    	}
    	//�I�[�g���O�C������
    	if (defined('USAGI_MOBILE_AUTO_LOGIN') && USAGI_MOBILE_AUTO_LOGIN) {
    		$mid = $mobileid->getId();
    		//$mid��������ǂ����𔻒肷��
    		if ($c_member_id = db_ktai_c_member_id4easy_access_id($mid)) {
    			// ����ł���AID�����������ꍇ
    			$p = array('guid' => 'ON', 'login_params' => $requests['login_params']);
    			openpne_redirect('ktai', 'do_o_easy_login', $p);
    		}
    	}
    	// --- ���N�G�X�g�ϐ�
    	$kad = $requests['kad'];
    	$carrier = $GLOBALS['__Framework']['ktai_carrier'];
    	$adminmail = MAIL_SERVER_DOMAIN;
    	
    	$this->set('ktai_address', t_decrypt($kad));
    	$this->set('adminmail',$adminmail);
    	$this->set('carrier',$carrier);
        return 'success';
    }
}
?>
