{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Product quantity input template
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<span class="input-field-wrapper {getWrapperClass()}">
  {displayCommentedData(getCommentedData())}
  <input{getAttributesCode():h} />
  <a IF="entity.isPersistent()" href="{buildURL(#product#,##,_ARRAY_(#product_id#^entity.product_id,#page#^#inventory#))}">{t(#Inventory tracking options#)}</a>
</span>
