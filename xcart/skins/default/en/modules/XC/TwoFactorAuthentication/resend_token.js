/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Authy resend SMS controller
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */


$(document).ready(function(){
   $(this).on('click', '.top_messages_resend_token', function(){
       $('.resend_token').eq(0).click();
       return false;
   });
});


/**
 * Controller
 */

function AuthyResendController(base)
{
    AuthyResendController.superclass.constructor.apply(this, arguments);

    jQuery('.resend_token').click(_.bind(this.handleResendToken, this));
    core.bind('popup.close', _.bind(this.handleClosePopup, this));
}

extend(AuthyResendController, ALoadable);

AuthyResendController.autoload = function()
{
    jQuery('.resend_token').each(
        function() {
            new AuthyResendController(this);
        }
    );
};

AuthyResendController.prototype.handleResendToken = function(event)
{
    popup.shade();

    core.post(URLHandler.buildURL({target: 'authy_login', action: 'resend_token'}),
        function(xhr, status, data, valid) {
            popup.unshade();
        },
        {}
    );

    return false;
}

AuthyResendController.prototype.handleClosePopup = function(event)
{
    $('.submit').removeAttr("disabled");
}


core.bind('afterPopupPlace', function() {
        new AuthyResendController();
    });




