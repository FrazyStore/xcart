{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Social Login sign-in button
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<a href="javascript: void(0);" rel="{getAuthURL()}" class="paypal-login icon" onclick="return !PaypalLogin.openPopup(this);">
  {* <span class="paypal-icon"></span> *}
  <i class="fa fa-paypal"></i>
</a>

