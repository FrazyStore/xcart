{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * "You save" label (internal list element)
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="product.plain_price.tail.sale_price.text", weight="200")
 *}

, {t(#you save#)} <span class="you-save">{formatPrice(getSalePriceDifference(),null,1)}</span>
