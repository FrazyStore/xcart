{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Product details attributes block
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="product.details.page.tab.description", weight="100")
 *}

<ul IF="!product.getAttrSepTab()" class="extra-fields other-attributes">
  <list name="product.details.common.product-attributes.attributes" />
</ul>
