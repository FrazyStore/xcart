/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Payment methods controller
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */

/**
 * Payment methods controller
 */

jQuery().ready(
  function() {
    core.microhandlers.add(
      'NoPaymentMethodsFoundList',
      '.no-payment-methods-appearance',
      function (event) {
        console.log(jQuery(this));

        jQuery(".marketplace-block").hide();
      }
    );
    core.microhandlers.add(
      'PaymentMethodsList',
      '.payments-list.items-list',
      function (event) {
        jQuery(".marketplace-block").show();
      }
    );
  }
);
