{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Payment methods list : line : header : alternative icon
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="payment.methods.list.header", weight=500)
 *}

<div IF="method.getAltAdminIconURL()" class="alt-icon"><img src="{method.getAltAdminIconURL()}" alt="" /></div>
