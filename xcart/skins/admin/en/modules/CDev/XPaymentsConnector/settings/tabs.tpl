{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Test module 
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

  <div class="tabbed-content-wrapper">
    <div class="page-tabs clearfix">

      <ul>
        <li FOREACH="getTabs(),tabPage" class="tab{if:tabPage.selected}-current{end:}">
          <a href="{tabPage.url:h}">{t(tabPage.title)}</a>
        </li>
        <list name="tabs.items">
      </ul>
    </div>
    <div class="clear"></div>

  </div>

