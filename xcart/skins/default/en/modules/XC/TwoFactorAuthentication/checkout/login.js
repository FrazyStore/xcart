/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Call popup on checkout login
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */

$(document).ready(function(){
    $('form.login-form').bind('afterSubmit', function(event, data){
        if (data.isValid) {
            loadDialogByLink(
            $(this)[0],
            URLHandler.buildURL({
                'target':  'authy_login',
                'preReturnURL': URLHandler.buildURL({target: 'checkout'}),
                'widget':  '\\XLite\\Module\\XC\\TwoFactorAuthentication\\View\\CustomerLogin',
                'popup':   1
            }),
            {width: 'auto'},
            null,
            this
            );
        }
    });
    $(document).on('click', '.resend_token', function(){
        popup.shade();
        core.post(URLHandler.buildURL({target: 'authy_login', action: 'resend_token'}),
            function(xhr, status, data, valid) {
                popup.unshade();
            },
            {}
        );

        return false;
    });
});
