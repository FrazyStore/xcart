{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Buttons
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="review.modify.buttons.pending", weight="600")
 *}
<div class="button submit">
  <widget class="\XLite\View\Button\Regular" name="approve" label="{t(#Approve#)}" style="regular-main-button button-approve" jsCode="onApproveButton(this);" />
  <widget class="\XLite\View\Button\Regular" name="delete" label="{t(#Remove#)}" style="button-delete" jsCode="onRemoveButton(this);" />
</div>
