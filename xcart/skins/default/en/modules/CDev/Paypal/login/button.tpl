{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Social Login sign-in button
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<li class="social-net-element social-net-{getName()}">
  <a href="javascript: void(0);" rel="{getAuthRequestUrl()}" class="paypal-login button" onclick="return !PaypalLogin.openPopup(this);">
    <i class="fa fa-paypal"></i>
    <span class="provider-name">{t(#Sign in with PayPal#)}</span>
  </a>
</li>
