{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Top menu
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}
<div class="navbar navbar-inverse mobile-hidden" role="navigation">
  <div class="collapse navbar-collapse">
    <ul IF="hasItems()" class="nav navbar-nav">
      {foreach:getItems(),i,item}
      <li {displayItemClass(i,item):h}><a href="{item.url}" {if:item.active}class="active"{end:}>{item.label}</a></li>
      {end:}
    </ul>
  </div>
</div>

<ul IF="hasItems()" class="desktop-hidden">
  {foreach:getItems(),i,item}
  <li {displayItemClass(i,item):h}><a href="{item.url}" {if:item.active}class="active"{end:}>{item.label}</a></li>
  {end:}
</ul>
