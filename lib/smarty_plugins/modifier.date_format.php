<?php
/**
 * @license  GNU Lesser General Public License (LGPL)
 * @see      Smarty/plugins/modifier.date_format.php
 */

/**
 * Include the {@link shared.make_timestamp.php} plugin
 */
require_once $smarty->_get_plugin_filepath('shared','make_timestamp');
/**
 * Smarty date_format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     date_format<br>
 * Purpose:  format datestamps via strftime<br>
 * Input:<br>
 *         - string: input date string
 *         - format: strftime format for output
 *         - default_date: default date if $string is empty
 * @link http://smarty.php.net/manual/en/language.modifier.date.format.php
 *          date_format (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param string
 * @param string
 * @return string|void
 * @uses smarty_make_timestamp()
 */
function smarty_modifier_date_format($string, $format = '%m/%d', $default_date = null)
{
    if ($ts = smarty_make_timestamp($string)) {
        // UTF-8 日本語対応
        return preg_replace_callback('/\%[a-z\%]/iu',
                    create_function('$res', 'return strftime($res[0], '.$ts.');'),
                    $format);
    } elseif (!empty($default_date) && $ts = smarty_make_timestamp($default_date)) {
        return preg_replace_callback('/\%[a-z\%]/iu',
                    create_function('$res', 'return strftime($res[0], '.$ts.');'),
                    $format);
    } else {
        return;
    }
}

?>
