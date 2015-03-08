{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Payment methods list widget for popup
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<ul class="payments-list {getListCSSClasses()}">
  <li FOREACH="getPageData(),id,payment">
    <ul class="payment-method-entry">
      <li class="title-row module-name-{payment.getModuleName()}">
        <ul>
          <li class="payment-logo"><img IF="{payment.getAdminIconURL()}" src="{payment.getAdminIconURL()}" alt="{payment.getTitle()}" /></li>
          <li class="title">{payment.getName()}</li>
          <li class="button">
            <widget
              IF="!payment.getAdded()"
              class="XLite\View\Button\Link"
              label="{t(#Choose#)}"
              location="{buildURL(#payment_settings#,#add#,_ARRAY_(#id#^payment.getMethodId()))}" />
            <widget
              IF="payment.getAdded()"
              class="XLite\View\Button\Regular"
              label="{t(#Added#)}"
              jsCode="void(0)"
              style="disabled" />
          </li>
          <li class="separator"></li>
        </ul>
        <div class="clearfix"></div>
      </li>
    </ul>

  </li>
</ul>