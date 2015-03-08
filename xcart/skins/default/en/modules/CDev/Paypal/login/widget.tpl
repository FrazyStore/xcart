{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Social Login sign-in button
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<div class="paypal-login-note note-before" IF="getTextBefore()">
  {getTextBefore()}
</div>

<div class="paypal-login-container">
  <ul class="paypal-login">
    <li class="paypal-login-caption" IF="getCaption()">{getCaption()}</li>
    <li class="paypal-net-element social-net-PayPal">
      <a href="javascript: void(0);" rel="{getAuthURL()}" class="paypal-login button" onclick="return !PaypalLogin.openPopup(this);">
        <i class="fa fa-paypal"></i>
        <span class="provider-name">{t(#Sign in with PayPal#)}</span>
      </a>
    </li>
  </ul>
</div>

<div class="paypal-login-note note-after" IF="getTextAfter()">
  {getTextAfter()}
</div>