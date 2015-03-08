{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Login widget
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}
<div class="login-box-wrapper">
    <div class="login-box">

        <h2>{t(#Enter SMS code#)}</h2>

        <form id="login_form" action="{buildURL(#authy_login#)}" method="post" name="login_form">
            <input type="hidden" name="target" value="authy_login" />
            <input type="hidden" name="action" value="login" />
            <widget class="\XLite\View\FormField\Input\FormId" />

            <table>
                <tr>
                    <th>{t(#SMS code#)}:</th>
                    <td><input type="text" class="form-control sms_token" name="sms_token" value="" size="32" maxlength="128" ></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <widget class="\XLite\View\Button\Submit" label="Log in" style="regular-main-button main-button" />
                        <a href="{buildURL(#authy_login#,##)}" class="resend_token">{t(#Resend SMS with code#)}</a>
                    </td>
                </tr>
            </table>
        </form>


    </div>
</div>
