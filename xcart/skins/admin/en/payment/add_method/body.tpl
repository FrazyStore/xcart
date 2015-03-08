{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Add payment type widget
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<div class="add-payment-box payment-type-{getPaymentType()}">

  {* Online methods list *}
  <ul IF="!%\XLite\Model\Payment\Method::TYPE_OFFLINE%=getPaymentType()" class="tabs-container">

    <li class="headers">
      <ul>
        <li class="header payment-gateways selected">
          <div class="header-wrapper">
            <div class="main-head">{t(#Payment gateways#):h}</div>
            <div class="small-head">{t(#Requires registered merchant account#):h}</div>
          </div>
        </li>
        <li class="header all-in-one-solutions">
          <div class="header-wrapper">
            <div class="main-head">{t(#All-in-one solutions#):h}</div>
            <div class="small-head">{t(#No merchant account required#):h}</div>
          </div>
        </li>
      </ul>
    </li>

    <li class="body">
      <ul>
        <li class="body-item payment-gateways selected">
          <div class="body-box">
            <widget class="\XLite\View\SearchPanel\Payment\Admin\Main" />
            <widget class="\XLite\View\ItemsList\Model\Payment\OnlineMethods" />
            <widget class="\XLite\View\Payment\MarketplaceBlock"/>
          </div>
        </li>
        <li class="body-item all-in-one-solutions">
          <div class="body-box">
            <widget class="\XLite\View\Payment\MethodsPopupList" paymentType="{_ARRAY_(%\XLite\Model\Payment\Method::TYPE_ALLINONE%)}" />
          </div>
        </li>
      </ul>
    </li>

  </ul>

  {* Offline methods list *}
  <ul IF="%\XLite\Model\Payment\Method::TYPE_OFFLINE%=getPaymentType()" class="offline-methods tabs-container">
    <li class="offline selected tab">
      <ul>
        <li class="body">
          <list name="payment.method.add.offline" />
        </li>
      </ul>
    </li>
  </ul>

</div>
