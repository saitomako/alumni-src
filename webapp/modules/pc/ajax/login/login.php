<?php

class pc_ajax_login_login extends OpenPNE_Action
{
    function execute($requests)
    {
        if (LOGIN_URL_PC && !DISPLAY_LOGIN) {
            client_redirect_absolute(LOGIN_URL_PC);
        }

        //---- inc_ テンプレート用 変数 ----//
        $this->set('inc_page_header', fetch_inc_page_header('public'));
        $this->set('INC_PAGE_HEADER', db_banner_get_top_banner(false));
        $this->set('IS_CLOSED_SNS', IS_CLOSED_SNS);
        $this->set('top_banner_html_before', p_common_c_siteadmin4target_pagename('top_banner_html_before'));

        $this->set('inc_page_footer',
            p_common_c_siteadmin4target_pagename('inc_page_footer_before'));

        return 'success';
    }
}
?>
