{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Remove data page template
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="page.remove_data", weight="100")
 *}

<p class="alert alert-warning note" role="alert">{t(#This tool allows you to empty your store of content data with which it might have been populated for testing purposes#):h}</p>

<widget class="XLite\View\Form\ItemsList\RemoveData" name="list" />
  <widget class="XLite\View\ItemsList\Model\RemoveData" />
<widget name="list" end />

