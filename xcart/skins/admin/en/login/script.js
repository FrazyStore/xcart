/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Login 
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */

var timeLeft = 0;

jQuery().ready(
  function() {
    timeLeft = jQuery('.login-box').data('time-left');
    if (timeLeft) {
      timer();
    }
  }
);

function timer() {
  timeLeft--;
  if (0 < timeLeft) {
    var min = parseInt(timeLeft / 60);
    var sec = timeLeft % 60;
    jQuery('#timer').text((10 > min ? '0' : '') + min +  ':' + (10 > sec ? '0' : '') + sec);
    setTimeout(timer, 1000);

  } else {
    jQuery('.login-box').removeClass('locked');
  }
}
