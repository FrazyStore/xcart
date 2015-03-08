{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Payment transactions summary
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="order.actions.paymentActionsRow", weight="100")
 *}

<ul IF="hasPaymentTransactionSums()" class="payment-sums">
  <li FOREACH="getPaymentTransactionSums(),label,sum">
    <span class="transaction-label">{label}:</span> <span class="cost">{formatPrice(sum,order.getCurrency())}</span>
  </li>
</ul>
