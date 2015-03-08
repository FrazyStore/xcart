{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Discount value field in view mode
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

{foreach:getFields(),f}
  {if:entity.getType()=#$#}
    {getCurrencySymbol()} {getViewValue(f)}
  {else:}
    {getViewValue(f)} {entity.getType()}
  {end:}
{end:}