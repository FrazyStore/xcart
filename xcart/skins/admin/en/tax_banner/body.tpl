{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Tax banner page template
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<div class="tax-banner">
  <div class="subbox marketplace">
    <img src="images/tax_banner.png" alt="{t(#Taxes#)}" />
    <p>{t(#To setup Tax Rates, find and install the appropriate addons from Marketplace#)}</p>  
    <widget class="XLite\View\Button\Link" label="{t(#Find in Marketplace#)}" location="{buildURL(#addons_list_marketplace#,##,_ARRAY_(#tag#^#Taxes#,#clearSearch#^#1#))}" style="regular-main-button" />
  </div>
</div>
