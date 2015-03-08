{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Links for XPC payment transaction 
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}
<div class="xpc-actions">

  <div class="unit" FOREACH="getTransactionUnits(entity),id,unit">
    <widget class="\XLite\View\Order\Details\Admin\PaymentActionsUnit" transaction="{getTransaction(entity)}" unit="{unit}" is_transaction=1 />
  </div>

</div>