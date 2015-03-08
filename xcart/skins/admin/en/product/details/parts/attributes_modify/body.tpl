{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Product attributes 
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}
<ul class="attribute-values">
  <li FOREACH="getAttributes(),attribute">
    <widget class="{attribute.getWidgetClass(attribute.getType(),#Customer#)}" attribute="{attribute}" product="{product}" orderItem="{orderItem}" namePrefix="{getCommonFieldName()}[{getIdx()}][" nameSuffix="]" />
  </li>
</ul>
