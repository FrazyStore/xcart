{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Popup button
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<button type="button" class="{getClass()}">
  {displayCommentedData(getURLParams())}
  <span>{t(getButtonContent())}</span>
  {foreach:getModulesToInstall(),id,val}
  <input type="hidden" name="moduleIds[]" value="{val}" id="moduleids_{val}" />
  {end:}
</button>
