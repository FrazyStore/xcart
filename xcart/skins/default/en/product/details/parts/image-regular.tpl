{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Product details image default box
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}
{*<div class="product-photo" style="height:{getWidgetMaxHeight()}px; width:{getWidgetMaxWidth()}px">*}

<div class="product-photo">
  <widget class="\XLite\View\Image" image="{product.getImage()}" className="photo product-thumbnail" verticalAlign="top" id="product_image_{product.product_id}" maxWidth="{getWidgetMaxWidth()}" maxHeight="{getWidgetMaxHeight()}" alt="{t(#Thumbnail#)}" />
</div>
