{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Total item cell
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="invoice.item", weight="30")
 *}
<td style="text-align:right;vertical-align: top;border-width:1px;border-collapse: collapse;border-spacing: 0px;border-style: solid;border-color: #c4c4c4;padding: 10px 20px;vertical-align: top;">{formatPrice(item.getTotal(),order.getCurrency())}</td>
