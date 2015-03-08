/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Upgrade buttons controller
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2015 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */

var UpgradeButtonsBox = function(submitFormFlag)
{
  jQuery('.ready-to-install-actions .alert.agree input[type="checkbox"]').change(
    function () {
      var state = jQuery(this).attr('checked');
      var button = jQuery('.ready-to-install-actions button.submit').eq(0);
      if (button) {
        var box = jQuery('.ready-to-install-actions .alert');
        if (state) {
          jQuery(button).removeClass('disabled');
          jQuery(button).removeProp('disabled');
          jQuery(box).removeClass('alert-warning');
          jQuery(box).addClass('alert-success');

        } else {
          jQuery(button).addClass('disabled');
          jQuery(button).prop('disabled', 'disabled');
          jQuery(box).removeClass('alert-success');
          jQuery(box).addClass('alert-warning');
        }
      }
    }
  );
}

jQuery().ready(UpgradeButtonsBox);
