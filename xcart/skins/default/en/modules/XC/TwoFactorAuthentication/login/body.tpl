{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Login widget
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

        <form id="login_form" action="{buildURL(#authy_login#)}" method="post" name="login_form">
            <input type="hidden" name="target" value="authy_login" />
            <input type="hidden" name="action" value="login" />
            <input type="hidden" name="preReturnURL" value="{preReturnURL}" />
            <widget class="\XLite\View\FormField\Input\FormId" />

            <table class="login-form">
                <tr>
                    <td><label for="sms_token">{t(#SMS code#)}:</label></td>
                    <td><input type="text" class="form-control" name="sms_token" value="" size="32" maxlength="128" /></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <widget class="\XLite\View\Button\Submit" label="Log in" style="main-button" />
                        <a href="#" class="resend_token">{t(#Resend SMS with code#)}</a>
                    </td>
                </tr>
            </table>
        </form>
